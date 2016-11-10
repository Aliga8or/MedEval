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
        <script>
                function setURL(url){
                document.getElementById('iframe').src = url;
                }
        </script>       
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    <body style="padding-top: 35px;">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<!--                    <a class="navbar-brand" href="index.php"><img src = "images/MedEval.png" width="200" height="40" border="0"></a>-->
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
       
    <div class="container">
        <h1 style="display: block;"><center>Visualization</center></h1>
        <div class="container">
            <div id='toolbar' style="width: 100%;max-width: 1080px;margin: 10px;padding: 10px;">
            <div class='wrapper text-center'>
                <div class="btn-group">
                    <button type="button" class="btn btn-default" onclick="setURL('http://localhost/MedEval(v0.1)/SplineGraph.php')">According to location</button>
                    <button type="button" class="btn btn-default" onclick="setURL('http://localhost/MedEval(v0.1)/BarGraph.php')">According to Year</button>
                </div>
            </div>
            </div>
        </div>
        <div style="text-align: center;width:100%;">
        <iframe id="iframe" src="BarGraph.php" width="1000" height="600" frameBorder="0"/><br>
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