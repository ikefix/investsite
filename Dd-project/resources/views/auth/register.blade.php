@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')

<section class="auth-section">

    <div class="auth-container">

        <!-- LEFT SIDE -->

        <div class="auth-left">

            <span class="auth-tag">
                Create Account
            </span>

            <h1>
                Start Your <br>
                Investment Journey
            </h1>

            <p>
                Join thousands of investors trading global
                markets securely with our modern investment platform.
            </p>

            <div class="auth-features">

                <div class="auth-feature">
                    <i class='bx bx-check-circle'></i>
                    <span>Secure Trading Platform</span>
                </div>

                <div class="auth-feature">
                    <i class='bx bx-check-circle'></i>
                    <span>Instant Deposits & Withdrawals</span>
                </div>

                <div class="auth-feature">
                    <i class='bx bx-check-circle'></i>
                    <span>24/7 Customer Support</span>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="auth-right">

            <div class="auth-card">

                <h2>
                    Register Account
                </h2>

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <!-- NAME -->

                    <div class="input-group-auth">

                        <label>Name</label>

                        <input
                            id="name"
                            type="text"
                            class="@error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                            placeholder="Enter your full name"
                        >

                        @error('name')
                            <span class="error-text">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <!-- EMAIL -->

                    <div class="input-group-auth">

                        <label>Email Address</label>

                        <input
                            id="email"
                            type="email"
                            class="@error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder="Enter your email"
                        >

                        @error('email')
                            <span class="error-text">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="input-group-auth">

                        <label>Password</label>

                        <input
                            id="password"
                            type="password"
                            class="@error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create password"
                        >

                        @error('password')
                            <span class="error-text">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <!-- CONFIRM -->

                    <div class="input-group-auth">

                        <label>Confirm Password</label>

                        <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm password"
                        >

                    </div>

                    <!-- BUTTON -->

                    <button type="submit" class="auth-btn">

                        Create Account

                    </button>

                    <!-- LOGIN -->

                    <div class="auth-bottom">

                        <span>
                            Already have an account?
                        </span>

                        <a href="{{ route('login') }}">
                            Login
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

@endsection