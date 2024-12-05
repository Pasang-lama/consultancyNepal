   <?php
  
 session_start();
  require_once "../../database/database.php";
 require_once "../../helper/tables.php";
 require_once "../../helper/config.php";
 $db = Database::Instance();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
     $img = $_FILES["img"];
     $image_name = $_FILES["img"]["name"];
     
     if (empty($image_name)) {
         $insert_params = [
             "video" => $_POST["video"],
             "name"=>$_POST["name"],
             
         ];
     } else {
       
         $new_img = uniqid("IMG-", true);
         $new_img_name = "{$new_img}.webp";
         $img_upload_path = "../../../cnbackend/public/uploads/sucessgallery/{$new_img_name}";
         $old_image=$_POST["old_image"];
         $imgpath = "../../../public/cnbackend/";
         unlink($imgpath .$old_image);
         
          $tmp_name=$_FILES["img"]["tmp_name"];
         move_uploaded_file($tmp_name,$img_upload_path);
          $insert_params = [
             "video" => $_POST["video"],
             "name"=>$_POST["name"],
             "image" => "uploads/sucessgallery/$new_img_name",
              
         ];
     }
      $id=$_POST["id"];
      if ($db->Update("sucess_gallery", $insert_params,"g_id", [$id])) {
         
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