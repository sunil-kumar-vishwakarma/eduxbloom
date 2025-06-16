@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')


    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .registration-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .registration-form {
            background-color: white;
            padding: 30px;
            width: 600px;
            max-height: 80vh;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow-y: auto;
        }

        .registration-form::-webkit-scrollbar {
            width: 8px;
        }

        .registration-form::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }

        .registration-form h2 {
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: 550;
        }

        .registration-form .form-group {
            margin-bottom: 15px;
        }

        .registration-form label {
            font-weight: 500;
        }

        .registration-form input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .name-container {
            display: flex;
            justify-content: space-between;
        }

        .name-container .form-group {
            width: 48%;
        }

        .registration-form .form-text {
            background-color: #e0efff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .registration-form .form-text i {
            margin-right: 10px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            border: black solid;
            border-radius: 6px;
            background: transparent;
            font-size: 20px;
            color: #555;
            cursor: pointer;
        }

        .phone-select {
            display: flex;
            align-items: center;
        }

        .phone-select img {
            width: 30px;
            margin-right: 10px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group #no {
            transform: translateY(-10px);
        }

        .form-group .input {
            transform: translateY(-7px);
        }

        .iti__country-list {
            padding-top: 40px;
        }

        .iti__search-container {
            position: absolute;
            top: 0;
            width: 100%;
            padding: 10px;
            background-color: #fff;
            z-index: 1;
            border-bottom: 1px solid #ddd;
        }

        .iti__search-input {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        label {
            /* color: #7c7c7c; */
            font-size: 14px;
        }

        .pass-desc p {
            color: #7c7c7c;
            font-size: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
        }

        .pass-desc ul li {
            color: #a2a2a2;
            font-size: 15px;
        }

        .pass-desc ul {
            display: inline-table;
        }

        .tc a {
            text-decoration: underline;
        }

        .tc #pp {
            margin-left: 20px;
        }

        .checkbox {
            margin-top: 30px;
        }

        .checkbox label {
            font-size: 15px;
            color: black;
        }

        /* .form-group button{

                    }*/

        p {
            margin-top: 30px;
            color: #7c7c7c;
        }

        p a {
            /*color: purple;*/
            text-decoration: underline;
        }

        p a:hover {
            color: purple;
            text-decoration: underline;
        }

        .container {
            position: relative;
            max-height: calc(100vh - 20px);
            /* Adjusts for padding/margin */
            overflow-y: auto;
        }

        /* .form-group #password {
                position: relative;
                display: flex;
                align-items: center;
            }*/

        .password-wrapper input {
            width: 100%;
        }

        .toggle-password {

            position: absolute;
            right: 10px;
            background: transparent;
            border: none;
            outline: none;
            /* Ensures no outline is shown */
            cursor: pointer;
            color: #555;
            font-size: 18px;
            padding: 0;
            /* Ensures no padding around the icon */

        }


        .toggle-password:focus,
        .toggle-password:active {
            outline: none;
            /* Remove outline when focused */
            box-shadow: none;
            /* Remove any potential shadow effect */
            color: inherit;
            /* Prevent color change */

        }

        .submit-container {
            position: sticky;
            bottom: 0;
            background-color: white;
            padding-top: 10px;
        }


        @media (max-width: 576px) {
            .registration-form {
                padding: 15px;
                width: 100%;
                max-height: 90vh;
            }

            .registration-form h2 {
                font-size: 16.8px;
            }

            .form-group label {
                font-size: 13px;
            }

            .btn-submit {
                font-size: 14px;
                padding: 8px;
            }

            .registration-form input {
                border: 1px solid black;
            }

            .name-container {
                flex-direction: column;
            }

            .name-container .form-group {
                width: 100%;
                margin-bottom: 10px;
            }

            .checkbox label {
                font-size: 13px;
            }

            .pass-desc p,
            .pass-desc ul li {
                font-size: 12px;
            }

            .close-btn {
                top: 10px;
                right: 10px;
                font-size: 18px;
            }

            .fa-solid,
            .fas {
                margin: 5px;
            }

            .tc a {
                font-size: 12px;
            }

            .submit-container {
                padding-top: 10px;
            }

            .form-text span {
                font-size: 12px;
            }

            /* Align phone number inputs (country code + input field) in a single line */
            .form-group .input {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-direction: row;
                gap: -10px;

            }

            .form-group .input input[type="tel"] {
                flex: 0 0 30%;
                /* Set country code field width */
                transform: translateY(-7px);
            }

            .form-group .input input[type="text"] {
                flex: 0.9;
                /* Expand mobile number field to fill remaining space */
            }

            /* Shift password eye icon to the right */
            /* .form-group .password-field {
                width: 100px;

                } */

            .form-group .toggle-password {
                position: absolute;
                /* top: 50%; */
                /* right: 10px; */
                transform: translateX(25px);
                /* transform: translateY(5px); */
            }
        }
    </style>


    <style>
        .container img {
            margin-left: -120px;
        }

        .navbar-brand div {
            font-size: 27px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
            font-weight: bold;
            margin-top: 17px;
        }


        .navbar-brand {
            display: flex;
            gap: 15px;
        }

        .navbar {
            background-color: #1652b4;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand img {
            height: 70px !important;
            width: auto;
        }

        /* Center navbar links on larger screens */
        .navbar-nav {
            gap: 15px;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 15px;
            position: relative;
            font-size: 17px;
        }

        .navbar-nav .nav-link:hover::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -8px;
            height: 2px;
            background-color: white;
            border-radius: 1px;
        }

        .navbar-toggler {
            border: none;
            /* Add a border to make it visible */

            padding: 0.5rem;
            /* Add some padding */
            color: #000;
            /* Ensure the icon is visible */
        }

        /* Adjust the toggler icon */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='%23000'%3E%3Cpath d='M0 7h30v3H0zm0 7h30v3H0zm0 7h30v3H0z'/%3E%3C/svg%3E");
        }

        /* Buttons styling */
        .btn-custom {
            color: white;
            background-color: blue;
            font-weight: bold;
            border: 0.5px solid white;
            padding: 8px 20px;
            margin: 5px;
            border-radius: 7px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: white;
            color: black;
        }


        #down {
            transform: translateY(23px);
        }

        #dropdownMenu a {
            text-decoration: none;
        }


        .dropdown-menu {
            padding-top: -400px;
            position: absolute;
            top: 80%;
            left: 0;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 10;
            /*color:#2E2EFF;*/

        }

        .dropdown-item {
            padding: 5px 10px;
            cursor: pointer;
            color: #2E2EFF;
            text-align: left;
            font-weight: bold;
            padding-top: -10px;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }




        #dropdownBtn {
            transform: translateY(-15px);
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 15px;
            position: relative;
            font-size: 15px;
            border: none;
            background-color: #1652b4;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            ;
        }


        .dropdown-btn {
            text-decoration: none;
        }

        .footer {
            background-color: #1652b4;
            color: white;
            padding: 40px 0;

        }

        .footer ul li a {
            display: inline-block;
        }

        .footer-column h2 {
            font-weight: 550;
            margin-left: 32px;
            font-size: larger;
        }

        .footer-column .head {
            font-weight: bold;
        }

        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            margin-top: 60px;
        }

        .footer-column .line ul li a {
            font-weight: 550;
            font-size: larger;
        }




        .footer-column .line h3:hover,
        .footer-column .line ul li a:hover::after {

            position: absolute;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: #000;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* .footer-column {
              width: 100%;
              max-width: 270px;
              margin-bottom: 30px;
            } */

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
            margin-left: 30px;
        }

        /* .line-h3
            {
               text-decoration: none;
               color: #fff;
            } */

        .footer-column p,
        .footer-column ul {
            margin-bottom: 15px;

        }

        .footer-column p {
            margin-left: 10px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-icons a {
            color: white;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s color 0.3s;
            padding: 0px 6px;
        }

        .li .social-icons {
            display: flex;
            gap: 10px;
        }


        .social-icons a:hover {

            background-color: #fff;
            /* Background color on hover */
            color: #003399;

        }


        .copyright {
            padding: 2px;
            margin-top: 50px;
            margin-left: 36%;

        }

        .footer .footer-column h2,
        .footer .footer-column h3 {
            margin-left: 33px;
        }



        .advertise-section {
            margin-top: 100px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: linear-gradient(to bottom right, #061e52, #0c347a);
            color: #fff;
            padding: 20px;
            width: 100%;
            max-width: 1520px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .advertise-text {
            max-width: 40%;
        }

        .advertise-text h1 {
            font-size: 2.5em;
            margin: 0;
            font-weight: bold;
        }

        .advertise-text p {
            font-size: 1em;
            margin-top: 10px;
            color: #d1d1d1;
        }

        .advertise-image img {
            width: 350px;
            height: auto;
        }


        .study-programs {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            width: 100%;
            margin-bottom: 20px;
        }

        .video1 {
            flex: 1;
            max-width: 50%;
        }

        .video1 h1 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #333;
        }

        .video1 p,
        .video1 ul {
            color: #555;
            line-height: 1.6;
        }

        .video1 ul li {
            margin-bottom: 5px;
        }

        .form {
            flex: 1;
            max-width: 35%;
        }

        .program {
            display: flex;
            flex-direction: column;
        }

        .name-container {
            display: flex;
            gap: 10px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        .btn-primary a {
            width: 300px;
            height: 80px;
            /* font-size:35; */
            font-size: 15;
            color: white;
            text-decoration: none;
        }

        .btn-primary a:hover {
            font-size: 15;
            color: white;
            text-decoration: none;
        }

        .btn-primary {
            /* background-color: #b92151 !important; */
            background: linear-gradient(135deg, #bb0e45, #ad0039) !important;
            color: #fff;
            padding: 10px 20px;
            border: none !important;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;

        }

        .btn-primary:hover {
            background-color: #b92151;
        }

        .details {
            border: 1px solid #b3aeae;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .name-container {
            display: flex;
            justify-content: space-between;
        }

        .name-container .form-group {
            width: 48%;
        }

        .form-group label p {

            transform: translateX(20px);
            margin-top: -24px;

        }





        .benefits-section {
            /* background-color: #0066e0; */
            /* background: linear-gradient(135deg, #0644a6, #3b7ded); */
            color: white;
            padding: 50px 20px;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .benefits-content h1 {
            color: #333;
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .benefits-content p {
            font-size: 1.2em;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .card-partner {
            /* background-color: white; */
            background: linear-gradient(135deg, #0644a6, #3b7ded);
            color: black;
            width: 250px;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 135px;
            height: 130px;
            margin-bottom: 15px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 33px;
        }

        .card-partner h2 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 10px;
            color: #fff;
        }

        .card-partner p {
            font-size: 1em;
            font-weight: 400;
            color: #ffffffb9;
        }

        .success-Story {
            margin-top: 30px;
            justify-content: center;
            text-align: center;
            align-items: center;
        }

        .success-Story h1 {
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 28px;
        }

        .success-Story .video2 video {
            display: inline;
            height: 200px;
            width: auto;
            gap: 50px;
        }


        .program-logo .plogo {
            margin-top: 30px;
            display: inline-block;
            margin-right: 80px;
            margin-left: 60px;
            justify-content: space-between;
        }

        .programs button {
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 50px;

        }

        .programs {
            margin-top: 50px;
        }


        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 700px;
            width: 100%;

        }

        .card-container .card-partner {
            /* background-color: #fff; */
            background: linear-gradient(135deg, #0644a6, #3b7ded);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-container .icon img {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }

        .card-container h3 {
            font-size: 1.2em;
            /* color: #333; */
            color: #fff;
            margin-bottom: 10px;
        }

        .card-container p {
            font-size: 0.9em;
            /* color: #666; */
            color: #dedada;
        }

        .card-container .cta {
            margin-top: 20px;
        }

        .cta button {
            background-color: #0065ff;
            color: #fff;
            padding: 10px 20px;
            width: 220px;
            height: 50px;
            font-size: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .cta button:hover {
            background-color: #004bbd;
        }


        :root {
            --primary-text: #192a4e;
            --white-text-white: #ffffff;
        }

        body {
            font-family: "Outfit", sans-serif;
            font-size: 16px;
        }

        .container3 {
            max-width: 840px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .section-title {
            color: var(--primary-text);
            text-align: center;
            font-size: 40px;
            font-family: "Cormorant Garamond";
            font-weight: bold;
            line-height: 48px;
            margin-bottom: 52px;
        }

        .testimonial-section {
            padding: 82px 15px;
            /* background-color: #3972e3; */
            background: linear-gradient(135deg, #0644a6, #3b7ded);
            margin-top: 50px;
        }

        .testimonial-section h2 {
            color: white;
            font-size: 35px;
        }

        .swiper-slide {
            text-align: center;
            border-radius: 20px;
            padding: 30px;
            background: var(--primary-text);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--white-text-white);
            min-height: 300px;
            /* Ensure all slides have the same minimum height */
            justify-content: space-between;
            height: 100%;
            /* This ensures that all slides expand to the same height */
        }


        /* .swiper-slide {

              height: 30%!important;
            } */

        .testimonial-items .testimonial-text {
            font-size: 16px;
            font-family: "Outfit";
            max-width: 330px;
            margin-bottom: 20px;
            min-height: 50px;
            /* Ensure consistent height for the text */
            margin-left: 30%;
            color: white;
        }

        .testimonial-items .testimonial-title {
            font-size: 16px;
            font-family: "Outfit";
            font-weight: bold;
            margin-top: px;
        }

        .testimonial-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin-bottom: 20px;
            margin-left: 42%;
        }

        /* Add this to avoid any extra margin/padding for the second testimonial */
        /* .testimonial-items {
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: space-between;
            } */

        .testimonial-img.tm-img-1 {
            background-image: url(https://w7.pngwing.com/pngs/646/829/png-transparent-avatar-man-ico-icon-cartoon-little-boy-avatar-cartoon-character-png-material-child-thumbnail.png);
        }

        .testimonial-img.tm-img-2 {
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2IYhSn8Y9S9_HF3tVaYOepJBcrYcd809pBA&s);
        }

        .swiper-pagination-bullet-active {
            background: var(--white-text-white);

        }



        .container4 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .country-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .country-button {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .country-button.active {
            background-color: #3972e3;
            border-color: #3972e3;
        }

        .country-button img {
            width: 30px;
            height: 20px;
            margin-right: 10px;
        }

        .country-button:hover {
            background-color: #3972e3;
        }

        .country-content {
            display: none;
            /* Hide all country content sections by default */
            justify-content: center;
            gap: 10px;
        }

        .country-content.active {
            display: flex;
            /* Show only the active section */
        }

        .content-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .container4 .country-buttons img {
            border-radius: 60%;
        }

        .institutions {
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 40px;
        }

        .institutions h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 30px;
            font-weight: bold;
        }

        .institutions button {
            border-radius: 5px;
        }

        .global {
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* margin-bottom: 310px; */
            margin-top: 40px;
        }

        .global h1 {
            font-weight: bold;
            font-size: 30px;
        }

        .gmap {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .global .score h3 {
            color: #007bff;
            font-size: 30px;
            font-weight: bold;
        }

        .recruit h1 {
            justify-content: left;
            margin-left: 260px;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .recruits-height {
            font-size: 2.5rem;
        }

        .recruit {
            display: inline-flex;
            gap: 450px;
            transform: translateY(-300px);
        }

        .recruit button {
            height: 50px;
            padding: 4px;
            margin-top: 30px;
            width: 160px;
        }


        .help-logo {
            display: flex;
            gap: 250px;
            justify-content: center;
        }

        .help-logo .hlogo {
            display: flex;
            flex-direction: column;
        }

        .help {
            margin-top: -240px;
            margin-bottom: 100px;
            padding: 40px;
        }

        .help-logo .hlogo img {
            margin-left: 10px;
            width: 70px;
            height: auto;
        }

        .help-logo h3 {
            color: #007bff;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        .help-logo small {
            color: #000;
            font-size: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold
        }

        .buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 20px;
            align-items: center;
        }

        .buttons button {
            border-radius: 20px;
            border: none;
            font-weight: 500;
        }

        .buttons button:hover {
            background-color: #007bff;
            color: white;
        }

        .country-btn {
            background-color: #f0f0f0;

            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .country-btn img {
            margin-right: 10px;
            width: 30px;
            height: 25px;
            border-radius: 40%;

        }

        .country-btn.active {
            background-color: #007bff;
            color: white;
        }

        .content-partner .images {
            display: none;
        }

        .content-partner .images img {
            margin: 30px;
            width: 200px;
            height: 100px;
            border: 1px solid #a39999;
            border-radius: 10px;
            padding: 20px;
        }

        .content-partner {
            margin: 40px;
            display: flex;
            justify-content: center;
        }
    </style>


    <style>
        @media (max-width: 767px) {

            /* Navbar adjustments */
            .navbar {
                padding: 10px 0;
            }

            .navbar-collapse {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: center;
            }


            .navbar-nav .nav-link {
                margin: 0 5px;
            }

            .navbar-nav .nav-item {
                font-size: 14px;
                margin-left: 5px;
            }

            footer {
                display: flex;
                flex-direction: column;
                /* Stack footer sections vertically */
                align-items: center;
                /* Center footer content horizontally */
                padding: 20px;
                /* Padding around the entire footer */
                text-align: center;
                /* Center text inside the footer */
            }

            /* Footer logo at the top */
            footer .footer-logo {
                width: 120px;
                /* Adjust logo width */
                margin-bottom: 20px;
                /* Space below the logo */
            }

            /* All footer content stacked vertically */
            footer .footer-column {
                width: 100%;
                /* Full width for each column */
                padding: 10px;
                /* Padding inside columns */
                margin-bottom: 20px;
                /* Add spacing between columns */
            }

            /* Footer links column - Stack vertically and center */
            footer .footer-links {
                display: flex;
                flex-direction: column;
                /* Stack the links vertically */
                align-items: center;
                /* Center the links */
                gap: 10px;
                /* Space between links */
                margin-bottom: 20px;
                /* Space below the link column */
            }

            /* Social icons row - Align icons horizontally */
            footer .social-icons {
                display: flex;
                flex-direction: row;
                /* Change to row to make icons appear in line */
                justify-content: center;
                /* Center the icons horizontally */
                gap: 15px;
                /* Space between icons */
                margin-bottom: 20px;
                /* Space below the icons row */
            }

            /* Text section with smaller font */
            footer p,
            footer .footer-contact {
                font-size: 14px;
                /* Smaller font size for readability */
                line-height: 1.6;
                /* Increase line height */
                margin-top: 10px;
                /* Space above text */
            }

            /* Form inputs and buttons */
            footer input,
            footer button {
                width: 90%;
                /* Make form elements wider */
                padding: 12px;
                /* Padding for ease of use */
                margin: 10px 0;
                /* Space between inputs */
            }

            .advertise-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .advertise-text {
                max-width: 90%;
                margin-bottom: 20px;
            }

            .advertise-image {
                max-width: 90%;
            }

            .contact-data {
                width: 100%;
            }


            .video1,
            .form {
                max-width: 100%;
            }

            .form {
                align-items: center;
                text-align: center;
                margin-left: 35px;
            }

            .form h1 {
                font-size: 20px;
                max-width: 300px;
                justify-content: center;
                text-align: center;
            }


            .video1 h1 {
                font-size: 22px;
            }



            .program .btn-primary {
                width: 100%;
            }

            /* .details {
                padding: 10px;
              } */

            .details {
                padding: 10px;
                /* Adjust padding for smaller screens */
                width: 90%;
                /* Ensure it takes full width */
                box-sizing: border-box;
                /* Include padding in width calculation */
                margin-left: -20px;
                padding-left: 30px;
            }

            .details .form-group {
                display: flex;
                flex-direction: column;
                /* Stack labels and inputs vertically */
                width: 90%;
                /* Ensure inputs take full width */
                margin-bottom: 15px;
                /* Space between form groups */
            }

            .details .form-group label {
                font-size: 1rem;
                /* Adjust font size for readability */
                margin-bottom: 5px;
                /* Add spacing below the label */
                text-align: left;
            }

            .details .form-group input {
                padding: 10px;
                /* Add padding for better touch interaction */
                font-size: 1rem;
                /* Adjust font size for readability */
                border: 1px solid #ccc;
                /* Ensure consistent border styling */
                border-radius: 5px;
                /* Slight rounding for aesthetics */
                width: 100%;
                /* Make input fields responsive */
            }

            .details .name-container {
                flex-direction: column;
                /* Stack name fields vertically */
                gap: 15px;
                /* Add spacing between elements */
                width: 90%;
                /* Ensure container takes full width */
            }

            .details .name-container .form-group {
                width: 100%;
                /* Full width for child form groups */
            }

            .details button {
                width: 100%;
                /* Full-width buttons for better usability */
                padding: 10px;
                /* Adjust padding for touch-friendly design */
                font-size: 1rem;
                /* Ensure button text is readable */
            }

            .details #inputtx {
                margin-top: 10px;
            }

            .details #checkbox {
                transform: translateX(-140px);
            }

            .benefits-content {
                margin-left: 20px;
                max-width: 340px;
            }

            .benefits-content h1 {
                font-size: 20px;
            }

            .benefits-content p {
                font-size: 16px;
            }

            .cards {
                display: flex;
                flex-direction: column;
                /* Stack cards vertically */
                align-items: center;
                /* Center cards horizontally */
                gap: 15px;
                /* Space between cards */
                padding: 10px;
                /* Add padding around the container */
            }

            .card-partner {
                width: 90%;
                /* Adjust card width to fit within mobile screen */
                max-width: 400px;
                /* Optional: Limit the maximum width */
                height: auto;
                /* Let height adjust to content */
                padding: 10px;
                /* Reduce padding for compact layout */
                box-sizing: border-box;
                /* Ensure padding is included in size */
                text-align: center;
                /* Center content inside the card */
                background-color: #fff;
                /* Card background color */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Subtle shadow effect */
                border-radius: 8px;
                /* Rounded corners for design consistency */
            }

            .card-partner img {
                width: 60%;
                /* Make images responsive */
                height: auto;
                /* Maintain aspect ratio */
                margin-bottom: 10px;
                /* Add space below the image */
                border-radius: 6px;
                /* Rounded corners for images */
                margin-left: 50px;
            }

            .card-partner h3 {
                font-size: 1rem;
                /* Reduce heading size */
                margin-bottom: 5px;
                /* Compact spacing */
            }

            .card-partner p {
                font-size: 0.9rem;
                /* Reduce text size */
                line-height: 1.4;
                /* Adjust line spacing for readability */
                margin: 0;
                /* Remove unnecessary margins */
            }

            .success-Story h1 {
                max-width: 350px;
                margin-left: 35px;
            }

            .program-logo .plogo h3 {
                font-size: 20px;
            }

            .programs #lmore {
                width: 400px;
            }

            .study-programs {
                flex-direction: column;
                gap: 30px;
                justify-content: center;
                margin: 3px -8px;
            }

            .partcont {
                flex-direction: column;
            }

            .card-container {
                margin-left: -200px;
            }

            .card-container .card-partner img {
                margin-left: -20px;
            }

            .cta button {
                width: 100%;
            }

            .testimonial-section {
                padding: 40px 10px;
            }

            .testimonial-section h2 {
                font-size: 30px;
            }

            .swiper-slide {
                min-height: auto;
                padding: 20px;
            }

            .testimonial-items .testimonial-text,
            .testimonial-items .testimonial-title {
                font-size: 14px;
            }

            .testimonial-img {
                width: 80px;
                height: 80px;
                margin-bottom: 15px;
            }


            .institutions {
                display: none;
            }


            .recruit {
                display: flex;
                flex-direction: column;
                /* Stack h1 and buttons vertically */
                align-items: center;
                /* Center align items horizontally */
                gap: 15px;
                /* Space between h1 and buttons */
                padding: 10px;
                /* Add padding for better spacing */
            }

            .recruit h1 {
                font-size: 1.5rem;
                /* Adjust font size for mobile screens */
                text-align: center;
                /* Center the heading */
                margin-bottom: 10px;
                /* Add space below the heading */
            }

            .recruit .button-container {
                display: flex;
                flex-direction: column;
                /* Stack buttons vertically */
                width: 100%;
                /* Ensure buttons span the container width */
                align-items: center;
                /* Center buttons within the container */
            }

            .recruit .button-container button {
                width: 90%;
                /* Adjust button width for mobile */
                max-width: 300px;
                /* Optional: Limit button width */
                font-size: 1rem;
                /* Adjust button text size */
                margin-bottom: 10px;
                /* Add space between buttons */
                padding: 10px 20px;
                /* Adjust padding for touch-friendly buttons */
                border-radius: 5px;
                /* Keep buttons rounded */
            }


            .content-img {
                width: 120px;
                height: 120px;
            }

            .global h1,
            .institutions h1 {
                font-size: 25px;
            }

            .global img {
                height: 200px;
                width: 300px;
                margin-left: -10px;
            }

            .global .score,
            .recruit {
                margin: 0;
                transform: none;
            }

            .recruit h1 {
                font-size: 22px;
                margin-left: 0;
            }


            .help {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                /* Stack hlogo elements vertically */
                align-items: center;
                /* Center align elements horizontally */
                gap: 15px;
                /* Add spacing between hlogo elements */
                padding: 10px;
                /* Add padding for better layout */
            }

            .help-logo {
                flex-direction: column;
                gap: 10px;
            }

            .help .hlogo {
                width: 90%;
                /* Adjust hlogo width for mobile */
                max-width: 300px;
                /* Optional: Limit maximum width */
                margin: 0 auto;
                /* Center hlogo within its container */
                text-align: center;
                /* Align content inside hlogo */
            }




            .buttons {
                justify-content: center;
                margin-left: 0;
            }

            .buttons button {
                width: 100%;
            }

            .country-btn img {
                width: 25px;
                height: 20px;
            }

            .content-partner .images {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }

            .content-partner .images img {
                width: 150px;
                height: 150px;
                margin: 10px;
            }

            .content-partner {
                margin: 20px 0;
            }

            .success-Story h1 {
                font-size: 22px;
            }

            .video2 {
                display: flex;
                flex-direction: column;
                gap: 40px;
                justify-content: center;
            }



            .programs {
                margin-top: 20px;
            }

            .programs button {
                width: 100%;
            }
        }



        .error {
            color: red;
            font-size: 0.9em;
        }

        @media (max-width: 991px) {
            .buttons {
                margin-left: 120px;
            }
        }

        .get-in-touch {
            font-size: 32px;
            max-width: 500px;
        }

        .partnerdesc {
            width: 100%;
            line-height: 2;
            text-align: justify;
        }

        .partnerdesc p {
            color: #292E3E;
            font-size: 18px;
            max-width: 600px;
        }

        .form-group textarea {
            border-color: #ccc;
        }

        .partnerdesc ul {
            text-align: justify;
        }

        .partnerdesc ul li {
            font-size: 18px;
            list-style-type: disc;
        }

        .partnerdesc h1 {
            font-size: 28px;
            font-weight: bold;
        }


        .partcont {
            display: flex;
            justify-content: space-around;
            padding: 0px 60px;
        }

        @media (min-width: 1200px) {

            .advertise-text h1 {
                font-size: 1.8em;
            }

            .content-partner .images img {

                width: 180px;

            }

        }
    </style>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Brand/Logo -->
            <!-- Toggle button for mobile screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links and buttons -->
            <div class="collapse navbar-collapse" id="navbarNav"></div>
        </div>
    </nav>



    <section class="advertise-section">
        <div class="advertise-text">
            <h1>Get your courses in front of engaged students actively seeking learning opportunities.</h1><br>
            <p>Connect with motivated students worldwide and convert interest into enrollments using our trusted global
                platforms.</p>
        </div>
        <div class="advertise-image">
            <img src="{{ asset('images/laptop.png') }}" alt="Laptop screen">
        </div>
    </section>

    <section class="study-programs">
        <div class="video1">
            <div style="padding:56.25% 0 0 0;position:relative;">
                <iframe src="https://player.vimeo.com/video/1083129107?h=ff2a5bb1a0&autoplay=1&muted=1&loop=1&background=1"
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                    style="position:absolute;top:0;left:0;width:100%;height:100%;" title="EduX Video">
                </iframe>
            </div>
            <script src="https://player.vimeo.com/api/player.js"></script>

        </div>
        <div class="form">
            <h1 class="get-in-touch">Are you a student?</h1>
            <button class="btn btn-primary" style="width:300px; font-weight:bold; margin-bottom:-20px"><a
                    href="{{ route('explr_school_Programs') }}">Search for study programs here <i
                        class="fa-solid fa-chevron-right" style="font-size:14px;"></i></a></button>
            <h1 class="get-in-touch" style="margin-top: 20px;">Get in touch to promote your programs here:</h1>
        </div>
    </section>

    <section class="partcont">
        <div class="partnerdesc">
            <h1>Be visible where students are searching</h1>
            <p>Keystone’s <b>500+ student websites</b> allow your institutions and programs to be discovered where students
                are searching online.</p>

            <p>Discover how we can help you:</p>
            <ul>
                <li>Promote your institutions and programs globally</li>
                <li>Be visible across search engines in 33+ languages</li>
                <li>Generate & nurture the right student leads</li>
                <li>Increase student engagement with personalized automation</li>
                <li>Learn from real-life examples of how we have helped similar institutions succeed</li>
            </ul>
            <p>Whether you wish to promote a single program, faculty, small college, or even an entire university system, we
                have a solution designed to help you. Fill out this form, and we’ll be in touch soon.</p>

        </div>

        <div class="form">
            <div class="details">
                <div class="program">
                    <div class="form-group">
                        <label for="long-text-input">Message</label>
                        <small>How can we help you?</small>
                        <textarea id="long-text-input" name="long_text" rows="2" cols="60" wrap="hard" maxlength="5000"></textarea>
                        <span class="error" id="msgError"></span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="School">School or Organisation *</label>
                    <input type="text" id="School" required>
                    <span class="error" id="schoolError"></span>
                </div>
                <div class="name-container">
                    <div class="form-group">
                        <label for="first-name">First Name *</label>
                        <input type="text" id="first-name" required>
                        <span class="error" id="firstNameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name *</label>
                        <input type="text" id="last-name" required>
                        <span class="error" id="lastNameError"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" required>
                    <span class="error" id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="inputtx">Tell us about yourself *</label>
                    <textarea id="inputtx" name="long_text" rows="2" cols="60" wrap="hard" maxlength="5000"
                        placeholder="Start from here"></textarea>
                    <span class="error" id="aboutError"></span>
                </div>
                <div class="form-group">
                    <label for="checkbox">
                        <input type="checkbox" id="checkbox">
                        <p>By submitting this form, you agree to receive communications from Keystone in accordance with our
                            privacy policy. You can unsubscribe from communications at any time*.</p>
                    </label>
                    <span class="error" id="checkboxError"></span>
                </div>
                <button class="btn-primary" onclick="validateForm(event)">Book a Demo</button>
            </div>
        </div>
    </section>



    <section class="benefits-section">
        <div class="benefits-content">
            <h1>Access More Institutions, Perks, and Faster Commissions</h1>


            <p style="text-align: center; white-space: nowrap;">
                Here to help you grow your business by offering the best opportunities and support.
            </p>
            <div class="cards">
                <div class="card-partner">
                    <img src="{{ asset('images/Commissions-300x214.png') }}" alt="Best Commissions" class="card-icon">
                    <h2>Best Commissions</h2>
                    <p>Quick and reliable commission so you get paid for your hard work.</p>
                </div>

                <div class="card-partner">
                    <img src="{{ asset('images/Perks.webp') }}" alt="Perks and Rewards" class="card-icon">
                    <h2>Perks and Rewards</h2>
                    <p>Earn bonuses and access top training to support your growth.</p>
                </div>

                <div class="card-partner">
                    <img src="{{ asset('images/School-1-300x214.png') }}" alt="1,500+ Institutions" class="card-icon">
                    <h2>1,500+ Institutions</h2>
                    <p>Access top programs at top institutions in the most desirable destinations.</p>
                </div>
            </div>
        </div>
    </section>



    <section class="success-Story">
        {{-- <h1>Success Stories From Our Partners</h1>
        <br>
        <div class="video2">
            <!-- First video -->
            <video controls autoplay muted>
                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
            </video>

            <!-- Second video -->
            <video controls autoplay muted>
                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">
            </video>

        </div> --}}

        <section class="programs">
            <h1>An Easy-to-Use Platform that <br>Connects You to the Right Programs</h1>


            <div class="program-logo">
                <div class="plogo">
                    <div class="elementor-widget-container">
                        <img src="images/Fast-50x50.png">
                    </div>
                    <div class="elementor-widget-container">
                        <h3 class="">Find Programs<br>Faster</h3>
                    </div>
                </div>



                <div class="plogo">
                    <div class="elementor-widget-container">
                        <img src="images/Application-50x50.png">
                    </div>
                    <div class="elementor-widget-container">
                        <h3 class="">One Easy <br>Application</h3>
                    </div>
                </div>



                <div class="plogo">
                    <div class="elementor-widget-container">
                        <img src="images/Platform-50x50.png">
                    </div>
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default">Central<br>Platform</h3>
                    </div>
                </div>


                <div class="plogo">
                    <div class="elementor-widget-container">
                        <img src="images/Data-50x50.png">
                    </div>
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default">Data Driven<br>Insights</h3>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary" onclick="openModal()">Learn More</button>

            <!-- <button class="btn btn-primary" id="lmore" ><a href="partner_registration.html" style="font-size: 15px;">Learn More</a></button> -->
            <!-- </div> -->
        </section>


        <div class="container1">
            <h1>We're Invested in Caring for You and the<br> Ecosystem of International Education</h1>
            <br>
            <div class="card-container">
                <div class="card-partner">
                    <div class="icon"><img src="images/Local_Support-padv6zedvk8vvy3q0pvo0yom28y4u9vpag42d1aknc.png"
                            alt="Local Support Icon"></div>
                    <h3>Local Support</h3>
                    <p>Our international recruitment experts are there to support you every step of the way.</p>
                </div>

                <div class="card-partner">
                    <div class="icon"><img src="images/Education-paegnkurb9vepjv4loech01zlox5m316ufxkunrabs.png"
                            alt="Education Icon"></div>
                    <h3>Education</h3>
                    <p>Expand your knowledge and stay ahead of your competitors with guided online courses and certificates.
                    </p>
                </div>

                <div class="card-partner">
                    <div class="icon"><img src="images/Events_Webinars-paej22082k92u293n22pv6gn1uotrmc6qglqb3jdvs.png"
                            alt="Events Icon"></div>
                    <h3>Events and Webinars</h3>
                    <p>Regular online webinars, training, and events to keep you updated on the latest trends and
                        regulations.</p>
                </div>

                <div class="card-partner">
                    <div class="icon"><img src="images/Data_Insights-paej03ibtzkknb3i2plp6692hycaqbkbgrobbcfwug.png"
                            alt="Data Icon"></div>
                    <h3>Data and Insights</h3>
                    <p>Industry-leading insights and knowledge to help you plan, expand, and achieve your goals.</p>
                </div>
            </div>

            <div class="cta">
                <!--<button class="btn btn-primary" onclick="openModal()">Let's Get Started</button>-->


                <!-- <a href="partner_registration.html"><button>Let's Get Started</button></a> -->
            </div>
        </div>
    </section>
    </div>



    <section class="testimonial-section" id="testimonials">
        <div class="container3">
            <h2 class="section-title">A Relationship Built on Trust and Credibility</h2>
            <div class="swiper testimonial-wrapper">
                <div class="swiper-wrapper" style="height: 44%;">
                    <div class="swiper-slide testimonial-items">
                        <div class="testimonial-img tm-img-1"></div>
                        <p class="testimonial-text"> Their unmatched expertise
                            skyrocketed my online presence and credibility. Highly recommended.</p>
                        <h3 class="testimonial-title">Amy</h3>
                    </div>
                    <div class="swiper-slide testimonial-items">
                        <div class="testimonial-img tm-img-2"></div>
                        <p class="testimonial-text">Thanks to Be Better, I've unlocked my true potential and transformed
                            how others perceive me. </p>
                        <h3 class="testimonial-title">John</h3>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>




    {{-- <section class="global">
        <h1>Global Presence for Global Recruitment</h1>
        <div class="gmap">
            <div class="score">
                <p>
                <h3 style="font-size:30px;">1,000+</h3>Globally</p><br>
                <p>
                <h3>200+ </h3>South Asia</p><br>
                <p>
                <h3>25+ </h3>South and East Asia,<br>African and Letin<br>America</p>
            </div>

            <div>

                <img src="images/Map.webp" height="500px" width="700px">
            </div>



        </div>
    </section> --}}


    {{-- <section class="recruit">
        <h1 class="recruits-height">Join 6,500+ Global<br> Recruitment Partners</h1>

        <button class="btn btn-primary" style ="font-weight:bold;" onclick="openModal()">Partner With Us</button>

    </section> --}}


    <div id="partnerModal" class="modal">
        <div class="registration-container">
            <div class="registration-form">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="close" onclick="closeModal()">&times;</span>
                </button>

                <h2>Register as a Recruitment Partner</h2>

                <div class="form-text">
                    <i class="fas fa-info-circle"></i>
                    <span>Please make sure only the business owner completes this form.</span>
                </div>

                <div class="name-container">
                    <div class="form-group">
                        <label for="first-name">First name *</label>
                        <input type="text" id="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last name *</label>
                        <input type="text" id="last-name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" id="no">Phone Number*</label>
                    <div class="input">
                        <input type="tel" id="phone" name="phone" style="width: 80px;" />
                        <input type="text" id="checkphone" required style="width: 80%;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" required style="flex: 1; width: 100%;">
                </div>

                <div class="form-group">
                    <label for="confirm-email">Confirm email *</label>
                    <input type="email" id="confirm-email" required style="width: 100%;">
                </div>

                <div class="form-group">
                    <div>
                        <label for="password">Password *</label>
                        <input type="password" id="password" class="password-field" required style="width: 90%;">

                        <button type="button" class="toggle-password"
                            style="width: 10px;  margin-right: 40px; margin-top: 6px; border: none ">
                            <i class="fas fa-eye"></i>
                    </div>
                </div>

                <div class="pass-desc">
                    <p>Password requirements</p>
                    <ul>
                        <li>At least 12 characters</li>
                        <li>A lowercase letter</li>
                        <li>An uppercase letter</li>
                        <li>A number</li>
                    </ul>
                    <ul class="ul2">
                        <li>A symbol</li>
                        <li>Does not have your first name</li>
                        <li>Does not have your last name</li>
                    </ul>
                </div>

                <div class="tc">
                    <a href="Terms_and _condition.html">Terms and Conditions <i
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <a href="privacy_policy.html" id="pp"> Privacy Policy <i
                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>


                <div class="checkbox">
                    <label><input type="checkbox">
                        I have reviewed and consented to the ApplyBoard Terms and Conditions and Privacy Policy The
                        foregoing information/application/document(s) are true and complete. I understand that a false
                        statement or supporting documents may disqualify me from becoming a Recruitment Partner for Edu-X.
                    </label>
                </div>

                <p>* Required information</p>
                <p>Already have an account? <a href="student_login.html">Login here.</a></p>


                <!-- </div> -->
                <!-- </div> -->

                <div class="submit-container">
                    <button class="btn-submit">Submit</button>
                </div>
            </div>
        </div>

    </div>

    {{-- <section class="help">
        <div class="help-logo">

            <div class="hlogo">
                <div class="elementor-widget-container">
                    <img src="images/Students-Helped-50x50.png">
                </div>
                <div class="elementor-widget-container">
                    <h3 class="">1,000,000+<br><small>Students<br>Helped</small></h3>
                </div>
            </div>


            <div class="hlogo">
                <div class="elementor-widget-container">
                    <img src="images/Acceptance-Rate-50x50.png">
                </div>
                <div class="elementor-widget-container">
                    <h3 class="">95%<br><small>Acceptance<br>Rate</small></h3>
                </div>
            </div>


            <div class="hlogo">
                <div class="elementor-widget-container">
                    <img src="images/School-Partnerships-50x50.png">
                </div>
                <div class="elementor-widget-container">
                    <h3 class="">1500+<br><small>Institutions<br>Partnership</small></h3>
                </div>
            </div>


            <div class="hlogo">
                <div class="elementor-widget-container">
                    <img src="images/50M-50x50.png">
                </div>
                <div class="elementor-widget-container">
                    <h3 class="">$100M+<br><small>Students<br>Helped</small></h3>
                </div>
            </div>
        </div>
    </section> --}}



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        function openModal() {
            document.getElementById("partnerModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("partnerModal").style.display = "none";
        }
    </script>
    <script>
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const isExpanded = navbarCollapse.style.display === 'flex';
            navbarCollapse.style.display = isExpanded ? 'none' : 'flex';
        });





        var swiper = new Swiper(".testimonial-wrapper", {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 30,
            loop: true,
            speed: 1300,
            autoplay: {
                delay: 2000, // 2 seconds
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });



        const buttons = document.querySelectorAll('.country-btn');
        const imagesDivs = document.querySelectorAll('.images');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                buttons.forEach(btn => btn.classList.remove('active'));

                // Add active class to clicked button
                button.classList.add('active');

                // Hide all images
                imagesDivs.forEach(div => div.style.display = 'none');

                // Get the country related to the clicked button
                const country = button.getAttribute('data-country');

                // Show the related images
                const countryImages = document.getElementById(country);
                countryImages.style.display = 'block';
                countryImages.style.display = 'flex';
            });
        });

        // Set the first button and content as active by default
        document.querySelector('.country-btn').click();




        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Show dropdown when hovering on the button
        dropdownBtn.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
            dropdownMenu.style.display = 'flex';
        });

        // Show dropdown when hovering over the menu
        dropdownMenu.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
        });

        // Hide dropdown when the mouse leaves the button or the menu
        dropdownBtn.addEventListener('mouseleave', () => {
            setTimeout(() => {
                if (!dropdownMenu.matches(':hover')) {
                    dropdownMenu.style.display = 'none';
                }
            }, 200); // Optional delay for smoother UX
        });

        dropdownMenu.addEventListener('mouseleave', () => {
            dropdownMenu.style.display = 'none';
        });

        function validateForm(event) {
            event.preventDefault();
            let isValid = true;

            function showError(id, message) {
                document.getElementById(id).textContent = message;
            }

            function clearError(id) {
                document.getElementById(id).textContent = "";
            }

            let message = document.getElementById("long-text-input").value.trim();
            let school = document.getElementById("School").value.trim();
            let firstName = document.getElementById("first-name").value.trim();
            let lastName = document.getElementById("last-name").value.trim();
            let email = document.getElementById("email").value.trim();
            let about = document.getElementById("inputtx").value.trim();
            let checkbox = document.getElementById("checkbox").checked;

            if (message === "") {
                showError("msgError", "Message is required");
                isValid = false;
            } else {
                clearError("msgError");
            }
            if (school === "") {
                showError("schoolError", "School or Organisation is required");
                isValid = false;
            } else {
                clearError("schoolError");
            }
            if (firstName === "") {
                showError("firstNameError", "First Name is required");
                isValid = false;
            } else {
                clearError("firstNameError");
            }
            if (lastName === "") {
                showError("lastNameError", "Last Name is required");
                isValid = false;
            } else {
                clearError("lastNameError");
            }
            if (email === "" || !email.includes("@")) {
                showError("emailError", "Valid Email is required");
                isValid = false;
            } else {
                clearError("emailError");
            }
            if (about === "") {
                showError("aboutError", "This field is required");
                isValid = false;
            } else {
                clearError("aboutError");
            }
            if (!checkbox) {
                showError("checkboxError", "You must agree to the terms");
                isValid = false;
            } else {
                clearError("checkboxError");
            }

            if (isValid) {
                window.location.href = "Institutions.html";
            }
        }
    </script>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
                 -->
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["us", "gb", "in"],
            separateDialCode: true,
            autoPlaceholder: "polite",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        // Function to add a search field
        function addSearchField() {
            const countryList = document.querySelector('.iti__country-list');

            // Ensure we only add the search field once
            if (!document.querySelector('.iti__search-container') && countryList) {
                const searchContainer = document.createElement('div');
                searchContainer.classList.add('iti__search-container');

                const searchInput = document.createElement('input');
                searchInput.setAttribute('type', 'text');
                searchInput.setAttribute('placeholder', 'Search country...');
                searchInput.classList.add('iti__search-input');

                searchContainer.appendChild(searchInput);
                countryList.insertBefore(searchContainer, countryList.firstChild);

                // Event listener for filtering countries based on input
                searchInput.addEventListener('input', function(e) {
                    const searchValue = e.target.value.toLowerCase();
                    const countries = document.querySelectorAll('.iti__country');

                    countries.forEach(country => {
                        const countryName = country.getAttribute('data-country-name').toLowerCase();
                        country.style.display = countryName.includes(searchValue) ? 'block' : 'none';
                    });
                });
            }
        }

        // Attach event to add the search field only when the dropdown is opened
        phoneInputField.addEventListener('click', function() {
            setTimeout(addSearchField, 1000); // Slight delay to ensure dropdown is fully rendered
        });
    </script>


    <script>
        document.querySelector('.btn-submit').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission

            const firstName = document.querySelector('#first-name');
            const lastName = document.querySelector('#last-name');
            const phone = document.querySelector('#checkphone');
            const email = document.querySelector('#email');
            const confirmEmail = document.querySelector('#confirm-email');
            const password = document.querySelector('#password');
            const checkbox = document.querySelector('.checkbox input');
            const warnings = [];

            // Clear previous warnings
            document.querySelectorAll('.error-message').forEach((msg) => msg.remove());

            // Helper function to add warnings
            const addWarning = (field, message) => {
                const errorMessage = document.createElement('div');
                errorMessage.className = 'error-message';
                errorMessage.style.color = 'red'; // Make it visually distinct
                errorMessage.textContent = message;
                field.parentElement.appendChild(errorMessage);
                warnings.push(field);
            };

            // First Name Validation
            if (!firstName.value.trim()) {
                addWarning(firstName, 'First name is required.');
            }

            // Last Name Validation
            if (!lastName.value.trim()) {
                addWarning(lastName, 'Last name is required.');
            }

            // Phone Number Validation
            if (!phone.value.trim()) {
                addWarning(phone, 'Phone number is required.');
            } else {
                // Add regex or specific validations for phone if necessary
                const phoneRegex = /^[0-9]{10,15}$/; // Example: 10-15 digit numbers
                if (!phoneRegex.test(phone.value.trim())) {
                    addWarning(phone, 'Phone number must be valid.');
                }
            }

            // Email Validation
            if (!email.value.trim()) {
                addWarning(email, 'Email is required.');
            } else {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Standard email validation
                if (!emailRegex.test(email.value.trim())) {
                    addWarning(email, 'Invalid email address.');
                }
            }

            // Confirm Email Validation
            if (!confirmEmail.value.trim()) {
                addWarning(confirmEmail, 'Confirm email is required.');
            } else if (email.value.trim() !== confirmEmail.value.trim()) {
                addWarning(confirmEmail, 'Emails do not match.');
            }

            // Password Validation
            if (!password.value.trim()) {
                addWarning(password, 'Password is required.');
            } else {
                const passwordRequirements = [{
                        regex: /.{12,}/,
                        message: 'At least 12 characters'
                    },
                    {
                        regex: /[a-z]/,
                        message: 'A lowercase letter'
                    },
                    {
                        regex: /[A-Z]/,
                        message: 'An uppercase letter'
                    },
                    {
                        regex: /[0-9]/,
                        message: 'A number'
                    },
                    {
                        regex: /[!@#$%^&*(),.?":{}|<>]/,
                        message: 'A symbol'
                    },
                ];
                const passwordErrors = passwordRequirements
                    .filter(req => !req.regex.test(password.value.trim()))
                    .map(req => req.message);

                if (passwordErrors.length > 0) {
                    addWarning(password, `Password must include: ${passwordErrors.join(', ')}`);
                }
            }

            // Checkbox Validation
            if (!checkbox.checked) {
                addWarning(checkbox, 'You must agree to the terms and conditions.');
            }

            // If there are warnings, scroll to the first one
            if (warnings.length > 0) {
                warnings[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            } else {
                // Redirect to the next page
                window.location.href = 'partner_profile.html';
            }
        });



        const firstName = document.querySelector('#first-name');
        const lastName = document.querySelector('#last-name');
        const Field = document.querySelector("#password");
        const passwordRequirements = document.querySelectorAll(".pass-desc ul li");

        // Function to check password and update the list items
        const checkPassword = () => {
            const password = Field.value;
            const firstNameValue = firstName.value.trim().toLowerCase();
            const lastNameValue = lastName.value.trim().toLowerCase();


            // Define password requirements
            const passwordChecks = [{
                    regex: /.{12,}/,
                    element: passwordRequirements[0]
                }, // At least 12 characters
                {
                    regex: /[a-z]/,
                    element: passwordRequirements[1]
                }, // A lowercase letter
                {
                    regex: /[A-Z]/,
                    element: passwordRequirements[2]
                }, // An uppercase letter
                {
                    regex: /[0-9]/,
                    element: passwordRequirements[3]
                }, // A number
                {
                    regex: /[!@#$%^&*(),.?":{}|<>]/,
                    element: passwordRequirements[4]
                }, // A symbol
                {
                    regex: new RegExp(firstNameValue, 'i'),
                    element: passwordRequirements[5],
                    shouldFail: true
                }, // Does not have first name
                {
                    regex: new RegExp(lastNameValue, 'i'),
                    element: passwordRequirements[6],
                    shouldFail: true
                } // Does not have last name
            ];

            passwordChecks.forEach(check => {
                if (check.shouldFail) {
                    if (check.regex.test(password)) {
                        check.element.style.color =
                            'red'; // Invalid, password should not contain first or last name
                    } else {
                        check.element.style.color =
                            'green'; // Valid, password does not contain first or last name
                    }
                } else {
                    if (check.regex.test(password)) {
                        check.element.style.color = 'green'; // Valid
                    } else {
                        check.element.style.color = 'red'; // Invalid
                    }
                }
            });
        };

        // Event listener to check password whenever it changes
        Field.addEventListener("input", checkPassword);
    </script>

    <script>
        const passwordField = document.querySelector(".password-field");
        const togglePasswordBtn = document.querySelector(".toggle-password");
        const togglePasswordIcon = togglePasswordBtn.querySelector("i");

        togglePasswordBtn.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);

            // Toggle eye icon
            togglePasswordIcon.classList.toggle("fa-eye");
            togglePasswordIcon.classList.toggle("fa-eye-slash");
        });
    </script>
