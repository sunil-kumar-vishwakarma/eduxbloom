@extends('layouts.app')
@section('title', 'EduX | Create City')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create City</h1>
            <a href="{{ route('cities.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Cities List</a>
        </header>
        <br><br>
        <form class="create-form" action="{{ route('cities.store') }}" method="POST">
            @csrf
            <label for="name">City Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter city name " required>
            <label for="zone">Zone:</label>
            <input type="text" name="zone" id="zone" placeholder="Enter city's zone name " required>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
