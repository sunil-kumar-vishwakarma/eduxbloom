@extends('layouts.app')
@section('title', 'EduX | City list')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EduX Admin - City List</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://kit.fontawesome.com/abfa72270d.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <!-- User List -->
        <main class="main-content-user">
            <section class="user-list-section">
                <!-- Create Button (Top) -->
                <button class="btncreate" onclick="window.location.href='{{ route('cities.create') }}'">+ Create
                    City</button>

                <table id="city-list" class="user-list-table">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>City Name</th>
                            <th>Zone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $index => $city)
                            <tr data-city-id="{{ $city->id }}">
                                <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->zone }}</td>
                                <td>
                                    <button class="btnuser view-user-btn" onclick="openViewModal({{ $city->id }})">View</button>
                                    <a href="{{ route('cities.edit', $city->id) }}">
                                        <button class="btnuser edit-user-btn">Edit</button>
                                    </a>
                                    <button class="btnuser delete-user-btn"
                                        onclick="openDeleteModal({{ $city->id }})">Delete</button>
                                    <form id="deleteForm{{ $city->id }}" action="{{ route('city.delete', $city->id) }}"
                                        method="POST" style="display:none;">
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

        <!-- Modal for view city details -->
        <div id="userDetailsModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close-btn" onclick="closeViewModal()">&times;</span>
                <i class="fa-solid fa-city"></i>
                <h2>City Details</h2>
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
                <h3>Are you sure you want to delete this city?</h3>
                <div class="modal-buttons">
                    <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection

@section('scripts')
    <script>
     
        
// Function to update serial numbers dynamically
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#city-list tbody tr");
    rows.forEach((row, index) => {
        const serialCell = row.querySelector("td:first-child");
        serialCell.textContent = index + 1; // Update serial number
    });
}

// Open View Modal and Inject City Details
const APP_URL = "{{ url('/') }}";
function openViewModal(cityId) {
    const cityDetailsContainer = document.getElementById('userDetails');

    // Show spinner while loading
    cityDetailsContainer.innerHTML = `
        <div class="spinner-container">
            <div class="spinner"></div>
        </div>
    `;

    // Fetch city details from the server
fetch(`${APP_URL}/cities/${cityId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(city => {
            // Check if city data is returned correctly
            const details = `
                <p><strong>City Name:</strong> ${city.name}</p>
                <p><strong>Zone:</strong> ${city.zone}</p>
            `;
            cityDetailsContainer.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching city data:", error);
            cityDetailsContainer.innerHTML = `<p>Error loading city details. Please try again later.</p>`;
        });

    // Show the modal
    document.getElementById('userDetailsModal').style.display = 'block';
}



// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}


// Open Delete Modal for City
function openDeleteModal(cityId) {
    // Store the city ID for deletion
    window.cityIdToDelete = cityId;
    document.getElementById('deleteModal').style.display = 'block';
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

// Confirm Delete for City
function confirmDelete() {
    const cityId = window.cityIdToDelete;

    // Trigger the deletion via form submission
    const deleteForm = document.getElementById(`deleteForm${cityId}`);
    deleteForm.submit();
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
