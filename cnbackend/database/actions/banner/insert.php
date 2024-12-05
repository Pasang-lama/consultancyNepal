<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $img = $_FILES["bannerimage"];
    $image_name = $_FILES["bannerimage"]["name"];
    if (empty($image_name)) {
        $insert_params = [
            "heading_text" => $_POST["ht"],
            "info_text" => $_POST["it"],
            "video" => $_POST["video"],
            "status" => $_POST["status"],
        ];
    } else {
        $image = $_FILES["bannerimage"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/banner/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = [
            "heading_text" => $_POST["ht"],
            "info_text" => $_POST["it"],
            "video" => $_POST["video"],
            "status" => $_POST["status"],
            "image" => "uploads/banner/{$new_img_name}",
        ];
    }
    if ($db->Insert($banner_table, $insert_params)) {
        $_SESSION["message"] = "Banner Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showbanner";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "Bannner Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showbanner";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showbanner"
        );
    }
}
