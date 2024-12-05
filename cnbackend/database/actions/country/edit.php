<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    $id = $_POST["id"];
    $img_url = $_POST["img_url"];
    $d = $db->CustomQuery("SELECT country_slug FROM countries WHERE id={$id}");
    $sl = $d[0]->country_slug;
    
      $insert_params = [
            "country_name"=>$_post['country_name'],
            "country_slug" => $slug,
            "country_name" => $_POST["country_name"],
            "status" => $_POST["status"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "intro_text" => $_POST["introtextckediter"],
            "description" => $_POST["detailckediter"],
            "video" => $_POST["video"],
            "status" => $_POST["status"],
        ];
     if(!empty($_FILES['countrythumbimage']['name'])){
            $image_name = $_FILES["countrythumbimage"]["name"];
            $tmp_image_name = $_FILES["countrythumbimage"]["tmp_name"];
            $img_extension=strtolower(pathinfo( $image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path= "../../../public/uploads/country_thumb/{$new_img_name}";  
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $old_thumb_image="../../../public/".$_POST['old_thumb_img'];
            unlink($old_thumb_image);
            $insert_params["thumb_image"]="uploads/country_thumb/".$new_img_name;
     } 
     
     $image_name=$_FILES['countryimage']['name'];
     
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
        $imgpath = "../../../public/";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        $old_image="../../../public/".$_POST["old_image"];
        unlink($old_image);
        unlink("{$image_name}");
        unlink($imgpath.$img_url);
        $insert_params["image"]="uploads/country/".$new_img_name;

        
    }
    
    if ($db->Update($country_table, $insert_params, "id", [$id])) {
        $params = ["slug" => $slug];
        $db->Update($slugs_table, $params, "slug", [$sl]);
        $_SESSION["message"] = "Country Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "Country Edited failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showcountry";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showbanner"
        );
    }
}
