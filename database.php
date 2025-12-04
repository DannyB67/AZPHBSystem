<?php
if(isset($_GET['request'])){

}else{
    echo "nothing for you";
    exit();
}

$host = "localhost";
$username = "azphdb_user";
$password = "";
$dbname = "mysql";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM `equipment inventory`");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($results);


//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}
echo "Connected successfully";
?>

