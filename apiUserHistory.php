<?php 

  session_start();
  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'config.php';
  $con = mysql_connect($host,$username,$password);
  $dbs = mysql_select_db($db, $con);
  $userName = $_SESSION['username'];    
  
  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  //$result = mysql_query("SELECT p_id, d_id, Date, location FROM p_DB WHERE p_id IN (SELECT user_id FROM members WHERE username = '".$userName."')");            //query
  //$array = mysql_fetch_row($result);                          //fetch result    
 $result = mysql_query("SELECT publicDB.p_id ,publicDB.d_id, publicDB.Date, publicDB.location, DISEASE.Name FROM p_DB publicDB join diseases DISEASE on DISEASE.did = publicDB.d_id WHERE p_id IN (SELECT user_id FROM members WHERE username = '".$userName."') order by publicDB.date ASC");
    
    while($row = mysql_fetch_row($result)){
        $table_data[]= $row ;
    }

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($table_data);

?>