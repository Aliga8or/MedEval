<?php 

session_start();  //Must Start a session. 
ob_start();
require "config.php"; //Connection Script, include in every file! 

 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>MedEval Login</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">           
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
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
                    <form class="navbar-form navbar-right" role="form">
                       <a href="login.php" class="btn btn-success" role="button">Login</a>
                       <a href="register.php" class="btn btn-info" role="button">Register</a> 
                    </form>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel">Login to MedEval</h4>
                </div>                 
                <div class="modal-body">
              <div class="row">
                    <div class="col-xs-6">
                       <div class="well">
                          <form id="loginForm" method="POST" action="login.php" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
<!--
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
-->
                              <button type="submit" name="login-submit" id="login-submit" class="btn btn-success btn-block">Login</button>
                               <?php
                                                    if(isset($_POST['login-submit'])) 
                                                    { 
                                                       //Variables from the table 
                                                       $user  = $_POST['username']; 
                                                       $pass  = $_POST['password']; 

                                                       //Prevent MySQL Injections 
                                                       $user  = stripslashes($user); 
                                                       $pass  = stripslashes($pass); 

                                                       $user  = mysqli_real_escape_string($con, $user); 
                                                       $pass  = mysqli_real_escape_string($con, $pass); 

                                                       //Check to see if the user left any space empty! 
                                                       if($user == "" || $pass == "") 
                                                       { 
                                                          echo '<br>
                                                                <div class="alert alert-danger" role="alert">
                                                                Please fill in all the information!</div>'; 
                                                       } 

                                                       //Check to see if the username AND password MATCHES the username AND password in the DB 
                                                       else 
                                                       { 
                                                          $query = mysqli_query($con,"SELECT * FROM members WHERE username = '$user' and password = '$pass'") or die("Can not query DB."); 
                                                          $count = mysqli_num_rows($query); 

                                                          if($count == 1){ 
                                                             //YES WE FOUND A MATCH! 
                                                             $_SESSION['username'] = $user; //Create a session for the user! 
                                                             header ("location:home.php"); 
                                                          } 

                                                          else{ 
                                                             echo '<div class="alert alert-danger" role="alert">
                                                                    Username and Password DO NOT MATCH! TRY AGAIN!</div>'; 
                                                          } 
                                                       } 

                                                    } 

                                                ?>        
                          </form>
                      </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">Register now for <span class="text-success">FREE</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li>
                                <span class="fa fa-check text-success"></span> 1.See all your Diagnosis
                            </li>
                            <li>
                                <span class="fa fa-check text-success"></span> 2.Quick Preview
                            </li>
                            <li>
                                <span class="fa fa-check text-success"></span> 3.Get Visualiation
                            </li>
                            <li>
                                <span class="fa fa-check text-success"></span> 4.Accurate results
                            </li>
                            <li>
                                <a href="/read-more/"><u>Read more</u></a>
                            </li>
                        </ul>
                        <p><a href="register.php" class="btn btn-info btn-block">Yes please, register now!</a></p>
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
        <!-- /container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
         <script src="src/js/bootstrap.js"></script>      
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery-1.11.3.min.js"></script>
    </body>
</html>
