@extends('frontent.layouts.app')
@section('title', 'EduX | Student')

@section('content')
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
            flex: 0 0 70px;
            text-align: center;
        }

        .hero-left img {
            max-width: 100%;
            border-radius: 50%;
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
                            <a href="{{ route('details', $value->id) }}" class="btn learn-btn">
                                <i class="fas fa-book-open"></i> Learn More
                            </a>

                            <button class="btn apply-btn" onclick="openApplyModal('{{ $value->id }}')">
                                <i class="fas fa-paper-plane"></i> Apply Now
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>

        </section>
    @endif

    <!-- Apply Now Modal -->
    <div id="applyModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button class="close-modal" onclick="closeApplyModal()">&times;</button>
            <h2>Apply to this School</h2>
            <p class="apply-note">
                Note: You can apply to this school directly for free using our app EduBloom or complete this form and an
                advisor will contact you.
            </p>
            <form class="apply-form">
                <input type="text" placeholder="Full Name" required>
                <input type="date" placeholder="Birthdate" required>
                <input type="text" placeholder="Location" required>
                <input type="text" placeholder="WhatsApp Number" required>
                <input type="email" placeholder="Email Address" required>
                <select required>
                    <option value="">Level of Studies</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="Diploma">Diploma</option>
                </select>
                <button type="submit" class="submit-btn">Submit Application</button>
            </form>
        </div>
    </div>

    <script>
        function openApplyModal(schoolId) {
            const modal = document.getElementById('applyModal');
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
@endsection
