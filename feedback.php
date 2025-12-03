<?php
$host = 'localhost';
$username = 'toniann';
$password = 'password123';
$dbname = 'mysql';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name'])) {
    $name = '%'.$_GET['name'].'%'; 
    $stmt = $conn->prepare("SELECT * FROM eventschedule WHERE name LIKE :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);

    if ($results) {
        foreach ($results as $row) {
            echo "Name: " . htmlspecialchars($row['Name']) . "<br>";
            echo "Email: " . htmlspecialchars($row['Email Address']) . "<br>";
            //echo "Country: " . htmlspecialchars($row['country']) . "<br>";
            echo "Description: " . htmlspecialchars($row['Description']) . "<br><br>";
        }
    } else {
        echo "No feedback found for the name: " . htmlspecialchars($name);
    }

} 
//elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['event_id']) && isset($_GET['feedback'])) {
    //$event_id = $_GET['event_id'];
    //$feedback = $_GET['feedback'];

    //$stmt = $conn->prepare("UPDATE eventschedule SET Feedback = :feedback WHERE EventID = :event_id");
    //$stmt->bindParam(':feedback', $feedback);
    //$stmt->bindParam(':event_id', $event_id);

    //if ($stmt->execute()) {
       // echo "Feedback updated successfully for Event ID: " . htmlspecialchars($event_id);
    //} else {
        //echo "Error updating feedback.";
    //}
//}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['event_id'])) {
    $eventID = $_GET['event_id'];
    
    $stmt = $conn->prepare("SELECT * FROM eventschedule WHERE EID = :event_id");
    $stmt->bindParam(':event_id', $eventID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        // Display person data as HTML (like the name search does)
        echo "<strong>Event ID (EID):</strong> " . htmlspecialchars($result['EID']) . "<br>";
        echo "<strong>Name:</strong> " . htmlspecialchars($result['Name']) . "<br>";
        echo "<strong>Email Address:</strong> " . htmlspecialchars($result['Email Address']) . "<br>";
        echo "<strong>Telephone Number:</strong> " . htmlspecialchars($result['Telephone Number']) . "<br>";
        echo "<strong>Residency Status:</strong> " . htmlspecialchars($result['Residency Status']) . "<br>";
        echo "<strong>Event Name:</strong> " . htmlspecialchars($result['Event Name']) . "<br>";
        echo "<strong>Event Date:</strong> " . htmlspecialchars($result['Event Date']) . "<br>";
        echo "<strong>Equipment Needed:</strong> " . htmlspecialchars($result['Equipment Needed']) . "<br>";
        echo "<strong>Amount:</strong> $" . htmlspecialchars($result['Amount']) . "<br>";
        echo "<strong>Description:</strong> " . htmlspecialchars($result['Description']) . "<br>";
        
        if (!empty($result['Feedback'])) {
            echo "<strong>Current Feedback:</strong> " . htmlspecialchars($result['Feedback']) . "<br>";
        }
    } else {
        echo "No person found with Event ID: " . htmlspecialchars($eventID);
    }
}

// Save feedback for a person
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_feedback') {
    $eventID = $_POST['event_id'];
    $feedback = $_POST['feedback'];
    
    // First check if the person exists
    $stmt = $conn->prepare("SELECT * FROM eventschedule WHERE EID = :event_id");
    $stmt->bindParam(':event_id', $eventID);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($person) {
        // Update the feedback for this person
        $updateStmt = $conn->prepare("UPDATE eventschedule SET Feedback = :feedback WHERE EID = :event_id");
        $updateStmt->bindParam(':feedback', $feedback);
        $updateStmt->bindParam(':event_id', $eventID);
        
        if ($updateStmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Feedback saved successfully for ' . htmlspecialchars($person['Name'])
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error saving feedback to database'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No person found with Event ID: ' . htmlspecialchars($eventID)
        ]);
    }
}

else {
    echo "Invalid request.";
}

?>