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

$email = $_POST["email"] ;
$Rpassword = $_POST["user_password"];
$md5password = md5($Rpassword);

$model = $_POST["carmodel"];
$brand = $_POST["carbrand"];
$year = $_POST["caryear"];
$seats = $_POST["carseats"];
$doors = $_POST["cardoors"];
$color = $_POST["carcolor"];
$fuel = $_POST["carfuel"];
$location = $_POST["location"];

$pickDate = $_POST["pickupdate"];
$reservationDate = date("Y-m-d");
$returnDate = $_POST["returndate"];


$rD = strtotime($returnDate);
$pD = strtotime($pickDate);
$daysdiff = ($rD - $pD)/(60*60*24);




if($pickDate < $reservationDate    )
{
  echo '<script> alert("Pickup date is already in the past")</script>';
  echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
} 
else if($returnDate < $reservationDate)
{
  echo '<script> alert("Return date is already in the past")</script>';
  echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
}
else if($pickDate > $returnDate)
{
  echo '<script> alert("You can not return before pickup")</script>';
  echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
}
else {

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

//USER NAME
  $rname = "SELECT lastname FROM subscriber WHERE email = '$email' AND `password`='$md5password'";
  $nresult = $conn->query($rname);
  $reserve_names = $nresult->fetch_array()[0] ?? '';

  $q = "SELECT * FROM subscriber WHERE email = '$email' AND `password`='$md5password'";
  $result = $conn->query($q);

  if ($result->num_rows > 0) {
    echo '<script> alert("Reservation by: Mr/Mrs.' . $reserve_names . '")</script>';
  } else {
    echo "<script>alert('no such User credintials');</script>";
    echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
  }

//PRICE NUMBER
  $get_price = "SELECT price FROM `cars` WHERE model='$model' AND brand='$brand' AND `cars`.`year`='$year' AND seats='$seats' AND doors='$doors' AND color='$color' AND fuel='$fuel' AND `location`='$location' AND `status`=0 ";
  $price_result = $conn->query($get_price);
  $reserve_price = $price_result->fetch_array()[0] ?? '';
  $pricee = (int) $reserve_price * (int) $daysdiff;

//BRAND NAME
  $rCname = "SELECT brand FROM `cars` WHERE model='$model' AND brand='$brand' AND `cars`.`year`='$year' AND seats='$seats' AND doors='$doors' AND color='$color' AND fuel='$fuel' AND `location`='$location' AND `status`=0 ";
  $nCresult = $conn->query($rCname);
  $reserve_names = $nCresult->fetch_array()[0] ?? '';


  $q = "SELECT * FROM `cars` WHERE model='$model' AND brand='$brand' AND `cars`.`year`='$year' AND seats='$seats' AND doors='$doors' AND color='$color' AND fuel='$fuel' AND `location`='$location' AND `status`=0 ";
  $query = $dbh->prepare($q);
  $query->execute();
  $idresults = $query->fetchAll(PDO::FETCH_OBJ);

  $qcid = "SELECT * FROM subscriber WHERE email = '$email' ";
  $query = $dbh->prepare($qcid);
  $query->execute();
  $cidresults = $query->fetchAll(PDO::FETCH_OBJ);


  $result = $conn->query($q);

  if ($result->num_rows > 0) {

    echo '<script> alert("You have reserved the ' . $reserve_names . '")</script>';
    echo '<script> alert("Your Total Price is $ ' . $pricee . ', We will Contact you later !")</script>';

    foreach ($idresults as $idresult) {
      $sql2 = "UPDATE cars SET `status` = 1 WHERE car_id= $idresult->car_id";
      $results2 = $conn->query($sql2);
    }
    foreach ($cidresults as $cidresult)
      $sql = "INSERT INTO `reservations` (`book_id`, `car_id`, `sub_id`, `reservation_date`, `initial_date`, `final_date`, `completed`) 
          VALUES (NULL, '$idresult->car_id', '$cidresult->sub_id', '$reservationDate', '$pickDate', '$returnDate', 0)";
      $result = $conn->query($sql);
      echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
    } else {
    echo "<script>alert('no such car credintials is available');</script>";
    echo "<script>window.location.href='http://localhost/CRform/booking/reservation.php'; </script>";
  }




  $conn->close();
}
?>