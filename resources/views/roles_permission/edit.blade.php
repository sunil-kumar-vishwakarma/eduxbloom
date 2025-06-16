@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/roles&permission.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />


    <div class="role-wrapper">
        <br>
        <div class="role-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Edit</h2>
            <a href="{{ route('roles_permission.index') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back
            </a>
        </div>




        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="input-block">
                <label for="role-name">Role Name</label>
                <input type="text" id="role-name" name="name" value="{{ $role->name }}" required />
            </div>

            <div class="permissions-area">
                <div class="perm-title-row">
                    <h3>Permissions</h3>
                    <input type="text" class="search-input" placeholder="Search permissions..." />
                </div>

                <div class="perm-grid">
                    @foreach ($permissions as $module => $modulePermissions)
                        <div class="perm-box theme-blue">
                            <div class="perm-header">
                                <span>{{ $module }} <span class="perm-count">{{ count($modulePermissions) }}</span></span>
                                <a href="javascript:void(0)" onclick="selectAll(this)">Select All</a>
                            </div>
                            <ul>
                                @foreach ($modulePermissions as $permission)
                                    <li>
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            {{ $permission->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update Role</button>
        </form>

        
    </div>

    <script>
        function selectAll(button) {
            const checkboxes = button.closest('.perm-box').querySelectorAll('input[type="checkbox"]');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);

            checkboxes.forEach(cb => cb.checked = !allChecked);
            button.textContent = allChecked ? 'Select All' : 'Unselect All';
        }
    </script>
@endsection
