 <?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.R.A.S.H</title>
    <link rel="icon" href="header.png">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav-header">
              <div class="nav-logo">
                <a href="#">B.R.A.S.H</a>
              </div>
              <div class="nav-menu-btn" id="menu-btn">
                <i class="ri-menu-line"></i>
              </div>  
            </div>
            <ul class="nav-links" id="nav_links">
                <li><a href="#">Home</a></li>
                <li><a href="accommodation.php">Accommodation</a></li>
                <li><a href="shop.php">Shops</a></li>
                <li><a href="EmergencyContacts.html">Emergency</a></li>
                <li><a href="medical.php">Health</a></li>
            </li>
            <li class="nav-link-btn">
                <button class="btn">Sign Up</button>
            </li>
            <li class="nav-link-btn">
                <button class="btn">Sign In</button>
            </li>
            </ul>
            <!-- <div class="nav-btns">
                <a href="index.php" class="btn btn_primary">Sign Up</a>
                <a href="index.php" class="btn btn_secondary">Sign in</a>
            </div> -->
        </nav>     
    </header>
  
<section class="banner" id="accommodation">
    <div class="section-container banner-container">

    <div class="banner-image">
        <img src="accommodation.jpg" alt="">
    </div>
    <div class="banner-content">
        <h2 class="section_header">Accommodation Services</h2>
        <p>
            Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
            from single rooms to spacious bed sitters.We have options to suit your needs and budget.
        </p>
        <div class="banner-btn">
            <a href="accommodation.php" class="Btn">View More
                <span><i class="ri-arrow-right-line"></i></span>
            </a>
        </div>
    </div>
    </div>
</section>

<section class="section-container customer-container" id="shops">
    <div class="customer-image">
        <img src="shops.jpg" alt="">
    </div>
    <div class="shop-content">
        <h2 class="section_header">
            Shops
        </h2>
        <p>Looking for where you can get your products?Explore a 
            variety of Shops.Whether you're 
            looking for everyday essentials,unique local goods 
            or special services,we've got you covered. </p>
        <div class="shop-btn">
            <a href="shopping.php" class="Btn">View More
                <span><i class="ri-arrow-right-line"></i></span>
            </a>
        </div>
    </div>
</section>


<section class="banner" id="cart">
    <div class="section-container banner-container" id="emergency">

    <div class="banner-image">
        <img src="emergency.jpg" alt="">
    </div>
    <div class="banner-content">
        <h2 class="section_header">Emergency Services</h2>
        <p>
           In case of an emergency,quick access to the right services can make all the difference.
           Here you'll find essential contact details for medical assistance,fire emergency,security Services
           and other critical support in our Community.
        </p>
        <div class="banner-btn">
            <a href="EmergencyContacts.html" class="Btn">View More
                <span><i class="ri-arrow-right-line"></i></span>
            </a>
        </div>
    </div>
    </div>
</section>
<section class="section-container customer-container" id="health">
    <div class="customer-image">
        <img src="health.jpg" alt="">
    </div>
    <div class="shop-content">
        <h2 class="section_header">
            Health Services
        </h2>
        <p>
            Access essential healthcare services at your fingertips.Our platform provides up-to-date
            information to ensure you get the help you need when you need it. 
        </p>
        <div class="shop-btn">
            <a href="medical.php" class="Btn">View More
                <span><i class="ri-arrow-right-line"></i></span>
            </a>
        </div>
    </div>
</section>


        <footer>
            <div class="section_container footer_container" >
            </div>
            <div class="section_container footer_bar">
                <h4>B.R.A.S.H</h4>
                <p>
                  Copyright 2025 B.R.A.S.H .All rights reserved.  
                </p>
                <ul class="footer-socials">
                    <li><a href="#"><i class="ri-facebook-circle-fill"></i></a></li>
                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                    <li><a href="#"><i class="ri-tiktok-fill"></i></a></li>
                    <li><a href="#"><i class="ri-whatsapp-line"></i></a></li>
                </ul>
            </div>
        </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="index.js"></script>
    <script>
        const menuBtn = document.getElementById(`menu-btn`);
const navLinks = document.getElementById(`nav_links`);
const menuBtnIcon = document.querySelector(`i`);

menuBtn.addEventListener("click",(e)=> {
    navLinks.classList.toggle("open");
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class",isOpen?"ri-close-line":"ri-menu-line");
})
navLinks.addEventListener("click",(e)=>{
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class","ri-menu-line");
})

const scrollRevealOption = {
    distance:"50px", origin:"bottom",duration:1000,
};
ScrollReveal().reveal(".customer-image img",{
    ...scrollRevealOption,
    origin:"right"
});
ScrollReveal().reveal(".header_content h1",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".header_content p",{
    ...scrollRevealOption,
    delay:1000,
});
ScrollReveal().reveal(".header_links a",{
    ...scrollRevealOption,
    delay:500,
});

ScrollReveal().reveal(".banner-image img",{
    ...scrollRevealOption,
    origin:"left",
});
ScrollReveal().reveal(".section-container  .shop-content",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".service-content  .section_header",{
    ...scrollRevealOption,
    delay:1000,
});

        
    </script>
</body>
</html>