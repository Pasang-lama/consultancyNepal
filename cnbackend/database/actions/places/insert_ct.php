 <?php
 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if ($db->Insert("city", ["city" => $_POST["city"]])) {
     $_SESSION["message"] = "New Record Added..";
     echo '<script type="text/javascript">';
     echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcity";';
     echo "</script>";
     die();
 } else {
     $_SESSION["messages"] = "New Record Additoin Failed..";
     echo '<script type="text/javascript">';
     echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcity";';
     echo "</script>";
     die();
     header("location:https://www.consultancynepal.com/cnbackend/addcity");
 }
  ?>
