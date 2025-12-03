<?php
// Database connection
$host = "localhost";
$username   = "root";
$password   = "";
$dbname     = "azphbsystem";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $conn->connect_error
    ]);
    exit;
}

$name       = $_POST['name'] ?? '';
$email      = $_POST['email'] ?? '';
$phone      = $_POST['phone'] ?? '';
$status     = $_POST['status'] ?? '';
$eventName  = $_POST['eventName'] ?? '';
$details    = $_POST['details'] ?? '';
$venue      = $_POST['venue'] ?? '';
$date       = $_POST['date'] ?? '';

$stmt = $conn -> prepare("INSERT INTO `event_request`
    (`Name`, `Email Address`, `Telephone Number`, `Residency Status`, `Event Name`, `Venue`, `Event Date`, `Description`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt -> bind_param("ssssssss", 
$name, 
$email, 
$phone, 
$status, 
$eventName, 
$venue, 
$date, 
$details
);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Your booking request was submitted successfully! You will receive an email shortly with your booking details."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error submitting request: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>
