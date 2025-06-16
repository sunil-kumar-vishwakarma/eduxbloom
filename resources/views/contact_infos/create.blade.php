@extends('layouts.app')

@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Create Contact Info</h1>
            <a href="{{ route('contact-infos.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Contact
                Info list</a>
        </header>
        <br>
        <br>

        <form action="{{ route('contact-infos.store') }}" method="POST">
            @csrf
            @include('contact_infos.form')
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
