<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="shopping.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            width: 50%;
            border-radius: 8px;
            position: relative;
            text-align: center;
        }

        .modal-content img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .modal-content h2,
        .modal-content p {
            margin: 10px 0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Styles for buttons */
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #ff6600;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <section id="header">
        <p class="logo">Boma Residential Service Hub</p>
        <div class="header-text">
            <h1>Welcome to the MarketPlace</h1>
            <p>Get all information your need about the shops in your area</p>
        </div>
        <div id="sideNav">
            <nav>
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="accommodation.php">Accommodation</a></li>
                    <li><a href="shop.php">Shopping</a></li>
                    <li><a href="#">HealthCare</a></li>
                    <li><a href="#">Emergency Contact</a></li>
                </ul>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="menu.png" alt="" id="menu">
        </div>
    </section>

    <!-- shops -->
    <section id="shop">
        <div class="titleText">
            <p>General Shops</p>
        </div>
        <div class="shop-box" id="shop-box"></div>
    </section>

    <div id="modal" class="modal"></div>



    <section id="service">
        <div class="titleText">
            <p>BEAUTY & BARBER SHOPS</p>
        </div>
        <div class="service-box">
            <div class="single-service">
                <img src="barbe.jpg" alt="Fisrt Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>BarberShop</h3>

                    <a href="https://barbershop-dusky.vercel.app/" class="btn">View More</a>
                </div>
            </div>
            <div class="single-service">
                <img src="saloon.jpg" alt="Fisrt Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Beauty shops</h3>
                    <a href="salon.html" class="btn">View More</a>
                </div>
            </div>


        </div>
    </section>
    <section id="footer">
        <div class="social-links">
            <i class="ri-whatsapp-line"></i>
            <i class="ri-twitter-line"></i>
            <i class="ri-instagram-line"></i>
            <i class="ri-messenger-line"></i>
            <p>CopyRight Undefined Barbers</p>
        </div>
    </section>
    <script>

        const sideNav = document.getElementById(`sideNav`);
        const menuBtn = document.getElementById(`menuBtn`);
        const menu = document.getElementById(`menu`);
        const modal = document.getElementById("modal");
        // const modalTitle = document.getElementById("modal-title");
        // const modalDesc = document.getElementById("modal-desc");
        // const modalImg = document.getElementById("modal-img");
        // const modalPrice = document.getElementById("modal-price");
        // const closeModal = document.querySelector(".close-btn");
        const viewMoreButtons = document.querySelectorAll(".view-more");
        const shopName = document.getElementById("shop_name");

        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("view-more")) {
                const shopName = event.target.dataset.name; // Get shop name
                fetchProducts(shopName);
            }
        });

        // Close modal when clicking close button
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("close-btn")) {
                modal.style.display = "none";
            }
        });

        // Close modal when clicking outside content
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
        // Fetch Shops
        function fetchShops() {
            fetch('fetch_shops.php')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const shopBox = document.getElementById("shop-box");
                    shopBox.innerHTML = "";
                    data.forEach(shop => {
                        shopBox.innerHTML += `
                        <div class="single-shop">
                            <img src="shop1.jpg" alt="Fisrt Shop">
                            <div class="overLay"></div>
                            <div class="shop-desc">
                                <h3 id="shop_name">${shop.name}</h3>
                                <!-- <a href="" class="btn">View More</a> -->
                                <button 
                                class="btn view-more" 
                                data-name=${shop.name} 
                                >View More</button>
                            </div>
                        </div>
                       `
                    });
                });
        }

        function fetchProducts(shopId) {
            fetch(`fetch_products.php?shop_id=${4}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const modal = document.getElementById("modal");
                    modal.innerHTML = "";
                    // const modalContent = document.getElementById("modal-content");
                    data.forEach(product => {
                        console.log("product",product.name);
                        modal.innerHTML += `
                        <div id="modal-content" class="modal-content">
                            <span class="close-btn">&times;</span>
                            <h2>${product.name}</h2>
                            <img src="shop1.jpg" alt="${product.name}">
                            <h3>Price:Ksh ${product.price}</h3>
                        </div>
                    `;
                        modal.style.display = "flex";
                    })
                })
                .catch(error => console.error("Error fetching products:", error));
        }

        sideNav.style.right = "-250px";
        menuBtn.onclick = function () {
            if (sideNav.style.right == "-250px") {
                sideNav.style.right = "0"
                menu.src = "close.png";
            }
            else {
                sideNav.style.right = "-250px";
                menu.src = "menu.png"
            }
        }

        // viewMoreButtons.forEach(button => {
        // document.addEventListener("click", function () {
        //     if (event.target.classList.contains("view-more")) {
        //         modalTitle.textContent = this.dataset.name;
        //         modalDesc.textContent = this.dataset.desc;
        //         modalImg.src = this.dataset.img;
        //         modalPrice.textContent = this.dataset.price;
        //         modal.style.display = "flex";
        //     }
        // });
        // });

        // closeModal.addEventListener("click", function () {
        //     modal.style.display = "none";
        // });

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
        document.addEventListener("DOMContentLoaded", fetchShops)
    </script>
</body>

</html>