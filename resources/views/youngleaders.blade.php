@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/youngleader.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />




    <section class="student-hero">
        <div class="hero-container">
            <div class="hero-left">
                <h1 class="hero-title">Edu-X <span>Young Leaders</span></h1>
                <p class="hero-tagline">Your Journey to Young Leaders Starts Here</p>
                <p class="hero-description">
                    Empowering Africa’s future change-makers through a dynamic blend of leadership training, dedicated
                    mentorship, and access to exclusive global academic and career-building opportunities. Our program is
                    designed to equip students with the skills, confidence, and support system they need to thrive in high
                    school, university, and beyond.
                </p>

                {{-- <a href="#application" class="btn-get-started">
                    <i class="fas fa-rocket"></i> Apply Now
                </a> --}}


            </div>


            <div class="hero-right">
                <img src="{{ asset('images\young-leader.jpg') }}" alt="EduBloom App Mockup" class="app-mockup" />
            </div>
        </div>
    </section>

    <section class="section" data-aos="fade-up">
        <h1 class="heading-title">What Is <span>the Young Leaders Program?</span></h1>

        <p class="paragraph-text">The Edu-X Young Leaders program is a launchpad for passionate students in Africa who want
            to make an impact.
            We support you with tools, training, and mentorship to succeed in high school and beyond—locally and globally.
        </p>

        <p class="paragraph-text">Our mission is to equip future changemakers with the academic, social, and emotional
            skills they need to thrive
            in an increasingly competitive and interconnected world.</p>

        <p class="paragraph-text">Through a carefully designed curriculum, students explore leadership, innovation, global
            citizenship, and
            personal growth—all while building a strong academic foundation.</p>

        <p class="paragraph-text">Participants gain exclusive access to workshops, one-on-one coaching, and opportunities to
            connect with
            universities, professionals, and peers across Africa, North America, and beyond.</p>

        <p class="paragraph-text">Whether you're dreaming of studying abroad, launching a community project, or excelling in
            your national exams,
            the Young Leaders program provides the roadmap and the support to help you reach your goals.</p>

        <p class="paragraph-text">We believe every student has a voice that deserves to be heard. With Edu-X, you’ll learn
            how to use yours to
            lead, inspire, and create lasting change—starting today.</p>
    </section>


    <section class="section" data-aos="fade-up">
        {{-- <h2 class="section-heading">What You’ll Gain</h2> --}}
        <h1 class="heading-title">Edu-X <span>Young Leaders</span></h1>
        <div class="grid123">
            <div class="card123" data-aos="zoom-in">
                <div class="mv-icon-circle">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3>Academic Mentorship</h3>
                <p>One-on-one guidance to help you excel academically and prepare for global universities.</p>
            </div>
            <div class="card123" data-aos="zoom-in" data-aos-delay="100">
                <div class="mv-icon-circle">
                    <i class="fas fa-globe-africa"></i>
                </div>
                <h3>Global Exposure</h3>
                <p>Join exchange programs, virtual conferences, and workshops with students from around the world.</p>
            </div>
            <div class="card123" data-aos="zoom-in" data-aos-delay="200">
                <div class="mv-icon-circle">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Leadership Skills</h3>
                <p>Lead projects in your community and gain real-world leadership experience.</p>
            </div>
            <div class="card123" data-aos="zoom-in" data-aos-delay="300">
                <div class="mv-icon-circle">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3>Internship Pathways</h3>
                <p>Access internships in youth-focused industries locally and abroad.</p>
            </div>
            <div class="card123" data-aos="zoom-in" data-aos-delay="400">
                <div class="mv-icon-circle">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>EduBloom App</h3>
                <p>Use the EduBloom app to track progress, connect with mentors, and explore opportunities.</p>
            </div>
            <div class="card123" data-aos="zoom-in" data-aos-delay="500">
                <div class="mv-icon-circle">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3>Community Impact</h3>
                <p>Participate in initiatives that give back to society and build social responsibility.</p>
            </div>
        </div>
    </section>

    <section class="section" data-aos="fade-up">
        <h1 class="heading-title">Watch <span>the Program in Action</span></h1>
        {{-- <iframe src="https://www.youtube.com/embed/YOUR_VIDEO_ID" allowfullscreen></iframe> --}}

        <iframe src="https://player.vimeo.com/video/1083129107?h=ff2a5bb1a0&autoplay=1&muted=1&loop=1&background=1"
            allow="autoplay; allowfullscreen;" title="EduX Video">
        </iframe>

        <script src="https://player.vimeo.com/api/player.js"></script>


    </section>

    <section class="section" data-aos="fade-up">
        <h1 class="heading-title">Hear from <span>Our Young Leaders</span></h1>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">"Edu-X gave me confidence and a clear path to study in Canada. Amazing
                    mentors!"<br><strong>- Amina, Nigeria</strong></div>
                <div class="swiper-slide">"Thanks to the Young Leaders program, I led my first community
                    initiative."<br><strong>- John, Kenya</strong></div>
                <div class="swiper-slide">"The EduBloom app keeps me organized and inspired. Highly
                    recommend!"<br><strong>- Fatou, Senegal</strong></div>
            </div>
        </div>
    </section>

    {{-- <section class="application-section" id="application">
        <div class="application-container">
            <h2 class="application-heading" data-aos="fade-up">Apply to Edu-X Young Leaders</h2>
            <p class="application-subheading" data-aos="fade-up" data-aos-delay="100">
                We’re excited to meet future leaders like you! Fill out the form below to start your journey.
            </p>
            <form class="application-form" action="#" method="POST" data-aos="fade-up" data-aos-delay="200">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="you@example.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" id="country" name="country" class="form-input"
                            placeholder="canada,us etc." required>
                    </div>
                    <div class="form-group custom-select-wrapper">
                        <label for="level" class="form-label">Academic Level</label>
                        <div class="select-container">
                            <select id="level" name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option>High School</option>
                                <option>Gap Year</option>
                                <option>University</option>
                            </select>
                            <span class="select-chevron"> <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="form-group full-width">
                    <label for="message" class="form-label">Why do you want to join?</label>
                    <textarea id="message" name="message" class="form-textarea" rows="5"
                        placeholder="Tell us about your aspirations..."></textarea>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn-submit">Submit Application</button>
                </div>
            </form>
        </div>
    </section> --}}



    <!-- AOS & Swiper Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
        });
    </script>
    <script>
        document.querySelector('.btn-get-started').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor jump
            document.querySelector('#application').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>


@endsection
