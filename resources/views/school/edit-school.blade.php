@extends('layouts.app')
@section('title', 'EduX | Edit School')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Edit School</h1>
            <a href="{{ route('school.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to schools
                List</a>
        </header>
        <br>
        <br>
        <form action="{{ route('schools.update', $school->id) }}" method="POST">
            @csrf
            @method('POST') <!-- This should be 'PUT' or 'PATCH' for updates -->

            <!-- Form fields for school editing go here -->
            <input type="text" name="name" value="{{ $school->name }}" required>
            <input type="text" name="city" value="{{ $school->city }}" required>
            <input type="text" name="zone" value="{{ $school->zone }}" required>

            <button type="submit">Update School</button>
        </form>
    </div>
@endsection
