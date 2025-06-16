@extends('layouts.app')

@section('content')
    <h1>{{ $blog->title }}</h1>
    <img src="{{ asset('/public/storage/'.$blog->image) }}" alt="Blog Image" style="max-width: 100%; height: auto;">
    <p>{{ $blog->description }}</p>
    <p><strong>Published on:</strong> {{ $blog->published_date->format('d M, Y') }}</p>
    <p><strong>Category:</strong> {{ $blog->category }}</p>
@endsection
