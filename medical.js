document.getElementById('appointmentForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Prevent default form submission

    // Collect form data
    const formData = {
        first_name: document.getElementById('firstName').value.trim(),
        last_name: document.getElementById('lastName').value.trim(),
        address: document.getElementById('address').value.trim(),
        phone: document.getElementById('phoneNo').value.trim()
    };

    // Validate form data on the frontend
    if (!formData.first_name || !formData.last_name || !formData.address || !formData.phone) {
        alert("All fields are required.");
        return;
    }

    // Send the data via AJAX
    try {
        const response = await fetch('book_appointment.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData) // Send data as JSON
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const result = await response.json();
        if (result.status === 'success') {
            alert(result.message);
            this.reset(); // Reset the form
        } else {
            alert(result.message || "Failed to book appointment.");
        }
    } catch (error) {
        console.error("Error booking appointment:", error);
        alert("An error occurred while booking the appointment.");
    }
});