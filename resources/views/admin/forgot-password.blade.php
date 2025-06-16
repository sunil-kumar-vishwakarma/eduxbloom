<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduX Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo-top">
                <h2>Admin<span class="dash-highlight">DASH</span></h2>
            </div>
            <div class="icon-container">
                <img src="{{ asset('image/edu-x white.png') }}" alt="Admin Logo" class="logo-img">
            </div>
            <h3 class="login-title">Reset Your Password</h3>
            <br>
            <br>
            <form class="login-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                <br>
                <br>
                <button type="submit" class="login-button">Send Reset Link</button>
                <a href="{{ route('login') }}" class="forgot-password">Remembered your password? Sign In</a>
            </form>
        </div>
    </div>
</body>

</html>
