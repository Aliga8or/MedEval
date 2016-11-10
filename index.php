<?php 

session_start(); 
require "config.php"; 

if(isset($_SESSION['username'])){
    header("location:home.php");
}
else{
    NULL;
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
        <title>MedEval</title>
        <!-- Bootstrap core CSS -->
         <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">           
    <link rel="stylesheet" type="text/css" href="src/css/styles.css">
    
<!--scripts --> 
     <script src="src/js/jquery-1.11.3.min.js"></script>    
    <script src="src/js/bootstrap.js"></script>      
    <script src="src/js/bootstrap.min.js"></script>
   
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $('#myCarousel').carousel({
                interval: 2000
                })
            });    
        </script>    
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
<!--        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">-->
    <div class="navbar-wrapper">  <!-- -->  
        <div class="container">
            <div class="navbar navbar-inverse navbar-static-top">  <!-- -->
                
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
                        
                        <a href="login.php" class="btn btn-success" role="button" style="margin-left:-80px;">Login</a>
                        <a href="register.php" class="btn btn-info" role="button">Register</a>   
                    </form>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        </div>
        
   <div id="myCarousel" class="carousel slide" data-ride="myCarousel" style="width: 100%;margin: 0 auto">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
<!--      <img src="images/MedEval11%20copy.png" style="width:80%;  padding-left:270px;" class="img-responsive">-->
      <img src="images/Logo.png" style="padding-left:20px" class="img-responsive">    
      <div class="container">
        <div class="carousel-caption">
          <h1></h1>
          <p></p>
<!--          <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com">Learn More</a>-->
<!--        </p>-->
        </div>
      </div>
    </div>
    <div class="item">
      <img src="images/viz1.png" tyle="width:180%;  padding-left:1000px;" class="img-responsive">
      <div class="container">
<!--
        <div class="carousel-caption">
          <h1>Provides Visualization</h1>
          <p>Graph According to location and year</p>
          <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
        </div>
-->
      </div>
    </div>
    <div class="item">
      <img src="images/viz2.png" class="img-responsive">
    </div>
    <div class="item">
      <img src="images/history.png" class="img-responsive">
    </div>  
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<!-- /.carousel -->
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron" style="margin-top:-50px;">
            <div class="container">
                <h1 style="display: block;">Hello, Welcome To MedEval!</h1>
                <p>MedEval provides you with diagnosis based on your symptoms. These symptoms would be asked in form of questions you could easily understand and our algorithm will provide you with the proper diagnosis along with suggested medicine to be taken and prescription (if applicable)</p>
                <p><a href="LearnMore.html" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
            </div>
        </div>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-6">
                    <h2>For Non Registered users</h2>
                    <p>
                    <pre>1.Only Diagnosis with Suggested Medicine and precautions.<br>2.No Visualizations (Graphs and current trending disease)
</pre>
                    </p>
                    <p><a class="btn btn-default" href="Questions.php" role="button">Diagnose now »</a></p>
                </div>
                <div class="col-md-6">
                    <h2>For Registered users</h2>
                    <p>
                    <pre>1.Diagnosis with Suggested Medicine and precautions
2.Diagnosis history
3.Access to old suggested medicine and precautions
4.Access to the Visualizations (Graphs and current trending disease)
</pre>    
                       </p>
                    <p><a class="btn btn-default" href="login.php" role="button">Login»</a> <a class="btn btn-default" href="register.php" role="button">Register »</a></p>
                    <p></p>
                </div>
            </div>
            <hr>
            <footer>
                <p>MedEval 2016</p>
            </footer>
        </div>         

        <!-- /container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
    </body>
</html>
