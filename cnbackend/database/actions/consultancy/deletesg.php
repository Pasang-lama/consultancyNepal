<?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     $did = $_POST["did"];
     $where = "g_id";
     $value = [$did];
     $info = $db->SelectByCriteria(
         "sucess_gallery",
         "image",
         "g_id",
         $value
     );
     $file = $info[0]->image;
     $imgpath = "../../../public/";
     if ($db->delete("sucess_gallery", $where, $value)) {
         unlink($imgpath . $file);
           
         
     }
 }