<?php
 require_once('../helper/config.php');
 unset($_SESSION["username"]);
 unset($_SESSION["usertype"]);
 unset($_SESSION["is_login"]);
 session_destroy();
 session_start();
 $_SESSION["message"] = "You Have Been Logged Out";
 header("location:https://www.consultancynepal.com/consultancy-login/");
 ?>