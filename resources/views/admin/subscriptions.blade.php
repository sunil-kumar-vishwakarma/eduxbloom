@extends('layouts.app')
@section('title', 'EduX | Subscriptions')
@section('content')
    <div class="main-content1">
        <main class="subscription-plans">
            <table class="subscription-table">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Subscription Name</th>
                        <th>Category</th>
                        <th>Features</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriptions as $index => $subscription)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $subscription->name }}</td>
                            <td>{{ $subscription->category }}</td>
                            <td>{{ $subscription->features }}</td>
                            <td>{{ $subscription->price }}</td>
                            <td>
                                <button class="subscription-toggle-status btn {{ $subscription->status === 'Active' ? 'btn-success' : 'btn-danger' }}" 
                                    data-id="{{ $subscription->id }}" data-status="{{ $subscription->status }}">
                                    {{ $subscription->status }}
                                </button>
                            </td>
                            <td>
                                <button class="btnuser view-user-btn"
                                    onclick="viewSubscriptionDetails({{ $subscription->id }})">View</button>
                                <button class="btnuser delete-user-btn"
                                    onclick="openDeleteModal({{ $subscription->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h3>Are you sure you want to delete this subscription?</h3>
            <div class="modal-buttons">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="confirm-delete-btn">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Subscription Details Modal -->
    <div id="subscriptionDetailsModal" class="modal1">
        <div class="modal-content-view">
            <span class="close-btn" onclick="closeSubscriptionDetailsModal()">&times;</span>
            <div class="modal-icon1">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <h2>Subscription Plan Details</h2>
            <div id="subscriptionDetails"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function viewSubscriptionDetails(subscriptionId) {
            const subscriptionDetails = document.getElementById('subscriptionDetails');
            subscriptionDetails.innerHTML = `<div class="spinner-container"><div class="spinner"></div></div>`;

            fetch("{{ url('/subscriptions') }}/" + subscriptionId)
                .then(response => response.json())
                .then(data => {
                    if (data.subscription) {
                        subscriptionDetails.innerHTML = `
                            <p><strong>Name:</strong> ${data.subscription.name}</p>
                            <p><strong>Category:</strong> ${data.subscription.category}</p>
                            <p><strong>Features:</strong> ${data.subscription.features}</p>
                            <p><strong>Price:</strong> ${data.subscription.price}</p>
                            <p><strong>Status:</strong> ${data.subscription.status}</p>
                        `;
                    } else {
                        subscriptionDetails.innerHTML = `<p>Error: Unable to fetch subscription details.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching subscription details:', error);
                    subscriptionDetails.innerHTML = `<p>An error occurred while fetching the details.</p>`;
                });

            document.getElementById('subscriptionDetailsModal').style.display = 'block';
        }

        function openDeleteModal(subscriptionId) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = "{{ url('/subscriptions') }}/" + subscriptionId;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function closeSubscriptionDetailsModal() {
            document.getElementById('subscriptionDetailsModal').style.display = 'none';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const subscriptionStatusButtons = document.querySelectorAll(".subscription-toggle-status");

            subscriptionStatusButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    const buttonElement = this;
                    const id = buttonElement.dataset.id;
                    const currentStatus = buttonElement.dataset.status;
                    const newStatus = currentStatus === "Active" ? "Inactive" : "Active";

                    fetch("{{ url('/update-status/subscription') }}/" + id, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            buttonElement.textContent = newStatus;
                            buttonElement.dataset.status = newStatus;

                            if (newStatus === "Active") {
                                buttonElement.classList.remove("btn-danger");
                                buttonElement.classList.add("btn-success");
                            } else {
                                buttonElement.classList.remove("btn-success");
                                buttonElement.classList.add("btn-danger");
                            }
                        } else {
                            alert("Failed to update status.");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("An error occurred while updating the status.");
                    });
                });
            });
        });
    </script>
@endsection

<style>
    .btn-success { background-color: #0da631; color: white; }
    .btn-danger { background-color: rgb(188, 24, 24); color: white; }
    .spinner-container { display: flex; justify-content: center; align-items: center; height: 100px; }
    .spinner {
        width: 40px; height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>
