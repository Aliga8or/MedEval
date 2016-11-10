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
        <link rel="stylesheet" type="text/css" href="src/css/customTableCSS.css">
        <!--scripts -->  
        <script src="src/js/jquery-1.11.3.min.js"></script>
        <script src="src/js/bootstrap.js"></script>      
        <script src="src/js/bootstrap.min.js"></script>
       
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
                        <li><a href="#"><?php echo $_SESSION['username'] ; ?></a></li>
                        <li class="divider-vertical"></li>
                         <li><a href="logout.php">Log Out</a></li>
                      </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
        
        <div class="jumbotron">
            <div class="container">
                <h1 style="display: block;"><a href="#"><?php echo $_SESSION['username'] ; ?></a></h1>
                <p>Here's Your History of Diagnoised Diseases:</p>
                <p id = "output"></p>
<!--
                <table style="width: 100%" class = "table table-striped">
                   <thead>
                        <tr>
                            <th>Disease</th>
                            <th>Date</th>
                            <th>Location</th>
                            
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
-->
                <table id="personDataTable" class = "table table-striped">
                    <thead>
                        <tr>
                            <th style="font-size:25px;">Disease</th>
                            <th style="font-size:25px;">Date</th>
                            <th style="font-size:25px;">Location</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
         
            </div>
        </div>
          <div class="container">
            <hr>
            <footer>
                <p>MedEval 2016</p>
            </footer>
        </div>
    </body>
    
    <script id="source" language="javascript" type="text/javascript">
                var result = new Array();   
                $(function() 
                    {
                    //-------------------------------------------------------------------------------------------
                    //  Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
                    //-------------------------------------------------------------------------------------------
                    $.ajax({                                      
                    url: 'apiUserHistory.php',                  //the script to call to get data 
                    async: false,    
                    data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
                    dataType: 'json',                //data format      
                    success: function(data)          //on recieve of reply
                    {
                        //var Date = data[0][2];              //get 
                        //var Disease = data[0][1];           //get 
                        //var Location = data[0][3];
                        var result = data
                        //--------------------------------------------------------------------------------------
                        //  Update html content
                        //--------------------------------------------------------------------------------------
//                        $('#output').html("<b>Diagnosed Disease: </b>"+Disease+"<b> Date: </b>"+Date+"<b> Location: </b>"+Location); //Set output element html
                        drawTable(data);
                        } 
                    });
                });
        
               function drawTable(data) {
                    for (var i = 0; i < data.length; i++) {
                            drawRow(data[i]);
                        }
                    }

                function drawRow(rowData) {
                        var row = $("<tr />")
                        $("#tbody").append(row); //this will append tr element to table.
                        row.append($("<td style='font-size:20px;'><a href='http://localhost/MedEval/description_link.php?result="+ rowData[4] +"'>" + rowData[4] + "</td>"));
                        row.append($("<td style='font-size:20px;'>" + rowData[2] + "</td>"));
                        row.append($("<td style='font-size:20px;'>" + rowData[3] + "</td>"));
                    }


                
//                var tbl=$("<table/>").attr("id","mytable");
//                $("#div1").append(tbl);
//                for(var i=0;i<result.length;i++)
//                    {
//                        //var thead ="<tbody>";
//                        var tr="<tr>";
//                        var td1="<td>"+result[i][1]+"</td>";
//                        var td2="<td>"+result[i][2]+"</td>";
//                        var td3="<td>"+result[i][3]+"</td></tr>";
//    
//                        $("#tbody").append(tr+td1+td2+td3); 
//  
//                    }   
      
                </script>
    
    
</html>    