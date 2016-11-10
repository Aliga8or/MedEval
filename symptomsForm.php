
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
        <title>Questions</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">  
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap-datepicker.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap-theme.min.css">
        
        <script src="src/js/bootstrap-datepicker.js"></script>
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
                         <?php if(isset($_SESSION['username'])){
                                               
                                                $result1 = '<a href="#">Hello,'.$_SESSION['username']. '</a>';
                                                $result2 = '<li><a href="logout.php">Logout</a>';        
//                                               echo '<li><a href="#">Hello,'.$_SESSION['username']. '</a></li>';
//                                               echo '<li><a href="logout.php">Logout</a></li>';
                                            }
                                            else{
                                               // $result1 = '<a href="login.php" class="btn btn-success" role="button">Login</a>';
                                                 $result1 = '<button onclick="location.href=login.php" class="btn btn-success">Login</button>';
                                                //$result2 = '<a href="register.php" class="btn btn-info" role="button">Register</a>'; 
                                                $result2 = '<button onclick="location.href=register.php" class="btn btn-info">Register</button>';
//                                                echo '<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">';
//                                               echo '<link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">';
//                                                echo '<li><a href="login.php" class="btn btn-success" role="button">Login</a></li>';
//                                                echo '<li><a href="register.php" class="btn btn-info" role="button">Register</a></li>';
                                            } 
                        ?>
                         <?php echo $result1; ?>
                        <?php echo $result2; ?>
                      
                    </form>   
                    
                    
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        <div class="container">
        
            <div class="jumbotron">
                 <h3 style="display: block;">Many of the questions might seem unnecessary, but try to cooperate as they will help in determining the disease:</h3>
                <br>
                
                <form class="form-horizontal">
                     <div class="form-group">
                        <label for="" class="col-sm-8">Location:</label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Mumbai</option>
                            <option>Delhi</option>
                            <option>Chennai</option>
                            <option>Hyderabad</option>
                            </select>
                        </div>    
                </div>
                    
                    <div class="form-group">
                        <label for="" class="col-sm-8">1.What is the level of fever? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Low</option>
                            <option>Mid</option>
                            <option>High</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">2.Is it constant or occasional?</label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Constant</option>
                            <option>Occasional</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">3.Are your eyes red and/or watery? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">4.Are you sneezing? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">5.Are you experiencing a stuffy nose or running nose? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">6.Are you coughing? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Always</option>
                            <option>Sometimes</option>
                            <option>Often</option>
                            <option>Started Later</option>
                        </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">7.Do you have a sore throat? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                           <option>Always</option>
                            <option>Sometimes</option>
                            <option>Often</option>
                            <option>Started Later</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">8.Is the cough dry? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">9.Is there any blood or pus with the cough? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                        <label for="" class="col-sm-8">10.Is your tonsil red and/or covered with something and you got bad breath? </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>    
                <div class="form-group">
                        <label for="" class="col-sm-8">11.Do you have fatigue?  </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>No</option>
                            <option>Low</option>
                            <option>High</option>
                            
                            </select>
                        </div>    
                </div>   
                <div class="form-group">
                        <label for="" class="col-sm-8">12.Do you suffer from shortness of breath?  </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>   
                <div class="form-group">
                        <label for="" class="col-sm-8">13.Did it start suddenly?  </label>
                        <div class="col-xs-4">
                        <select class="form-control col-sm-4" id="">
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>    
                </div>   
               
                    
                <hr> 
                <div class="row">
                  <div class="span6" style="text-align:center">
                    <a href="presPrec.php" class="btn btn-success" role="button">Submit</a>
                    
                  </div>
                </div>

                </form>     
            </div>
             <hr>
            <footer>
                <p>MedEval 2016</p>
            </footer>
                
        </div>    
    </body>
</html>    
        