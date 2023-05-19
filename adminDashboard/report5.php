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

$startDate = $_POST["startd1"];
$endDate = $_POST["returnd1"];


$rD = strtotime($startDate);
$pD = strtotime($endDate);

$date0 = "0000-00-01";
$date1 = "1998-11-24";
$date2 = "1998-11-25";
$td1 = strtotime($date1);
$td2 = strtotime($date2);

$dayinc = ($td2 - $td1);
$daysdiff = ($pD - $rD)/(60*60*24);

$startSTRING = (string) $startDate;


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
        <div class="panel-body"><h1>Report 5: Daily payments within specific period</h1>
                        <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">

                   
                            <thead>
                        <tr>
                        <th>initial_date</th>
                        <th>Money from reservations</th>
                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                        <th>Final_date</th>
                        <th>Money from reservations</th>
                            
                        </tr>
                    </tfoot>

                    <tbody>

                        



                        <?php

                        for ($i = 0; $i < $daysdiff+1; $i++) {

                           


                            $q = "SELECT SUM(c.price) as priceSUM
                                  FROM reservations AS r JOIN cars AS c ON r.car_id=c.car_id
                                  WHERE '$startDate' BETWEEN r.final_date AND r.initial_date;
                             ";

                            $query = $dbh->prepare($q);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>

                            <tr>
                                
                                <td><?php echo htmlentities($startDate); ?></td>
                                <td><?php echo htmlentities($result->priceSUM); ?></td>
                                
                                
                            </tr>
                            <?php }
                            }
                            $startDate=strftime("%Y-%m-%d", strtotime("$startDate +1 day"));
                        } $conn->close();?>
                    
                    
                    
                    
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