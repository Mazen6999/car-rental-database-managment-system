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

$start_date = $_POST["startd2"];
$start_input = date("Y-m-d", strtotime($start_date));
 


$end_date = $_POST["returnd2"];
$end_input = date("Y-m-d", strtotime($end_date));



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
        <div class="panel-body"><h1>Report 2: </h1>
                        <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">

                    <thead>
                        <tr>
                        <th>book_id</th><th>car_id</th><th>sub_id</th><th>reservation_date</th>
                            <th>initial_date</th><th>final_date</th><th>completed</th><th>car_id</th><th>model</th>
                            <th>brand</th><th>year</th><th>status</th><th>seats</th>
                            <th>doors</th><th>color</th><th>fuel</th><th>plate_id</th><th>price</th><th>location</th>
                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                        <th>book_id</th><th>car_id</th><th>sub_id</th><th>reservation_date</th>
                            <th>initial_date</th><th>final_date</th><th>completed</th><th>car_id</th><th>model</th>
                            <th>brand</th><th>year</th><th>status</th><th>seats</th>
                            <th>doors</th><th>color</th><th>fuel</th><th>plate_id</th><th>price</th><th>location</th>
                            
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $q = "SELECT * 
                                    FROM reservations AS r JOIN cars AS c ON r.car_id=c.car_id 
                                    WHERE r.reservation_date BETWEEN '$start_date' AND '$end_date'; ";  

                         $query = $dbh->prepare($q);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);

                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                <td><?php echo htmlentities($result->book_id); ?></td>
                                <td><?php echo htmlentities($result->car_id); ?></td>
                                <td><?php echo htmlentities($result->sub_id); ?></td>
                                <td><?php echo htmlentities($result->reservation_date); ?></td>
                                <td><?php echo htmlentities($result->initial_date); ?></td>
                                <td><?php echo htmlentities($result->final_date); ?></td>
                                <td><?php echo htmlentities($result->completed); ?></td>
                                <td><?php echo htmlentities($result->car_id); ?></td>
                                <td><?php echo htmlentities($result->model); ?></td>
                                <td><?php echo htmlentities($result->brand); ?></td>
                                <td><?php echo htmlentities($result->year); ?></td>
                                <td><?php echo htmlentities($result->status); ?></td>
                                <td><?php echo htmlentities($result->seats); ?></td>
                                <td><?php echo htmlentities($result->doors); ?></td>
                                <td><?php echo htmlentities($result->color); ?></td>
                                <td><?php echo htmlentities($result->fuel); ?></td>
                                <td><?php echo htmlentities($result->plate_id); ?></td>
                                <td><?php echo htmlentities($result->price); ?></td>
                                <td><?php echo htmlentities($result->location); ?></td>
                                
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