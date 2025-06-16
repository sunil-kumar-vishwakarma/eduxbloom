@extends('layouts.app')
@section('title', 'EduX | Team list')
@section('content')
    <button class="btncreate" onclick="window.location.href='{{ route('partners.create') }}';">+ Create Team</button>
    <table class="employer-table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Designation</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                {{-- <th>Contact</th>
                <th>Category</th>
                <th>Joined Date</th> --}}
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $partner->designation }}</td>
                    <td>{{ $partner->email }}</td>
                    <!-- <td>{{ $partner->password }}</td> -->
                    {{-- <td>{{ $partner->contact }}</td>
                    <td>{{ $partner->category }}</td>
                    <td>{{ $partner->joined_date->format('d M, Y') }}</td> --}}
                    <td>
                        <button 
                            class="partner-toggle-status btn {{ $partner->status === 'Active' ? 'btn-success' : 'btn-danger' }}" 
                            data-id="{{ $partner->id }}" 
                            data-status="{{ $partner->status }}"
                            onclick="toggleStatus({{ $partner->id }}, '{{ $partner->status }}')">
                            {{ $partner->status }}
                        </button>
                    </td>
                    <td>
                        {{-- <button class="btnuser view-user-btn" onclick="openViewModal({{ $partner->id }})">View</button> --}}
                        <a href="{{ route('partners.edit', $partner->id) }}"><button class="btnuser edit-user-btn">Edit</button></a>
                        <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $partner->id }})">Delete</button>
                        <form id="deleteForm{{ $partner->id }}" action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="submitDelete{{ $partner->id }}"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for view Team details -->
    <div id="userDetailsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <i class="fas fa-handshake icon"></i>
            <h2>Team Details</h2>
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
            <h3>Are you sure you want to delete this Team Member?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        const APP_URL = "{{ url('/') }}";

        function openViewModal(partnerId) {
            const userDetailsContainer = document.getElementById('userDetails');
            userDetailsContainer.innerHTML = `
                <div class="spinner-container">
                    <div class="spinner"></div>
                </div>
            `;

            fetch(`${APP_URL}/partners/${partnerId}`)
                .then(response => response.json())
                .then(partner => {
                    const details = `
                        <p><strong>Full Name:</strong> ${partner.designation}</p>
                        <p><strong>Email:</strong> ${partner.email}</p>
                        <p><strong>Password:</strong> ${partner.password}</p>
                        <p><strong>Contact:</strong> ${partner.contact}</p>
                        <p><strong>Category:</strong> ${partner.category}</p>
                        <p><strong>Joined Date:</strong> ${new Date(partner.joined_date).toLocaleDateString()}</p>
                    `;
                    userDetailsContainer.innerHTML = details;
                })
                .catch(error => {
                    console.error("Error fetching partner data:", error);
                    userDetailsContainer.innerHTML = `<p>Error loading partner details. Please try again later.</p>`;
                });

            document.getElementById('userDetailsModal').style.display = 'block';
        }

        function closeViewModal() {
            document.getElementById('userDetailsModal').style.display = 'none';
        }

        function openDeleteModal(partnerId) {
            window.partnerIdToDelete = partnerId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function confirmDelete() {
            const partnerId = window.partnerIdToDelete;
            document.getElementById('deleteForm' + partnerId).submit();
        }

        function toggleStatus(partnerId, currentStatus) {
            const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
            const url = `${APP_URL}/partners/${partnerId}/toggle-status`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    const button = document.querySelector(`button[data-id="${partnerId}"]`);
                    button.textContent = data.status;
                    button.classList.toggle('btn-success');
                    button.classList.toggle('btn-danger');
                }
            })
            .catch(error => console.error('Error toggling status:', error));
        }
    </script>


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
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection