<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "eventschedule";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all events
$sql = "SELECT EID, `Event Name`, `Event Date`, Name, `Telephone Number`
        FROM eventschedule";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Schedule</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<header>
    <h1>Event Schedule</h1>
</header>

<section class="event-table-container">

<table class="event-table">
    <tr>
        <th>Event Name</th>
        <th>Date</th>
        <th>Requested By</th>
        <th>Telephone</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            echo "<td>
                    <a href='eventdetails.php?eid=" . $row['EID'] . "'>
                        " . htmlspecialchars($row['Event Name']) . "
                    </a>
                  </td>";

            echo "<td>" . $row['Event Date'] . "</td>";
            echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
            echo "<td>" . $row['Telephone Number'] . "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No events found.</td></tr>";
    }
    ?>

</table>

</section>

</body>
</html>

<?php $conn->close(); ?>
