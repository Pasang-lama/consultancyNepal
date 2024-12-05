<?php require_once "../../database.php";
require_once "../../tables.php";
$db=Database::Instance();
if(isset($_POST['did']))
{
    $did=$_POST['did'];
    $where="id";
    $value=[$did];
    
    if($db->delete("location","location_id",$value)){
        
        echo "1";}}