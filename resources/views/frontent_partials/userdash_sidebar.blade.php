 <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <a href="{{ route('userdashboard') }}"
                style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <i class="fa-solid fa-graduation-cap"></i>
                <span class="logo-text">Edu-X</span>
            </a>
        </div>

        <ul class="menu">
            <li>
                <a href="{{ route('userdashboard') }}"
                    class="{{ request()->routeIs('userdashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="menu-text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('usersearchProgram') }}" class="{{ request()->routeIs('usersearchProgram') ? 'active' : '' }}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="menu-text">Programs & Schools</span>
                </a>
            </li>
            <li>
                <a href="{{ route('userprofile') }}" class="{{ request()->routeIs('userprofile') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-circle"></i>
                    <span class="menu-text">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user_myapplication') }}"
                    class="{{ request()->routeIs('user_myapplication') ? 'active' : '' }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span class="menu-text">My Applications</span>
                </a>
            </li>
            <li>
                <a href="{{ route('userpayments') }}"
                    class="{{ request()->routeIs('userpayments') ? 'active' : '' }}">
                    <i class="fa-solid fa-wallet"></i>
                    <span class="menu-text">Payments</span>
                </a>
            </li>
        </ul>

    </div>