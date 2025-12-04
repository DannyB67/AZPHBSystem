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

$chairQty     = $_POST['chairQty'] ?? 0;
$tableQty     = $_POST['tableQty'] ?? 0;
$micQty       = $_POST['micQty'] ?? 0;
$standQty     = $_POST['standQty'] ?? 0;
$hdmiQty      = $_POST['hdmiQty'] ?? 0;
$projectorQty = $_POST['projectorQty'] ?? 0;
$screenQty    = $_POST['screenQty'] ?? 0;
$drumQty      = $_POST['drumQty'] ?? 0;
$dSetQty      = $_POST['dSetQty'] ?? 0;

$stmt = $conn -> prepare("INSERT INTO `event_request`
    (`Name`, `Email Address`, `Telephone Number`, `Residency Status`, `Event Name`, `Venue`, `Event Date`, `Description`, `Chairs`, `Tables`, `Mic`, `Mic Stand`, `HDMI Cord`, `Projector`, `Projector Screen`, `Drum`, `Drum_Set`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt -> bind_param("ssssssssiiiiiiiii", 
$name, 
$email, 
$phone, 
$status, 
$eventName, 
$venue, 
$date, 
$details, 
$chairQty,
$tableQty,
$micQty,
$standQty,
$hdmiQty,
$projectorQty,
$screenQty,
$drumQty,
$dSetQty
);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Your booking request was submitted successfully! You will receive an email shortly with your booking details."
    ]);

    $command = escapeshellcmd("python mailSender.py " .
    escapeshellarg($name) . " " .
    escapeshellarg($email) . " " .
    escapeshellarg($eventName) . " " .
    escapeshellarg($details) . " " .
    escapeshellarg($date) . " " .
    escapeshellarg($venue));
    $output = shell_exec($command);
    
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error submitting request: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>
