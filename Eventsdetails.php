<?php
// eventdetails.php

if (!isset($_GET['eid'])) {
    echo "No event ID provided.";
    exit;
}

$eid = intval($_GET['eid']);

$conn = new mysqli("localhost", "root", "", "azphbsystem");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM eventschedule WHERE EID = $eid";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "No event found with ID $eid";
    exit;
}

$row = $result->fetch_assoc();

// Store variables safely
$name        = $row['Name'] ?? "";
$email       = $row['Email Address'] ?? "";
$telephone   = $row['Telephone Number'] ?? "";
$residency   = $row['Residency Status'] ?? "";
$eventName   = $row['Event Name'] ?? "";
$eventDate   = $row['Event Date'] ?? "";
$equipment   = $row['Equipment Needed'] ?? "";
$amount      = $row['Amount'] ?? "";
$description = $row['Description'] ?? "N/A";
$feedback    = $row['Feedback'] ?? "N/A";


// Display in required order:
echo "<h2>Specific Event Details</h2><hr>";

echo "<h3><u>Client Details</u></h3>";
echo "<p><strong>Name:</strong> $name</p>";
echo "<p><strong>Email Address:</strong> $email</p>";
echo "<p><strong>Telephone Number:</strong> $telephone</p>";
echo "<p><strong>Residency Status:</strong> $residency</p><br>";

echo "<h3><u>Event Details</u></h3>";
echo "<p><strong>Event Name:</strong> $eventName</p>";
echo "<p><strong>Event Date:</strong> $eventDate</p>";
echo "<p><strong>Equipment Needed:</strong> $equipment</p>";
echo "<p><strong>Amount:</strong> $amount</p>";
echo "<p><strong>Description:</strong> $description</p>";
echo "<p><strong>Feedback:</strong> $feedback</p>";

// Adds in a back button to the Events.html page.
echo '<br><br><a href="Events.html"><button type="button" id="button">← Back to Event Schedule</button></a>';
$conn->close();
?>
