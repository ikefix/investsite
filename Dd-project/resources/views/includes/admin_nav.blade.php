<nav class="admin-nav">
    <div class="nav-container">
        <div class="logo">
            <img src="{{ asset('storage/' . ($settings['site_logo'] ?? 'default-logo.png')) }}">
        </div>
        
        <!-- Hamburger Menu Button -->
        <button class="hamburger" id="nav-toggle">
            ☰
        </button>

        <!-- Navigation Links -->
        <ul class="nav-links" id="nav-menu">
            <li><a href="{{ url('/admin/index') }}">Admin Dashboard</a></li>
            <li><a href="{{ url('/admin/balance') }}">Deposit Users</a></li>
            <li><a href="{{ url('/admin/deposit-balance') }}">Invest Users</a></li>
            <li><a href="{{ route('admin.deposits') }}">View Deposit</a></li>
            <li><a href="{{ url('/admin/notifications') }}">View Invests</a></li>
            <li><a href="{{ route('admin.withdrawals') }}">Withdrawal Requests</a></li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item ad" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
        </ul>
    </div>
</nav>