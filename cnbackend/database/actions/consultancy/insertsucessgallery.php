<?php

 session_start();
 require_once "../../database.php";
 require_once "../../tables.php";
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
        $img_upload_path = "../../../public/uploads/sucessgallery/{$new_img_name}";
        $tmp_name = $_FILES["image"]["tmp_name"][$key];
        move_uploaded_file($tmp_name, $img_upload_path);
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
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showconsultancy";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "SucessGallery Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showconsultancy";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/showconsultancy"
        );
    }
   

    //  $img = $_FILES["img"];
    //  $image_name = $_FILES["img"]["name"];
     
    //  if (empty($image_name)) {
    //      $insert_params = [
    //          "video" => $_POST["video"],
    //          "name"=>$_POST["name"],
    //          "message" => $_POST["introtextckediter"],
    //          "name" => $_POST["name"],
    //          "status" => $_POST["status"],
    //          "country_id" => $_POST["country_id"],
    //      ];
    //  } else {
       
    //      $new_img = uniqid("IMG-", true);
    //      $new_img_name = "{$new_img}.webp";
    //      $img_upload_path = "../../../public/uploads/sucessgallery/{$new_img_name}";
         
    //       $tmp_name=$_FILES["img"]["tmp_name"];
    //      move_uploaded_file($tmp_name,$img_upload_path);
    //       $insert_params = [
    //          "video" => $_POST["video"],
    //          "name"=>$_POST["name"],
    //          "message" => $_POST["introtextckediter"],
    //          "name" => $_POST["name"],
    //          "status" => $_POST["status"],
    //          "image" => "uploads/sucessgallery/$new_img_name",
    //          "country_id" => $_POST["country_id"],
    //      ];
    //  }
    //  if ($db->Insert("sucess_gallery", $insert_params)) {
         
    //      $_SESSION["message"] = "SucessGallery Added Successfully";
    //      echo '<script type="text/javascript">';
    //      echo 'window.location.href=" http://localhost/consultancy/cnbackend/addsucessgallery";';
    //      echo "</script>";
    //      die();
    //  } else {
    //      $_SESSION["messages"] = "SucessGallery Addition failed";
    //      echo '<script type="text/javascript">';
    //      echo 'window.location.href=" http://localhost/consultancy/cnbackend/addsucessgallery";';
    //      echo "</script>";
    //      die();
    //      header(
    //          "location: http://localhost/consultancy/cnbackend/addsucessgallery"
    //      );
    //  }
 }