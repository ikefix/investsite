@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

@section('content')

<div class="deposit-body">
    <div class="crypto-image">
        <img src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?q=80&w=1200&auto=format&fit=crop" alt="Crypto Investment">
    </div>
    
    <div class="deposit-form">
        <h2>Make a Deposit</h2>
    
        <form id="depositForm" method="POST" action="{{ url('/deposit/store') }}" enctype="multipart/form-data">
            @csrf
    
            <!-- Select Plan -->
            {{-- <label for="plan">Select Investment Plan:</label>
            <select name="plan" id="plan" required>
                <option value="">-- Choose a Plan --</option>
                @foreach($plans as $plan)
                    <option value="{{ $plan['name'] }}">{{ $plan['name'] }} ({{ $plan['profit'] }})</option>
                @endforeach
            </select> --}}
    
            <!-- Select Payment Method -->
            <label for="payment_method">Select Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">-- Choose Payment Method --</option>
                <option value="btc">Bitcoin (BTC)</option>
                <option value="eth">Ethereum (ETH)</option>
                <option value="usdt">USDT (TRC20)</option>
            </select> <br>
    
            <!-- Wallet Address -->
            <div class="wallet-info">
                <p><strong>Send Payment to:</strong></p>
                <p id="wallet_address"></p>
                {{-- <p><strong>QR Code:</strong></p>
                <img id="wallet_qr" src="" alt="QR Code" width="150"> --}}
            </div><br>
    
            <!-- Enter Deposit Amount -->
            {{-- <label for="amount">Enter Deposit Amount ($):</label>
            <input type="number" name="amount" id="amount" min="50" required> --}}
    
            <!-- Upload Proof of Payment -->
            <label for="proof">Upload Payment Proof:</label>
            <input type="file" name="proof" id="proof" accept="image/*,application/pdf" required>

            <!-- New Input: Wallet Address for Proof -->
            <label for="wallet_proof">Wallet Address (Proof of Payment):</label>
            <input type="text" name="wallet_proof" id="wallet_proof" required placeholder="Enter sender wallet address">
    
            <!-- Submit -->
            <button type="submit" class="submit-btn">Submit Deposit</button>
        </form>
    </div>
</div>

<div class="plans-container">
    <h2>Investment Plans</h2>

    <div class="plan-grid">

            <!-- PLAN 1 -->

            <div class="plan-card">

                <h2>Basic Plan</h2>

                <h1>25%</h1>

                <p>Daily Return</p>

                <ul>
                    <li><b>Minimum Invest:</b> $5,000</li>
                    <li><b>Maximum Invest:</b> $10,000</li>
                    <li><b>24/7</b> Support</li>
                    <li><b>Capital Return:</b> Yes</li>
                </ul>

                <button class="select-plan">
                    Invest Now
                </button>

                <!-- PAYMENT DROPDOWN -->

                <div class="pack-final">

                    <select class="payment-method">

                        <option value="">
                            Select Payment Method
                        </option>

                        <option value="bitcoin">
                            Bitcoin
                        </option>

                        <option value="ethereum">
                            Ethereum
                        </option>

                        <option value="usdt">
                            USDT
                        </option>

                    </select>

                </div>

            </div>

            <!-- PLAN 2 -->

            <div class="plan-card active">

                <h2>Standard Plan</h2>

                <h1>35%</h1>

                <p>Daily Return</p>

                <ul>
                    <li><b>Minimum Invest:</b> $10,000</li>
                    <li><b>Maximum Invest:</b> $50,000</li>
                    <li><b>24/7</b> Support</li>
                    <li><b>Capital Return:</b> Yes</li>
                </ul>

                <button class="select-plan">
                    Invest Now
                </button>

                <div class="pack-final">

                    <select class="payment-method">

                        <option value="">
                            Select Payment Method
                        </option>

                        <option value="bitcoin">
                            Bitcoin
                        </option>

                        <option value="ethereum">
                            Ethereum
                        </option>

                        <option value="usdt">
                            USDT
                        </option>

                    </select>

                </div>

            </div>

            <!-- PLAN 3 -->

            <div class="plan-card">

                <h2>Premium Plan</h2>

                <h1>50%</h1>

                <p>Daily Return</p>

                <ul>
                    <li><b>Minimum Invest:</b> $50,000</li>
                    <li><b>Maximum Invest:</b> $100,000</li>
                    <li><b>24/7</b> Support</li>
                    <li><b>Capital Return:</b> Yes</li>
                </ul>

                <button class="select-plan">
                    Invest Now
                </button>

                <div class="pack-final">

                    <select class="payment-method">

                        <option value="">
                            Select Payment Method
                        </option>

                        <option value="bitcoin">
                            Bitcoin
                        </option>

                        <option value="ethereum">
                            Ethereum
                        </option>

                        <option value="usdt">
                            USDT
                        </option>

                    </select>

                </div>

            </div>

            <!-- PLAN 4 -->

            <div class="plan-card">

                <h2>Institutional Plan</h2>

                <h1>65%</h1>

                <p>Daily Return</p>

                <ul>
                    <li><b>Minimum Invest:</b> $100,000</li>
                    <li><b>Maximum Invest:</b> $1,800,000</li>
                    <li><b>24/7</b> Support</li>
                    <li><b>Capital Return:</b> Yes</li>
                </ul>

                <button class="select-plan">
                    Invest Now
                </button>

                <div class="pack-final">

                    <select class="payment-method">

                        <option value="">
                            Select Payment Method
                        </option>

                        <option value="bitcoin">
                            Bitcoin
                        </option>

                        <option value="ethereum">
                            Ethereum
                        </option>

                        <option value="usdt">
                            USDT
                        </option>

                    </select>

                </div>

            </div>

        </div>
</div>


<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        let wallets = {
            btc: "bc1qyg48uju7hmnds8c4qh679ug6dmlgmasddf02uw",
            eth: "0x1bD5FDEA71213CC5B9962F54de3E119A435A57C0",
            usdt: "TPx7hqrfjoGTsae7tZBwQL659wf4FcKC8X"
        };

        let method = this.value;
        document.getElementById('wallet_address').innerText = wallets[method] || "";
        document.getElementById('wallet_qr').src = `https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=${wallets[method] || ""}`;
    });

    document.getElementById('depositForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevents the default submission
        
        // Display success message
        alert("You have successfully submitted your deposit request.");

        // Allow form submission after alert
        this.submit();
    });
</script>
@endsection
