<?php 

session_start();  //Must Start a session. 
ob_start();
require "config.php"; //Connection Script, include in every file! 

 
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
                                               echo '<li><a href="#">Hello,'.$_SESSION['username']. '</a></li>';
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
    
    
<div class="container">
    <h2>According to the Symptoms you have common cold:</h2>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Prescription</a>
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
								<form id="login-form" action="loginReg.php" method="post" role="form" style="display: block;">
									<div class="form-group">
                                        <h3>
                                        <pre>There are medicines you can take to help manage the symptoms of a cold.

These include:

1.Paracetamol and ibuprofen for relieving pain and fever
2.Decongestants and saline nasal sprays or drops for relieving a blocked nose.

Other options include:

combination 'cough and cold' medicines,
complementary medicines (e.g. vitamin C, zinc, echinacea).
                                        </pre>
                                        </h3>
									</div>
									
								</form>
								<form id="register-form" action="loginReg.php" method="post" role="form" style="display: none;">
                                    
									<div class="form-group">
                                        <h3>
                                        <pre>To lower your chances of getting sick:
1.Always wash your hands. Children and adults should wash hands after nose-wiping, diapering, and using the bathroom, and before eating and preparing food.
2.Disinfect your environment. Clean commonly touched surfaces (such as sink handles, door knobs, and sleeping mats) with an EPA-approved disinfectant.
3.Choose smaller daycare classes for your children.
4.Use instant hand sanitizers to stop the spread of germs.
Use paper towels instead of sharing cloth towels.
                                        
                                        
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
    <div class="container">
            <hr>
            <footer>
                <p>MedEval 2016</p>
            </footer>
        </div>

    </body>    
</html>    