<?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($db->Insert("area", ["area" => $_POST["area"]])) {
     $_SESSION["message"] = "New Record Added..";
     echo '<script type="text/javascript">';
     echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addarea";';
     echo "</script>";
     die();
 } else {
     $_SESSION["messages"] = "New Record Additoin Failed..";
     echo '<script type="text/javascript">';
     echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addarea";';
     echo "</script>";
     die();
     header("location:https://www.consultancynepal.com/cnbackend/addcity");
 }
  ?>