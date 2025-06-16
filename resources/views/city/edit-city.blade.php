@extends('layouts.app')
@section('title', 'EduX | Edit City')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Edit City</h1>
            <a href="{{ route('cities.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Cities List</a>
        </header>
        <br>
        <br>
        <form action="{{ route('cities.update', $city->id) }}" method="POST">
            @csrf
            @method('POST') <!-- This should be 'PUT' or 'PATCH' for updates -->
            
            <!-- Form fields for city editing go here -->
            <input type="text" name="name" value="{{ $city->name }}" required>
            <input type="text" name="zone" value="{{ $city->zone }}" required>
            
            <button type="submit">Update City</button>
        </form>
    </div>
@endsection
