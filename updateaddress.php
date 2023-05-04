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
session_start();
$user_id = $_SESSION['user_id'];

?>

  
  

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
            
            $street = $_POST['streetname'];
            $city = $_POST['cityname'];
            $Prov = $_POST['provincename'];
            $coutnry = $_POST['countryname'];

          //echo 'UPDATE User_info SET Street_name = ' . '"' . $street . '"' . ' , City = ' . '"' . $city . '"' . ' , Prov = ' . '"' . $Prov . '"' . ' , Country = ' .'"' . $coutnry . '"' .  ' WHERE user_id = ' . $user_id;
          $result = $connection -> query('UPDATE User_info SET Street_name = ' . '"' . $street . '"' . ' , City = ' . '"' . $city . '"' . ' , Prov = ' . '"' . $Prov . '"' . ' , Country = ' .'"' . $coutnry . '"' .  ' WHERE user_id = ' . $user_id  );
          echo "<script>
          alert('Address changed');
          window.location.href='a.php';
          </script>";
        }
        ?>

      
    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
            <h1 class="text-center mb-4">Update Address</h1>
            <form action="updateaddress.php" method="post">
                <div class="form-group col-4">
                  <label for="streetname">Street Name:</label>
                  <input type="text" class="form-control" id="streetname" name="streetname" required>
                </div>
                <div class="form-group col-4">
                  <label for="cityname">City:</label>
                  <input type="text" class="form-control" id="cityname" name="cityname" required>
                </div>
                <div class="form-group col-4">
                  <label for="provincename">Province:</label>
                  <input type="text" class="form-control" id="provincename" name="provincename" maxlength="2" required>                                
                </div>
                <div class="form-group col-4">
                  <label for="countryname">Country:</label>
                  <input type="text" class="form-control" id="countryname" name="countryname" required>                                
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
