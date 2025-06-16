@extends('layouts.app')
@section('title', 'EduX | Country list')
@section('content')
    <main class="main-content-user">
        <section class="user-list-section">
            <!-- Create Button (Top) -->
            <button class="btncreate" onclick="window.location.href='{{ route('countries.create') }}'">+ Create Country</button>

            <table id="city-list" class="user-list-table">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Country Name</th>
                        <th>City Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $index => $country)
                        <tr data-country-id="{{ $country->id }}">
                            <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                            <td>{{ $country->name }}</td>
                            <td>{{ $country->city }}</td>
                            <td>
                                <button class="btnuser view-user-btn" onclick="openViewModal({{ $country->id }})">View</button>
                                <a href="{{ route('countries.edit', $country->id) }}">
                                    <button class="btnuser edit-user-btn">Edit</button>
                                </a>
                                <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $country->id }})">Delete</button>
                                <form id="deleteForm{{ $country->id }}" action="{{ route('country.delete', $country->id) }}" method="POST" style="display:none;">
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

    <!-- Modal for view country details -->
    <div id="userDetailsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <i class="ri-global-line"></i>
            <h2>Country Details</h2>
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
            <h3>Are you sure you want to delete this country?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const APP_URL = "{{ url('/') }}";

        // Function to open the View Modal and Inject country details
        function openViewModal(countryId) {
            const countryDetailsContainer = document.getElementById('userDetails');

            // Show spinner while loading
            countryDetailsContainer.innerHTML = `
                <div class="spinner-container">
                    <div class="spinner"></div>
                </div>
            `;

            // Fetch country details from the server
           fetch(`${APP_URL}/countries/${countryId}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(country => {
        // Inject country details into modal
        const details = `
            <p><strong>Country Name:</strong> ${country.name}</p>
            <p><strong>City Name:</strong> ${country.city}</p>
        `;
        countryDetailsContainer.innerHTML = details;
    })
    .catch(error => {
        console.error("Error fetching country data:", error);
        countryDetailsContainer.innerHTML = `<p>Error loading country details. Please try again later.</p>`;
    });


            // Show the modal
            document.getElementById('userDetailsModal').style.display = 'block';
        }

        // Function to close the View Modal
        function closeViewModal() {
            document.getElementById('userDetailsModal').style.display = 'none';
        }

        // Open Delete Modal for country
        function openDeleteModal(countryId) {
            // Store the country ID for deletion
            window.countryIdToDelete = countryId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Close Delete Modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Confirm Delete for country
        function confirmDelete() {
            const countryId = window.countryIdToDelete;

            // Trigger the deletion via form submission
            const deleteForm = document.getElementById(`deleteForm${countryId}`);
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
