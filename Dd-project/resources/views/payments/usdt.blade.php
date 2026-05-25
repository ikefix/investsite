<?php 
$settings = \App\Models\Setting::pluck('value', 'key');
?>
@extends('layouts.app')


             <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('content')
<style>
    .payment-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    .payment-container h1 {
        color: #d32f2f;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .payment-container h2 {
        color: #444;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .payment-details {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        margin: 20px 0;
        font-size: 16px;
    }

    .payment-details strong {
        color: #d32f2f;
    }

    .upload-section {
        margin-top: 20px;
        text-align: left;
    }

    .upload-section label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }

    .upload-section input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .submit-btn {
        background: #d32f2f;
        color: #fff;
        padding: 12px;
        border: none;
        width: 100%;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .submit-btn:hover {
        background: #b71c1c;
    }
</style>

<div class="payment-container">
    <h1>Selected Plan: {{ $plan ?? 'No Plan Selected' }}</h1>
    <h2>Payment Method: USDT</h2>

    <div class="payment-details">
        <p>Send your payment to the Bitcoin wallet address below:</p>
        <p><strong>USDT Address:</strong> {{ $settings['register_title']}}</p>
    </div>

    <div class="upload-section">
        <h3>Upload Proof of Payment</h3>
        <form action="{{ route('payment.proof') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="plan" value="{{ $plan }}">
            <input type="hidden" name="payment_method" value="bitcoin">

            <label for="proof">Upload Proof (screenshot or receipt):</label>
            <input type="file" name="proof" id="proof" required accept="image/*,application/pdf">
            
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>
@endsection
