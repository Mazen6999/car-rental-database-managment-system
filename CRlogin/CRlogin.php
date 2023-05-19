<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";
$email = $_POST["email"];
$Rpassword = $_POST["user_password"];
$md5password = md5($Rpassword);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$q="SELECT * FROM subscriber WHERE email = '$email' AND `password`='$md5password'";
$result = $conn->query($q);
if($result->num_rows>0)
{
	echo "<script>alert('Welcome !');</script>";
	echo "<script>window.location.href='http://localhost/CRform/customerdashboard/customerdashboard.php'; </script>";
}
else
{
    echo "<script>alert('no such credintials');</script>";
    echo "<script>window.location.href='http://localhost/CRform/CRlogin/CRlogin.html'; </script>";
}
$conn->close();
?>
