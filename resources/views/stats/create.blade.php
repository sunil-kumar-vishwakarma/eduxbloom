@extends('layouts.app')

@section('content')
    <div class="settings-container">

        <header class="edit-student-header">
            <h1>Create Statistics</h1>
            <a href="{{ route('stats.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back
            </a>
        </header>
        <br>
        <br>

        <form action="{{ route('stats.store') }}" method="POST">
            @csrf

            <label>Students Helped</label>
            <input type="number" name="students_helped" required>

            <label>Programs Offered</label>
            <input type="number" name="programs_offered" required>

            <label>Institutions</label>
            <input type="number" name="institutions" required>

            <label>Destination Countries</label>
            <input type="number" name="countries" required>

            <button type="submit">Submit</button>
        </form>

    </div>
@endsection
