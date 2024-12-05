<?php
 session_start();
 require_once "../../database/database.php";
 require_once "../../helper/tables.php";
 require_once "../../helper/config.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

foreach ($_POST["name"] as $key => $value) {

    $img = $_FILES["image"];
    $image_name = $_FILES["image"]["name"][$key];
    if (empty($image_name)) {
        $insert_params = [
            "video" => $_POST["video"][$key],
            "name" => $_POST["name"][$key],
            "country_id" => $_POST["country_id"],
            "consultancy_id" => $_POST["consultancy_id"],
        ];
    } else {
        $new_img = uniqid("IMG-", true);
        $new_img_name = "{$new_img}.webp";
        $img_upload_path = "../../../cnbackend/public/uploads/sucessgallery/{$new_img_name}";
        $tmp_name = $_FILES["image"]["tmp_name"][$key];
        move_uploaded_file($tmp_name,$img_upload_path);
        $insert_params = [
            "video" => $_POST["video"][$key],
            "name" => $_POST["name"][$key],
            "image" => "uploads/sucessgallery/$new_img_name",
            "country_id" => $_POST["country_id"],
            "consultancy_id" => $_POST["consultancy_id"],
        ];
    }


    $exe=$db->Insert("sucess_gallery", $insert_params);
}
 if ($exe) {
        $_SESSION["message"] = "SucessGallery Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "SucessGallery Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy"
        );
    }
   
 
 }