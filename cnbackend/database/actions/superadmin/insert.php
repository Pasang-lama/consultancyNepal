<?php ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(E_ALL);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    require_once "../../validation.php";
     if(!empty($errors)){
        
        $_SESSION["errors"]=$errors;
        $_SESSION["old"]=$old;
        
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/createadmin";';
        echo "</script>";
        die();
        
    }else{
          unset($_SESSION['errors']);
          unset($_SESSION['old']);
          
    }
    
 
    require_once "../../tables.php";
    require_once "../../database.php";
    $db = Database::Instance();
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["conformpassword"];
    if ($password !== $cpassword) {
        $_SESSION["messages"] = " Password and confirm password should match ";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/createadmin";';
        echo "</script>";
        die();
    } elseif ($password == null) {
        $_SESSION["messages"] = "Password cannot be null ";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/createadmin";';
        echo "</script>";
        die();
    } else {
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
    }
    $gender = $_POST["gender"];
    $usertype = $_POST["usertype"];
    $status = $_POST["status"];
    if (isset($_POST["consulatncyid"])) {
        $consultancy_id = $_POST["consulatncyid"];
    } else {
        $consultancy_id = " ";
    }
    $img = $_FILES["adminimage"];
    $image_name = $_FILES["adminimage"]["name"];
    if (empty($image_name)) {
        $insert_params = [
            "consultancy_id" => "$consultancy_id",
            "name" => "$name",
            "status" => "$status",
            "username" => "$username",
            "email" => "$email",
            "password" => "$hash_password",
            "gender" => "$gender",
            "user_type" => "$usertype",
        ];
    } else {
        $image = $_FILES["adminimage"]["tmp_name"];
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
        $webp_path = "../../../public/uploads/admin/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params = [
            "consultancy_id" => "$consultancy_id",
            "name" => "$name",
            "status" => "$status",
            "username" => "$username",
            "email" => "$email",
            "password" => "$hash_password",
            "gender" => "$gender",
            "image" => "uploads/admin/$new_img_name",
            "user_type" => "$usertype",
        ];
    }
    if ($db->Insert("admins", $insert_params)) {
        $_SESSION["message"] = "New Admin Added..";
        header(
            "location:https://www.consultancynepal.com/cnbackend/createadmin"
        );
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/createadmin";';
        echo "</script>";
        die();
    } else {
        $_SESSION["message"] = "New Record Addition failed..";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/createadmin";';
        echo "</script>";
        die();
    
}
}
