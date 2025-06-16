@extends('frontent.layouts.app')
@section('title', 'EduX | Student login')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/loginfrontend.css') }}">

    <div class="main-container">
        <!-- Left: Form -->
        <div class="card1-login">
            <div class="login-container">
                <div class="card-login">
                    {{-- <img src="{{ asset('images/edu-x white.png') }}" alt="Edu-x Logo"
                        style="height: 70px; width: 75px; margin-left: -13px;" />
                    <h2>Edu-X Team Login</h2> --}}

                    {{-- Backend success/error alerts --}}
                    @include('includes.alerts')

                    {{-- JS dynamic alert container --}}
                    <div id="js-alert-container"></div>

                    <form action="{{ route('team.login') }}" method="POST">
                    @csrf
                         <img src="{{ asset('images\old_edu-x white.png') }}" alt="Edu-x Logo"
                            style="height: 70px; width: 75px;" />
                        <br>
                        <input type="email" id="email" name="email" placeholder="Email" required />
                        <div id="emailError" style="color: #b92151; font-size: 12px; font-weight:bold;"></div>

                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" placeholder="Password" required />
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                        <div id="passwordError" style="color: #b92151; font-size: 12px; font-weight:bold;"></div>

                        <button class="buttn" type="submit" id="loginButton">Log In</button>
                    </form>

                    {{-- <div class="anchr">
                        <small><a href="/forgotpassword">Forgot password?</a></small><br>
                    </div> --}}

                  
                </div>
            </div>
        </div>

        <!-- Right: Image -->
        <div class="login-img">
            <img src="{{ asset('images\login-page (1).png') }}" alt="Login Illustration" />
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Show JS alert inside the page with animation and auto fade out
        function showJsAlert(type, message) {
            const container = document.getElementById('js-alert-container');
            if (!container) return;

            // Clear previous alerts
            container.innerHTML = '';

            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'}`;
            alertDiv.innerHTML = `
            <i class="fas ${type === 'error' ? 'fa-times-circle' : 'fa-check-circle'}"></i>
            ${message}
        `;

            // Style alert same as your CSS (from includes.alerts)
            alertDiv.style.position = 'fixed';
            alertDiv.style.top = '20px';
            alertDiv.style.left = '40%';
            alertDiv.style.transform = 'translateX(-50%)';
            alertDiv.style.padding = '12px 25px';
            alertDiv.style.fontSize = '18px';
            alertDiv.style.fontFamily = "'Roboto', sans-serif";
            alertDiv.style.borderRadius = '6px';
            alertDiv.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
            alertDiv.style.zIndex = '1000';
            alertDiv.style.backgroundColor = type === 'error' ? '#b92151' : '#28a745';
            alertDiv.style.color = 'white';
            alertDiv.style.animation = 'slideIn 0.6s ease-out forwards';

            container.appendChild(alertDiv);

            // Auto fade out after 3 seconds
            setTimeout(() => {
                alertDiv.style.animation = 'fadeOut 0.6s ease forwards';
                setTimeout(() => {
                    alertDiv.remove();
                }, 600);
            }, 3000);
        }

        document.getElementById("loginButton").addEventListener("click", async function() {
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            const emailError = document.getElementById("emailError");
            const passwordError = document.getElementById("passwordError");

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

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

@endsection
