document.addEventListener('DOMContentLoaded', function () {
    const viewMoreButtons = document.querySelectorAll('.view-more-button');
    const modal = document.getElementById('hostelModal');
    const closeBtn = document.querySelector('.close');
    const bookButton = document.getElementById('bookButton');
    const bookingForm = document.getElementById('bookingForm');

    // Define hostel data (you can replace this with dynamic data from a backend)
    const hostels = {
        maisha: {
            title: 'Maisha Hostels',
            description: 'Maisha hostels is designed and built to ensure occupants are safe and comfortable in their residence. It offers some unique features such as: 24/7 Security, a chillout area where occupants can socialize, free Wi-Fi, etc.',
             amenties:"Spacoius Rooms,24/7 security, a chillout area where people can socialize",
            charges:"Ksh 4500 per month"
        },
        catholic: {
            title: 'Catholic Hostels',
            description: 'Catholic hostels provide a peaceful environment for students and visitors. Amenities include prayer rooms, dining facilities, and more.',
             amenties:"24/7 security,An only ladies hostel",
            charges:"Ksh 4000 per month"
        },
        laduvet: { // Add LaDuvet hostel
            title: 'LaDuvet Hostels',
            description: 'LaDuvet hostels provide a cozy and comfortable stay with modern amenities. Enjoy free Wi-Fi, 24/7 security, and a friendly atmosphere.',
            amenities:"Free wifi,Spacious rooms,Free Water",
            charges:"Ksh 4500 per month"
        },
        mimshark: { // Add Mimshark hostel
            title: 'Mimshark Hostels',
            description: 'Mimshark hostels offer a homely experience with excellent facilities. Experience free Wi-Fi, 24/7 security, and a vibrant community.',
            amenities:"Spacoius Rooms,24/7 security",
            charges:"Ksh 4000 per month"
        },
        baraka: {
            title: 'Baraka Hostels',
            description: 'Baraka hostels offer affordable accommodation with modern amenities. Features include 24-hour security, laundry services, and free Wi-Fi.',
             amenities:"Spacoius Rooms,24/7 security",
            charges:"Ksh 4000 per month"
        }
    };

      // Open the modal when "View More" is clicked
      viewMoreButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default behavior of the button
            const hostelId = button.getAttribute('data-hostel-id');
            const hostelData = hostels[hostelId.toLowerCase()]; // Ensure case-insensitivity

            if (hostelData) {
                document.getElementById('modalTitle').textContent = hostelData.title;
                document.getElementById('modalDescription').textContent = hostelData.description;
                document.getElementById(`modalAmenities`).textContent = hostelData.amenities;
                document.getElementById(`modalCharges`).textContent = hostelData.charges;
                bookButton.setAttribute('data-hostel-name', hostelData.title); // Set hostel name for booking
                modal.classList.remove('hidden'); // Show the modal
            } else {
                console.error(`Hostel ID "${hostelId}" not found in the hostels object.`);
                alert("An error occurred while loading the hostel details.");
            }
        });
    });

    // Close the modal when the close button is clicked
    closeBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
    });

    // Handle booking from the modal
    bookButton.addEventListener('click', function () {
        const hostelName = bookButton.getAttribute('data-hostel-name');
        document.getElementById('hostelName').value = hostelName;
        bookingForm.classList.remove('hidden'); // Show the booking form
        modal.classList.add('hidden'); // Hide the modal
    });

    // Close the booking form
    if (bookingForm) {
        const closeBookingForm = bookingForm.querySelector('.close-button');
        closeBookingForm.addEventListener('click', function () {
            bookingForm.classList.add('hidden');
        });
    }

    // Handle form submission using AJAX
    const form = bookingForm.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Collect form data
        const formData = new FormData(form);

        // Send the data via AJAX
        fetch('process_booking.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Show success alert
                alert(data.message);

                // Hide the booking form and reset it
                bookingForm.classList.add('hidden');
                form.reset();
            } else {
                // Show error alert
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred. Please try again.');
        });
    });

    // Search functionality
    const searchInput = document.getElementById('globalSearch');
    const accommodationItems = document.querySelectorAll('.conta');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        accommodationItems.forEach(item => {
            const hostelName = item.querySelector('h2').textContent.toLowerCase();
            if (hostelName.includes(query)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});