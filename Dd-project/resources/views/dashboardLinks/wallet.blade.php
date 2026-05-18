@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('content')
<div class="container withdrawal-container">
    <h2 class="text-center">Request Withdrawal</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('wallet.store') }}" method="POST" class="withdrawal-form">
        @csrf

        <div class="form-group">
            <label>Wallet Address:</label>
            <input type="text" name="wallet_address" class="form-control" placeholder="Enter your wallet address" required>
        </div>

        <div class="form-group">
            <label>Amount:</label>
            <input type="number" name="amount" class="form-control" step="0.01" placeholder="Enter amount" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
    </form>
</div>
@endsection