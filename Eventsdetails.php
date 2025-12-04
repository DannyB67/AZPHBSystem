<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "azphbsystem";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure ID was received
if (!isset($_GET['eid'])) {
    die("No event selected.");
}

$eid = intval($_GET['eid']);

// Fetch event
$sql = "SELECT * FROM eventschedule WHERE EID = $eid";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Event not found.");
}

$event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($event["Event Name"]); ?> - Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<header>
    <h1><?php echo htmlspecialchars($event["Event Name"]); ?></h1>
</header>

<section class="event-description">

    <div class="event-box">
        <h2>Event Information</h2>
        <p><strong>Event Name:</strong> <?php echo htmlspecialchars($event["Event Name"]); ?></p>
        <p><strong>Event Date:</strong> <?php echo $event["Event Date"]; ?></p>
        <p><strong>Description:</strong> 
            <?php echo $event["Description"] ? htmlspecialchars($event["Description"]) : "No description provided."; ?>
        </p>
    </div>

    <div class="event-box">
        <h2>Requester Information</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($event["Name"]); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($event["Email Address"]); ?></p>
        <p><strong>Telephone:</strong> <?php echo $event["Telephone Number"]; ?></p>
        <p><strong>Residency Status:</strong> <?php echo htmlspecialchars($event["Residency Status"]); ?></p>
    </div>

    <div class="event-box">
        <h2>Equipment & Resources</h2>
        <p><strong>Equipment Needed:</strong> <?php echo htmlspecialchars($event["Equipment Needed"]); ?></p>
        <p><strong>Amount:</strong> <?php echo htmlspecialchars($event["Amount"]); ?></p>
    </div>

    <div class="event-box">
        <h2>Feedback</h2>
        <p>
            <?php echo $event["Feedback"] ? htmlspecialchars($event["Feedback"]) : "No feedback available."; ?>
        </p>
    </div>

</section>

<div class="back-link">
    <a href="events.php">&larr; Back to Event List</a>
</div>

</body>
</html>

<?php $conn->close(); ?>
