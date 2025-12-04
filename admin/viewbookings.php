
<?php
header ('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'azphbsystem';

$context = filter_input(INPUT_GET, 'context', FILTER_SANITIZE_STRING);

$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM request";
$result = $conn->query($sql);

$results = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
    foreach ($results as $row) {

        $name =htmlspecialchars($row['Name']);
        $email =htmlspecialchars($row['Email Address']);
        $tel =htmlspecialchars($row['Telephone Number']);
        $status =htmlspecialchars($row['Residency Status']);
        $event =htmlspecialchars($row['Event Name']);
        $event_date =htmlspecialchars($row['Event Date']);
        $event_time =htmlspecialchars($row['Event Time']);
        $equipment =htmlspecialchars($row['Equipment Needed']);
        $amount =htmlspecialchars($row['Amount']);
        $details =htmlspecialchars($row['Description']);
        
        echo 
        "<table><tr>
        <th>Name</th>
        <th>Email Address</th>
        <th>Telephone Number</th>
        <th>Residency Status</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Time</th>
        <th>Equipment Needed</th>
        <th>Amount</th>
        <th>Description</th></tr>
        
        <tr>
        <td>$name</td>
        <td>$email</td>
        <td>$tel</td>
        <td>$status</td>
        <td>$event</td>
        <td>$event_date</td>
        <td>$event_time</td>
        <td>$equipment</td>
        <td>$amount</td>
        <td>$details</td></tr></table><br>
        ";
        
    }
        






$conn->close();
}
  

?>

