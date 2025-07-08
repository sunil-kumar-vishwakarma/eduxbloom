@extends('layouts.app')

@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create Program</h1>
            <a href="{{ route('discover_program.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Program
                List</a>
        </header>
        <br><br>

        <form class="create-form" action="{{ route('discover_program.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required>

            <label for="university_name">University Name:</label>
            <input type="text" id="university_name" name="university_name" placeholder="Enter university name" required>

            <label for="certificate">Certificate:</label>
            <input type="text" id="certificate" name="certificate" placeholder="Enter certificate type" required>

            <label for="college_name">College Name:</label>
            <input type="text" id="college_name" name="college_name" placeholder="Enter college name" required>
            <label for="college_course">College Course:</label>
            <input type="text" id="college_course" name="college_course" placeholder="Enter college Cource" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter location" required>

            <label for="campus_country">Campus Country:</label>
            <select name="campus_country" id="campus_country" required>
                <option value="">Please Select</option>
                @foreach($country as $value)
                <option value="{{$value->name}}">{{$value->name}}</option>
                @endforeach
                
            </select>

                
                <label for="program_level">Campus Program Level:</label>
            

                <select id="program_level" name="program_level">
                        <option value="Program Level">Program Level</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                    </select>
        
           
                <label for="language">Campus Language:</label>
                <select id="language" name="language">
                        <option value="Language">Language</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                </select>
                <label for="language">Field of Study:</label>
                <select id="field_of_study" name="field_of_study" onchange="updateSubcategories()" required>
                    <option value="">Field of Study</option>
                    <option value="Engineering and Technology">Engineering and Technology</option>
                    <option value="Sciences">Sciences</option>
                    <option value="Art">Art</option>
                    <option value="Business">Business,Management and Economics</option>
                    <option value="Law">Law,Politics,Community Service and Teaching</option>
                    <option value="Language">Language Proficiency</option>
                    <option value="Health">Health Sciences</option>
                    <option value="High School">High School</option>
                </select>
                <!-- <i class="fas fa-chevron-down dropdown-icon"></i> -->

                 <label for="language">Field of Study Sub-Category:</label>
                <select id="program_tag" name="program_tag" required>
                    <option value="">Field of Study Sub-Category</option>
                </select>
                <!-- <i class="fas fa-chevron-down dropdown-icon"></i> -->
            <!-- </div> -->

            <!-- <input type="text" id="campus_country" name="campus_country" placeholder="Enter campus city" required> -->
            <label for="campus_city">Campus City:</label>
            <input type="text" id="campus_city" name="campus_city" placeholder="Enter campus city" required>

            <label for="tuition">Tuition (1st year):</label>
            <input type="number" id="tuition" name="tuition" placeholder="Enter tuition fee" required>

            <label for="application_fee">Application Fee:</label>
            <input type="number" id="application_fee" name="application_fee" placeholder="Enter application fee"
                required>

            <label for="duration">Duration:</label>
            <input type="text" id="duration" name="duration" placeholder="e.g. 2 years, 4 semesters" required>

            <label for="success_prediction">Success Prediction:</label>
            <input type="text" id="success_prediction" name="success_prediction" placeholder="e.g. High, Medium, Low"
                required>

            <label for="details">Details:</label>
            <textarea id="details" name="details" placeholder="Enter program description or details" rows="4" required></textarea>

            {{-- <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select> --}}

            <button type="submit">Create Program</button>
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
