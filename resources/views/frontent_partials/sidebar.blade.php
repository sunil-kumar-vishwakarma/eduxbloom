<aside id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;">
            <h2>EduX</h2>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt icon"></i>
                Dashboard
            </a>
        </li>


        <li class="menu-item dropdown">
            <i class="fas fa-building icon"></i> Institute ▼
            <ul class="submenu">

                <li class="submenu-item"> <a href="{{ route('cities.index') }}"
                        class="{{ request()->routeIs('cities-list') ? 'active' : '' }}">City List</a></li>
                <li class="submenu-item"> <a href="{{ route('countries.index') }}"
                        class="{{ request()->routeIs('countries-list') ? 'active' : '' }}">Country List</a></li>
                <li class="submenu-item"> <a href="{{ route('colleges.index') }}"
                        class="{{ request()->routeIs('colleges-list') ? 'active' : '' }}">College List</a></li>
                <li class="submenu-item"> <a href="{{ route('school.index') }}"
                        class="{{ request()->routeIs('schools-list') ? 'active' : '' }}">Schools List</a></li>

            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('students-list') }}" class="{{ request()->routeIs('students-list') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap icon"></i>
                Student List</a>
        </li>

        <li class="menu-item">
            <a href="{{ route('partners-list') }}" class="{{ request()->routeIs('partners-list') ? 'active' : '' }}">
                <i class="fas fa-handshake icon"></i>
                Partner List</a>
        </li>

        <li class="menu-item">
            <a href="{{ route('enquiries-list') }}"
                class="{{ request()->routeIs('enquiries-list') ? 'active' : '' }}">
                <i class="fas fa-file-alt icon"></i>Enquiry List</a>

        </li>

        {{-- <li class="menu-item dropdown">
            <i class="fas fa-wrench icon"></i> Manage ▼
            <ul class="submenu">
                <li class="submenu-item"><a href="{{ route('manage-home') }}"
                        class="{{ request()->routeIs('manage-home') ? 'active' : '' }}">Manage Home</a></li>
                <li class="submenu-item"><a href="{{ route('manage-about') }}"
                        class="{{ request()->routeIs('manage-about') ? 'active' : '' }}">Manage About</a></li>
                <li class="submenu-item"><a href="{{ route('manage-contact') }}"
                        class="{{ request()->routeIs('manage-contact') ? 'active' : '' }}">Manage Contact</a></li>
            </ul>
        </li> --}}

        <li class="menu-item">
            <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.index') ? 'active' : '' }}">
                <i class="fas fa-blog icon"></i>
                Blog List</a>
        </li>

        <li class="menu-item">
            <a href="{{ route('subscriptions.index') }}"
                class="{{ request()->routeIs('subscriptions.index') ? 'active' : '' }}">
                <i class="fas fa-dollar-sign icon"></i>
                Subscription</a>
        </li>

        <li class="menu-item dropdown">
            <i class="fas fa-credit-card icon"></i> Payment ▼
            <ul class="submenu">
                <li class="submenu-item"><a href="{{ route('received-payments') }}"
                        class="{{ request()->routeIs('received-payments') ? 'active' : '' }}">Received</a></li>
                <li class="submenu-item"><a href="{{ route('failed-payments') }}"
                        class="{{ request()->routeIs('failed-payments') ? 'active' : '' }}">Failed/Pending</a></li>
                <li class="submenu-item"><a href="{{ route('payment-setup') }}"
                        class="{{ request()->routeIs('payment-setup') ? 'active' : '' }}">Setup Method</a></li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('notifications') }}" class="{{ request()->routeIs('notifications') ? 'active' : '' }}">
                <i class="fas fa-bell icon"></i>
                Notification</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('settings.index') }}"
                class="{{ request()->routeIs('settings.index') ? 'active' : '' }}">
                <i class="fas fa-cogs icon"></i>
                Settings</a>
        </li>

    </ul>
</aside>
