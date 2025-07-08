
@auth
   

 @php
    $user = auth()->user();
    $isAdmin = $user && $user->is_admin == 1;
@endphp
<aside id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;">
            <h2>EduX</h2>
        </a>
    </div>

  

    <ul class="sidebar-menu">
        {{-- ✅ Dashboard --}}
     



@if(!empty($isAdmin))
    {{-- Admin view --}}
    <li class="menu-item">
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-chart-line icon"></i> Dashboard
        </a>
    </li>
@else
@can('View Dashboard')

    <li class="menu-item">
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-chart-line icon"></i> Dashboard
        </a>
    </li>
    @endcan
@endif


        {{-- ✅ Student List --}}
        @if($isAdmin || $user->can('View Student'))
        <li class="menu-item">
            <a href="{{ route('students-list') }}" class="{{ request()->routeIs('students-list') ? 'active' : '' }}">
                <i class="fas fa-user-graduate icon"></i> Student List
            </a>
        </li>
        @endif

        {{-- ✅ Mentor Applications --}}
        @if($isAdmin || $user->can('View Mentor'))
        <li class="menu-item">
            <a href="{{ route('admin.mentors') }}" class="{{ request()->routeIs('admin.mentors') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher icon"></i> Mentor Applications
            </a>
        </li>
        @endif

         {{-- ✅ Mentor Applications --}}
        @if($isAdmin || $user->can('View Applynow'))
        <li class="menu-item">
            <a href="{{ route('admin.applynow.program') }}" class="{{ request()->routeIs('admin.applynow.program') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher icon"></i> Apply Program Applications
            </a>
        </li>
        @endif

        

        {{-- ✅ Webinars --}}
        @if($isAdmin || $user->can('View Webinar'))
        <li class="menu-item">
            <a href="{{ route('webinars.index') }}" class="{{ request()->routeIs('webinars.index') ? 'active' : '' }}">
                <i class="fas fa-video icon"></i> Webinar's List
            </a>
        </li>
        @endif

        {{-- ✅ Roles Permission --}}
        @if($isAdmin || $user->can('Roles Permission'))
        <li class="menu-item">
            <a href="{{ route('roles_permission.index') }}" class="{{ request()->routeIs('roles_permission.index') ? 'active' : '' }}">
                <i class="fas fa-user-shield icon"></i> Roles Permission
            </a>
        </li>
        @endif

        {{-- ✅ Contact Info --}}
        @if($isAdmin || $user->can('View Contact Info'))
        <li class="menu-item">
            <a href="{{ route('contact-infos.index') }}" class="{{ request()->routeIs('contact-infos.index') ? 'active' : '' }}">
                <i class="fas fa-envelope icon"></i> Contact Info
            </a>
        </li>
        @endif

        @if($isAdmin || $user->can('View Contact Info'))
        <li class="menu-item">
            <a href="{{ route('consultation.booking') }}" class="{{ request()->routeIs('consultation.booking') ? 'active' : '' }}">
                <i class="fas fa-envelope icon"></i> Consultation Booking
            </a>
        </li>
        @endif

        

        {{-- ✅ Stats --}}
        @if($isAdmin || $user->can('View State'))
        <li class="menu-item">
            <a href="{{ route('stats.index') }}" class="{{ request()->routeIs('stats.index') ? 'active' : '' }}">
                <i class="fas fa-chart-line icon"></i> State's
            </a>
        </li>
        @endif

         <li class="menu-item">
            <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                <i class="fas fa-book-reader icon"></i> Category
            </a>
        </li>
         <li class="menu-item">
            <a href="{{ route('subcategory.index') }}" class="{{ request()->routeIs('subcategory.index') ? 'active' : '' }}">
                <i class="fas fa-book-reader icon"></i> Sub Category
            </a>
        </li>

        {{-- ✅ Program List --}}
        @if($isAdmin || $user->can('View Program'))
        <li class="menu-item">
            <a href="{{ route('discover_program-list') }}" class="{{ request()->routeIs('discover_program-list') ? 'active' : '' }}">
                <i class="fas fa-book-reader icon"></i> Program List
            </a>
        </li>
        @endif

        {{-- ✅ EduX Team --}}
        @if($isAdmin || $user->can('View Team'))
        <li class="menu-item">
            <a href="{{ route('partners-list') }}" class="{{ request()->routeIs('partners-list') ? 'active' : '' }}">
                <i class="fas fa-users icon"></i> Edu-x Team
            </a>
        </li>
        @endif

        {{-- ✅ Privacy Policy --}}
        @if($isAdmin || $user->can('View Privacy Policy'))
        <li class="menu-item">
            <a href="{{ route('pages.edit_privacy') }}" class="{{ request()->routeIs('pages.edit_privacy') ? 'active' : '' }}">
                <i class="fas fa-user-secret icon"></i> Privacy Policy
            </a>
        </li>
        @endif

        {{-- ✅ Terms and Conditions --}}
        @if($isAdmin || $user->can('View Term and Condition'))
        <li class="menu-item">
            <a href="{{ route('pages.edit_term') }}" class="{{ request()->routeIs('pages.edit_term') ? 'active' : '' }}">
                <i class="fas fa-file-contract icon"></i> Term and Condition
            </a>
        </li>
        @endif

        {{-- ✅ Blog List --}}
        @if($isAdmin || $user->can('View Blog'))
        <li class="menu-item">
            <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.index') ? 'active' : '' }}">
                <i class="fas fa-newspaper icon"></i> Blog List
            </a>
        </li>
        @endif

        {{-- ✅ Payment Dropdown --}}
        @if($isAdmin || $user->can('View Payment'))
        <li class="menu-item dropdown">
            <i class="fas fa-wallet icon"></i> Payment ▼
            <ul class="submenu">
                <li class="submenu-item"><a href="{{ route('received-payments') }}" class="{{ request()->routeIs('received-payments') ? 'active' : '' }}">Received</a></li>
                <li class="submenu-item"><a href="{{ route('failed-payments') }}" class="{{ request()->routeIs('failed-payments') ? 'active' : '' }}">Failed/Pending</a></li>
                <li class="submenu-item"><a href="{{ route('payment-setup') }}" class="{{ request()->routeIs('payment-setup') ? 'active' : '' }}">Setup Method</a></li>
            </ul>
        </li>
        @endif

        {{-- ✅ Notifications --}}
        @if($isAdmin || $user->can('View Notification'))
        <li class="menu-item">
            <a href="{{ route('notifications') }}" class="{{ request()->routeIs('notifications') ? 'active' : '' }}">
                <i class="fas fa-bell icon"></i> Notification
            </a>
        </li>
        @endif

        {{-- ✅ Settings --}}
        @if($isAdmin || $user->can('View Settings'))
        <li class="menu-item">
            <a href="{{ route('settings.index') }}" class="{{ request()->routeIs('settings.index') ? 'active' : '' }}">
                <i class="fas fa-sliders-h icon"></i> Settings
            </a>
        </li>
        @endif
    </ul>
</aside>

@endauth