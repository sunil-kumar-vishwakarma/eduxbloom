<!-- resources/views/partials/navbar.blade.php -->
<header id="navbar" class="navbar">
    <div class="navbar-left">
        <button id="menu-toggle" class="menu-toggle-btn">
            <div></div>
            <div></div>
            <div></div>
        </button>
    </div>
    <div class="navbar-right">
        <img src="{{ asset('public/image/admin logo.png') }}" alt="Profile" class="profile-img">
        {{-- <div class="profile-icon">
            @if (Auth::check() && Auth::user()->profile)
                <img src="{{ asset('public/storage/' . Auth::user()->profile->profile_photo) }}" alt="Profile" class="profile-img">
            @else
                <img src="{{ asset('public/image/admin logo.png') }}" alt="Profile" class="profile-img">
            @endif
        </div> --}}



        <li>
            @if (auth()->check())
                {{ auth()->user()->name ?? null }}
            @else
                Guest
            @endif
        </li>

        <div class="dropdown-menu">
            {{-- <a href="{{ route('profile') }}" class="dropdown-item">Profile</a> --}}

            @if (Auth::check())
                <!-- User is authenticated, so you can access $user->id -->
                <a href="{{ route('profile', Auth::user()->id) }}" class="dropdown-item">View Profile</a>
            @else
                <!-- If the user is not authenticated -->
                <a href="{{ route('login') }}">Login</a>
            @endif

            <!-- Logout Functionality -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
    </div>
</header>
<style>
    .navbar-right li {
        list-style: none;
    }
</style>
