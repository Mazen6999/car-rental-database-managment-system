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

$deleterservid = $_POST["deleterserv"] ;




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$q="SELECT * FROM reservations WHERE book_id = '$deleterservid'";
$result = $conn->query($q);

if($result->num_rows>0)
{
    $rname="SELECT lastname FROM subscriber WHERE sub_id IN ( SELECT sub_id FROM reservations WHERE book_id = $deleterservid )";
    $nresult = $conn->query($rname);
    $reserve_names = $nresult->fetch_array()[0] ?? '';
    
    $cname="SELECT brand FROM cars WHERE car_id IN ( SELECT car_id FROM reservations WHERE book_id = $deleterservid )";
    $cresult = $conn->query($cname);
    $reserve_brand = $cresult->fetch_array()[0] ?? '';
    
    $cidname="SELECT car_id FROM cars WHERE car_id IN ( SELECT car_id FROM reservations WHERE book_id = $deleterservid )";
    $cidresult = $conn->query($cidname);
    $reserve_carid = $cidresult->fetch_array()[0] ?? '';
    
    
  
  echo '<script> alert("The uncompleted reservation of Mr/Mrs. '.$reserve_names.' of the '.$reserve_brand.' has been deleted successfully")</script>';	
  $sql2 = "DELETE FROM reservations  WHERE book_id= $deleterservid";
  $results2 = $conn->query($sql2);
  $sql2 = "UPDATE cars SET `status` = 0  WHERE car_id = $reserve_carid";
  $results2 = $conn->query($sql2);
  echo "<script>window.location.href='http://localhost/CRform/adminDashboard/reservation/uncompreservs.php'; </script>";
}
else
{
    echo "<script>alert('no uncompleted Reservation with Such Booking ID');</script>";
    echo "<script>window.location.href='http://localhost/CRform/adminDashboard/reservation/uncompreservs.php'; </script>";
}

$conn->close();
?>