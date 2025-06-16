@extends('frontent.layouts.app')
@section('title', 'EduX | blog')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4 text-primary">Verify Your Email Address</h2>

        @if (session('message'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <p class="text-center mb-4">
            We’ve sent a verification link to your registered email. Please check your inbox and click the link to verify your account.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <button type="submit" class="btn btn-primary">Resend Verification Email</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <small class="text-muted">Didn’t receive the email? Click the button above to resend.</small>
        </div>
    </div>
</div>

@endsection
