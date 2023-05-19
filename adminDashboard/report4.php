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

$input = $_POST["input4"];



  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>
<!DOCTYPE html>
<html lang="en" >
<head>

    <title>reserve car</title>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    
</head>

<div class="container-fluid"> 
        <div class="panel-body"><h1>Report 4: </h1>
                        <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">

                    <thead>
                        <tr>
                        <th>sub_id</th><th>firstname</th><th>lastname</th><th>email</th>
                            <th>address</th><th>contact_no</th><th>model</th><th>plate_id</th>
                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                        <th>sub_id</th><th>firstname</th><th>lastname</th><th>email</th>
                            <th>address</th><th>contact_no</th><th>model</th><th>plate_id</th>
                            
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $q = "SELECT s.sub_id,s.firstname,s.lastname,s.email,s.address,s.contact_no,c.model,c.plate_id
                                    FROM reservations AS r JOIN cars AS c ON r.car_id=c.car_id 
                                    JOIN subscriber as s ON r.sub_id=s.sub_id
                                    WHERE r.sub_id = $input; ";  

                         $query = $dbh->prepare($q);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);

                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                
                                <td><?php echo htmlentities($result->sub_id); ?></td>
                                <td><?php echo htmlentities($result->firstname); ?></td>
                                <td><?php echo htmlentities($result->lastname); ?></td>
                                <td><?php echo htmlentities($result->email); ?></td>
                                <td><?php echo htmlentities($result->address); ?></td>
                                <td><?php echo htmlentities($result->contact_no); ?></td>
                                <td><?php echo htmlentities($result->model); ?></td>
                                <td><?php echo htmlentities($result->plate_id); ?></td>
                                
                            </tr>
                            <?php }
                         }  $conn->close();?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3"><button
                onclick="window.location.href='http://localhost/CRform/adminDashboard/adminDashboard.html'"
                type="button" class="btn btn-danger btn-lg btn-block">Back</button>
        </div>
    </div>
    <br>


</html>