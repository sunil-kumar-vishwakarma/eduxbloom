@extends('layouts.app')

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('css/category.css') }}">

<div class="smj-category-page">
    <div class="smj-page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="smj-page-title">Manage Categories</h1>
        <button class="smj-btn smj-btn-primary" onclick="openModal('createModal')">
            <i class="fa fa-plus mr-2"></i> Add Category
        </button>
    </div>

    <!-- Table -->
    <div class="user-table-wrapper">
        <table id="categoryTable" class="subscription-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Technology</td>
                    <td>
                        <button class="btn-edit" onclick="openEditModal(1, 'Technology')">Edit</button>
                        <button class="btn-delete" onclick="openDeleteModal(1)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Design</td>
                    <td>
                        <button class="btn-edit" onclick="openEditModal(2, 'Design')">Edit</button>
                        <button class="btn-delete" onclick="openDeleteModal(2)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="smj-modal-overlay" id="createModal">
    <div class="smj-modal">
        <div class="smj-modal-header">
            <h3 class="smj-modal-title">Create Category</h3>
            <button class="smj-modal-close" onclick="closeModal('createModal')">&times;</button>
        </div>
        <form class="smj-modal-body" id="createForm">
            <input type="text" name="category" placeholder="Category Name" required class="smj-form-input">
        </form>
        <div class="smj-modal-footer">
            <button type="submit" form="createForm" class="smj-btn smj-btn-primary">Create</button>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="smj-modal-overlay" id="editModal">
    <div class="smj-modal">
        <div class="smj-modal-header">
            <h3 class="smj-modal-title">Edit Category</h3>
            <button class="smj-modal-close" onclick="closeModal('editModal')">&times;</button>
        </div>
        <form class="smj-modal-body" id="editForm">
            <input type="text" id="editCategoryName" name="category" placeholder="Category Name" required class="smj-form-input">
        </form>
        <div class="smj-modal-footer">
            <button type="submit" form="editForm" class="smj-btn smj-btn-primary">Update</button>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeDeleteModal()">&times;</span>
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h3>Are you sure you want to delete this category?</h3>
        <div class="modal-buttons">
            <button type="button" class="confirm-delete-btn" onclick="confirmDelete()">Yes, Delete</button>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#categoryTable').DataTable({
            searching: false,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            columnDefs: [
                { orderable: false, targets: 2 } // Fix: only 3 columns
            ]
        });
    });

    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }

    function openEditModal(id, category) {
        document.getElementById('editCategoryName').value = category;
        openModal('editModal');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    function confirmDelete() {
        alert("Category deleted successfully.");
        closeDeleteModal();
    }

    // Optional: close modal on outside click
    document.querySelectorAll('.smj-modal-overlay').forEach(modal => {
        modal.addEventListener('click', e => {
            if (e.target === modal) closeModal(modal.id);
        });
    });
</script>
@endsection
