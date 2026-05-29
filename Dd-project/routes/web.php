<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaymentPlanController;
use App\Http\Controllers\WithdrawRequestController;
use App\Http\Controllers\PaymentProofController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\UserBalanceController;
use App\Http\Controllers\DepositBalanceController;
use App\Http\Controllers\UserRoiBalanceController;

// 🌍 Public Routes

Route::get('/', [CryptoController::class, 'getMarketTrendy']);

Auth::routes(['verify' => true]);

// 🧑‍💼 Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/withdraw', [WithdrawRequestController::class, 'store'])->name('wallet.store');
});

Route::get('/admin/roi', [UserRoiBalanceController::class, 'roi'])
    ->name('admin.roi');

Route::post('/admin/users/{id}/update-roi', [UserRoiBalanceController::class, 'updateRoi'])
    ->name('admin.users.update.roi');

// ✅ Admin Panel Routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('admin.withdrawals');
    Route::get('/withdrawals/update/{id}/{action}', [AdminController::class, 'updateWithdrawal'])->name('admin.withdrawal.update');

    Route::get('/notifications', [PaymentProofController::class, 'index'])->name('admin.notifications');
    Route::put('/confirm-proof/{id}', [AdminController::class, 'confirmProof'])->name('admin.confirm-proof');

    Route::get('/balance', [UserBalanceController::class, 'index'])->name('admin.balance');
    Route::post('/balance/update/{id}', [UserBalanceController::class, 'update'])->name('admin.balance.update');

    Route::get('/deposit-balance', [DepositBalanceController::class, 'index'])->name('admin.deposit_balances');
    Route::put('/deposit-balance/update/{userId}', [DepositBalanceController::class, 'update'])->name('admin.update-user-balance');

    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');
});

// 💵 Deposits
Route::post('/deposit/store', [DepositController::class, 'store'])->name('deposit.store');
Route::get('/admin/deposits', [DepositController::class, 'index'])->middleware(['auth', 'isAdmin'])->name('admin.deposits');
Route::put('/admin/deposits/confirm/{id}', [DepositController::class, 'confirmDeposit'])->middleware(['auth', 'isAdmin'])->name('admin.confirm-deposit');

// 🌐 Static Pages
Route::view('/plans', 'dashboardLinks.payment');
Route::view('/withdraw', 'dashboardLinks.wallet');
Route::view('/terms', 'dashboardLinks.terms');
Route::view('/deposit', 'dashboardLinks.deposit');
Route::view('/invest', 'dashboardLinks.invest');

// 📈 Crypto Home Page
Route::get('/home', [CryptoController::class, 'getMarketTrends'])->name('home');

// 📤 Payment Proof
Route::post('/payment-proof', [PaymentProofController::class, 'store'])->name('payment.proof');

// 💳 Dynamic Payment Method Route
Route::get('/payment/{method}', [App\Http\Controllers\PaymentPlanController::class, 'showPaymentPage'])->name('payment.page');


