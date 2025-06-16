@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user->name }}</h2>
    <p>Email: {{ $user->email }}</p>
    <p>Phone: {{ $user->phone }}</p>
    <p>Address: {{ $user->address }}</p>
    <p>Birthday: {{ $user->birthday }}</p>
    <img src="{{ asset('/public/storage/' . $user->profile_photo) }}" alt="Profile Picture" width="100">
    <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
</div>
@endsection
