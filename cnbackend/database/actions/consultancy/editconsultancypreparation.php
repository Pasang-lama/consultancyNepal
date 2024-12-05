<?php session_start();
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST["id"];
    $cid = $_POST["cid"];
  
    $image_name = $_FILES["image"]["name"];
    if (empty($image_name)) {
        $insert_params = [
            "details" => $_POST["detailckediter"],
            
        ];
    } else {
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
        $webp_path = "../../../public/uploads/content/{$new_img_name}";
        $imgpath = "../../../public/";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        
        $insert_params = [
        "details" => $_POST["detailckediter"],
            "image" => "uploads/content/{$new_img_name}",
            
        ];
    }
    if ($db->Update("consultancyTestPreparationDeatils", $insert_params, "id", [$id])) {
        
        $_SESSION["message"] = "Content Edited Successfully";
   echo "<script type='text/javascript'>
        window.location.href='https://www.consultancynepal.com/cnbackend/templates/allpages/consultancy/addtestprep.php?id=$cid';
     </script>";
        die();
    } else {
        $_SESSION["messages"] = "Bannner Edited failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcontent";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/templates/allpages/consultancy/addtestprep.php?id=$cid"
        );
    }
}
