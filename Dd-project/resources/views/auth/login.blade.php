@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')

<section class="auth-section">

    <div class="auth-container">

        <!-- LEFT SIDE -->

        <div class="auth-left">

            <span class="auth-tag">
                Welcome Back
            </span>

            <h1>
                Access Your <br>
                Trading Account
            </h1>

            <p>
                Monitor your investments, track market trends,
                and manage your portfolio securely from anywhere.
            </p>

            <div class="auth-features">

                <div class="auth-feature">
                    <i class='bx bx-shield-quarter'></i>
                    <span>Protected & Secure Login</span>
                </div>

                <div class="auth-feature">
                    <i class='bx bx-line-chart'></i>
                    <span>Real-Time Market Tracking</span>
                </div>

                <div class="auth-feature">
                    <i class='bx bx-wallet'></i>
                    <span>Fast Deposits & Withdrawals</span>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="auth-right">

            <div class="auth-card">

                <h2>
                    Login Account
                </h2>

                <form method="POST" action="{{ route('login') }}">

                    @csrf

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
                            autofocus
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
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                        @error('password')
                            <span class="error-text">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <!-- REMEMBER -->

                    <div class="remember-box">

                        <div class="remember-left">

                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >

                            <label for="remember">
                                Remember Me
                            </label>

                        </div>

                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}">

                                Forgot Password?

                            </a>

                        @endif

                    </div>

                    <!-- BUTTON -->

                    <button type="submit" class="auth-btn">

                        Login Account

                    </button>

                    <!-- REGISTER -->

                    <div class="auth-bottom">

                        <span>
                            Don’t have an account?
                        </span>

                        <a href="{{ route('register') }}">
                            Create One
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

@endsection