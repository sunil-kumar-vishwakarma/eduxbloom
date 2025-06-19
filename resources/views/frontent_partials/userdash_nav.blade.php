<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f9fc;
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 30px;
        background: #ffffff;
        border-bottom: 1px solid #e4e9f0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    .topbar h1 {
        font-size: 1.6rem;
        color: #2b2d42;
        margin: 0;
    }

    .profile-menu {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .notification-icon {
        position: relative;
        cursor: pointer;
        font-size: 1.5rem;
        color: #2b2d42;
        transition: transform 0.3s ease;
    }

    .notification-icon:hover {
        transform: scale(1.1);
        color: #bb0e45;
    }

    .notification-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #bb0e45;
        color: white;
        font-size: 0.7rem;
        padding: 4px 6px;
        border-radius: 50%;
        font-weight: bold;
        box-shadow: 0 0 0 2px #fff;
    }

    .notification-dropdown {
        display: block;
        position: absolute;
        right: 40px;
        top: 60px;
        background: #fff;
        border-radius: 14px;
        width: 340px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        z-index: 200;
        opacity: 0;
        transform: translateY(-20px);
        pointer-events: none;
        transition: all 0.35s ease-in-out;
    }

    .notification-dropdown.active {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .notification-dropdown h4 {
        padding: 16px 22px;
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        border-bottom: 1px solid #eaeaea;
        background: #f8f8f8;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
        color: #1c1c1e;
    }

    .notification-dropdown ul {
        list-style: none;
        margin: 0;
        padding: 0;
        max-height: 300px;
        overflow-y: auto;
    }

    .notification-dropdown ul li {
        padding: 15px 22px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 0.95rem;
        color: #2b2d42;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: background 0.2s ease;
        cursor: pointer;
    }

    .notification-dropdown ul li:hover {
        background: #f1f5f9;
    }

    .notification-dropdown ul li i {
        color: #bb0e45;
        font-size: 1.1rem;
    }

    .profile-icon {
        font-size: 1.8rem;
        color: #2b2d42;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .profile-icon:hover {
        color: #bb0e45;
    }

    @media (max-width: 768px) {
        .notification-dropdown {
            right: 0px;
            left: auto;
            width: calc(100vw - 20px);
            max-width: 340px;
            box-sizing: border-box;
        }

        .topbar {
            /* flex-direction: column; */
            align-items: flex-start;
            gap: 70px;
            padding: 15px;
        }

        .profile-menu {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>

<div class="topbar">
    <h1>Dashboard</h1>
    <div class="profile-menu">
        <!-- Notification Icon -->
        <div id="notificationIcon" class="notification-icon" aria-label="Notifications" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </div>

        <!-- Notification Dropdown -->
        <div class="notification-dropdown" id="notificationDropdown" role="menu" aria-labelledby="notificationIcon">
            <h4>Notifications</h4>
            <ul>
                <li tabindex="0"><i class="fas fa-user-plus"></i> New user registered</li>
                <li tabindex="0"><i class="fas fa-shopping-cart"></i> New order placed</li>
                <li tabindex="0"><i class="fas fa-eye"></i> Your profile was viewed</li>
                <li tabindex="0"><i class="fas fa-check-circle"></i> Payment received</li>
                <li tabindex="0"><i class="fas fa-sync-alt"></i> System update available</li>
            </ul>
        </div>

        <!-- Profile Icon -->
        <i class="fa-solid fa-user-circle profile-icon" id="profileIcon"></i>

        <!-- Profile Dropdown -->
        <!-- Profile Dropdown -->
        <div class="dropdown" id="profileDropdownnn">
            <h3>Account</h3>
           
             <p id="displayName">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</p>

            <p id="displayEmail">{{ Auth::check() ? Auth::user()->email : 'Guest' }}</p>
            <hr />
            {{-- <a href="{{ route('userprofile') }}"><i class="fa-solid fa-user"></i> My Profile</a> --}}
            {{-- <hr /> --}}
            <a href="{{ route('logout_user') }}"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
        </div>



    </div>
</div>
<!-- LocalStorage injection -->
<script>
    window.addEventListener("DOMContentLoaded", () => {
        const name = localStorage.getItem("studentName");
        const email = localStorage.getItem("studentEmail");

        if (name && email) {
            const nameElem = document.getElementById("displayName");
            const emailElem = document.getElementById("displayEmail");

            if (nameElem) nameElem.textContent = name;
            if (emailElem) emailElem.textContent = email;
        }
    });
</script>
<script>
    const notificationIcon = document.getElementById('notificationIcon');
    const notificationDropdown = document.getElementById('notificationDropdown');

    document.addEventListener('click', function(e) {
        const isIconClicked = notificationIcon.contains(e.target);
        const isDropdownClicked = notificationDropdown.contains(e.target);

        if (isIconClicked) {
            notificationDropdown.classList.toggle('active');
            notificationIcon.setAttribute('aria-expanded', notificationDropdown.classList.contains('active'));
        } else if (!isDropdownClicked) {
            notificationDropdown.classList.remove('active');
            notificationIcon.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            notificationDropdown.classList.remove('active');
            notificationIcon.setAttribute('aria-expanded', 'false');
        }
    });
</script>
 <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profileIcon = document.getElementById('profileIcon');
            const profileDropdownnn = document.getElementById('profileDropdownnn');

            profileIcon.addEventListener('click', () => {
                // Toggle dropdown visibility
                profileDropdownnn.style.display =
                    profileDropdownnn.style.display === 'block' ? 'none' : 'block';
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!profileIcon.contains(event.target) && !profileDropdownnn.contains(event.target)) {
                    profileDropdownnn.style.display = 'none';
                }
            });
        });

        function toggleContent() {
            const content = document.getElementById('toggle-content');
            content.classList.toggle('hidden');
        }


        function toggleContent1() {
            const content = document.getElementById('toggle-content1');
            // Toggle the display property between 'none' and 'block'
            content.style.display = content.style.display === 'none' || !content.style.display ?
                'block' :
                'none';
        }
    </script>
