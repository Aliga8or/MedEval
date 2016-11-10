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
        <title>MedEval Register</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">  
<!--        <link rel="stylesheet" type="text/css" href="src/css/bootstrap-datepicker.css">-->
<!--        <link rel="stylesheet" type="text/css" href="src/datepicker/css/datepicker.css">-->
        
       
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
                    
                    <h4 class="modal-title" id="myModalLabel">Register to MedEval</h4>
                </div>                 
                <div class="modal-body">
              <div class="row">
                    <div class="col-xs-12">
                       <div class="well">
                          <form id="loginForm" method="POST" action="register.php" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="username">
                                  <span class="help-block"></span
                                  
                              </div>
                            
                              <div class="form-group">
                              <label for="email" class="control-label">Email</label>
                                  <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter you email" placeholder="example@gmail.com">
                                  <span class="help-block"></span>        
                                      
                              </div>          
                                      
                                      
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="password">
                                  <span class="help-block"></span>
                              </div>
                                
                               <div class="form-group">
                                   <label for="repassword" class="control-label">confirm-password</label>
                                  <input type="password" class="form-control" id="confirm-password" name="confirm-password" value="" required="" title="retype the password" placeholder="Retype password">
                                  <span class="help-block"></span>
                              </div>          
                            
                              <div class="date-form">
                                 <div class="control-group">
                                  <label for="DOB" class="control-label">Date of Birth</label>
                                
                                  
                                    <div class="controls">
                                        <div class="input-group">
                                            <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                                            </label>
<!--                                            <input id="datepicker" type="text" class="date-picker" />-->
                                            <div id="sandbox-container">
                                                <input type="text" type="text" class="form-control" name ="date" />
                                                </div>
                                        </div>
                                    </div>
                                  </div>
                                  
                                  <span class="help-block"></span>
                              </div>           
                              <div class="form-group">
                                  <label for="city" class="control-label">City:</label>
<!--                                  <input type="t" class="form-control" id="city" name="city" value="" required="" title="Enter mobile number">-->
                                  <select class="form-control" id="sel1" name="city">
                                        <option value="mumbai">Mumbai</option>
                                        <option value="New Delhi">New Delhi</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                    </select>
                                  <span class="help-block"></span>
                              </div>        
                               <div class="form-group">
                                  <label for="mobileNum" class="control-label">Mobile Number</label>
                                  <input type="mobileNum" class="form-control" id="mobileNum" name="mobileNum" value="" required="" title="Enter mobile number">
                                  <span class="help-block"></span>
                              </div>    
                                
                              <button type="submit" name="register-submit" id="register-dubmit" class="btn btn-success btn-block">Register</button>
                              <?php
                                                //Check to see if the user click the button 
                                                if(isset($_POST['register-submit'])) 
                                                { 
                                                //Variables from the table 
                                                $user  = $_POST['username']; 
                                                $pass  = $_POST['password']; 
                                                $rpass = $_POST['confirm-password'];
                                                $email = $_POST['email'];
                                                $mobnum= $_POST['mobileNum'];
                                                $new_date = date('Y-m-d',strtotime($_POST['date']));
                                                $city = $_POST['city'];    
                                                //Prevent MySQL Injections 
                                                $user  = stripslashes($user); 
                                                $pass  = stripslashes($pass); 
                                                $rpass = stripslashes($rpass); 
                                                $email = stripslashes($email);


                                                   $user  = mysqli_real_escape_string($con, $user); 
                                                   $pass  = mysqli_real_escape_string($con, $pass); 
                                                   $rpass = mysqli_real_escape_string($con, $rpass); 
                                                   $email = mysqli_real_escape_string($con, $email);
                                                   $new_date = mysqli_real_escape_string($con, $new_date);
                                                   $city = mysqli_real_escape_string($con, $city);    
                                                    $userlength= strlen($user);
                                                    $passlength= strlen($pass);

                                                    //Check to see if the user left any space empty! 
                                                   if($user == "" || $pass == "" || $rpass == "" || $email == "") 
                                                   { 
                                                      echo ' <br>
                                                            <div class="alert alert-success" role="alert">
                                                          <p>Please fill in all the required fields!</p></div>'; 
                                                   } 

                                                   else 
                                                   { 
                                                      //Check too see if the user's Passwords Matches! 
                                                      if($userlength<6)
                                                      {
                                                           echo '<br> 
                                                                <div class="alert alert-danger" role="alert">
                                                                <p> Invalid username. Username must be at least 6 characters</p></div>'; 
                                                      }
                                                    else{   
                                                      if($pass != $rpass) 
                                                      { 
                                                         echo ' <br>
                                                                <div class="alert alert-danger" role="alert">
                                                                <p>Passwords do not match! Try Again</p></div>'; 
                                                      } 
                                                      else{
                                                          if($passlength<6){
                                                              echo '<br> 
                                                                <div class="alert alert-danger" role="alert">
                                                                <p> Invalid password. password must be at least 6 characters</p></div>';  
                                                          }

                                                      //CHECK TO SEE IF THE USERNAME IS TAKEN, IF NOT THEN ADD USERNAME AND PASSWORD INTO THE DB 
                                                      else 
                                                      { 

                                                          //Query the DB 
                                                         $query = mysqli_query($con,"SELECT * FROM members WHERE username = '$user'") or die("Can not query the TABLE!"); 

                                                         //Count the number of rows. If a row exist, then the username exist! 
                                                         $row = mysqli_num_rows($query); 
                                                         if($row == 1) 
                                                         { 
                                                            echo '<br>
                                                                  <div class="alert alert-danger" role="alert">
                                                                  <h4>Sorry, but the username is already taken! Try again.</h4></div>'; 
                                                         } 
                                                         else{
                                                             if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                                                 $add = mysqli_query($con,"INSERT INTO members (user_id, username, password, email, DOB, mobileNum, city) VALUES (null, '$user' , '$pass' , '$email' , '$new_date', '$mobnum', '$city') ") or die("Can't                Insert! "); 
                                                                  echo '<br>
                                                                  <div class="alert alert-success" role="alert">
                                                                  <p>Successful! <i class="glyphicon glyphicon-thumbs-up"> </i> Now you can <a href="login.php">LOGIN</a></p></div>'; 
                                                             }
                                                             else{
                                                                echo '<br>
                                                                    <div class="alert alert-danger" role="alert">

                                                                    <h4>The entered email address is considered invalid.</h4></div>';
                                                                } 
                                                         } 
                                                         //ADD THE USERNAME TO THE DB 


                                                      }       
                                                      }
                                                   } 
                                                   }
                                                } 
                                                ?> 
                                      
                                      
                                      
                          </form>
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
        <script src="src/js/jquery-1.11.3.min.js"></script> 
        <script src="src/js/jquery-ui.js"></script>       
<!--        <script src="https://code.jquery.com/jquery.js"></script>-->
<!--        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
         <script src="src/js/bootstrap.js"></script>      
        <script src="src/js/bootstrap.min.js"></script>
        <script src="src/js/bootstrap-datepicker.js"></script>
<!--        date picker-->
<!--        <script src = "src/datepicker/js/bootstrap-datepicker.js"></script>        -->
<!--        <script src = "DatePickerJS/datePicker.js"-->
    </body>
</html>
