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
        <link rel="stylesheet" type="text/css" href="src/css/tabCenter.css">
        <!--scripts -->  
        <script src="src/js/jquery-1.11.3.min.js"></script>
        <script src="src/js/bootstrap.js"></script>      
        <script src="src/js/bootstrap.min.js"></script>
        <sctipt src="src/js/tabJS.js"></sctipt>
        <script>$("#myTab").on("click", "li", function(){
            
        })</script>
        <!--            graph -->
            <script id="source" language="javascript" type="text/javascript">

            var id = "";
            var vname = "default";      
            var resultF = new Array();
            var valueS = "Mumbai";
            var valueY = "2016"   
    //for selector value
            function getComboA(sel) {
                valueS = sel.value; 
//                document.getElementById("label").innerHTML= valueS;
                chart1();
                }
            function getComboB(selB){
                valueY = selB.value;
//                document.getElementById("label1").innerHTML = valueY;
                chart1();
            }    
        //     
            $(function() 
            {

                

            //-------------------------------------------------------------------------------------------
            // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
            //-------------------------------------------------------------------------------------------
            $.ajax({                                      
                url: 'apiChartPublicDB.php',                  //the script to call to get data 
                async: false,    
                data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
                dataType: 'json',                //data format      
                success: function(data)          //on recieve of reply
                {
                    id = data[1][0];              //get id
                    vname = data[0][5];           //get name
                    resultF = data;
                    //--------------------------------------------------------------------------------------
                    // 3) Update html content
                    //--------------------------------------------------------------------------------------
                    $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname);     //Set output element html
                    //recommend reading up on jquery selectors they are awesome http://api.jquery.com/category/selectors/
        
                    } 
                });
            }); 
      
    
            //  canvasJS
      
          //  window.onload = function (){
            function chart1(){
                var i;
                var count_cold = 0;
                var count_flu = 0;
                var count_typhoid =0;
                var count_tonsillitis = 0;
                var count_tracheitis = 0;
                var count_pneumonia = 0;
                for(i = 0 ; i < resultF.length ; i++){ 
                    if (resultF[i][5] == valueS){
                            if(resultF[i][2] == 1){
                                    count_cold = count_cold + 1;
            
                                }
                            if(resultF[i][2] == 2){
                                    count_flu = count_flu + 1;
            
                                }
                            if(resultF[i][2] == 3){
                                    count_typhoid = count_typhoid + 1;
            
                                }
                            if(resultF[i][2] == 4){
                                    count_tonsillitis = count_tonsillitis + 1;
                   
                                }
                            if(resultF[i][2] == 5){
                                    count_tracheitis = count_tracheitis + 1;
                   
                                }
                            if(resultF[i][2] == 6){
                                    count_pneumonia = count_pneumonia + 1;
                   
                                }
                        }
                    }
            var barChart = new CanvasJS.Chart("chartContainer",
            {
            title:{
                text: "Top Diseases in Your Location"    
                },
            animationEnabled: true,
            axisY: {
                title: "Number of Cases"
                },
            axisX: {
                title: "Diseases"
                },    
            legend: {
                verticalAlign: "bottom",
                horizontalAlign: "center"
                },
            theme: "theme2",
            data: [

                {        
                    type: "column",  
                    //showInLegend: true, 
                    //legendMarkerColor: "grey",
                    //legendText: "Cities",
                    dataPoints: [      
                        {y: count_cold, label: "Cold"},
                        {y: count_flu, label: "Tonsillitis"},
                        {y: count_typhoid, label: "Typhoid"},
                        {y: count_tonsillitis, label: "Pneumonia"},
                        {y: count_tracheitis, label: "Malaria"},
                        {y: count_pneumonia, label: "Food poisoning"}
                        ]
                    }    
                ]
            });

            barChart.render();
                
                  
    /////////        spline chart      ////////
        var diseCountByMonth = new Array(6);
            for (i=0; i <6; i++){
                diseCountByMonth[i] = new Array(12);        
            }
        //initilizing diseCountByMonth to zero
        for(var i = 0 ; i < 6 ; i++){
            for(var j = 0; j< 12 ; j++){
                diseCountByMonth[i][j] = 0;
            }
        } 
               
        //for date
          
        for(var i = 0 ; i < resultF.length; i++){
            
                var d = new Date(resultF[i][3]);
             if (resultF[i][5] == valueS){
                count(i ,d);
             }

//            diseCountByMonth.toString();
//            document.getElementById("demo").innerHTML = diseCountByMonth; 
}
   
//                diseCountByMonth.toString();
//                document.getElementById("demo").innerHTML = diseCountByMonth;                
         function count(r,s){
            var i = r;
            var d = s; 
            for(var p = 0; p < 12; p++){
                if(d.getMonth() == p && resultF[i][5] == valueS && d.getFullYear() == valueY){
                    if(resultF[i][2] == 1){
                        diseCountByMonth[0][p] = diseCountByMonth[0][p]+1;
                    }
                    if(resultF[i][2] == 2){
                        diseCountByMonth[1][p] = diseCountByMonth[1][p]+1;
                    }
                    if(resultF[i][2] == 3){
                        diseCountByMonth[2][p] = diseCountByMonth[2][p]+1;
                    }
                    if(resultF[i][2] == 4){
                        diseCountByMonth[3][p] = diseCountByMonth[3][p]+1;
                    }
                    if(resultF[i][2] == 5){
                        diseCountByMonth[4][p] = diseCountByMonth[4][p]+1;
                    }
                    if(resultF[i][2] == 6){
                        diseCountByMonth[5][p] = diseCountByMonth[5][p]+1;
                    }
                }
            }
        }
                     
                
                
        /////        
                       
         var splineChart = new CanvasJS.Chart("splineChartContainer",
		{
			title:{
				text: "Trending Diseases by Month ("+valueY+")"
			},   
            animationEnabled: true,  
			axisY:{ 
				title: "Number of cases",
				includeZero: false                    
			},
			axisX: {
				title: "Months",
				interval: 1
			},
			toolTip: {
				shared: true,
				content: function(e){
					var body = new String;
					var head ;
					for (var i = 0; i < e.entries.length; i++){
						var  str = "<span style= 'color:"+e.entries[i].dataSeries.color + "'> " + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ; 
						body = body.concat(str);
					}
					head = "<span style = 'color:DodgerBlue; '><strong>"+ (e.entries[0].dataPoint.label) + "</strong></span><br/>";

					return (head.concat(body));
				}
			},
			legend: {
				horizontalAlign :"center"
			},
			data: [
			{        
				type: "spline",
				showInLegend: true,
				name: "Cold",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[0][0]} ,     
				{label: "Feb" , y: diseCountByMonth[0][1]} ,     
				{label: "Mar" , y: diseCountByMonth[0][2]} ,     
				{label: "Apr" , y: diseCountByMonth[0][3]} ,     
				{label: "May" , y: diseCountByMonth[0][4]} ,     
				{label: "Jun" , y: diseCountByMonth[0][5]} ,     
				{label: "Jul" , y: diseCountByMonth[0][6]} ,     
				{label: "Aug" , y: diseCountByMonth[0][7]} ,     
				{label: "Sep" , y: diseCountByMonth[0][8]} ,     
				{label: "Oct" , y: diseCountByMonth[0][9]} ,     
				{label: "Nov" , y: diseCountByMonth[0][10]} ,     
				{label: "Dec" , y: diseCountByMonth[0][11]} 
				]
			},
			{        
				type: "spline",
				showInLegend: true,
				name: "Tonsillitis",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[1][0]} ,     
				{label: "Feb" , y: diseCountByMonth[1][1]} ,     
				{label: "Mar" , y: diseCountByMonth[1][2]} ,     
				{label: "Apr" , y: diseCountByMonth[1][3]} ,     
				{label: "May" , y: diseCountByMonth[1][4]} ,     
				{label: "Jun" , y: diseCountByMonth[1][5]} ,     
				{label: "Jul" , y: diseCountByMonth[1][6]} ,     
				{label: "Aug" , y: diseCountByMonth[1][7]} ,     
				{label: "Sep" , y: diseCountByMonth[1][8]} ,     
				{label: "Oct" , y: diseCountByMonth[1][9]} ,     
				{label: "Nov" , y: diseCountByMonth[1][10]} ,     
				{label: "Dec" , y: diseCountByMonth[1][11]} 
				]
			}, 
			{        
				type: "spline",
				showInLegend: true,
				name: "Typhoid",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[2][0]} ,     
				{label: "Feb" , y: diseCountByMonth[2][1]} ,     
				{label: "Mar" , y: diseCountByMonth[2][2]} ,     
				{label: "Apr" , y: diseCountByMonth[2][3]} ,     
				{label: "May" , y: diseCountByMonth[2][4]} ,     
				{label: "Jun" , y: diseCountByMonth[2][5]} ,     
				{label: "Jul" , y: diseCountByMonth[2][6]} ,     
				{label: "Aug" , y: diseCountByMonth[2][7]} ,     
				{label: "Sep" , y: diseCountByMonth[2][8]} ,     
				{label: "Oct" , y: diseCountByMonth[2][9]} ,     
				{label: "Nov" , y: diseCountByMonth[2][10]} ,     
				{label: "Dec" , y: diseCountByMonth[2][11]} 
				]
			}, 
			{        
				type: "spline",
				showInLegend: true,
				name: "Pneumonia",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[3][0]} ,     
				{label: "Feb" , y: diseCountByMonth[3][1]} ,     
				{label: "Mar" , y: diseCountByMonth[3][2]} ,     
				{label: "Apr" , y: diseCountByMonth[3][3]} ,     
				{label: "May" , y: diseCountByMonth[3][4]} ,     
				{label: "Jun" , y: diseCountByMonth[3][5]} ,     
				{label: "Jul" , y: diseCountByMonth[3][6]} ,     
				{label: "Aug" , y: diseCountByMonth[3][7]} ,     
				{label: "Sep" , y: diseCountByMonth[3][8]} ,     
				{label: "Oct" , y: diseCountByMonth[3][9]} ,     
				{label: "Nov" , y: diseCountByMonth[3][10]} ,     
				{label: "Dec" , y: diseCountByMonth[3][11]} 
				]
			}, 
			{        
				type: "spline",
				showInLegend: true,
				name: "Malaria",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[4][0]} ,     
				{label: "Feb" , y: diseCountByMonth[4][1]} ,     
				{label: "Mar" , y: diseCountByMonth[4][2]} ,     
				{label: "Apr" , y: diseCountByMonth[4][3]} ,     
				{label: "May" , y: diseCountByMonth[4][4]} ,     
				{label: "Jun" , y: diseCountByMonth[4][5]} ,     
				{label: "Jul" , y: diseCountByMonth[4][6]} ,     
				{label: "Aug" , y: diseCountByMonth[4][7]} ,     
				{label: "Sep" , y: diseCountByMonth[4][8]} ,     
				{label: "Oct" , y: diseCountByMonth[4][9]} ,     
				{label: "Nov" , y: diseCountByMonth[4][10]} ,     
				{label: "Dec" , y: diseCountByMonth[4][11]} 
				]
			}, 
			{        
				type: "spline",
				showInLegend: true,
				name: "Food poisoning",
				dataPoints: [
				{label: "Jan" , y: diseCountByMonth[5][0]} ,     
				{label: "Feb" , y: diseCountByMonth[5][1]} ,     
				{label: "Mar" , y: diseCountByMonth[5][2]} ,     
				{label: "Apr" , y: diseCountByMonth[5][3]} ,     
				{label: "May" , y: diseCountByMonth[5][4]} ,     
				{label: "Jun" , y: diseCountByMonth[5][5]} ,     
				{label: "Jul" , y: diseCountByMonth[5][6]} ,     
				{label: "Aug" , y: diseCountByMonth[5][7]} ,     
				{label: "Sep" , y: diseCountByMonth[5][8]} ,     
				{label: "Oct" , y: diseCountByMonth[5][9]} ,     
				{label: "Nov" , y: diseCountByMonth[5][10]} ,     
				{label: "Dec" , y: diseCountByMonth[5][11]} 
				]
			}, 
			],
          legend :{
            cursor:"pointer",
            itemclick : function(e) {
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
              }
              else{
				e.dataSeries.visible = true;
              }
              splineChart.render();
            }
          }
          
		});

        splineChart.render();
                
            }       
      
              
            </script>
            <script type="text/javascript" src="canvasJSCharts/canvasjs.min.js"></script>
    
        
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    <body onload="chart1()" style="padding-top: 70px;">
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
        <div class ="nav-center">
         <ul class="nav nav-tabs" id="myTab">
             <li class="active" onclick="chart1()"><a data-target="#location" data-toggle="tab">According to Location</a></li>
			  <li><a data-target="#year" data-toggle="tab">According to year</a></li>
			</ul>

			<div class="tab-content">
			  <div class="tab-pane active" id="location"><div id="chartContainer" style="height: 500px; width: 100%;"></div></div>
			  <div class="tab-pane" id="year"><div id="splineChartContainer" style="height: 500px;width: 100%;"></div></div>
			</div>
            </div> 

            <br>
            <div align="center">
            <label for='city' class='control-label'>Your Current Location:</label>
            <select name="city" onchange = "getComboA(this)" id="mySelect" class="btn btn-mini">
                <option value="Mumbai" id ="Mumbai" selected="selected">Mumbai</option>
                <option value="Delhi" id = "Delhi">Delhi</option>
                <option value="Chennai" id = "Chennai">Chennai</option>
            </select>
            </div> 
            <div align="center">
            <label for='city' class='control-label'>Select year:</label>    
             <select name="date" onchange = "getComboB(this)" id="mySelect" class="btn btn-mini">
                <option value="2016" id ="2016" selected="selected">2016</option>
                <option value="2015" id = "2015">2015</option>
                <option value="2014" id = "2014">2014</option>
            </select>
            </div>    
            <div id="label"></div>
            <div id="label1"></div>
            
            <p id="demo"></p>
            
<!--
            <div id="chartContainer" style="height: 500px; width: 100%;"></div>
            <br>
            <div id="splineChartContainer" style="height: 500px; width: 100%;"></div>
-->
        
      
    </div>
         <div class="container">
            <hr>
            <footer>
                <p>MedEval 2016</p>
            </footer>
        </div>
        
        
    </body>
    
</html>    