@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <div class="mainnn">
        <section class="student-hero">
            <div class="hero-container">
                <div class="hero-left">
                    <h1>EduX <span>Events</span></h1>
                    <p class="tagline">Empowering Your Journey to Study in North America</p>
                    <p class="description">
                        EduX events provide invaluable professional development and networking opportunities,
                        along with access to the latest industry insights. We actively participate in global,
                        industry-leading events—connecting with current and prospective partners worldwide.
                        Join us at an upcoming EduX event and be a part of shaping the future of international education.
                    </p>
                    <a href="#application" class="btn-get-started">
                        <i class="fas fa-arrow-down"></i> Scroll to See Our Gallery
                    </a>
                </div>
                <div class="hero-right">
                    <img src="/images/events.png"
                        alt="EduX Event Illustration" class="app-mockup">
                </div>
            </div>
        </section>



        <!-- WEBINAR -->
        <section class="webinarss">
            <div class="webinar">
                <h2>Webinars by <span>Edu-X</span></h2>
                <p>
                    Join our expert-led webinars to gain application insights, explore global admissions trends,
                    and receive real-time support designed to help students succeed in their study abroad journey.
                </p>
                <a href="/webinar" class="btn-webinar">
                    <i class="fas fa-video"></i> View Upcoming Webinars
                </a>
            </div>
        </section>

        <!-- === Consultation Banner === -->
        {{-- <section class="consultation-banner">
            <div class="consultation-overlay">
                <div class="consultation-text">
                    <h2>Edu-X Services—to bridge the gap for students.</h2>
                    <p>Easy-to-Use · Find Programs
                        Faster · Data Driven Insights</p>
                </div>
                <a href="/contactus" class="consultation-button">Schedule a consultation</a>
            </div>
        </section> --}}

        <br>
        <br>

      <div class="carousel" id="application">
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
</div>

        <br>
    </div>

    <script>
        document.querySelector('.btn-get-started').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor jump
            document.querySelector('#application').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>

    <style>
        .content1 h1 {
            font-size: 30px;
            font-weight: bold;
        }
    </style>
