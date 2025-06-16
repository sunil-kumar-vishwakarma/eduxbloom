<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<style>
    html,
    body {
        /* font-family: Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
        font-family: "Open Sans", Sans-serif;
        /* Use a clean, modern font for all elements */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .sidebar {
        background-color: white;
        color: rgb(96, 106, 132);
        width: 80px;
        min-height: 100vh;
        transition: width 0.3s ease, background-color 0.3s ease, color 0.3s ease;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        border-right: 2px solid #e0e0e0;
        /* Adds a subtle right border */
        /* Alternatively, use box-shadow for a softer line */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }


    .sidebar:hover {
        width: 250px;
    }

    .logo {
        display: flex;
        align-items: center;
        padding: 20px;
        padding-top: 30px;
        transition: padding 0.3s ease;

        /* Smooth padding adjustment */
    }

    .logo i {
        font-size: 24px;
        transition: font-size 0.3s ease;
        cursor: pointer;
        /* Smooth icon size adjustment if needed */
    }

    .logo-text {
        /* font-family: Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
        margin-left: 10px;
        margin-top: 2px;
        font-size: 24px;
        font-weight: bold;
        opacity: 0;
        /* Hide initially */
        white-space: nowrap;
        transition: opacity 0.3s ease, transform 0.3s ease;
        /* Smooth text appearance */
        transform: translateX(-10px);
        /* Start slightly to the left */
    }

    .sidebar:hover .logo-text {
        opacity: 1;
        /* Make visible on hover */
        transform: translateX(0);
        /* Slide into place */
        cursor: pointer;
    }

    .menu {
        list-style: none;
        padding: 10px;
        padding-top: 0;
        transition: padding 0.3s ease;
    }

    .menu li {
        margin: 20px 0;
    }

    .menu a {
        text-decoration: none;
        color: rgb(96, 106, 132);
        display: flex;
        align-items: center;
        padding: 10px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Active Menu Item */
    .menu a.active {
        background-color: rgb(208, 228, 255);
        color: rgb(0, 51, 132);
        border-radius: 5px;
    }

    .menu a.active i,
    .menu a.active .menu-text {
        font-weight: bold;
    }


    .menu a:hover {
        background-color: rgba(96, 106, 132, 0.1);
        /* Subtle hover background */
        border-radius: 5px;
    }

    .menu i {
        font-size: 20px;
        margin-right: 10px;
        transition: font-size 0.3s ease, margin-right 0.3s ease;
        /* Smooth icon transition */
    }

    .menu-text {
        /* font-family: Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
        opacity: 0;
        margin: 0;
        /* Hide initially */
        white-space: nowrap;
        transition: opacity 0.3s ease, transform 0.3s ease;
        /* Smooth text transition */
        transform: translateX(-10px);
        /* Slide in effect */
    }

    .sidebar:hover .menu-text {
        opacity: 1;
        /* Show text */
        transform: translateX(0);
        /* Reset transform */
    }

    /* main content */
    /* General Content Area */
   

    .sidebar:hover+.main-content {
        margin-left: 80px;
        /* Aligns with expanded sidebar */
    }

    /* Topbar Styling */
    /* Topbar */
    .topbar {
        background-color: #ffffff;
        padding: 15px 20px;
        margin-top: -10px;
        border-bottom: 1px solid #e0e0e0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .profile-menu {
        position: relative;
    }

    .notification-icon {
        display: inline-flex;
        font-size: 10px;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        /* Space between notification and profile icons */
        cursor: pointer;
        width: 24px;
        height: 24px;
    }

    .notification-icon svg {
        fill: #333;
        /* Icon color */
        width: 24px;
        height: 24px;
        transition: transform 0.3s ease;
    }

    .notification-icon:hover svg {
        transform: scale(1.1);
        /* Hover effect */
    }



    .profile-icon {
        font-size: 28px;
        color: #333;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .profile-icon:hover {
        transform: scale(1.1);
    }

    /* Dropdown Styling */
    .dropdown {
        position: absolute;
        top: 50px;
        /* Position dropdown below the icon */
        right: 0;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        padding: 15px;
        width: 250px;
        display: none;
        /* Initially hidden */
        z-index: 1000;
        text-align: left;
    }

    .dropdown h3 {
        margin: 0;
        font-size: 16px;
        color: #333;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .dropdown p {
        margin: 10px 0;
        font-size: 14px;
        color: #555;
    }

    .dropdown a {
        display: block;
        margin: 15px 0;
        font-size: 14px;
        color: #555;
        text-decoration: none;
        font-weight: 500;
    }

    .dropdown a:hover {
        text-decoration: underline;
    }

    .dropdown hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }


    .topbar h1 {
        font-size: 24px;
        color: #333;
        margin: 0;
    }

    .container {
        margin-top: 80px;
        /* background-color: #ffffff; */
        text-align: center;
        padding: 0;
        /* margin-left: 60px; */
        max-width: 1200px;
    }


    .btn-purchase {
        border-radius: 7px;
        font-weight: bold;
        color: #0d6efd;
        font-size: 20px;
        height: 50px;
        cursor:;
        width: 140px;
        border: .2px solid rgb(200, 220, 254);
        background-color: rgb(200, 220, 254);
        margin-left: -110%;
        border-bottom: 6px solid blue;

    }

    /* .btn-purchase:hover {
        background-color: white;
        border: none;
        border-bottom: 6px solid blue;
    } */

    .balance {
        margin-top: 20px;
        justify-content: left;
        align-items: center;
        text-align: left;
        margin-left: -132px;
    }

    .balance h3 {
        opacity: .7;
        font-weight: bold;
        /* font-family: sans-serif */
    }

    .balance h6 i {
        color: blue;
        font-size: 23px;
        transform: translateY(2px);
    }

    .balance h6 {
        font-size: 18px;
    }

    .balance button {
        border-radius: 10px;
        width: 160px;
        border: .2px solid rgb(200, 198, 198);
    }

    .balance button p {
        max-width: 40px;
        margin-left: 45px;
    }

    .balance button p b {
        font-size: 19px;

    }

    #dollar {
        font-size: 30px;
    }

    .order-history {
        margin-top: 35px;
        /* margin-left: -9%; */
    }

    .purchase {
        margin-left: 105px;
    }




    .order-history h3 {
        margin-left: -92%;
        font-size: 19px;
        font-weight: bold;
        opacity: .8;
    }

    .field {
        display: flex;
        gap: 20px;
        margin-bottom: 40px;
        margin-right: 9px;
        margin-left: -48px;
    }

    .field div {
        flex: 1;
    }

    .field div label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        margin-left: -170px;
        font-size: 13px;
    }

    .field input {
        width: 100%;
        padding: 10px 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .field #search {
        margin-top: 24px;
        padding-left: 40px;
    }

    #searc {
        margin-top: 30px;
        font-size: 22px;
        font-weight: bold;
        transform: translateX(50px);
    }

    .search-result {
        margin-top: 50px;
        margin-left: -140px;
    }





    /* pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
        gap: 10px;
    }

    .page-btn {
        padding: 8px 12px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        cursor: pointer;
        font-size: 20px;
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



    /* Footer Section */
    footer {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        color: #777;
        padding: 20px;
        /* background-color: #f8f9fc; */
        border-top: 1px solid #e0e0e0;
    }

    footer a {
        color: #0d6efd;
        margin: 0 10px;
        text-decoration: none;
        font-size: 14px;
    }

    footer a:hover {
        text-decoration: underline;
    }

    /* Media Queries */

    /* Tablet Devices (max-width: 1024px) */
    @media (max-width: 1024px) {

         #searc{
            display: none;
        }
        .container {
            flex-direction: column;
            align-items: center;
        }

        .purchase,
        .balance {
            width: 100%;
            margin-bottom: 20px;
        }

        .order-history .field {
            flex-direction: column;
            align-items: flex-start;
            /* Align to left */
            margin-left: -30px;
            margin-right: 60px !important;
        }

          .employer-table{
            margin-left: -40px;
        }
        .order-history .field div {
            min-width: 100%;
        }

        .order-history .field input,
        .order-history .field label {
            font-size: 16px;
            /*padding: 10px;*/
            margin-left: -10px;
            margin: 0;
            /* Remove any extra margins */
            width: 100%;
            /* Ensure full width */
        }

        /* .search-result table {
            width: 100%;
        } */

        .balance h3 {
            font-size: 20px;
        }

        .search-result th,
        .search-result td {
            font-size: 14px;
            padding: 8px;
            padding-right: 75px;
        }

        .pagination {
            font-size: 0px;
            margin-left: -180px;
            margin-top: 100px;
            align-items: center;
        }
    }

    /* Mobile Devices (max-width: 768px) */
    @media (max-width: 768px) {
        #searc{
            display: none;
        }
        .employer-table{
            margin-left: -50px;
        }
        .container {
            padding: 15px;
        }

        .btn-purchase {
            font-size: 14px;
            padding: 8px 16px;
        }

        .balance h3 {
            font-size: 16px;
        }

        .balance button {
            font-size: 14px;
        }

        .balance p {
            font-size: 18px;
        }

        #dollar {
            font-size: 16px;
        }

        .order-history .field {
            flex-direction: column;
            align-items: flex-start;
            /* Align to left */
        }

        .order-history .field div {
            min-width: 100%;
        }

        .order-history .field input,
        .order-history .field label {
            font-size: 16px;
            padding: 10px;
            margin: 0;
            /* Remove any extra margins */
            width: 100%;
            /* Ensure full width */
        }

        .field {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            margin-right: 140px;
            /* margin-left: -130px; */
        }

        /* .search-result table {
            width: 400px;
            margin-left: -20px;
            overflow-x: auto;
            display: block;
        } */

        .search-result th,
        .search-result td {
            font-size: 13px;
            padding: 8px;
            word-wrap: break-word;
        }

        .search-result hr {
            display: none;
            /* Remove horizontal line on mobile */
        }

        .pagination {
            font-size: 0px;
            margin-left: -180px;
            margin-top: 100px;
            align-items: center;
        }

        .page-btn {
            font-size: 14px;
            margin: 5px 0;
        }

    }

    /* Small Mobile Devices (max-width: 480px) */
    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }

        .purchase,
        .balance {
            width: 100%;
        }

        .btn-purchase {
            font-size: 14px;
            padding: 8px 16px;
            margin-left: -565px;
        }

        .balance h3 {
            font-size: 14px;
            margin-left: -28px;
            margin-bottom: 20px;
        }

        .balance button {
            font-size: 14px;
            margin-left: -32px;
        }

        .balance p {
            font-size: 16px;
        }

        #dollar {
            font-size: 14px;
        }

        .order-history .field input,
        .order-history .field label {
            font-size: 14px;
            padding: 8px;
        }

        .search-result th,
        .search-result td {
            font-size: 12px;
            padding: 6px;
        }
    }
    .employer-table th{
        background-color: rgb(0, 51, 132);
        color: white;
    }
</style>

<body>
  @include('frontent_partials.userdash_sidebar')

    <!-- Main Content -->
    <div class="main-content">
      @include('frontent_partials.userdash_nav')

        <div class="container">
            <div class="purchase">
                <button class="btn-purchase">Purchases</button>
            </div>

            {{-- <div class="balance">
                <h3>Account Balances</h3>
                <button>
                    <h6>ApplyCredits <i class="ri-question-line"></i></h6>
                    <i class="ri-money-dollar-circle-line" id="dollar"></i>
                    <p><b>$0.00</b> USD</p>
                </button>
            </div> --}}

            <div class="order-history">
                <h3>Order History</h3>

                <div class="field">
                    <i class="ri-search-line" id="searc"></i>
                    <div>

                        <input type="text" placeholder=" Search for Order ID" id="search">
                    </div>
                    <div>
                        <label for="dob">From Date</label>
                        <input type="date" id="dob">
                    </div>
                    <div>
                        <label for="dob">To Date</label>
                        <input type="date" id="dob">
                    </div>

                    <div>
                        <label for="firstName">Min Amount</label>
                        <input type="number" id="firstName" placeholder="Min">
                    </div>

                    <div>
                        <label for="firstName">Max Amount</label>
                        <input type="number" id="firstName" placeholder="Max">
                    </div>
                </div>


            </div>

            <table class="employer-table">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>DESCRIPTION</th>
                        <th>AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01 Jan, 2025</td>
                        <td>Science Program Admission Fee</td>
                        <td>$1,200</td>
                       
                    </tr>
                    <tr>
                        <td>01 Jan, 2025</td>
                        <td>MBA Program Enrollment Fee</td>
                        <td>$2,500</td>
                       
                    </tr>
                </tbody>
            </table>


        </div>

        <footer>
            <p>&copy; 2024 Edu-X.com</p>
            <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
            <a href="{{ route('term.and.condition') }}">Terms & Conditions</a>
            <a href="{{ route('user_myapplication') }}">My Application</a>
            <a href="{{ route('blogs-pages') }}">Blog</a>
        </footer>
    </div>
</body>




<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profileIcon = document.getElementById('profileIcon');
        const profileDropdown = document.getElementById('profileDropdown');

        profileIcon.addEventListener('click', () => {
            // Toggle dropdown visibility
            profileDropdown.style.display =
                profileDropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!profileIcon.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.style.display = 'none';
            }
        });
    });


    const pageButtons = document.querySelectorAll('.page-btn');
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');
    let currentPage = 1;

    const updatePagination = () => {
        pageButtons.forEach((btn) => {
            const pageNumber = parseInt(btn.innerText);
            if (pageNumber === currentPage) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        // Enable/disable Prev and Next buttons
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === pageButtons.length - 2;
    };

    // Add event listeners for page buttons
    pageButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (!btn.classList.contains('prev-btn') && !btn.classList.contains('next-btn')) {
                currentPage = parseInt(btn.innerText);
                console.log(`Page ${currentPage} selected.`);
                updatePagination();
            }
        });
    });

    // Event listeners for Prev and Next buttons
    prevButton.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            console.log(`Page ${currentPage} selected.`);
            updatePagination();
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentPage < pageButtons.length - 2) {
            currentPage++;
            console.log(`Page ${currentPage} selected.`);
            updatePagination();
        }
    });

    // Initial setup
    updatePagination();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
