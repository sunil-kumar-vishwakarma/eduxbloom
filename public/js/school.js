
// Function to reassign serial numbers
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#city-list tbody tr");
    rows.forEach((row, index) => {
        const serialCell = row.querySelector("td:first-child");
        serialCell.textContent = index + 1; // Update serial number
    });
}



// Open View Modal and Inject school Details
function openViewModal(schoolId) {
    const schoolDetailsContainer = document.getElementById('userDetails');

    // Show spinner while loading
    schoolDetailsContainer.innerHTML = `
    <div class="spinner-container">
        <div class="spinner"></div>
    </div>
`;

    fetch(`/admin/schools/${schoolId}`)
        .then(response => response.json())
        .then(school => {
            const details = `
            <p><strong>School Name:</strong> ${school.name}</p>
            <p><strong>City Name:</strong> ${school.city}</p>
            <p><strong>Zone:</strong> ${school.zone}</p>
        `;
            schoolDetailsContainer.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching school data:", error);
            schoolDetailsContainer.innerHTML = `<p>Error loading school details. Please try again later.</p>`;
        });

    // Show the modal
    document.getElementById('userDetailsModal').style.display = 'block';
}

// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}

// Open Delete Modal for school
function openDeleteModal(schoolId) {
    window.schoolIdToDelete = schoolId;
    document.getElementById('deleteModal').style.display = 'block';
}

function confirmDelete() {
    const schoolId = window.schoolIdToDelete;

    // Trigger the deletion via form submission
    const deleteForm = document.getElementById(`deleteForm${schoolId}`);
    if (deleteForm) {
        deleteForm.submit();
    }
}



// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}
