<?php 

 
  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'config.php';
  $con = mysql_connect($host,$username,$password);
  $dbs = mysql_select_db($db, $con);

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $result = mysql_query("SELECT * FROM p_DB");            //query
  //$array = mysql_fetch_row($result);                          //fetch result    

    while($row = mysql_fetch_row($result)){
        $table_data[]= $row ;
    }

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($table_data);

?>