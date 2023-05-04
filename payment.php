<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    <title>Trip Information</title>
</head>
<body>
<?php include 'connection.php';?> <!-- connect to db -->
    <?php
        $PassFName = $_GET['passFName1'];
        $PassLName = $_GET['passLName1'];
        $tripName = $_GET['tripName'];
        $country = $_GET['countryName'];
        $sub = $_GET['subIN'];
        $tax = $_GET['taxIn'];
        $fee = $_GET['bookIN'];
        $total= $_GET['gtIN'];
        $startDate = $_GET['trip-start'];
        $endDate = $_GET['trip-end'];
        $tripId = $_GET['tripId'];
    ?>

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


    <style>
        #pageTitle {
            text-align: center;
        }
        .form-label {
            font-size: 20px;
        }
        .form-control{
            font-size: 15px;
        }
        .form-text{
            font-size: 12px;
        }
        .date-box{
            font-size: 15px;
        }
        .form-check-input{
            width: 30px;
            height: 30px;
        }
        .form-check-label{
            font-size: 25px; 
        }
        .expiration{
            font-size: 15px;
        }
        .input-error {
            border-color: #dc3545;
        }

        .input-error ~ .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 12px;
        }
        .TotalDisplay{
            font-size: 15px;
        }
      
   
    </style>
    <h1 id="pageTitle"> Payment<h1>
    
    <!--Payment-Information-->
    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
                <form action="confirm.php" method="POST" target="_self" id="credit-card-form" enctype="application/x-www-form-urlencoded">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Card Information
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="card-name" class="form-label">Cardholder Name</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="text" class="form-control" id="card-name" placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="card-number" class="form-label" >Card Number</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="text" class="form-control" id="card-number" maxlength="19" placeholder="1234 5678 9012 3456" required>
                                        <small class="invalid-feedback">Invalid card number</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="expiry-date" class="form-label">Expiry Date</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="text" class="form-control" id="expiry-date" placeholder="MM/YY" maxlength="5" required>
                                        <small class="invalid-feedback">Invalid Expiry Date</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cvc" class="form-label">CVV/CVC</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="text" class="form-control" id="cvc" maxlength="3" placeholder="000" required>
                                        <small class="invalid-feedback">Invalid CVV/CVC</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Billing Information
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <div class="mb-3">
                                            <label for="billName" class="form-label">Name</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                            <input type="text" class="form-control" placeholder="John Doe" id="billName">
                                    </div>
                                    <div class="mb-3">
                                            <label for="billAddr" class="form-label">Address</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                            <input type="text" class="form-control" placeholder="123 Apple Street" id="billAddr">
                                    </div>
                                    <div class="mb-3">
                                            <label for="billPC" class="form-label">Postal Code</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                            <input type="text" class="form-control" placeholder="N6A 3K7" maxlenght="7" id="billPC">
                                            <small class="invalid-feedback">Invalid Postal Code</small>
                                    </div>
                                    <div class="mb-3">
                                            <label for="billPhone" class="form-label">Phone Number</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                            <input type="text" class="form-control" maxlength = "12" placeholder ="555 555 5555"id="billPhone">
                                            <small class="invalid-feedback">Invalid Phone Number</small>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="TotalDisplay">
                    <p>Subtotal: $ <?php echo htmlspecialchars($sub); ?> CAD</p>
                    <p>Tax (13%): $<?php echo htmlspecialchars($tax); ?>CAD</p>
                    <p>Booking Fee (5%): $<?php echo htmlspecialchars($fee); ?>CAD</span></p>
                    <p>Grand Total: $<?php echo htmlspecialchars($total); ?> CAD</p>
                </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" onchange="document.getElementById('submitBtn').disabled = !this.checked;" class="form-check-input" id="verifyCheck" unchecked>
                        <label class="form-check-label" for="verifyCheck" id="checkLbl">Verify Card information and Billing Information is correct.</label>
                        </div>
                    <input type="hidden" id="PassFName" name="PassFName" value="<?php echo htmlspecialchars($PassFName); ?>">
                    <input type="hidden" id="PassLName" name="PassLName" value="<?php echo htmlspecialchars($PassLName); ?>">
                    <input type="hidden" id="tripName" name="tripName" value="<?php echo htmlspecialchars($tripName); ?>">
                    <input type="hidden" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>">
                    <input type="hidden" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>">
                    <input type="hidden" id="country" name="country" value="<?php echo htmlspecialchars($country); ?>">
                    <input type="hidden" id="total" name="total" value="<?php echo htmlspecialchars($total); ?>">
                    <input type="hidden" name="tripId" id="tripId" value ="<?php echo htmlspecialchars($tripId); ?>" >
                   
                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled >Process Payment</button>
                </form>

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
        document.addEventListener('DOMContentLoaded', () => {
        const cardNumberInput = document.getElementById('card-number');
        const expiryDateInput = document.getElementById('expiry-date');
        const cvcInput = document.getElementById('cvc');
        const billPCInput = document.getElementById('billPC');
        const billPhoneInput = document.getElementById('billPhone');
        const creditCardForm = document.getElementById('credit-card-form');
      
        cardNumberInput.addEventListener('input', (e) => {
            e.target.value = e.target.value
                .replace(/[^\d]/g, '')
                .replace(/(\d{4})/g, '$1 ')
                .trim()
                .substr(0, 22);
        });

        expiryDateInput.addEventListener('input', (e) => {
            const inputValue = e.target.value.replace(/[^\d]/g, '');
            if (inputValue.length >= 3) {
                e.target.value = inputValue.substr(0, 2) + '/' + inputValue.substr(2);
            } else {
                e.target.value = inputValue;
            }
            e.target.value = e.target.value.substr(0, 5);
        });


        cvcInput.addEventListener('input', (e) => {
            e.target.value = e.target.value
                .replace(/[^\d]/g, '')
                .substr(0, 3);
        });

        billPCInput.addEventListener('input', (e) => {
            const inputValue = e.target.value.replace(/[^A-Za-z\d]/g, '').toUpperCase();
            if (inputValue.length >= 4) {
                e.target.value = inputValue.substr(0, 3) + ' ' + inputValue.substr(3);
            } else {
                e.target.value = inputValue;
            }
            e.target.value = e.target.value.substr(0, 7);
        });

        billPhoneInput.addEventListener('input', (e) => {
            e.target.value = e.target.value
                .replace(/[^\d]/g, '')
                .replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3')
                .substr(0, 14);
        });

        function isCardNumberValid(cardNumber) {
            const regex = /^(\d{4}\s){3}\d{4}$/;
            return regex.test(cardNumber);
        }

        function isExpiryDateValid(expiryDate) {
            const regex = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
            return regex.test(expiryDate);
        }

        function isCvcValid(cvc) {
            const regex = /^\d{3}$/;
            return regex.test(cvc);
        }

        function isPostalCodeValid(postalCode) {
            const regex = /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/;
            return regex.test(postalCode);
        }

        function isPhoneNumberValid(phoneNumber) {
            const regex = /^\(\d{3}\) \d{3}-\d{4}$/;
            return regex.test(phoneNumber);
        }
        function generateRandomNumber() {
            return Math.floor(100000 + Math.random() * 900000);
        }
        async function getUniqueBookingNumber() {
            let uniqueFound = false;
            let bookingNumber;

            while (!uniqueFound) {
                bookingNumber = generateRandomNumber();

                const response = await fetch('check_booking_number.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ bookingNumber: bookingNumber })
                });

                const result = await response.json();

                if (result.unique === true) {
                    uniqueFound = true;
                }
            }

            return bookingNumber;
        }
    
        creditCardForm.addEventListener('submit', async (event) =>  {
            event.preventDefault();

            const cardNumber = cardNumberInput.value;
            const expiryDate = expiryDateInput.value;
            const cvc = cvcInput.value;
            const postalCode = billPCInput.value;
            const phoneNumber = billPhoneInput.value;

            const cardNumberValid = isCardNumberValid(cardNumber);
            const expiryDateValid = isExpiryDateValid(expiryDate);
            const cvcValid = isCvcValid(cvc);
            const postalCodeValid = isPostalCodeValid(postalCode);
            const phoneNumberValid = isPhoneNumberValid(phoneNumber);
            const uniqueBookingNumber = await getUniqueBookingNumber();
            const bNumIn = document.createElement('input');
            bNumIn.type = 'hidden';
            bNumIn.name = 'bNum';
            bNumIn.value = uniqueBookingNumber;
            creditCardForm.appendChild(bNumIn);
            if (!cardNumberValid) {
                cardNumberInput.classList.add('input-error');
            } else {
                cardNumberInput.classList.remove('input-error');
            }

            if (!expiryDateValid) {
                expiryDateInput.classList.add('input-error');
            } else {
                expiryDateInput.classList.remove('input-error');
            }

            if (!cvcValid) {
                cvcInput.classList.add('input-error');
            } else {
                cvcInput.classList.remove('input-error');
            }

            if (!postalCodeValid) {
                billPCInput.classList.add('input-error');
            } else {
                billPCInput.classList.remove('input-error');
            }

            if (!phoneNumberValid) {
                billPhoneInput.classList.add('input-error');
            } else {
                billPhoneInput.classList.remove('input-error');
            }

            if (cardNumberValid && expiryDateValid && cvcValid && postalCodeValid && phoneNumberValid) {
                creditCardForm.submit();
            } else {
                alert('Please correct the errors in the form before submitting.');
            }
        });
    });


    </script>
    </body>
