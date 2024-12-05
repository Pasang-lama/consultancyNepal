<?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
     $edit_params=[
         "cid"=>$_POST["consultancy"],
         "tid"=>$_POST["test"],
         "date"=>$_POST["date"],
          "time" => $_POST["time"],
         ];
     
     
      $id=$_POST["id"];
      if ($db->Update("class_table",$edit_params,"id", [$id])) {
         
         $_SESSION["message"] = "Class Edited Successfully";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showclasses";';
         echo "</script>";
         die();
     } else {
         $_SESSION["messages"] = "Class Edited failed";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showclasses";';
         echo "</script>";
         die();
         header(
             "location:https://www.consultancynepal.com/cnbackend/showclasses"
         );
     }
 }