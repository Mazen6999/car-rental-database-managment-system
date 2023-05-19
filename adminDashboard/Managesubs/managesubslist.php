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
        var searchTerm = document.getElementById("search_term").value;
        var table = document.getElementById("regusers");
        var rows = table.getElementsByTagName("tr");
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length; j++) {
                if (cells[j].innerHTML.toLowerCase() == searchTerm.toLowerCase()) {
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
    <title>6999 Registered Users</title>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel='stylesheet'
        href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

    <style>
        body {
            background-image: url("regusers.jpg");
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
                
                    <h1 align="middle" style="color:rgb(0, 0, 0)">Manage Users:</h1>
                
            </div>

            <div class="col-md-6"><br><br>
            <u><b>Delete</b></u><br><form class="well form-horizontal" action="deleteuser.php" method="post"  id="del_form"> 
                    
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Enter User ID: &nbsp</b>
                    <input name="deleteuser" placeholder="user_id"   type="text">
                    <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                </form> 
                
            </div>
            <div class="col-md-3"><br><br><br><br>
                <button onclick="window.location.href='http://localhost/CRform/adminDashboard/adminDashboard.html'" type="button" class="btn btn-danger btn-lg btn-block">Back</button>
            </div>
        </div>
        
        

        
        <!-- Zero Configuration Table -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <form align="right">
                    <label>Search Cars:</label>

                    <input type="text" id="search_term" placeholder="Search...">
                    <input type="button" value="Search" onclick="searchTable()">
                </form>
            </div>

            <div class="panel-body">
                <table id="regusers" class="display table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>user_id</th>
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
                            <th>user_id</th>
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
                                <td><?php echo htmlentities($result->email ); ?></td>
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
    



    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3"><button
                onclick="window.location.href='http://localhost/CRform/registration/registration.html'"
                type="button" class="btn btn-warning btn-lg btn-block">Add User</button>
        </div>
    </div>
    <br>





    <br>
</body>

</html>
<?php } ?>