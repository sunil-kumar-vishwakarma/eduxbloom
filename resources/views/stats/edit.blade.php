@extends('layouts.app')

@section('content')
   <div class="settings-container">
       
         <header class="edit-student-header">
           <h1>Edit Statistics</h1>
            <a href="{{ route('stats.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
        </header>
        <br>
        <br>
        <form action="{{ route('stats.update', $stat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="students_helped">Students Helped</label>
                <input type="number" name="students_helped" id="students_helped" class="form-control"
                    value="{{ $stat->students_helped }}" required>
            </div>

            <div class="form-group">
                <label for="programs_offered">Programs Offered</label>
                <input type="number" name="programs_offered" id="programs_offered" class="form-control"
                    value="{{ $stat->programs_offered }}" required>
            </div>

            <div class="form-group">
                <label for="institutions">Institutions</label>
                <input type="number" name="institutions" id="institutions" class="form-control"
                    value="{{ $stat->institutions }}" required>
            </div>

            <div class="form-group">
                <label for="countries">Destination Countries</label>
                <input type="number" name="countries" id="countries" class="form-control" value="{{ $stat->countries }}"
                    required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Stats</button>
        </form>
    </div>
@endsection
