<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <title>My Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-family: "Open Sans", Sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f7f7f7;
        }

        /* Link Styles */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles (adjust as needed) */

        /* Profile Page Styles */
        .profile-page {
            margin-left: 250px;
            /* Sidebar width */
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .profile-header h1 {
            display: flex;
            align-items: center;
            margin: 0;
            font-size: 2rem;
            color: #333;
            margin-left: -180px;
        }

        .profile-logo {
            margin-right: 10px;
            /* Space between image and text */

        }

        .profile-logo img {
            width: 50px;
            /* Adjust size of the image */
            height: 50px;
        }


        /* Profile Container */
        .profile-container {
            display: flex;
            margin-left: -200px;
            gap: 20px;
            padding: 20px;
            flex: 1;
            overflow-y: auto;
        }

        /* Sidebar */
        .profile-sidebar {
            flex-basis: 200px;
            background: white;
            border-radius: 10px;
            padding: 20px;
        }

        .profile-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .profile-sidebar ul li {
            margin-bottom: 15px;
        }

        .profile-sidebar ul li a {
            display: block;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .profile-sidebar ul li a:hover,
        .profile-sidebar ul li a.active {
            background-color: #d3cece;
        }

        /* Profile Content */
        .profile-content {
            flex: 1;
        }

        .profile-section input::placeholder {
            color: #504c4c;
            font-size: 14px;
            font-weight: bold;
        }


        .profile-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        /* .profile-section label{
            opacity: 0.5;
        } */

        .profile-section h2 {
            margin-bottom: 20px;
            font-size: 20px;

        }

        .section-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .section-row div {
            flex: 1;
        }

        .section-row div label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px 5px;
            border: 1px solid #ddd;
            color: #504c4c;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
        }

        .save-btn {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
        }

        .save-btn:hover {
            background-color: #004080;
        }

        input[type="radio"] {
            transform: translateY(20px);

        }


        .dropdown-container {
            margin-top: 50px;
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */

        }

        .toggle-button {
            background-color: white;
            color: black;
            border: 1px solid black;
            padding: 15px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            width: 950px;
        }

        .button-tog {
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .toggle-button:hover {
            background-color: #f0f0f0;
        }

        .dropdown-icon {
            font-size: 14px;
            /*margin-left: 75%;*/

        }

        .hidden {
            display: none;
        }

        #toggle-content {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
            /* border: 1px solid #ddd; */
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            transition: max-height 0.5s ease;
        }


        .button1 {
            background-color: white;
            color: black;
            border: 1px solid black;
            padding: 15px 10px;
            font-size: 17px;
            cursor: pointer;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            width: 950px;


        }

        .icon {
            font-size: 14px;
            /*margin-left: 80.2%;*/

        }





        /* Tablet and Small Devices */
        @media (max-width: 1024px) {
            .sidebar {
                width: 50px;
            }

            .sidebar:hover {
                width: 220px;
            }

            /* .profile-content {
                margin-left: 50px;
            } */

            .sidebar:hover~.profile-content {
                margin-left: 220px;
            }

            .profile-sidebar {
                width: 100%;
            }

            .profile-container {
                flex-direction: column;
                margin-left: -184px;
            }

            .button1 {
                font-size: 16px;
                padding: 10px 15px;
                width: 100%;
                max-width: 600px;
            }


            .toggle-button {
                max-width: 610px;
            }




        }

        /* Mobile Devices */
        @media (max-width: 768px) {
            .sidebar {
                width: 50px;
                position: fixed;
                height: 100vh;
                overflow: hidden;
            }

            .sidebar:hover {
                width: 200px;
            }

            /* .profile-content {
                margin-left: 50px;
            } */

            .profile-page {
                margin-left: 34px;
                /* margin-top: -100px; */
            }

            .profile-header h1 {
                font-size: 26px;
                margin-left: 0;
            }


            .toggle-button {
                max-width: 268px;
            }


            .button1 {
                width: 258px;
            }

            .sidebar:hover~.profile-content {
                margin-left: 200px;
            }

            .profile-container {
                flex-direction: column;
                margin-left: 0;
            }

            .profile-sidebar ul {
                flex-direction: column;
            }

            .profile-sidebar ul li {
                text-align: left;
            }

            .profile-sidebar ul li a {
                justify-content: center;
            }

            .profile-sidebar ul li:nth-child(-n+4) {
                order: -1;
            }
        }

        /* Small Mobile Devices */
        @media (max-width: 480px) {
            .topbar {
                padding-left: 55px;
            }

            .sidebar {
                width: 45px;
            }

            .sidebar:hover {
                width: 180px;
            }

            /* .profile-content {
                margin-left: 45px;
            } */

            .sidebar:hover~.profile-content {
                margin-left: 180px;
            }



            .profile-section {
                padding: 10px;
            }

            .section-row {
                flex-direction: column;
            }

            .save-btn {
                padding: 8px 16px;
            }

            .profile-sidebar ul {
                flex-direction: column;
            }

            .profile-sidebar ul li:nth-child(-n+4) {
                order: -1;
            }
        }

        .topbar {
            margin-left: 80px;
            margin-top: 4px;
        }
        .form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}
    </style>
</head>

<body>
    @include('frontent_partials.userdash_sidebar')
    
        @include('frontent_partials.userdash_nav')
        
    <!-- main content -->
    <div class="profile-page">

        <div class="profile-header">
            <h1>
                <div class="profile-logo">
                    {{-- <img src="{{ asset('Dashboard/my profile.svg') }}" alt="My Profile Logo"> --}}
                </div>
                My Profile
            </h1>
        </div>


        <div class="profile-container">
            <aside class="profile-sidebar">
                <ul>
                    <li><a href="#" class="active"><i class="fas fa-info-circle"></i> General Information</a></li>
                    <li><a href="/education_history"><i class="fas fa-graduation-cap"></i> Education History</a></li>
                    <li><a href="/user_testScore"><i class="fas fa-check-circle"></i> Test Scores</a></li>
                </ul>
            </aside>
            <main class="profile-content">
                <section class="profile-section">

                    <div class="dropdown-container">
                        <div class="toggle-button" onclick="toggleContent()">
                            <h2>Personal Information <span class="dropdown-icon"><i
                                        class="fa-solid fa-chevron-down"></i></span></h2>

                        </div>
                        <form id="updateProfileFormData" method="PUT">
                            @csrf

                        <div id="toggle-content" class="hidden">
                            <div class="section-row">
                                <div>

                                    <input type="text" id="name" name="name" placeholder="First name *" value="{{$user->name}}">
                                </div>
                                <div>

                                    <input type="text" id="middle_name" name="middle_name" placeholder="Middle name">
                                </div>
                                <div>

                                    <input type="text" id="email" name="email" placeholder="Email *" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="section-row">
                                <div>

                                    <input type="date" id="dob" name="dob" placeholder="Date of birth *">
                                </div>
                                <div>

                                    <input type="text" id="language" name="language" placeholder="First language *">
                                </div>
                                <div>

                                    <input type="text" id="citizenship" name="citizenship"  placeholder="Country of citizenship *">
                                </div>
                            </div>
                            <div class="section-row">
                                <div>

                                    <input type="text" id="passportNumber" name="passportNumber" placeholder="Passport number *">
                                </div>
                                <div>

                                    <input type="date" id="passportExpiry" name="passportExpiry" placeholder="Passport expiry date">
                                </div>
                            </div>
                            <div class="section-row">
                                <div>
                                    <label>Marital Status *</label>
                                    <div class="radio">
                                        <label><input type="radio" name="maritalStatus" value="single">
                                            Single</label>
                                        <label><input type="radio" name="maritalStatus" value="married">
                                            Married</label>
                                    </div>
                                </div>
                                <div>
                                    <label>Gender *</label>
                                    <div class="radio">
                                        <label><input type="radio" name="gender" value="male"> Male</label>
                                        <label><input type="radio" name="gender" value="female"> Female</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="save-btn">Save & Continue</button>
                        </div>
                        </form>
                </section>




                <section class="profile-section">
                    <div class="button1" onclick="toggleContent1()">
                        <h2>Address Detail <span class="icon"><i class="fa-solid fa-chevron-down"></i></span></h2>

                    </div>
                    <form id="addressForm">
                         @csrf
                    <div id="toggle-content1">
                        <div class="section-row">
                            <div>

                                <input type="text" id="address" name="address" placeholder="Address *">
                            </div>
                            <div>
                                 <select id="city" name="city" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach($countries as $row)
                                    <option value="{{$row->id}}"> {{$row->name}}</option>
                                    @endforeach
                                </select>

                            
                            </div>
                        </div>
                        <div class="section-row">
                            <div>
                                <select id="country" name="country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $row)
                                    <option value="{{$row->id}}"> {{$row->name}}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" id="country" name="country" placeholder="Country *"> -->
                            </div>
                            <div>

                                <input type="text" id="state" name="state" placeholder="Province/State *">
                            </div>
                            <div>

                                <input type="text" id="zip" name="zip" placeholder="Postal/Zip code *">
                            </div>
                        </div>
                        <div class="section-row">
                            <div>

                                <input type="email" id="email" name="email" value="example@example.com"
                                    placeholder="Email *">
                            </div>
                            <div>

                                <input type="tel" id="phone" name="phone" placeholder="Phone number *">
                            </div>
                        </div>
                        <button class="save-btn">Save & Continue</button>
                    </div>
                    </form>
                </section>
            </main>
        </div>

        <!-- <footer>
            <p>&copy; 2024 ApplyBoard.com</p>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Accessibility</a>
            <a href="#">About</a>
            <a href="#">Blog</a>
        </footer> -->
    </div>
   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$('#updateProfileFormData').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('userprofile.update', ['id' => $user->id]) }}",
        type: "PUT",
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                alert(response.message);
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let errorText = '';
            $.each(errors, function(key, value) {
                errorText += value[0] + "\n";
            });
            alert(errorText);
        }
    });
});
</script>


<script>
$('#addressForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('profile.updateAddress') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            if (response.success) {
                alert(response.message);
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let errorText = '';
            $.each(errors, function(key, value) {
                errorText += value[0] + "\n";
            });
            alert(errorText);
        }
    });
});
</script>

<script>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script> -->
</body>
</html>
