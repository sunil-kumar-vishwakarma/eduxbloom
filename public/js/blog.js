   // Open Delete Modal
   function openDeleteModal(blogId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/blogs/${blogId}`;
    document.getElementById('deleteModal').style.display = 'block';
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

// Open View Modal
function openViewModal(blogId) {
    const blogDetails = document.getElementById('blogDetails');
    const viewModal = document.getElementById('viewModal');

    // Show modal with loading spinner
    blogDetails.innerHTML = `
<div class="spinner-container">
    <div class="spinner"></div>
</div>
`;

    // Display the modal
    viewModal.style.display = 'block';
    viewModal.style.opacity = 0;
    setTimeout(() => {
        viewModal.style.opacity = 1;
    }, 100);

    // Fetch blog details
    fetch(`/blogs/${blogId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch blog details.');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Correct the image path
                let imageUrl = data.blog.image; // Ensure this contains the full URL

                console.log("Image URL:", imageUrl); // Log the URL to check if it's correct

                blogDetails.innerHTML = `
                    <img src="${imageUrl}" alt="Blog Image" class="modal-blog-img" style="height: 150px; border-radius:50px 0;">
                    <h3><strong>Title:</strong>${data.blog.title}</h3>
                    <p><strong>Description:</strong> ${data.blog.description} </p>
                    <p><strong>Category:</strong> ${data.blog.category}</p>
                    <p><strong>Published Date:</strong> ${new Date(data.blog.published_date).toLocaleDateString()}</p>
                    `;

            } else {
                blogDetails.innerHTML = `<p>Error: ${data.message || 'Failed to load blog details.'}</p>`;
            }
        })
        .catch(error => {
            console.error('Error fetching blog data:', error);
            blogDetails.innerHTML =
                `<p>An error occurred while fetching the blog details. Please try again later.</p>`;
        });
}


// Close View Modal with Smooth Animation
function closeViewModal() {
    const viewModal = document.getElementById('viewModal');
    viewModal.style.opacity = 1;
    setTimeout(() => {
        viewModal.style.display = 'none';
        viewModal.style.opacity = 0;
    }, 300);
}

// Toggle blog status
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.toggle-status').forEach(button => {
        button.addEventListener('click', function() {
            const blogId = this.getAttribute('data-id');
            const currentStatus = this.getAttribute('data-status');

            fetch(`/blogs/${blogId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        status: currentStatus
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.textContent = data.newStatus.charAt(0).toUpperCase() + data
                            .newStatus.slice(1);
                        this.setAttribute('data-status', data.newStatus);
                        this.classList.toggle('active');
                        this.classList.toggle('inactive');
                    }
                });
        });
    });
});