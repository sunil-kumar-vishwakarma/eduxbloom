@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }


        .webinar {
            background-size: cover;
            background-position: center;
        }


        .container {
            max-width: 100%;
            padding: 0;

        }

        .webinar {

            max-width: 100%;
            padding: 20px;
            width: 100%;
            background-image: url(images/webinarr.avif);
            margin-top: 5%;
            height: 570px;

            background-size: cover;
            /* Ensures full coverage */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            display: flex;
            /* Flex helps in centering content if needed */
            align-items: center;
            justify-content: center;
            color: black;
            font-family: sans-serif;
            text-align: center;
        }

        .background-content {
            padding: 50px 20px;
            /* margin-left: -114px; */
            margin-top: 63px;
        }



        .background-content h1 {
            font-size: 40px;
            font-weight: bold;
            /* color: white; */
            /* transform: translateX(316px); */

        }

        .background-content p {
            max-width: 700px;
            color: white;
            font-size: 20px;
            /* margin-left: 170px; */

        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            padding: 50px;
        }


        .card-webinar {
            height: 360px;
            background: linear-gradient(135deg, rgba(197, 206, 252, 0.3), rgba(255, 255, 255, 0.1));
            backdrop-filter: blur(12px);
            /* for blur effect behind card */
            -webkit-backdrop-filter: blur(12px);
            /* Safari support */
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            /* deeper shadow for floating effect */
            padding: 30px;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* subtle border */
        }


        .card-webinar:hover {
            transform: translateY(-5px);
        }

        .card-header {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .card-header.institution {
            background-color: #ffeeba;
            color: #856404;
        }

        .card-header.destination {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .card-header.trends {
            /* background-color: #f8d7da; */
            color: #721c24;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .card-date {
            font-size: 14px;
            color: #1e1d1d;
            margin-bottom: 20px;
        }

        .card-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            border: none;
            border-radius: 6px;
            width: 150px;
            height: 40px;
            padding-left: 10px;

        }

        .card-link:hover {
            background-color: #d6e2f0;

        }

        .card-link svg {
            margin-left: 5px;
        }

        .head h1 {
            font-size: 40px;
            font-weight: bold;
        }

        .head p {
            font-size: 20px;
        }

        #Spotlight {
            border-radius: 6px;
            padding: 5px 0px;
            width: 60%;
            font-size: 16px;
            width: 60%;
            font-size: 18px;
        }

        #newyork {
            margin-left: 195px;
        }


        .line {
            margin-top: -9px;
        }


        /* Tablets (Portrait & Landscape) (≥768px and <1200px) */
        @media (min-width: 768px) and (max-width: 1199px) {
            .container {
                max-width: 900px;
            }

            .navbar-nav {
                flex-direction: row;
            }

            .card-container {
                flex-wrap: wrap;
                justify-content: space-around;
            }

            /* .card-webinar {
                            width: 45%;
                            margin-bottom: 20px;
                        } */

            .background-content h1 {
                font-size: 36px;
                transform: translateX(5%);
            }

            .background-content p {
                margin-left: auto;
                margin-right: auto;
                font-size: 18px;
            }
        }

        /* Mobile Devices (≥576px and <768px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .container {
                max-width: 100%;
                padding: 0px;
            }


            .webinar {
                max-width: 100%;
            }

            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .card-webinar {
                width: 100%;
                margin-bottom: 15px;
            }

            .background-content h1 {
                font-size: 30px;
            }

            .background-content p {
                font-size: 16px;
                margin: 0 20px;
            }
        }

        /* Small Mobile Devices (<576px) */
        @media (max-width: 575px) {
            .container {
                width: 100%;

            }

            .navbar-brand img {
                width: 60px;
                height: 50px;
            }

            .navbar-nav {
                flex-direction: column;
                text-align: center;
            }


            .webinar {
                margin-top: -50px;
            }


            .background-content {
                padding: 150px 15px;
            }

            .webinar {

                height: auto;

            }

            .background-content h1 {
                font-size: 24px;
                /* margin-left: 120px; */

            }

            .background-content p {
                font-size: 14px;
                margin: -2px 97px;
                /* transform: translateX(61px); */
            }

            .card-container {
                flex-direction: column;
                align-items: stretch;
            }

            .card1 {
                margin-left: 108%;
            }

            .card-webinar {
                width: 100%;
                margin-bottom: 10px;
                padding: 15px;
            }

            #newyork {
                margin-left: 21px;
                width: 89%;
            }

            .card-title {
                font-size: 16px;
            }

            .card-date {
                font-size: 12px;
            }

            .card-link {
                font-size: 14px;
                padding: 10px;
            }

            footer {
                padding: 20px 0;
                text-align: center;
            }

            .blog {

                max-width: 100%;
                width: 100%;
                align-items: center;
                text-align: center;
                margin-left: 0px;
                font-size: 32px;
            }

            #card1 {
                margin-left: -150px;
            }

            #card1 .card-webinar {
                gap: 300px;
            }

        }

        .edu-webinar-section {
            margin-top: 5%;
            position: relative;
            width: 100%;
            height: 400px;
            background-image: url('images/webinarr.avif');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .edu-webinar-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Dark overlay for text readability */
            z-index: 1;
            border-radius: 0;
        }

        .edu-webinar-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 20px;
            max-width: 900px;
        }

        .edu-webinar-heading {
            font-size: 38px;
            margin-bottom: 16px;
        }

        .edu-webinar-heading span {
            color: #b92151 ;
        }

        .edu-webinar-description {
            font-size: 18px;
            line-height: 1.7;
            color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .edu-webinar-section {
                height: 350px;
                margin-top: 20%;
            }

            .edu-webinar-heading {
                font-size: 28px;
            }

            .edu-webinar-description {
                font-size: 16px;
            }
        }
            @media (max-width: 1024px) {
            .edu-webinar-section {
                height: 350px;
                margin-top: 15%; 
            }
            }
    </style>


    {{-- <div class="webinar">
        <div class="background-content">
            <h1><span style="color: #b92151;">Webinars</span> by Edu-X</h1>
            <br />
            <p>
                Receive expert advice, data insights, application tips, and more in Edu-X’s live webinars.
                These are exclusively offered for Edu-X recruitment partners to empower your success.
            </p>
        </div>
    </div><br> --}}

    <div class="edu-webinar-section">
        <div class="edu-webinar-overlay"></div>
        <div class="edu-webinar-content">
            <h1 class="edu-webinar-heading"><span>Webinars</span> by Edu-X</h1>
            <p class="edu-webinar-description">
                Receive expert advice, data insights, application tips, and more in Edu-X’s live webinars.
                These are exclusively offered for Edu-X recruitment partners to empower your success.
            </p>
        </div>
    </div>
<br>



    <div class="upcoming">
        <div class="head" style="text-align: center;">
            <h1>Our Upcoming Webinars</h1>
            <p>Discover exciting topics and insights from global education experts.</p>
        </div><br>


        {{-- <div class="card-container">
            <div class="card-webinar">
                <div class="card-header institution" id="Spotlight">Institution Spotlight</div>
                <div class="card-title">
                    Navigating USA University Admissions & Fast-Tracking Your Student Visa: Featuring Concordia University,
                    St. Paul
                </div>
                <div class="card-date">
                    January 13, 2024, 6:00 A.M<br>4:30 P.M IST
                </div>
            </div>

            <div class="card-webinar">
                <div class="card-header destination" id="Spotlight">Destination Spotlight</div>
                <div class="card-title">
                    Destination UK: Key Insights & Trends to Watch for the 2025 Admission Cycle
                </div>
                <div class="card-date">
                    January 14, 2024, 6:00 A.M<br>4:30 P.M IST
                </div>
            </div>

            <div class="card-webinar">
                <div class="card-header trends" id="Spotlight">Trends Report</div>
                <div class="card-title">
                    Edu-X Global Trends: What’s Changing in International Education for 2025?
                </div>
                <div class="card-date">
                    January 15, 2024, 6:00 A.M<br>4:30 P.M IST
                </div>
            </div>
        </div> --}}

        <div class="card-container">
            @foreach ($webinars as $webinar)
                <div class="card-webinar">
                    <div class="card-header trends" id="Spotlight">{{ $webinar->type }}</div>
                    <div class="card-title">
                        {{ $webinar->title }}
                    </div>
                    <div class="card-date">
                        @if ($webinar->date)
                            {{ \Carbon\Carbon::parse($webinar->date)->format('F d, Y') }}<br>
                        @endif

                        @if ($webinar->time)
                            {{ \Carbon\Carbon::parse($webinar->time)->format('g:i A') }} IST
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <br>



    </div>



    <div class="carousel">
        <div class="carousel-track">
            <img src="images/gallary1.jpg" alt="Image 1">
            <img src="images/gallary2.jpg" alt="Image 2">
            <img src="images/gallary3.jpg" alt="Image 3">
            <img src="images/gallary4.jpg" alt="Image 4">
            <img src="images/gallary5.jpg" alt="Image 5">
            <img src="images/gallary6.jpg" alt="Image 6">
            <img src="images/gallary7.jpg" alt="Image 7">
            <img src="images/gallary8.jpg" alt="Image 8">
            <img src="images/gallary9.jpg" alt="Image 9">
            <img src="images/gallary10.jpg" alt="Image 10">
            <img src="images/gallary11.jpg" alt="Image 11">
            <img src="images/gallary12.jpg" alt="Image 12">
            <img src="images/gallary13.jpg" alt="Image 13">
            <img src="images/gallary14.jpg" alt="Image 14">
            <img src="images/gallary15.jpg" alt="Image 15">
        </div>
    </div><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
