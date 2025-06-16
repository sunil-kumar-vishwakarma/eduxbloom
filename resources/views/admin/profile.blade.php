@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-header h2 {
            margin: 10px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .profile-header p {
            font-size: 17px;
            color: #888;
        }

        .profile-info {
            display: flex;
            justify-content: space-between;
        }

        .profile-info div {
            width: 48%;
        }

        .profile-info label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .profile-info p {
            font-size: 18px;
            color: #333;
        }

        .edit-btn {
            text-align: center;
        }

        .profile-edit-btn {
            display: inline-block;
            background-color: #4CAF50;
            border-radius: 5px;
            padding: 10px 20px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .profile-edit-btn a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            display: block;
        }

        .profile-edit-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .profile-edit-btn a:hover {
            color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .profile-info {
                flex-direction: column;
            }

            .profile-info div {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
            <!--<img src="{{ asset('image/admin logo.png') }}" alt="Profile" class="profile-img">-->
           <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('image/admin logo.png') }}" 
            alt="Profile Picture" width="100">
                   <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
        </div>
        
        <div class="profile-info">
            <div>
                <label>Phone:</label>
                <p>{{ $user->phone }}</p>
            </div>
            <div>
                <label>Address:</label>
                <p>{{ $user->address }}</p>
            </div>
            <div>
                <label>Birthday:</label>
                <p>{{ $user->birthday }}</p>
            </div>
        </div>
        
        <div class="profile-edit-btn">
            <a href="{{ route('profile.edit', ['id' => $user->id]) }}">Edit Profile</a>

        </div>
        
    </div>
</body>

</html>

@endsection
