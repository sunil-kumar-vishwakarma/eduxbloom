@extends('layouts.app')
@section('title', 'EduX | Team list')
@section('content')

<div class="container" style="padding: 10px;">
<div class="row">
<div>
    <h2>Consultation Booking</h2>
</div>
<div class="col-md-11">

    <table class="employer-table table table-bordered table-striped table-hover" id="booking_table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Booking Date</th> 
                
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($consultationBook as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->full_name }}</td>
                    <td>{{ $booking->email }}</td>
                
                    <td>{{ $booking->phone }}</td>
                    
                    <td>{{ $booking->book_date }}</td>
                   
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $('#booking_table').DataTable({
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100],
    order: [[0, 'asc']], // Default sort on first column
    responsive: true
});
    </script>

@endsection