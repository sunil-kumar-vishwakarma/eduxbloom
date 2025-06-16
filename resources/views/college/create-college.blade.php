@extends('layouts.app')
@section('title', 'EduX | Create College')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create College</h1>
            <a href="{{ route('colleges.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Colleges
                List</a>
        </header>
        <br><br>
        <form class="create-form" action="{{ route('colleges.store') }}" method="POST">
            @csrf
            <label for="name">College Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter college name " required>

            <label for="city">City Name:</label>
            <input type="text" name="city" id="city" placeholder="Enter city name " required>

            <label for="zone">Zone:</label>
            <input type="text" name="zone" id="zone" placeholder="Enter college's zone name " required>

            <button type="submit">Create</button>
        </form>
    </div>
@endsection
