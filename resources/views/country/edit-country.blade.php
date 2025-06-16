@extends('layouts.app')
@section('title', 'EduX | Edit Country')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Edit Country</h1>
            <a href="{{ route('countries.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to countries List</a>
        </header>
        <br>
        <br>
        <form action="{{ route('countries.update', $country->id) }}" method="POST">
            @csrf
            @method('POST') <!-- This should be 'PUT' or 'PATCH' for updates -->
            
            <!-- Form fields for country editing go here -->
            <input type="text" name="name" value="{{ $country->name }}" required>
            <input type="text" name="city" value="{{ $country->city }}" required>
            
            <button type="submit">Update Country</button>
        </form>
    </div>
@endsection
