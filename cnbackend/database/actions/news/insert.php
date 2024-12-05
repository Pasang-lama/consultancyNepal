<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $pre);
    $img = $_FILES["news"];
    $image_name = $_FILES["news"]["name"];
    if (empty($image_name)) {
        $insert_params = ['title' => $_POST['title'], 'slug' => $slug, 'date' => $_POST['date'], 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'video' => $_POST['video'], 'status' => $_POST['status']];
    } else {
        $image = $_FILES["news"]["tmp_name"];
        move_uploaded_file($image, "$image_name");
        $originalImage = null;
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        if ($ext === 'jpg' || $ext === 'jpeg') {
            $originalImage = imagecreatefromjpeg("$image_name");
        } else if ($ext === 'png') {
            $originalImage = imagecreatefrompng("$image_name");
        } else if ($ext === 'gif') {
            $originalImage = imagecreatefromgif("$image_name");
        }
        if ($originalImage === false) {
            exit;
        }
        $originalWidth = imagesx($originalImage);
        $originalHeight = imagesy($originalImage);
        $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $originalWidth, $originalHeight, $originalWidth, $originalHeight);
        $new_img = uniqid("IMG-", TRUE);
        $new_img_name = "{$new_img}.webp";
        $webp_path = "../../../public/uploads/news/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = ['title' => $_POST['title'], 'slug' => $slug, 'date' => $_POST['date'], 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'video' => $_POST['video'], 'image' => "uploads/news/$new_img_name", 'status' => $_POST['status']];
    }
    if ($db->Insert($news_table, $insert_params)) {
        $params = ['page_name ' => 'content', 'slug' => $slug];
        $db->Insert($slugs_table, $params);
        $_SESSION['message'] = 'News Added Successfully';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addnews";';
        echo '</script>';
        die();
    } else {
        $_SESSION['messages'] = 'News Addition failed';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addnews";';
        echo '</script>';
        die();
        header("location:https://www.consultancynepal.com/cnbackend/addnews");
    }
}
