<?php
session_start();
require_once "../../database/database.php";
$db = Database::Instance();
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     require_once "../validation.php";
     if(!empty($errors)){
        
        $_SESSION["errors"]=$errors;
        $_SESSION["old"]=$old;
        
         echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/events/addevents";';
        echo "</script>";
        die();
        
    }else{
          unset($_SESSION['errors']);
          unset($_SESSION['old']);
          
    }
     
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    $img = $_FILES["eventimage"];
    $image_name = $_FILES["eventimage"]["name"];
    if (empty($image_name)) {
        $insert_params = [
            "title" => $_POST["title"],
            "slug" => $slug,
            "date" => $_POST["date"],
            "Address"=>$_POST["address"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "intro_text" => $_POST["introtextckediter"],
            "description" => $_POST["detailckediter"],
            "video" => $_POST["video"],
            "status" => $_POST["status"],
        ];
    } else {
        $image = $_FILES["eventimage"]["tmp_name"];
        move_uploaded_file($image, "$image_name");
        $originalImage = null;
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        if ($ext === "jpg" || $ext === "jpeg") {
            $originalImage = imagecreatefromjpeg("$image_name");
        } elseif ($ext === "png") {
            $originalImage = imagecreatefrompng("$image_name");
        } elseif ($ext === "gif") {
            $originalImage = imagecreatefromgif("$image_name");
        }
        if ($originalImage === false) {
            exit();
        }
        $originalWidth = imagesx($originalImage);
        $originalHeight = imagesy($originalImage);
        $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        imagecopyresampled(
            $resizedImage,
            $originalImage,
            0,
            0,
            0,
            0,
            $originalWidth,
            $originalHeight,
            $originalWidth,
            $originalHeight
        );
        $new_img = uniqid("IMG-", true);
        $new_img_name = "{$new_img}.webp";
        $webp_path = "../../../cnbackend/public/uploads/events/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = [
            "title" => $_POST["title"],
            "slug" => $slug,
             "Address"=>$_POST["address"],
            "date" => $_POST["date"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "intro_text" => $_POST["introtextckediter"],
            "description" => $_POST["detailckediter"],
            "video" => $_POST["video"],
            "image" => "uploads/events/$new_img_name",
            "status" => $_POST["status"],
        ];
    }
    
   
    if ($last_id=$db->Insert("events", $insert_params)) {
         $db->Insert("consultancy_events",["consultancy_id"=>$_POST["eventstype"],"events_id"=> $last_id]);
        $params = ["page_name " => "events", "slug" => $slug];
        $db->Insert("slugs", $params);
        $_SESSION["message"] = "Events Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/events/addevents";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "Events Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/events/addevents";';
        echo "</script>";
        die();
        header("location:https://www.consultancynepal.com/consultancy-login/events/addevents");
    }
}
