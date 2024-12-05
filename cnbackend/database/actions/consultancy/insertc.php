<?php 
session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (
    $db->Insert($class_table, [
        "type" => $_POST["status"],
        "date" => $_POST["date"],
        "time" => $_POST["time"],
        "cid" => $_POST["consultancy"],
        "tid" => $_POST["test"],
    ])
) {
     $_SESSION["message"] = "Class Added Successfully";
    echo '<script type="text/javascript">';
    echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addclasses";';
    echo "</script>";
} else {
    $_SESSION["messages"] = "Classes Added failed";
    header("location:https://www.consultancynepal.com/cnbackend/addclasses");
} ?>
