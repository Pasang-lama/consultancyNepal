<?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
foreach ($_POST["university_name"] as $key => $value) {

    
        $insert_params = [
            "location_id"=>$_POST["location_id"],
            "university_name"=>$_POST["university_name"][$key],
            "university_email"=>$_POST["email"][$key],
            "website"=>$_POST["website"][$key],
            "meta_title"=>$_POST["university_name"][$key],
            "meta_description"=>$_POST["university_name"][$key],
            "status"=>1,
        ];
    $exe=$db->Insert("university", $insert_params);
}
 
 if ($exe) {
        $_SESSION["message"] = "university Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "university Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showcountry"
        );
    }
   
 
 }