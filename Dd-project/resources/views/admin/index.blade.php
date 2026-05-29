<?php 
$settings = \App\Models\Setting::pluck('value', 'key');
?>

@extends('layouts.admin_app')

<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

@section('admin_content')

<style>
    .wallet-address {
        color: red;
        font-weight: 600;
    }

    .wallet-box textarea,
    .wallet-box input {
        border: 1px solid red !important;
        color: red;
    }

    .wallet-box textarea:focus,
    .wallet-box input:focus {
        box-shadow: 0 0 5px red;
        border-color: red !important;
    }
</style>

<h1>Update Website Content</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.updateSettings') }}" method="POST" enctype="multipart/form-data" class="settings-form">
    @csrf

    <h2>General Settings</h2>
    <div class="form-group">
        <label>Website Name:</label>
        <input type="text" name="site_name" class="form-control"
               value="{{ $settings['site_name'] ?? '' }}" required>
    </div>

    <h2>Hero Section</h2>
    <div class="form-group">
        <label>Hero Heading:</label>
        <input type="text" name="hero_heading" class="form-control"
               value="{{ $settings['hero_heading'] ?? '' }}" required>
    </div>

    <div class="form-group wallet-box">
        <label class="wallet-address">Bitcoin Address</label>
        <textarea name="hero_text" class="form-control" required>{{ $settings['hero_text'] ?? '' }}</textarea>
    </div>

    <h2>Website Logo</h2>
    <div class="form-group">
        <label>Upload New Logo:</label>
        <input type="file" name="site_logo" class="form-control">

        <p>Current Logo:</p>
        <img src="{{ asset('storage/' . ($settings['site_logo'] ?? 'default-logo.png')) }}" width="100">
    </div>

    <h2>Ethereum Address</h2>
    <div class="form-group wallet-box">
        <label class="wallet-address">Ethereum Wallet Title</label>
        <input type="text" name="how_to_join_title" class="form-control"
               value="{{ $settings['how_to_join_title'] ?? '' }}">

        <label class="wallet-address mt-2">Ethereum Wallet Address</label>
        <input type="text" name="how_to_join_subtitle" class="form-control"
               value="{{ $settings['how_to_join_subtitle'] ?? '' }}">
    </div>

    <h2>USDT (Tether) Address</h2>
    <div class="form-group wallet-box">
        <label class="wallet-address">USDT Title</label>
        <input type="text" name="register_title" class="form-control"
               value="{{ $settings['register_title'] ?? '' }}">

        <label class="wallet-address mt-2">USDT Wallet Address</label>
        <textarea name="register_text" class="form-control">{{ $settings['register_text'] ?? '' }}</textarea>
    </div>

    <h2>Choose Plan</h2>
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="choose_plan_title" class="form-control"
               value="{{ $settings['choose_plan_title'] ?? '' }}">

        <label>Text:</label>
        <textarea name="choose_plan_text" class="form-control">{{ $settings['choose_plan_text'] ?? '' }}</textarea>
    </div>

    <h2>Earn Rewards</h2>
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="earn_rewards_title" class="form-control"
               value="{{ $settings['earn_rewards_title'] ?? '' }}">

        <label>Text:</label>
        <textarea name="earn_rewards_text" class="form-control">{{ $settings['earn_rewards_text'] ?? '' }}</textarea>
    </div>

    <h2>About the Platform</h2>
    <div class="form-group">
        <label>About Title:</label>
        <input type="text" name="about_title" class="form-control"
               value="{{ $settings['about_title'] ?? '' }}">

        <label>About Description:</label>
        <textarea name="about_text" class="form-control">{{ $settings['about_text'] ?? '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

@endsection