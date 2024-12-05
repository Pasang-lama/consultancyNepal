<?php
session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     require_once "../../validation.php";
     if(!empty($errors)){
        
        $_SESSION["errors"]=$errors;
        $_SESSION["old"]=$old;
        
         echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcourse";';
        echo "</script>";
        die();
        
    }else{
          unset($_SESSION['errors']);
          unset($_SESSION['old']);
          
    }
    
    
    
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    $img = $_FILES["image"];
    $image_name = $_FILES["image"]["name"];
     $insert_params = [
            "name"=>$_POST['course_name'],
            "slug" => $slug,
            "status" => $_POST["status"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "description" => $_POST["introtextckediter"],
            "details" => $_POST["detailckediter"],
            "video" => $_POST["video"],
           
        ];
        
      
     
     
    if(!empty($_FILES['image']['name'])){
        $image = $_FILES["image"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/course/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params["image"]="uploads/course/".$new_img_name;
}
   
 
    if ($db->Insert("course", $insert_params)) {
        $params = ["page_name " => "course", "slug" => $slug];
        $db->Insert("slugs", $params);
        $_SESSION["message"] = "Course Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcourse";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcourse";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Country Added Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/addcourse"
        );
    }
}
