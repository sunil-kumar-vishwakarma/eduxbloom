@extends('layouts.app')

@section('content')
    <style>
        .stats-section1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            /* Spacing between stat cards */
            padding: 1rem;
            background-color: #f9f9f9;
        }

        .stats-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Center-align on all screens */
            gap: 20px;
            padding: 30px;
        }

        .stats-card {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            width: 300px;
            height: 100px;
            padding: 15px 10px;
            border: 1px solid #000;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            flex: 1 1 calc(25% - 40px);
            /* Four cards per row with spacing */
            box-sizing: border-box;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-card img {
            height: 60px;
            width: 50px;
            margin-right: 15px;
        }

        .stat-info h3 {
            margin: 0;
            font-size: 22px;
            color: #003366;
            font-weight: bold;
        }

        .stat-info p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #000;
        }

        /* Responsive behavior */
        @media (max-width: 992px) {
            .stats-card {
                flex: 1 1 calc(50% - 40px);
                /* Two per row on tablets */
            }
        }

        @media (max-width: 576px) {
            .stats-card {
                flex: 1 1 100%;
                /* Full width on mobile */
            }
        }

        .btn-edit,
        .btn-create {
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(to right, #4a60ff, #00c8ff);
            color: white;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: 0.3s ease;
        }

        .btn-edit:hover,
        .btn-create:hover {
            background: linear-gradient(to right, #364edb, #00aaff);
            transform: scale(1.05);
        }
    </style>

    <div class="stats-section1">
        <h2 class="stats-heading">📊 Stats Overview</h2>

        @if ($stat)
            <div class="stats-container">
                <div class="stats-card">
                    <img src="{{ asset('images/girl.png') }}" alt="Students Helped">
                    <div class="stat-info">
                        <h3>{{ $stat->students_helped ?? '0' }}+</h3>
                        <p>Students Helped</p>
                    </div>
                </div>
                <div class="stats-card">
                    <img src="{{ asset('images/envolope.png') }}" alt="Programs Offered">
                    <div class="stat-info">
                        <h3>{{ $stat->programs_offered ?? '0' }}+</h3>
                        <p>Programs Offered</p>
                    </div>
                </div>
                <div class="stats-card">
                    <img src="{{ asset('images/home.png') }}" alt="Institutions">
                    <div class="stat-info">
                        <h3>{{ $stat->institutions ?? '0' }}+</h3>
                        <p>Institutions</p>
                    </div>
                </div>
                <div class="stats-card">
                    <img src="{{ asset('images/earth.png') }}" alt="Destination Countries">
                    <div class="stat-info">
                        <h3>{{ $stat->countries ?? '0' }}</h3>
                        <p>Destination Country</p>
                    </div>
                </div>
            </div>
            <div class="action-btn">
                <a href="{{ route('stats.edit', $stat->id) }}" class="btn-edit">✏️ Edit Stats</a>
            </div>
        @else
            <div class="action-btn">
                <p>No statistics found.</p>
                <a href="{{ route('stats.create') }}" class="btn-create">➕ Create Stats</a>
            </div>
        @endif
    </div>
@endsection
