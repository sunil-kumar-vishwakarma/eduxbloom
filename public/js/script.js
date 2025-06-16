document.addEventListener('DOMContentLoaded', function () {
    // Function to toggle dropdown menus
    function toggleDropdown(event) {
        const dropdown = event.target.closest('.menu-item.dropdown');
        if (dropdown) {
            // Close all other open dropdowns
            document.querySelectorAll('.menu-item.dropdown.open').forEach(item => {
                if (item !== dropdown) {
                    item.classList.remove('open');
                }
            });

            // Toggle the clicked dropdown
            dropdown.classList.toggle('open');
        }
    }

    // Function to set the active menu item
    function setActiveMenuItem() {
        const sidebarLinks = document.querySelectorAll('.sidebar-menu .menu-item a');
        const currentPage = window.location.pathname;

        // Remove 'active' class from all menu items
        sidebarLinks.forEach(link => {
            link.closest('.menu-item').classList.remove('active');
        });

        // Add 'active' class to the correct menu item based on the current page
        sidebarLinks.forEach(link => {
            if (currentPage.includes(link.getAttribute('href'))) {
                link.closest('.menu-item').classList.add('active');
            }
        });
    }

    // Sidebar toggle functionality
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('collapsed');
        });
    }

    // Update active menu item on page load
    setActiveMenuItem();

    // Update active menu item on click (when navigating through links)
    const sidebarLinks = document.querySelectorAll('.sidebar-menu .menu-item a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', () => setActiveMenuItem());
    });

    // Entity-type dropdown handling
    const entityType = document.getElementById('entity-type');
    if (entityType) {
        entityType.addEventListener('change', function () {
            // Hide all fields
            document.querySelectorAll('.entity-fields').forEach(field => {
                field.style.display = 'none';
            });

            // Show selected entity fields
            const selectedEntity = this.value;
            const entityFields = document.getElementById(selectedEntity + '-fields');
            if (entityFields) {
                entityFields.style.display = 'block';
            }
        });
    }

    // Handle dropdown clicks
    const sidebarMenu = document.querySelector('.sidebar-menu');
    if (sidebarMenu) {
        sidebarMenu.addEventListener('click', function (event) {
            toggleDropdown(event);
        });
    }
});

const button = document.getElementById('myButton');
console.log(button);  // Check if the element is found

if (button) { 
    button.addEventListener('click', function() {
        alert('Button clicked!');
    });
} else {
    console.log('Button not found');
}


