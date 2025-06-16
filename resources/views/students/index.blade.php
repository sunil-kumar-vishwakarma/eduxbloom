@extends('layouts.app')

@section('content')
{{-- <button class="btncreate" onclick="window.location.href='{{ route('students.create') }}';">+ Create Student</button> --}}
<table class="employer-table">
    <thead>
        <tr>
            <th>S No.</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Joined Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->full_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->contact }}</td>
            <td>{{ $student->country }}</td>
            <td>{{ $student->joined_date->format('d M, Y') }}</td>
            <td>
    <button 
        class="student-toggle-status btn {{ $student->status === 'Active' ? 'btn-success' : 'btn-danger' }}" 
        data-id="{{ $student->id }}" 
        data-status="{{ $student->status }}"
        onclick="toggleStatus({{ $student->id }}, '{{ $student->status }}')">
        {{ $student->status }}
    </button>
</td>


            <td>
                <button class="btnuser view-user-btn" onclick="openViewModal({{ $student->id }})">View</button>
                <a href="{{ route('students.edit', $student->id) }}"><button class="btnuser edit-user-btn">Edit</button></a>
                <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $student->id }})">Delete</button>
                  <form id="deleteForm{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}"
                     method="POST" style="display:none;">
                     @csrf
                     @method('DELETE')
                     <button type="submit" id="submitDelete{{ $student->id }}"></button>
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
        <i class="fas fa-graduation-cap icon"></i>
        <h2>Student Details</h2>
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
   function openViewModal(studentId) {
    // Show the modal and reset content to a loading state
    const userDetailsModal = document.getElementById('userDetailsModal');
    const userDetails = document.getElementById('userDetails');
  

    userDetails.innerHTML = `
        <p>Loading student details...</p>
        <div class="spinner"></div>
    `;

    userDetailsModal.style.display = 'block';

    // Fetch student details using AJAX or fetch request
   fetch(`${APP_URL}/students/${studentId}`)
        .then(response => response.json())
        .then(student => {
            // Inject student details into the modal
            const details = `
                <p><strong>Full Name:</strong> ${student.full_name}</p>
                <p><strong>Email:</strong> ${student.email}</p>
                <p><strong>Contact:</strong> ${student.contact}</p>
                <p><strong>Country:</strong> ${student.country}</p>
                <p><strong>Joined Date:</strong> ${new Date(student.joined_date).toLocaleDateString()}</p>
           
            `;
            userDetails.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching student data:", error);
            userDetails.innerHTML = `<p>Error loading student details. Please try again later.</p>`;
        });
}


// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}


   // Open Delete Modal
function openDeleteModal(studentId) {
    // Set the action URL for the delete form dynamically
    const deleteForm = document.getElementById('deleteForm' + studentId); 
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


function toggleStatus(studentId, currentStatus) {
    // Toggle between Active and Inactive
    const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
    const url = `${APP_URL}/students/${studentId}/toggle-status`;

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
            // Update the button text and color
            const button = document.querySelector(`button[data-id="${studentId}"]`);
            button.textContent = data.status;
            button.classList.toggle('btn-success');
            button.classList.toggle('btn-danger');
        }
    })
    .catch(error => console.error('Error toggling status:', error));
}



</script>

<script src="{{ asset('js/script.js') }}"></script>
<!--<script src="{{ asset('js/toggleStatus.js') }}"></script>-->
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

