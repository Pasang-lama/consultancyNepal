<?php
 if (
     $db->Update($class_table, [
         "type" => $_POST["status"],
         "date" => $_POST["date"],
         "tid" => $_POST["test"],
     ],"id",[$_POST["c_id"]])
 ) {
     $_SESSION["message"] = "Class Edided Successfully";
     echo '<script type="text/javascript">';
     echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/consultancy/showclasses";';
     echo "</script>";
 } else {
     $_SESSION["messages"] = "Consultancy  Edited failed";
     header("location:https://www.consultancynepal.com/consultancy-login/consultancy/showclasses");
 }
  ?>