<?php
// EventTables.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$conn = new mysqli("localhost", "root", "", "azphbsystem");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all events
$sql = "SELECT EID, `Event Name`, `Event Date`, Name, `Residency Status` FROM eventschedule";
$result = $conn->query($sql);

// If AJAX request → return JSON
if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($events);
    exit();
}

// HTML table version
echo '<!DOCTYPE html><html><head><meta charset="UTF-8">';
echo '<title>Event Schedule</title>';
echo '<link rel="stylesheet" href="eventstyles.css"></head><body>';

echo '<h1>Event Schedule</h1>';
echo '<table class="event-table">';
echo '<tr><th>Event Name</th><th>Date</th><th>Requested By</th><th>Residency Status</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td><a href='Eventsdetails.php?eid=" . $row['EID'] . "'>" . $row['Event Name'] . "</a></td>";
        echo '<td>' . $row['Event Date'] . '</td>';
        echo '<td>' . htmlspecialchars($row['Name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Residency Status']) . '</td>';
        echo "</tr>";
    }
} else {
    echo '<tr><td colspan="4">No events found.</td></tr>';
}

echo "</table></body></html>";

$conn->close();
?>
