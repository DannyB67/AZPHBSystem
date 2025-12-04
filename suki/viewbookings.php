
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

$sql = "SELECT * FROM event_request";
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
        $details =htmlspecialchars($row['Description']);
        $chair =htmlspecialchars($row['Chairs']);
        $table =htmlspecialchars($row['Tables']);
        $mic =htmlspecialchars($row['Mic']);
        $stand =htmlspecialchars($row['Mic Stand']);
        $hdmi =htmlspecialchars($row['HDMI Cord']);
        $projector =htmlspecialchars($row['Projector']);
        $screen =htmlspecialchars($row['Projector Screen']);
        $drum =htmlspecialchars($row['Drum']);
        $dSet =htmlspecialchars($row['Drum_Set']);
        
        echo 
        "<table><tr>
        <th>Name</th>
        <th>Email Address</th>
        <th>Telephone Number</th>
        <th>Residency Status</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Description</th>
        <th>Chairs</th>
        <th>Tables</th>
        <th>Mic</th>
        <th>Mic Stand</th>
        <th>HDMI Cord</th>
        <th>Projector</th>
        <th>Projector Screen</th>
        <th>Drum</th>
        <th>Drum Set</th>
        </tr>
        
        <tr>
        <td>$name</td>
        <td>$email</td>
        <td>$tel</td>
        <td>$status</td>
        <td>$event</td>
        <td>$event_date</td>
        <td>$details</td>
        <td>$chair</td>
        <td>$table</td>
        <td>$mic</td>
        <td>$stand</td>
        <td>$hdmi</td>
        <td>$projector</td>
        <td>$screen</td>
        <td>$drum</td>
        <td>$dSet</td>
        </tr></table><br>
        ";
        
    }
        






$conn->close();
}
  

?>

