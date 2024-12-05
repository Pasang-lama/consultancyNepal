<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
 require_once "../../database.php";
 require_once "../../tables.php";
 
 $db = Database::Instance();
//  print_r($db);
//  die;
 if (isset($_POST["did"])) {
    //  print_r($_POST);
     
    echo $did=$_POST["did"];
    echo $tablename=$_POST["tablename"];
    echo $status=$_POST["status"];
 
    
    // $sql="UPDATE $tablename SET $tablename.status={$status} WHERE $tablename.id={$did}";
    // echo $sql;
    //  die;
    // $sql="UPDATE $tablename SET  status = '$status' WHERE u_id='$did'";
     
    // $update=$db->CustomQuery($sql);
    // $update = ;
    
    // if(){
    //     echo "updated";
    // }
    $db->Update("$tablename",["status"=>"$status"],"id",[$did]);
    
    
      
 }
 ?>