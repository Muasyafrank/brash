<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostels in Bomas</title>
  <link rel="stylesheet" href="accommodation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"/>
</head>

<body>
  <header>
    <nav>
        <div class="nav-header">
          <div class="nav-logo">
            <a href="#">B.R.A.S.H</a>
          </div>
          <!-- <div class="nav-menu-btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>   -->
        </div>
        <ul class="nav-links" id="nav_links">
            <li><a href="#">Home</a></li>
            <li><a href="accommodation.php">Accommodation</a></li>
            <li><a href="shop.php">Shops</a></li>
            <li><a href="#emergency">Emergency</a></li>
            <li><a href="#health">Health</a></li>
            <li>
            <div class="search-container">
        <input type="text" id="globalSearch" placeholder="Search hostel...">
        <button id="searchButton">Search</button>
            </li>
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
<!-- <div class="conta"> -->
  
<section class="banner" id="accommodation">
  <div class="section-container banner-container" data-hostel-id="maisha">

  <div class="banner-image">
      <img src="maisha.jpeg" alt="">
  </div>
  <div class="banner-content">
      <h2 class="section_header">Maisha Hostels</h2>
      <p>
          Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
          from single rooms to spacious bed sitters.We have options to suit your needs and budget.
      </p>
      <div class="banner-btn">
          <button class="view-more-button" data-hostel-id="maisha">View More
              <span><i class="ri-arrow-right-line"></i></span>
          </button>
      </div>
  </div>
  </div>
</section>

<section class="section-container customer-container" data-hostel-id="laduvet">
  <div class="customer-image" >
      <img src="LaDuvet.jpeg" alt="">
  </div>
  <div class="shop-content" >
      <h2 class="section_header">
          LaDuvet Hostels
      </h2>
      <p>
        Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
        from single rooms to spacious bed sitters.We have options to suit your needs and budget.
         </p>
      <div class="shop-btn">
          <button class="view-more-button" data-hostel-id="laduvet">View More
              <span><i class="ri-arrow-right-line"></i></span>
          </button>
      </div>
  </div>
</section>



<section class="banner" id="accommodation">
  <div class="section-container banner-container" data-hostel-id="catholic">

  <div class="banner-image">
      <img src="caholic.jpeg" alt="">
  </div>
  <div class="banner-content">
      <h2 class="section_header">Catholic Hostels</h2>
      <p>
          Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
          from single rooms to spacious bed sitters.We have options to suit your needs and budget.
      </p>
      <div class="banner-btn">
          <button class="view-more-button" data-hostel-id="catholic">View More
              <span><i class="ri-arrow-right-line"></i></span>
          </button>
      </div>
  </div>
  </div>
</section>


  
<section class="section-container customer-container" data-hostel-id="mimshark">
  <div class="customer-image" >
      <img src="mimshark.jpeg" alt="">
  </div>
  <div class="shop-content" >
      <h2 class="section_header">
          Mimshark Hostels
      </h2>
      <p>
         Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
        from single rooms to spacious bed sitters.We have options to suit your needs and budget.
        </p>
      <div class="shop-btn">
          <button class="view-more-button" data-hostel-id="mimshark">View More
              <span><i class="ri-arrow-right-line"></i></span>
          </button>
      </div>
  </div>
</section>


<section   class="banner " id="accommodation">
  <div class="section-container banner-container" data-hostel-id="baraka">

  <div class="banner-image">
      <img src="baraka.jpeg" alt="">
  </div>
  <div class="banner-content">
      <h2 class="section_header">Baraka Hostels</h2>
      <p>
          Loooking for a comfortable place to stay? Explore a variety of rental houses ranging
          from single rooms to spacious bed sitters.We have options to suit your needs and budget.
      </p>
      <div class="banner-btn">
          <button class="view-more-button" data-hostel-id="baraka">View More
              <span><i class="ri-arrow-right-line"></i></span>
          </button>
      </div>
  </div>
  </div>
</section>

</div>


    <!-- Modal -->
    <div id="hostelModal" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle"></h2>
            <p id="modalDescription"></p>
            <p id="modalAmenities"></p>
            <p id="modalCharges"></p>
            <button id="bookButton" class="book-button" data-hostel-name="">Book</button>
        </div>
    </div>

    <!-- Booking Form -->
    <div id="bookingForm" class="booking-form hidden">
        <h2>Book Your Stay</h2>
        <form action="process_booking.php" method="POST">
            <label for="hostelName">Hostel Name:</label>
            <input type="text" id="hostelName" name="hostelName" readonly>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <button type="submit" class="submit-button">Submit</button>
            <button type="button" class="close-button">Cancel</button>
        </form>
    </div>

    <footer>
        <p>&copy; Bomas Residential Area Service Hub. All Rights Reserved.</p>
    </footer>

    <script src="accommodation.js"></script>
</body>
</html>