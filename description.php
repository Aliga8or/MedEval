<!--session-->

<?php
    session_start(); 
require "config.php";
//if(isset($_SESSION['username'])){ 
//NULL;
//}  
//else{
//	header("location:index.php");
//}
?>


<?php
require_once('Config.php');
$query = "select * from diseases WHERE Name = '".$_GET["result"]."'";
$resource = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
$name = "";
$prescriptions = "";
$precautions = "";
while($diseases = mysql_fetch_assoc($resource))
{
	//echo "The diagnosed disease is ".$diseases["Name"]."<br><br>Prescription<br>".$diseases["prescription"]."<br><br>Precautions<br>".$diseases["precautions"];
    $name = $diseases["Name"];
    $prescriptions = $diseases["prescription"];
    $precautions = $diseases["precautions"];
    
}


//entry in public database
    $userID = 0;
    $dis_ID = 0;
    $location = $_GET["loc"];
   
    //FOR daye and time
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/m/d', time());
    $time = date('H:i',time());    
    //echo $date;
    //echo $time;
    // for disease ID
    $queryDIS_ID ="SELECT did from diseases WHERE Name ='".$_GET["result"]."'";
    $r2 = mysql_query($queryDIS_ID);
    if (mysql_num_rows($r2) == 1) {
        $row = mysql_fetch_assoc($r2);
        $dis_ID = $row['did'];
        //echo $dis_ID;
    }
    
    if(isset($_SESSION['username'])){
         //For userID
        $query = "SELECT user_id FROM MEMBERS WHERE username ='".$_SESSION['username']."'";
        $r1 = mysql_query($query);
        if (mysql_num_rows($r1) == 1) {
            $row = mysql_fetch_assoc($r1);
            $userID = $row['user_id'];
            // echo $userID;
        }   
        $add = mysqli_query($con,"INSERT INTO p_DB (SrNo, p_id, d_id, Date, time, location) VALUES (null, '$userID' , '$dis_ID' , '$date' , '$time', '$location') ") or die("Can't                Insert! "); 
    }
    else{
        $add = mysqli_query($con,"INSERT INTO p_DB (SrNo, p_id, d_id, Date, time, location) VALUES (null, '$userID' , '$dis_ID' , '$date' , '$time', '$location') ") or die("Can't                Insert! "); 
    }


?>

<!doctype html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">           
    <link rel="stylesheet" type="text/css" href="src/css/customCSS.css">
    
<!--scripts -->    
    <script src="src/js/bootstrap.js"></script>      
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="src/js/customJS.js"></script>
    
    
    
    </head>
    
    
<body>
    
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">MedEval</a>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                        <li><?php if(isset($_SESSION['username'])){
                                               echo '<li><a href="userHistory.php">'.$_SESSION['username']. '</a></li>';
                                               echo '<li><a href="logout.php">Logout</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="login.php" class="btn btn-success" role="button">Login</a></li>';
                                                echo '<li><a href="register.php" class="btn btn-info" role="button">Register</a></li>';
                                            } ?></li>
                        <li class="divider-vertical"></li>
                        
                      </ul>
                     
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
    
<!--    //////////-->
    <div class="container">
    <h2 style="text-align:center">According to the Symptoms you have 
        
        <?php
        echo $name;
        ?> </h2>
        <br>
        <br>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Suggested Medicine</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Precaution</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;">
									<div class="form-group">
                                        <h3>
                                            <pre><?php echo "<div style='text-align:justify'>".$prescriptions."</div>"?>
                                        </pre>
                                        </h3>
									</div>
									
								</form>
								<form id="register-form"  method="post" role="form" style="display: none;">
                                    
									<div class="form-group">
                                        <h3>
                                            <pre><?php echo "<div style='text-align:justify'>".$precautions."</div>" ?></p>
                                        </pre>    
                                        </h3>
                                        
									</div>
									
                                         
                                                
                                                
											</div>
										</div>
									</div>
                                    
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    </body>
</html>    