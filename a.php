    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Information</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
        
    </head>
    <body>

    <?php include 'connection.php';?> <!-- b onnect to db -->

    <?php
    //session_destory();
    session_start();
    $user_id = $_SESSION['user_id'];
    //echo "Session Number is " . $user_id;
  
    ?>
<!----TO FIX --->    
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

        
        <div class="container-fluid bg-light">
            <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
                <h1 class="text-center mb-4">My Account</h1>
                
                <h2>Welcome Back</h2>
                <?php

                $result1 = $connection -> query("SELECT user_id, username FROM Account_info WHERE user_id = $user_id ");

                $row1 = $result1 ->fetch_assoc();
                echo '<h4> &nbsp; &nbsp; Account Number:' . $row1["username"] . '</h4>';
                
                ?>
                <br>
                
    
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-fill " role="tablist">
                <li class="nav-item" role="presentation" >
                    
                    <a class="nav-link active align-items-center"  data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true" data-bs-toggle="tooltip" data-bs-placement="top" title="View General information with Account">
                    <span>
                        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                        
                    </span>
                    <span>&nbsp; Overview</span>
                    </a>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link  align-items-center" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Check stored credit card (add or remove)">
                    <span>
                        <i class="fa-solid fa-wallet fa-xl" style="color: #ad590b;"></i>
                        
                    </span>
                    <span> &nbsp; Payment Information</span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                <button class="nav-link  align-items-center" id="trips-tab" data-bs-toggle="tab" data-bs-target="#trips" type="button" role="tab" aria-controls="trips" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Check trips travelled">
                  <span>
                    <i class="fa-solid fa-bus fa-xl" style="color: #ffd814;"></i>
                  </span>
                  <span> &nbsp; Past Trips</span>
                </button>
                </li>
                

                <li class="nav-item" role="presentation">
                    <button class="nav-link  align-items-center" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                    <span>
                        <i class="fa-solid fa-gear fa-xl" style="color: #47494d;"></i>
                    </span>
                    <span> &nbsp; Settings</span>
                    </button>
                </li>
                
                </ul>


                       
                <!-- Tab panes -->
                <div class="tab-content">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">

                    <br>
                    <h2>Details</h2><hr>
                                                
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Contact Information</h5>
                            <?php

                            
                            $result1 = $connection -> query('SELECT fname, lname, Phone, email  FROM Account_info, User_info WHERE Account_info.user_id = ' . $user_id . ' and Account_info.Postal = User_info.Postal');
                            $row1 = $result1 ->fetch_assoc();


                                echo '<p class="card-text"> &nbsp; First Name:' . $row1["fname"] . '</p>';
                                echo '<p class="card-text"> &nbsp; Last Name:' . $row1["lname"] . '</p>';
                                echo '<p class="card-text"> &nbsp; Phone:' . $row1["Phone"] . '</p>';
                                echo '<p class="card-text"> &nbsp; email:' . $row1["email"] . '</p>';

                            ?>



                            <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="updatecontact.php"  >Edit Information</a>
                            </div>
                        </div>
                        

                        <br><br>
                        
        
                        <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Address</h2>
                            <hr>
                            <div class="row">

                            <div class="col-md-6">
                            <?php


                                $result77 = $connection -> query('SELECT Street_name, City FROM Account_info, User_info WHERE Account_info.user_id = ' . $user_id . ' and Account_info.Postal = User_info.Postal');

                                $row1 = $result77 ->fetch_assoc();


                                echo '<span> Street Name: &nbsp;' . $row1["Street_name"] . '</span>';
                                echo '<br><br>';
                                echo '<span> City: &nbsp;' . $row1["City"] . '</span>';
                                echo '<br><br>';

                                ?>

                                <a href="updateaddress.php" class="btn btn-primary">Edit Address</a>
                            </div>
                            
                            
                            <div class="col-md-6">
                            <?php
                                $result77 = $connection -> query('SELECT Prov, Country, User_info.Postal FROM Account_info, User_info WHERE Account_info.user_id = ' . $user_id . ' and Account_info.Postal = User_info.Postal');

                                $row1 = $result77 ->fetch_assoc();


                                echo '<span> Province: &nbsp;' . $row1["Prov"] . '</span>';
                                echo '<br><br>';
                                echo '<span> Country: &nbsp;' . $row1["Country"] . '</span>';
                                echo '<br><br>';
                                echo '<span> Postal Code: &nbsp;' . $row1["Postal"] . '</span>';
                                echo '<br><br>';
                            ?>
                            </div>

                            </div>

                    </div>
                    </div>
    </div>
            
    
                
                    

                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <div class="container">

                    <a href="card.php" class="btn btn-success">Add new Cards</a>
                    <br><br>
                                    
                    <?php

                    if (isset($_POST['deletecard'])) {
                        $temp1 = $_POST['deletecard'];

                        $result2 = $connection->query('DELETE FROM Credit_card WHERE user_id = ' . $user_id . ' AND CreditNum =' . '"' . $temp1 . '"');

                        echo "<script>
                        alert('Card Deleted');
                        </script>";
                        
                    }

                    $result2 = $connection->query('SELECT * FROM Credit_card WHERE user_id = ' . $user_id);
                    $card = 1;
                    $temp;
                    echo '<div class="col-md-12 mx-auto">';
                    while ($row = $result2->fetch_assoc()) {
                        echo '<div class="card mb-3">';
                        echo '<div class="card-header bg-primary text-white"> Card #' . $card . '</div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">Credit Card ' . $card . '</h5>';
                        echo '<p class="card-text">Card Number: ' . $row['CreditNum'] . '</p>';
                        echo '<p class="card-text">Expiration Date:' . $row['expiry'] . '</p>';
                        echo '<p class="card-text">CVC:  ' . $row['CVV'] . ' </p>';
                        echo '<p class="card-text">Name on Card: ' . $row['fname'] . " " . $row['lname'] . '</p>';
                        echo '<br>';
                        $temp = $row['CreditNum'];

                        echo '<form method="post" action="a.php">';
                        echo '<input type="hidden" name="deletecard" value="' . $temp . '">';
                        echo '<button type="submit" class="btn btn-danger">Delete Card</button>';
                        echo '</form>';
                        
                        //echo '<button id="' . $row['CreditNum'] . '" name="' . $card . '" class="btn btn-danger" onclick="showCardNumber(this)"> Delete Credit Card</button>';
                        echo '</div>';
                        echo '</div>';
                        $card = $card + 1;
                    }

                    echo '</div>';

                    ?>

                    </div>
                </div>

            
                <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Booking #</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Trip ID</th>
                                <th scope="col">Trip Name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result1 = $connection->query("SELECT booking_num, user_id, trip_id, trip_name, startDate, endDate, Cost FROM Travelled_trip WHERE user_id = $user_id" );
                                $tripper = 1;
                                while ($row1 = $result1->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $tripper . '</th>';
                                    echo '<td>' . $row1["booking_num"] . '</td>';
                                    echo '<td>' . $row1["user_id"] . '</td>';
                                    echo '<td>' . $row1["trip_id"] . '</td>';
                                    echo '<td>' . $row1["trip_name"] . '</td>';
                                    echo '<td>' . $row1["startDate"] . '</td>';
                                    echo '<td>' . $row1["endDate"] . '</td>';
                                    echo '<td>' . $row1["Cost"] . '</td>';
                                    echo '</tr>';
                                    $tripper = $tripper + 1;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>




                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab" id="setting">
                    <div class="row">
                        <div class="col-4">
                            <nav id="navbar" class="h-100 flex-column align-items-stretch pe-4 border-end">
                                <nav class="nav nav-pills flex-column">

                                <a class="nav-link" data-bs-toggle="pill" href="#privacy">Privacy and Security</a>
                                <a class="nav-link" data-bs-toggle="pill" href="#notifications">Notifications</a>
                                <a class="nav-link" data-bs-toggle="pill" href="#changepassword">Change Password</a>             
                                <a class="nav-link" data-bs-toggle="pill" href="#updatecontact"  >Update Contact Info.</a>
                                <a class="nav-link" data-bs-toggle="pill" href="#updateaddress"  >Update Address</a>
                                <a class="nav-link text-danger" id="ddbut" data-bs-toggle="pill" href="#deleteaccount"  >Delete Account</a>

                                    <style>
                                        #ddbut.nav-link.active {
                                            background-color: #ff9999;
                                            color: white;
                                        }
                                    </style>
                                </nav>
                            </nav>
                        </div>

                        
                        <div class="col-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="privacy">
                                    <h3>Privacy Settings</h3>
                                    <!-- Rounded switch -->
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="travel-history">
                                        <label class="form-check-label" for="travel-history">Allow Company to collect recent travel history information</label>
                                        
                                    </div>
                                    
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-deals">
                                        <label class="form-check-label" for="email-deals">Allow Company to send out limited deals and discount to your email</label>
                                    </div>
                                    
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="disclose-info">
                                        <label class="form-check-label" for="disclose-info">Allow your information to be disclosed to third party company</label>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="notifications">
                                    <h3>Notification Settings</h3>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="travel-history">
                                        <label class="form-check-label" for="travel-history">Notify me when the wishlist trip is on Sale</label>
                                    </div>
                        
                                
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="email-deals">
                                        <label class="form-check-label" for="email-deals">Notify me when with Seasonal Limited Deals</label>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="changepassword">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <p class="card-text">Forgot your passwords?</p>
                                        <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="changepassword.php"  >Change Passowrd</a>
                                    </div>

                                </div>

                            

                                <script> 
                                        function confirmDelete() {

                                            alert("You activated Delete Account feature, however for the testing and grading, account will not be deleted this moment");
                                        }
                                              
                                </script>



                            
                                

                            

                                    </div>
                                    
                                    
                                <div class="tab-pane fade" id="updatecontact">
                                    <h3>Update Contact Information</h3>
                                    <p>Click here to update your address</p>
                                    <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="updatecontact.php"  >Update Address</a>
                                </div>


                                <div class="tab-pane fade" id="updateaddress">
                                    <h3>Update Address</h3>
                                    <p>Click here to update your address</p>
                                    <a class="btn btn-primary " data-bs-toggle="popover" data-bs-placement="top" title="Edit information" href="updateaddress.php"  >Update Address</a>              
                                </div>



                                <div class="tab-pane fade" id="deleteaccount">
                                    <h5 class="card-title">Delete Account</h5>
                                    <div class="card" style="max-height: 50px; ">
                                        <div class="card-body">
                                
                                                <span> 
                                                    <i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ff0000;"></i>
                                                    <span class="text-danger"> Are you certain of this action, your account will be deleted permanently!!!</span>
                                                </span>

                                                <br><br>



                                                <br>  
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleting">
                                                Delete Account  
                                                </a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="deleting" tabindex="-1" aria-labelledby="deletingLabel" aria-hidden="true">
                                                    <div class="modal-dialog">

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="deletingLabel">Delete Account</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        
                                                        <div class="modal-body">
                                                            Are you sure you want to delete your account?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
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
                    
        
                </div>

            </div>
            </div>
        </div>




        



        <!-- Bootstrap Bundle with Popper and jQuery -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        

    </body>
    </html>
