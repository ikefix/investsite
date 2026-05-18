<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\WithdrawalApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class WithdrawRequestController extends Controller
{
    public function create()
    {
        return view('withdraw.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'wallet_address' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
        ]);

        WithdrawRequest::create([
            'user_id' => Auth::id(),
            'wallet_address' => $request->wallet_address,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
    }

    public function index()
    {
        $withdrawRequests = WithdrawRequest::where('status', 'pending')->get();
        return view('admin.withdraw_requests', compact('withdrawRequests'));
    }

    public function updateStatus($id, $status)
    {
        $withdrawRequest = WithdrawRequest::findOrFail($id);
        $withdrawRequest->status = $status;
        $withdrawRequest->save();
    
        // ✅ Send mail only if approved
        if ($status === 'approve') {
            try {
                Mail::to($withdrawRequest->user->email)->send(new WithdrawalApproved($withdrawRequest));
            } catch (\Exception $e) {
                // Log the error if the email fails
                Log::error('Failed to send withdrawal approval email', ['error' => $e->getMessage(), 'withdraw_request_id' => $id]);
            }
        }
    
        return back()->with('success', "Withdrawal request $status successfully.");
    }

}

