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

$stat_carid = $_POST["stat_carid"] ;
$carstatus = $_POST["carstatus"] ;




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$rname="SELECT brand FROM cars WHERE car_id = '$stat_carid'";
$nresult = $conn->query($rname);
$reserve_names = $nresult->fetch_array()[0] ?? '';

$statname="SELECT `status` FROM cars WHERE car_id = '$stat_carid'";
$statresult = $conn->query($statname);
$reserve_stat = $statresult->fetch_array()[0] ?? '';

$q="SELECT * FROM cars WHERE car_id = '$stat_carid'";
$result = $conn->query($q);

if($result->num_rows>0)
{
  echo '<script> alert("Changed the stat of the '.$reserve_names.' from '.$reserve_stat.' to '.$carstatus.'")</script>';	
  $sq2 = "UPDATE cars SET `status` = $carstatus  WHERE car_id = $stat_carid";
  $results2 = $conn->query($sq2);
  echo "<script>window.location.href='http://localhost/CRform/adminDashboard/ManageCar/managecarlist.php'; </script>";
}
else
{
    echo "<script>alert('no car with that ID');</script>";
    echo "<script>window.location.href='http://localhost/CRform/adminDashboard/ManageCar/managecarlist.php'; </script>";
}

$conn->close();
?>