@extends('layouts.app')
@section('title', 'EduX | Edit College')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Edit College</h1>
            <a href="{{ route('colleges.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Colleges
                List</a>
        </header>
        <br>
        <br>
        <form action="{{ route('colleges.update', $college->id) }}" method="POST">
            @csrf
            @method('POST') <!-- This should be 'PUT' or 'PATCH' for updates -->

            <!-- Form fields for college editing go here -->
            <input type="text" name="name" value="{{ $college->name }}" required>
            <input type="text" name="city" value="{{ $college->city }}" required>
            <input type="text" name="zone" value="{{ $college->zone }}" required>

            <button type="submit">Update College</button>
        </form>
    </div>
@endsection
