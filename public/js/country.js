// Function to update serial numbers dynamically
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#city-list tbody tr");
    rows.forEach((row, index) => {
        const serialCell = row.querySelector("td:first-child");
        serialCell.textContent = index + 1; // Update serial number
    });
}


// Open View Modal and Inject country Details
function openViewModal(countryId) {
    const countryDetailsContainer = document.getElementById('userDetails');

    // Show spinner while loading
    countryDetailsContainer.innerHTML = `
    <div class="spinner-container">
        <div class="spinner"></div>
    </div>
`;

    fetch(`/admin/countries/${countryId}`)
        .then(response => response.json())
        .then(country => {
            const details = `
            <p><strong>country Name:</strong> ${country.name}</p>
            <p><strong>City Name:</strong> ${country.city}</p>
        `;
            countryDetailsContainer.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching country data:", error);
            countryDetailsContainer.innerHTML = `<p>Error loading country details. Please try again later.</p>`;
        });

    // Show the modal
    document.getElementById('userDetailsModal').style.display = 'block';
}

// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}

// Open Delete Modal for country
function openDeleteModal(countryId) {
    // Store the country ID for deletion
    window.countryIdToDelete = countryId;
    document.getElementById('deleteModal').style.display = 'block';
}

// Confirm Delete
function confirmDelete() {
    const countryId = window.countryIdToDelete;

    // Trigger the deletion via form submission
    const deleteForm = document.getElementById(`deleteForm${countryId}`);
    if (deleteForm) {
        deleteForm.submit();
    }
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

