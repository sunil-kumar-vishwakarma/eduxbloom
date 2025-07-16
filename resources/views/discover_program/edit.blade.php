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
            <label for="college_url">College URL:</label>
            <input type="text" id="college_url" name="college_url" value="{{ old('college_url', $program->college_url) }}" required>
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
                    <option value="{{ $value->name }}" {{ $program->campus_country == $value->name ? 'selected' : '' }}>
                        {{ $value->name }}
                    </option>
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="program_level">Campus Program Level:</label>
           <select id="program_level" name="program_level">
                        <option value="Program Level" {{ $program->program_level == 'Program Level' ? 'selected' : '' }}>Program Level</option>
                        <option value="Undergraduate" {{ $program->program_level == 'Undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                        <option value="Postgraduate" {{ $program->program_level == 'Postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="language">Campus Language:</label>
           <select id="language" name="language">
                        <option value="Language" {{ $program->language == 'Language' ? 'selected' : '' }}>Language</option>
                        <option value="English" {{ $program->language == 'English' ? 'selected' : '' }}>English</option>
                        <option value="French" {{ $program->language == 'French' ? 'selected' : '' }}>French</option>
                    </select>
        </div>
        <div class="form-group">
        <label for="language">Field of Study:</label>
                <select id="field_of_study" name="field_of_study" onchange="updateSubcategories()" required>
                    <option value="">Field of Study</option>
                    <option value="Engineering and Technology" {{ $program->field_of_study == 'Engineering and Technology' ? 'selected' : '' }}>Engineering and Technology</option>
                    <option value="Sciences" {{ $program->field_of_study == 'Sciences' ? 'selected' : '' }}>Sciences</option>
                    <option value="Art" {{ $program->field_of_study == 'Art' ? 'selected' : '' }}>Art</option>
                    <option value="Business" {{ $program->field_of_study == 'Business' ? 'selected' : '' }}>Business,Management and Economics</option>
                    <option value="Law" {{ $program->field_of_study == 'Law' ? 'selected' : '' }}>Law,Politics,Community Service and Teaching</option>
                    <option value="Language" {{ $program->field_of_study == 'Language' ? 'selected' : '' }}>Language Proficiency</option>
                    <option value="Health" {{ $program->field_of_study == 'Health' ? 'selected' : '' }}>Health Sciences</option>
                    <option value="High School" {{ $program->field_of_study == 'High School' ? 'selected' : '' }}>High School</option>
                </select>
                </div>
                <!-- <i class="fas fa-chevron-down dropdown-icon"></i> -->
                <div class="form-group">
                 <label for="language">Field of Study Sub-Category:</label>
                <select id="program_tag" name="program_tag" required>
                    <option value="">Field of Study Sub-Category</option>
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

<script>
        const subcategories = {
            "Engineering and Technology": [
                "Aero Space, Aviation and Pilot Technology",
                "Agriculture",
                "Architecture",
                "Biomedical Engineering",
                "Chemical Engineering",
                "Civil Engineering, Construction",
                "Electrical Engineering",
                "Electronic",
                "Environmental Engineering",
                "Game Design, Game Animation, Game Creation",
                "General Engineering",
                "Industrial",
                "Material Engineering",
                "Mechanical, Manufacturing, Robotic Engineering",
                "Radiography",
                "Technology, Software, Computer, IT"
            ],
            "Sciences": [
                "Astronomy",
                "Biochemistry",
                "Biology",
                "Chemistry",
                "Computer Science",
                "Dental",
                "Environmental, Earth Sciences",
                "Food, Nutrition, Exercise",
                "General Science",
                "Geology",
                "Humanitarian Sciences",
                "Mathematics",
                "Optometry",
                "Pharmacy",
                "Physics",
                "Political",
                "Psychology, Philosophy, Therapy",
                "Veterinarian"
            ],
            "Art": [
                "Animation",
                "Anthropology",
                "Communication",
                "English Literature",
                "Fashion, Esthetics",
                "Fine Arts",
                "Food and Culinary",
                "Gender Studies",
                "General Art",
                "Geography",
                "Global Studies",
                "Graphic Design, Interior Design",
                "History",
                "Journalism",
                "Languages",
                "Liberal Arts",
                "Media, Photography, Film, Theatre, Performance",
                "Music, Audio",
                "Planning (Urban)",
                "Religion",
                "Sociology"
            ],
            "Business": [
                "Accounting",
                "Entrepreneurship",
                "Finance, Economics",
                "Hospitality and Tourism, Recreation",
                "Human Resources",
                "International Business",
                "Management, Administration, General",
                "Marketing, Analyst, Advertising",
                "Public Relation",
                "Supply Chain"
            ],
            "Law": [
                "Community, Social Service",
                "Law, Politics, Police, Security",
                "Teaching, Early Development, Child Care"
            ],
            "Language": [
                "General English",
                "Professional English",
                "Intensive English",
                "General French",
                "Professional French",
                "Intensive French"
            ],
            "Health": [
                "Health Sciences, Medicine, Nursing, Paramedic and Kinesiology",
                "Assistant Nurse, Lab Technician",
                "Optometry"
            ],
            "High School": [
                "Online High school diploma, Canada, US IB",
                "High school, English",
                "High school, French"
            ]
        };

        function updateSubcategories() {
            const category = document.getElementById("field_of_study").value;
            const subcategorySelect = document.getElementById("program_tag");

            // Clear previous options
            subcategorySelect.innerHTML = '<option value="">Field of Study Sub-Category</option>';

            if (subcategories[category]) {
                subcategories[category].forEach(sub => {
                    const option = document.createElement("option");
                    option.value = sub;
                    option.textContent = sub;
                    subcategorySelect.appendChild(option);
                });
            }
        }
    </script>
@endsection
