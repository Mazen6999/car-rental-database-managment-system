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
    function regsearchTable() {



        var searchTerm = document.getElementById("regsearch_term").value;
        var table = document.getElementById("regusers");
        var rows = table.getElementsByTagName("tr");
        for (var i = 2; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < 1; j++) {
                if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase() || searchTerm.toLowerCase() =="") {
                    found = true;
                }
            }
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }	 
    function GregsearchTable() {



var searchTerm = document.getElementById("Gregsearch_term").value;
var table = document.getElementById("regusers");
var rows = table.getElementsByTagName("tr");
for (var i = 2; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var found = false;
    for (var j = 0; j < cells.length; j++) {
        if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase() || searchTerm.toLowerCase() =="") {
            found = true;
        }
    }
    if (found) {
        rows[i].style.display = "";
    } else {
        rows[i].style.display = "none";
    }
}
}	
</script>


<?php
session_start();
error_reporting(0);
if(1) {
    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>6999 Registered Users</title>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet'
        href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    <style>
        body {
            background-image: url("img.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="container-fluid">

    <div class="row">
            <div class="col-md-3">
                <br>
                <form class="well form-horizontal">
                    <h2 align="middle" style="color:rgb(0, 0, 0)">All Information With search</h2>
                </form>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3"><br><br><br><br><br><button
                    onclick="window.location.href='http://localhost/CRform/adminDashboard/adminDashboard.html'"
                    type="button" class="btn btn-danger btn-lg btn-block">Back</button></div>
        </div>

        
        <!-- Zero Configuration Table -->
        <div class="panel panel-info">Registered Users:
            <div class="panel-heading">
                <form align="right">
                    <label>Search Registered User ID:</label>
                    <input type="text" id="regsearch_term" placeholder="Search...User ID">
                    <input type="button" value="Search" onclick="regsearchTable()">
                </form>
                <form align="right">
                    <label>Search Registered Users info:</label>
                    <input type="text" id="Gregsearch_term" placeholder="Search...">
                    <input type="button" value="Search" onclick="GregsearchTable()">
                </form>
            </div>

            <div class="panel-body">
                <table id="regusers" class="display table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Card_Number</th>
                            <th>Card_CVC</th>
                            <th>Card_Holder</th>
                            <th>SSN</th>
                            <th>Gender</th>
                            <th>DateOfBirth</th>
                            <th>Contact</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Card_Number</th>
                            <th>Card_CVC</th>
                            <th>Card_Holder</th>
                            <th>SSN</th>
                            <th>Gender</th>
                            <th>DateOfBirth</th>
                            <th>Contact</th>
                        </tr>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = "SELECT * from  subscriber ";
                         $query = $dbh->prepare($sql);
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
                                <td><?php echo htmlentities($result->card_no); ?></td>
                                <td><?php echo htmlentities($result->card_sec); ?></td>
                                <td><?php echo htmlentities($result->card_holder); ?></td>
                                <td><?php echo htmlentities($result->ssn); ?></td>
                                <td><?php echo htmlentities($result->gender); ?></td>
                                <td><?php echo htmlentities($result->dateofbirth); ?></td>
                                <td><?php echo htmlentities($result->contact_no); ?></td>
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
</body>

</html>
<?php } ?>



<?php   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    function carsearchTable() {
        var searchTerm = document.getElementById("carsearch_term").value;
        var table = document.getElementById("regcars");
        var rows = table.getElementsByTagName("tr");
        for (var i = 2; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < 1; j++) {
                if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase() || searchTerm.toLowerCase() =="" ) {
                    found = true;
                }
            }
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
    function GcarsearchTable() {
        var searchTerm = document.getElementById("Gcarsearch_term").value;
        var table = document.getElementById("regcars");
        var rows = table.getElementsByTagName("tr");
        for (var i = 2; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length; j++) {
                if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase() || searchTerm.toLowerCase() =="" ) {
                    found = true;
                }
            }
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
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
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet'
        href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    <style>
        body {
            background-image: url("img.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="container-fluid">



    
        
        <!-- Zero Configuration Table -->
        <div class="panel panel-info">Registered Cars:
            <div class="panel-heading">
                <form align="right">
                    <label>Search Registered Car ID:</label>

                    <input type="text" id="carsearch_term" placeholder="Search...Car ID">
                    <input type="button" value="Search" onclick="carsearchTable()">
                </form>
                <form align="right">
                    <label>Search Registered Cars info:</label>

                    <input type="text" id="Gcarsearch_term" placeholder="Search...">
                    <input type="button" value="Search" onclick="GcarsearchTable()">
                </form>
            </div>

            <div class="panel-body">
                <table id="regcars" class="display table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>model</th>
                            <th>brand</th>
                            <th>year</th>
                            <th>status</th>
                            <th>seats</th>
                            <th>doors</th>
                            <th>color</th>
                            <th>fuel</th>
                            <th>image1</th>
                            <th>image2</th>
                            <th>price</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>model</th>
                            <th>brand</th>
                            <th>year</th>
                            <th>status</th>
                            <th>seats</th>
                            <th>doors</th>
                            <th>color</th>
                            <th>fuel</th>
                            <th>image1</th>
                            <th>image2</th>
                            <th>price</th>
                        </tr>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = "SELECT * from  cars ";
                         $query = $dbh->prepare($sql);
                         $query->execute();
                         $results = $query->fetchAll(PDO::FETCH_OBJ);
                         if ($query->rowCount() > 0) 
                         {
                         foreach ($results as $result) { ?>

                            <tr>
                                <td><?php echo htmlentities($result->car_id); ?></td>
                                <td><?php echo htmlentities($result->model); ?></td>
                                <td><?php echo htmlentities($result->brand); ?></td>
                                <td><?php echo htmlentities($result->year); ?></td>
                                <td><?php echo htmlentities($result->status); ?></td>
                                <td><?php echo htmlentities($result->seats); ?></td>
                                <td><?php echo htmlentities($result->doors); ?></td>
                                <td><?php echo htmlentities($result->color); ?></td>
                                <td><?php echo htmlentities($result->fuel); ?></td>
                                <td><?php echo htmlentities($result->image1); ?></td>
                                <td><?php echo htmlentities($result->image2); ?></td>
                                <td><?php echo htmlentities($result->price); ?></td>
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
</body>

</html>
<?php } ?>



<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    function booksearchTable() {



        var searchTerm = document.getElementById("booksearch_term").value;
        var table = document.getElementById("btable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length; j++) {
                if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase() || searchTerm.toLowerCase() =="") {
                    found = true;
                }
            }
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }	 
</script>


<?php
session_start();
error_reporting(0);
if(1) {
    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>6999 Registered Users</title>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet'
        href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    <style>
        body {
            background-image: url("img.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- Zero Configuration Table -->
        <div class="panel panel-info">Whole Booking List History
            <div class="panel-heading">
                <form align="right">
                    <label>Search Bookings List:</label>

                    <input type="text" id="booksearch_term" placeholder="Search...">
                    <input type="button" value="Search" onclick="booksearchTable()">
                </form>
            </div>

            <div class="panel-body">
                <table id="btable" class="display table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Book_id</th>
                            <th>Car_id</th>
                            <th>Sub_id</th>
                            <th>reservation date</th>
                            <th>pickup date</th>
                            <th>return date</th>
                            <th>completed</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Booking #</th>
                            <th>Car_id</th>
                            <th>Sub_id</th>
                            <th>reservation date</th>
                            <th>pickup date</th>
                            <th>return date</th>
                            <th>completed</th>
                        </tr>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $sql = "SELECT * from  reservations ";
                         $query = $dbh->prepare($sql);
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
                            </tr>
                            <?php }
                         } ?>

                    </tbody>
                </table>
            </div>
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





    <br>
</body>

</html>
<?php } ?>