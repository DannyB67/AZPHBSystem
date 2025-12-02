<?php
$host = "localhost";
$username = "azphdb_user";
$password = "";
$dbname = "azph b system";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

