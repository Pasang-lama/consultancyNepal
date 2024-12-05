<?php
session_start();
unset($_SESSION["useri"]);
unset($_SESSION["usernames"]);
$_SESSION["message"]="Logged Out Successfully";

             echo "<script>";
            echo "window.location.href='https://www.consultancynepal.com/consultancys-end/authentication'";
            echo "</script>";
            die;