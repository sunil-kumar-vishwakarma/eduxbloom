@extends('layouts.app')
@section('title', 'EduX | Edit Blogs')
{{-- @include('partials.sidebar') --}}
{{-- @include('partials.navbar') --}}

@section('content')
<div class="settings-container">
    <header class="edit-student-header">
        <h1>Edit Blog Details</h1>
        <a href="{{ route('blog.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Blog List</a>
    </header>
<br>
<br>
    <form class="edit-form" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required>{{ old('description', $blog->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $blog->category) }}" required>
        </div>
        <div class="form-group">
            <label for="date">Published Date</label>
            <input type="date" id="date" name="date" value="{{ old('date', $blog->published_date->format('Y-m-d')) }}" required>
        </div>
        
        <!-- Display the old image if it exists -->
        @if ($blog->image)
            <div class="form-group">
                <label for="old-image">Current Image</label>
                <img src="{{ asset('/public/storage/' . $blog->image) }}" alt="Blog Image" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        
        <button type="submit" class="btnupdate">Update Blog</button>
    </form>
</div>

@endsection
