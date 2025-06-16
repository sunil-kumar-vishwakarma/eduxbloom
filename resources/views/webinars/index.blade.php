@extends('layouts.app')

@section('content')
    <button class="btncreate" onclick="window.location.href='{{ route('webinars.create') }}';">+ Create Webinar</button>

    <table class="employer-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Type</th>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($webinars as $webinar)
                <tr>
                     <td>{{ $loop->iteration }}</td> 
                    <td>{{ $webinar->type }}</td>
                    <td>{{ $webinar->title }}</td>
                    <td>{{ $webinar->date }}</td>
                    <td>{{ $webinar->time }}</td>
                    <td>
                        <a href="{{ route('webinars.edit', $webinar->id) }}">
                            <button class="btnuser edit-user-btn">Edit</button>
                        </a>
                        <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $webinar->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this webinar?</h3>
            <div class="modal-buttons">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="confirm-delete-btn">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = '/admin/webinars/' + id;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
@endsection
