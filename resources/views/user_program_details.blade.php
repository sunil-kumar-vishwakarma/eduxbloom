<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Institut Teccart-Brossard</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 25px;
            /* box-shadow: 0 0 15px rgba(0,0,0,0.08);
      background: #fff; */
            border-radius: 12px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 16px;
            color: #0644a6;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .program-title {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0 5px;
            color: #333;
        }

        .program-code {
            font-size: 13px;
            color: #999;
            margin-bottom: 20px;
        }

        .gallery-wrapper {
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
        }

        .gallery {
            display: flex;
            gap: 12px;
            width: max-content;
            align-items: flex-start;
        }

        .main-img {
            width: 400px;
            height: 300px;
            flex-shrink: 0;
        }

        .main-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .main-img img:hover {
            transform: scale(1.03);
        }

        .stacked-column {
            display: flex;
            flex-direction: column;
            gap: 10px;
            height: 300px;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .small-img {
            width: 200px;
            height: 145px;
            overflow: hidden;
        }

        .small-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .small-img img:hover {
            transform: scale(1.05);
        }

        .gallery-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .gallery-wrapper::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        .gallery-wrapper::-webkit-scrollbar-thumb:hover {
            background: #888;
        }

        @media (max-width: 768px) {


            .main-img {
                width: 300px;
                height: 220px;
            }

            .stacked-column {
                height: 220px;
            }

            .small-img {
                width: 140px;
                height: 105px;
            }

            .gallery {
                gap: 8px;
            }

            .summary {
                flex-direction: column;
            }
        }


        /* overview-section */
        .container-overview {
            width: 85%;
            margin: 30px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-header h2 {
            background: linear-gradient(90deg, #0644a6, #2764c5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .eligibility-btn {
            padding: 12px 50px;
            /* background: linear-gradient(90deg, #0644a6, #2764c5); */
            background-color: white;
            color: #0644a6;
            border: 1px solid #0644a6;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .eligibility-btn:hover {

            transform: translateY(-2px);
        }

        .summary {
            display: flex;
            gap: 40px;
        }

        .summary-text {
            flex: 1;
        }

        .summary-details {
            flex: 1;
        }

        .details-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .details-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            background: #f9f9ff;
            padding: 16px 18px;
            border-radius: 10px;
            transition: box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        .details-list li:hover {
            box-shadow: 0 6px 20px rgba(109, 40, 217, 0.15);
        }

        .detail-icon {
            font-size: 22px;
            background: linear-gradient(90deg, #0644a6, #2764c5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            /* for Firefox */
            color: transparent;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .detail-content h4 {
            font-size: 15px;
            margin: 0 0 4px;
            color: #222;
            font-weight: 600;
        }

        .detail-content p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }


        /* Description Show More */
        .description-wrapper {
            position: relative;
            max-height: 250px;
            overflow: hidden;
            transition: max-height 0.6s ease;
        }

        .description-wrapper.expanded {
            max-height: 1200px;
        }

        .fade-shadow {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 60px;
            width: 100%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), white);
            transition: opacity 0.4s;
        }

        .description-wrapper.expanded .fade-shadow {
            opacity: 0;
        }

        .show-more-btn {
            margin-top: 12px;
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: white;
            padding: 8px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.3s ease;
            display: inline-block;
        }


        .show-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

        }


        .requirement-section {
            width: 90%;
            max-width: 1000px;
            /* margin: 60px auto; */
            /* background: #fff; */
            padding: 40px 0px;
            border-radius: 16px;
            /* box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07); */
            animation: fadeInUp 0.7s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gradient-text {
            background: linear-gradient(90deg, #0644a6, #2764c5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .req-header h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .req-header h2,
        .req-subtitle,
        .requirement-card h4 i,
        .requirement-card .highlight {
            background: linear-gradient(90deg, #0644a6, #2764c5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .req-header .subtext {
            font-size: 15px;
            color: #666;
            margin-bottom: 30px;
        }

        .requirement-block {
            margin-top: 30px;
        }

        .req-subtitle {
            font-size: 22px;
            margin-bottom: 20px;
            position: relative;
            padding-left: 14px;
        }

        .req-subtitle::before {
            content: "";
            position: absolute;
            left: 0;
            top: 6px;
            height: 16px;
            width: 4px;
            background: #2764c5;
            border-radius: 2px;
        }

        .requirements {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .requirement-card {
            flex: 1 1 260px;
            background: linear-gradient(135deg, #f1f5ff, #fafaff);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(109, 40, 217, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .requirement-card::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 100px;
            height: 100px;
            background: rgba(109, 40, 217, 0.07);
            transform: rotate(45deg);
            border-radius: 20%;
        }

        .requirement-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(109, 40, 217, 0.12);
        }

        .requirement-card h4 {
            font-size: 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .requirement-card h4 i {
            margin-right: 8px;
        }

        .requirement-card p {
            font-size: 15px;
            color: #222;
            margin: 0;
        }

        .requirement-card .highlight {
            font-size: 26px;
            font-weight: bold;
            margin-top: 5px;
        }

        @media screen and (max-width: 600px) {
            .requirements {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
     @include('frontent_partials.userdash_sidebar')

    <!-- Main Content -->
    <div class="main-content">
        @include('frontent_partials.userdash_nav')

     <style>
        .school-hero {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            padding: 80px 20px;
            margin-top: 5%;
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .hero-left {
            flex: 0 0 100px;
            text-align: center;
        }

        .hero-left img {
            max-width: 100%;
            border-radius: 12px;
        }

        .hero-right {
            flex: 1;
            min-width: 280px;
        }

        .hero-right h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: #fff;
        }

        .school-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            padding: 60px 20px;
            max-width: 1200px;
            margin: auto;
            color: #e2e8f0;
        }

        .school-content {
            flex: 2;
            min-width: 300px;
        }

        .school-sidebar {
            flex: 1;
            background: rgb(184 198 223 / 25%);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid rgb(169 169 169);
            min-width: 280px;
        }

        .school-sidebar h3 {
            font-size: 1.2rem;
            margin-bottom: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.356);
            padding-bottom: 8px;
            color: black;
        }

        .school-sidebar td {
            padding: 8px 0;
            font-size: 0.95rem;
            color: #111;
        }

        .school-content h2 {
            font-size: 1.6rem;
            margin-bottom: 16px;
            color: #111;
        }

        .school-content p {
            line-height: 1.6;
            font-size: 1.05rem;
            color: #111;
        }

        .apply-section {
            margin-top: 40px;
        }

        .apply-section button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .apply-section button:hover {
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .school-container {
                flex-direction: column;
            }

            .school-hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-left,
            .hero-right {
                width: 100%;
                text-align: center;
            }

            .hero-right h1 {
                font-size: 2rem;
            }
        }

        .related-programs {
            /* background: #f8fafc; */
            padding: 60px 20px;
        }

        .related-programs .container {
            max-width: 1200px;
            margin: auto;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #1e293b;
            text-align: center;
        }


        /* Modal styles */
        .modal-overlay {
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(6px);
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            position: relative;
            animation: fadeInUp 0.4s ease-in-out;
            text-align: left;
        }

        .modal-content h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-modal {
            position: absolute;
            top: 12px;
            right: 16px;
            background: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .apply-note {
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .apply-form input,
        .apply-form select {
            width: 100%;
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: inherit;
        }

        .apply-form input:focus {
            border-color: #0b5ada;
            outline: none;
            box-shadow: 0 0 0 2px rgba(11, 90, 218, 0.2);
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
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

        @media (max-width: 500px) {
            .program-footer {
                flex-direction: row;
                align-items: stretch;
            }

            .program-footer .btn {
                width: 100%;
            }
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
                padding: 0;
            }
        }

        .program-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }


        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-left: 12px;
        }


        .favorite-btn {
            background: transparent;
            border: none;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .favorite-btn i {
            color: #b92151;
            transition: color 0.3s;
        }

        .favorite-btn:hover i {
            color: #db2962;
        }



        .program-footer {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: auto;
            padding-top: 20px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .learn-btn {
            background-color: transparent;
            color: #2764c5 !important;
            border: 2px solid #2764c5;
            transition: transform 0.3s ease;
        }

        .learn-btn:hover {
            transform: translateY(-2px);
            /* background-color: #60a5fa; */
            border: 2px solid #2764c5;
            color: #2764c5;
        }

        .apply-btn {
            background: linear-gradient(90deg, #0644a6, #2764c5);
            color: #fff;
            border: none;
            transition: transform 0.3s ease;
        }

        .apply-btn:hover {
            transform: translateY(-3px);
            color: white !important;
        }
    </style>

    <!-- Hero Section -->
    <section class="school-hero">
        <div class="hero-left">
            <img src="{{ asset('/public/storage/' . $program->image) }}?v={{ $program->updated_at->timestamp }}"
                alt="University Logo">
        </div>
        <div class="hero-right">
            <h1>{{ $program->university_name }}</h1>
        </div>
    </section>

    <!-- Program Overview -->
    <div class="school-container">
        <div class="school-content">
            <h2>About the Program</h2>
           <p>
    The <strong>{{ $program->program_level }}</strong> program in 
    <strong>{{ $program->college_course }}</strong> offered by 
    <strong>{{ $program->university_name }}</strong> is designed to prepare students with 
    in-depth academic knowledge, hands-on experience, and industry-relevant skills. 
    This program emphasizes a balance between theoretical frameworks and real-world 
    application, ensuring students are career-ready upon graduation.
</p>



            <div class="apply-section">
                <button class="apply-btn" onclick="openApplyModal('{{ $program->id }}')">
                    <i class="fas fa-paper-plane"></i> Apply Now
                </button>
            </div>
        </div>

        <div class="school-sidebar">
            <h3>Quick Facts</h3>
            <table>
                <tr>
                    <td><strong>Language:</strong></td>
                    <td>{{ $program->language }}</td>
                </tr>
                <tr>
                    <td><strong>Location:</strong></td>
                    <td>{{ $program->location }}, {{ $program->campus_country }}</td>
                </tr>
                <tr>
                    <td><strong>Tuition (1st Yr):</strong></td>
                    <td>${{ $program->tuition }} CAD</td>
                </tr>
                <tr>
                    <td><strong>Application Fee:</strong></td>
                    <td>${{ $program->application_fee }} CAD</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Related Programs Section -->
    @if (isset($relatedPrograms) && count($relatedPrograms))
        <section class="related-programs">

            <h2 class="section-title">Related Programs You Might Like</h2>

            <div class="programs-container">
                @foreach ($relatedPrograms as $value)
                    <div class="program-card">
                        <div class="program-header">
                            <img src="{{ asset('/public/storage/' . $value->image) }}?v={{ $value->updated_at->timestamp }}"
                                alt="University Logo" class="program-logo" />

                            <div class="header-content">
                                <h3>{{ $value->university_name }}</h3>

                                <button class="favorite-btn" title="Add to favourite"
                                    onclick="this.querySelector('i').classList.toggle('fa-solid'); this.querySelector('i').classList.toggle('fa-regular');">
                                    <i class="fa-regular fa-heart"></i>
                                </button>


                            </div>
                        </div>

                        <div class="program-details">
                            <table>
                                <tbody>
                                    {{-- <tr>
                                            <td>School</td>
                                            <td>{{ $value->college_name }}</td>
                                        </tr> --}}
                                    <tr>
                                        <td>Tuition</td>
                                        <td>${{ $value->tuition }} CAD</td>
                                    </tr>
                                    <tr>
                                        <td>Application Fee</td>
                                        <td>${{ $value->application_fee }} CAD</td>
                                    </tr>
                                    <tr>
                                        <td>Language</td>
                                        <td>{{ $value->language }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td>{{ $value->location }}, {{ $value->campus_country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="program-footer">
                            <a href="{{ route('user.programdetails', $value->id) }}" class="btn learn-btn">
                                <i class="fas fa-book-open"></i> Learn More
                            </a>

                            <button class="btn apply-btn" onclick="openApplyModal('{{ $value->id }}')">
                                <i class="fas fa-paper-plane"></i> Apply Now
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>
        <div id="js-alert-container"></div>

        </section>
    @endif
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Apply Now Modal -->
    <div id="applyModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button class="close-modal" onclick="closeApplyModal()">&times;</button>
            <h2>Apply to this School</h2>
            <p class="apply-note">
                Note: You can apply to this school directly for free using our app EduBloom or complete this form and an
                advisor will contact you.
            </p>
             <form id="mentorApplicationForm" class="apply-form">
                           
                        <input type="text" placeholder="Full Name" name="full_name" id="full_name" required>
                        <input type="date" placeholder="Birthdate" name="dob" id="dob" required>
                        <input type="text" placeholder="Location"  name="location" id="location" required>
                        <input type="number" placeholder="WhatsApp Number" name="whats_app_number" id="whats_app_number" required>
                        <input type="email" placeholder="Email Address" name="email" id="email" required>
                        <select required name="studies_level" id="studies_level">
                            <option value="">Level of Studies</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Postgraduate">Postgraduate</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                        <input type="hidden" name="program_id" id="program_id">
                        <button type="submit" class="submit-btn">Submit Application</button>
                    </form>
        </div>
    </div>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("dob").setAttribute('max', today);
    });
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date();
        const year = today.getFullYear() - 5;
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const maxDate = `${year}-${month}-${day}`;

        const dobInput = document.getElementById("dob");
        dobInput.setAttribute("max", maxDate);
        dobInput.onkeydown = () => false; // optional: disable typing
    });
</script>
    <script>
        function openApplyModal(schoolId) {
            const modal = document.getElementById('applyModal');
            
             const programInput = document.getElementById('program_id');
                if (programInput) {
                    programInput.value = schoolId;
                }
            modal.style.display = 'flex';
            setTimeout(() => {
                window.addEventListener('click', outsideClickHandler);
            }, 0);
        }

        function closeApplyModal() {
            const modal = document.getElementById('applyModal');
            modal.style.display = 'none';
            window.removeEventListener('click', outsideClickHandler);
        }

        function outsideClickHandler(event) {
            const modalContent = document.querySelector('.modal-content');
            const modal = document.getElementById('applyModal');
            if (!modalContent.contains(event.target)) {
                closeApplyModal();
            }
        }
    </script>


  <!-- Custom JS Alert -->
    <script>
        function showJsAlert(type, message) {
            const container = document.getElementById('js-alert-container');
            if (!container) return;

            container.innerHTML = ''; // Clear previous alert

            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'}`;
            alertDiv.innerHTML = `
            <i class="fas ${type === 'error' ? 'fa-times-circle' : 'fa-check-circle'}"></i>
            ${message}
        `;

            // Inline styling
            Object.assign(alertDiv.style, {
                position: 'fixed',
                top: '20px',
                left: '40%',
                transform: 'translateX(-50%)',
                padding: '12px 25px',
                fontSize: '16px',
                fontFamily: "'Roboto', sans-serif",
                borderRadius: '6px',
                boxShadow: '0 10px 20px rgba(0, 0, 0, 0.1)',
                zIndex: '1000',
                backgroundColor: type === 'error' ? '#b92151' : '#28a745',
                color: 'white',
                transition: 'opacity 0.6s ease',
                opacity: 1,
            });

            container.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.style.opacity = 0;
                setTimeout(() => alertDiv.remove(), 600);
            }, 3000);
        }
    </script>

    <!-- Form Submission -->
    <script>
        document.getElementById('mentorApplicationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                full_name: document.getElementById('full_name').value,
                dob: document.getElementById('dob').value,
                location: document.getElementById('location').value,
                whats_app_number: document.getElementById('whats_app_number').value,
                email: document.getElementById('email').value,
                studies_level: document.getElementById('studies_level').value,
                program_id: document.getElementById('program_id').value,
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showJsAlert('error', 'CSRF token missing.');
                return;
            }

            fetch("/apply/now", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken.getAttribute("content")
                    },
                    body: JSON.stringify(formData)
                })
                .then(async (response) => {
                    const contentType = response.headers.get("content-type");
                    if (!response.ok) {
                        if (contentType && contentType.includes("application/json")) {
                            const errorData = await response.json();
                            throw new Error(errorData.message || "Validation failed.");
                        } else {
                            throw new Error("Unexpected response format.");
                        }
                    }

                    const data = await response.json();
                    showJsAlert('success', data.message || 'Application submitted!');
                    document.getElementById("mentorApplicationForm").reset();
                    closeMentorForm();
                })
                .catch(error => {
                    showJsAlert('error', error.message || 'There was an error submitting the form.');
                    console.error(error);
                });
        });
    </script>
     <script>
        function openMentorForm() {
            document.getElementById("applyModal").style.display = "flex";
        }

        function closeMentorForm() {
            document.getElementById("applyModal").style.display = "none";
        }

        // Optional: Click outside to close
        window.onclick = function(event) {
            const popup = document.getElementById("applyModal");
            if (event.target === popup) {
                closeMentorForm();
            }
        }
    </script>


    </div>

</body>

</html>