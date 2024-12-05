<?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
foreach ($_POST["locationname"] as $key => $value) {

    
        $insert_params = [
            "location_name" =>$_POST["locationname"][$key],
            "country_id" => $_POST["country_id"],
        ];
    $exe=$db->Insert("location", $insert_params);
}
 if ($exe) {
        $_SESSION["message"] = "location Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "location Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showcountry"
        );
    }
   
 
 }