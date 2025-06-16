@extends('frontent.layouts.app')
@section('title', 'EduX | Student Registration')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">

    <div class="page">
        <div class="imag">
            <img src="{{ asset('images/registerpage-Photoroom.png') }}" alt="Register Image" />
        </div>

        <div class="conten">
            <div class="card1-student">
                <div class="card-student">
                    <small class="txt">Sign up with</small>
                    <div class="card-body-student">

                        <div id="js-alert-container"></div>

                        <div class="buttons">
                            <button id="facebookk">
                                <a href="{{ url('/auth/facebook') }}" aria-label="Facebook" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                Facebook
                            </button>
                            <button id="google-logo">
                                <a href="{{ route('google.login') }}" aria-label="Google" target="_blank" id="google">
                                    <i class="fab fa-google"></i>
                                </a>
                                Google
                            </button>
                           

                        </div>

                        <small class="txt">Or Sign up with email</small>

                        <form id="student-register-form">
                            @csrf

                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>

                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="input-icon password">
                                <i class="fas fa-lock lock-icon"></i>
                                <input type="password" name="password" id="password-input" placeholder="Your Password"
                                    required>
                                <i class="fas fa-eye eye-icon" id="toggle-password"></i>
                            </div>

                            <div class="password-requirements" id="password-rules">
                                <p><strong>Password must contain:</strong></p>
                                <ul>
                                    <li>At least 6 characters</li>
                                    <li>One uppercase letter</li>
                                    <li>One number</li>
                                </ul>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="tc" id="tc" required>
                                <label for="tc">I agree to the <a href="/term-and-condition" target="_blank">Terms and
                                        Conditions</a></label>
                            </div>

                            <div class="account">
                                <button type="submit" class="btn btn12-primary" id="btn1">Create Account</button>
                            </div>
                        </form>

                        <div id="login">
                            <p>Already have an account? <a href="/student-login">Login</a></p>
                        </div>

                        <small>*If you are a minor in your jurisdiction, your parent or legal guardian must agree to the
                            above terms.</small>

                        <div class="register">
                            <a href="/privacy/policy">Privacy & Cookies Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password-input');
        const passwordRules = document.getElementById('password-rules');

        passwordInput.addEventListener('focus', () => passwordRules.classList.add('show'));
        passwordInput.addEventListener('blur', () => passwordRules.classList.remove('show'));

        document.getElementById("toggle-password").addEventListener("click", function() {
            const input = document.getElementById("password-input");
            input.type = input.type === "password" ? "text" : "password";
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        function showJsAlert(type, message) {
            const container = document.getElementById('js-alert-container');
            if (!container) return;

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
            font-size: 18px; font-family: 'Roboto', sans-serif;
            border-radius: 6px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);
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

        document.getElementById('student-register-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = {
                name: form.name.value,
                email: form.email.value,
                password: form.password.value,
                tc: form.tc.checked
            };

            try {
                const response = await fetch('{{ url('/student/register') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (response.ok) {
                    showJsAlert('success', "Registration successful! Please check your email to verify your account !");
                    form.reset();
                    setTimeout(() => {
                        window.location.href = data.redirect_url || '/userdashboard';
                    }, 2000);
                } else {
                    const errorMsg = data.errors ? Object.values(data.errors).flat().join("<br>") : data
                        .message || "Registration failed";
                    showJsAlert('error', errorMsg);
                }
            } catch (error) {
                showJsAlert('error', "Something went wrong!");
                console.error(error);
            }
        });
    </script>

@endsection
