document.addEventListener("DOMContentLoaded", function () {
    // For Partner Status Toggle
    const partnerStatusButtons = document.querySelectorAll(".partner-toggle-status");

    partnerStatusButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const buttonElement = this;
            const id = buttonElement.dataset.id; // Get Partner ID
            const currentStatus = buttonElement.dataset.status; // Current Status

            const newStatus = currentStatus === "Active" ? "Inactive" : "Active";

            fetch(`/update-status/partner/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ status: newStatus }),
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
                });
        });
    });

    // For Student Status Toggle
    const studentStatusButtons = document.querySelectorAll(".student-toggle-status");

    studentStatusButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const buttonElement = this;
            const id = buttonElement.dataset.id; // Get Student ID
            const currentStatus = buttonElement.dataset.status; // Current Status

            const newStatus = currentStatus === "Active" ? "Inactive" : "Active";

            fetch(`/update-status/student/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ status: newStatus }),
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
                });
        });
    });
});
