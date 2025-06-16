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

    <div class="container">
        <div class="header">
            <img src="images/student-mockup.png" alt="Profile Picture" />
            <div>
                <h1>Institut Teccart-Brossard</h1>
                <p>Brossard, Quebec, CA</p>
            </div>
        </div>

        <div class="program-title">Attestation d'études collégiales - Design d'animation 3D (NTL.OP)</div>
        <div class="program-code">106359</div>

        <div class="gallery-wrapper">
            <div class="gallery">
                <div class="main-img">
                    <img src="images/AI-016-1024x512.png" alt="Main Image" />
                </div>

                <!-- Repeat stacked columns -->
                <div class="stacked-column">
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 2" /></div>
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 3" /></div>
                </div>

                <div class="stacked-column">
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 4" /></div>
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 5" /></div>
                </div>
                <div class="stacked-column">
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 4" /></div>
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 5" /></div>
                </div>
                <div class="stacked-column">
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 4" /></div>
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 5" /></div>
                </div>
                <div class="stacked-column">
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 4" /></div>
                    <div class="small-img"><img src="images/AI-016-1024x512.png" alt="Image 5" /></div>
                </div>


            </div>
        </div>
    </div>

    <div class="container-overview">
        <div class="section-header">
            <h2>Program Summary</h2>
            <button class="eligibility-btn">Check Eligibility Now</button>
        </div>

        <div class="summary">
            <div class="summary-text">
                <p><strong>Program Description</strong></p>

                <div class="description-wrapper">
                    <div class="description-content" id="descContent">
                        <p>
                            This program trains individuals to work as 3D animation and computer graphics designers.
                            These professionals primarily work in computer animation studios (short and feature films),
                            television studios, as well as companies specializing in multimedia production, video games,
                            post-production, and special effects.
                        </p>
                        <p>
                            This program trains individuals to work as 3D animation and computer graphics designers.
                            These professionals primarily work in computer animation studios (short and feature films),
                            television studios, as well as companies specializing in multimedia production, video games,
                            post-production, and special effects.
                        </p>
                        <p>
                            This program trains individuals to work as 3D animation and computer graphics designers.
                            These professionals primarily work in computer animation studios (short and feature films),
                            television studios, as well as companies specializing in multimedia production, video games,
                            post-production, and special effects.
                        </p>
                    </div>


                    <div class="fade-shadow"></div>

                    <!-- <button id="toggleDesc" class="show-more-btn">Show More</button> -->
                </div>
                <button id="toggleDesc" class="show-more-btn">Show More</button>
            </div>

            <div class="summary-details">
                <ul class="details-list">
                    <li>
                        <span class="detail-icon"><i class="fa-solid fa-graduation-cap"></i></span>
                        <div class="detail-content">
                            <h4>Program Type</h4>
                            <p>2-Year Undergraduate Diploma</p>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><i class="fa-solid fa-calendar"></i></span>
                        <div class="detail-content">
                            <h4>Duration</h4>
                            <p>20-month Attestation d'études collégiales including internship</p>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><i class="fa-solid fa-money-bill"></i></span>
                        <div class="detail-content">
                            <h4>Tuition Fee</h4>
                            <p>$20,635.00 CAD / Year</p>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                        <div class="detail-content">
                            <h4>First Year Cost</h4>
                            <p>$20,850.00 CAD</p>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><i class="fa-solid fa-file-contract"></i></span>
                        <div class="detail-content">
                            <h4>Application Fee</h4>
                            <p>$250.00 CAD</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>


        <div class="requirement-section">
            <div class="req-header">
                <h2>Admission Requirements</h2>
                <p class="subtext">Requirements may vary based on the student and education background</p>
            </div>

            <div class="requirement-block">
                <h3 class="req-subtitle">Academic Background</h3>
                <div class="requirements">
                    <div class="requirement-card">
                        <h4><i class="fa-solid fa-school"></i> Minimum Level of Education</h4>
                        <p>Grade 12 / High School</p>
                    </div>
                    <div class="requirement-card">
                        <h4><i class="fa-solid fa-percent"></i> Minimum CGPA</h4>
                        <p class="highlight">50%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        const toggleBtn = document.getElementById("toggleDesc");
        const wrapper = document.querySelector(".description-wrapper");

        toggleBtn.addEventListener("click", () => {
            wrapper.classList.toggle("expanded");
            toggleBtn.textContent = wrapper.classList.contains("expanded") ? "Show Less" : "Show More";
        });

    </script>

</body>

</html>