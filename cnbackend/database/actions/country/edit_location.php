<?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $insert_params = [
            "location_name" =>$_POST["locationname"]
        ];
    $id=$_POST["location_id"];
    $exe=$db->Update("location", $insert_params,"location_id",[$id]);
 
 if ($exe) {
        $_SESSION["message"] = "location Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "location Edited failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showcountry"
        );
    }
   
 
 }