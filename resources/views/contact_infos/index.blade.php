@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="btncreate" onclick="window.location.href='{{ route('contact-infos.create') }}';">+ Create</button>

        {{-- <a href="{{ route('contact-infos.create') }}" class="btn btn-primary mb-3">Add New</a> --}}

        <table class="employer-table">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td><i class="{{ $contact->icon_class }}"></i></td>
                        <td>{{ $contact->title }}</td>
                        <td><a href="{{ $contact->link }}" target="_blank">{{ $contact->link_text }}</a></td>
                        <td>{{ $contact->description }}</td>
                        {{-- <td>
                        <a href="{{ route('contact-infos.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('contact-infos.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td> --}}
                        <td>
                            <a href="{{ route('contact-infos.edit', $contact->id) }}">
                                <button class="btnuser edit-user-btn">Edit</button>
                            </a>
                            <button class="btnuser delete-user-btn"
                                onclick="openDeleteModal({{ $contact->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this info?</h3>
            <div class="modal-buttons">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="confirm-delete-btn">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            const modal = document.getElementById('deleteModal');

            if (form && modal) {
                // ✅ Correct route
                form.action = `/contact-infos/${id}`;
                modal.classList.add('show');
                modal.style.display = 'block';
            }
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            if (modal) {
                modal.classList.remove('show');
                modal.style.display = 'none';
            }
        }

        // Optional: Close when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
@endsection
