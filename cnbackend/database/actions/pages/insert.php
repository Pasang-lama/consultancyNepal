<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
// print_r($_POST);
// die;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["extras"])){
        // print_r($_POST);
        // die;
        
        $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
        
        $table_n = $table[0]->slug;
        
       
         $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $pre);
    $img = $_FILES["pageimage"];
    $image_name = $_FILES["pageimage"]["name"];
    if (empty($image_name)) {
        $insert_params = ['phone' => $_POST['phone'],'extras'=>$_POST['extras'] ,'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
    } else {
        $image = $_FILES["pageimage"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/page/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = ['phone' => $_POST['phone'],'extras'=>$_POST['extras'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
    }
    if ($db->Insert($table_n, $insert_params)) {
        $params = ['page_name ' => "$table_n", 'slug' => $slug];
        $db->Insert($slugs_table, $params);
        $_SESSION['message'] = 'pages Added Successfully';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpages";';
        echo '</script>';
        die();
    } else {
        $_SESSION['messages'] = 'pages Addition failed';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpages";';
        echo '</script>';
        die();
        header("location:https://www.consultancynepal.com/cnbackend/addpages");
    }
        
        
        
    }
    
    
    $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $pre);
    $img = $_FILES["pageimage"];
    $image_name = $_FILES["pageimage"]["name"];
    if (empty($image_name)) {
        $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
    } else {
        $image = $_FILES["pageimage"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/page/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
    }
    if ($db->Insert($pages_table, $insert_params)) {
        $params = ['page_name ' => 'langin', 'slug' => $slug];
        $db->Insert($slugs_table, $params);
        $_SESSION['message'] = 'pages Added Successfully';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpages";';
        echo '</script>';
        die();
    } else {
        $_SESSION['messages'] = 'pages Addition failed';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpages";';
        echo '</script>';
        die();
        header("location:https://www.consultancynepal.com/cnbackend/addpages");
    }
}
