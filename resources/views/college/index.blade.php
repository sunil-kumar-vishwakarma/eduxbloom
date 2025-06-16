@extends('layouts.app')
@section('title', 'EduX | College list')
@section('content')
    <main class="main-content-user">
        <section class="user-list-section">
            <!-- Create Button (Top) -->
            <button class="btncreate" onclick="window.location.href='{{ route('colleges.create') }}'">+ Create College</button>

            <table id="city-list" class="user-list-table">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>College Name</th>
                        <th>City Name</th>
                        <th>Zone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colleges as $college)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                            <td>{{ $college->name }}</td>
                            <td>{{ $college->city }}</td>
                            <td>{{ $college->zone }}</td>
                            <td>
                                <button class="btnuser view-user-btn" onclick="openViewModal({{ $college->id }})">View</button>
                                <a href="{{ route('colleges.edit', $college->id) }}">
                                    <button class="btnuser edit-user-btn">Edit</button>
                                </a>
                                <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $college->id }})">Delete</button>
                                <form id="deleteForm{{ $college->id }}" action="{{ route('college.delete', $college->id) }}" method="POST" style="display:none;">
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

    <!-- Modal for view college details -->
    <div id="userDetailsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <i class="fas fa-university"></i>
            <h2>College Details</h2>
            <div id="userDetails">
                <!-- Dynamic content will be injected here -->
            </div>
        </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDeleteModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this college?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const APP_URL = "{{ url('/') }}";

        // Open View Modal and Inject college Details
        function openViewModal(collegeId) {
            const collegeDetailsContainer = document.getElementById('userDetails');
            
            // Show spinner while loading
            collegeDetailsContainer.innerHTML = `
                <div class="spinner-container">
                    <div class="spinner"></div>
                </div>
            `;
            
            fetch(`${APP_URL}/colleges/${collegeId}`)
                .then(response => response.json())
                .then(college => {
                    const details = `
                        <p><strong>College Name:</strong> ${college.name}</p>
                        <p><strong>City Name:</strong> ${college.city}</p>
                        <p><strong>Zone:</strong> ${college.zone}</p>
                    `;
                    collegeDetailsContainer.innerHTML = details;
                })
                .catch(error => {
                    console.error("Error fetching college data:", error);
                    collegeDetailsContainer.innerHTML = `<p>Error loading college details. Please try again later.</p>`;
                });
            
            // Show the modal
            document.getElementById('userDetailsModal').style.display = 'block';
        }

        // Close View Modal
        function closeViewModal() {
            document.getElementById('userDetailsModal').style.display = 'none';
        }

        // Open Delete Modal for college
        function openDeleteModal(collegeId) {
            window.collegeIdToDelete = collegeId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Confirm Delete
        function confirmDelete() {
            const collegeId = window.collegeIdToDelete;
            const deleteForm = document.getElementById(`deleteForm${collegeId}`);
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
