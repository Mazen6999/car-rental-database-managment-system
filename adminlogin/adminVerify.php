<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$username1 = $_POST["username"];
$adminpassword = $_POST["adminpassword"];
$md5password = md5($adminpassword);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$q="SELECT * FROM admin WHERE username = '$username1'";
$result = $conn->query($q);
if($result->num_rows>0)
{
	$w="SELECT * FROM admin WHERE password = '$md5password'";
    $result = $conn->query($w);
    if($result->num_rows>0)
    {
        echo "<script>alert('Welcome admin!');</script>";
        echo "<script>window.location.href='http://localhost/CRform/adminDashboard/adminDashboard.html'; </script>";
    }
    else
    {
        echo "<script>alert('Incorrect admin credentials');</script>";
        echo "<script>window.location.href='http://localhost/CRform/adminlogin/adminlogin.html'; </script>";
    }
}
else
{
    echo "<script>alert('Incorrect admin credentials');</script>";
    echo "<script>window.location.href='http://localhost/CRform/adminlogin/adminlogin.html'; </script>";
}
$conn->close();

?>


