<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "azphbsystem";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input safely
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['adminUsername'];
    $password = $_POST['adminPassword'];

// Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM adminusers WHERE username= ?");
    $stmt->bind_param("s", $username );
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

    // Verify password
        if ($password = $hashed_password){
            echo "Login successful! Welcome.";
            echo '<br><a href="admindash.html"><button>Go to Admin Main Page</button></a>';
        } else {
            echo "Invalid password.";
        }

        } else {
            echo "No such user found.";
        }


    }


    $stmt->close();
$conn->close();
?>
