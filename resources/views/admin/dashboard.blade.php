@extends('layouts.app')
@section('title', 'EduX | Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduX Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js"></script>
    <style>
        /* Global Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /* background: radial-gradient(circle, #141E30, #243B55); */
            overflow-x: hidden;
        }

        .dashboard-wrapper {
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        /* Section Styling */
        #stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            width: 100%;
            max-width: 1200px;
        }

        /* Card Styling */
        .stat-card {
            /* background: rgba(255, 255, 255, 0.1); */
            background-color: #2c3e50;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 70px 0;
            text-align: center;
            padding: 30px 20px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            /* background: linear-gradient(45deg, #4e73df, #1cc88a, #36b9cc, #f6c23e); */
            background-size: 400%;
            z-index: 0;
            transition: all 0.6s ease;
            transform: rotate(0deg);
            opacity: 0.6;
            animation: gradientMove 6s infinite linear;
        }

        /* .stat-card:hover::before {
            transform: rotate(360deg);
        } */

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(255, 255, 255, 0.4);
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Content Styling */
        .stat-card h3 {
            font-size: 2.5rem;
            margin: 0;
            position: relative;
            z-index: 1;
            background: linear-gradient(to right, #f7971e, #ffd200);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: popIn 0.5s ease forwards;
        }

        .stat-card p {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.8);
            position: relative;
            z-index: 1;
            margin-top: 10px;
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Hover Glow Effect */
        .stat-card:hover h3 {
            animation: neonGlow 0.7s  infinite alternate;
        }

        @keyframes neonGlow {
            0% { text-shadow: 0 0 5px #ffd200, 0 0 10px #ffd200, 0 0 20px #ffd200; }
            100% { text-shadow: 0 0 20px #ffd200, 0 0 30px #ffd200, 0 0 50px #ffd200; }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            #stats-section {
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            #stats-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Stats Section -->
        <section id="stats-section">
            <div class="stat-card">
                <a href="{{ route('students.index') }}" style="text-decoration: none; color: inherit;">
                    <h3 id="totalStudents" data-count="{{ $total_students }}">0</h3>
                    <p>Total Students</p>
                </a>
            </div>
            <div class="stat-card">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <h3 id="newEnrollments" data-count="{{ $new_enrollments }}">0</h3>
                    <p>New Enrollments</p>
                </a>
            </div>
            <div class="stat-card">
                <a href="{{ route('school.index') }}" style="text-decoration: none; color: inherit;">
                    <h3 id="registeredSchools" data-count="{{ $registered_schools }}">0</h3>
                    <p>Schools Registered</p>
                </a>
            </div>
            <div class="stat-card">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <h3 id="activeCourses" data-count="{{ $active_courses }}">0</h3>
                    <p>Active Courses</p>
                </a>
            </div>
            
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const options = {
                useEasing: true,
                useGrouping: true,
                separator: ',',
                decimal: '.',
            };

            const stats = ['totalStudents', 'newEnrollments', 'registeredSchools', 'activeCourses'];

            stats.forEach(stat => {
                const element = document.getElementById(stat);
                const countUp = new CountUp(stat, 0, parseInt(element.getAttribute('data-count')), 0, 2, options);
                countUp.start();
            });
        });
    </script>
</body>
</html>
@endsection
