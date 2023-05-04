<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCI Search Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <?php include 'connection.php';?> <!-- b onnect to db -->

    <?php
    session_start();
    $user_id = $_SESSION['user_id'];

    ?>  


    <div class="header">
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


    </div>
    <div class="search param">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card border-info m-3">
                    <div class="card-body">
                        <div class="row justify-content-evenly">
                            <div class="col-auto">


                            <?php 
                            if (isset($_POST['destination'])) {
                                    $temp1 = $_POST['destination'];
            
                                    $result111 = $connection->query('SELECT COUNT(*) as count FROM Trips WHERE trip_name LIKE' . "'%" . $temp1 . "%'" );
                                    $row2 = $result111 ->fetch_assoc();
                                    $num_row = $row2['count'];

                            
                                    //header('Location: Search.php');
                            
                            }                     
                            
                            
                            ?>

                            <form action="Search.php" method="post">
                            <div class="searchbar">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="destination" placeholder="Choose a destination..." style="width:600px">
                            <datalist id="datalistOptions">
                            <option value="Vancouver">
                            <option value="Toronto">
                            <option value="Quebec">
                            </datalist>
                            </div>
                            <div class="d-grid gap-2 m-2">
                            <button type="submit" class="btn btn-primary">Start Searching!</button>
                            </div>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-auto m-1">
                                
                            <?php 
                            
                            echo '<h2><span class="badge text-bg-light">' . "Results:" . $num_row .  '</span></h2>';
                            
                            ?>
                                
                            </div>

                            <?php 

                            $result111 = $connection->query('SELECT * FROM Trips WHERE trip_name LIKE' . "'%" . $temp1 . "%'" );
                            while ($row = $result111->fetch_assoc()) {
                                echo '<div class="row justify-content-start">';
                                echo '<div class="card m-1">';
                                echo '<div class="row g-0 justify-content-evenly">';
                                echo '<div class="col-auto m-1">';
                                echo '<img src= ' . '"' . $row['pic'] . '"' . 'class = "card-img" style="width:300px;height:200px;">'; 
                                echo '</div>';
                                echo '<div class="col-md-8">';
                                echo '<div class="card-header">';
                                echo '<h5 class="card-title">' . $row['trip_name'] . '</h5>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<p class="card-text">' . $row['description'] . '</p>';
                                $filename = strtolower(str_replace(" ", "", $row['trip_name'])) . ".php";
                                echo '<a href="'.$filename .'" class="btn btn-primary">View Trip Details</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }



                            
                            ?>


    
                                


                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
    <script>$('.datepicker').datepicker();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>