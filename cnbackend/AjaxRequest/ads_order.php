<?php
    require_once "../database/database.php";
    $db = Database::Instance();
    
    print_r($_POST);
    $i=0;
    foreach($_POST["ids"] as $key=>$value){
        $db->Update("ads_order",["rank"=>$_POST['newOrder'][$i]],"ads",[$value]);
        $i++;
    }
?>
