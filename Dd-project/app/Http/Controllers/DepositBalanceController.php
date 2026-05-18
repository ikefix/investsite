<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepositBalance;
use App\Models\User;

class DepositBalanceController extends Controller
{
    public function index()
    {
        $users = User::with('depositBalance')->get();
        return view('admin.deposit_balance', compact('users'));
    }

    public function update(Request $request, $userId)
    {
        $request->validate([
            'balance' => 'required|numeric|min:0',
        ]);

        $userBalance = DepositBalance::where('user_id', $userId)->first();
        
        if (!$userBalance) {
            $userBalance = new DepositBalance();
            $userBalance->user_id = $userId;
        }

        $userBalance->balance = $request->input('balance');
        $userBalance->save();

        return back()->with('success', 'User deposit balance updated successfully!');
    }
}


