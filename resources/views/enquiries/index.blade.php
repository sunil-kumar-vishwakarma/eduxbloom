@extends('layouts.app')
@section('title', 'EduX | Enquiry list ')
@section('content')
    <table class="employer-table">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Country</th>
                <th>Enquiry Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enquiries as $enquiry)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $enquiry->full_name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->contact }}</td>
                    <td>{{ $enquiry->country }}</td>
                    <td>{{ \Carbon\Carbon::parse($enquiry->enquiry_date)->format('d M, Y') }}</td>
                    <td>
                        <button
                            class="enquiry-toggle-status btn {{ $enquiry->status === 'Achieved' ? 'btn-success' : 'btn-danger' }}"
                            data-id="{{ $enquiry->id }}" onclick="toggleStatus({{ $enquiry->id }})">
                            {{ $enquiry->status === 'Achieved' ? 'Achieved' : 'Rejected' }}
                        </button>
                    </td>
                    <td>
                        <button class="btnuser view-user-btn" onclick="openViewModal({{ $enquiry->id }})">View</button>
                        <button class="btnuser delete-user-btn"
                            onclick="openDeleteModal({{ $enquiry->id }})">Delete</button>
                        <form id="deleteForm{{ $enquiry->id }}" action="{{route('enquiries.destroy', $enquiry->id) }}"
                            method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                         <button type="submit" id="submitDelete{{ $enquiry->id }}"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  <!-- Modal for view student details -->
<div id="userDetailsModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeViewModal()">&times;</span>
        <i class="fas fa-file-alt icon"></i>
        <h2>Enquary Details</h2>
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
            <h3>Are you sure you want to delete this student?</h3>
            <div class="modal-buttons">
                <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
                {{-- <button type="button" class="cancel-delete-btn" onclick="closeDeleteModal()">Cancel</button> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const APP_URL = "{{ url('') }}";
      // Open View Modal and Inject Student Details
   function openViewModal(enquiryId) {
    // Show the modal and reset content to a loading state
    const userDetailsModal = document.getElementById('userDetailsModal');
    const userDetails = document.getElementById('userDetails');
    

    userDetails.innerHTML = `
        <p>Loading enquiry details...</p>
        <div class="spinner"></div>
    `;

    userDetailsModal.style.display = 'block';

    // Fetch student details using AJAX or fetch request
   fetch(`${APP_URL}/enquiries/${enquiryId}`)
        .then(response => response.json())
        .then(enquiry => {
            // Inject student details into the modal
             const details = `
                    <p><strong>Full Name:</strong> ${enquiry.full_name}</p>
                    <p><strong>Email:</strong> ${enquiry.email}</p>
                    <p><strong>Contact:</strong> ${enquiry.contact}</p>
                    <p><strong>Country:</strong> ${enquiry.country}</p>
                    <p><strong>Enquiry Date:</strong> ${new Date(enquiry.enquiry_date).toLocaleDateString()}</p>
                `;
                userDetails.innerHTML = details;
            })
       .catch(error => {
                console.error("Error fetching enquiry data:", error);
                userDetails.innerHTML = `<p>Error loading enquiry details. Please try again later.</p>`;
            });

        userDetailsModal.style.display = 'block';
    }

// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}
    
    
    
    // Open Delete Modal
function openDeleteModal(enquiryId) {
    // Set the action URL for the delete form dynamically
    const deleteForm = document.getElementById('deleteForm' + enquiryId); 
    deleteForm.style.display = 'block'; // Make the delete form visible
    document.getElementById('deleteModal').style.display = 'block'; // Show the modal
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
    // Hide the form after closing the modal
    const forms = document.querySelectorAll('form[id^="deleteForm"]');
    forms.forEach(form => {
        form.style.display = 'none';
    });
}

// Confirm Delete
function confirmDelete() {
    const deleteForm = document.querySelector('form[style="display: block;"]');
    if (deleteForm) {
        deleteForm.submit(); // Submit the form to delete the student
    }
}


function toggleStatus(enquiryId) {
    fetch(`${APP_URL}/enquiries/${enquiryId}/toggle-status`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
     }
    })

    .then(response => response.json())
    .then(data => {
        const button = document.querySelector(`button[data-id="${enquiryId}"]`);
        
        // Toggle the button text and color based on status
        if (data.status === 'Achieved') {
            button.textContent = 'Achieved';
            button.classList.remove('btn-danger');
            button.classList.add('btn-success');
        } else {
            button.textContent = 'Rejected';
            button.classList.remove('btn-success');
            button.classList.add('btn-danger');
        }
    })
    .catch(error => {
        console.error('Error toggling status:', error);
    });
}


    </script>
@endsection
<style>
    .confirm-delete-btn {
        background-color: rgb(224, 40, 40);
        color: white;
    }
    .btn-success {
    /* background-color: green; */
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
