<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','car_rental');

$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$deletecarid = $_POST["deletecar"] ;




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$rname="SELECT brand FROM cars WHERE car_id = '$deletecarid'";
$nresult = $conn->query($rname);
$reserve_names = $nresult->fetch_array()[0] ?? '';

$q="SELECT * FROM cars WHERE car_id = '$deletecarid'";
$result = $conn->query($q);

if($result->num_rows>0)
{
  echo '<script> alert("The '.$reserve_names.' has been deleted successfully")</script>';	
  $sql2 = "DELETE FROM cars  WHERE car_id= $deletecarid";
  $results2 = $conn->query($sql2);
  echo "<script>window.location.href='http://localhost/CRform/adminDashboard/ManageCar/managecarlist.php'; </script>";
}
else
{
    echo "<script>alert('no car with that ID');</script>";
    echo "<script>window.location.href='http://localhost/CRform/adminDashboard/ManageCar/managecarlist.php'; </script>";
}

$conn->close();
?>