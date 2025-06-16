@extends('layouts.app')

@section('content')
<br>
<br>
    {{-- <h2>Mentor Applications</h2> --}}

    <table class="subscription-table">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>School</th>
                <th>Country</th>
                <th>Applied On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mentors as $index => $mentor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mentor->name }}</td>
                    <td>{{ $mentor->email }}</td>
                    <td>{{ $mentor->phone }}</td>
                    <td>{{ $mentor->school }}</td>
                    <td>{{ $mentor->country }}</td>
                    <td>{{ $mentor->created_at->format('d M, Y') }}</td>
                    <td>
                        <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $mentor->id }})">Delete</button>

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
            <h3>Are you sure you want to delete this application?</h3>
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
            // Show modal
            document.getElementById('deleteModal').style.display = 'block';

            // Set the form action dynamically
            const form = document.getElementById('deleteForm');
            form.action = `/admin/mentors/${id}`; // Adjust this if your route differs
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
@endsection
