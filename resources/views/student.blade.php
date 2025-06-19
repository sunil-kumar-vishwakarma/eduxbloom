@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/student2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <style>
        /* CSS */
        .student-hero {
            margin-top: 5%;
            padding: 80px 40px;
            /* background: linear-gradient(135deg, #e0f7ff 0%, #ffffff 100%); */
            background: linear-gradient(135deg, #d1e1ff 0%, #ffffff 100%);
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .hero-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 150px;
        }

        .hero-left {
            flex: 1 1 500px;
            z-index: 2;
        }

        .hero-left h1 {
            font-size: 3.2rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 20px;
        }

        .hero-left h1 span {
            background: linear-gradient(to right, #bb0e45, #ad0039);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


        .hero-left .tagline {
            font-size: 1.3rem;
            font-weight: 600;
            /* color: #ad0039; */
            margin-bottom: 15px;
        }

        .hero-left .description {
            font-size: 1rem;
            color: #444;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .store-buttons a {
            display: inline-block;
            margin-right: 15px;
            transition: transform 0.3s ease;
        }

        .store-buttons a:hover {
            transform: translateY(-5px);
        }

        .store-buttons img {
            height: 50px;
        }

        .hero-right {
            flex: 1 1 400px;
            text-align: center;
            position: relative;
        }

        .hero-right::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #00c6ff30 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .app-mockup {
            width: 100%;
            max-width: 400px;
            z-index: 1;
            position: relative;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .student-hero {
                margin-top: 15%;
                padding: 60px 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-container {
                flex-direction: column;
                text-align: center;
            }

            .hero-left,
            .hero-right {
                flex: 1 1 100%;
            }

            .hero-left h1 {
                font-size: 2.2rem;
            }

            .hero-left .tagline {
                font-size: 1.1rem;
            }
        }
    </style>
    <section class="student-hero">
        <div class="hero-container">
            <div class="hero-left">
                <h1>Introducing <span>EduBloom</span></h1>
                <p class="tagline">Your Journey to Study in North America Starts Here</p>
                <p class="description">
                    Discover Edu-X: Your Full Support System from Africa to the Americas.
                    Edu-X Services guides students from early preparation to full integration
                    in the U.S. and Canadian education systems.
                </p>
                <div class="store-buttons">
                    <a href="#"><img src="{{ asset('images/appstore.png') }}" alt="Download on App Store"></a>
                    <a href="#"><img src="{{ asset('images/googleplay.png') }}" alt="Get it on Google Play"></a>
                </div>
            </div>
            <div class="hero-right">
                <img src="{{ asset('images/student-mockup.png') }}" alt="EduBloom App Mockup" class="app-mockup">
            </div>
        </div>
    </section>

    {{-- <div class="stats-container">
        <div class="stat-card">
            <img src="{{ asset('images/girl.png') }}" alt="Students Helped">
            <div class="stat-info">
                <h3>80000+</h3>
                <p>Students Helped</p>
            </div>
        </div>

        <div class="stat-card">
            <img src="{{ asset('images/envolope.png') }}" alt="Programs Offered">
            <div class="stat-info">
                <h3>14000+</h3>
                <p>Programs Offered</p>
            </div>
        </div>

        <div class="stat-card">
            <img src="{{ asset('images/home.png') }}" alt="Institutions">
            <div class="stat-info">
                <h3>50+</h3>
                <p>Institutions</p>
            </div>
        </div>

        <div class="stat-card">
            <img src="{{ asset('images/earth.png') }}" alt="Destination Countries">
            <div class="stat-info">
                <h3>02</h3>
                <p>Destination Country</p>
            </div>
        </div>
    </div> --}}

    {{-- new sections --}}
    <section class="offer-section">
        <h2 class="offer-title"> What We Offer You ?</h2>
        <div class="offer-grid">

            <div class="offer-card">
                <h3><i class="fas fa-user-graduate"></i> Preparatory Program <span>(From 9th Grade)</span></h3>
                <ul>
                    <li><i class="fas fa-chalkboard-teacher"></i> Personalized academic counseling</li>
                    <li><i class="fas fa-globe"></i> Exposure to international education standards</li>
                    <li><i class="fas fa-book-open"></i> High school course guidance</li>
                </ul>
            </div>

            <div class="offer-card">
                <h3><i class="fas fa-language"></i> English Language Training</h3>
                <ul>
                    <li><i class="fas fa-comment-dots"></i> Academic & general English classes</li>
                    <li><i class="fas fa-graduation-cap"></i> TOEFL, IELTS, Duolingo prep</li>
                    <li><i class="fas fa-headset"></i> Native speaker workshops</li>
                </ul>
            </div>

            <div class="offer-card">
                <h3><i class="fas fa-university"></i> College & University Applications</h3>
                <ul>
                    <li><i class="fas fa-search"></i> Tailored school/program selection</li>
                    <li><i class="fas fa-file-alt"></i> Help with personal statements & letters</li>
                    <li><i class="fas fa-hand-holding-usd"></i> Scholarship & financial aid support</li>
                </ul>
            </div>

            <div class="offer-card">
                <h3><i class="fas fa-passport"></i> Visa & Travel Planning</h3>
                <ul>
                    <li><i class="fas fa-file-signature"></i> Visa prep & interview coaching</li>
                    <li><i class="fas fa-plane-departure"></i> Travel checklists & bookings</li>
                    <li><i class="fas fa-users"></i> Family support & documentation</li>
                </ul>
            </div>

            <div class="offer-card">
                <h3><i class="fas fa-hands-helping"></i> Airport & Local Installation</h3>
                <ul>
                    <li><i class="fas fa-taxi"></i> Airport pickup</li>
                    <li><i class="fas fa-home"></i> Housing support</li>
                    <li><i class="fas fa-sim-card"></i> Help with SIM, banking, transport</li>
                </ul>
            </div>

            <div class="offer-card">
                <h3><i class="fas fa-users-cog"></i> Mentorship Program</h3>
                <ul>
                    <li><i class="fas fa-user-friends"></i> Connect with African students</li>
                    <li><i class="fas fa-brain"></i> Guidance on academics & life</li>
                    <li><i class="fas fa-heart"></i> Peer motivation & support</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="why-edux-simple">
        <div class="why-edux-wrapper">
            <h2 class="why-edux-title">Why Students Trust Edu-X</h2>
            <ul class="why-edux-list">

                <li>
                    <span class="why-edux-icon">
                        <!-- Clock/Calendar Icon -->
                        <svg viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path d="M12 1a11 11 0 1 0 11 11A11.012 11.012 0 0 0 12 1zm1 12H7v-2h4V5h2z" />
                        </svg>
                    </span>
                    7+ years of experience helping African students study abroad
                </li>

                <li>
                    <span class="why-edux-icon">
                        <!-- Globe Icon -->
                        <svg viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path
                                d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm1 17.93A8 8 0 114 12a8.009 8.009 0 019 7.93z" />
                            <path d="M12.5 7l-1.5 1v1l-1 .5L9 10v2l1 1 1 .5V15l1.5 1L14 14l-1-1v-1l1-1 1-.5V9l-1-2z" />
                        </svg>
                    </span>
                    African-Led, Globally Informed
                </li>

                <li>
                    <span class="why-edux-icon">
                        <!-- Shield Check Icon -->
                        <svg viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path d="M12 2l9 4v6c0 6-5 11-9 11s-9-5-9-11V6l9-4z" />
                            <path d="M10 12l2 2 4-4" stroke="#fff" stroke-width="2" fill="none" />
                        </svg>
                    </span>
                    Personalized and culturally sensitive support
                </li>

                <li>
                    <span class="why-edux-icon">
                        <!-- Graduation Cap Icon -->
                        <svg viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path d="M12 3L2 8l10 5 10-5-10-5z" />
                            <path d="M4 10v6c0 2 4 4 8 4s8-2 8-4v-6" />
                        </svg>
                    </span>
                    Network of mentors and alumni across the U.S. and Canada
                </li>

            </ul>
        </div>
    </section>

    <br>
    {{-- ready to take first step section --}}
    <section class="cta-section">
        <div class="cta-card">
            <h2>Ready to Take the First Step?</h2>
            <p>
                Let us help you achieve your dream. Whether you’re in high school or already planning
                to apply, Edu-X is your partner for a smooth and successful transition.
            </p>
            <div class="cta-buttons">
                <a href="/search" class="stepbtn primary-btn">Join Our Program</a>
                <a href="/student-register" class="stepbtn secondary-btn">Register Yourself</a>
            </div>
        </div>
    </section>


    {{-- new sections --}}
    <section class="offer-section">
        <h2 class="mv-main-heading" style="text-align: center">
            An Easy-to-Use Platform Built to<br />
            <span class="accent">Deliver Quality Applications and More</span>
        </h2>
        <div class="services">
            <div id="webcrumbs">
                <div class="bg-white rounded-lg ">
                    <div class="grid grid-cols-3 gap-10">
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/Platform.webp') }}" alt="Find Programs Faster" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                Find Programs Faster
                            </h4>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/helpfull-team.png') }}" alt="Dedicated Support Team" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                Helpful and Dedicated Support Team
                            </h4>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/Studen-Loan.webp') }}" alt="Exclusive Scholarships" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                Access to Exclusive Scholarships
                            </h4>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/Platform-check.webp') }}" alt="Exclusive Scholarships" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                One Easy Application Platform
                            </h4>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/Support.webp') }}" alt="Exclusive Scholarships" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                Knowledgeable Support Team
                            </h4>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('images/Chart-3.webp') }}" alt="Exclusive Scholarships" />
                            <h4 class="text-neutral-900 font-medium mt-4">
                                Data Driven Insights
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleDropdown(clickedHeader) {
            // Close all other dropdowns
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                if (dropdown.querySelector('.dropdown-line') !== clickedHeader) {
                    dropdown.classList.remove('open');
                }
            });

            // Toggle the clicked dropdown
            clickedHeader.parentElement.classList.toggle('open');
        }
    </script>



  

    <script>
        const slides = document.querySelectorAll(".testimonial-slide");
        const dotContainer = document.getElementById("swiperDots");
        let currentSlide = 0;

        // Create dots dynamically
        slides.forEach((_, index) => {
            const dot = document.createElement("span");
            dot.dataset.index = index;
            dotContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll("#swiperDots span");

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("active", i === index);
                dots[i].classList.toggle("active", i === index);
            });
        }

        dots.forEach(dot => {
            dot.addEventListener("click", () => {
                currentSlide = parseInt(dot.dataset.index);
                showSlide(currentSlide);
            });
        });

        // Optional: Auto slide
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 5000);

        // Initial load
        showSlide(currentSlide);
    </script>
@endsection
