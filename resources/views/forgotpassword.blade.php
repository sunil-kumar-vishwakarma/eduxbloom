@extends('frontent.layouts.app')
@section('title', 'EduX | Student Registration')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <style>
            body {
                margin: 0;
                font-family: 'Segoe UI', sans-serif;
                background-color: #f9f9f9;
            }

            .main-container {
                margin-top: 5%;
                display: flex;
                min-height: 100vh;
                flex-direction: row-reverse;
                align-items: center;
                justify-content: center;
                padding: 40px;
                box-sizing: border-box;
            }

            .card1-login {
                flex: 1;
                display: flex;
                justify-content: center;
            }

            .login-container {
                width: 100%;
                max-width: 450px;
            }

            .card-login {
                background: #fff;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .card-login h2 {
                margin-bottom: 25px;
                color: #333;
            }

            .card-login input {
                width: 100%;
                padding: 12px 14px;
                margin-bottom: 12px;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 14px;
            }

            .card-login .buttn {
                width: 100%;
                padding: 12px;
                background-color: #b92151;
                border: none;
                color: #fff;
                font-weight: bold;
                border-radius: 6px;
                cursor: pointer;
                margin-top: 10px;
            }

            .card-login .buttn:hover {
                background-color: #a01c46;
            }

            .social-buttons {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .social-buttons .btnnn {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                background-color: #f3f3f3;
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: 10px;
                justify-content: center;
            }

            .anchr,
            .registr,
            .tc {
                margin-top: 20px;
                text-align: center;
                font-size: 14px;
            }

            .anchr a,
            .registr a,
            .tc a {
                color: #0644a6;
                text-decoration: none;
            }

            .illustration {
                flex: 1;
                max-width: 650px;
                padding-left: 40px;
            }

            .illustration img {
                width: 100%;
                height: auto;
                object-fit: cover;
            }

            .register a {
                font-size: 14px;
                color: #0644a6;
                text-decoration: none;
                display: inline-block;
                margin-top: 10px;
            }

            .password-wrapper {
                position: relative;
                width: 100%;
                margin: 10px 0;
            }

            .password-wrapper input {
                width: 100%;
                padding: 12px 40px 12px 15px;
                border: 1px solid #ccc;
                border-radius: 6px;
                font-size: 1rem;
            }

            .toggle-password {
                position: absolute;
                right: 12px;
                top: 43%;
                transform: translateY(-50%);
                cursor: pointer;
                color: #888;
                font-size: 15px;
                transition: color 0.2s ease;
            }

            .toggle-password:hover {
                color: #333;
            }


            @media screen and (max-width: 991px) {
                .main-container {
                    /* flex-direction: column-reverse; */
                    padding: 20px;
                    /* margin-top: 20%; */
                }

                .illustration {
                    display: none;
                }
            }

            @media (max-width: 480px) {
                .main-container {
                    /* flex-direction: column-reverse; */
                    padding: 20px;
                    margin-top: 20%;
                }

                .illustration {
                    display: none;
                }
            }
        </style>

        <style>
            /* i Icon styling */
            i {
                margin-right: 8px;
                font-size: 1.2em;
            }

            /* Alert box common styling */
            .alert {
                position: fixed;
                top: 18px;
                left: 40%;
                transform: translateX(-50%);
                padding: 10px 20px;
                font-size: 18px;
                font-family: 'Roboto', sans-serif;
                /* border-radius: 10px 25px; */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                opacity: 0;
                /* Start hidden for animation */
                transition: opacity 0.6s ease, transform 0.6s ease;
                animation: slideIn 0.6s ease-out forwards;
            }

            /* Success Alert */
            .alert-success {
                background-color: rgb(5, 56, 17);
                color: white;
            }

            .alert-success i {
                color: #fff;
            }

            /* Error Alert */
            .alert-error {
                background-color: #dc3545;
                color: white;
            }

            .alert-error i {
                color: #fff;
            }

            /* Slide In animation */
            @keyframes slideIn {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                    /* Start slightly above */
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                    /* End in the correct position */
                }
            }

            /* Fade-out effect */
            .fade-out {
                animation: fadeOut 0.6s ease forwards;
            }

            @keyframes fadeOut {
                0% {
                    opacity: 1;
                    transform: translateY(0);
                    /* Keep the alert centered */
                }

                100% {
                    opacity: 0;
                    transform: translateY(20px);
                    /* Move down gently during fade-out */
                }
            }
        </style>
    </head>

    <body>
        <div class="main-container">
            <!-- Left: Form -->
            <div class="card1-login">


                <div class="login-container">

                    <!-- @if (session('success'))
    <div id="alert-success" class="alert alert-success">
                                    <i class="fas fa-check-circle"></i>
                                    {{ session('success') }}
                                </div>
    @endif

                            @if (session('error'))
    <div id="alert-error" class="alert alert-danger">
                                    <i class="fas fa-times-circle"></i>
                                    {{ session('error') }}
                                </div>
    @endif -->

                    @php
                        $success = session('success');
                        $error = session('error');
                    @endphp

                    @if (!empty($success))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> {{ $success }}
                        </div>
                    @endif

                    @if (!empty($error))
                        <div class="alert alert-error">
                            <i class="fas fa-times-circle"></i> {{ $error }}
                        </div>
                    @endif

                    <div class="card-login">
                        <h2>Send Email</h2>
                        <!-- <form id="loginForm" action="{{ route('forgotpassword2') }}">

                                <input type="email" id="email" name="email" placeholder="Email" required />


                                 <button class="buttn" type="submit">Send</button>

                            </form> -->



                        <form action="{{ route('forgotpassword.send') }}" method="POST">
                            @csrf
                            <label for="email">Enter your email:</label>
                            <input type="email" name="email" required>
                            <button type="submit" class="buttn">Send Password Reset Link</button>
                        </form>

                        <div class="register">
                            <a href="/student-login"><i class="fas fa-arrow-left"></i>
                                Back on Step</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="illustration">
                <img src="{{ asset('images/login.avif') }}" alt="Login Illustration" />
            </div>
        </div>


        <!--
    <script>
        // Function to hide alert messages after 3 seconds
        setTimeout(() => {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-error');

            // Fade out success alert
            if (successAlert) {
                successAlert.classList.add('fade-out');
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 600); // Wait for fade-out to complete
            }

            // Fade out error alert
            if (errorAlert) {
                errorAlert.classList.add('fade-out');
                setTimeout(() => {
                    errorAlert.style.display = 'none';
                }, 600); // Wait for fade-out to complete
            }
        }, 30000); // Keep messages visible for 3 seconds before starting fade-out
    </script> -->

        <script>
            // Function to hide alert messages after 10 seconds
            setTimeout(() => {
                const successAlert = document.getElementById('alert-success');
                const errorAlert = document.getElementById('alert-error');

                // Fade out success alert
                if (successAlert) {
                    successAlert.classList.add('fade-out');
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 600); // Wait for fade-out to complete
                }

                // Fade out error alert
                if (errorAlert) {
                    errorAlert.classList.add('fade-out');
                    setTimeout(() => {
                        errorAlert.style.display = 'none';
                    }, 600); // Wait for fade-out to complete
                }
            }, 10000); // 10 seconds
        </script>



        <script>
            //   function toggleDropdown(selectedSummary) {
            //     // Close all other details elements
            //     document.querySelectorAll('.dropdown-container details').forEach(details => {
            //       if (details.querySelector('summary') !== selectedSummary) {
            //         details.removeAttribute('open');
            //       }
            //     });
            //   }

            const toggleButton = document.querySelector(".navbar-toggler");
            const navbarCollapse = document.querySelector(".navbar-collapse");

            toggleButton.addEventListener("click", function() {
                if (navbarCollapse.classList.contains("collapse")) {
                    navbarCollapse.classList.remove("collapse");
                    navbarCollapse.classList.add("show");
                } else {
                    navbarCollapse.classList.remove("show");
                    navbarCollapse.classList.add("collapse");
                }

            });



            document.getElementById("loginButton").addEventListener("click", function() {
                // Get input values
                const email = document.getElementById("email").value.trim();
                const password = document.getElementById("password").value.trim();

                // Error message containers
                const emailError = document.getElementById("emailError");
                const passwordError = document.getElementById("passwordError");

                // Reset error messages
                emailError.textContent = "";
                passwordError.textContent = "";

                let isValid = true;

                // Validate email
                if (!email) {
                    emailError.textContent = "Email is required.";
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    emailError.textContent = "Enter a valid email address.";
                    isValid = false;
                }

                // Validate password
                const passwordCriteria = {
                    length: password.length >= 8,
                    uppercase: /[A-Z]/.test(password),
                    specialChar: /[!@#$%^&*(),.?":{}|<>]/.test(password),
                };

                if (!password) {
                    passwordError.textContent = "Password is required.";
                    isValid = false;
                } else {
                    const missingCriteria = [];
                    if (!passwordCriteria.length) {
                        missingCriteria.push("at least 8 characters");
                    }
                    if (!passwordCriteria.uppercase) {
                        missingCriteria.push("one uppercase letter");
                    }
                    if (!passwordCriteria.specialChar) {
                        missingCriteria.push("one special character");
                    }

                    if (missingCriteria.length > 0) {
                        passwordError.textContent = `Password must have ${missingCriteria.join(
          ", "
        )}.`;
                        isValid = false;
                    }
                }

                // If validation passes, redirect to dashboard
                if (isValid) {
                    window.location.href = "userdashboard.html";
                }
            });
        </script>
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById("password");
                const eyeIcon = document.getElementById("eyeIcon");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            }
        </script>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
