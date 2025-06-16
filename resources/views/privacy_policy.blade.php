@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Privacy Policy</title>
        <style>
            /* Container */
            .container {
                max-width: 900px;
                margin: 0 auto;
                padding: 40px 20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
                background-color: #fff;
                line-height: 1.7;
            }

            /* Headings */
            .container h1 {
                font-size: 2.5rem;
                margin-bottom: 10px;
                color: black;
                text-align: center;
            }

            .container h2 {
                font-size: 1.8rem;
                margin-top: 30px;
                color: black;
                border-bottom: 2px solid black;
                padding-bottom: 5px;
            }

            .container h3 {
                font-size: 1.3rem;
                margin-top: 20px;
                color: black;
            }

            /* Paragraphs */
            .container p {
                margin: 15px 0;
                font-size: 1rem;
            }

            /* Unordered Lists */
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
            <p>{{ $privacy_policy->title }}</p>
            {!! $privacy_policy->description !!}

            <footer>
                <p>&copy; [Insert Year] [Institution Name]. All rights reserved.</p>
            </footer>
        </div>
    </body>

    </html>
@endsection
