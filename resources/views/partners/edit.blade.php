@extends('layouts.app')
@section('title', 'EduX | Edit Team')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Edit Team Details</h1>
            <a href="{{ route('partners.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Team List</a>
        </header>
        <br>
        <br>
        <form class="edit-form" action="{{ route('partners.update', $partner->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" placeholder="Enter designation" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            {{-- <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ $partner->contact }}" required>
        </div> 

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="{{ $partner->category }}" required>
        </div> 
        

        <div class="form-group">
            <label for="joined_date">Joined Date:</label>
            <input type="date" id="joined_date" name="joined_date" value="{{ old('joined_date', $partner->joined_date->format('Y-m-d')) }}" required>
        </div> --}}

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Active" {{ $partner->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $partner->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit">Update Team</button>
        </form>
    </div>
@endsection
