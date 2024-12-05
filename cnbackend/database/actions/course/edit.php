<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    $id = $_POST["id"];
    $img_url = $_POST["img_url"];
    $d = $db->CustomQuery("SELECT slug FROM course WHERE id={$id}");
    $sl = $d[0]->country_slug;
    
      $insert_params = [
            "slug" => $slug,
            "name" => $_POST["name"],
            "status" => $_POST["status"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "description" => $_POST["introtextckediter"],
            "details" => $_POST["detailckediter"],
            "video" => $_POST["video"],
             
        ];
    
     
     $image_name=$_FILES['image']['name'];
     
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
        $imgpath = "../../../public/";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        $old_image="../../../public/".$_POST["old_image"];
        unlink($old_image);
        unlink("{$image_name}");
        unlink($imgpath.$img_url);
        $insert_params["image"]="uploads/course/".$new_img_name;

        
    }
    
    if ($db->Update("course", $insert_params, "id", [$id])) {
        $params = ["slug" => $slug];
        $db->Update("slugs", $params, "slug", [$sl]);
        $_SESSION["message"] = "Course Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcourse";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "Course Edited failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcourse";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showcourse"
        );
    }
}
