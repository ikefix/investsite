@extends('layouts.app')

@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

@section('content')

<div class="home-container">

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

</div>

<!-- SCRIPT -->

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

@endsection