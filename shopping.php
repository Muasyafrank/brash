<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="shopp.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Accommodation</a></li>
                    <li><a href="#">Shopping</a></li>
                    <li><a href="#">HealthCare</a></li>
                    <li><a href="#">Emergency Contact</a></li>
                </ul>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="menu.png" alt="" id="menu">
        </div>
    </section>

    <!-- General Shops -->
    <section id="shop">
        <div class="titleText">
            <p>General Shops</p>
        </div>
        <div class="shop-box">
            <div class="single-shop" data-shop-id="ezekiel-general">
                <img src="shop1.jpg" alt="Zawadi's General Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Zawadi General Shop</h3>
                    <a href="#" class="view-more-button" data-shop-id="ezekiel-general">View More</a>
                </div>
            </div>
            <div class="single-shop" data-shop-id="ezekiels-general">
                <img src="shop11.jpg" alt="Ezekiel's General Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Ezekiel's General Shop</h3>
                    <a href="#" class=" view-more-button" data-shop-id="ezekiels-general">View More</a>
                </div>
            </div>
            <div class="single-shop" data-shop-id="mwangaza-general">
                <img src="shop3.jpg" alt="Mwangaza General Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Mwangaza General Shop</h3>
                    <a href="#" class="view-more-button" data-shop-id="mwangaza-general">View More</a>
                </div>
            </div>
            <div class="single-shop" data-shop-id="mzito-general">
                <img src="shop4.jpg" alt="Mzito General Shop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Mzito General Shop</h3>
                    <a href="#" class="view-more-button" data-shop-id="mzito-general">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Beauty & Barber Shops -->
    <section id="service">
        <div class="titleText">
            <p>BEAUTY & BARBER SHOPS</p>
        </div>
        <div class="service-box">
            <div class="single-service">
                <img src="barbe.jpg" alt="BarberShop">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>BarberShop</h3>
                    <a href="https://barbershop-dusky.vercel.app/" class="btn">View More</a>
                </div>
            </div>
            <div class="single-service">
                <img src="saloon.jpg" alt="Beauty Shops">
                <div class="overLay"></div>
                <div class="shop-desc">
                    <h3>Beauty Shops</h3>
                    <a href="salon.html" class="btn">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="shopModal" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle"></h2>
            <div id="modalProducts"></div>
            <div id="modalContactInfo"></div>
        </div>
    </div>

    <!-- Footer -->
    <section id="footer">
        <div class="social-links">
            <i class="ri-whatsapp-line"></i>
            <i class="ri-twitter-line"></i>
            <i class="ri-instagram-line"></i>
            <i class="ri-messenger-line"></i>
            <p>CopyRight Undefined Barbers</p>
        </div>
    </section>

    <script src="sop.js"></script>
    <script>
        const sideNav = document.getElementById('sideNav');
        const menuBtn = document.getElementById('menuBtn');
        const menu = document.getElementById('menu');
        sideNav.style.right = "-250px";

        menuBtn.onclick = function () {
            if (sideNav.style.right == "-250px") {
                sideNav.style.right = "0";
                menu.src = "close.png";
            } else {
                sideNav.style.right = "-250px";
                menu.src = "menu.png";
            }
        };
    </script>
</body>
</html>