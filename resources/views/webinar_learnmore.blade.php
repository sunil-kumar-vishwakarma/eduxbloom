@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <style>
        .background-img {
            transform: translateY(100px);
            background-image: url('/images/learn-more.jpg');
            /* Path to your image */
            background-size: cover;
            /* Ensures the image covers the entire div */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
            width: 100vw;
            /* Full width of the viewport */
            height: 600px;
            /* Adjust the height as needed */
            display: flex;
            align-items: center;
            /* Centers content vertically */
            justify-content: center;
            /* Centers content horizontally */
            color: white;
            /* Ensures text is visible over the image */
            text-align: center;
            /* Centers text within the div */
            margin: 0;
            /* Removes default margin */
            padding: 0;
            /* Removes default padding */

        }

        .background-content h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .background-content p {
            font-size: 1.2em;
            max-width: 600px;
            line-height: 1.6;
        }


        .abroad {
            text-align: left;
            margin-left: -300px;
            padding: -60px 20px;
        }

        .abroad p {
            max-width: 650px;
        }

        .abroad h1 {
            font-size: 40px;
            font-weight: bold;
            max-width: 500px;
            text-align: center;
        }

        .abroad button {
            background-color: white;
            color: blue;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 7px;
        }

        .service {
            text-align: center;
            align-items: center;
        }

        .service h1 {
            font-size: 40px;
            font-weight: bold;
        }

        .service p {
            font-size: 16px;
            max-width: 500px;
            margin-left: 400px;
        }

        html {
            scroll-behavior: smooth;
        }


        .hero {
            padding: 0 5% 0;
            /*min-height: 100vh;*/
            /*background: linear-gradient(45deg, #f3f4ff, #ffffff);*/
            margin-top: 270px;
            margin-bottom: 100px;
        }

        .text-and-images #img1,
        #img2,
        #img3 {
            display: none;
        }

        .tab-nav-webinar-learn {
            text-align: center;
         margin-top: 19px;

        }

        .tab-nav-webinar-learn button {
            border-radius: 20px;
            width: 250px;
            font-weight: bold;
            border: none;
            height: 35px;
        }

        .tab-nav-webinar-learn button:hover {
            background-color: rgb(39, 39, 223);
            color: white;
        }

        .hero-content {
            max-width: 1000px;
            margin: 30px auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 4rem;
        }

        #recruitment-partners,
        #students,
        #partner-institutions {
            background-color: white;
            margin-top: 45px;
            font-size: large;
        }

        .tab-content h1,
        p {
            color: black;
            max-width: 402px;
        }

        .tab-content h1 {
            font-size: 20px;
            font-weight: bold;
        }

        .text-and-images {
            display: flex;
            justify-content: space-between;
            flex: 1;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-btn.active {
            background-color: #007bff;
            /* Active button color */
            color: white;
            /* Active button text color */
        }

        .hero-images {
            flex: 1;
            position: relative;
            max-width: 400px;
            height: 300px;
        }


        /*
                .image-stack {
                  position: relative;
                  width: 100%;
                  height: 100%;
                } */

        .image-card {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-card:nth-child(1) {
            z-index: 3;
            transform: translateX(-50%);
        }

        .image-card:nth-child(2) {
            z-index: 2;
            transform: translateX(0%) translateY(20px);
        }

        .image-card:nth-child(3) {
            z-index: 1;
            transform: translateX(50%) translateY(40px);
        }

        /* Adjust visibility based on active tab */
        .tab-content.active+.hero-images .image-card {
            opacity: 1;
        }


        /* Initially enable the first button */
        .active {
            background-color: blue;
            color: white;
        }

        .card1-webinar-learn {
            margin-left: -80px;
            margin-top: 87px;
        }


        #c1 {
            margin-left: 21px;
        }

        .card2 {
            margin-left: 40px !important;
        }

        #c2 {
            margin-left: 300px;
        }

        .visa {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: justify;

        }

        .visa p {
            margin-top: 20px;
            font-size: 18px;
        }

        .visa h1 {

            font-size: 30px;
        }

        ul {
            margin-top: 20px;
            color: black;
            list-style: disc;
            margin-left: 22px;
        }

        ul li::marker {
            color: blue;
            /* Change bullet color */
            font-size: 1em;
            /* Optional: Customize bullet size */

        }

        .visa button {
            font-size: 15px;
            font-weight: bold;
            margin-top: 20px;
            background-color: rgb(32, 32, 220);
            border-radius: 6px;
            padding: 10px 10px;
        }

        #test {
            background-color: white;
        }

        .ai-platform {
            background-color: rgb(36, 36, 206);
            height: 300px;
            width: 1000px;
            border-radius: 20px;
            justify-content: center;
            align-items: center;
            margin-left: 17%;

        }

        .conte {
            text-align: center;
            color: white;
            padding-top: 8%;

        }

        .conte h1 {
            font-size: 30px;
            max-width: 750px;
            font-weight: bold;
            padding-left: 220px;
        }

        .btns {
            margin-top: 30px;
            margin-left: -20px;

        }

        .btns button {
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px 10px;
            font-weight: 400;
        }

        .btns button:hover {
            color: rgb(115, 115, 207);
        }

        #partner {
            margin-left: 20px;
        }

        .card1-webinars .card-webinar-learn {
            height: 450px;
        }


        #lftt {
            margin-left: 61px;
        }


        @media (max-width:768px) {
            .container {
                padding: 20px;
            }

            .background-img {
                height: 486px;
                /* Adjust for tablets */
                      margin: -32px -1px;

            }

            .abroad {
                margin-left: 20px;
                margin-top: -85px;
            }

            .abroad h1 {
                font-size: 1.8rem;
                padding: 7px;
            }

            .abroad p {
                font-size: 1.1rem;
            }

            .tab-nav-webinar-learn {
               display:none;
            }

            .service{
                margin-top: -30px;
                margin-bottom: 130px;
            }

            .card1-webinars #card1{
              display:none;
            }

            .hero {
                transform: translateY(-49px);
                margin-bottom: 200px;
            }

            .visa{
               display:flex;
               flex-direction:column;
            }

            .service p {
                display: none;
            }


            .card1-webinars {
                       display: flex;
        flex-direction: column;
        /* flex-wrap: wrap; */
        /* justify-content: space-between; */
        margin-left: -236px;
            }

            .card1-webinars .card-webinar-learn {
                width: 48%;
                /* Two columns for tablets */
                margin-bottom: 20px;
            }

            #c2 {
                transform: translateX(-153px);
            }

            .ai-platform {
                width: 307px;
                margin: -125px 25px;
                margin-top: -251px;
                        margin-bottom: 1px;
            }

            .conte h1 {
                font-size: 12px;

                display: contents;
            }

            .btns {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        }



        @media (min-width:768px) and (max-width:982px) {
            .container {
                padding: 20px;
            }

            .background-img {
                height: 486px;
                margin: -32px -60px;
                width: 884px;

            }

            .abroad {
                margin-left: 20px;
                margin-top: -85px;
            }

            .abroad h1 {
                font-size: 1.8rem;
                padding: 7px;
            }

            .abroad p {
                font-size: 1.1rem;
            }

            .hero {
                margin-top: 357px;
                transform: translateY(-149px);
            }

            .service p {
                display: none;
            }


            .card1-webinars {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
                margin-left: -11px;
            }

            .card1-webinars .card-webinar-learn {
                width: 48%;
                /* Two columns for tablets */
                margin-bottom: 20px;
            }

            #c2 {
                transform: translateX(-153px);
            }

            .ai-platform {
                width: 758px;
                margin: -125px 25px;
                margin-top: -251px;
            }

            .tab-nav-webinar-learn button {
                gap: 30px;
            }


            .visa {
                gap: 20px
            }

            .conte h1 {
                font-size: 12px;

                display: contents;
            }

            .btns {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        }










        /* Desktop Devices (min-width: 1024px) */
        @media (min-width: 1024px) {
            .container {
                padding: 40px;
            }

            .background-img {
                /* height: 300px; Adjust for desktops */
                margin-left: auto;
            }

            .abroad h1 {
                font-size: 2.5rem;
            }

            .abroad p {
                font-size: 1.3rem;
            }

            .card1-webinars .card-webinar-learn {
                width: 30%;
                /* Three columns for larger screens */
                margin-bottom: 30px;
            }

            .ai-platform .btns button {
                padding: 15px 30px;
                font-size: 1.2rem;
            }
        }

        /* Large Desktop Screens (min-width: 1440px) */
        @media (min-width: 1440px) {
            .background-img {
                height: 100%;
                width: auto;
                margin: -31px -150px;
            }

            .abroad h1 {
                font-size: 2rem;
            }

            .abroad p {
                font-size: 1.2rem;
            }

            .card1-webinars .card-webinar-learn {
                width: 22%;
                /* Four columns for large screens */
                margin-bottom: 30px;
            }

            .ai-platform .btns button {
                padding: 18px 35px;
                font-size: 1.3rem;
            }
        }

        /* For Larger Screen - Ensuring proper layout when items break at large sizes */
        @media (min-width: 1600px) {
            .container {
                padding: 50px;
            }

            .background-img {
                height: 600px;
                /* Further height for very large screens */
            }

            .abroad h1 {
                font-size: 4rem;
            }

            .abroad p {
                font-size: 1.7rem;
            }

            .card1-webinars .card-webinar-learn {
                width: 20%;
                /* 5 columns for ultra-wide screens */
            }

            .ai-platform .btns button {
                padding: 20px 40px;
                font-size: 1.4rem;
            }
        }




        @media screen and (min-width: 1200px) {
            .card1-webinars .card-webinar-learn {
                width: 350px;
                margin: 0px;
            }
        }


        .card1-webinars {
            border-color: #fff;
            /* margin-top: 450px; */
            /* margin-left: 200px; */
        }

        .card1-webinars .card-webinar-learn {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            margin-bottom: 20px;
            transition: all .3sease-in-out;
            height: 550px;
            width: 350px;
            padding-right: 10px;
        }

        .card-webinar-learn {
            height: 600px;
            width: 350px;
            vertical-align: middle;
            margin-right: 50px;
            display: flex;
            align-items: center;
            text-align: center;
            margin: 200px;
            padding: 20px;
            margin-bottom: 90px;
        }


        .card-webinar-learn {
            --bs-card-spacer-y: 1rem;
            --bs-card-spacer-x: 1rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-title-color: ;
            --bs-card-subtitle-color: ;
            --bs-card-border-width: var(--bs-border-width);
            --bs-card-border-color: var(--bs-border-color-translucent);
            --bs-card-border-radius: var(--bs-border-radius);
            --bs-card-box-shadow: ;
            --bs-card-inner-border-radius: calc(var(--bs-border-radius) -(var(--bs-border-width)));
            --bs-card-cap-padding-y: 0.5rem;
            --bs-card-cap-padding-x: 1rem;
            --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: var(--bs-body-bg);
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 0.75rem;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            color: var(--bs-body-color);
            word-wrap: break-word;
            background-color: var(--bs-card-bg);
            background-clip: border-box;
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
        }


        .card-img-top1 {
            /* display: flex
                ; */
            width: 250px;
            /* height: 230px; */
            object-fit: cover;
            /* border-radius: 50%; */
            margin: 10px auto;
            border: 5px solid #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>



    <!-- <div class="container"> -->
    <div class="background-img">

        <div class="abroad">
            <h1>Your One-Stop Shop for All Things Study Abroad</h1>
            <br />
            <p>
                Edu-X is your full-service toolbox,
                giving you the luxury to access all study
                abroad services on one platform.<br><br>

                From loans and GICs to visa guidance,
                we’re here to provide hands-on support at every
                step of the study abroad journey.
            </p><br>
            <a href="#services"><button id="scrollButton">Let's get started</button></a>
        </div>
    </div><br><br><br><br><br><br><br>
    <br><br>
    <div class="service" id="services">
        <h1>Everything You Need, All in One Place</h1><br>
        <p>Explore exclusive services from leading providers across the globe.
            With Edu-X, you're never far from a helping hand.</p>

    </div>




    <main class="hero">
        <div class="tab-nav-webinar-learn">
            <button class="tab-btn active" data-target="students">FINANCIAL SERVICES</button>
            <button class="tab-btn" data-target="recruitment-partners">VISA SERVICES</button>
            <button class="tab-btn" data-target="partner-institutions">LOAN SERVICES</button>
            <button class="tab-btn" data-target="test">LANGUAGE TEST SERVICES</button>
        </div>



        <div class="hero-content">
            <div class="text-and-images">

                <div class="tab-content active" id="students">
                    <!-- <div id="img1"><img src="images/360_F_573916765_xyMxUAT72t77NwxVqdTkIRYDfcemr3HV.webp"></div>
                          <h1>Students</h1>
                          <p style="margin-top:10px;">We believe in your dreams and work hard to make them a reality. Get matched with and apply to programs and institutions that align with your background, skills, and interests.</p>
                          <button class="btn btn-primary" style="margin-top:15px;">Learn More</button>
                        </div>
                        <div class="tab-content" id="recruitment-partners" style="display: none;">
                          <div id="img2"><img src="images/Canada-Study-Permit-Processing-Times-Falling-q8awoecm53hn8hwocxuqxnf3deq9nnh2p9klnrj2dc.png"></div>
                          <h1>Recruitment Partners</h1>
                          <p style="margin-top:10px;">edux is more than a platform. We're your trusted partner, here to help you guide students around the world to fulfill their international education dreams.</p>
                          <button class="btn btn-primary" style="margin-top:15px;">Learn More</button>
                        </div>
                        <div class="tab-content" id="partner-institutions" style="display: none;">
                          <div id="img3"><img src="images/institutions.jpg"></div>
                          <h1>Partner Institutions</h1>
                          <p style="margin-top:10px;">Increase your global presence and the number of qualified student applicants from a single, easy-to-use platform trusted by more than 1,500 institutions worldwide.</p>
                          <button class="btn btn-primary" style="margin-top:15px;">Learn More</button> -->


                    <div class="card1-webinars">
                        <div class="row-cols-1 row-cols-md-3 g-4" id="card1">
                            <div class="col">
                                <div class="card-webinar-learn">
                                    <img src="{{ asset('images/Canada-Study-Permit-Processing-Times-Falling-q8awoecm53hn8hwocxuqxnf3deq9nnh2p9klnrj2dc.png') }}"
                                        class="card-img-top1" alt="...">
                                    <div class="card-body">
                                        <br><br>
                                        <p class="card-text"><a href="#">Why Choose Canada as an International
                                                Student</a></p><br>
                                        <h6>October 17, 2024</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card-webinar-learn" id="c1">
                                    <img src="{{ asset('images/AI035-Banner-1-qvnbbiv0vl6ajzw0bx7l4mbvn2lpuygoy0l63akqm8.png') }}"
                                        class="card-img-top1" alt="..." id="colimg">
                                    <div class="card-body">
                                        <br><br>
                                        <p class="card-text"><a href="#">The Early Impacts of Canada’s International
                                                Student Cap on Postgraduate Studies</a></p><br>
                                        <h6>October 17, 2024</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card-webinar-learn card2" id="c2">
                                    <img src="{{ asset('images/Ireland-Banner-2-–-St-Patricks-Day-q3lqzy1kxy9jp5gtjqh6qoqdglvbd0pn962rudqpq8.png') }}"
                                        class="card-img-top1" alt="...">
                                    <div class="card-body">
                                        <br><br>
                                        <p class="card-text"><a href="#">Cost of Living in Ireland</a></p><br>
                                        <h6>October 17, 2024</h6>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="tab-content" id="recruitment-partners">
                    <div class="visa">
                        <div>
                            <img src="{{ asset('images/visa.webp') }}">
                        </div>

                        <div>
                            <h1>Visa Services</h1>
                            <p>Our free Canadian Visa Calculator uses machine learning and
                                historical data to reveal how likely a student is to get
                                Canadian study permit approval. Try it out!</p>

                            <ul>
                                <li>Takes seconds to use.</li>
                                <li>Instant results.</li>
                                <li>Compare visa chances across study levels and regions.</li>
                            </ul>

                            <a href="visa_calculate.html"><button>Calculate Your Chances</button></a>
                        </div>
                    </div>

                </div>



                <div class="tab-content" id="partner-institutions">
                    <div class="visa">
                        <div>
                            <img src="{{ asset('images/loan.webp') }}">
                        </div>

                        <div>
                            <h1>Need a Loan? Edu-X Can Help</h1>
                            <p>Invest in your future with flexible loans, custom-built for
                                international students like you.</p>

                            <ul>
                                <li>No collateral or proof of funds needed</li>
                                <li>Interest rates as low as 9.5%</li>
                                <li>Total payment flexibility</li>
                            </ul>

                            <a href="home.html"><button>Get Started</button></a>
                        </div>
                    </div>

                </div>



                <div class="tab-content" id="test">
                    <div class="visa">

                        <div>
                            <h1>Save More on your English Tests</h1>
                            <p>Get TOEFL, PTE, GRE, and Duolingo test vouchers,
                                and more, at the best possible prices. Claim your
                                vouchers now at bulk discount prices!</p>

                            <!-- <a href="#"><button>Access Test Vouchers</button></a> -->
                        </div>

                        <div>
                            <img src="{{ asset('images/test-service.webp') }}">

                        </div>
                    </div>

                </div>





            </div>
        </div>
    </main>
    </div>
    </div>


    <div class="ai-platform">
        <div class="conte">
            <h1>Use our AI-powered platform to find your perfect program in seconds.</h1>

            <div class="btns">
                <a href="Student.html"><button>I am a Student</button></a>
                <a href="partner.html"><button id="partner">I am a Recruitment Pertner</button></a>
            </div>

        </div>
    </div>


    </div>
    </div>
    <br><br>

    </div>



    <script>
        document.getElementById('scrollButton').addEventListener('click', function() {
            const targetSection = document.getElementById('services');
            targetSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });


        document.getElementById('scrollButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior if it's inside an <a>

            const targetSection = document.getElementById('services');
            const navbarHeight = document.querySelector('.navbar')
                .offsetHeight; // Get the height of the fixed navbar
            const targetPosition = targetSection.offsetTop - navbarHeight -
                20; // Adjust scroll position (add some extra margin)

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth',
            });
        });







        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownMenu = document.getElementById("dropdownMenu");

        // Show dropdown when hovering on the button
        dropdownBtn.addEventListener("mouseenter", () => {
            dropdownMenu.style.display = "block";
        });

        // Show dropdown when hovering over the menu
        dropdownMenu.addEventListener("mouseenter", () => {
            dropdownMenu.style.display = "block";
        });

        // Hide dropdown when the mouse leaves the button or the menu
        dropdownBtn.addEventListener("mouseleave", () => {
            setTimeout(() => {
                if (!dropdownMenu.matches(":hover")) {
                    dropdownMenu.style.display = "none";
                }
            }, 200); // Optional delay for smoother UX
        });

        dropdownMenu.addEventListener("mouseleave", () => {
            dropdownMenu.style.display = "none";
        });



        buttons.forEach((button) => {
            button.addEventListener("click", () => {
                // Remove active class from all buttons
                buttons.forEach((btn) => btn.classList.remove("active"));

                // Add active class to the clicked button
                button.classList.add("active");

                // Hide all tab contents
                tabContents.forEach((content) => (content.style.display = "none"));

                // Show the content corresponding to the clicked button
                const target = button.getAttribute("data-target");
                document.getElementById(target).style.display = "block";

                // Update images for the active tab
                const images = imageSets[target];
                heroImages.innerHTML = ""; // Clear current images
                images.forEach((src, index) => {
                    const imageCard = document.createElement("div");
                    imageCard.className = `image-card`;
                    imageCard.style.zIndex = 3 - index; // Adjust stacking
                    imageCard.style.transform =
                        `translateX(${(index - 1) * 50}%) translateY(${index * 20}px)`; // Adjust positions
                    imageCard.innerHTML = `<img src="${src}" alt="Image ${index + 1}">`;
                    heroImages.appendChild(imageCard);
                });
            });
        });

        // Trigger click on the default active button to load its images
        document.querySelector(".tab-btn.active").click();
        });


        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove 'active' class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add 'active' class to the clicked button
                    this.classList.add('active');

                    // Show corresponding content
                    const targetId = this.getAttribute('data-target');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });
    </script>

    <script>
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".tab-button2");
    const videoElement = document.getElementById("video-player2");
    const videoSource = document.getElementById("video-source2");

    // Define video paths for each tab
    const videoSets = {
        "students-video": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
        "recruitment-partners-video": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"
    };

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            // Remove active class from all buttons
            buttons.forEach((btn) => btn.classList.remove("active2"));

            // Add active class to the clicked button
            button.classList.add("active2");
     
            // Update video source based on the clicked button
            const target = button.getAttribute("data-target");
            videoSource.src = videoSets[target];

            // Load and play the new video
            videoElement.load();
            // videoElement.play();
        });
    });

    // Trigger click on the default active button to load its video
    document.querySelector(".tab-button2.active2").click();
});




document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".tab-button");
  const videoElement = document.getElementById("video-player");
  const videoSource = document.getElementById("video-source");

  // Define video paths for each tab
  const videoSets = {
    "students-video": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
    "recruitment-partners-video": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
    "partner-institutions-video": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4"
  };

  // Set the active button class on page load
  const defaultActiveButton = document.querySelector(".tab-button.active1");
  const defaultTarget = defaultActiveButton.getAttribute("data-target");
  const defaultVideo = videoSets[defaultTarget];
  videoSource.src = defaultVideo;
  videoElement.load();
  // videoElement.play();

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons
      buttons.forEach((btn) => btn.classList.remove("active1"));

      // Add active class to the clicked button
      button.classList.add("active1");

      // Update video source based on the clicked button
      const target = button.getAttribute("data-target");
      videoSource.src = videoSets[target];

      // Load and play the new video
      videoElement.load();
     // videoElement.play();
    });
  });
});




document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");
  const heroImages = document.querySelector(".hero-images");
  
  // Define image sets for each tab
  const imageSets = {
    students: [
      "images/student.jpg",
      "images/partner_img.webp",
      "images/institutions.jpg"
    ],
    "recruitment-partners": [
      "images/partner_img.webp",
      "images/institutions.jpg",
      "images/student.jpg"
    ],
    "partner-institutions": [
      "images/institutions.jpg",
      "images/student.jpg",
      "images/partner_img.webp"
    ],
  };

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons
      buttons.forEach((btn) => btn.classList.remove("active"));

      // Add active class to the clicked button
      button.classList.add("active");

      // Hide all tab contents
      tabContents.forEach((content) => (content.style.display = "none"));

      // Show the content corresponding to the clicked button
      const target = button.getAttribute("data-target");
      document.getElementById(target).style.display = "block";

      // Update images for the active tab
      const images = imageSets[target];
      heroImages.innerHTML = ""; // Clear current images
      images.forEach((src, index) => {
        const imageCard = document.createElement("div");
        imageCard.className = `image-card`;
        imageCard.style.zIndex = 3 - index; // Adjust stacking
        imageCard.style.transform = `translateX(${(index - 1) * 50}%) translateY(${index * 20}px)`; // Adjust positions
        imageCard.innerHTML = `<img src="${src}" alt="Image ${index + 1}">`;
        heroImages.appendChild(imageCard);
      });
    });
  });

  // Trigger click on the default active button to load its images
  document.querySelector(".tab-btn.active").click();
});


document.addEventListener('DOMContentLoaded', function () {
  // Get all the buttons and content sections
  const buttons = document.querySelectorAll('.tab-button');
  const sections = document.querySelectorAll('.content');

  // Add event listener to each button
  buttons.forEach(button => {
    button.addEventListener('click', function () {
      // Get the target section ID
      const target = this.getAttribute('data-target');
      
      // Hide all content sections
      sections.forEach(section => {
        section.classList.remove('active-content');
      });

      // Show the content section corresponding to the button clicked
      const activeSection = document.getElementById(target);
      activeSection.classList.add('active-content');
    });
  });
});


    const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Show dropdown when hovering on the button
        dropdownBtn.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
        });

        // Show dropdown when hovering over the menu
        dropdownMenu.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
        });

        // Hide dropdown when the mouse leaves the button or the menu
        dropdownBtn.addEventListener('mouseleave', () => {
            setTimeout(() => {
                if (!dropdownMenu.matches(':hover')) {
                    dropdownMenu.style.display = 'none';
                }
            }, 200); // Optional delay for smoother UX
        });

        dropdownMenu.addEventListener('mouseleave', () => {
            dropdownMenu.style.display = 'none';
        });

</script>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
