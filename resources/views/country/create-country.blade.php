@extends('layouts.app')
@section('title', 'EduX | Create Country')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create Country</h1>
            <a href="{{ route('countries.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to countries List</a>
        </header>
        <br><br>
        <form class="create-form" action="{{ route('countries.store') }}" method="POST">
            @csrf
            <label for="name">Country Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter country name " required>
            <label for="city">City Name:</label>
            <input type="text" name="city" id="city" placeholder="Enter city name " required>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
