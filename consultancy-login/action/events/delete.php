<?php
 require_once "../../database/database.php";
 $db = Database::Instance();
 if (isset($_POST["did"])) {
     $did = $_POST["did"];
     $where = "id";
     $value = [$did];
     $info = $db->SelectByCriteria("events", "image,slug", "id", $value);
     $file = $info[0]->image;
     $slug = [$info[0]->slug];
     $imgpath = "../../../cnbackend/public/";
     if ($db->delete("events",$where, $value)) {
         $db->Delete("consultancy_events","events_id",$value);
         unlink($imgpath.$file);
         $db->delete("slugs", "slug", $slug);
         echo "1";
     }
 }

