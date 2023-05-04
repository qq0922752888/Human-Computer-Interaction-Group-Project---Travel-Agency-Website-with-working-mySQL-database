<?php
// Include your database connection file
require_once "connection.php";

if (isset($_POST['delete_trip'])) {
    $booking_num = $_POST['booking_num'];

    $delete_query = "DELETE FROM Travelled_trip WHERE booking_num = ?";
    $stmt = $connection->prepare($delete_query);
    $stmt->bind_param("i", $booking_num);
    
    if ($stmt->execute()) {
        // Redirect back to the page with the table
        header("Location: managebooking.php?delete_success");
    } else {
        // Redirect back to the page with the table and show an error message
        header("Location: managebooking.php?delete_error");
    }
}
?>