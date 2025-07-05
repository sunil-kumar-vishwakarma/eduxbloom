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
                <input type="text" id="designation" name="designation" value="{{ $partner->designation }}" placeholder="Enter designation" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ $partner->email }}" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="{{ $partner->password }}" placeholder="Enter password" required>
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

        <label for="role">Role:</label>
            <select id="role_id" name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{ $partner->user->role_id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                @endforeach
                
            </select> 

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
