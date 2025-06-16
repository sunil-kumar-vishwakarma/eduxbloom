
// Function to reassign serial numbers
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#city-list tbody tr");
    rows.forEach((row, index) => {
        const serialCell = row.querySelector("td:first-child");
        serialCell.textContent = index + 1; // Update serial number
    });
}



// Open View Modal and Inject college Details
function openViewModal(collegeId) {
    const collegeDetailsContainer = document.getElementById('userDetails');

    // Show spinner while loading
    collegeDetailsContainer.innerHTML = `
    <div class="spinner-container">
        <div class="spinner"></div>
    </div>
`;

    fetch(`/admin/colleges/${collegeId}`)
        .then(response => response.json())
        .then(college => {
            const details = `
            <p><strong>College Name:</strong> ${college.name}</p>
            <p><strong>City Name:</strong> ${college.city}</p>
            <p><strong>Zone:</strong> ${college.zone}</p>
        `;
            collegeDetailsContainer.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching college data:", error);
            collegeDetailsContainer.innerHTML = `<p>Error loading college details. Please try again later.</p>`;
        });

    // Show the modal
    document.getElementById('userDetailsModal').style.display = 'block';
}

// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}

// Open Delete Modal for college
// Open Delete Modal
function openDeleteModal(collegeId) {
    window.collegeIdToDelete = collegeId;
    document.getElementById('deleteModal').style.display = 'block';
}

// Confirm Delete
function confirmDelete() {
    const collegeId = window.collegeIdToDelete;

    // Trigger the deletion via form submission
    const deleteForm = document.getElementById(`deleteForm${collegeId}`);
    if (deleteForm) {
        deleteForm.submit();
    }
}


// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}
