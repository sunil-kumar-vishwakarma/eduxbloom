@extends('layouts.app')
@section('title', 'EduX | Create Team')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create Team</h1>
            <a href="{{ route('partners.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Team List</a>
        </header>
        <br>
        <br>
        <form class="create-form" action="{{ route('partners.store') }}" method="POST">
            @csrf
            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" placeholder="Enter designation" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

             <label for="contact">Contact:</label>
            <input type="tel" id="contact" name="contact" placeholder="Enter contact number" pattern="[0-9]{10}" required>
                    
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" placeholder="Enter category" required>
        
            <label for="joined_date">Joined Date:</label>
            <input type="date" id="joined_date" name="joined_date" required>
        
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select> 

            <button type="submit">Create Team</button>
        </form>
    </div>
@endsection
