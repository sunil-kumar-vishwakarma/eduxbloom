@extends('frontent.layouts.app')
@section('title', 'EduX | Blog')
@section('content')

    <style>
        .blog-section {
            margin-top: 5%;
            width: 100%;
            padding: 60px 25px;
            background: #f5f8fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .blog-container {
            max-width: 1050px;
            margin: 0 auto;
            /* background: #fff; */
            padding: 45px 60px;
            border-radius: 20px;
            /* box-shadow: 0 10px 40px rgba(0, 0, 0, 0.07); */
        }

        .blog-image-wrapper {
            text-align: center;
            margin-bottom: 30px;
        }

        .blog-image-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .blog-meta {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 12px;
            text-align: left;
        }

        .blog-meta i {
            color: #007bff;
            margin-right: 6px;
        }

        .blog-title {
            font-size: 2.8rem;
            /* text-align: center; */
            font-weight: 700;
            color: #212529;
            margin: 25px 0 35px;
            line-height: 1.3;
        }

        .blog-description {
            font-size: 1.15rem;
            color: #333;
            line-height: 1.85;
            white-space: pre-line;
        }



        .back-button {
            display: inline-block;
            margin-top: 40px;
            color: #007bff;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            position: relative;
            padding-left: 24px;
            transition: all 0.3s ease;
        }

        .back-button::before {
            content: "←";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: #007bff;
        }

        .back-button:hover {
            color: #0056b3;
            padding-left: 28px;
        }

        @media (max-width: 768px) {
            .blog-container {
                padding: 30px 20px;
            }

            .blog-title {
                font-size: 2rem;
            }

            .blog-description {
                font-size: 1rem;
            }

            .blog-image-wrapper img {
                max-width: 100%;
            }
        }
    </style>

    {{-- <div class="blog-section">
    <div class="blog-container">

        <!-- Image -->
        <div class="blog-image-wrapper">
            <img src="{{ asset('/images/Canada-Study.png') }}" alt="Blog Cover">
        </div>

        <!-- Date -->
        <div class="blog-meta">
            <i class="fas fa-calendar-alt"></i> June 10, 2025
        </div>

        <!-- Title -->
        <h1 class="blog-title">How to Study Smart: 5 Proven Techniques</h1>

        <!-- Description -->
        <div class="blog-description">
            Studying smart is not about studying harder—it's about studying more effectively. Here are five proven techniques:

            1. Use the Pomodoro Technique – Study for 25 minutes and take a 5-minute break.
            2. Teach what you learn – Explaining concepts to someone else helps retain information better.
            3. Use active recall – Test yourself instead of just rereading notes.
            4. Space out your sessions – Study over time instead of cramming.
            5. Stay hydrated and sleep well – Your brain works better when rested and nourished.

            Start applying these techniques and notice how your learning improves!
        </div>

        <!-- Back Button -->
        <div class="back-button">
            <a href="{{ url()->previous() }}"> Back to Blogs</a>
        </div>
    </div>
</div> --}}

    <div class="blog-section">
        <div class="blog-container">

            <!-- Image -->
            <div class="blog-image-wrapper">
                <img src="{{ asset('/public/storage/' . $blog->image) }}" alt="Blog Image">
            </div>

            <!-- Date -->
            <div class="blog-meta">
                <i class="fas fa-calendar-alt"></i> {{ $blog->published_date->format('F d, Y') }}


            </div>

            <!-- Title -->
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <h1></h1>


            <!-- Description -->
            <div class="blog-description">
                <p>{!! nl2br(e($blog->description)) !!}</p>

                {{-- {!! nl2br(e($blog->description)) !!} --}}
            </div>

            <!-- Back Button -->
            <div class="back-button">
                <a href="{{ route('blogs-pages') }}">Back to Blogs</a>
            </div>
        </div>
    </div>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
