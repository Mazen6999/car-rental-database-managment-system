<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','car_rental');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
try
{
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

<style>
   body {
    background-color: whitesmoke; 
    background-repeat: repeat;
    background-size:  cover;
  }
  .row {
    
    background-image: url("images.jpg"); 
    background-repeat: repeat;
    background-size:  cover;
  }

  .head-sec {
    background-image: url("cd1head.jpg"); 
    background-repeat: repeat;
    background-size:  cover;
  }
</style>





</head>



<body>
  <div class="container">
          <!--Page Header-->
          <br>
          <div class="row"  >
            
                  
                
          <div class="col-md-3"><h1 style="color: rgb(255, 255, 230)">Car Listing</h1></div>
          <div class="col-md-6"></div>
          <div class="col-md-3"><br><button type="button" onclick="window.location.href='http://localhost/CRform/CRlogin/CRlogin.html'" class="btn btn-danger btn-lg">Log Out</button></div>
                  
          </div>
          <!-- /Page Header--> 

          <!--Listing-->

            <?php 
            //Query for Listing count
            $sql = "SELECT * from cars";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=$query->rowCount();
            ?>


          <section class="page-header listing_page">
            <form class="well form-horizontal">
            <h2 align="center" style="color: rgb(0, 0, 0)" ><span><?php echo htmlentities($cnt);?> <u>Available Cars Listed</u> </span></h2>
            </form>
          </section> 
  <div class="row">
  
  <div class="col-md-12"><button type="button" onclick="window.location.href='http://localhost/CRform/booking/reservation.php'" class="btn btn-danger btn btn-block">Book Now</button></div></div>
<br><br><br><br>

              <?php $sql = "SELECT * from cars";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
            {
            foreach($results as $result)
                { ?>
                  


                  
          <h2 style="color: rgb(0, 0, 0)" align="center">Car ID: <?php echo htmlentities($result->car_id);?></h2>
          <h3 style="color: rgb(0, 0, 0)" align="center"> <?php echo htmlentities($result->brand);?> <?php echo htmlentities($result->model);?> <?php echo htmlentities($result->year);?> model </h3>
          <div class="row">
          <br><br>
          <div class="col-md-1"></div>
          <div class="col-md-4"><img src="images/<?php echo htmlentities($result->image1);?>" class="img-circle" alt="Image" width="500" height="350" align="center"/></div>
          <div class="col-md-4"><img src="images/<?php echo htmlentities($result->image2);?>" class="img-circle" alt="Image" width="500" height="350" align="center"/></div>
                    
          </div>
                    


                        
                      
                      
      <div class="row">
      <div class="col-md-13">
                        
          <form class="well form-horizontal">
            <table id="regusers" class="display table table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
            <tr>
            <th>Seats</th>
            <th>Doors</th>
            <th>Color</th>
            <th>Fuel</th>
            <th>Location</th>
            <th>Plate ID</th>
            <th>Daily Price</th>
            </tr>
            </thead>
            <tbody>             
              <tr>
              <td><?php echo htmlentities($result->seats); ?></td>
              <td><?php echo htmlentities($result->doors); ?></td>
              <td><?php echo htmlentities($result->color); ?></td>
              <td><?php echo htmlentities($result->fuel); ?></td>
              <td><?php echo htmlentities($result->location); ?></td>
              <td><?php echo htmlentities($result->plate_id); ?></td>
              <td><?php echo htmlentities($result->price); ?></td>
              </tr>
            </tbody>
            </table>
          </form>
      </div>
    </div>
  <br><br><br><br><br><br> <?php }} ?>
  </div>
</body>
</html>