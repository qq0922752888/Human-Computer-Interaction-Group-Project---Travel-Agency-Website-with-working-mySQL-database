<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
    include 'connection.php'; 
    function is_trip_in_wishlist($connection, $user_id, $trip_id) {
        $query = "SELECT * FROM wishlist WHERE user_id = ? AND trip_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii", $user_id, $trip_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    
    $trip_id = 5; // replace this with the actual trip ID
    $is_trip_in_wishlist = is_trip_in_wishlist($connection, $user_id, $trip_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    <title>Banff Trip Information</title>
</head>

<body>
    <style>
        .c-item {
            height: 800px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
        }
        .buttons-container {
            display: flex;
            gap: 10px;
        }

        .like-btn {
            padding: 6px 10px;
            font-size: 24px;
        }

        .like-btn .fa-heart {
            pointer-events: none;
        }

        .like-btn:focus {
            outline: none;
        }

        .like-btn.active {
            color: red;
        }

        .like-btn.active .fa-heart {
            content: "\f004";
        }
    </style>
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



    <!--Change image and text to show side by side-->
    <!--Showcase-->
    <section class="bg-white text-dark p-lg-0 text-center">
        <div class="container">
            <div class="d-sm-flex flex-column">
                <div>
                    <h1>Banff</h1>
                </div>
                <div id="tripImgs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#tripImgs" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <img src="img/banff1.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="img/banff2.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="img/banff3.jpg" class="d-block w-100 c-img" alt="Trip Image">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#tripImgs" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#tripImgs" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
    </section>
    <!--Trip Info-->
    <section class="bg-white text-dark p-3 text-left">
        <div class="container">
            <div class="d-md-flex flex-column justify-content-between align-items-center">
                <h2 class="mb-3 mb-md-0">About the Trip</h2>
                <p>Experience the breathtaking natural beauty of Banff on a bus tour that takes you through the majestic peaks, crystal-clear lakes, 
                    and stunning wilderness of the Canadian Rockies. Marvel at the turquoise waters of Lake Louise, journey along the Icefields Parkway, 
                    and hike through the stunning landscapes of Banff National Park. Your knowledgeable guide will share fascinating insights into the region's unique geology, 
                    wildlife, and ecology as you explore this natural wonderland. Whether you're an outdoor enthusiast or simply seeking a peaceful escape into nature, 
                    this bus tour is an excellent way to discover the awe-inspiring beauty of Banff and the surrounding area.</p>
                <ul>
                    <li>Country: Canada</li>
                    <li>Duration (days): 4</li>
                    <li>Price per Ticket (CAD): $200.00</li>
                </ul>
                <form action="booking.php" method="GET" target="_self">
                    <div class="mb-3">
                        <input type="hidden" name="tripName" value="Banff" />
                        <input type="hidden" name="country" value="Canada" />
                        <input type="hidden" name="duration" value="4" />
                        <input type="hidden" name="ticketPrice" value="200.00" />
                        <input type="hidden" name="tripId"  value ="5"/>
                    </div>
                    <div class="buttons-container">
                    <button type="submit" class="btn btn-primary">Book Now!</button>
                    <button type="button" class="btn btn-outline-danger like-btn<?php if ($is_trip_in_wishlist) echo ' active'; ?>">
                        <i class="far fa-heart" aria-hidden="true"></i>
                    </button>
                </div>

                </form>

            </div>

        </div>
    </section>
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationModalMessage">
                    <!-- Message will be set via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
        <script>
            const likeBtn = document.querySelector('.like-btn');
            const notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'));
            const notificationModalMessage = document.getElementById('notificationModalMessage');

            likeBtn.addEventListener('click', function () {
                const tripId = document.querySelector('input[name="tripId"]').value;
                const formData = new FormData();
                formData.append('trip_id', tripId);

                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                    fetch('remove_from_wishlist.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Check for success or error messages from the PHP script
                        notificationModalMessage.innerHTML = 'Trip removed from your wishlist!';
                        notificationModal.show();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    this.classList.add('active');
                    fetch('add_to_wishlist.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Check for success or error messages from the PHP script
                        notificationModalMessage.innerHTML = 'Trip added to your wishlist!';
                        notificationModal.show();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        </script>

</body>

</html>
