<?php 
$settings = \App\Models\Setting::pluck('value', 'key');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Default Heading' }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'de7f88db62f13430e772c1a0870cec9563c001cb';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>

</head>

<style>
    .dropdown{
    position:relative;
}

.dropdown-toggle{
    display:flex;
    align-items:center;
    gap:5px;
}

.dropdown-menu-custom{
    position:absolute;
    top:120%;
    left:0;

    min-width:220px;

    background:white;

    border-radius:14px;

    padding:10px 0;

    box-shadow:0 15px 40px rgba(0,0,0,0.08);

    opacity:0;
    visibility:hidden;
    transform:translateY(10px);

    transition:.3s ease;

    z-index:999;
}

.dropdown-menu-custom li{
    list-style:none;
}

.dropdown-menu-custom li a{
    display:block;

    padding:12px 18px;

    color:#111827;
    text-decoration:none;

    font-size:14px;
    font-weight:500;

    transition:.2s;
}

.dropdown-menu-custom li a:hover{
    background:#f9fafb;
    color:#7c3aed;
    padding-left:24px;
}

.dropdown:hover .dropdown-menu-custom{
    opacity:1;
    visibility:visible;
    transform:translateY(0);
}

.translate-li{
    display:flex;
    align-items:center;
    margin-left:10px;
}

/* Hide ugly google branding */
.goog-logo-link,
.goog-te-gadget span{
    display:none !important;
}

.goog-te-gadget{
    color:transparent !important;
    font-size:0;
}

/* Dropdown styling */
.goog-te-combo{
    background:#fff;
    border:1px solid #e5e7eb;
    padding:8px 12px;
    border-radius:10px;
    font-size:14px;
    font-family:'Poppins', sans-serif;
    cursor:pointer;
    outline:none;
    transition:.3s;
}

.goog-te-combo:hover{
    border-color:#7c3aed;
}

/* Remove top ugly bar */
body{
    top:0 !important;
}

.goog-te-banner-frame{
    display:none !important;
}
</style>
<body>

<!-- NAVBAR -->
<header class="navbar">

    <!-- LOGO -->

    <div class="logo">
        {{ $settings['site_name']}}
    </div>

    <!-- HAMBURGER ICON -->

    <div class="hamburger" id="hamburger">

        <i class='bx bx-menu'></i>

    </div>

    <!-- NAV LINKS -->

    <ul class="nav-links" id="navLinks">

        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="#market">Markets</a></li>
        <li><a href="#plans">Plans</a></li>
        <li><a href="#offer">Offers</a></li>
         <!-- <li class="dropdown">
             <a href="#" class="dropdown-toggle">
                Features <i class='bx bx-chevron-down'></i>
            </a>

            <ul class="dropdown-menu-custom">
                <li>
                    <a href="/features/pos">POS Features</a>
                </li>

                <li>
                    <a href="/features/inventory">Inventory Management</a>
                </li>

                <li>
                    <a href="/features/reports">Reports & Analytics</a>
                </li>
            </ul>
        </li>  -->
        <li class="translate-li"><div id="google_translate_element"></div></li>

        <!-- MOBILE BUTTONS -->

        <div class="mobile-buttons">

            <a href="{{ route('login') }}">
                <button class="login-btn">
                    Login
                </button>
            </a>

            <a href="{{ route('register') }}">
                <button class="signup-btn">
                    Get Started
                </button>
            </a>

        </div>

    </ul>

    <!-- DESKTOP BUTTONS -->

    <div class="nav-buttons">

        <a href="{{ route('login') }}">
            <button class="login-btn">
                Login
            </button>
        </a>

        <a href="{{ route('register') }}">
            <button class="signup-btn">
                Get Started
            </button>
        </a>

    </div>

</header>


<!-- ========================= -->
<!-- LIVE MARKET TICKER -->
<!-- ========================= -->
<!-- 
<section class="ticker-section" id="market">

    <div class="ticker-wrapper">

        <div class="ticker-track">

            FIRST LOOP

            @foreach($data as $coin)

                <div class="ticker-item">

                    <img src="{{ $coin['image'] }}" alt="">

                    <div class="ticker-info">

                        <h4>
                            {{ strtoupper($coin['symbol']) }}/USD
                        </h4>

                        <p>
                            ${{ number_format($coin['current_price'], 2) }}
                        </p>

                    </div>

                    <span class="
                        {{ $coin['price_change_percentage_24h'] >= 0
                        ? 'positive'
                        : 'negative' }}
                    ">

                        {{ number_format($coin['price_change_percentage_24h'], 2) }}%

                    </span>

                </div>

            @endforeach

            DUPLICATE FOR INFINITE SLIDE 

            @foreach($data as $coin)

                <div class="ticker-item">

                    <img src="{{ $coin['image'] }}" alt="">

                    <div class="ticker-info">

                        <h4>
                            {{ strtoupper($coin['symbol']) }}/USD
                        </h4>

                        <p>
                            ${{ number_format($coin['current_price'], 2) }}
                        </p>

                    </div>

                    <span class="
                        {{ $coin['price_change_percentage_24h'] >= 0
                        ? 'positive'
                        : 'negative' }}
                    ">

                        {{ number_format($coin['price_change_percentage_24h'], 2) }}%

                    </span>

                </div>

            @endforeach

        </div>

    </div>

</section> -->

<!-- HERO -->

<section class="hero">

    <div class="hero-left">

        <div class="hero-badge">
            Trusted by 50,000+ investors worldwide
        </div>

        <h1>
            Leading The Way In <br>
            Online <span>Mirror Trading</span>
        </h1>

        <p>At Vartex, we understand that navigating the complex world of finance can be a daunting task. That's why we are here to simplify the process and empower you to make informed decisions about your financial future. As a leading online brokerage platform, we are dedicated to providing you with the tools, resources, and expert guidance you need to achieve your financial goals.</p>

        <div class="hero-buttons">

            <a href="{{ route('register') }}">
                <button class="start-btn">Join Now</button>
            </a>

            <a href="#market">
                <button class="market-btn">View Market</button>
            </a>

        </div>

        <div class="hero-features">

            <div class="feature-box">
                <h4>Secure & Safe</h4>
                <p>Bank-level security</p>
            </div>

            <div class="feature-box">
                <h4>Low Fees</h4>
                <p>Transparent pricing</p>
            </div>

            <div class="feature-box">
                <h4>24/7 Support</h4>
                <p>We're here to help</p>
            </div>

            <div class="feature-box">
                <h4>Day Trader</h4>
                <p>open Day-to-Day trades</p>
            </div>

        </div>

    </div>

    <div class="hero-right">

        <div class="dashboard-card">

            <img src="https://images.unsplash.com/photo-1642104704074-907c0698cbd9?q=80&w=1170&auto=format&fit=crop" alt="Dashboard">

        </div>

    </div>

</section>

<!-- MARKET -->

<!-- ========================= -->
<!-- HOW IT WORKS SECTION -->
<!-- ========================= -->

<section class="steps-section">

    <!-- TITLE -->

    <div class="steps-title">

        <span>How It’s Work</span>

        <h1>
            <span>Start Trading</span>
            on Your Terms
        </h1>

    </div>

    <!-- STEPS -->

    <div class="steps-container">

        <!-- STEP 1 -->

        <div class="step-card">

            <div class="step-icon">
                <i class='bx bx-user-plus'></i>
            </div>

            <h2>
                Open <br>
                your account
            </h2>

            <!-- <p>
                Create an account with us
            </p> -->

            <div class="step-bottom">
                Step 01
            </div>

        </div>

        <!-- ARROW -->

        <div class="step-arrow">
            <i class='bx bx-right-arrow-alt'></i>
        </div>

        <!-- STEP 2 -->

        <div class="step-card">

            <div class="step-icon">
                <i class='bx bx-wallet'></i>
            </div>

            <h2>
                Make <br>
                Deposit
            </h2>

            <!-- <p>
                Fund your trading wallet
            </p> -->

            <div class="step-bottom">
                Step 02
            </div>

        </div>

        <!-- ARROW -->

        <div class="step-arrow">
            <i class='bx bx-right-arrow-alt'></i>
        </div>

        <!-- ACTIVE STEP -->

        <div class="step-card active-step">

            <div class="step-icon">
                <i class='bx bx-line-chart'></i>
            </div>

            <h2>
                Select a Trader <br>
                to Copy
            </h2>

            <!-- <p>
                Start automated trading
            </p> -->

            <div class="step-bottom">
                Step 03
            </div>

        </div>

        <!-- ARROW -->

        <div class="step-arrow">
            <i class='bx bx-right-arrow-alt'></i>
        </div>

        <!-- STEP 4 -->

        <div class="step-card">

            <div class="step-icon">
                <i class='bx bx-dollar-circle'></i>
            </div>

            <h2>
                Relax and <br>
                make money
            </h2>

            <!-- <p>
                Earn passive daily profits
            </p> -->

            <div class="step-bottom">
                Step 04
            </div>

        </div>

    </div>

    <!-- FOOT TEXT -->

    <p class="steps-footer">

        Everything you need to trade Forex in one place.

    </p>

</section>



<!-- ========================= -->
<!-- FOREX HERO SECTION -->
<!-- ========================= -->

<section class="forex-section">

    <div class="forex-container">

        <!-- LEFT -->

        <div class="forex-left">

            <span class="forex-tag">
                Trade Forex
            </span>

            <h1>
                Forex Markets <br>
                with Competitive Prices
            </h1>

            <h3>
                Trade Over 140 FX Pairs
            </h3>

            <p>
                Major pairs like EUR/USD and GBP/USD dominate
                the market, while exotic pairs involve currencies
                from smaller economies. The Forex market is known
                for its liquidity, providing ample opportunities
                for traders to engage in transactions.
            </p>

            <a href="#" class="forex-btn">

                Get Started

                <span>↘</span>

            </a>

        </div>

        <!-- RIGHT -->

        <div class="forex-right">

            <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1200&auto=format&fit=crop" alt="">

        </div>

    </div>

</section>

<!-- PLANS -->

<section class="plan-section" id="plans">

    <div class="section-title">
        <h2>Investment Plans</h2>
        <p>Choose a plan that suits your financial goals</p>
    </div>

    <div class="plan-grid">

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

            <a href="{{ route('login') }}"><button>Invest Now</button></a>

        </div>

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

            <a href="{{ route('login') }}"><button>Invest Now</button></a>

        </div>

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

            <a href="{{ route('login') }}"><button>Invest Now</button></a>

        </div>

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

            <a href="{{ route('login') }}"><button>Invest Now</button></a>

        </div>

    </div>

</section>

<!-- DASHBOARD -->

<section class="dashboard-preview">

    <div class="dashboard-left">

        <h2>
            Powerful Investment Dashboard
        </h2>

        <p>
            Monitor your profits, withdrawals, deposits,
            and investment growth using advanced analytics
            and live market tracking.
        </p>

        <button>Open Dashboard</button>

    </div>

    <div class="dashboard-right">

        <img src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?q=80&w=1200&auto=format&fit=crop" alt="Dashboard">

    </div>

</section>

<!-- SERVICES SECTION -->

<section class="services-section" id="offer">

    <div class="services-container">

        <!-- CARD 1 -->

        <div class="service-card">

            <div class="service-icon">
                <i class='bx bx-line-chart'></i>
            </div>

            <h5>WE OFFER</h5>

            <h2>Copy Trading</h2>

            <p>
                Replicate and execute the positions
                taken by experienced traders.
            </p>

            <a href="#">
                Read More
                <span>↘</span>
            </a>

        </div>

        <!-- ACTIVE CARD -->

        <div class="service-card active-card">

            <div class="service-icon">
                <i class='bx bx-bar-chart-alt-2'></i>
            </div>

            <h5>WE OFFER</h5>

            <h2>Stocks Trading</h2>

            <p>
                Participate in the growth and success
                of publicly traded companies.
            </p>

            <a href="#">
                Read More
                <span>↘</span>
            </a>

        </div>

        <!-- CARD 3 -->

        <div class="service-card">

            <div class="service-icon">
                <i class='bx bx-trending-up'></i>
            </div>

            <h5>WE OFFER</h5>

            <h2>Options Trading</h2>

            <p>
                Options trading has emerged as a
                powerful tool for investors.
            </p>

            <a href="#">
                Read More
                <span>↘</span>
            </a>

        </div>

    </div>

</section>

<!-- WHY CHOOSE US -->

<section class="choose-section">

    <div class="choose-overlay"></div>

    <div class="choose-container">

        <!-- LEFT -->

        <div class="choose-left">

            <h1>
                Why <span>Choose Us</span>
            </h1>

            <div class="choose-grid">

                <!-- CARD -->

                <div class="choose-card">

                    <div class="choose-content">

                        <h2>Friendly & Expert</h2>

                        <p>
                            We have seasoned experts in stock
                            trading and investment analysis.
                        </p>

                    </div>

                    <div class="choose-bottom">

                        <i class='bx bx-user'></i>

                    </div>

                </div>

                <!-- CARD -->

                <div class="choose-card active-choose">

                    <div class="choose-content">

                        <h2>24/7 Support</h2>

                        <p>
                            Our support team is always available
                            to respond to your questions.
                        </p>

                    </div>

                    <div class="choose-bottom">

                        <i class='bx bx-headphone'></i>

                    </div>

                </div>

                <!-- CARD -->

                <div class="choose-card">

                    <div class="choose-content">

                        <h2>Demo Account</h2>

                        <p>
                            Practice and learn investing before
                            trading with real money.
                        </p>

                    </div>

                    <div class="choose-bottom">

                        <i class='bx bx-network-chart'></i>

                    </div>

                </div>

                <!-- CARD -->

                <div class="choose-card active-choose">

                    <div class="choose-content">

                        <h2>Award Winner</h2>

                        <p>
                            Recognized globally for excellence
                            in investment services.
                        </p>

                    </div>

                    <div class="choose-bottom">

                        <i class='bx bx-medal'></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- MARKET CAROUSEL SECTION -->
<!-- ========================= -->

<section class="market-carousel-section">

    <!-- TOP -->

    <div class="market-top">

        <div class="market-title">

            <span>Markets</span>

            <h1>
                Wide Range of
                <span>Markets</span>
            </h1>

        </div>

        <!-- ARROWS -->

        <div class="market-arrows">

            <button class="arrow-btn" id="prevBtn">
                <i class='bx bx-left-arrow-alt'></i>
            </button>

            <button class="arrow-btn" id="nextBtn">
                <i class='bx bx-right-arrow-alt'></i>
            </button>

        </div>

    </div>

    <!-- SLIDER -->

    <div class="market-slider-wrapper">

        <div class="market-slider" id="marketSlider">

            <!-- CARD -->

            <div class="market-slide">

                <img src="https://images.unsplash.com/photo-1610375461246-83df859d849d?q=80&w=1200&auto=format&fit=crop" alt="">

                <div class="market-card-content">

                    <h2>Fixed Income</h2>

                    <p>
                        Fixed income assets generate
                        stable earnings through periodic
                        interest payments.
                    </p>

                    <a href="#">
                        Read More
                        <span>↘</span>
                    </a>

                </div>

            </div>

            <!-- CARD -->

            <div class="market-slide">

                <img src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?q=80&w=1200&auto=format&fit=crop" alt="">

                <div class="market-card-content">

                    <h2>Infrastructure</h2>

                    <p>
                        Invest in infrastructure projects
                        with long-term sustainable growth.
                    </p>

                    <a href="#">
                        Read More
                        <span>↘</span>
                    </a>

                </div>

            </div>

            <!-- CARD -->

            <div class="market-slide">

                <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1200&auto=format&fit=crop" alt="">

                <div class="market-card-content">

                    <h2>Trade Forex</h2>

                    <p>
                        Trade major and minor currency
                        pairs in the global forex market.
                    </p>

                    <a href="#">
                        Read More
                        <span>↘</span>
                    </a>

                </div>

            </div>

            <!-- CARD -->

            <div class="market-slide">

                <img src="https://images.unsplash.com/photo-1640161704729-cbe966a08476?q=80&w=1200&auto=format&fit=crop" alt="">

                <div class="market-card-content">

                    <h2>Crypto Assets</h2>

                    <p>
                        Explore cryptocurrency investments
                        with secure trading solutions.
                    </p>

                    <a href="#">
                        Read More
                        <span>↘</span>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- BOXICONS -->



<!-- FOOTER -->

<footer>

    <div class="footer-top">

        <div class="footer-logo">
            <h2>VartexTrade</h2>
            <p>Modern stock investment platform.</p>
        </div>

        <div class="footer-links">

            <h3>Quick Links</h3>

            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#market">Markets</a></li>
                <li><a href="#plans">Plans</a></li>
                <li><a href="#offer">Offers</a></li>
                <li><a href="#features">Features</a></li>
            </ul>

        </div>

        <div class="footer-links">

            <h3>Resources</h3>

            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Get Started</a></li>
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>

        </div>

    </div>

    <div class="footer-bottom">
        © 2012 VartexTrade. All Rights Reserved.
    </div>

</footer>

<script type="text/javascript">
function googleTranslateElementInit() {

    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');

}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>

const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("navLinks");
const menuIcon = hamburger.querySelector("i");

hamburger.addEventListener("click", () => {

    navLinks.classList.toggle("active");

    // CHANGE ICON

    if(navLinks.classList.contains("active")){

        menuIcon.classList.remove("bx-menu");
        menuIcon.classList.add("bx-x");

    }else{

        menuIcon.classList.remove("bx-x");
        menuIcon.classList.add("bx-menu");

    }

});

</script>

<script>

const slider = document.getElementById("marketSlider");

const nextBtn = document.getElementById("nextBtn");

const prevBtn = document.getElementById("prevBtn");

const cardWidth = 380;

/* ========================= */
/* BUTTON SLIDE */
/* ========================= */

nextBtn.onclick = () => {

    slider.scrollBy({
        left: cardWidth,
        behavior: "smooth"
    });

};

prevBtn.onclick = () => {

    slider.scrollBy({
        left: -cardWidth,
        behavior: "smooth"
    });

};

/* ========================= */
/* AUTO INFINITE SLIDE */
/* ========================= */

let autoSlide = setInterval(() => {

    /* IF END REACHED */

    if (
        slider.scrollLeft + slider.clientWidth
        >= slider.scrollWidth - 5
    ) {

        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });

    }

    else{

        slider.scrollBy({
            left: cardWidth,
            behavior: "smooth"
        });

    }

}, 3000);

/* ========================= */
/* PAUSE ON HOVER */
/* ========================= */

slider.addEventListener("mouseenter", () => {

    clearInterval(autoSlide);

});

/* ========================= */
/* RESUME */
/* ========================= */

slider.addEventListener("mouseleave", () => {

    autoSlide = setInterval(() => {

        if (
            slider.scrollLeft + slider.clientWidth
            >= slider.scrollWidth - 5
        ) {

            slider.scrollTo({
                left: 0,
                behavior: "smooth"
            });

        }

        else{

            slider.scrollBy({
                left: cardWidth,
                behavior: "smooth"
            });

        }

    }, 3000);

});


</script>

</body>
</html>