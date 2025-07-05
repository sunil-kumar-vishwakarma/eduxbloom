@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- <br>
<br> -->
    {{-- <h2>Apply Program Applications</h2> --}}

    <table class="subscription-table display" id="myTable">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Full Name</th>
                <th>Date Of Birth</th>
                <th>Location</th>
                <th>Whatsapp Number</th>
                <th>email</th>
                <th>studies_level</th>
                <th>Applied On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($program_apply_now as $index => $program)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $program->full_name }}</td>
                    <td>{{ $program->dob }}</td>
                    <td>{{ $program->location }}</td>
                    <td>{{ $program->whats_app_number }}</td>
                    <td>{{ $program->email }}</td>
                    <td>{{ $program->studies_level }}</td>
                    <td>{{ $program->created_at->format('d M, Y') }}</td>
                    <td>
                        <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $program->id }})">Delete</button>

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
            form.action = `/admin/apply/delete/${id}`; // Adjust this if your route differs
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
    
    <script>
        $(document).ready(function() {
    $('#myTable').DataTable({
        "pageLength": 10, // Items per page
        "lengthMenu": [10, 25, 50, 100], // Dropdown to change page size
        "ordering": true, // Enable sorting
        "searching": true // Enable search box
    });
});
    </script>
@endsection
