@extends('layouts.app')

@section('content')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Include DataTable JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    <button class="btncreate" onclick="window.location.href='{{ route('discover_program.create') }}';">+ Create
        Program</button>

    <!-- Container for scrollable table -->
    <div class="table-container">
        <table class="employer-table" id="customerTable">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Image</th>
                    <th>University Name</th>
                    <th>Certificate</th>
                    <th>College Name</th>
                    <th>College Course</th>
                    <th>Location</th>
                    <th>Campus Country</th>
                    <th>Campus City</th>
                    <th>Tuition (1st year)</th>
                    <th>Application Fee</th>
                    <th>Duration</th>
                    <th>Success Prediction</th>
                    <th>Details</th>
                    {{-- <th>Status</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('/public/storage/' . $program->image) }}?v={{ $program->updated_at->timestamp }}"
                                alt="University Logo" width="50">
                        </td>
                        <td>{{ $program->university_name }}</td>
                        <td>{{ $program->certificate }}</td>
                        <td>{{ $program->college_name }}</td>
                        <td>{{ $program->college_course }}</td>
                        <td>{{ $program->location }}</td>
                        <td>{{ $program->campus_country }}</td>
                        <td>{{ $program->campus_city }}</td>
                        <td>₹ {{ number_format($program->tuition) }}</td>
                        <td>₹ {{ number_format($program->application_fee) }}</td>
                        <td>{{ $program->duration }} Months</td>
                        <td>{{ $program->success_prediction }}</td>
                        <td>{{ $program->details }}</td>
                        {{-- <td>
                            <button
                                class="student-toggle-status btn {{ $program->status === 'Active' ? 'btn-success' : 'btn-danger' }}"
                                data-id="{{ $program->id }}" data-status="{{ $program->status }}"
                                onclick="toggleStatus({{ $program->id }}, '{{ $program->status }}')">
                                {{ $program->status }}
                            </button>
                        </td> --}}
                        <td>
                            <button class="btnuser view-user-btn" onclick="openViewModal({{ $program->id }})">View</button>
                            <a href="{{ route('discover_program.edit', $program->id) }}">
                                <button class="btnuser edit-user-btn">Edit</button>
                            </a>
                            <button class="btnuser delete-user-btn"
                                onclick="openDeleteModal({{ $program->id }})">Delete</button>

                            <form id="deleteForm{{ $program->id }}"
                                action="{{ route('discover_program.destroy', $program->id) }}" method="POST"
                                style="display:none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="submitDelete{{ $program->id }}"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- View Modal -->
    <div id="userDetailsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <i class="fas fa-graduation-cap icon"></i>
            <h2>Discover Program Details</h2>
            <div id="userDetails"></div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDeleteModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this Program?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                paging: true, // Enable pagination
                ordering: true, // Enable column sorting
                info: true, // Hide "Showing X of Y" info
                searching: false, // Hide search box
                lengthChange: false // Hide "Show X entries" dropdown
            });
        });
    </script>



    <script>
        const APP_URL = "{{ url('') }}";

        function openViewModal(programId) {
            const modal = document.getElementById('userDetailsModal');
            const content = document.getElementById('userDetails');

            content.innerHTML = `<p>Loading Program details...</p><div class="spinner"></div>`;
            modal.style.display = 'block';

            fetch(`${APP_URL}/discover_program/${programId}`)
                .then(response => response.json())
                .then(program => {
                    content.innerHTML = `
                    <p><strong>University Name:</strong> ${program.university_name}</p>
                    <p><strong>Certificate:</strong> ${program.certificate}</p>
                    <p><strong>College Name:</strong> ${program.college_name}</p>
                    <p><strong>Location:</strong> ${program.location}</p>
                    <p><strong>Campus Country:</strong> ${program.campus_country}</p>
                    <p><strong>Campus City:</strong> ${program.campus_city}</p>
                    <p><strong>Tuition (1st year):</strong> $${parseFloat(program.tuition).toLocaleString()} CAD</p>
                    <p><strong>Application Fee:</strong> $${parseFloat(program.application_fee).toLocaleString()} CAD</p>
                    <p><strong>Duration:</strong> ${program.duration}</p>
                    <p><strong>Success Prediction:</strong> ${program.success_prediction}</p>
                    <p><strong>Details:</strong> ${program.details}</p>
                `;
                })
                .catch(err => {
                    console.error("Fetch error:", err);
                    content.innerHTML = `<p>Error loading program details.</p>`;
                });
        }

        function closeViewModal() {
            document.getElementById('userDetailsModal').style.display = 'none';
        }

        function openDeleteModal(programId) {
            document.querySelectorAll('form[id^="deleteForm"]').forEach(f => f.style.display = 'none');
            document.getElementById(`deleteForm${programId}`).style.display = 'block';
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            document.querySelectorAll('form[id^="deleteForm"]').forEach(f => f.style.display = 'none');
        }

        function confirmDelete() {
            const form = document.querySelector('form[style="display: block;"]');
            if (form) form.submit();
        }

        function toggleStatus(programId, currentStatus) {
            const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
            fetch(`${APP_URL}/discover_program/${programId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        const btn = document.querySelector(`button[data-id="${programId}"]`);
                        btn.textContent = data.status;
                        btn.classList.toggle('btn-success');
                        btn.classList.toggle('btn-danger');
                    }
                })
                .catch(error => console.error('Toggle error:', error));
        }
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
@endsection

<style>
.modal-content{
    margin: 5% auto !important;
}

    .table-container {
        width: 100%;
        overflow-x: auto;
        /* Enables horizontal scrolling */
        margin-bottom: 20px;
        /* Optional: space below the table */
    }

    .employer-table {
        width: 100%;
        min-width: 1300px;
        /* Adjust based on your columns */
        border-collapse: collapse;
    }

    .employer-table td img {
        width: 50px !important;
        height: 50px !important;
        border-radius: 50% !important;

    }


    .confirm-delete-btn {
        background-color: rgb(224, 40, 40);
        color: white;
    }

    .btn-success {
        background-color: #0da631;
        color: white;
    }

    .btn-danger {
        background-color: rgb(188, 24, 24);
        color: white;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border-left-color: #09f;
        animation: spin 1s linear infinite;
        margin: 10px auto;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
