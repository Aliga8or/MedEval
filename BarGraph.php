<html>
    
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
        
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
    
<body onload = "chart1()">
<div class="container">
        <div class="container">           
<!--            graph -->
            <script id="source" language="javascript" type="text/javascript">

            var id = "";
            var vname = "default";      
            var resultF = new Array();
            var valueS = "Mumbai";
            var valueY = "2016"   
    //for selector value
            function getComboA(sel) {
                valueS = sel.value; //stores location
//                document.getElementById("label").innerHTML= valueS;
                chart1();
                }
            function getComboB(selB){
                valueY = selB.value; //Stores Year
//                document.getElementById("label1").innerHTML = valueY;
                chart1();
            }    
        //     
            $(function() 
            {

                

            //-------------------------------------------------------------------------------------------
            //  Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
            //-------------------------------------------------------------------------------------------
            $.ajax({                                      
                url: 'apiChartPublicDB.php',                  //the script to call to get data 
                async: false,    
                data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
                dataType: 'json',                //data format      
                success: function(data)          //on recieve of reply
                {

                    resultF = data;
                    //--------------------------------------------------------------------------------------
                    //  Update html content
                    //--------------------------------------------------------------------------------------
                    $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname);     //Set output element html
                    
        
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
                    var d = new Date(resultF[i][3]);
                    if (resultF[i][5] == valueS && d.getFullYear() == valueY){
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
                text: "Top Diseases in Your Location ("+valueY+")"    
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
                
    
            }       
      
              
            </script>
            <script type="text/javascript" src="canvasJSCharts/canvasjs.min.js"></script>
            <div align="center">
           
            <label for='city' class='control-label'>Your Current Location:</label>
            <select name="city" onchange = "getComboA(this)" id="mySelect" class="btn btn-mini">
                <option value="Mumbai" id ="Mumbai" selected="selected">Mumbai</option>
                <option value="Delhi" id = "Delhi">Delhi</option>
                <option value="Chennai" id = "Chennai">Chennai</option>
                <option value="Hyderabad" id = "Chennai">Hyderabad</option>
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
            
            <div id="chartContainer" style="height: 500px; width: 100%;"></div>
            <br>
<!--            <div id="splineChartContainer" style="height: 500px; width: 100%;"></div>-->
        
        </div>
    </div>
        
</body>
</html>    