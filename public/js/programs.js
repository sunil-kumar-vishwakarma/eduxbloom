 document.addEventListener("DOMContentLoaded", function () {
    // Open modal
    function openModal() {
      document.getElementById("successModal").classList.add("show");
    }

    // Close modal
    function closeModal() {
      document.getElementById("successModal").classList.remove("show");
    }

    // Close modal if clicking outside the modal content
    window.addEventListener("click", function (event) {
      const modal = document.getElementById("successModal");
      if (event.target === modal) {
        closeModal();
      }
    });

    // Toggle accordion panels
    function toggleAccordion(button) {
      const item = button.parentElement;
      const panel = item.querySelector(".accordion-panel");
      const isOpen = item.classList.contains("open");

      // Close all
      document.querySelectorAll(".accordion-item").forEach(el => {
        el.classList.remove("open");
        el.querySelector(".accordion-panel").style.maxHeight = null;
      });

      // Open current if not already open
      if (!isOpen) {
        item.classList.add("open");
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    }

    // Expose functions to global scope for inline onclick
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.toggleAccordion = toggleAccordion;
  });



  function toggleDropdown3() {
    const dropdown = document.getElementById("sortDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";

    document.addEventListener("click", function handleClickOutside(e) {
      if (!e.target.closest(".sort-dropdown-wrapper")) {
        dropdown.style.display = "none";
        document.removeEventListener("click", handleClickOutside);
      }
    });
  }

