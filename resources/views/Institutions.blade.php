@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/institution.css') }}">

    {{-- <section class="student-hero">
        <div class="hero-container">
            <div class="hero-left">
                <h1>Be Seen by 100,000+ <span>Students Every Month</span></h1>
                <p class="description">
                    Increase your global presence and the number of qualified students from a single, easy-to-use platform
                    trusted by
                    more than 1,500 institutions worldwide.
                </p>
                <a href="/contactus"> <button type="button" class="parents-btn" id="workWithUsBtn">Work With US</button></a>

            </div>
            <div class="hero-right">
                <img src="{{ asset('images/parent-png.png') }}" alt="Parents Mockup" class="app-mockup">
            </div>
        </div>
    </section> --}}

    {{-- empowering section --}}
    <section class="mission-vision-modern">
        <div class="mv-container">
            <h2 class="mv-main-heading">
                Empowering African Students Through<br />
                <span class="accent">Connection, Guidance, and Inspiration</span>
            </h2>

            <div class="mv-section">
                <div class="mv-flex-cards">
                    <div class="mv-glass-card">
                        <div class="mv-icon-circle">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3 class="mv-subheading">Our Mission</h3>
                        <p>
                            To ensure that every African student studying in North America feels supported, understood,
                            and
                            guided—not just academically, but culturally, emotionally, and socially—through a strong
                            mentorship
                            network.
                        </p>
                    </div>

                    <div class="mv-glass-card">
                        <div class="mv-icon-circle">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3 class="mv-subheading">Our Vision</h3>
                        <p>
                            A future where African students thrive in global classrooms—not only by earning diplomas,
                            but by
                            becoming confident leaders, engaged citizens, and empowered contributors to their
                            communities.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Mentorship Section -->
    <section class="mentorship-story">
        <div class="story-container">
            <div class="story-content">
                <h2>The Story Behind <span>Our Mentorship Program</span></h2>
                <div class="separator"></div>
                <h3>Founded by <strong>Djenabou Diawara</strong></h3>
                <p>
                    When Djenabou Diawara arrived in the United States to study at Columbia University,
                    she came with high hopes and big dreams—but also with questions, cultural adjustments,
                    and no roadmap.
                </p>
                <p>
                    Out of a group of 12 students from Mali, only two completed their degrees on time.
                    That experience shaped her passion.
                </p>
                <p>
                    She realized that many African students fail abroad—not because of intelligence or ambition—
                    but because they lack guidance on how to navigate the unfamiliar systems, opportunities,
                    and social expectations of their new environment.
                </p>
                <p class="highlight">
                    That’s why Djenabou founded <strong>Edu-X Services</strong>—to bridge the gap for students
                    and build a community of African graduates willing to walk alongside those just beginning
                    their journey.
                </p>
            </div>
            <div class="story-image">
                <img src="{{ asset('images/edux-ceo.jpg') }}" alt="Djenabou Diawara" />

            </div>
        </div>
    </section>


    <!-- how it works section -->
    <section class="how-it-works">
        <h2>How <span>Our Mentorship Program Works</span></h2>
        <div class="steps-grid">
            <div class="step">
                <div class="mv-icon-circle">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="step-title">Personalized Pairing</div>
                <div class="step-desc">
                    Each student is matched with a mentor who has studied in the same country or a similar program.
                </div>
            </div>
            <div class="step">
                <div class="mv-icon-circle">
                    <i class="fas fa-suitcase-rolling"></i>
                </div>
                <div class="step-title">Departure Guidance</div>
                <div class="step-desc">
                    Mentors share what to expect upon arrival, what to pack, and how to communicate with professors.
                </div>
            </div>
            <div class="step">
                <div class="mv-icon-circle">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="step-title">Ongoing Support</div>
                <div class="step-desc">
                    Regular virtual check-ins, WhatsApp chats, campus tips, and emotional support throughout your study.
                </div>
            </div>
            <div class="step">
                <div class="mv-icon-circle">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="step-title">Success Tracking</div>
                <div class="step-desc">
                    Mentors help students stay focused, solve challenges, and maximize academic and social
                    opportunities.
                </div>
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <div class="testimonial-section">
        <h2 class="testimonials-heading">What Our Students & Mentors Say</h2>

        <div class="testimonial-slider-wrapper">
            <div class="slider-track" id="sliderTrack">
                <!-- Slide 1 -->
                <div class="testimonial-slide">
                    <i class="fas fa-hand-holding-heart icon"></i>
                    <p class="testimonial-text">“My mentor helped me find housing, prepare for my first class, and even
                        navigate campus jobs. It made my transition so much smoother.”</p>
                    <p class="testimonial-author">— Fatou, student in Ottawa</p>
                </div>

                <!-- Slide 2 -->
                <div class="testimonial-slide">
                    <i class="fas fa-user-graduate icon"></i>
                    <p class="testimonial-text">“Being a mentor is the most fulfilling thing I do. I feel like I’m
                        giving back and building the Africa of tomorrow.”</p>
                    <p class="testimonial-author">— Ismael, MBA graduate in Texas</p>
                </div>

                <!-- Add more slides if needed -->
            </div>
        </div>

        <!-- Dot navigation -->
        <div class="swiper-dots" id="swiperDots"></div>

    </div>

    <!-- Enhanced Become a Mentor Section -->
    <section class="become-mentor-enhanced">
        <div class="mentor-overlay"></div>
        <div class="mentor-wrapper">
            <div class="mentor-text">
                <h2>Become a <span>Mentor</span></h2>
                <div class="mentor-separator"></div>
                <p>
                    Have you studied in the <strong>U.S.</strong> or <strong>Canada</strong>? Do you want to give back
                    and help
                    the next generation of African students thrive abroad?
                </p>
                <p>
                    Join our growing community of mentors and share the lessons you’ve learned. Your story could be the
                    one that
                    changes a life forever.
                </p>
                <a href="#" class="mentor-cta" onclick="openMentorForm()">Apply to Be a Mentor</a>
            </div>
            <div class="mentor-image">
                {{-- <img src="https://i.ibb.co/Xff2N15n/black-tutor-mentoring-schoolgirl-school-library-study-desk.jpg"
                    alt="Mentorship"> --}}
                <img src="{{ asset('images\mentorship.jpg') }}" alt="Mentorship">

            </div>
        </div>
    </section>

    <!-- Enhanced Become a Mentee Section -->
    <section class="become-mentee-enhanced">
        <div class="mentee-overlay"></div>
        <div class="mentee-wrapper">
            <div class="mentee-image">
                {{-- <img src="https://i.ibb.co/W4jM3HtH/woman-with-laptop-looking-camera.jpg" alt="Happy student mentee"> --}}
                <img src="https://i.ibb.co/PZj0fXz5/young-adult-smiling-while-with-friends.jpg" alt="Happy student mentee">
            </div>
            <div class="mentee-text">
                <h2>Become a <span>Mentee</span></h2>
                <div class="mentee-separator"></div>
                <p>
                    Want someone who understands your journey and can guide you step by step?
                </p>
                <p>
                    Register to be matched with a mentor who’s been exactly where you’re going. You're not alone — and
                    the path
                    ahead just got clearer.
                </p>
                <a href="/student-register" class="mentee-cta">Register as a Student</a>
            </div>
        </div>
    </section>


    {{-- JS dynamic alert container --}}
    <div id="js-alert-container"></div>

    <!-- Popup Form -->
    <div id="mentorFormPopup" class="popup-overlay">
        <div class="popup-form">
            <span class="close-btn" onclick="closeMentorForm()">&times;</span>
            <h2 class="popup-title">Mentor Application</h2>
            <form id="mentorApplicationForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="e.g., +234XXXXXXXXXX" required>
                </div>

                <div class="form-group">
                    <label for="school">Current/Graduated School</label>
                    <input type="text" id="school" name="school" placeholder="Enter your school name" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" placeholder="Enter your country" required>
                </div>

                <button type="submit" class="submit-btn">Submit Application</button>
            </form>
        </div>
    </div>

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
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                school: document.getElementById('school').value,
                country: document.getElementById('country').value,
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showJsAlert('error', 'CSRF token missing.');
                return;
            }

            fetch("/mentor/apply", {
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
    <script>
        function openMentorForm() {
            document.getElementById("mentorFormPopup").style.display = "flex";
        }

        function closeMentorForm() {
            document.getElementById("mentorFormPopup").style.display = "none";
        }

        // Optional: Click outside to close
        window.onclick = function(event) {
            const popup = document.getElementById("mentorFormPopup");
            if (event.target === popup) {
                closeMentorForm();
            }
        }
    </script>
@endsection
