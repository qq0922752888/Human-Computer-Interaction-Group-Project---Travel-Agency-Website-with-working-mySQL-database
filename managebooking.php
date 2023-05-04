<?php
  session_start();
  $user_id = $_SESSION['user_id'];
  include 'connection.php'
?>
<!doctype html>
<html lang="en">
  <link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    
  </head>
<body>
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
  <!--Showcase-->
  <section class="bg-white text-dark p-lg-0 text-center">
      <div class="container">
          <div class="d-sm-flex flex-column">
              <div>
                  <h1>Manage Boookings</h1>
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
                            <th scope="col">Delete</th>
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
                                echo '<td>
                                      <button class="btn btn-danger delete-btn">
                                      <img src="img/542724.png" class="card-img-top" style="width:20px;height:20px;">
                                      <input type="hidden" name="booking_num" value="' . $row1["booking_num"] . '">
                                    </button>
                                    <form action="delete_trip.php" method="post" class="d-none">
                                    <input type="hidden" name="booking_num" value="' . $row1["booking_num"] . '">
                                    <input type="hidden" name="delete_trip" value="1">
                                    </form>
                                      </td>';
                                echo '</tr>';
                                $tripper = $tripper + 1;
                            }
                        ?>
                    </tbody>
                </table>

            </div>
          </div>
        </div>
  </section>
  <script src="https://kit.fontawesome.com/358b3891c8.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Delete Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this booking?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  const deleteButtons = document.querySelectorAll('.delete-btn');
  const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
  const confirmDelete = document.getElementById('confirmDelete');
  let currentForm;
  deleteButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      currentForm = btn.nextElementSibling; // Get the form element
      confirmationModal.show();
    });
  });

  confirmDelete.addEventListener('click', () => {
    if (currentForm) {
      currentForm.submit();
    }
  });
</script>
</body>
