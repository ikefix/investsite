<?php 
$settings = \App\Models\Setting::pluck('value', 'key');
?>

@extends('layouts.app')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')

<style>
    .copy-btn{
    background:#16a34a;
    color:#fff;
    border:none;
    padding:8px 14px;
    border-radius:6px;
    cursor:pointer;
    margin-top:10px;
}

.copy-btn:hover{
    background:#15803d;
}
</style>

<div class="deposit-body">
    <div class="crypto-image">
        <img src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?q=80&w=1200&auto=format&fit=crop" alt="Crypto Investment">
    </div>
    
    <div class="deposit-form">
        <h2>Make a Deposit</h2>

        <form id="depositForm" method="POST" action="{{ url('/deposit/store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Payment Method -->
            <label for="payment_method">Select Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">-- Choose Payment Method --</option>
                <option value="btc">Bitcoin (BTC)</option>
                <option value="eth">Ethereum (ETH)</option>
                <option value="usdt">USDT (TRC20)</option>
            </select>

            <br><br>

            <!-- Wallet Info -->
            <div class="wallet-info">
                <p><strong>Send Payment to:</strong></p>

                <p id="wallet_address" class="text-danger fw-bold">
                    Select payment method
                </p>

                <button type="button" id="copy_wallet_btn" class="copy-btn">
                    Copy Address
                </button>
            </div>

            <br>

            <!-- Upload Proof -->
            <label for="proof">Upload Payment Proof:</label>
            <input type="file" name="proof" id="proof" accept="image/*,application/pdf" required>

            <br><br>

            <!-- Wallet Proof -->
            <label for="wallet_proof">Sender Wallet Address:</label>
            <input type="text" name="wallet_proof" id="wallet_proof" required placeholder="Enter sender wallet address">

            <br><br>

            <button type="submit" class="submit-btn">Submit Deposit</button>
        </form>
    </div>
</div>

 <section class="plan-section" id="plans">

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

    </section>

<script>

document.addEventListener("DOMContentLoaded", function () {

    // OPEN DROPDOWN

    document.querySelectorAll(".select-plan").forEach(button => {

        button.addEventListener("click", function () {

            let parentCard = this.closest(".plan-card");
            let packFinal = parentCard.querySelector(".pack-final");

            // CLOSE OTHERS

            document.querySelectorAll(".pack-final").forEach(pack => {

                if(pack !== packFinal){

                    pack.classList.remove("show");

                    setTimeout(() => {

                        pack.style.display = "none";

                    }, 300);

                }

            });

            // TOGGLE CURRENT

            if(packFinal.classList.contains("show")){

                packFinal.classList.remove("show");

                setTimeout(() => {

                    packFinal.style.display = "none";

                }, 300);

            }else{

                packFinal.style.display = "block";

                setTimeout(() => {

                    packFinal.classList.add("show");

                }, 10);

            }

        });

    });

    // PAYMENT REDIRECT

    document.querySelectorAll(".payment-method").forEach(select => {

        select.addEventListener("change", function () {

            let payment = this.value;

            let parentCard = this.closest(".plan-card");

            let planName = parentCard.querySelector("h2").innerText.trim();

            if(payment){

                let url = `/payment/${payment}?plan=${encodeURIComponent(planName)}`;

                window.location.href = url;

            }

        });

    });

});

</script>

<!-- WALLET SCRIPT -->
<!-- <script>
window.addEventListener("load", function () {

    const paymentSelect = document.getElementById('payment_method');
    const walletText = document.getElementById('wallet_address');
    const qr = document.getElementById('wallet_qr');

    if (!paymentSelect) {
        console.error("payment_method not found");
        return;
    }

    const wallets = {
        btc: "{{ $settings['hero_text'] ?? '' }}",
        eth: "{{ $settings['how_to_join_title'] ?? '' }}",
        usdt: "{{ $settings['register_title'] ?? '' }}"
    };

    paymentSelect.addEventListener('change', function () {

        const method = this.value;

        console.log("Selected:", method); // DEBUG

        if (!method) {
            walletText.innerText = "Select payment method";
            if (qr) qr.src = "";
            return;
        }

        walletText.innerText = wallets[method] || "No wallet set";

        if (qr) {
            qr.src =
                "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" +
                encodeURIComponent(wallets[method] || "");
        }
    });

});
</script> -->

<script>
window.addEventListener("load", function () {

    const paymentSelect = document.getElementById('payment_method');
    const walletText = document.getElementById('wallet_address');
    const qr = document.getElementById('wallet_qr');
    const copyBtn = document.getElementById('copy_wallet_btn');

    if (!paymentSelect) {
        console.error("payment_method not found");
        return;
    }

    const wallets = {
        btc: "{{ $settings['hero_text'] ?? '' }}",
        eth: "{{ $settings['how_to_join_title'] ?? '' }}",
        usdt: "{{ $settings['register_title'] ?? '' }}"
    };

    paymentSelect.addEventListener('change', function () {

        const method = this.value;

        if (!method) {
            walletText.innerText = "Select payment method";
            if (qr) qr.src = "";
            return;
        }

        walletText.innerText = wallets[method] || "No wallet set";

        if (qr) {
            qr.src =
                "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" +
                encodeURIComponent(wallets[method] || "");
        }
    });

    // COPY BUTTON
    copyBtn.addEventListener("click", function () {

        const address = walletText.innerText;

        if (
            address === "Select payment method" ||
            address === "No wallet set"
        ) {
            alert("Please select a payment method first");
            return;
        }

        navigator.clipboard.writeText(address)
            .then(() => {
                copyBtn.innerText = "Copied!";

                setTimeout(() => {
                    copyBtn.innerText = "Copy Address";
                }, 2000);
            })
            .catch(err => {
                console.error("Copy failed:", err);
            });
    });

});
</script>

@endsection
