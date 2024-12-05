<?php
//  session_start();
//  ini_set("display_errors", 1);
//  ini_set("display_startup_errors", 1);
//  error_reporting(E_ALL);
require_once "database/database.php";
$db = Database::Instance();
if($_SERVER["REQUEST_METHOD"] == "POST") {
          $update_params =[
             "company_name" =>$_POST["company_name"],
             "company_email" =>$_POST["company_email"],
             "company_address"=>$_POST["company_address"],
             "company_phone" =>$_POST["company_number"],
             "company_mobile" =>$_POST["company_mobilenumber"],
             "company_fax" =>$_POST["company_fax"],
             "company_post_box" => $_POST["post_box"],
             "status"=>$_POST["status"],
             "company_website" => $_POST["website_url"],
             "meta_title" =>$_POST["meta_title"],
             "meta_description" =>$_POST["meta_description"],
         ];
    
        if(!empty($_FILES['admin_profile']['name'])){
            $image_name = $_FILES["admin_profile"]["name"];
            $tmp_image_name = $_FILES["admin_profile"]["tmp_name"];
            $img_extension=strtolower(pathinfo( $image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path= "public/uploads/setting/{$new_img_name}";    
            $old_admin_image=$_POST["admin_profile_old"];
            if(file_exists($old_admin_image) && is_file($old_admin_image)){
                unlink($old_admin_image);
            }  
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $update_params["admin_profile"]="uploads/setting/{$new_img_name}";
        }
            
           
        
            
         if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES["image"]["name"];
            $tmp_image_name = $_FILES["image"]["tmp_name"];
            $img_extension=strtolower(pathinfo( $image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path= "public/uploads/setting/{$new_img_name}";    
            $old_image=$_POST["old_image"];
            if(file_exists($old_image) && is_file( $old_image)){
                unlink($old_image);
            }   
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $update_params["company_logo"]="uploads/setting/{$new_img_name}"; 
            }  
          
        $id=$_POST["id"];
     if ($db->Update("settings", $update_params, "id", [$id])) {
         $_SESSION["message"] = "Update Successfully";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/setting";';
         echo "</script>";
         die();
     } else {
         $_SESSION["messages"] = "Update failed";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/cnbackend/setting";';
         echo "</script>";
         die();
         header(
             "location:https://www.consultancynepal.com/cnbackend/setting"
         );
     }
}

     ?>


<?php include "layouts/header.php";
include "layouts/aside.php";
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li>
                </ol>
            </nav>
        </div>
        <?php
        
        $setting=$db->CustomQuery("SELECT * FROM `settings`");
        foreach($setting as $data){
            
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Website Setting</h4>
                        <form action=" " class="cmxform" enctype="multipart/form-data" id="signupForm" method="post"name="addmember">
                            <fieldset><input name="id" value="<?=$data->id;?>"type="number"hidden><div class="row">
                                <div class="form-group col-4"><label for="firstname">Company Name</label>
                                    <input name="company_name" value="<?=$data->company_name;?>"class="form-control"id="firstname"></div>
                                     <div class="form-group col-4"><label for="firstname">Company Email</label>
                                    <input name="company_email"value="<?=$data->company_email;?>"class="form-control"id="firstname"></div>
                                     <div class="form-group col-4"><label for="firstname">Company Address</label>
                                    <input name="company_address" value="<?=$data->company_address;?>" class="form-control"id="firstname"></div>
                                    
                                        </div>
                                        <div class="row">
                                <div class="form-group col-4"><label for="firstname">Company Phonenumber</label>
                                    <input name="company_number"value="<?=$data->company_phone;?>"class="form-control"id="firstname"></div>
                                     <div class="form-group col-4"><label for="firstname">Company Mobailnumber</label>
                                    <input name="company_mobilenumber"value="<?=$data->company_mobile;?>"class="form-control"id="firstname"></div>
                                     <div class="form-group col-4"><label for="firstname">Company Fax</label>
                                    <input name="company_fax" value=" "class="form-control"id="firstname"></div>
                                    
                                        </div>
                                        <div class="row"> 
                                            <div class="form-group col-4"><label for="firstname">Post Box</label> 
                                                <input name="post_box"value="<?=$data->company_post_box;?>"class="form-control"id="firstname"></div>
                                                 <div class="form-group col-4"><label for="firstname">Website Url</label> 
                                                <input name="website_url" value="<?=$data->company_website;?>"class="form-control"id="firstname"></div>
                                            <div class="form-group col-4">
                                                <label for="exampleSelectGender">Status</label> 
                                              <select class="form-control"id="exampleSelectGender"name="status">
                                                 <?php 
                                                 if($data->status=="1")
                                                 { ?>
                                                 <option value="1"selected>Active</option><option value="0">Inactive</option><?php }else{ ?><option value="0"selected>Inctive</option><option value="1">Active</option><?php } ?>
                                               </select></div>
                                                </div><div class="row"> 
                                                 <div class="form-group col-6"><label for="firstname">Meta Title</label> <textarea class="form-control"id="meta_title"name="meta_title"rows="6"value=" "><?=$data->meta_title;?></textarea></div>
                                                <div class="form-group col-6"><label for="firstname">Meta Discription</label> <textarea class="form-control"id="meta_description"name="meta_description"rows="6"><?=$data->meta_description;?></textarea></div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3 col-lg-4 grid-margin stretch-card"><div class="card"><div class="card-body"><h4 class="card-title d-flex">Company Logo <small class="align-self-end ml-auto"></small></h4>
                                                   <input hidden type="text" name="old_image" value="<?=$data->company_logo;?>">
                                                    <input name="image" class="dropify" type="file"></div>
                                                    </div></div>
                                                    <div class="mt-3 col-lg-4 grid-margin stretch-card"><div class="card"><div class="card-body"><h4 class="card-title d-flex">Admin Profile <small class="align-self-end ml-auto"></small></h4>
                                                   <input hidden type="text" name="admin_profile_old" value="<?=$data->admin_profile;?>">
                                                    <input name="admin_profile" class="dropify" type="file"></div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                                <input name="edit_country"value="Submit"class="btn btn-primary"type="submit"></div></div>
                                                </div></div> 
                                                
                                                <?php
        }
                                                
                                                ?>
    <?php include "layouts/footer.php"; ?>