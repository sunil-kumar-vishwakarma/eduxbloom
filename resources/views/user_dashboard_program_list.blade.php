<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />

    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <title>Document</title>
    <style>
        .filter-search-wrapper {
            margin-top: 10%;
        }

        .search-container-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            padding: 0 16px;
        }

        .search-container {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 100%;
            max-width: 1150px;
            border-radius: 8px;
            padding: 16px 20px;
            align-items: center;
            justify-content: space-between;
        }

        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #f1f4f9;
            padding: 10px 14px;
            border-radius: 8px;
            min-width: 250px;
        }

        .search-icon {
            width: 20px;
            height: 20px;
            fill: #333;
        }

        .search-bar {
            border: none;
            outline: none;
            width: 100%;
            font-size: 15px;
            background: transparent;
            color: #333;
        }

        .custom-dropdown {
            position: relative;
            min-width: 200px;
            width: fit-content;
        }

        .dropdown {
            width: 100%;
            appearance: none;
            background-color: #f1f4f9;
            border: none;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 15px;
            color: #333;
            cursor: pointer;
        }

        .dropdown-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #555;
            font-size: 14px;
        }


        .dropdown:focus {
            outline: 2px solid #2764c5;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                align-items: stretch;
                padding: 20px;
            }

            .custom-dropdown {
                min-width: 390px;
            }

            .dropdown,
            .search-box {
                width: 100%;
            }
        }


        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 100%;
            max-width: 1150px;
            border-radius: 16px;
            padding: 16px 20px;
            align-items: center;
            justify-content: space-between;
        }

        .filter-item {
            flex: 1 1 200px;
            position: relative;
        }

        .custom-dropdown select {
            width: 100%;
            appearance: none;
            background-color: #f1f4f9;
            border: 1px solid #d0d7e2;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 15px;
            color: #333;
            font-weight: 500;
            cursor: pointer;
            transition: border 0.3s ease;
        }

        .custom-dropdown select:focus {
            border-color: #2764c5;
            outline: none;
        }


        .filter-btn-wrapper {
            flex: 1 1 200px;
        }

        .filter-btn {
            background-color: #2764c5;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s ease;
        }

        .filter-btn:hover {
            background-color: #1f4fa1;
        }

        .filter-icon {
            width: 18px;
            height: 18px;
            fill: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-item,
            .filter-btn-wrapper {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 1024px) {
            .search-container {
                padding: 16px 0;
            }

            .filters {
                padding: 16px 0;
            }

        }


        .programs-container {
            display: grid;
            grid-template-columns: repeat(3, minmax(300px, 1fr));
            gap: 24px;
            padding: 40px 20px;
        }

        .program-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .program-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .program-header a:hover {
            text-decoration: underline;
        }

        .program-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .program-header h3 {
            font-size: 16px;
            margin: 0;
            color: #1a1a1a;
            font-weight: 700;
            line-height: 1.4;
        }

        .program-badges {
            margin: 10px 0;
            display: flex;
            gap: 10px;
        }

        .badge {
            background-color: #2764c5;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .program-details small {
            color: #888;
            font-size: 13px;
        }

        .program-details p {
            margin: 6px 0;
            font-weight: 500;
        }

        .program-details a:hover {
            text-decoration: underline
        }

        .program-details table {
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .program-details td {
            padding: 10px 0;
            color: #333;
            vertical-align: top;
        }

        .program-details tr {
            border-bottom: 1px solid #e0e0e0;
        }

        .program-details tr:last-child {
            border-bottom: none;
        }

        .program-details tr td:first-child {
            font-weight: 600;
            width: 50%;
        }


        .program-footer {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
            /* push footer to bottom */
        }

        .success-btn {
            background-color: rgb(230, 239, 254);
            color: rgb(10, 90, 218);
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            cursor: pointer;
            margin-left: 8px;
        }

        .apply-btn {
            background: #2764c5;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .apply-btn:hover {
            background: #1f4fa1;
        }

        @media (max-width: 768px) {
            .programs-container {
                grid-template-columns: 1fr;
            }
        }

        /* Modal base styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            inset: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            overflow-y: auto;
            padding: 20px;
        }

        .modal.show {
            display: block;
            opacity: 1;
            pointer-events: auto;
        }

        /* Modal content box */
        .modal-content {
            background-color: #fff;
            margin: 60px auto;
            padding: 30px 24px;
            border-radius: 16px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: slideUp 0.4s ease;
        }

        /* Slide up effect */
        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-btn {
            position: absolute;
            top: 14px;
            right: 18px;
            font-size: 26px;
            font-weight: bold;
            color: #999;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #000;
        }

        .note {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Accordion */
        .accordion-item {
            margin-bottom: 10px;
        }

        .accordion-btn {
            background-color: #2764c5;
            color: #fff;
            cursor: pointer;
            padding: 12px 16px;
            width: 100%;
            border: none;
            text-align: left;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .accordion-btn:hover {
            background-color: #1f4fa1;
        }

        .accordion-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
            background: #f7f9fc;
            border-radius: 0 0 8px 8px;
            margin-top: 4px;
            padding: 0 16px;
        }

        .accordion-panel p {
            margin: 10px 0;
            font-size: 14px;
        }

        .accordion-item.open .accordion-panel {
            max-height: 300px;
            padding: 12px 16px;
        }

        /* Additional Info */
        .info-note {
            font-size: 13px;
            color: #555;
            margin-top: 20px;
        }

        /* Responsive breakpoints */

        /* Tablets and below */
        @media (max-width: 768px) {
            .modal-content {
                padding: 24px 20px;
                width: 95%;
                margin: 40px auto;
            }

            .accordion-btn {
                font-size: 14px;
                padding: 10px 14px;
            }

            .accordion-panel p {
                font-size: 13px;
            }

            .note,
            .info-note {
                font-size: 12px;
            }
        }

        /* Small phones */
        @media (max-width: 480px) {
            .modal-content {
                padding: 20px 16px;
                width: 100%;
                margin: 30px auto;
                border-radius: 12px;
            }

            .close-btn {
                top: 10px;
                right: 12px;
                font-size: 22px;
            }

            .accordion-btn {
                font-size: 13px;
            }

            .accordion-panel {
                padding: 10px 14px;
            }
        }

        /* Main wrapper */
        .program-section {
            padding: 20px;
            max-width: 1500px;
            margin: auto;
            background: #f9f9f9;

        }

        /* Sort Dropdown */
        .sort-dropdown-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .sort-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sort-btn i {
            font-size: 14px;
        }

        /* Dropdown content */
        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 265px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 99;
            border-radius: 6px;
            padding: 12px;
            top: 110%;
            left: 0;
        }

        .dropdown-content1 .dropdown-header {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .dropdown-content1 a {
            display: block;
            padding: 8px 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 4px;
        }

        .dropdown-content1 a:hover {
            background-color: #f0f0f0;
        }

        .dropdown-content1 a.active {
            background-color: #e6f0ff;
            font-weight: bold;
            color: #0056b3;
        }

        /* pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
            gap: 10px;
        }

        .page-btn {
            padding: 8px 12px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            cursor: pointer;
            font-size: 17px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .page-btn.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .page-btn:hover:not(.active) {
            background-color: #eaeaea;
        }

        .page-btn:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        /* Pagination Container */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            /* font-family: Arial, sans-serif; */
        }

        /* Laravel default ul element */
        .pagination nav>div:first-child {
            display: none;
            /* hides text like "Showing 1 to 10 of 30 results" */
        }

        .pagination nav ul {
            display: flex;
            gap: 8px;
            padding: 0;
            list-style: none;
        }

        /* Pagination Buttons */
        .pagination nav ul li {
            display: inline-block;
        }

        .pagination nav ul li a,
        .pagination nav ul li span {
            display: block;
            padding: 8px 14px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        /* Hover Effect */
        .pagination nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        /* Active Page */
        .pagination nav ul li.active span {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }

        /* Disabled links */
        .pagination nav ul li.disabled span {
            color: #aaa;
            background-color: #eaeaea;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
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
        <a href="{{ route('search') }}"
           class="{{ request()->routeIs('search') ? 'active' : '' }}">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="menu-text">Programs & Schools</span>
        </a>
    </li>
    <li>
        <a href="{{ route('userprofile') }}"
           class="{{ request()->routeIs('userprofile') ? 'active' : '' }}">
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

    <div class="main-content">
        <div class="topbar">
            <h1>Dashboard</h1>
            <div class="profile-menu">
                <!-- Notification Icon -->
                <div id="notificationIcon" class="notification-icon">
                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z">
                        </path>
                    </svg>
                </div>

                <!-- Profile Icon -->
                <i class="fa-solid fa-user-circle profile-icon" id="profileIcon"></i>

                <!-- Dropdown -->
                <div class="dropdown" id="profileDropdown">
                    <h3>Account</h3>
                    <p>Vishnu Rajput</p>
                    <p>vishnurajput847@gmail.com</p>
                    <hr />
                    {{-- <a href="#"> <i class="fa-solid fa-user"></i> My Profile </a>
                    <a href="#"> <i class="fa-solid fa-cog"></i> Account Settings </a>
                    <a href="#">
                        <i class="fa-solid fa-bell"></i> Notification Settings
                    </a>
                    <hr /> --}}
                    <a href="#">
                        <i class="fa-solid fa-right-from-bracket"></i> Log Out
                    </a>
                </div>
            </div>
        </div>
        <div class="filter-search-wrapper">
            <div class="search-container">
                <div class="search-box">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="search-icon" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.386 18.211C14.885 19.335 13.02 20 11 20 6.03 20 2 15.971 2 11 2 6.03 6.03 2 11 2c4.971 0 9 4.03 9 9 0 2.228-.81 4.267-2.151 5.839l4.827 4.424-1.351 1.474-4.938-4.526ZM18 11c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7Z">
                        </path>
                    </svg>
                    <input type="text" class="search-bar" placeholder="What would you like to study?" />
                </div>

                <div class="custom-dropdown">
                    <select class="dropdown">
                        <option>Destination</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>Canada</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>

                <div class="custom-dropdown">
                    <select class="dropdown">
                        <option>Institute (School)</option>
                        <option>Harvard</option>
                        <option>MIT</option>
                        <option>Stanford</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>
            </div>

            <div class="filters">
                <div class="filter-item custom-dropdown">
                    <select>
                        <option>Program Level</option>
                        <option>Undergraduate</option>
                        <option>Postgraduate</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>

                <div class="filter-item custom-dropdown">
                    <select>
                        <option>Field of Study</option>
                        <option>Engineering</option>
                        <option>Business</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>

                <div class="filter-item custom-dropdown">
                    <select>
                        <option>Intakes</option>
                        <option>Spring</option>
                        <option>Fall</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>

                <div class="filter-item custom-dropdown">
                    <select>
                        <option>Program Tag</option>
                    </select>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>

                <div class="filter-btn-wrapper">
                    <button class="filter-btn">
                        <svg aria-hidden="true" viewBox="0 0 24 24" class="filter-icon"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.12602 8C6.57006 9.72523 8.13616 11 10 11C11.8638 11 13.4299 9.72523 13.874 8L21 8V6L13.874 6C13.4299 4.27477 11.8638 3 10 3C8.13616 3 6.57006 4.27477 6.12602 6L3 6V8L6.12602 8ZM8 7C8 5.89543 8.89543 5 10 5C11.1046 5 12 5.89543 12 7C12 8.10457 11.1046 9 10 9C8.89543 9 8 8.10457 8 7Z">
                            </path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.874 18H21V16H16.874C16.4299 14.2748 14.8638 13 13 13C11.1362 13 9.57006 14.2748 9.12602 16H3V18H9.12602C9.57006 19.7252 11.1362 21 13 21C14.8638 21 16.4299 19.7252 16.874 18ZM15 17C15 15.8954 14.1046 15 13 15C11.8954 15 11 15.8954 11 17C11 18.1046 11.8954 19 13 19C14.1046 19 15 18.1046 15 17Z">
                            </path>
                        </svg>
                        All Filters
                    </button>
                </div>
            </div>
        </div>
        <hr>

        <div class="program-section">
            <!-- Sort -->
            <div class="sort-dropdown-wrapper">
                <button class="sort-btn" onclick="toggleDropdown3()">
                    Sort <i class="fa-solid fa-arrow-down-short-wide"></i>
                </button>

                <div class="dropdown-content1" id="sortDropdown">
                    <p class="dropdown-header">Sort</p>
                    <a href="#" class="active"><i class="fa-solid fa-circle-check"></i> Best Match (Default)</a>
                    <a href="#"><i class="fa-solid fa-dollar-sign"></i> Tuition Cost (Low to High)</a>
                    <a href="#"><i class="fa-solid fa-dollar-sign"></i> Tuition Cost (High to Low)</a>
                    <a href="#"><i class="fa-solid fa-file-invoice"></i> Application Fee (Low to High)</a>
                    <a href="#"><i class="fa-solid fa-file-invoice"></i> Application Fee (High to Low)</a>
                </div>
            </div>

            <!-- Program Cards -->

            <!-- @if ($programs->count())
<ul>
                            @foreach ($programs as $program)
<li>{{ $program->name }} - {{ $program->country }}</li>
@endforeach
                        </ul>
@else
<p>No programs found.</p>
@endif -->

            @if ($programs->count())
                <div class="programs-container">
                    @foreach ($programs as $value)
                        <div class="program-card">
                            <div class="program-header">
                                <img src="{{ asset('/public/storage/' . $value->image) }}?v={{ $value->updated_at->timestamp }}"
                                    alt="University Logo" class="program-logo" />
                                <!-- <img src="{{ asset('Dashboard/dp.webp') }}" alt="Program Image" class="program-logo" /> -->
                                <a href="#">
                                    <h3>{{ $value->university_name }}</h3>
                                </a>
                            </div>

                            <div class="program-badges">
                                <span class="badge">High Job Demand</span>
                                <span class="badge">Popular</span>
                            </div>

                            <div class="program-details">
                                <small>{{ $value->certificate }}</small>
                                <a href="#">
                                    <p>{{ $value->college_name }}</p>
                                </a>
                                <hr />
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Location</td>
                                            <td>{{ $value->college_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Campus city</td>
                                            <td>{{ $value->location }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tuition (1st year)</td>
                                            <td> ${{ $value->tuition }}CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Application fee</td>
                                            <td>${{ $value->application_fee }}CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td> {{ $value->duration }} months</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="program-footer">
                                <p>Success prediction <button class="success-btn"
                                        onclick="openModal()">Details</button>
                                </p>
                                <button class="apply-btn">Create Application</button>
                            </div>
                        </div>
                        <!-- <div class="pagination">
                        <button class="page-btn prev-btn" disabled>Previous</button>
                        <div class="page-numbers">
                            <button class="page-btn active">1</button>
                            <button class="page-btn">2</button>
                            <button class="page-btn">3</button>
                            <button class="page-btn">4</button>
                            <button class="page-btn">5</button>
                        </div>
                        <button class="page-btn next-btn">Next</button>
                    </div> -->
                    @endforeach
                </div>
        </div>
        <div class="pagination">
            {{ $programs->appends(request()->input())->links() }}
        </div>
    @else
        <p>No programs found.</p>
        @endif





        <!-- Success Prediction Modal -->
        <div id="successModal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <h3>Success Prediction by Intake</h3>
                <p class="note">
                    Estimated based on ApplyBoard's historical data. We make no representations, warranties, or
                    guarantees
                    as to the
                    information's accuracy.
                </p>

                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2025 </button>
                        <div class="accordion-panel">
                            <p><strong>Seat Availability:</strong> Very High</p>
                            <p><strong>Turn Around Time:</strong> Very Fast</p>
                            <p><strong>Conversion:</strong> Very High</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2026</button>
                        <div class="accordion-panel">
                            <p><strong>Seat Availability:</strong> Very High</p>
                            <p><strong>Turn Around Time:</strong> Very Fast</p>
                            <p><strong>Conversion:</strong> Very High</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2027</button>
                        <div class="accordion-panel">
                            <p><strong>Seat Availability:</strong> Very High</p>
                            <p><strong>Turn Around Time:</strong> Slow</p>
                            <p><strong>Conversion:</strong> Very High</p>
                        </div>
                    </div>
                </div>

                <hr />
                <div class="info-note">
                    <p><strong>Conversion:</strong> Historical ratio of accepted to submitted applications.</p>
                    <p><strong>Turn Around Time:</strong> Expected time to receive a letter of acceptance.</p>
                    <p><strong>Seat Availability:</strong> Predicted likelihood of a seat being available.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="pagination">
                <button class="page-btn prev-btn" disabled>Previous</button>
                <div class="page-numbers">
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn">5</button>
                </div>
                <button class="page-btn next-btn">Next</button>
            </div> -->


    <script src="{{ asset('js/programs.js') }}" defer></script>

</body>


</html>
