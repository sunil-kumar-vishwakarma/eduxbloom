@extends('layouts.app')

@section('content')
  <div class="settings-container">
  <header class="edit-student-header">
            <h1>Edit Contact Info</h1>
            <a href="{{ route('contact-infos.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Contact
                Info list</a>
        </header>
        <br>
        <br>

    <form action="{{ route('contact-infos.update', $contact_info->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('contact_infos.form', ['contact' => $contact_info])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
