<?php
session_start();
include 'connection.php'; 

$user_id = $_SESSION['user_id'];
$trip_id = $_POST['trip_id'];

$query = "INSERT INTO wishlist (user_id, trip_id) VALUES (?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("ii", $user_id, $trip_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Success";
} else {
    echo "Error";
}

$stmt->close();
$connection->close();
?>
