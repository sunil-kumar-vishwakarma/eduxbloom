<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduX Admin-Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo-top">
                <h2>Admin<span class="dash-highlight">DASH</span></h2>
            </div>
            <div class="icon-container">
                <img src="{{ asset('public/image/edux.png') }}" alt="Admin Logo" class="logo-img">
            </div>
            <h3 class="login-title">Sign In</h3>
            <p class="login-subtitle">You need to sign in to continue your request</p>
            <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Enter email" required>
                
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Enter password" required autocomplete="current-password">
                
                <button type="submit" class="login-button">Sign In</button>
            </form>
            
            {{-- <a href="{{ route('forgot-password') }}" class="forgot-password">Forgot Password?</a> --}}
        </div>
    </div>
</body>

</html>
