<?php
session_start();
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
</head>
<body>

<?php include 'connection.php';?> <!-- b onnect to db -->


  


<style>
      .nav-item {
        margin-right: 25px;
      }
      .navbar-collapse {
        display: flex;
        justify-content: center;
      }
    </style>
    <!-- Navigation Bar 1 -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/gachi.jpg" alt="Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="HomePage.php">
                        <span>
                            <i class="fa-solid fa-house fa-lg"></i>
                        </span>
                        <span>Home </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.php"> 
                        <span>
                            &nbsp; &nbsp;
                            <i class="fa-sharp fa-regular fa-circle-question fa-lg"></i>
                        </span>
                        <span>help</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><i class="fa-regular fa-circle-user"></i></span>
                        <span>Account</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item nav-link" href="Wishlist.php">Wishlist</a></li>
                        <li><a class="dropdown-item nav-link" href="managebooking.php">Manage Bookings</a></li>
                        <li><a class="dropdown-item nav-link" href="a.php">Account Settting</a></li>
                        <li><a class="dropdown-item nav-link" href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




    <!-- Full Screen Image -->
    <a href="HomePage.php" class="d-block bg-image hover-zoom" data-bs-toggle="popover" data-bs-placement="top" title="Return to Home Page"> </a>
    <style>
      /* Custom CSS */
      .bg-image {
          background-image: url("img/james.jpg");
          background-size: cover;
          background-position: center;
          height: 30vh;
      }
      
  </style>


<h1> Help</h1>
<br>

<h3> Account Setting:  </h3>
The Account Setting page is an important part of any travel-related website or application, as it allows users to manage their personal information and preferences. On this page, users can update their account details, such as their home address, phone number, email address, and payment method. This ensures that their travel bookings are accurate and up-to-date.

In addition to managing their personal information, users can also view their past trips and keep track of their travel history. This feature is particularly useful for frequent travelers who may want to review their travel itineraries, check their booking status, or access their travel receipts for expense reporting purposes.
<br><br>
<h3> Home Page: </h3>
The Home Page is the main landing page of the website or application, and it serves as a gateway to the other pages and features. Typically, the Home Page is designed to be visually appealing and intuitive, with clear navigation and prominent call-to-actions to guide users to the key features of the website.

On the Home Page, users can easily book tickets, navigate to other pages, and access different sections of the website from the main menu or navigation bar. The Home Page usually provides an overview of the available features and options for users, such as popular destinations, deals and promotions, and customer reviews. Users can also view recommended trips, search for specific trips, or browse categories based on their interests.
<br><br>
<h3> Login: </h3> 
The Login page is where users can log in to their accounts to access their personal information, bookings, and preferences. If users don't have an account, they can sign up for a new one by providing their basic details and creating a password.

In case users forget their password, they can reset it from the Login page by clicking on the "Forgot Password" link. This will prompt them to enter their registered email address, and a password reset link will be sent to their email. Once they follow the link and enter a new password, they can log in to their account as usual.
<br><br>
<h3>Wishlist: </h3>
The Wishlist page is a feature that allows users to save trips that they are interested in and prioritize them based on their preferences. This feature is particularly useful for users who may not be ready to book a trip yet, but want to keep track of the trips they are considering.

On the Wishlist page, users can view their saved trips, and organize them based on their priorities. They can add notes or comments to each trip, and compare them side by side to make a more informed decision. This feature also allows users to receive alerts when the price or availability of their desired trip changes, making it easier for them to make a booking decision.
<br><br>
<h3>Search: </h3>
The Search page is a key feature of any travel-related website or application. It allows users to search for trips based on their preferences, such as destination, travel dates, budget, and other criteria. The search results are displayed on this page, and users can filter and sort them based on their preferences.

On the Search page, users can enter their travel details and get a list of relevant trips. They can view the trip details, such as the price, itinerary, and reviews, and compare them to make an informed decision. Users can also filter their search results based on factors such as price, duration, departure time, and more. This helps users to narrow down their options and find the best trip that matches their needs and budget.
<br><br>
<h3>Feature Page: </h3>
This page provides users with detailed information about a specific trip. Users can learn about the destination, the itinerary, and any special features or activities that are available on the trip.
<br><br>
<h3> Booking:  </h3>
he Booking page is where users can make a reservation and purchase tickets for their desired trips. On this page, users can select their travel dates, the number of passengers, and the type of ticket they want to purchase. They can also choose any additional options, such as seat selection or travel insurance.

Once users have selected their preferred options, they can proceed to the payment section to complete the transaction. Depending on the website or application, users may be required to provide their payment details, or they may be redirected to a third-party payment gateway to complete the transaction.




<br><br><br><br><br>

<h2> Common Q & A </h2>

<div class="accordion" id="accccc1">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        How do I book a ticket?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accccc1">
      <div class="accordion-body">
        You can book a ticket by visiting our website or mobile page of the webpage, either start from Home page or Booking page.
      </div>
    </div>
  </div>
</div>


<div class="accordion" id="accccc2">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Can you refund the bus ticket
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accccc2">
      <div class="accordion-body">
        Yes, you may, please dia (519) 241-2132 for more informations 
        <br>
        Monday to Friday:
        Start time: 9:00 AM
        End time: 5:00 PM
        Lunch break: 12:00 PM - 1:00 PM
      </div>
    </div>
  </div>
</div>


<div class="accordion" id="accccc3">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        What payment methods do you accept?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accccc3">
      <div class="accordion-body">
        Currently, Credit card will be the only acceptable method for payment, you can enter your credit card inforamtion for payment.
      </div>
    </div>
  </div>
</div>

<div class="accordion" id="accccc4">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Will this service soon open to US & Europe?
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accccc4">
      <div class="accordion-body">
        We are currently expanding our business towards other regions, please stay tuned.
      </div>
    </div>
  </div>
</div>


 <!-- Footer -->
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">booking.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
    



    <!-- Bootstrap Bundle with Popper and jQuery -->
    <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    

</body>
</html>
