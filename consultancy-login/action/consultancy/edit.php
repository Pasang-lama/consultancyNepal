<?php
session_start();
 require_once "../../database/database.php";
 require_once "../../helper/tables.php";
 require_once "../../helper/config.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $consultancy_id = $_POST["consultancy_id"];
      require_once "../validation.php";
  
      if(!empty($errors)){
        $_SESSION["errors"]=$errors;
        $_SESSION["old"]=$old;
      
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/consultancy/editconsultancy?id=' . $consultancy_id . '"';
            echo "</script>";
        die();
        
    }else{
          unset($_SESSION['errors']);
          unset($_SESSION['old']);
          
    }
    
   
 
 

     $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["consultancy_slug"]);
     $slug = preg_replace("/-+/", "-", $pre);
    
     $d = $db->CustomQuery(
         "SELECT consultancy_slug FROM consultancies WHERE id={$consultancy_id}"
     );
     $sl = $d[0]->consultancy_slug;
     $img_url = $_POST["img_url"];
     $image_name = $_FILES["consultancyimage"]["name"];
     if (empty($image_name)) {
         $insert_params = [
             "consultancy_name" => $_POST["consultancy_name"],
             "consultancy_slug" => $slug,
             "consultancy_email" => $_POST["consultancy_email"],
             "consultancy_address" => $_POST["consultancy_address"],
             "area"=>$_POST["area"],
             "Province" => $_POST["province"],
             "District" => $_POST["district"],
             "City" => $_POST["city"],
             "consultancy_phone" => $_POST["consultancy_phone"],
             "consultancy_mobile" => $_POST["consultancy_mobile"],
             "consultancy_fax" => $_POST["consultancy_fax"],
             "consultancy_post_box" => $_POST["consultancy_post_box"],
             "consultancy_website" => $_POST["consultancy_website"],
             "consultancy_meta_title" => $_POST["consultancy_meta_title"],
             "consultancy_meta_description" =>
                 $_POST["consultancy_meta_description"],
             "consultancy_intro_text" => $_POST["introtextckediter"],
             "consultancy_description" => $_POST["detailckediter"],
             "nickname" => $_POST["nickname"],
             "status" => $_POST["status"],
             "date" => $_POST["date"],
         ];
     } else {
         $image = $_FILES["consultancyimage"]["tmp_name"];
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
         $webp_path = "../../../cnbackend/public/uploads/consultancy/{$new_img_name}";
         $imgpath = "../../../cnbackend/public/";
         imagewebp($resizedImage, $webp_path, 80);
         imagedestroy($resizedImage);
         imagedestroy($originalImage);
         unlink("{$image_name}");
         unlink($imgpath . $img_url);
         $insert_params = [
             "consultancy_name" => $_POST["consultancy_name"],
             "consultancy_slug" => $slug,
             "consultancy_email" => $_POST["consultancy_email"],
             "consultancy_address" => $_POST["consultancy_address"],
             "area"=>$_POST["area"],
             "Province" => $_POST["province"],
             "District" => $_POST["district"],
             "City" => $_POST["city"],
             "consultancy_phone" => $_POST["consultancy_phone"],
             "consultancy_mobile" => $_POST["consultancy_mobile"],
             "consultancy_fax" => $_POST["consultancy_fax"],
             "consultancy_post_box" => $_POST["consultancy_post_box"],
             "consultancy_website" => $_POST["consultancy_website"],
             "consultancy_meta_title" => $_POST["consultancy_meta_title"],
             "consultancy_meta_description" =>
                 $_POST["consultancy_meta_description"],
             "consultancy_intro_text" => $_POST["introtextckediter"],
             "consultancy_description" => $_POST["detailckediter"],
             "consultancy_logo" => "uploads/consultancy/{$new_img_name}",
             "nickname" => $_POST["nickname"],
             "status" => $_POST["status"],
             "date" => $_POST["date"],
         ];
     }
     if (
         $db->Update($consultancy_table, $insert_params, "id", [
             $consultancy_id,
         ])
     ) {
         $params = ["slug" => $slug];
         $db->Update($slugs_table, $params, "slug", [$sl]);
         $_SESSION["message"] = "Consultancy Edited Successfully";
         echo '<script type="text/javascript">';
         echo 'window.location.href=" https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy";';
         echo "</script>";
         die();
     } else {
         $_SESSION["messages"] = "Bannner Edited failed";
         echo '<script type="text/javascript">';
         echo 'window.location.href=" https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy";';
         echo "</script>";
         die();
         header(
             "location: https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy"
         );
     }
 }