<?php 
    session_start();
    $user_id = $_SESSION['user_id'];
?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"></link>
    <title>Booking</title>
</head>

<body>
    <?php
    $tripName = $_GET['tripName'];
    $country = $_GET['country'];
    $duration = $_GET['duration'];
    $ticketPrice = $_GET['ticketPrice'];
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
    </style>
    <h1 id="pageTitle"> Booking <h1>
    <!--Trip Info Booking -->
    <style>
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
        .TotalDisplay{
            font-size: 15px;
        }
        .no-cursor-change{
            pointer-events: none;
        }
   

    </style>
    <!--Booking Information-->
    <div class="container-fluid bg-light">
        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-100 border rounded p-4 bg-white">
            <form action="payment.php" method="GET" target="_self">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Trip Information
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                
                                    <div class="mb-3">
                                        <label for="tripName" class="form-label">Trip Name</label>
                                        <input type="text" class="form-control no-cursor-change" id="tripName" name="tripName" aria-describedby="tripHelp" value="<?php echo htmlspecialchars($tripName); ?>" readonly > 
                                        <div id="tripHelp" class="form-text">Name of trip. Cannot be changed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="countryName" class="form-label">Country</label>
                                        <input type="text" class="form-control no-cursor-change" id="countryName" name ="countryName"  aria-describedby="countryHelp" value="<?php echo htmlspecialchars($country); ?>" readonly > 
                                        <div id="countryHelp" class="form-text">Country of trip. Cannot be changed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">Duration (days) </label>
                                        <input type="text" class="form-control no-cursor-change" id="duration" name = "duration" aria-describedby="durationHelp" value="<?php echo htmlspecialchars($duration); ?>" readonly > 
                                        <div id="durationHelp" class="form-text">Duration of trip. Cannot be changed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price Per Ticket (CAD)</label>
                                        <input type="text" class="form-control no-cursor-change" id="price" name ="price" aria-describedby="priceHelp" value="<?php echo htmlspecialchars($ticketPrice); ?>" readonly >
                                        <div id="priceHelp" class="form-text">Price of ticket. Cannot be changed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start" class="form-label">Start Date</label> <span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="date" class="date-box"id="start" name="trip-start" placeholder="mm/dd/yyyy" required>
                                        <div id="startHelp" class="form-text">Select the start date of trip.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end" class="form-label">End Date</label>
                                        <input type="date" class="date-box no-cursor-change"id="end" name="trip-end" placeholder="mm/dd/yyyy" readonly>
                                        <div id="endHelp" class="form-text">End Date of trip. Start date + duration. Cannot Change</div>
                                    </div>
                                
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Passenger Information
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                    
                                    <div class="mb-3">
                                        <label for="passFName1" class="form-label">Passenger First Name</label><span style="color: red !important; display: inline; float: none;" class="form-label">*</span>
                                        <input type="text" class="form-control" id="passFName1" name="passFName1" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="passLName1" class="form-label">Passenger Last Name</label><span style="color: red !important; display: inline; float: none;"class="form-label">*</span>
                                        <input type="text" class="form-control" id="passLName1" name="passLName1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="DOB" class="form-label">Date of Birth</label><span style="color: red !important; display: inline; float: none;"class="form-label">*</span>
                                        <input type="date" class="date-box"id="DOB" name="date-of-birth" value="mm/dd/yyyy" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="country" class="form-label">Country of Citizenship</label><span style="color: red !important; display: inline; float: none;"class="form-label">*</span>      
                                        <select id="country" name="country" class="form-control" required>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
                <div class="TotalDisplay">
                    <p>Subtotal: $<span id="subtotal"></span> CAD</p>
                    <p>Tax (13%): $<span id="tax"></span> CAD</p>
                    <p>Booking Fee (5%): $<span id="bookingFee"> CAD</span></p>
                    <p>Grand Total: $<span id="grandTotal"></span> CAD</p>
                    <input type="hidden" name="subIN" id="subIN"/>
                    <input type="hidden" name="taxIn" id="taxIn" />
                    <input type="hidden" name="bookIN" id="bookIN" />
                    <input type="hidden" name="gtIN"  id="gtIN"/>
                    <input type="hidden" name="tripId" id="tripId" value ="<?php echo htmlspecialchars($tripId); ?>" />
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" onchange="document.getElementById('submitBtn').disabled = !this.checked;" class="form-check-input" id="verifyCheck" unchecked>
                    <label class="form-check-label" for="verifyCheck" id="checkLbl">Verify trip Information and passenger information is correct</label>
                </div>
                <button type="submit" class="btn btn-primary" id="submitBtn" disabled >Pay Now</button>
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
        const tripNameInput = document.getElementById("tripName");
        const countryNameInput = document.getElementById("countryName");
        const startDateInput = document.getElementById("start");
        const endDateInput = document.getElementById("end");
        const durationInput = document.getElementById("duration");
        const priceInput = document.getElementById("price");
        const subtotalElement = document.getElementById("subtotal");
        const taxElement = document.getElementById("tax");
        const bookingFeeElement = document.getElementById("bookingFee");
        const grandTotalElement = document.getElementById("grandTotal");
        const subIN = document.getElementById("subIN");
        const taxIn = document.getElementById("taxIn");
        const bookIN = document.getElementById("bookIN");
        const gtIN = document.getElementById("gtIN");

        document.getElementById("submitBtn").addEventListener("click", function(event) {
        const requiredFields = document.querySelectorAll("input[required], select[required]");
        let allFieldsFilled = true;

        requiredFields.forEach(field => {
            if (field.value === "") {
                allFieldsFilled = false;
            }
        });

        if (!allFieldsFilled) {
            event.preventDefault(); // Prevent form submission
            alert("Please fill out all required fields.");
        }
    });

        function calculateEndDate() {
            const startDate = new Date(startDateInput.value);
            const duration = parseInt(durationInput.value, 10);

            if (isNaN(startDate.getTime()) || isNaN(duration)) {
                return;
            }

            const endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + duration);
            endDateInput.value = endDate.toISOString().split("T")[0];
        }
        function calculateTaxAndFees() {
            const price = parseFloat(priceInput.value);

            if (isNaN(price)) {
                return;
            }

            const tax = price * 0.13;
            const bookingFee = price * 0.05;
            const grandTotal = price + tax + bookingFee;

            subtotalElement.textContent = price.toFixed(2); 
            taxElement.textContent = tax.toFixed(2);
            bookingFeeElement.textContent = bookingFee.toFixed(2);
            grandTotalElement.textContent = grandTotal.toFixed(2);
            subIN.value = subtotalElement.textContent;
            taxIn.value = taxElement.textContent;
            bookIN.value =  bookingFeeElement.textContent;
            gtIN.value = grandTotalElement.textContent;
        }

        calculateTaxAndFees();

        startDateInput.addEventListener("input", calculateEndDate);
         /*
        tripNameInput.addEventListener('mousedown', (event) => {
            event.preventDefault(); // Prevents the click on the input
        });
        countryNameInput.addEventListener('mousedown', (event) => {
            event.preventDefault(); // Prevents the click on the input
        });
        endDateInput.addEventListener('mousedown', (event) => {
            event.preventDefault(); // Prevents the click on the input
        });
        durationInput.addEventListener('mousedown', (event) => {
            event.preventDefault(); // Prevents the click on the input
        });
        priceInput.addEventListener('mousedown', (event) => {
            event.preventDefault(); // Prevents the click on the input
        });
        */

        
    </script>   

</body>
</html>
