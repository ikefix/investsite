<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRoiBalance;

class UserRoiBalanceController extends Controller
{
public function roi()
{
    $users = User::with('roiBalance')->get();

    return view('admin.roi', compact('users'));
}

    public function updateRoi(Request $request, $id)
{
    $request->validate([
        'balance' => 'required|numeric|min:0'
    ]);

    UserRoiBalance::updateOrCreate(
        ['user_id' => $id],
        ['balance' => $request->balance]
    );

    return back()->with('success', 'ROI balance updated successfully.');
}
}
