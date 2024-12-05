<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
     $update_params = [
            "university_name"=>$_POST['university_name'],
            "university_address" =>$_POST['address'],
            "slug" => $slug,
            "university_email"=>$_POST["email"],
            "website"=>$_POST["website"],
            "location_id"=>$_POST["location"],
            "university_phone"=>$_POST["phonenumber"],
            "status" => $_POST["status"],
            "meta_title" => $_POST["meta_title"],
            "meta_description" => $_POST["meta_description"],
            "description" => $_POST["detailckediter"],
            "video" => $_POST["video"],
            "status" => $_POST["status"],
            "total_nepali_student"=>$_POST['total_nepali_student']
        ];
       
 
     if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES["image"]["name"];
            $tmp_image_name = $_FILES["image"]["tmp_name"];
            $img_extension=strtolower(pathinfo( $image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path= "../../../public/uploads/university/{$new_img_name}"; 
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $old_image="../../../public/".$_POST['old_image_url'];
            if(file_exists($old_image) && is_file($old_image)){
                unlink($old_image);
            } 
            $update_params["image"]="uploads/university/".$new_img_name;
     }
      $old_slug=$_POST['old_slug'];
     
 $university_id=$_POST['university_id'];
    if ($db->Update('university',$update_params,"u_id",[$university_id])) {
        $params = ["page_name " => "universities", "slug" => $slug];
        $db->Update($slugs_table,$params,'slug',[$old_slug]);
        
        $_SESSION["message"] = "Universities Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showuniversities";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showuniversities";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Universities Edited Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/showuniversities"
        );
    }
}
