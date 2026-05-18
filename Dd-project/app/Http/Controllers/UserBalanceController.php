<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBalance;
use App\Models\User;

class UserBalanceController extends Controller {
    // Show admin dashboard with all users
    public function index() {
        $users = User::with('balance')->get();
        return view('admin.balance', compact('users'));
    }

    // Update user balance
    public function update(Request $request, $id) {
        $request->validate([
            'balance' => 'required|numeric|min:0'
        ]);

        $userBalance = UserBalance::updateOrCreate(
            ['user_id' => $id],
            ['balance' => $request->balance]
        );

        return back()->with('success', 'Balance updated successfully.');
    }
}

