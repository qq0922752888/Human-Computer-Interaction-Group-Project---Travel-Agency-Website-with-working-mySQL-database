<?php
header('Content-Type: application/json');

// Get the booking number from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$bookingNumber = $data['bookingNumber'];

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_4474";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the booking number exists in the table
$sql = "SELECT COUNT(*) as count FROM Travelled_trip WHERE booking_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bookingNumber);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Return a JSON response indicating if the number is unique
if ($row['count'] == 0) {
    echo json_encode(['unique' => true]);
} else {
    echo json_encode(['unique' => false]);
}

$stmt->close();
$conn->close();
?>