@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Include FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <title>Document</title>
    <style>
        .filter-search-wrapper {
            margin-top: 10%;
        }

        .search-container-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            padding: 0 16px;
        }

        .search-container {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 100%;
            /* max-width: 1150px; */
            border-radius: 8px;
            padding: 16px 20px;
            align-items: center;
            justify-content: space-between;
        }

        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #f1f4f9;
            padding: 10px 14px;
            border-radius: 8px;
            min-width: 250px;
        }

        .search-icon {
            width: 20px;
            height: 20px;
            fill: #333;
        }

        .search-bar {
            border: none;
            outline: none;
            width: 100%;
            font-size: 15px;
            background: transparent;
            color: #333;
        }

        .custom-dropdown {
            position: relative;
            min-width: 200px;
            width: fit-content;
        }

        .dropdown {
            width: 100%;
            appearance: none;
            background-color: #f1f4f9;
            border: none;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 15px;
            color: #333;
            cursor: pointer;
        }

        .dropdown-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #555;
            font-size: 14px;
        }


        .dropdown:focus {
            outline: 2px solid #2764c5;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                align-items: stretch;
                padding: 20px;
            }

            .custom-dropdown {
                min-width: 350px;
            }

            .dropdown,
            .search-box {
                width: 100%;
                max-width: 350px;
            }
        }


        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 100%;
            max-width: 1150px;
            border-radius: 16px;
            padding: 16px 20px;
            align-items: center;
            justify-content: space-between;
        }

        .filter-item {
            flex: 1 1 200px;
            position: relative;
        }

        .custom-dropdown select {
            width: 100%;
            appearance: none;
            background-color: #f1f4f9;
            border: 1px solid #d0d7e2;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 15px;
            color: #333;
            font-weight: 500;
            cursor: pointer;
            transition: border 0.3s ease;
        }

        .custom-dropdown select:focus {
            border-color: #2764c5;
            outline: none;
        }


        .filter-btn-wrapper {
            flex: 1 1 200px;
        }

        .filter-btn {
            background-color: #2764c5;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s ease;
        }

        .filter-btn:hover {
            background-color: #1f4fa1;
        }

        .filter-icon {
            width: 18px;
            height: 18px;
            fill: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-item,
            .filter-btn-wrapper {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 1024px) {
            .search-container {
                padding: 16px 0;
            }

            .filters {
                padding: 16px 0;
            }

        }


        .programs-container {
            display: grid;
            grid-template-columns: repeat(3, minmax(300px, 1fr));
            gap: 24px;
            padding: 40px 20px;
        }

        .program-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .program-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .program-header a:hover {
            text-decoration: underline;
        }

        .program-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .program-header h3 {
            font-size: 16px;
            margin: 0;
            color: #1a1a1a;
            font-weight: 700;
            line-height: 1.4;
        }

        .program-badges {
            margin: 10px 0;
            display: flex;
            gap: 10px;
        }

        .badge {
            background-color: #2764c5;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .program-details small {
            color: #888;
            font-size: 13px;
        }

        .program-details p {
            margin: 6px 0;
            font-weight: 500;
        }

        .program-details a:hover {
            text-decoration: underline
        }

        .program-details table {
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .program-details td {
            padding: 10px 0;
            color: #333;
            vertical-align: top;
        }

        .program-details tr {
            border-bottom: 1px solid #e0e0e0;
        }

        .program-details tr:last-child {
            border-bottom: none;
        }

        .program-details tr td:first-child {
            font-weight: 600;
            width: 50%;
        }


        .program-footer {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
            /* push footer to bottom */
        }

        .success-btn {
            background-color: rgb(230, 239, 254);
            color: rgb(10, 90, 218);
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 13px;
            cursor: pointer;
            margin-left: 8px;
        }

        .apply-btn {
            /* background: #2764c5; */
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .apply-btn:hover {
            background: #1f4fa1;
        }

        @media (max-width: 1024px) {
            .filter-search-wrapper {
                margin-top: 20%;
            }


            .programs-container {
                grid-template-columns: repeat(2, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .programs-container {
                grid-template-columns: 1fr;
            }
        }

        /* Modal base styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            inset: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            overflow-y: auto;
            padding: 20px;
        }

        .modal.show {
            display: block;
            opacity: 1;
            pointer-events: auto;
        }

        /* Modal content box */
        .modal-content {
            background-color: #fff;
            margin: 60px auto;
            padding: 30px 24px;
            border-radius: 16px;
            width: 100%;
            max-width: 550px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: slideUp 0.4s ease;
        }

        /* Slide up effect */
        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-btn {
            position: absolute;
            top: 14px;
            right: 18px;
            font-size: 26px;
            font-weight: bold;
            color: #999;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #000;
        }

        .note {
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Accordion */
        .accordion-item {
            margin-bottom: 10px;
        }

        .accordion-btn {
            background-color: #2764c5;
            color: #fff;
            cursor: pointer;
            padding: 12px 16px;
            width: 100%;
            border: none;
            text-align: left;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .accordion-btn:hover {
            background-color: #1f4fa1;
        }

        .accordion-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
            background: #f7f9fc;
            border-radius: 0 0 8px 8px;
            margin-top: 4px;
            padding: 0 16px;
        }

        .accordion-panel p {
            margin: 10px 0;
            font-size: 14px;
        }

        .accordion-item.open .accordion-panel {
            max-height: 300px;
            padding: 12px 16px;
        }

        /* Additional Info */
        .info-note {
            font-size: 13px;
            color: #555;
            margin-top: 20px;
        }

        /* Responsive breakpoints */

        /* Tablets and below */
        @media (max-width: 768px) {
            .filter-search-wrapper {
                margin-top: 20%;
            }

            .modal-content {
                padding: 24px 20px;
                width: 95%;
                margin: 40px auto;
            }

            .accordion-btn {
                font-size: 14px;
                padding: 10px 14px;
            }

            .accordion-panel p {
                font-size: 13px;
            }

            .note,
            .info-note {
                font-size: 12px;
            }
        }

        /* Small phones */
        @media (max-width: 480px) {
            .filter-search-wrapper {
                margin-top: 20%;
            }

            .modal-content {
                padding: 20px 16px;
                width: 100%;
                margin: 30px auto;
                border-radius: 12px;
            }

            .close-btn {
                top: 10px;
                right: 12px;
                font-size: 22px;
            }

            .accordion-btn {
                font-size: 13px;
            }

            .accordion-panel {
                padding: 10px 14px;
            }
        }

        /* Main wrapper */
        .program-section {
            padding: 20px;
            max-width: 1500px;
            margin: auto;
            background: #f9f9f9;

        }

        /* Sort Dropdown */
        .sort-dropdown-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .sort-btn {
            /* background-color: #007bff; */
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sort-btn i {
            font-size: 14px;
        }

        /* Dropdown content */
        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 265px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 99;
            border-radius: 6px;
            padding: 12px;
            top: 110%;
            left: 0;
        }

        .dropdown-content1 .dropdown-header {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .dropdown-content1 a {
            display: block;
            padding: 8px 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            border-radius: 4px;
        }

        .dropdown-content1 a:hover {
            background-color: #f0f0f0;
        }

        .dropdown-content1 a.active {
            background-color: #e6f0ff;
            font-weight: bold;
            color: #0056b3;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        .pagination .page-item {
            margin: 0 4px;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #dee2e6;
            padding: 6px 12px;
            border-radius: 4px;
            background-color: #fff;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .active .page-link {
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }

        .pagination .disabled .page-link {
            color: #aaa;
            pointer-events: none;
            background-color: #f5f5f5;
        }
    </style>
    <!-- </head>

                    <body> -->

    <div class="filter-search-wrapper">
        {{-- Search and Top Filters --}}
        <div class="search-container">
            {{-- Keyword Search --}}
            <div class="search-box">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="search-icon" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.386 18.211C14.885 19.335 13.02 20 11 20 6.03 20 2 15.971 2 11 2 6.03 6.03 2 11 2c4.971 0 9 4.03 9 9 0 2.228-.81 4.267-2.151 5.839l4.827 4.424-1.351 1.474-4.938-4.526ZM18 11c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7Z">
                    </path>
                </svg>
                <input type="text" id="keyword" class="search-bar" placeholder="What would you like to study?" />
            </div>

            {{-- Country Filter --}}
            <div class="custom-dropdown">
                <select class="dropdown" id="countries">
                    <option value="">Select Destination</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>

            {{-- Institute Filter --}}
            <div class="custom-dropdown">
                <select class="dropdown" id="institute">
                    <option value="">Select Institute</option>
                    {{-- Dynamic example --}}
                    {{-- @foreach ($schools as $value) --}}
                    {{-- <option value="{{ $value->name }}">{{ $value->name }}</option> --}}
                    {{-- @endforeach --}}
                    <option value="MIT">MIT</option>
                    <option value="Stanford">Stanford</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
        </div>

        {{-- Advanced Filters --}}
        <div class="filters">
            {{-- Program Level --}}
            <div class="filter-item custom-dropdown">
                <select id="program_level">
                    <option value="">Program Level</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="9th-12th Grade">9th–12th Grade</option>
                    <option value="Preparatory Courses">Preparatory Courses</option>
                    <option value="ESL">ESL + Bridging</option>
                    <option value="Gap Year">Gap Year</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>

            {{-- Field of Study --}}
            <div class="filter-item custom-dropdown">
                <select id="field_of_study">
                    <option value="">Field of Study</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Business">Business</option>
                    <option value="Health Sciences">Health Sciences</option>
                    <option value="Arts & Humanities">Arts & Humanities</option>
                    <option value="STEM">STEM</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>

            {{-- Language --}}
            <div class="filter-item custom-dropdown">
                <select id="language">
                    <option value="">Language</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>

            {{-- Program Tag / Delivery Mode --}}
            <div class="filter-item custom-dropdown">
                <select id="program_tag">
                    <option value="">Delivery Mode</option>
                    <option value="Online">Online</option>
                    <option value="In-Person">In-Person</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
        </div>
    </div>

    <hr>

    {{-- Program Sort Dropdown --}}
    <div class="program-section">
        <div class="sort-dropdown-wrapper">
            <button class="sort-btn" onclick="toggleDropdown3()">
                Sort <i class="fa-solid fa-arrow-down-short-wide"></i>
            </button>

            <div class="dropdown-content1" id="sortDropdown">
                <p class="dropdown-header">Sort By</p>
                <a href="#" class="active"><i class="fa-solid fa-circle-check"></i> Best Match (Default)</a>
                <a href="#"><i class="fa-solid fa-dollar-sign"></i> Tuition Cost (Low to High)</a>
                <a href="#"><i class="fa-solid fa-dollar-sign"></i> Tuition Cost (High to Low)</a>
                <a href="#"><i class="fa-solid fa-file-invoice"></i> Application Fee (Low to High)</a>
                <a href="#"><i class="fa-solid fa-file-invoice"></i> Application Fee (High to Low)</a>
            </div>
        </div>
    </div>



    <!-- @if ($programs->count())
                                <div class="programs-container" id="program-results">
                                    @foreach ($programs as $value)
    <div class="program-card">
                                            <div class="program-header">
                                                <img src="{{ asset('/public/storage/' . $value->image) }}?v={{ $value->updated_at->timestamp }}"
                                                    alt="University Logo" class="program-logo" />
                                                  <a href="#">
                                                    <h3>{{ $value->university_name }}</h3>
                                                </a>
                                            </div>

                                            <div class="program-badges">
                                                <span class="badge">{{ $value->success_prediction }} Demand</span>
                                                <span class="badge">Popular</span>
                                            </div>

                                            <div class="program-details">
                                                <small>{{ $value->certificate }}</small>
                                                <a href="#">
                                                    <p>{{ $value->college_name }}</p>
                                                </a>
                                                <hr />
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Course</td>
                                                            <td>{{ $value->college_course }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Location</td>
                                                            <td>{{ $value->location }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Campus Country</td>
                                                            <td>{{ $value->campus_country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Campus city</td>
                                                            <td>{{ $value->location }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tuition (1st year)</td>
                                                            <td> ${{ $value->tuition }}CAD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Application fee</td>
                                                            <td>${{ $value->application_fee }}CAD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Duration</td>
                                                            <td> {{ $value->duration }} months</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="program-footer">
                                                <p>Success prediction <button class="success-btn" onclick="openModal()">Details</button></p>
                                                <button class="apply-btn">Create Application</button>
                                            </div>
                                        </div>
    @endforeach
                                </div>
@else
    <p>No programs found.</p>
                            @endif
                        </div>
                        <div class="pagination">
                            {{ $programs->appends(request()->input())->links() }}
                        </div>
                        -->

    <div id="program-results">
        @include('partials.programs', ['programs' => $programs])
    </div>
    <script src="{{ asset('js/programs.js') }}" defer></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        function fetchPrograms() {
                            let countries = $('#countries').val();
                            $.ajax({
                                url: "{{ route('search') }}",
                                type: "GET",
                                data: {
                                    countries: countries
                                },
                                success: function(response) {
                                    $('#program-results').html(response);
                                }
                            });
                        }

                        $('#keyword').on('keyup', function() {
                            fetchPrograms();
                        });

                        $('#countries').on('change', function() {
                            fetchPrograms();
                        });
                    </script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function fetchPrograms(url = "{{ route('search') }}") {
            let keyword = $('#keyword').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    keyword: keyword,
                    // countries: countries
                },
                success: function(response) {
                    $('#program-results').html(response);
                }
            });
        }

        $('#keyword').on('keyup', function() {
            fetchPrograms();
        });

        // $('#countries').on('change', function () {
        //     fetchPrograms();
        // });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            fetchPrograms($(this).attr('href'));
        });
    </script>
    <script>
        function fetchProgramsCountry(url = "{{ route('search') }}") {
            let countries = $('#countries').val();

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    countries: countries
                },
                success: function(response) {
                    $('#program-results').html(response);
                },
                error: function(xhr) {
                    console.log('AJAX error:', xhr);
                }
            });
        }

        // When dropdown changes
        $('#countries').on('change', function() {
            fetchProgramsCountry();
        });

        // Handle AJAX pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let pageUrl = $(this).attr('href');
            fetchProgramsCountry(pageUrl);
        });
    </script>

    <script>
        function fetchPrograms() {
            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {
                    keyword: $('#keyword').val(),
                    countries: $('#countries').val(),
                    institute: $('#institute').val(),
                    program_level: $('#program_level').val(),
                    field_of_study: $('#field_of_study').val(),
                    language: $('#language').val(),
                    program_tag: $('#program_tag').val()
                },
                success: function(response) {
                    $('#program-results').html(response); // Just update program list
                }
            });
        }

        $('#keyword, #countries, #institute, #program_level, #field_of_study, #language, #program_tag').on('change keyup',
            function() {
                fetchPrograms();
            });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url, {
                keyword: $('#keyword').val(),
                countries: $('#countries').val(),
                institute: $('#institute').val(),
                program_level: $('#program_level').val(),
                field_of_study: $('#field_of_study').val(),
                language: $('#language').val(),
                program_tag: $('#program_tag').val()
            }, function(response) {
                $('#program-results').html(response);
            });
        });
    </script>

@endsection
