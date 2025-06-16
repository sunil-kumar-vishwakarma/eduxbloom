@extends('layouts.app')

@section('content')
<div class="settings-container">
    <header class="edit-student-header">
        <h1>Edit Student Details</h1>
        <a href="{{ route('students.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Student List</a>
    </header>
<br>
<br>
    <form class="edit-form" action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="{{ $student->full_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $student->email }}" required>
        </div> 

        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ $student->contact }}" required>
       </div> 

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="{{old('country', $student->country) }}" required>

        <label for="joined_date">Joined Date:</label>
        <input type="date" id="joined_date" name="joined_date" value="{{old ('joined_date', $student->joined_date->format('Y-m-d'))  }}" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Active" {{ $student->status == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $student->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br>

        <button type="submit">Update Student</button>
        <br>
    </form>
</div>
@endsection
