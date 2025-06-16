@extends('layouts.app')

@section('content')
<div class="settings-container">
    <header class="edit-student-header">
        <h1>Edit Program Details</h1>
        <a href="{{ route('discover_program.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Programs List</a>
    </header>
    <br><br>

    <form action="{{ route('discover_program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Upload New Image (Optional)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($program->image)
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $program->image) }}" alt="Program Image" width="100">
                </div>
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="form-group">
            <label for="university_name">University Name:</label>
            <input type="text" id="university_name" name="university_name" value="{{ old('university_name', $program->university_name) }}" required>
        </div>

        <div class="form-group">
            <label for="certificate">Certificate:</label>
            <input type="text" id="certificate" name="certificate" value="{{ old('certificate', $program->certificate) }}" required>
        </div>

        <div class="form-group">
            <label for="college_name">College Name:</label>
            <input type="text" id="college_name" name="college_name" value="{{ old('college_name', $program->college_name) }}" required>
        </div>
        <div class="form-group">
            <label for="college_course">College Course:</label>
            <input type="text" id="college_course" name="college_course" value="{{ old('college_course', $program->college_course) }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $program->location) }}" required>
        </div>
        <div class="form-group">
            <label for="campus_country">Campus Country:</label>
           <select name="campus_country" id="campus_country" required>
                <option value="">Please Select</option>
                @foreach($country as $value)
                <option value="{{$value->name}}">{{$value->name}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="program_level">Campus Program Level:</label>
           <select id="program_level" name="program_level">
                        <option value="Program Level">Program Level</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="language">Campus Language:</label>
           <select id="language" name="language">
                        <option value="Language">Language</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                    </select>
        </div>
        
        <div class="form-group">
            <label for="campus_city">Campus City:</label>
            <input type="text" id="campus_city" name="campus_city" value="{{ old('campus_city', $program->campus_city) }}" required>
        </div>
        

        <div class="form-group">
            <label for="tuition">Tuition (1st year):</label>
            <input type="number" id="tuition" name="tuition" value="{{ old('tuition', $program->tuition) }}" required>
        </div>

        <div class="form-group">
            <label for="application_fee">Application Fee:</label>
            <input type="number" id="application_fee" name="application_fee" value="{{ old('application_fee', $program->application_fee) }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" value="{{ old('duration', $program->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="success_prediction">Success Prediction:</label>
            <input type="text" id="success_prediction" name="success_prediction" value="{{ old('success_prediction', $program->success_prediction) }}" required>
        </div>

        <div class="form-group">
            <label for="details">Details:</label>
            <textarea id="details" name="details" rows="4" required>{{ old('details', $program->details) }}</textarea>
        </div>

        {{-- Uncomment if you want status functionality
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Active" {{ $program->status == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $program->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        --}}



        <button type="submit">Update</button>
    </form>
</div>
@endsection
