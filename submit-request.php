<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "azphbsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Uname'];
    $email = $_POST['email'];
    $tel=$_POST['phone'];
    $status=$_POST['residencyStatus'];
    $event=$_POST['eventName'];
    $event_date=$_POST['eDate'];
    $event_time=$_POST['eTime'];
    $equipment=$_POST['equipment'];
    $amount=$_POST['amount'];
    $details = $_POST['details'];


    $stmt = $conn->prepare("INSERT INTO request (Name, `Email Address`, `Telephone Number`, `Residency Status`, `Event Name`, `Event Date`, `Event Time`, `Equipment Needed`, `Amount`, `Description`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $email, $tel, $status, $event, $event_date, $event_time, $equipment, $amount, $details);

    if ($stmt->execute()) {
        echo "Request submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();

?>
<?php
$phpVariable = $email;
$command = escapeshellcmd("python mailSender.py " . escapeshellarg($phpVariable));
$output = shell_exec($command);
echo $output;
?>
