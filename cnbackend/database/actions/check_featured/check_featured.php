<?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     
    $did=$_POST["did"];
    $tablename=$_POST["tablename"];
    $featured=$_POST["featured"];
    $criteria=$_POST["criteria"];
    
    $sql="UPDATE $tablename SET  featured = '$featured' WHERE $criteria='$did'";
    $update=$db->CustomQuery($sql);
    
    
      
 }