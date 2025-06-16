@extends('layouts.app')
@section('title', 'EduX | Edit Page')
@section('content')
    <div class="settings-container">
        <header class="edit-student-header">
            <h1>Term and Condition</h1>
        </header>
        <br><br>

        <form action="{{route('pages.edit_term.storey')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <!-- Title Field -->
            <div class="section-form">
                <label for="Title">Title*</label>
                <input type="text" id="Title" name="title"  value="{{$PageList->title ?? '' }}" required>
                <input type="hidden" id="type" name="type"  value="term">
            </div>

            <!-- Description Field -->
            <div class="input-textarea">
                <label for="description">Description*</label>
                <textarea id="description" name="description" cols="10" rows="5">{{$PageList->description ?? '' }}</textarea>
            </div>
            <br><br>

            <button type="submit">Update Page</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
