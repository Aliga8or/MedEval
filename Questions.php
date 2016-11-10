<!--session-->

<?php
    session_start(); 
require "config.php";
//if(isset($_SESSION['username'])){ 
//NULL;
//}
//else{
//	header("location:index.php");
//}
?>

<!--//-->




<?php 
require_once('config.php');

function getVal($symptom, $val)
{
	if(isset($_GET[$symptom]))
	{
		if($_GET[$symptom] == $val) return "selected";
		
		return "";
	}
	else
	{
		return "";
	}
}

//Form 
$ttab = "";
$ttab .= "<form name='mainForm' method='GET' action='Questions.php'>
		 ";
$ttab .= "<table class = 'table table-striped'>
		 ";
//location
$ttab .= "<tr>";
$ttab .="<td><div class='span6'><label for='city' class='control-label'>Your Current Location:</label></div></td>";

$ttab .= "<td><select class='form-control col-sm-2' name='city' >
                    <option value='Mumbai'>Mumbai</option>
                    <option value='Delhi'>New Delhi</option>
                    <option value='Chennai'>Chennai</option>
                    <option value='Hyderabad'>Hyderabad</option>
                    </select></td>
            ";
////////		 
$query = "select * from symptoms";
$symptoms = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
while($symptom = mysql_fetch_assoc($symptoms))
{
	$ttab .= "<tr>
		 ";
	$ttab .= "<td>".$symptom['Description']."</td>
			  <td>
					<select class='form-control col-sm-2' name='".$symptom['Moniker']."'>
						<option value='0' ".getVal($symptom['Moniker'], 0)." >No</option>
						<option value='1' ".getVal($symptom['Moniker'], 1)." >Yes</option>
					</select>
			  </td>
			";
	$ttab .= "</tr>
				 ";
}

$ttab .= "<tr><td colspan=2>
            <div class='span6' style='text-align:center'>
				<button type='submit' name='submit' value='submit' class='btn btn-success' >Submit</button>
            </div>    
			</td></tr>
			";
$ttab .= "</table>
		 ";
$ttab .= "</form>
		 ";

   

//Logic
if(isset($_GET['submit']))
{
//Input gathering
$query = "select Moniker from symptoms";
$symptoms = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
while($symptom = mysql_fetch_assoc($symptoms))
{
	$input[$symptom['Moniker']] = $_GET[$symptom['Moniker']];
}


    

/*
$query = "select * from dataset";
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
while($score = mysql_fetch_assoc($result))
{
}
*/

//distance calculation
$query = "select * from dataset";
$dataset = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
while($entry = mysql_fetch_assoc($dataset))
{
	$query = "select Moniker from symptoms";
	$symptoms = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
	while($symptom = mysql_fetch_assoc($symptoms))
	{
		if(isset($dist[$entry['dataId']]))
		{
			$dist[$entry['dataId']] += abs($entry[$symptom['Moniker']] - $input[$symptom['Moniker']]);
		}
		else
		{
			$dist[$entry['dataId']] = abs($entry[$symptom['Moniker']] - $input[$symptom['Moniker']]);
		}
	}
}

//sort distances
asort($dist);

$ttab .= "<table>
		 ";

//Voting
$k = 6;
foreach($dist as $dataId => $val)
{
	$query = "select disease from dataset where dataId = ".$dataId;
	$tuple = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
	while($disease = mysql_fetch_assoc($tuple))
	{
		$color = "white";
		if (--$k >= 0)
		{
			if(isset($frequency[$disease['disease']]))
			{
				$frequency[$disease['disease']] ++;
			}
			else
			{
				$frequency[$disease['disease']] = 1;
			}
			
			$color = "red";
		}
		$ttab .= "<tr class='".$color."'>
		 ";
		$ttab .= "<td>".$dataId."</td><td>".$disease['disease']."</td><td>".$val."</td>
		 ";
		$ttab .= "</tr>
		 ";		  
	}
}

$ttab .= "</table>
		 ";

//sort frequencies
arsort($frequency);

//for location
$loc = $_GET['city']; 
echo $loc;    
    
//debug and redirect page

reset($frequency);
$result = key($frequency);
header("Location: http://localhost/MedEval/description.php?result=".$result."&freq=".$frequency[$result]."&loc=".$loc);
echo $result;
    
   
    
    

//Display result
$ttab .= "<table>
		 ";
$ttab .= "<tr>
		 ";
$ttab .= "<th>Disease</th><th>Frequency</th>
		 ";
$ttab .= "</tr>
		 ";

foreach ($frequency as $key => $value)
{
    $ttab .= "<tr>
		 ";
	$ttab .= "<td>".$key."</td><td>".$value."</td>
		 ";
	$ttab .= "</tr>
		 ";
}

$ttab .= "</table>
		 ";

}


?>

<!--Page starts here-->

<html>
	<head>
<!--		<link rel="stylesheet" type="text/css" href="css/Main.css" />-->
         <link rel="stylesheet" type="text/css" href="src/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">
        
         <title>Questions</title>
	</head>
	<body>
    
<!--    navbar    -->
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
                    <ul class="nav navbar-nav navbar-right">
                         <?php if(isset($_SESSION['username'])){
                                               
                                                $result1 = '<a href="userHistory.php">'.$_SESSION['username']. '</a>';
                                                $result2 = '<li><a href="logout.php">Logout</a>';        
//                                               echo '<li><a href="#">Hello,'.$_SESSION['username']. '</a></li>';
//                                               echo '<li><a href="logout.php">Logout</a></li>';
                                            }
                                            else{
                                                $result1 = '<a href="login.php" class="btn btn-success" role="button">Login</a>';
                                                $result2 = '<a href="register.php" class="btn btn-info" role="button">Register</a>';    
//                                                echo '<link rel="stylesheet" type="text/css" href="src/css/bootstrap.css">';
//                                               echo '<link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">';
//                                                echo '<li><a href="login.php" class="btn btn-success" role="button">Login</a></li>';
//                                                echo '<li><a href="register.php" class="btn btn-info" role="button">Register</a></li>';
                                            } 
                        ?>
                        
                        <li><?php echo $result1; ?></li>
                        <li><?php echo $result2; ?></li>
                        
                        <li class="divider-vertical"></li>
                        
                      </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>    
        
        
        
    <div class="container">
        <div class="jumbotron">
            <h3 style="display: block;">Many of the questions might seem unnecessary, but try to cooperate as they will help in determining the disease:</h3>
                <br>
            
        <?php    
        echo $ttab;
        ?>
            </div>
        </div>
	</body>
</html>
