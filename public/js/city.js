
// Function to update serial numbers dynamically
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#city-list tbody tr");
    rows.forEach((row, index) => {
        const serialCell = row.querySelector("td:first-child");
        serialCell.textContent = index + 1; // Update serial number
    });
}


// Open View Modal and Inject City Details
function openViewModal(cityId) {
    const cityDetailsContainer = document.getElementById('userDetails');

    // Show spinner while loading
    cityDetailsContainer.innerHTML = `
    <div class="spinner-container">
        <div class="spinner"></div>
    </div>
`;

    fetch(`/admin/cities/${cityId}`)
        .then(response => response.json())
        .then(city => {
            const details = `
            <p><strong>City Name:</strong> ${city.name}</p>
            <p><strong>Zone:</strong> ${city.zone}</p>
        `;
            cityDetailsContainer.innerHTML = details;
        })
        .catch(error => {
            console.error("Error fetching city data:", error);
            cityDetailsContainer.innerHTML = `<p>Error loading city details. Please try again later.</p>`;
        });

    // Show the modal
    document.getElementById('userDetailsModal').style.display = 'block';
}

// Close View Modal
function closeViewModal() {
    document.getElementById('userDetailsModal').style.display = 'none';
}

// Open Delete Modal for City
function openDeleteModal(cityId) {
    // Store the city ID for deletion
    window.cityIdToDelete = cityId;
    document.getElementById('deleteModal').style.display = 'block';
}

// Close Delete Modal
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

// Confirm Delete for City
function confirmDelete() {
    const cityId = window.cityIdToDelete;

    // Trigger the deletion via form submission
    const deleteForm = document.getElementById(`deleteForm${cityId}`);
    deleteForm.submit();
}
