<?php

$dbhost = "localhost";
$dbuser= "root";
$dbpass = "";
$dbname = "db_4474";
$connection = new mysqli($dbhost, $dbuser,$dbpass,$dbname);

if ($connection->connect_error) {
    die("database connection failed :" .
    mysqli_connect_error() .
    "(" . mysqli_connect_errno() . ")"
        );
   }


?>
