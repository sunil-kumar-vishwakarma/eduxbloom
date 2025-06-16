@extends('layouts.app')
@section('title', 'EduX | Create School')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create School</h1>
            <a href="{{ route('school.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to schools
                List</a>
        </header>
        <br><br>
        <form class="create-form" action="{{ route('schools.store') }}" method="POST">
            @csrf
            <label for="name">School Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter school name " required>

            <label for="city">City Name:</label>
            <input type="text" name="city" id="city" placeholder="Enter city name " required>

            <label for="zone">Zone:</label>
            <input type="text" name="zone" id="zone" placeholder="Enter school's zone name " required>

            <button type="submit">Create</button>
        </form>
    </div>
@endsection
