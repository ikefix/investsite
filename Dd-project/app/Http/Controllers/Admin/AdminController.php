<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaymentProof;
use App\Models\Setting;
use App\Models\WithdrawRequest; // Import WithdrawRequest model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalApproved;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', 0)->count();
        $paymentProofs = PaymentProof::all(); // Fetch all payment proofs

        return view('admin.index', [
            'users' => $users,
            'paymentProofs' => $paymentProofs, // Pass payment proofs to the view
        ]);
    }

    public function confirmProof($id)
    {
        $proof = PaymentProof::findOrFail($id);
        $proof->status = 'confirmed'; // Change the status to confirmed
        $proof->save();

        return back()->with('success', 'Payment proof confirmed.');
    }

    public function users()
    {
        $users = User::where('role', 0)->get();

        return view('admin.index', [
            'users' => $users
        ]);
    }

    // Settings Management
    public function settings()
    {
        $settings = Setting::all();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($key === 'site_logo' && $request->hasFile('site_logo')) {
                // Handle image upload
                $file = $request->file('site_logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/logos', $filename);

                // Save only the relative path
                Setting::updateOrCreate(['key' => 'site_logo'], ['value' => 'logos/' . $filename]);
            } else {
                // Update text settings
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

public function withdrawals()
{
    // Fetch all withdrawals ordered by created date
    $withdrawals = WithdrawRequest::orderBy('created_at', 'desc')->get();

    // Pass the withdrawals to the view
    return view('admin.withdrawals', compact('withdrawals'));
}

// ✅ Function to Approve or Decline Withdrawal Requests
    public function updateWithdrawal($id, $action)
{
    // Find the withdrawal request by ID, and eager load the 'user' relationship
    $withdrawRequest = WithdrawRequest::with('user')->findOrFail($id);

    // If action is 'approve', update the status and send an email to the user
    if ($action === 'approve') {
        $withdrawRequest->status = 'approved';
        $withdrawRequest->save();

        // Send approval email to the user
        try {
            // Try to send the email
            Mail::to($withdrawRequest->user->email)->send(new WithdrawalApproved($withdrawRequest));
        } catch (\Exception $e) {
            // If there is an error, log it
            Log::error('Error sending withdrawal approval email', [
                'error' => $e->getMessage(),
                'withdraw_request_id' => $withdrawRequest->id
            ]);
        }

        // Redirect back with success message
        return redirect()->route('admin.withdrawals')->with('success', 'Withdrawal request approved successfully.');

    // If action is 'decline', update the status to 'declined'
    } elseif ($action === 'decline') {
        $withdrawRequest->status = 'declined';
        $withdrawRequest->save();

        // Redirect back with success message
        return redirect()->route('admin.withdrawals')->with('success', 'Withdrawal request declined successfully.');
    }

    // If the action is not valid, redirect with an error message
    return redirect()->route('admin.withdrawals')->with('error', 'Invalid action.');
}



}