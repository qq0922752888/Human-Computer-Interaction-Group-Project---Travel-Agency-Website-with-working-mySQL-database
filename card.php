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

<?php
//session_destory();
session_start();
$user_id = $_SESSION['user_id'];
//echo "Session Number is " . $user_id;

?>

  
  

     <!-- Navigation Bar 1 -->
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
    <a href="#" class="d-block bg-image hover-zoom" data-bs-toggle="popover" data-bs-placement="top" title="Return to Home Page"> </a>
    <style>
      /* Custom CSS */
      .bg-image {
          background-image: url("img/james.jpg");
          background-size: cover;
          background-position: center;
          height: 30vh;
      }
      
  </style>


        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $CreditNum = $_POST['creditnum'];
            $expiry = $_POST['expiry'];
            $CVV = $_POST  ['CVV'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $Cardtype = $_POST['Cardtype'];

            $result2 = $connection->query('INSERT INTO Credit_card (user_id, CreditNum, expiry, CVV, fname, lname, Cardtype)
            VALUES (' . $user_id . ' , ' . '"' . $CreditNum . '"' . ' , ' . '"' . $expiry . '"' . ' , ' . '"' . $CVV . '"' . ' , ' . '"' . $fname . '"' . ' , ' . '"' . $lname . '"' . ' , ' . '"' . $Cardtype .'"'. ')');
            //echo 'INSERT INTO Credit_card (user_id, CreditNum, expiry, CVV, fname, lname, Cardtype)
            //VALUES (' . $user_id . ' , ' . '"' . $CreditNum . '"' . ' , ' . '"' . $expiry . '"' . ' , ' . '"' . $CVV . '"' . ' , ' . '"' . $fname . '"' . ' , ' . '"' . $lname . '"' . ' , ' . '"' . $Cardtype .'"'. ')';
            echo "<script>
            alert('New card  added');
            window.location.href='a.php';
            </script>";

            
        }
        ?>




    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
            <h1 class="text-center mb-4">Add a New Card</h1>
            <form action="card.php" method="post">
                <div class="form-group col-4">
                  <label for="creditnum">Credit Number:</label>
                  <input type="text" class="form-control" id="creditnum" name="creditnum" required>
                </div>
                <div class="form-group col-4">
                  <label for="expiry">expiry Date:</label>
                  <input type="text" class="form-control" id="expiry" name="expiry" required>
                </div>
                <div class="form-group col-4">
                  <label for="CVV">CVV:</label>
                  <input type="text" class="form-control" id="CVV" name="CVV" required>                                
                </div>
                <div class="form-group col-4">
                  <label for="fname">first name:</label>
                  <input type="text" class="form-control" id="fname" name="fname" required>                                
                </div>
                <div class="form-group col-4">
                  <label for="lname">last name:</label>
                  <input type="text" class="form-control" id="lname" name="lname" required>                                
                </div>
                <div class="form-group col-4">
                  <label for="Cardtype">Cardtype:</label>
                  <input type="text" class="form-control" id="Cardtype" name="Cardtype" required>                                
                </div>

                <br>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>

              <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="a.php"  >Return to Main</a>
          </div>
        </div>
    </div>
  
            


    <!-- Bootstrap Bundle with Popper and jQuery -->
    <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    

</body>
</html>
