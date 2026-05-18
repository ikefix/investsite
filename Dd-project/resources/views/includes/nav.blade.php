<style>

.navbar{
    width:100%;
    padding:18px 7%;
    top:0;
    left:0;
    z-index:1000;
    background:rgba(2,6,23,0.95) !important;
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(255,255,255,0.05);
}

.con-nav{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

/* LOGO */

.logo{
    font-size:30px;
    font-weight:700;
    color:#3b82f6;
}

/* NAV LINKS */

.nav-links{
    display:flex;
    align-items:center;
    gap:15px;
}

.nav-links .nav-link{
    color:white !important;
    font-size:15px;
    font-weight:500;
    transition:0.3s ease;
    position:relative;
}

.nav-links .nav-link:hover{
    color:#3b82f6 !important;
}

.nav-links .nav-link::after{
    content:'';
    width:0%;
    height:2px;
    background:#3b82f6;
    position:absolute;
    left:0;
    bottom:-5px;
    transition:0.3s;
}

.nav-links .nav-link:hover::after{
    width:100%;
}

/* BUTTON AREA */

.nav-buttons{
    display:flex;
    align-items:center;
    gap:15px;
}

/* BUTTONS */

.login-btn{
    padding:12px 24px;
    border:1px solid #3b82f6;
    background:transparent;
    color:white;
    border-radius:10px;
    cursor:pointer;
    transition:0.4s ease;
    font-weight:500;
}

.login-btn:hover{
    background:#3b82f6;
    transform:translateY(-3px);
}

.signup-btn{
    padding:12px 24px;
    background:#2563eb;
    border:none;
    color:white;
    border-radius:10px;
    cursor:pointer;
    transition:0.4s ease;
    font-weight:500;
}

.signup-btn:hover{
    background:#1d4ed8;
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(37,99,235,0.4);
}

/* USER */

.user-name{
    color:white !important;
    font-weight:600;
}

/* DROPDOWN */

.custom-dropdown{
    background:#0f172a !important;
    border:1px solid rgba(255,255,255,0.05);
    border-radius:15px;
    padding:10px;
    min-width:220px;
    margin-top:15px;
}

.custom-dropdown .dropdown-item{
    color:white;
    padding:12px 15px;
    border-radius:10px;
    transition:0.3s;
    margin-bottom:5px;
}

.custom-dropdown .dropdown-item:hover{
    background:#1e293b;
    color:#3b82f6;
}

.custom-dropdown i{
    margin-right:10px;
}

/* LOGOUT */

.logout-btn{
    color:#ef4444 !important;
}

.logout-btn:hover{
    background:rgba(239,68,68,0.1) !important;
}

/* TOGGLER */

.navbar-toggler{
    border:none;
    box-shadow:none !important;
}

.navbar-toggler-icon{
    filter:invert(1);
}

/* RESPONSIVE */

@media(max-width:991px){

    .navbar{
        padding:15px 5%;
    }

    .nav-links{
        margin-top:20px;
        gap:5px;
    }

    .nav-buttons{
        margin-top:20px;
        align-items:flex-start;
    }

    .navbar-collapse{
        background:#020617;
        padding:20px;
        border-radius:15px;
        margin-top:15px;
    }

    .signup-btn,
    .login-btn{
        width:100%;
    }

}

</style>

<nav class="navbar navbar-expand-lg">

    <div class="container con-nav">

        <!-- LOGO -->

        <a class="navbar-brand" href="{{ url('/') }}">

            <div class="logo">
                InvestPro
            </div>

        </a>

        <!-- MOBILE TOGGLER -->

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- NAV CONTENT -->

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">

            <!-- LEFT NAV -->

            <ul class="navbar-nav mx-auto nav-links">

                @guest

                    <!-- SHOW WHEN NOT LOGGED IN -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#market">
                            Markets
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#plans">
                            Plans
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            Features
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            Contact
                        </a>
                    </li>

                @else

                    <!-- SHOW WHEN LOGGED IN -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/deposit') }}">
                            Deposit
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/withdraw') }}">
                            Withdraw
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/plans') }}">
                            Packages
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/terms') }}">
                            Terms
                        </a>
                    </li>

                @endguest

            </ul>

            <!-- RIGHT -->

            <ul class="navbar-nav ms-auto align-items-center nav-buttons">

                @guest

                    <!-- LOGIN -->

                    <li class="nav-item">

                        <a href="{{ route('login') }}">

                            <button class="login-btn">
                                Login
                            </button>

                        </a>

                    </li>

                    <!-- REGISTER -->

                    <li class="nav-item">

                        <a href="{{ route('register') }}">

                            <button class="signup-btn">
                                Get Started
                            </button>

                        </a>

                    </li>

                @else

                    <!-- USER DROPDOWN -->

                    <li class="nav-item dropdown">

                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle user-name"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            {{ Auth::user()->name }}

                        </a>

                        <!-- DROPDOWN -->

                        <div class="dropdown-menu dropdown-menu-end custom-dropdown">

                            <a class="dropdown-item"
                               href="{{ url('/profile') }}">

                                <i class='bx bx-user'></i>
                                Profile

                            </a>

                            <hr>

                            <a class="dropdown-item logout-btn"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">

                                Logout

                            </a>

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  class="d-none">

                                @csrf

                            </form>

                        </div>

                    </li>

                @endguest

            </ul>

        </div>

    </div>

</nav>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>