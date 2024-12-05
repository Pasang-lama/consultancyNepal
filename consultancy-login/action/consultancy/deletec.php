<?php
 require_once "../../database/database.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     $did = $_POST["did"];
     $where = "id";
     $value = [$did];
     if ($db->delete("class_table", "id", $value)) {
         echo "1";
     }
 }