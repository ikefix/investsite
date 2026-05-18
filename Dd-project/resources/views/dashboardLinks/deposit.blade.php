@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

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

    @php
        $plans = [
            ['name' => 'PROMO PLAN', 'profit' => '30% daily', 'duration' => '5 days', 'min' => 500, 'max' => 4999],
            ['name' => 'GOLDEN PROMO PLAN', 'profit' => '38% daily', 'duration' => '12 days', 'min' => 5000, 'max' => 'No Limit'],
            ['name' => 'STARTER PLAN', 'profit' => '5% after 24 hours', 'duration' => '24 hours', 'min' => 50, 'max' => 299],
            ['name' => 'BRONZE PLAN', 'profit' => '10% daily', 'duration' => '48 hours', 'min' => 300, 'max' => 499],
            ['name' => 'GOLD PLAN', 'profit' => '15% daily', 'duration' => '4 days', 'min' => 500, 'max' => 999],
            ['name' => 'FAMILY JOINT ACCOUNT', 'profit' => '50% daily', 'duration' => '60 days', 'min' => 7000, 'max' => 'Unlimited'],
            ['name' => 'DIAMOND PLAN', 'profit' => '20% daily', 'duration' => '7 days', 'min' => 1000, 'max' => 4999],
            ['name' => 'PLATINUM PLAN', 'profit' => '25% daily', 'duration' => '12 days', 'min' => 5000, 'max' => 'No Limit'],
        ];
    @endphp

    @foreach($plans as $plan)
    <div class="deposit-plan">
        <h3>{{ $plan['name'] }}</h3>
        <ul>
            <li><span class="highlight">{{ $plan['profit'] }}</span> for {{ $plan['duration'] }}</li>
            <li>Min: ${{ $plan['min'] }} | Max: {{ $plan['max'] }}</li>
            <li>Referral Commission: 10%</li>
            <li>Profit Withdraw: Yes</li>
        </ul>
    </div>
    @endforeach
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
