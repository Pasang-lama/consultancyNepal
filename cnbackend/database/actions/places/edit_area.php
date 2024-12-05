<?php
 session_start();
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $value = $_POST["id"];
     $insert_params = ["area" => $_POST["area"]];
     if ($db->Update("area", $insert_params, "id", [$value])) {
         $_SESSION["message"] = "Area Edited Successfully";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showarea";';
         echo "</script>";
         exit(0);
     } else {
         $_SESSION["messages"] = "Area Edition failed";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showarea";';
         echo "</script>";
         exit(0);
         header(
             "location:https://www.consultancynepal.com/cnbackend/showprovince"
         );
     }
 }