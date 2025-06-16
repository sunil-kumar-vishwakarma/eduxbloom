<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
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
            margin-left: 40px;

        }

        .section-row div {
            flex: 1;


        }

        .section-row div {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            margin-top: 15px;

        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 70%;
        }

        input {
            width: 100%;
            padding: 10px 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
            color: #504c4c;
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
            margin-top: 60px;

        }

        .save-btn:hover {
            background-color: #004080;
        }

        input[type="radio"] {
            transform: translateY(20px);

        }


        .dropdown-container {
            margin-top: 50px;

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

        .info {
            font-size: 18px;
            margin-left: 40px;
        }

        /* .dropdown-container select{
    gap: 50px;
  } */

        /* #grade {
            margin-left: 150px;
        } */



        .select2-container .select2-selection--single {
            height: 40px;
            display: flex;
            align-items: center;
        }

        .select2-selection__rendered {
            font-size: 16px;
            padding-left: 10px;
        }

        .select2-selection__arrow {
            height: 100%;
        }

        .radio {
            /* transform: translateY(40px); */
            margin-left: 60px;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        #radio-btn {
            margin-left: 0px;
        }

        .school {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        #school-fields-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Adds space between added fields */
            margin-bottom: 20px;
            /* Space between fields and buttons */
        }

        button {
            border-radius: 6px;
            padding: 10px 15px;
            margin-top: 10px;
            display: inline-block;
            color: black;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            cursor: pointer;

        }

        #attend {
            background-color: #d5e0eb;
            border: none;
            border-radius: 6px;
            color: rgb(82, 82, 147);
            font-weight: bold;
            /* padding: 10px; */
            font-size: 15px;

        }

        #continue {
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
        }


        .school-fields label {
            font-size: 14px;
            font-weight: bold;
        }

        .school-fields button {
            /* background-color: red; */
            background: linear-gradient(135deg, #bb0e45, #ad0039);
            /* Red background */
            color: white;
            /* White text */
            border: none;
            /* No border */
            padding: 10px 20px;
            /* Padding for a nice look */
            font-size: 14px;
            /* Adjust the font size */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor for buttons */
            margin-top: 10px;
            /* Space above the button */
        }


        #ico {
            transform: translateX(-45px);
        }



        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .error {
            border: 1px solid red !important;
        }


        #ico {
            transform: translateX(-45px);
        }


        html {
            scroll-behavior: smooth;
        }



        /* Media Queries for Responsiveness */

        /* Tablet and Small Devices */
        /*@media (max-width: 1024px) {*/
        /*    .profile-container {*/
        /*        flex-direction: column;*/
        /*    }*/

        /*    .profile-page {*/
        /*        margin-left: 0;*/
        /* Removed sidebar margin on smaller screens */
        /*    }*/

        /*    .profile-sidebar {*/
        /*        flex-basis: auto;*/
        /*        width: 100%;*/
        /*    }*/

        /*}*/

        /* Mobile Devices */
        /*@media (max-width: 768px) {*/
        /*    .sidebar {*/
        /*        position: static;*/
        /*        width: 100%;*/
        /*        height: auto;*/
        /*    }*/

        /*    .profile-page {*/
        /*        margin-left: 0;*/
        /*    }*/

        /*}*/

        /* Small Mobile Devices */
        /*@media (max-width: 480px) {*/
        /*    .profile-header h1 {*/
        /*        font-size: 18px;*/
        /*    }*/

        /*    .profile-section {*/
        /*        padding: 10px;*/
        /*    }*/

        /*    .section-row {*/
        /*        flex-direction: column;*/
        /*    }*/

        /*    .section-row div {*/
        /*        margin-bottom: 15px;*/
        /*    }*/

        /*    .save-btn {*/
        /*        padding: 8px 16px;*/
        /*    }*/
        /*}*/



        /* Small screens (phones) */


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
                margin: 0;

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
                    <li><a href="#" class="active"><i class="fas fa-graduation-cap"></i> Education History</a>
                    </li>
                    <li><a href="/user_testScore"><i class="fas fa-check-circle"></i> Test Scores</a></li>
                    {{-- <li><a href="visa.html"><i class="fas fa-passport"></i> Visa & Study Permit</a></li> --}}
                </ul>
            </aside>
            <main class="profile-content">
                <section class="profile-section">

                    <div class="dropdown-container">
                        <div class="toggle-button" onclick="toggleContent()">
                            <h2>Education Summary <span class="dropdown-icon"><i
                                        class="fa-solid fa-chevron-down"></i></span></h2>

                        </div>
                        <div id="toggle-content" class="hidden">
                            <p class="info">Please enter the information for the highest academic level that you have
                                completed.</p>

                            <div class="section-row">

                                <div class="dropdown-container">
                                    <select id="country-select" style="width: 80%; height: 70px; ">
                                        <option></option>
                                    </select>
                                </div>


                                <div class="dropdown-container"id="grade">
                                    <select id="grade-select" style="width: 80%; height: 70px;"
                                        placeholder="Select Grade">
                                        <option></option>
                                    </select>
                                </div>

                            </div>


                            {{-- <div class="section-row">

                                <div class="dropdown-container">
                                    <select id="grade-scheme-select" style="height: 70px;"
                                        placeholder="Select Grade Scheme">
                                        <option></option>
                                    </select>
                                </div>

                            </div> --}}


                            <div class="section-row" id="radio-btn">

                                <p class="info">I have graduated from this institution *</p>

                                <div class="radio">
                                    <label for="radio1"><input type="radio" id="radio1"
                                            name="choice">Yes</label>
                                    <label for="radio2"><input type="radio" id="radio2" name="choice">No</label>
                                </div>


                            </div>
                            <button class="save-btn">Save & Continue</button>

                        </div>
                    </div>
                </section>




                <section class="profile-section">
                    <div class="button1" onclick="toggleContent1()">
                        <h2>Schools Attended <span class="icon" id="ico"><i
                                    class="fa-solid fa-chevron-down"></i></span></h2>

                    </div>
                    <div id="toggle-content1">
                        <div id="school-fields-container">
                            <!-- Dynamically added school fields will appear here -->
                        </div>
                        <div class="school">
                            <button id="attend">+ Add School</button>
                            <a href="#"><button id="continue">Continue</button></a>
                        </div>
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

    $(document).ready(function() {
        // List of countries
        const countries = [
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina",
            "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
            "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina",
            "Botswana",
            "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon",
            "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros",
            "Congo (Congo-Brazzaville)",
            "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Denmark", "Djibouti",
            "Dominica",
            "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea",
            "Estonia", "Eswatini (fmr. " +
            "Swaziland)", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
            "Ghana", "Greece",
            "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras",
            "Hungary", "Iceland",
            "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan",
            "Jordan", "Kazakhstan",
            "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
            "Libya", "Liechtenstein",
            "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
            "Marshall Islands", "Mauritania",
            "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco",
            "Mozambique", "Myanmar (formerly Burma)",
            "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria",
            "North Korea", "North Macedonia",
            "Norway", "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea",
            "Paraguay", "Peru", "Philippines",
            "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis",
            "Saint Lucia", "Saint Vincent and the Grenadines",
            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia",
            "Seychelles", "Sierra Leone", "Singapore",
            "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea",
            "South Sudan", "Spain", "Sri Lanka", "Sudan",
            "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand",
            "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago",
            "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
            "United Kingdom", "United States of America",
            "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ];

        // Populate the dropdown
        const $dropdown = $('#country-select');
        countries.forEach(country => {
            $dropdown.append(new Option(country, country));
        });

        // Initialize Select2
        $dropdown.select2({
            placeholder: "Country of Education",
            allowClear: true
        });
    });



    $(document).ready(function() {
        // Grade options from Grade 1 to Doctoral Degree
        const grades = [
            "Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5",
            "Grade 6", "Grade 7", "Grade 8", "Grade 9", "Grade 10",
            "Grade 11", "Grade 12/High School", "1-year post-Secondary Certificate",
            "2-year Under-Graduate Diploma", "3-year Under-Graduate Advanced Diploma",
            "3-year Bachelors Degree", "4-year Bachelors Degree", "Undergraduate Degree", "Master's Degree",
            "Doctoral Degree (PhD)"
        ];

        // Populate the dropdown with grade options
        const $gradeSelect = $('#grade-select');
        grades.forEach(grade => {
            $gradeSelect.append(new Option(grade, grade));
        });

        // Initialize Select2 for searchable dropdown
        $gradeSelect.select2({
            placeholder: "Select Grade",
            allowClear: true
        });
    });



    $(document).ready(function() {
        // Grade scheme options
        const gradeSchemes = [

            "Other"
        ];

        // Populate the dropdown with grade scheme options
        const $gradeSchemeSelect = $('#grade-scheme-select');
        gradeSchemes.forEach(scheme => {
            $gradeSchemeSelect.append(new Option(scheme, scheme));
        });

        // Initialize Select2 for searchable dropdown
        $gradeSchemeSelect.select2({
            placeholder: "Select Grade Scheme",
            allowClear: true
        });
    });

    const addSchoolButton = document.getElementById("attend");
    const schoolFieldsContainer = document.getElementById("school-fields-container");

    if (addSchoolButton && schoolFieldsContainer) {
        addSchoolButton.addEventListener("click", () => {
            // Create a new div for school fields
            const schoolFields = document.createElement("div");
            schoolFields.classList.add("school-fields"); // Add a class for styling

            // Add content inside the new div
            schoolFields.innerHTML = `
            <h3>School Details</h3>
            <label for="schoolName">School Name:</label>
            <input type="text"  />
            <label for="schoolLocation">School Location:</label>
            <input type="text"  />
            <label for="startDate">Start Date:</label>
            <input type="date" />
            <label for="endDate">End Date:</label>
            <input type="date" />
            <button onclick="removeSchoolField(this)">Remove</button>
        `;

            // Append the new div to the container
            schoolFieldsContainer.appendChild(schoolFields);
        });
    } else {
        console.error("Add School Button or School Fields Container not found");
    }

    // Function to remove a specific school field
    function removeSchoolField(button) {
        if (button && button.parentElement) {
            button.parentElement.remove();
        }
    }




    // Your existing JavaScript for dropdowns and toggling content

    // Validation function
    // Validation function
    function validateForm() {
        let isValid = true;

        // Validate Country
        const countrySelect = document.getElementById('country-select');
        if (!countrySelect.value) {
            document.getElementById('country-error').style.display = 'block';
            countrySelect.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('country-error').style.display = 'none';
            countrySelect.classList.remove('error');
        }

        // Validate Grade
        const gradeSelect = document.getElementById('grade-select');
        if (!gradeSelect.value) {
            document.getElementById('grade-error').style.display = 'block';
            gradeSelect.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('grade-error').style.display = 'none';
            gradeSelect.classList.remove('error');
        }

        // Validate Grade Scheme
        const schemeSelect = document.getElementById('grade-scheme-select');
        if (!schemeSelect.value) {
            document.getElementById('scheme-error').style.display = 'block';
            schemeSelect.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('scheme-error').style.display = 'none';
            schemeSelect.classList.remove('error');
        }

        // Validate Radio Buttons
        const radio1 = document.getElementById('radio1');
        const radio2 = document.getElementById('radio2');
        if (!radio1.checked && !radio2.checked) {
            document.getElementById('radio-error').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('radio-error').style.display = 'none';
        }

        // If all fields are valid, close first section and open second section
        if (isValid) {
            // Close the first toggle-content section
            const firstContent = document.getElementById('toggle-content');
            firstContent.classList.add('hidden');

            // Open the second toggle-content1 section
            const secondContent = document.getElementById('toggle-content1');
            secondContent.style.display = 'block';

            // Scroll to the "Schools Attended" section
            secondContent.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }


    // Function to toggle the "Schools Attended" section
    function toggleContent1() {
        const content = document.getElementById('toggle-content1');
        content.style.display = content.style.display === 'none' || !content.style.display ?
            'block' :
            'none';
    }
</script>
<script src="path-to-your-script.js" defer></script>
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
