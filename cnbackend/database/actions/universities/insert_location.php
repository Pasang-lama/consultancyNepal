<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert_params=[
        "location_name"=>$_POST['location_name'],
        ];
    if ($db->Insert('university_location', $insert_params)) {
        $_SESSION["message"] = "Universities Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/adduniversitylocation";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/adduniversitylocation";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Universities Added Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/adduniversitylocation"
        );
    }
}
