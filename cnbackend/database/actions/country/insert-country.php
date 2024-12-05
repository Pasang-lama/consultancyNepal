<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     require_once "../../validation.php";
     if(!empty($errors)){
        
        $_SESSION["errors"]=$errors;
        $_SESSION["old"]=$old;
        
         echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcountry";';
        echo "</script>";
        die();
        
    }else{
          unset($_SESSION['errors']);
          unset($_SESSION['old']);
          
    }
    
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    $img = $_FILES["countryimage"];
    $image_name = $_FILES["countryimage"]["name"];
     $insert_params = [
            
            "country_slug" => $slug,
            "country_name" => $_POST["country_name"],
            "status" => $_POST["status"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "intro_text" => $_POST["introtextckediter"],
            "description" => $_POST["detailckediter"],
            "video" => $_POST["video"],
             
        ];
        
     if(!empty($_FILES['countrythumbimage']['name'])){
         
            $image_name = $_FILES["countrythumbimage"]["name"];
            $tmp_image_name = $_FILES["countrythumbimage"]["tmp_name"];
            $img_extension=strtolower(pathinfo( $image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path= "../../../public/uploads/country_thumb/{$new_img_name}";  
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $insert_params["thumb_image"]="uploads/country_thumb/".$new_img_name;
     }  
     
     
    if(!empty($_FILES['countryimage']['name'])){
       
        $image = $_FILES["countryimage"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/country/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params["image"]="uploads/country/".$new_img_name;
}
   
 
    if ($db->Insert($country_table, $insert_params)) {
        $params = ["page_name " => "countries", "slug" => $slug];
        $db->Insert($slugs_table, $params);
        $_SESSION["message"] = "Country Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcountry";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addcountry";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Country Added Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/addcountry"
        );
    }
}
