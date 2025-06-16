<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-pzjw8f+ua7Kw1TIq0XPm+L4QDsQ39Pp6pD/R8ikEo0ZXXzvD2IRsqz1d8YzU9m6d" crossorigin="anonymous">
    <link rel="stylesheet" href="path-to-your-styles.css">

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
            color: black;
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
            margin-left: 40px;

        }

        .section-row div {
            flex: 1;


        }

        .section-row div {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            /* margin-top: -5px; */

        }

        input {
            width: 100%;
            padding: 10px 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
        }

        .save-btn {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            margin-left: 40px;
            /* margin-top: 60px; */

        }

        .save-btn:hover {
            background-color: #004080;
        }

        /* input[type="radio"] {
            transform: translateY(20px);

        } */


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


        .button1 h3 {
            max-width: 400%;
        }


        .icon {
            font-size: 14px;
            /*margin-left: 80.2%;*/

        }

        #ico {
            transform: translateX(-45px);
        }


        /* Container for radio buttons */
        .radio-container {
            display: flex;
            flex-direction: column;
            /* Stack radio buttons vertically */
            gap: 15px;
            /* Space between each radio button */
            padding: 10px;

            /* Optional padding for the container */
        }

        /* Style for each radio button */
        .radio-btn {
            display: flex;
            /* Use flex to align radio button and text */
            align-items: center;
            /* Vertically align the radio button with the text */
            gap: 20px;
            /* Space between the radio button and text */
        }

        /* Text style for each radio button */
        .radio-btn span {
            font-size: 16px;
            /* Set the text font size */
            color: #333;
            padding: 10px 20px;
            /* Set the text color */

        }

        /* Optional: Styling for the radio buttons */
        .radio-container input[type="radio"] {
            width: 20px;
            /* Set width of the radio button */
            height: 20px;
            transform: translateY(4px);

            /* Set height of the radio button */
        }

        /* Label styling to make text clickable */
        .radio-btn label {
            cursor: pointer;

            margin-left: 20px;

        }

        .radio-container p {
            font-size: 18px;
            font-weight: 500;
        }

        .switch label {
            font-size: 17px;
        }

        .switch input[type="checkbox"] {
            height: 20px;
            transform: translateY(30px);
        }



        /* Initially hide the dropdown content */
        .dropdown-content {
            transform: translateY(20px);
            display: none;
            /* Hide by default */
            padding: 10px;
            /* Add padding to the dropdown content */
            margin-top: 10px;
            /* Adds space between radio button and dropdown */
            border: 1px solid #ccc;
            /* Border for dropdown */
            background-color: #f9f9f9;
            /* Background color */
            border-radius: 5px;
            /* Rounded corners */
            width: 100%;
            /* Ensure the dropdown content has full width */
            box-sizing: border-box;
            /* Include padding in the width calculation */
            font-size: 18px;
        }

        /* Style input rows to have 2 inputs per line */
        .input-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            /* Gap between rows */
        }

        .input-row input::placeholder {
            color: #504c4c;
        }

        .custom-dropdown-content input::placeholder {
            color: #504c4c;
        }

        .input-row input {
            width: 45%;
            /* Make each input take up 48% of the row */
            padding: 15px 15px;
            color: #504c4c;
            /* font-size: 10px; */
        }

        .exam-date {
            width: 48%;
            padding: 5px;
            font-size: 14px;
        }

        .custom-dropdown-content {
            transform: translateY(20px);
            display: none;
            padding: 15px;
            margin-top: 10px;
            /* Space between checkbox and content */
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }

        .custom-switch label {
            font-size: 18px;
        }

        .custom-switch label input[type="checkbox"] {
            transform: translateY(20px);
        }

        .custom-dropdown-content input {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            width: 90%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;

        }

        .custom-section-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .custom-switch {
            display: flex;
            flex-direction: column;
        }

        /* Add a label on top of the input */
        .custom-label-top {
            margin-bottom: 10px;
            font-weight: bold;
        }

        #gre input[type="checkbox"] {
            /* transform: translateX(120px);
         transform: translateY(20px); */
            transform: translateX(-10px);
            transform: translateY(20px);
            margin-left: -5px;
        }







        /* Media Queries for Responsiveness */


        /* Tablet and Small Devices */
        @media (max-width: 1024px) {
            .input-row input {
                width: 40%;
            }

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


            .toggle-button {
                max-width: 268px;
            }


            div#toggle-content {
                font-size: 14px;
                margin-left: -65px;
            }

            div#toggle-content1 {
                margin-left: -50px;
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
                padding-left: 55px !important;

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

            .profile-header h1 {
                font-size: 26px;
                margin-left: 0;
            }

            .profile-section {
                padding: 10px;
            }

            .section-row {
                flex-direction: column;
            }

            .save-btn {
                padding: 13px 16px;
                font-size: 15px;
                margin-left: 50px;

            }

            .custom-switch label input[type="checkbox"] {
                transform: translate(90px, 20px);
            }

            #gre input[type="checkbox"] {
                transform: translate(90px, 20px);
            }

            .input-row input {
                width: 36%;
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
                    {{-- <img src="Dashboard/my profile.svg" alt="My Profile Logo"> --}}
                </div>
                My Profile
            </h1>
        </div>


        <div class="profile-container">
            <aside class="profile-sidebar">
                <ul>
                    <li><a href="/userprofile"><i class="fas fa-info-circle"></i> General Information</a></li>
                    <li><a href="/education_history"><i class="fas fa-graduation-cap"></i> Education History</a></li>
                    <li><a href="#" class="active"><i class="fas fa-check-circle"></i> Test Scores</a></li>
                    {{-- <li><a href="visa.html"><i class="fas fa-passport"></i> Visa & Study Permit</a></li> --}}
                </ul>
            </aside>
            <main class="profile-content">
                <section class="profile-section">

                    <div class="dropdown-container">
                        <div class="toggle-button" onclick="toggleContent()">
                            <h2>English Test Scores <span class="dropdown-icon"><i
                                        class="fa-solid fa-chevron-down"></i></span></h2>

                        </div>
                        <div id="toggle-content" class="hidden">


                            <div class="section-row">

                                <div class="radio-container">
                                    <div class="radio-btn">
                                        <input type="radio" id="radio1" name="group1">
                                        <label for="radio1"><span>TOEFL</span></label>
                                        <div class="dropdown-content" id="dropdown1">
                                            <!-- Input fields for TOEFL -->
                                            <div class="input-row">
                                                <input type="text" placeholder="Reading">
                                                <input type="text" placeholder="Listening">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="text" placeholder="Writing">
                                                <input type="text" placeholder="Speaking">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="date" placeholder="Exam Date" class="exam-date">
                                            </div><br>
                                        </div>
                                    </div><br>


                                    <div class="radio-btn">
                                        <input type="radio" id="radio2" name="group1">
                                        <label for="radio2"><span>OIELTS</span></label>

                                        <div class="dropdown-content" id="dropdown2">
                                            <!-- Input fields for IELTS -->
                                            <div class="input-row">
                                                <input type="text" placeholder="Reading">
                                                <input type="text" placeholder="Listening">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="text" placeholder="Writing">
                                                <input type="text" placeholder="Speaking">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="date" placeholder="Exam Date" class="exam-date">
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="radio-btn">
                                        <input type="radio" id="radio3" name="group1">
                                        <label for="radio3"><span>PTE</span></label>

                                        <div class="dropdown-content" id="dropdown3">
                                            <!-- Input fields for PTE -->
                                            <div class="input-row">
                                                <input type="text" placeholder="Reading">
                                                <input type="text" placeholder="Listening">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="text" placeholder="Writing">
                                                <input type="text" placeholder="Speaking">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="date" placeholder="Exam Date" class="exam-date">
                                            </div><br>
                                        </div>
                                    </div><br>



                                    <div class="radio-btn">
                                        <input type="radio" id="radio4" name="group1">
                                        <label for="radio4"><span>Duolingo</span></label>

                                        <div class="dropdown-content" id="dropdown4">
                                            <!-- Input fields for Duolingo -->
                                            <div class="input-row">
                                                <input type="text" placeholder="Reading">
                                                <input type="text" placeholder="Listening">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="text" placeholder="Writing">
                                                <input type="text" placeholder="Speaking">
                                            </div><br>
                                            <div class="input-row">
                                                <input type="date" placeholder="Exam Date" class="exam-date">
                                            </div><br>
                                        </div>
                                    </div><br>

                                    <div class="radio-btn">
                                        <input type="radio" id="radio5" name="group1">
                                        <label for="radio5"><span>I don't have this</span></label>
                                    </div><br>
                                    <div class="radio-btn">
                                        <input type="radio" id="radio6" name="group1">
                                        <label for="radio6"><span>Not yet</span></label>
                                    </div><br>

                                    <p>If you haven't taken a test yet, ApplyBoard can help you take it in the future.
                                    </p>
                                </div>


                            </div>
                            <button class="save-btn">Save & Continue</button>






                </section>




                <section class="profile-section">
                    <div class="button1" onclick="toggleContent1()">
                        <h2 style="display:inline">GRE or GMAT Scores <span class="icon" id="ico"><i
                                    class="fa-solid fa-chevron-down"></i></span></h2>

                    </div>
                    <div id="toggle-content1">
                        <div class="section-row">
                            <div class="custom-section-row">
                                <div class="custom-switch">
                                    <label>
                                        <input type="checkbox" role="switch" class="custom-switch-checkbox"> I have
                                        GMAT exam scores
                                    </label>

                                    <!-- Dropdown content for GMAT exam -->
                                    <div class="custom-dropdown-content" id="custom-dropdown-content-0">
                                        <div class="custom-label-top">GMAT Exam Scores</div> <br>
                                        <input type="text" placeholder="Enter GMAT score" /><br>
                                        <input type="text" placeholder="Enter GMAT date" />
                                    </div>
                                </div>
                            </div><br>

                        </div>


                        <div class="section-row">
                            <div class="custom-section-row">
                                <div class="custom-switch">
                                    <label id="gre">
                                        <input type="checkbox" role="switch" class="custom-switch-checkbox"> I have
                                        GRE exam scores
                                    </label>
                                    <!-- Dropdown content for GRE exam -->
                                    <div class="custom-dropdown-content" id="custom-dropdown-content-1">
                                        <div class="custom-label-top">GRE Exam Scores</div> <br>
                                        <input type="text" placeholder="Enter GRE score" /> <br>
                                        <input type="text" placeholder="Enter GRE date" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="save-btn">Save & Continue</button>
                    </div>

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
</body>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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


    document.querySelectorAll('.switch-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            // Uncheck all other checkboxes when one is checked
            document.querySelectorAll('.switch-checkbox').forEach((otherCheckbox) => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        });
    });


    // Initially hide all dropdown-content elements
    document.addEventListener('DOMContentLoaded', function() {
        const allDropdowns = document.querySelectorAll('.dropdown-content');
        allDropdowns.forEach(dropdown => {
            dropdown.style.display = 'none'; // Hide all by default
        });

        // Add event listener to radio buttons to show dropdown content when selected
        document.querySelectorAll('.radio-btn input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Hide all dropdowns when a radio button is clicked
                const allDropdowns = document.querySelectorAll('.dropdown-content');
                allDropdowns.forEach(dropdown => {
                    dropdown.style.display = 'none';
                });

                // If the radio button is checked, show its corresponding dropdown
                if (this.checked) {
                    const contentId = 'dropdown' + this.id.replace('radio',
                        ''); // Create content ID based on radio button ID
                    const content = document.getElementById(contentId);
                    if (content) {
                        content.style.display =
                            'block'; // Show the content for this radio button
                    }
                }
            });
        });
    });




    document.addEventListener("DOMContentLoaded", function() {
        const customcontent = document.querySelectorAll('.custom-dropdown-content');
        customcontent.forEach(drop => {
            drop.style.display = 'none'; // Hide all by default
        });
    })




    document.addEventListener("DOMContentLoaded", function() {
        const customCheckboxes = document.querySelectorAll('.custom-switch-checkbox');

        customCheckboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('change', function() {
                const content = document.getElementById(`custom-dropdown-content-${index}`);

                // Toggle visibility of the content when checkbox is checked
                if (checkbox.checked) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }


            });
        });
    });
</script>
<script src="path-to-your-script.js" defer></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyb1c8lXmsB7xD/Rz5KpKRYol9C22k9q3dT3h43a" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzjw8f+ua7Kw1TIq0XPm+L4QDsQ39Pp6pD/R8ikEo0ZXXzvD2IRsqz1d8YzU9m6d" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</html>
