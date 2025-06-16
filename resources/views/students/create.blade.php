@extends('layouts.app')

@section('content')
<div class="settings-container">
    <header class="edit-student-header">
        <h1>Create Student</h1>
        <a href="{{ route('students.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Student List</a>
    </header>
<br>
<br>
    <form class="create-form" action="{{ route('students.store') }}" method="POST">

        @csrf
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" placeholder="Enter full name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email address" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" placeholder="Enter contact name" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter country name" required>

        <label for="joined_date">Joined Date:</label>
        <input type="date" id="joined_date" name="joined_date" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

        <button type="submit">Create Student</button>
    </form>
</div>
@endsection
