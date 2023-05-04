
<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
?>

<!doctype html>
<html lang="en">
  <link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    
    <link href="HomePage.css" rel="stylesheet">
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


      <!-- Body Part -->
      <!-- Picture -->
    <img src="img/buscom.jpg" alt="Bus" class="bus"/>
    <!--Form-->
    <div class="d-flex justify-content-center">
      <form class="searchForm" id="searchForm">
      <div class="form-check form-check-inline">

      </div>
  
          <div class="row g-3 align-items-center">
          <div class="col-auto">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="oneway" value="oneway" checked>
            <label class="form-check-label" for="oneway">One Way</label>
          </div>
            <div class="col-auto">
            Departure
            <input type="text" class="form-control" id="from" placeholder="Departure" value="London">
            </div>

            <div class="col-auto">
            Destination
            <select class="form-select" id="destination" name="destination">
            <?php

            $result = $connection -> query("SELECT trip_name FROM Trips");
            while ($row = $result->fetch_assoc()) {
              echo '<option value = ' . '"' . $row['trip_name'] . '"' . '>' . $row['trip_name'] . '</option>';
            }

            ?>
            </select>
            </div>
              <div class="col-auto">
                  <p> </p>
                  <input type="number" min="1" max="10" class="form-control" id="passengerNo" value="1">
              </div>
              <div class="col-auto">
                  <button type="submit" class="btn btn-primary">Search</button>
              </div>
          </div>
      </form>
  </div>
  
  

    <!-- Buttons -->
    <div class="afterSearchButtons text-center">
        <a href="Search.php" class="btn btn-secondary btn-lg"><i class="fa-solid fa-magnifying-glass"></i> Search All Trips</a>
        <a href="managebooking.php" class="btn btn-secondary btn-lg"><i class="fa-sharp fa-solid fa-bus"></i> Manage Bookings</a>
        <a href="Wishlist.php" class="btn btn-secondary btn-lg"><i class="fa-regular fa-heart"></i> Wishlist</a>
        <a href="help.php" class="btn btn-secondary btn-lg"><i class="fa-regular fa-circle-question"></i> Help</a>
    </div>
    <!-- TExt -->
    <div class="text">
        <h4>Enjoy Comfortable Bus Travel in Canada at Unbeatable Prices</h4>
        <p>Searching for a last-minute weekend getaway? Planning a vacation with family or friends?
             Need a break from college? No problem! Discover the new way to travel 
             from city to city on board our partners' green buses.</p>
        <p>With unbeatable prices, comfortable seats and free Wi-Fi, traveling by bus has never been easier. 
            Whether you want to visit Toronto, Montreal, Ottawa, Niagara Falls, 
            or London, Bus Company provides the intercity bus travel you want, when you want it!</p>
        <p>Getting you from A to B stress free: thanks to real-time bus stop information, up-to-date and current bus schedules, 
            helpful staff and friendly bus drivers, you don't need to worry about a thing. 
            Plan your bus trip and jump on board feeling completely relaxed.</p>
        <h4>Bus Company: The Smart Choice for Travel </h4>
        <p>Bus Company's goal is to provide you a convenient, affordable and easy to use bus service. 
            We always offer the best deals, plus a safe and pleasant travel experience.</p>
        <p>Low-cost tickets are just a few clicks away on our App or website. 
            Once on board, our partners' experienced drivers will get you safely 
            from A to B while you kick back in comfortable seats and take advantage of free Wi-Fi and power outlets. 
            With many direct connections to popular destinations in Ontario you will never have to pause your movie to change buses!</p>
        <p>Save with Bus Company! Save money with unbeatably cheap bus tickets, 
            save time with direct bus connections and save the environment by traveling 
            on one of the most environmentally friendly means of transport. 
            So, whether you're traveling by bus to Toronto, Montreal, Ottawa, Niagara Falls, or London, you'll always travel green!</p>
        <p>Need to know more? Check out our FAQs or contact our friendly customer service team for any uncertainties you have.</p>
        <p>Get exclusive offers, exciting competition updates and the latest announcements by liking our Facebook page. 
            You'll be the first to know about any Bus Company news!</p>
    </div>
<!-- Most Visited Cities -->
<table class="table">  
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Most Travelled Cities</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td>Toronto, ON</td>
        <td>Ottawa, ON</td>
        <td>Hamilton, ON</td>
        <td>Oakville, ON</td>
      </tr>
      <tr>
        <th scope="row"></th>
        <td>Montreal, QC</td>
        <td>Niagara Falls, ON</td>
        <td>Kitchener, ON</td>
        <td>Chatham, ON</td>
      </tr>
      <tr>
        <th scope="row"></th>
        <td>London, ON</td> 
        <td>Kingston, ON</td>
        <td>St. Catherines, ON</td>
        <td>Brantford, ON</td>
      </tr>
      <tr>
        <th scope="row"></th>
        <td>Vancouver, BC</td>
        <td>Windsor, ON</td>
        <td>Oshawa, ON</td>
        <td>Barrie, ON</td>
      </tr>
    </tbody>
  </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>
      window.onload = function () {
        document.getElementById("searchForm").addEventListener("submit", function (event) {
          event.preventDefault(); // Prevent the default form submission

          const destination = document.getElementById("destination").value;

          // Remove spaces from the destination value
          const destinationNoSpaces = destination.replace(/\s+/g, '');

          // Set the form action based on the destination value without spaces
          this.action = destinationNoSpaces.toLowerCase() + ".php";

          // Submit the form with the updated action
          this.submit();
        });
      };
    </script>


  </body>
</html>
