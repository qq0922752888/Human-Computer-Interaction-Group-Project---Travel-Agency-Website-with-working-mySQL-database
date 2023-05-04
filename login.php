<!DOCTYPE html>


<?php

    
    session_set_cookie_params(0);
    session_start();
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Aleo|Slabo+27px" rel="stylesheet">
  <link rel="stylesheet" href="stylesheet.css">

</head>

<body>

<?php 
    include 'connection.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the values submitted by the form
  $username = $_POST['userName'];
  $password = $_POST['userPassword'];

  //echo "SELECT * FROM Account_info WHERE username = " . '"' . $username . '"' . ' AND ' . ' password = ' . '"' . $password . '"';
  $result = $connection -> query("SELECT * FROM Account_info WHERE username = " . '"' . $username . '"' . ' AND ' . ' password = ' . '"' . $password . '"');


  if (mysqli_num_rows($result) == 0) {
    echo '<script>alert("Incorrect username or password. Please try again.");</script>';
  } 
  else {
    $row1 = $result ->fetch_assoc();
    $_SESSION['user_id'] = $row1['user_id'];
    header('Location: HomePage.php');

  }
}


?>

  <!-- partial:index.partial.html -->
  <div class="logo text-center">

  </div>
  <div class="wrapper">
    <div class="inner-warpper text-center">
      <h2 class="title">Login </h2>
      <form action="login.php" method="post" id="formvalidate">
        <div class="input-group">
          <label class="palceholder" for="userName">Email</label>
          <input class="form-control" name="userName" id="userName" type="text" placeholder="" />
          <i id="popup" onclick="showemailnotice()" class="far fa-envelope">

            <span class="popuptext" id="popup">Format:123@email </span>
          </i>
          <span class="lighting"></span>

        </div>
        <div class="input-group">
          <label class="palceholder" for="userPassword">Password</label>
          <input class="form-control" name="userPassword" id="userPassword" type="password" placeholder="" />
          <span class="lighting"></span>
          <i id="see" onclick="see()" class="far fa-eye">
            <span class="popuptext" id="popup">show password</span>
          </i>
          <a class="forgot pull-right" href="changepassword.php">Forgot Password?</a>
        </div>

        <button type="submit" id="login">Login</button>
        <div class="createaccount">
          Don't have account? 
          <a class="create account" href="signup.html">Create one!</a>
        </div>

      </form>
    </div>

  </div>

  <!-- you don't need that :)  -->

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>
