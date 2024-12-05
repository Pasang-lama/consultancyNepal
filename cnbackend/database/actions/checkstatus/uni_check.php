<?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     
    $did=$_POST["did"];
    $tablename=$_POST["tablename"];
    $status=$_POST["status"];
 
    
    // $sql="UPDATE $tablename SET  status = '$status' WHERE id='$did'";
    $sql="UPDATE $tablename SET  status = '$status' WHERE u_id='$did'";
     
    $update=$db->CustomQuery($sql);
    
    
      
 }