@extends('frontent.layouts.app')
@section('title', 'EduX | Student Login')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/loginfrontend.css') }}">

    <div class="main-container">
        <!-- Left: Form Area -->
        <div class="card1-login">
            <div class="login-container">
                <div class="card-login">

                    {{-- Backend Alerts --}}
                    @include('includes.alerts')

                    {{-- JS Alerts --}}
                    <div id="js-alert-container"></div>
                    <form action="{{ route('student.login') }}" method="POST">
                    @csrf

                    <!-- <form id="loginForm" aria-label="Student Login Form"> -->
                        <img src="{{ asset('images/old_edu-x white.png') }}" alt="Edu-X Logo" height="70"
                            width="75" />
                        <br>

                        {{-- Email Input --}}
                        <input type="email" id="email" name="email" placeholder="Email" required aria-label="Email">
                        <div id="emailError" class="error-text"></div>

                        {{-- Password Input --}}
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Password" required aria-label="Password">
                            <span class="toggle-password" onclick="togglePassword()" role="button"
                                aria-label="Toggle password visibility">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                        <div id="passwordError" class="error-text"></div>

                        {{-- Submit Button --}}
                        <button type="submit" class="buttn" id="loginButton">Log In</button>
                    </form>

                    {{-- Forgot Password --}}
                    <div class="anchr">
                        <small><a href="/forgotpassword">Forgot password?</a></small>
                    </div>

                    {{-- Divider --}}
                    <div class="divider">
                        <span>OR</span>
                    </div>

                    {{-- Social Buttons --}}
                    <div class="social-buttons">
                        <a href="{{ route('google.login') }}" class="btnnn google" target="_blank">
                            <i class="fab fa-google"></i>
                            <span>Log In with Google</span>
                        </a>
                        <a href="#" class="btnnn apple">
                            <i class="fab fa-apple"></i>
                            <span>Log In with Apple</span>
                        </a>
                        <a href="{{ url('/auth/facebook') }}" class="btnnn facebook" target="_blank">
                            <i class="fab fa-facebook"></i>
                            <span>Log In with Facebook</span>
                        </a>
                    </div>


                    <br>
                    <div class="register">
                        <a href="/team-login">Login For Edu-X Team</a>
                    </div>
                    <div class="register">
                        <a href="/privacy/policy">Privacy & Cookies Policy</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Illustration -->
        <div class="login-img">
            <img src="{{ asset('images/login-page (1).png') }}" alt="Login Illustration" />
        </div>
    </div>

    {{-- Scripts --}}
    <!-- <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        // Show JS Alert
        function showJsAlert(type, message) {
            const container = document.getElementById('js-alert-container');
            container.innerHTML = '';

            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'}`;
            alertDiv.innerHTML =
                `<i class="fas ${type === 'error' ? 'fa-times-circle' : 'fa-check-circle'}"></i> ${message}`;
            alertDiv.style = `
                position: fixed;
                top: 20px;
                left: 40%;
                transform: translateX(-50%);
                padding: 12px 25px;
                font-size: 18px;
                font-family: 'Roboto', sans-serif;
                border-radius: 6px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                background-color: ${type === 'error' ? '#b92151' : '#28a745'};
                color: white;
                animation: slideIn 0.6s ease-out forwards;
            `;

            container.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.style.animation = 'fadeOut 0.6s ease forwards';
                setTimeout(() => alertDiv.remove(), 600);
            }, 3000);
        }

        // Login Button Click
        document.getElementById("loginButton").addEventListener("click", async function() {
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            const emailError = document.getElementById("emailError");
            const passwordError = document.getElementById("passwordError");

            emailError.textContent = "";
            passwordError.textContent = "";

            let isValid = true;

            // Email Validation
            if (!email) {
                emailError.textContent = "Email is required.";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailError.textContent = "Enter a valid email address.";
                isValid = false;
            }

            if (!isValid) return;

            try {
                const response = await fetch("/api/student/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        email,
                        password
                    }),
                });

                const data = await response.json();

                if (response.ok && data.status) {
                    window.location.href = "/userdashboard";
                } else {
                    if (data.errors) {
                        if (data.errors.email) emailError.textContent = data.errors.email[0];
                        if (data.errors.password) passwordError.textContent = data.errors.password[0];
                    } else {
                        showJsAlert('error', data.message || "Login failed");
                    }
                }
            } catch (error) {
                showJsAlert('error', "Something went wrong!");
                console.error(error);
            }
        });
    </script> -->

    {{-- Optional: Bootstrap and jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <style>
        .error-text {
            color: #b92151;
            font-size: 12px;
            font-weight: bold;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
        }

        .divider span {
            background: white;
            padding: 0 10px;
        }
    </style>

@endsection
