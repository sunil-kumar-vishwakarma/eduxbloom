@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Terms and Conditions - Edu-X</title>
        <style>
            /* Container */
            .container {
                max-width: 900px;
                margin: 0 auto;
                padding: 40px 20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
                background-color: #ffffff;
                line-height: 1.7;
                border-radius: 8px;
                /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.05); */
            }

            /* Main Heading */
            .container h1 {
                font-size: 2.5rem;
                margin-bottom: 10px;
                color: #000;
                text-align: center;
            }

            /* Sub Headings */
            .container h2 {
                font-size: 1.8rem;
                margin-top: 30px;
                color: #000;
                border-bottom: 2px solid #000;
                padding-bottom: 5px;
            }

            .container h3 {
                font-size: 1.3rem;
                margin-top: 20px;
                color: #000;
            }

            /* Paragraphs */
            .container p {
                margin: 15px 0;
                font-size: 1rem;
                color: #333;
            }

            /* Lists */
            .container ul {
                margin: 10px 0 20px 25px;
                padding: 0;
                list-style-type: disc;
            }

            .container ul li {
                margin-bottom: 10px;
                font-size: 1rem;
            }

            /* Footer */
            .container footer {
                margin-top: 40px;
                border-top: 1px solid #ccc;
                padding-top: 20px;
                font-size: 0.95rem;
                text-align: center;
                color: #777;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .container {
                    padding: 30px 15px;
                }

                .container h1 {
                    font-size: 2rem;
                }

                .container h2 {
                    font-size: 1.5rem;
                }

                .container h3 {
                    font-size: 1.15rem;
                }

                .container p,
                .container ul li {
                    font-size: 0.95rem;
                }
            }

            @media (max-width: 480px) {
                .container {
                    padding: 20px 10px;
                }

                .container h1 {
                    font-size: 1.7rem;
                }

                .container h2 {
                    font-size: 1.3rem;
                }

                .container h3 {
                    font-size: 1rem;
                }

                .container p,
                .container ul li {
                    font-size: 0.9rem;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- <h1>Terms and Conditions</h1>
            <p><strong>Effective Date:</strong>20-11-2024</p>

            <p>Welcome to <strong>Edu-X</strong> ("Website"), owned and operated by [Your Company Name] ("we," "us," "our"). These Terms and Conditions govern your access to and use of the Website and its services. By accessing or using the Website, you agree to comply with these terms. If you do not agree, you may not use the Website.</p>

            <h2>1. Services Provided</h2>
            <p>Edu-X provides tools, resources, and information to help users explore, compare, and apply to colleges and educational institutions. The Website is for informational purposes only and does not guarantee admission or outcomes.</p>

            <h2>2. Eligibility</h2>
            <p>You must be at least 16 years old to use this Website. By accessing the Website, you confirm that you meet this age requirement. Users under 18 must obtain consent from a parent or guardian.</p>

            <h2>3. User Account</h2>
            <ul>
                <li><strong>Account Creation:</strong> To access certain features, you may need to create an account. You agree to provide accurate and up-to-date information.</li>
                <li><strong>Account Security:</strong> You are responsible for maintaining the confidentiality of your login credentials. Notify us immediately of any unauthorized use of your account.</li>
                <li><strong>Account Termination:</strong> We reserve the right to suspend or terminate accounts that violate these terms or engage in fraudulent activities.</li>
            </ul>

            <h2>4. Use of the Website</h2>
            <ul>
                <li><strong>Permitted Use:</strong> The Website is intended for personal, non-commercial use.</li>
                <li><strong>Prohibited Activities:</strong> You agree not to:
                    <ul>
                        <li>Misrepresent information or impersonate another person.</li>
                        <li>Use the Website for illegal or unauthorized purposes.</li>
                        <li>Access the Website using automated methods like bots or crawlers.</li>
                        <li>Copy, distribute, or modify any part of the Website without permission.</li>
                    </ul>
                </li>
            </ul>

            <h2>5. Information Accuracy</h2>
            <p>While we strive to provide accurate and up-to-date information about colleges and institutions, Edu-X does not guarantee the completeness or accuracy of this information. Always verify details directly with the institutions.</p>

            <h2>6. Third-Party Links</h2>
            <p>The Website may contain links to third-party websites. Edu-X is not responsible for the content, policies, or practices of these external sites. Access them at your own risk.</p>

            <h2>7. Intellectual Property</h2>
            <p>All content, logos, designs, and materials on the Website are owned by Edu-X or its licensors. You may not reproduce, distribute, or exploit any content without prior written permission.</p>

            <h2>8. Privacy</h2>
            <p>Your use of the Website is also governed by our <a href="#privacy-policy">Privacy Policy</a>. By using the Website, you consent to the collection and use of your information as outlined in the Privacy Policy.</p>

            <h2>9. Limitation of Liability</h2>
            <p>Edu-X is not liable for:</p>
            <ul>
                <li>Any errors or omissions in the Website’s content.</li>
                <li>Any direct, indirect, or incidental damages resulting from the use or inability to use the Website.</li>
                <li>Decisions made based on the information provided on the Website.</li>
            </ul>

            <h2>10. Indemnification</h2>
            <p>You agree to indemnify and hold harmless Edu-X, its affiliates, and its employees from any claims, damages, or losses arising from your use of the Website or violation of these Terms.</p>

            <h2>11. Changes to Terms</h2>
            <p>We reserve the right to update or modify these Terms at any time. Changes will be effective immediately upon posting. Continued use of the Website constitutes acceptance of the revised Terms.</p>

            <h2>12. Termination</h2>
            <p>We may suspend or terminate your access to the Website if you breach these Terms. Upon termination, your right to use the Website ceases immediately.</p>

            <h2>13. Governing Law</h2>
            <p>These Terms are governed by the laws of [Your Jurisdiction]. Any disputes will be resolved in the courts of [Your Jurisdiction].</p>

            <h2>14. Contact Us</h2>
            <p>For questions about these Terms and Conditions, please contact us at:</p>
            <ul>
                <li><strong>Email:</strong> [Insert Email Address]</li>
                <li><strong>Phone:</strong> [Insert Phone Number]</li>
                <li><strong>Address:</strong> [Insert Address]</li>
            </ul>

            <p><strong>© [Insert Year] Edu-X. All Rights Reserved.</strong></p> -->

            <p>{{ $terms_and_condition->title }}</p>
            {!! $terms_and_condition->description !!}

        </div>
    </body>

    </html>
@endsection
