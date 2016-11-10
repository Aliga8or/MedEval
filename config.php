
<?php 

//Information to connect to your MySQL Server AND DB 
$host     = "localhost"; 
$username = "root"; 
$password = ""; 
$db       = "MedEvalv1"; 

//Connect to MySQL Server 
$con = mysqli_connect($host,$username,$password,$db) or die("Can not connect to Server."); 



$connection=mysql_connect($host,$username,$password);
if(!$connection)
{
die("Database connection failed: ".mysql_error());
}

//select a database to use
$db_select=mysql_select_db($db,$connection);
if(!$db_select)
{
	die("Database selection failed: ".mysql_error());
}


?> 