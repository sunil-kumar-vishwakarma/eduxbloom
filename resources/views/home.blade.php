@extends('frontent.layouts.app')
@section('title', 'EduX | Home ')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/newhome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Hero -->
    <section class="hero-bannerr">
        <div class="hero-content-home">
            <div class="badge-home">Your Bridge to a World-Class Education</div>
            <h1>Turn Your Dream of Studying in The US or Canada
                <br> Into a Reality
            </h1>

            <div class="buttons-home">
                <a href="/search" class="btn-home btn-primary"><i class="fas fa-user-plus"></i> Join Our Program</a>
                <a href="/contactus" class="btn-home btn-secondary">Book a Free Consultation</a>
            </div>

            <div class="buttons-home">
                <form action="{{ route('search') }}" method="GET" class="study-search-form-row">
                    <!-- Input Field -->
                    <div class="study-input-wrapper">
                        <svg class="study-search-icon" viewBox="0 0 24 24" width="20" height="20" fill="#aaa">
                            <path
                                d="M10 2a8 8 0 105.29 14.29l5.21 5.21 1.5-1.5-5.21-5.21A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z" />
                        </svg>
                        <input type="text" name="keyword" class="study-search-input"
                            placeholder="What would you like to study?">
                    </div>

                    <!-- Country Checkboxes -->
                    <div class="country-checkboxes">
                        <label>
                            <input type="checkbox" name="countries[]" value="Canada">
                            <img src="https://flagcdn.com/ca.svg" alt="Canada" class="flag-icon"> Canada
                        </label>
                        <label>
                            <input type="checkbox" name="countries[]" value="United States">
                            <img src="https://flagcdn.com/us.svg" alt="USA" class="flag-icon"> United States
                        </label>
                    </div>

                    <!-- Search Button -->
                    {{-- <button type="submit" class="study-search-button">Search</button> --}}
                </form>
            </div>

        </div>
    </section>



    <!-- Cards -->
    <section class="cards-home">
        <div class="card-home">
            <img src="{{ asset('images/home3.png') }}" alt="Card 1">
        </div>
        <div class="card-home">
            <img src="{{ asset('images/middle-home.jpg') }}" alt="Card 2">
        </div>
        <div class="card-home">
            <img src="{{ asset('images/home2.png') }}" alt="Card 3">
        </div>
    </section>

    <!-- Practice Section -->
    <section class="practice-section">
        <h2 class="practice-title">Our 360° Student Support Journey</h2>
        <p class="para">From high school to university, we prepare African students to thrive, not just survive, abroad.
        </p>

        <div class="practice-grid">
            <div class="practice-card">
                <div class="practice-number">01</div>
                <h3 class="practice-heading">Early Academic Preparation</h3>
                <p>Enroll from high school, receive tailored academic counseling, and gain access to top preparatory
                    resources.</p>
            </div>

            <div class="practice-card">
                <div class="practice-number">02</div>
                <h3 class="practice-heading">English Language Training</h3>
                <p>Join online or in-person English courses, prepare for IELTS/TOEFL, and participate in conversation clubs
                    with native speakers.</p>
            </div>

            <div class="practice-card">
                <div class="practice-number">03</div>
                <h3 class="practice-heading">College Application Support</h3>
                <p>Develop a school selection strategy, get assistance with essays and documents, and receive guidance on
                    scholarships and financial aid.</p>
            </div>

            <div class="practice-card">
                <div class="practice-number">04</div>
                <h3 class="practice-heading">Visa & Travel Planning</h3>
                <p>Receive visa interview coaching, plan flights with a comprehensive travel checklist, and get support for
                    parents throughout the process.</p>
            </div>

            <div class="practice-card">
                <div class="practice-number">05</div>
                <h3 class="practice-heading">Arrival & Installation</h3>
                <p>Coordinate airport pickup, get help with housing setup, and organize essential documents such as bank
                    accounts, phones, and ID cards.</p>
            </div>

            <div class="practice-card">
                <div class="practice-number">06</div>
                <h3 class="practice-heading">Life & Career Development</h3>
                <p>Engage in campus activities, receive internship and career coaching, and connect with our global alumni
                    network.</p>
            </div>
        </div>

    </section>

    <section class="section">
        <div class="image-stack">
            <img src="{{ asset('images/home6.png') }}" alt="Front Image">
            <img src="{{ asset('images/home2-2.png') }}" alt="Back Image">
        </div>
        <div class="text-content">
            <h2>Discover and Explore a World of Knowledge</h2>
            <p>
                Immerse yourself in an unparalleled educational journey at our esteemed institution. Engage with a
                diverse curriculum that not only covers the core foundations of learning but also explores emerging
                global trends, interdisciplinary studies, and innovative methodologies. Our experienced educators are
                committed to nurturing critical thinking, creativity, and collaboration in every student.Discover a
                world where your curiosity is celebrated and your potential is limitless, excel in higher education and
                life beyond the classroom.
            </p>
            <a href="/student" class="btn-explore">Explore Student</a>
        </div>
    </section>

    <section class="section2">
        <div class="image-stack2">
            <img src="https://i.ibb.co/8qt3gm9/vertical-individual-portrait-african-american-600nw-2408548309.webp"
                alt="Back Image">
            <img src="https://i.ibb.co/G3vxSNBC/african-american-college-student-with-laptop-sunny-day-city-street-231208-5497.jpg"
                alt="Front Image">
        </div>
        <div class="text-content">
            <h2>Discover and Explore Edu-X Young Leaders</h2>
            <p>
                Empowering Africa’s future change-makers through a dynamic blend of leadership training, dedicated
                mentorship, and access to exclusive global academic and career-building opportunities. Our mission is to
                equip future changemakers with the academic, social, and emotional skills they need to thrive in an
                increasingly competitive and interconnected world.
                Through a carefully designed curriculum, students explore leadership, innovation, global citizenship,
                and personal growth—all while building a strong academic foundation.
            </p>
            <a href="/youngleaders" class="btn-explore">Explore Young Leaders</a>
        </div>
    </section>



    {{-- <section class="myapp-stats-section">
        <div class="myapp-stat-box">
            <h2>8000+</h2>
            <p>Students Helped</p>
        </div>
        <div class="myapp-stat-box">
            <h2>14000+</h2>
            <p>Programs Offered</p>
        </div>
        <div class="myapp-stat-box">
            <h2>50+</h2>
            <p>Institutions</p>
        </div>
        <div class="myapp-stat-box">
            <h2>02</h2>
            <p>Destination Country</p>
        </div>
    </section> --}}

    <div class="stats-container">
        <div class="stat-card">
            <img src="{{ asset('images/girl.png') }}" alt="Students Helped">
            <div class="stat-info">
                <h3>{{ $stat->students_helped ?? '0' }}+</h3>
                <p>Students Helped</p>
            </div>
        </div>
        <div class="stat-card">
            <img src="{{ asset('images/envolope.png') }}" alt="Programs Offered">
            <div class="stat-info">
                <h3>{{ $stat->programs_offered ?? '0' }}+</h3>
                <p>Programs Offered</p>
            </div>
        </div>
        <div class="stat-card">
            <img src="{{ asset('images/home.png') }}" alt="Institutions">
            <div class="stat-info">
                <h3>{{ $stat->institutions ?? '0' }}+</h3>
                <p>Institutions</p>
            </div>
        </div>
        <div class="stat-card">
            <img src="{{ asset('images/earth.png') }}" alt="Destination Countries">
            <div class="stat-info">
                <h3>{{ $stat->countries ?? '0' }}</h3>
                <p>Destination Country</p>
            </div>
        </div>
    </div>



    <!-- Testimonial Section -->
    <section class="myapp-testimonial-section">
        <h2>What Our Students Say</h2>

        <div class="myapp-slider-container">
            <div class="myapp-testimonial-slider" id="myappTestimonialSlider">
                <div class="myapp-testimonial">
                    <div class="myapp-stars">★★★★★</div>
                    <p>"The faculty and curriculum truly helped me excel beyond the classroom. The learning environment
                        is top-notch."</p>
                    <div class="myapp-author">– Vishnu Rajput, PhD Scholar</div>
                </div>

                <div class="myapp-testimonial">
                    <div class="myapp-stars">★★★★★</div>
                    <p>"Every course pushed me to think deeper and grow smarter. I can't recommend this institution
                        enough!"</p>
                    <div class="myapp-author">– Aavesh Khan, B.Sc. Graduate</div>
                </div>

                <div class="myapp-testimonial">
                    <div class="myapp-stars">★★★★★</div>
                    <p>"From seminars to research support, everything here empowered me to follow my academic passions
                        confidently."</p>
                    <div class="myapp-author">– Sohit Tiwari, Class of 24</div>
                </div>
            </div>

            <!-- Dots -->
            <div class="myapp-dots" id="myappDotsContainer"></div>
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

    <!-- === FAQ Section === -->
    <section class="faq-section">
        <div class="faq-title">
            <h2>Frequently<br>Asked Questions</h2>
        </div>
        <div class="faq-grid">
            <div class="faq-item">
                <h3>Is there a free trial available?</h3>
                <p>Yes, we offer a free trial period of 14 days. During this time, you'll get access to all our premium
                    features.</p>
            </div>
            <div class="faq-item">
                <h3>How do I schedule a consultation?</h3>
                <p>Click the “Schedule a consultation” button above and pick a time that works for you from our online
                    calendar.</p>
            </div>
            <div class="faq-item">
                <h3>Can I cancel at any time?</h3>
                <p>Absolutely. You can cancel your subscription any time from your dashboard with no hidden fees.</p>
            </div>
            <div class="faq-item">
                <h3>Is support really 24/7?</h3>
                <p>Yes, our dedicated support team is available around the clock to assist you with anything you need.
                </p>
            </div>
        </div>
    </section>


    <script>
        const slider = document.getElementById('myappTestimonialSlider');
        const testimonials = document.querySelectorAll('.myapp-testimonial');
        const dotsContainer = document.getElementById('myappDotsContainer');
        let index = 0;

        // Create dots based on number of slides
        testimonials.forEach((_, i) => {
            const dot = document.createElement('div');
            dot.classList.add('myapp-dot');
            if (i === 0) dot.classList.add('myapp-active');
            dot.addEventListener('click', () => {
                index = i;
                updateSlider();
                resetAutoSlide();
            });
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.myapp-dot');

        function updateSlider() {
            slider.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach(dot => dot.classList.remove('myapp-active'));
            dots[index].classList.add('myapp-active');
        }

        function nextSlide() {
            index = (index + 1) % testimonials.length;
            updateSlider();
        }

        let slideInterval = setInterval(nextSlide, 5000);

        function resetAutoSlide() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }
    </script>

@endsection
