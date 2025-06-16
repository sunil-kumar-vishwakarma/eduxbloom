@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/roles&permission.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />

    <main class="main-content-user">
        <section class="user-list-section">
            <!-- Create Button (Top) -->
            <button class="btncreate" onclick="window.location.href='{{ route('roles_permission.create') }}'">+ Create New Role</button>

            <table id="city-list" class="user-list-table">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Role Name</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($roles) && count($roles))
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at }}</td>
                            
                            <td>
                                 <a href="{{ route('roles_permission.edit', $role->id) }}">
                                    <button class="btnuser edit-user-btn">Edit</button>
                                </a>
                                <button class="btnuser delete-user-btn" onclick="openDeleteModal({{ $role->id }})">Delete</button>
                                <form id="deleteForm{{ $role->id }}" action="{{ route('roles_permission.destroy', $role->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <!-- <p>No roles found.</p> -->
                    @endif
                </tbody>
            </table>
        </section>
    </main>



    <script>
        function selectAll(button) {
            const checkboxes = button.closest('.perm-box').querySelectorAll('input[type="checkbox"]');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);

            checkboxes.forEach(cb => cb.checked = !allChecked);
            button.textContent = allChecked ? 'Select All' : 'Unselect All';
        }
    </script>
@endsection
