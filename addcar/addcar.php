<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$model = $_POST["carmodel"];
$brand = $_POST["carbrand"];
$year = $_POST["caryear"];
$status = $_POST["carstatus"];
$seats = $_POST["carseats"];
$doors = $_POST["cardoors"];
$color = $_POST["carcolor"];
$fuel = $_POST["carfuel"];
$image1 = $_POST["carimage1"];
$image2 = $_POST["carimage2"];
$price = $_POST["carprice"];
$location = $_POST["location"];
$plateid = $_POST["plateid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 $sql = "INSERT INTO `cars` (`car_id`, `model`, `brand`, `year`, `status`, `seats`, `doors`, `color`, `fuel`, `image1`, `image2`, `plate_id`, `price`, `location`) 
 VALUES (NULL, '$model', '$brand', '$year', '$status', '$seats', '$doors', '$color', '$fuel', '$image1', '$image2', '$plateid' ,'$price','$location')";

if ($conn->query($sql) === TRUE) {
     echo "<script>alert('Car added succesfully');</script>";
     echo "<script>window.location.href='http://localhost/CRform/adminDashboard/adminDashboard.html'; </script>";
} else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


