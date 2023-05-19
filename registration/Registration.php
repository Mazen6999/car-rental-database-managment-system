<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$email = $_POST["email"];
$Rpassword = $_POST["user_password"];
$md5password = md5($Rpassword);
$address = $_POST["address"];
$card_no = $_POST["Cardnumber"];
$card_sec = $_POST["cvc"];
$card_holder = $_POST["cardholder"];
$ssn = $_POST["ssn"];
$gender = $_POST["gender"];
$dateofbirth = $_POST["dateofbirth"];
$contact_no = $_POST["contact_no"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$q="SELECT * FROM subscriber WHERE email = '$email'";
$result = $conn->query($q);
if($result->num_rows>0)
{
	echo "<script>alert('A user of this email already exists');</script>";
	echo "<script>window.location.href='http://localhost/CRform/login.php'; </script>";
}
else
{
    $w="SELECT * FROM subscriber WHERE ssn = '$ssn'";
    $result = $conn->query($w);
    if($result->num_rows>0)
    {
        echo "<script>alert('A user of this SSN already exists');</script>";
        echo "<script>window.location.href='http://localhost/CRform/login.php'; </script>";
    }
    else
    {
        $sql = "INSERT INTO `subscriber` (`sub_id`, `firstname`, `lastname`, `email`, `password`, `address`, `card_no`, `card_sec`, `card_holder`, `ssn`, `gender`, `dateofbirth`, `contact_no`) 
        VALUES (NULL, '$firstname', '$lastname', '$email', '$md5password', '$address', '$card_no', '$card_sec', '$card_holder', '$ssn', '$gender', '$dateofbirth', '$contact_no')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Resgistration Successful. Try logging in now');</script>";
            echo "<script>window.location.href='http://localhost/CRform/login.php'; </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
}
$conn->close();
?>


