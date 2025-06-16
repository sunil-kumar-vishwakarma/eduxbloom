@extends('layouts.app')
@section('title', 'EduX | School list')
@section('content')
    <main class="main-content-user">
        <section class="user-list-section">
            <!-- Create Button (Top) -->
            <button class="btncreate" onclick="window.location.href='{{ route('schools.create') }}'">+ Create School</button>

            <table id="city-list" class="user-list-table">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>School Name</th>
                        <th>City Name</th>
                        <th>Zone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->city }}</td>
                            <td>{{ $school->zone }}</td>
                            <td>
                                <button class="btnuser view-user-btn" onclick="openViewModal({{ $school->id }})">View</button>
                                <a href="{{ route('schools.edit', $school->id) }}">
                                    <button class="btnuser edit-user-btn">Edit</button>
                                </a>
                                <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $school->id }})">Delete</button>
                                <form id="deleteForm{{ $school->id }}" action="{{ route('school.delete', $school->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

    <!-- Modal for View School Details -->
    <div id="userDetailsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <i class="ri-school-line"></i>
            <h2>School Details</h2>
            <div id="userDetails">
                <!-- Dynamic content will be injected here -->
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDeleteModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this school?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const APP_URL = "{{ url('/') }}";

        // Open View Modal and Inject School Details
        function openViewModal(schoolId) {
            const schoolDetailsContainer = document.getElementById('userDetails');
            
            // Show spinner while loading
            schoolDetailsContainer.innerHTML = `
                <div class="spinner-container">
                    <div class="spinner"></div>
                </div>
            `;
            
            // Fetch the school details
            fetch(`${APP_URL}/schools/${schoolId}`)
                .then(response => response.json())
                .then(school => {
                    const details = `
                        <p><strong>School Name:</strong> ${school.name}</p>
                        <p><strong>City Name:</strong> ${school.city}</p>
                        <p><strong>Zone:</strong> ${school.zone}</p>
                    `;
                    schoolDetailsContainer.innerHTML = details;
                })
                .catch(error => {
                    console.error("Error fetching school data:", error);
                    schoolDetailsContainer.innerHTML = `<p>Error loading school details. Please try again later.</p>`;
                });
            
            // Show the modal
            document.getElementById('userDetailsModal').style.display = 'block';
        }

        // Close View Modal
        function closeViewModal() {
            document.getElementById('userDetailsModal').style.display = 'none';
        }

        // Open Delete Modal for school
        function openDeleteModal(schoolId) {
            window.schoolIdToDelete = schoolId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Confirm Delete
        function confirmDelete() {
            const schoolId = window.schoolIdToDelete;
            const deleteForm = document.getElementById(`deleteForm${schoolId}`);
            if (deleteForm) {
                deleteForm.submit();
            }
        }

        // Close Delete Modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>
@endsection

<style>
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

    .spinner-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
