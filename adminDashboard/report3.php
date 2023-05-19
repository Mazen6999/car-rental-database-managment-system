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

$date_input = $_POST["date3"];
$date_date_input = date("Y-m-d", strtotime($date_input));




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

<div class="container-fluid"> <h1>Report 3: </h1>
        <div class="panel-body"><b><u>Reserved Cars on That day</u></b> 
                        <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">

                            <thead>
                        <tr>
                        <th>car_id</th><th>CarBrand</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>car_id</th><th>CarBrand</th> 
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $q = "SELECT c.car_id, c.brand
                                    FROM reservations AS r JOIN cars AS c ON r.car_id=c.car_id 
                                    WHERE '$date_input' BETWEEN r.initial_date AND r.final_date; ";  

                         $query = $dbh->prepare($q);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);

                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                
                                <td><?php echo htmlentities($result->car_id); ?></td>
                                <td><?php echo htmlentities($result->brand); ?></td>
                            </tr>
                            <?php }
                         }  $conn->close();?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="container-fluid"> 
        <div class="panel-body"> <b><u>Cars not reserved on That day</u></b> 
                        <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">

                    <thead>
                        <tr>
                        <th>car_id</th><th>CarBrand</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>car_id</th><th>CarBrand</th> 
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $q = "SELECT c.car_id, c.brand 
                                    FROM cars As c
                                    Where c.car_id NOT IN (SELECT c.car_id
                                    FROM reservations AS r JOIN cars AS c ON r.car_id=c.car_id 
                                    WHERE '2022-12-30' BETWEEN r.initial_date AND r.final_date); ";  

                         $query = $dbh->prepare($q);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);

                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                
                                <td><?php echo htmlentities($result->car_id); ?></td>
                                <td><?php echo htmlentities($result->brand); ?></td>
                            </tr>
                            <?php }
                         }  ?>
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