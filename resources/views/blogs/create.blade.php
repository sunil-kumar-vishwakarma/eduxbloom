@extends('layouts.app')
@section('title', 'EduX | Create Blogs')
@section('content')
<div class="settings-container">
    <header class="edit-student-header">
        <h1>Create Blogs</h1>
        <a href="{{ route('blog.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Blog List</a>
    </header>
<br>
<br>
    <form class="create-form" action="{{ route('store-blog') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter Title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter Description...." required></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <div>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" placeholder="Enter Category" required>
        </div>
        <div>
            <button type="submit">Create Blog</button>
        </div>
    </form>
</div>
@endsection
