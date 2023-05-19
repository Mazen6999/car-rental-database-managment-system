<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'car_rental');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>


<script>
    function searchTable() {
        
       
        var search_brand    = document.getElementById("search_brand").value;
        var search_model    = document.getElementById("search_model").value;
        var search_year     = document.getElementById("search_year").value;
        var search_seats    = document.getElementById("search_seats").value;
        var search_doors    = document.getElementById("search_doors").value;
        var search_color    = document.getElementById("search_color").value;
        var search_fuel     = document.getElementById("search_fuel").value;
        var search_location = document.getElementById("search_location").value;
        var search_budget   = document.getElementById("search_budget").value;
        
      
        var search_brand_emFlag;
        var search_model_emFlag;
        var search_year_emFlag;
        var search_seats_emFlag;
        var search_doors_emFlag;
        var search_color_emFlag;
        var search_fuel_emFlag;
        var search_location_emFlag;
        var search_budget_emFlag;
        
        var table = document.getElementById("r");
        var rows = table.getElementsByTagName("tr");


    

        for (var i = 2; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var size=cells.length;
            var found = false;

            
            if(search_brand.toLowerCase() == ""){ search_brand_emFlag = 1;  } else {search_brand_emFlag = (cells[0].textContent.toLowerCase()==search_brand.toLowerCase());}
            if(search_model.toLowerCase() == ""){ search_model_emFlag = 1;  } else {search_model_emFlag = (cells[1].textContent.toLowerCase()==search_model.toLowerCase());}
            if(search_year.toLowerCase() == ""){ search_year_emFlag = 1;  } else {search_year_emFlag = (cells[2].textContent.toLowerCase()==search_year.toLowerCase());}
            if(search_seats.toLowerCase() == ""){ search_seats_emFlag = 1;  } else {search_seats_emFlag = (cells[3].textContent.toLowerCase()==search_seats.toLowerCase());}
            if(search_doors.toLowerCase() == ""){ search_doors_emFlag = 1;  } else {search_doors_emFlag = (cells[4].textContent.toLowerCase()==search_doors.toLowerCase());}
            if(search_color.toLowerCase() == ""){ search_color_emFlag = 1;  } else {search_color_emFlag = (cells[5].textContent.toLowerCase()==search_color.toLowerCase());}
            if(search_fuel.toLowerCase() == ""){ search_fuel_emFlag = 1;  } else {search_fuel_emFlag = (cells[6].textContent.toLowerCase()==search_fuel.toLowerCase());}
            if(search_location.toLowerCase() == ""){ search_location_emFlag = 1;  } else {search_location_emFlag = (cells[7].textContent.toLowerCase()==search_location.toLowerCase());}
            if(search_budget.toLowerCase() == ""){ search_budget_emFlag = 1;  } else {search_budget_emFlag = (Number(cells[8].textContent.toLowerCase())<=Number(search_budget.toLowerCase()));}


            if (search_brand_emFlag && search_model_emFlag && search_year_emFlag && search_seats_emFlag && search_doors_emFlag && search_color_emFlag && search_fuel_emFlag && search_location_emFlag && search_budget_emFlag ) 
                {found = true;}
            if (found) { rows[i].style.display = "";} else { rows[i].style.display = "none";} 
        }
}	 
</script>
<?php
session_start();
error_reporting(0);
if(1){
?>

<!doctype html>
<html lang="en" class="no-js">

<head>

    <title>reserve car</title>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    <style>
        body {
            background-image: url("123.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>

<div class="container-fluid"> 
<form class="well form-horizontal" action="reserve.php"  method="post" id="res_form">
  <fieldset>

    <!-- Form Name -->
    <legend><center><h2><b>Reserver a Car</b></h2></center></legend><br>

    <legend><center><h4><b>User Credentials</b></h4></center></legend>
    <div class="form-group">
      <label class="col-md-4 control-label">E-Mail</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" >Password</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
      <input name="user_password" placeholder="Password" class="form-control"  type="password">
        </div>
      </div>
    </div>
    
    
    <br><legend><center><h4><b>Car Details</b></h4></center></legend>
    <!-- Text input-->


    <div class="form-group">
      <label class="col-md-4 control-label" >Car Brand</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="carbrand" placeholder="car brand" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Car Model</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="carmodel" placeholder="car model" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Model Year</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="caryear" placeholder="Year" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Number of Seats</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="carseats" placeholder="Seats" class="form-control"  type="number">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Number of Doors</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="cardoors" placeholder="doors" class="form-control"  type="number">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Car color</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="carcolor" placeholder="Color" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Fuel Type</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input name="carfuel" placeholder="Fuel" class="form-control"  type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label">Location</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <input  name="location" placeholder="location" class="form-control"  type="text">
        </div>
      </div>
    </div>


    <br><legend><center><h4><b>Reservation period</b></h4></center></legend>
    <!-- Date input-->
      <div class="form-group">
        <label class="col-md-4 control-label">Pickup Date:</label>  
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>  
            <input name="pickupdate" class="form-control" type="date">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">Return Date:</label>  
          <div class="col-md-4 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>  
            <input name="returndate" class="form-control" type="date">
          </div>
        </div>
      </div>

    <!-- BUTTON -->
    <br>
      <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5"><button type="submit" class="btn btn-warning" >Reserve</button></div>
      </div>
    </fieldset>
</form>



    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">
                <br>
                <form class="well form-horizontal">
                    <h3 align="middle" style="color:rgb(0, 0, 0)">List of available cars</h3>
                </form>
            </div>

            <div class="col-md-6"></div>
            <div class="col-md-3"><br><br><br><br><button
                    onclick="window.location.href='http://localhost/CRform/customerdashboard/customerdashboard.php'"
                    type="button" class="btn btn-danger btn-lg btn-block">Back</button></div>
        </div>
        
        <!-- Zero Configuration Table -->
        <div class="panel panel-info">
            <div class="panel-heading">
                
                    <label>Advanced Search For user during reservation:</label>
                        <div class="row">
                        
                        <div class="col-md-1"><input class="form-control" type="text" id="search_brand" placeholder="Brand"></div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_model" placeholder="Model"></div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_year" placeholder="Year"> </div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_seats" placeholder="Seats"> </div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_doors" placeholder="Doors"> </div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_color" placeholder="Color"> </div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_fuel" placeholder="Fuel"> </div>
                        <div class="col-md-2"><input class="form-control" type="text" id="search_location" placeholder="Location"> </div>
                        <div class="col-md-1"><input class="form-control" type="text" id="search_budget" placeholder="Budget"> </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"><input type="button" value="Search" onclick="searchTable()"> </div>
                        </div>
            </div>

            <div class="panel-body">
                <table id="r" class="display table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">

                    <thead>
                        <tr>
                            <th>brand</th><th>model</th><th>year</th><th>seats</th>
                            <th>doors</th><th>color</th><th>fuel</th><th>location</th><th>price</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>brand</th><th>model</th><th>year</th><th>seats</th>
                            <th>doors</th><th>color</th><th>fuel</th><th>location</th><th>price</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $sql = "SELECT * from  cars where status=0 ";
                         $query = $dbh->prepare($sql);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);
                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                <td><?php echo htmlentities($result->brand); ?></td>
                                <td><?php echo htmlentities($result->model); ?></td><td><?php echo htmlentities($result->year); ?></td>
                                <td><?php echo htmlentities($result->seats); ?></td><td><?php echo htmlentities($result->doors); ?></td>
                                <td><?php echo htmlentities($result->color); ?></td><td><?php echo htmlentities($result->fuel); ?></td>
                                <td><?php echo htmlentities($result->location); ?></td><td><?php echo htmlentities($result->price); ?></td>
                            </tr>
                            <?php }
                         } ?>
                    </tbody>
                </table>
            </div>
       </div>
    </div>
    



    
    <br>
    <br>
    <!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<!--<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script> -->
<script  src="./reserveval.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js'></script>
</body>

</html>
<?php } ?>