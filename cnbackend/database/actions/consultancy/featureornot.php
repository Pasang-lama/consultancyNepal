<?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     
    $did=$_POST["did"];
    $tablename=$_POST["tablename"];
    $status=$_POST["status"];
 
    
    $sql="UPDATE  consultancies SET Isfeatured = '$status' WHERE id='$did'";
     
    $update=$db->CustomQuery($sql);
    
    
      
 }