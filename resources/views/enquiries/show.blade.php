@extends('layouts.app')

@section('content')
<h2>Enquiry Details</h2>
<p><strong>Full Name:</strong> {{ $enquiry->full_name }}</p>
<p><strong>Email:</strong> {{ $enquiry->email }}</p>
<p><strong>Contact:</strong> {{ $enquiry->contact }}</p>
<p><strong>Country:</strong> {{ $enquiry->country }}</p>
<p><strong>Enquiry Date:</strong> {{ $enquiry->enquiry_date->format('d M, Y') }}</p>
@endsection
