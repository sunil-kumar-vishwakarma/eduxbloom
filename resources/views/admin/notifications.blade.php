@extends('layouts.app')
@section('title', 'EduX | Notification')
@section('content')
    <!-- Add/Edit Notification Form -->
    <div id="add-notification-form" class="form-container">
        <h1>Manage Notifications</h1>
        <h2>Add/Edit Notification</h2>
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <label for="title">Notification Title</label>
            <input type="text" id="title" name="title" placeholder="Enter notification title" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter notification message" required></textarea>

            <label for="audience">Audience</label>
            <select id="audience" name="audience" required>
                <option value="all">All Users</option>
                <option value="admins">Admins</option>
                <option value="partners">Edu-x Team</option>
                <option value="users">Users</option>
            </select>

            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>

            <button type="submit">Send Notification</button>
        </form>
    </div>
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped" id="notificationTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Message</th>
                            <th scope="col">Audience</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notifications as $notification)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->message }}</td>
                                <td>{{ $notification->audience }}</td>
                                <td>{{ \Carbon\Carbon::parse($notification->date)->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No notifications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#notificationTable').DataTable({
            "pageLength": 5,         // Number of rows per page
            "lengthChange": false,   // Hide 'Show N entries'
            "ordering": true,        // Enable sorting
            "searching": true,       // Enable search
            "info": true,            // Show 'Showing X of Y'
            "autoWidth": false,      // Prevent auto width issues
            "responsive": true       // Responsive support
        });
    });
</script>


    <style>
        .table thead {
    background-color: #007bff!important;
    color: white;
}
        /* Form Container */
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form Heading */
        .form-container h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        /* Label Styles */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
        }

        /* Input & Textarea Styles */
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
        }


        /* Submit Button Styles */
        button[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Button Hover Effect */
        button[type="submit"]:hover {
            background-color: #4cae4c;
        }

        /* Optional: Light background and subtle shadow */
.container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 20px;
}

/* Table Enhancements */
.table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
}

.table thead {
    background-color: #343a40;
    color: white;
}

.table th, .table td {
    vertical-align: middle !important;
    text-align: left;
    padding: 12px;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

/* Empty row style */
.text-muted {
    font-style: italic;
    color: #888 !important;
}

/* Responsive table container padding fix */
.table-responsive {
    margin-top: 15px;
}

/* Optional: Narrower column widths for better fitting */
th:nth-child(1),
td:nth-child(1) {
    width: 60px;
}
th:nth-child(5),
td:nth-child(5) {
    width: 130px;
}

    </style>
@endsection
