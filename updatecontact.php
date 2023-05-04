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
    
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $Phone = $_POST['phonenum'];
    $email = $_POST['email'];

    //echo 'UPDATE User_info Account_info SET fname = ' . '"' . $fname . '"' . ' , lname = ' . '"' . $lname . '"' . ' , Phone = ' . '"' . $Phone . '"' . ' , email = ' .'"' . $email . '"' .  ' WHERE user_id = ' . $user_id . ' AND Account_info.Postal = User_info.Postal';
   $result = $connection -> query('UPDATE  Account_info SET fname = ' . '"' . $fname . '"' . ' , lname = ' . '"' . $lname . '"' .  ' WHERE user_id = ' . $user_id );
   $result = $connection -> query('UPDATE  User_info SET Phone = ' . '"' . $Phone . '"' . ' , email = ' . '"' . $email . '"' .  ' WHERE user_id = ' . $user_id );
    
   echo "<script>
   alert('Contact information changed');
   window.location.href='a.php';
   </script>";
}
?>


    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
            <h1 class="text-center mb-4">Update Contact</h1>
            <form action="updatecontact.php" method="post">
                <div class="form-group col-4">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-group  col-4">
                  <label for="lastname">Last Name:</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-group  col-4">
                  <label for="phonenum">Phone #:</label>
                  <input type="text" class="form-control" id="phonenum" name="phonenum" required>                                
                </div>
                <div class="form-group  col-4">
                  <label for="email">Email Address:</label>
                  <input type="text" class="form-control" id="email" name="email" required>                                
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
