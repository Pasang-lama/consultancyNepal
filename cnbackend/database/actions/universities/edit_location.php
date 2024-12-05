<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $update_params = [
            "location_name"=>$_POST['location_name'],
        ];
  
     
    $location_id=$_POST['location_id'];
    if ($db->Update('university_location',$update_params,"location_id",[$university_id])) {
        $_SESSION["message"] = "Universities Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showuniversitieslocation";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showuniversitieslocation";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Universities Edited Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/showuniversitieslocation"
        );
    }
}
