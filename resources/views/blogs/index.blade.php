@extends('layouts.app')
@section('title', 'EduX | Blogs')
@section('content')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Include DataTable JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <button class="btncreate" onclick="window.location.href='{{ route('create-blog') }}';">+ Create Blog</button>
    <table class="employer-table" id="blogTable">
        <colgroup>
            <col style="width: 7%;"> <!-- S No. -->
            <col style="width: 32%;"> <!-- Images -->
            <col style="width: 25%;"> <!-- Title -->
            <col style="width: 15%;"> <!-- Category -->
            <col style="width: 17%;"> <!-- Published Date -->
            <col style="width: 30%;"> <!-- Description -->
            <col style="width: 14%;"> <!-- Status -->
            <col style="width: 15%;"> <!-- Actions -->
        </colgroup>
        <thead>
            <tr>
                <th>No.</th>
                <th>Images</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('/public/storage/' . $blog->image) }}" alt="Blog Image">
                    </td>
                    <td id="title">{{ $blog->title }}</td>
                    <td>{{ $blog->category }}</td>
                    <td>{{ $blog->published_date->format('d M, Y') }}</td>
                    <td id="description">{{ Str::limit($blog->description, 100, '...') }}</td>
                    <td>
                        <button
                            class="btnuser status-btn toggle-status {{ $blog->status == 'Published' ? 'active' : 'inactive' }}"
                            data-id="{{ $blog->id }}" data-status="{{ $blog->status }}"
                            onclick="toggleStatus({{ $blog->id }}, '{{ $blog->status }}')">
                            {{ ucfirst($blog->status) }}
                        </button>
                    </td>
                    <td>
                        <button class="btnuser view-user-btn" onclick="openViewModal({{ $blog->id }})">View</button>
                        <a href="{{ route('edit-blog', $blog->id) }}"><button
                                class="btnuser edit-user-btn">Edit</button></a>
                        <button class="btnuser delete-user-btn"
                            onclick="openDeleteModal({{ $blog->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for blog details -->
    <div id="viewModal" class="modal1" style="display: none;">
        <div class="modal-content-blog">
            <span class="close-btn" onclick="closeViewModal()">&times;</span>
            <div class="modal-icon1">
                <i class="fa fa-blog"></i>
            </div>
            <h2>Blog Details</h2>
            <div id="blogDetails">
                <!-- Dynamic content will be injected here -->
            </div>
        </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div id="deleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDeleteModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this blog?</h3>
            <div class="modal-buttons">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="confirm-delete-btn">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#blogTable').DataTable({
                paging: true, // Enable pagination
                ordering: true, // Enable column sorting
                info: true, // Hide "Showing X of Y" info
                searching: false, // Hide search box
                lengthChange: false // Hide "Show X entries" dropdown
            });
        });
    </script>

    <script>
        const APP_URL = "{{ url('/') }}";

        // Open View Modal and Fetch Blog Details
        function openViewModal(blogId) {
            const blogDetailsContainer = document.getElementById('blogDetails');

            // Show loading spinner while fetching data
            blogDetailsContainer.innerHTML = `
        <div class="spinner-container">
            <div class="spinner"></div>
        </div>
    `;

            // Fetch the blog data from the server
            fetch(`${APP_URL}/blogs/${blogId}`)
                .then(response => response.json())
                .then(blog => {
                    // Once blog data is fetched, update the modal content
                    const details = `
                <img src="${blog.image}" alt="Blog Image">
                <p><strong>Title:</strong> ${blog.title}</p>
                <p><strong>Category:</strong> ${blog.category}</p>
                <p><strong>Published Date:</strong> ${new Date(blog.published_date).toLocaleDateString()}</p>
                <p><strong>Description:</strong> ${blog.description}</p>
                <p><strong>Status:</strong> ${blog.status}</p>
            `;
                    // Insert the fetched details into the modal content
                    blogDetailsContainer.innerHTML = details;
                })
                .catch(error => {
                    // Handle errors if the fetch fails
                    console.error("Error fetching blog data:", error);
                    blogDetailsContainer.innerHTML = `<p>Error loading blog details. Please try again later.</p>`;
                });

            // Show the modal
            document.getElementById('viewModal').style.display = 'block';
        }

        // Close View Modal
        function closeViewModal() {
            document.getElementById('viewModal').style.display = 'none';
        }

        // Open Delete Modal
        function openDeleteModal(blogId) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `${APP_URL}/blogs/${blogId}`;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Close Delete Modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Toggle Blog Status
        function toggleStatus(blogId, currentStatus) {
            const newStatus = currentStatus === 'Published' ? 'Draft' : 'Published';
            const url = `${APP_URL}/blogs/${blogId}/toggle-status`;

            fetch(url, {
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
                        const button = document.querySelector(`button[data-id="${blogId}"]`);
                        button.textContent = data.status;
                        button.classList.toggle('active');
                        button.classList.toggle('inactive');
                    }
                })
                .catch(error => console.error('Error toggling status:', error));
        }
    </script>
@endsection

<style>
    table {
        width: 100%;
        table-layout: fixed;
        /* Ensures column widths are fixed as defined in <colgroup> */
        border-collapse: collapse;
    }

    th,
    td {
        text-align: left;
        padding: 10px;
        overflow: hidden;
        /* text-overflow: ellipsis; */
        /* Ensures text truncates if it overflows */
        white-space: nowrap;
        /* Prevents text from wrapping */
    }

    th {
        white-space: nowrap;
        overflow: hidden;
        /* text-overflow: ellipsis; */
        max-width: 150px;
        /* Adjust the width as per your requirement */
    }

    td {
        word-wrap: break-word;
        vertical-align: top;
        white-space: normal;
        max-width: 300px;
        /* Adjust this width as needed */
        overflow-wrap: break-word;
    }

    #title,
    #description {
        word-break: break-word;
        hyphens: auto;
    }

    #viewModal .modal-content-blog {
        max-width: 100%;
        max-height: 80vh;
        /* To limit the height */
        overflow: hidden;
        /* Hides the scrollbar but keeps content scrollable */
        padding: 20px;
    }

    #viewModal img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: 150px;
        border-radius: 50px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }


    #viewModal .modal-content-blog p {
        word-wrap: break-word;
        /* To break long words and avoid overflow */
        overflow-wrap: break-word;
    }

    #blogDetails {
        max-height: 400px;
        /* You can adjust the height as per your requirement */
        overflow-y: scroll;
        /* Keeps content scrollable */
    }

    /* Hide the scrollbar */
    #blogDetails::-webkit-scrollbar {
        display: none;
    }

    .modal-content-blog {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }


    .confirm-delete-btn {
        background-color: rgb(224, 40, 40);
        color: white;
    }

    .spinner-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        /* Adjust height based on modal content */
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-top: 4px solid #09f;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
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
