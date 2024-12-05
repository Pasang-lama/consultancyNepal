<?php session_start();
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);
    
    $insert_params = [
            "university_name"=>$_POST['university_name'],
            "university_address" =>$_POST['university_Address'],
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
            $insert_params["image"]="uploads/university/".$new_img_name;
     }  
     
 
    if ($db->Insert('university', $insert_params)) {
        $params = ["page_name " => "universities", "slug" => $slug];
        $db->Insert("slugs",$params);
        
        $_SESSION["message"] = "Universities Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/adduniversities";';
        echo "</script>";
        die();
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/adduniversities";';
        echo "</script>";
        die();
        $_SESSION["message"] = "Universities Added Failed";
        header(
            "location:https://www.consultancynepal.com/cnbackend/adduniversities"
        );
    }
}
