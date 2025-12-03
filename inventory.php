<?php 
$host = 'localhost';
$username = 'daniel';
$password = 'password123';
$dbname = 'mysql';
//Select `inventory items`.`Equipment Type`,`inventory items`.`Amount`,`inventory items`.`Description` FROM `inventory items` JOIN eventschedule ON `inventory items`.`Equipment Type`=`eventschedule`.`Equipment Needed` WHERE `inventory items`.`Amount`>=eventschedule.`Equipment Needed`;
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(isset($_GET['inventory'])){
  $stmt = $conn->query("SELECT * FROM `inventory items`");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  InventoryTable($results);
  exit;
}
if(isset($_GET['event'])){
    $date= htmlspecialchars($_GET['event']);
    $stmt = $conn->query("SELECT `inventory items`.`Equipment Type`,`inventory items`.`Amount`,`inventory items`.`Description` FROM `inventory items` JOIN eventschedule ON `inventory items`.`Equipment Type`=`eventschedule`.`Equipment Needed` WHERE `inventory items`.`Amount`>=eventschedule.`Equipment Needed` AND `eventschedule`.`Event Date`LIKE '%$date%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!$results){
        echo "no dates match";
        exit();
    }
    EventTable($results);
}

function InventoryTable($results){
echo "<table><thead><tr><th>Equipment Type</th><th>Ammount</th><th>Description</th></tr></thead><tbody>";
       foreach ($results as $row): 
        echo "<tr>";
          echo "<td>" .$row['Equipment Type']. "</td>";
          echo "<td>" .$row['Amount']. "</td>";
          echo "<td>" .$row['Description']. "</td>";
        echo "</tr>";

       endforeach; 
  echo"</tbody></table>";
}

function EventTable($results){
echo "<table><thead><tr><th>Equipment Name</th><th>Ammount</th><th>Description</th></tr></thead><tbody>";
       foreach ($results as $row): 
        echo "<tr>";
          echo "<td>" .$row['Equipment Type']. "</td>";
          echo "<td>" .$row['Amount']. "</td>";
          echo "<td>" .$row['Description']. "</td>";
          //echo "<td>" .$row['Event Name']. "</td>";
        echo "</tr>";

       endforeach; 
  echo"</tbody></table>";
}

?>