document.addEventListener('DOMContentLoaded', function () {
    const viewMoreButtons = document.querySelectorAll('.view-more-button');
    const modal = document.getElementById('shopModal');
    const closeBtn = document.querySelector('.close');
    document.getElementById('shopModal').classList.remove('hidden');

    // Define shop data (replace this with dynamic data from a backend)
    const shops = {
        'ezekiel-general': {
            title: 'Zawadi General Shop',
            products: [
                { name: 'Rice', price: 'Ksh130 per Kg', description: 'High-quality rice, perfect for everyday meals.' },
                { name: 'Sugar', price: 'Ksh200 per Kg', description: 'Pure cane sugar, sweeten your day!' }

            ],
            contactInfo: {
                phone: '+254 789 000 235',
                email: 'zawadigeneral@gmail.com'
            }
        },
        'ezekiels-general': {
            title: "Ezekiel's General Shop",
            products: [
                { name: 'Flour', price: 'Ksh 90 per kg', description: 'Freshly milled flour for baking.' },
                { name: 'Oil', price: 'Ksh 150 per Litre', description: 'Healthy cooking oil, rich in nutrients.' }
            ],
            contactInfo: {
                phone: '+254 765 432 010',
                email: 'ezekielsgeneral@gmail.com'
            }
        },
        'mwangaza-general': {
            title: 'Mwangaza General Shop',
            products: [
                { name: 'Salt', price: 'ksh  50', description: 'Iodized salt, essential for your diet.' },
                { name: 'Spices', price: 'Ksh 100', description: 'A variety of spices to enhance your dishes.' }
            ],
            contactInfo: {
                phone: '+254 765 999 010',
                email: 'mwangazageneral@gmail.com'
            }
        },
        'mzito-general': {
            title: 'Mzito General Shop',
            products: [
                { name: 'Bread', price: 'Ksh 60', description: 'Freshly baked bread daily.' },
                { name: 'Milk', price: 'Ksh 50 per litre', description: 'Organic milk, rich in calcium.' }
            ],
            contactInfo: {
                phone: '+254 765 432 034',
                email: 'mzitogeneral@gmail.com'
            }
        }
    };

    // Open the modal when "View More" is clicked
    viewMoreButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default behavior
            const shopId = button.getAttribute('data-shop-id');
            const shopData = shops[shopId];

            if (shopData) {
                // Populate modal with shop details
                document.getElementById('modalTitle').textContent = shopData.title;

                // Clear previous product listings
                const modalProducts = document.getElementById('modalProducts');
                modalProducts.innerHTML = '';

                // Display products
                shopData.products.forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.className = 'product';
                    productDiv.innerHTML = `
                        <strong>${product.name}</strong> - ${product.price}<br>
                        ${product.description}<br><br>
                        ${product.more}<br><br>
                    `;
                    modalProducts.appendChild(productDiv);
                });

                // Display contact information
                const modalContactInfo = document.getElementById('modalContactInfo');
                modalContactInfo.innerHTML = `
                    <strong>Contact Information:</strong><br>
                    Phone: ${shopData.contactInfo.phone}<br>
                    Email: ${shopData.contactInfo.email}
                `;

                // Show the modal
                modal.classList.remove('hidden');
            } else {
                console.error(`Shop ID "${shopId}" not found in the shops object.`);
                alert("An error occurred while loading the shop details.");
            }
        });
    });

    // Close the modal when the close button is clicked
    closeBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
    });
});