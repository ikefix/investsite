<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Mail\DepositConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'wallet_proof' => 'required|string'
        ]);

        // Store file
        $path = $request->file('proof')->store('deposits', 'public');

        // Save to database
        $deposit = Deposit::create([
            'payment_method' => $request->input('payment_method'),
            'file_path' => $path,
            'keyword' => 'deposit',
            'status' => 'pending',
            'wallet_proof' => $request->input('wallet_proof'),
        ]);

        // Send deposit confirmation email to user
        $user = auth()->user();
        if ($user && $user->email) {
            Mail::to($user->email)->send(new DepositConfirmation($request->payment_method, $request->wallet_proof));
        }

        return back()->with('success', 'Deposit proof uploaded successfully!');
    }

    public function index()
    {
        $deposits = Deposit::all();
        return view('admin.deposit_notification', compact('deposits'));
    }

    public function confirmDeposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->status = 'confirmed';
        $deposit->save();

        return redirect()->route('admin.notifications')->with('success', 'Deposit confirmed.');
    }
}


