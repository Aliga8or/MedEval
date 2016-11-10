<?php
    session_start(); 
require "config.php";
if(isset($_SESSION['username'])){ 
 NULL;}  
else{
	header("location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home</title>
        <!-- Bootstrap core CSS -->
         <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">           
    
        <!--scripts -->  
        <script src="src/js/jquery-1.11.3.min.js"></script>
        <script src="src/js/bootstrap.js"></script>      
        <script src="src/js/bootstrap.min.js"></script>
        <!-- fusioncharts -->
<!--       <link  rel="stylesheet" type="text/css" href="fussioncharts_css/css/style.css" />-->

        <!-- You need to include the following JS file to render the chart.
        When you make your own charts, make sure that the path to this JS file is correct.
        Else, you will get JavaScript errors. -->
<!--        <script src="fusioncharts/fusioncharts.js"></script>-->
        
    
        
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
     
    
    <body onload = "chart1()" style="padding-top: 70px;">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<!--                    <a class="navbar-brand" href="index.php"><img src = "images/unnamed.png" width="200" height="70" border="0"></a>-->
                    <a class="navbar-brand" href="index.php">MedEval</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="userHistory.php"><?php echo $_SESSION['username'] ; ?></a></li>
                        <li class="divider-vertical"></li>
                         <li><a href="logout.php">Log Out</a></li>
                      </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 style="display: block;">Hello,<a href="userHistory.php"><?php echo $_SESSION['username'] ; ?></a>!</h1>
                <p>MedEval provides you with diagnosis based on your symptoms. These symptoms would be asked in form of questions you could easily understand and our algorithm will provide you with the proper diagnosis along with suggested medicine to be taken and prescription (if applicable)</p>
               
            </div>
            <div class="span6" style="text-align:center;">
                                                                                                                  
                        <p><a href="Questions.php" class="btn btn-primary btn-lg" role="button" style="padding: 20px 46px;font-size: 25px;line-height: 1.33;border-radius: 3px;" >Diagnose »</a></p>
                <p><a href="userHistory.php" class="btn btn-success btn-lg" role="button" style="padding: 20px 20px;font-size: 25px;line-height: 1.33;border-radius: 3px;" >Check History »</a></p>
                <p><a href="graph.php" class="btn btn-info btn-lg" role="button" style="padding: 20px 25px;font-size: 25px;line-height: 1.33;border-radius: 3px;" >Check Graph »</a></p>
                 
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