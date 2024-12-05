<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
 $errors = [
  "exterror"=>"",
  "emptyerror"=>"",
  "uploaderror"=>""
];
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once("../../../helper/crudoperation.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
           
  // Get the name of the uploaded file
  $file_name = basename($_FILES["fileToUpload"]["name"]);
     if(!empty($file_name)){
         
                 // Set the target directory where the uploaded file will be stored
          $target_dir = "../../../public/csvfiles/university/";
        
          // Get the name of the uploaded file
          $file_name = basename($_FILES["fileToUpload"]["name"]);
        
          // Set the target path of the uploaded file
          $target_file = $target_dir . $file_name;
          
           
          // Get the file extension of the uploaded file
          $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        //   Check if the file is a CSV file
          if($file_type != "csv") {
            $errors['exterror']='Csv Files only Allowed';
          }
          
          
           
             if(!array_filter($errors)){
                   $id_list=[];
                   $list=$db->CustomQuery('SELECT u_id FROM `university`');
                   foreach($list as $data){
                       array_push($id_list,$data->u_id);
                   }
                   
                  
                   
                  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $csv_file = fopen($target_file, "r");
                    
                    while (($row = fgetcsv($csv_file)) !== FALSE) {
                         
                     if (in_array($row[0],$id_list)) {
                          
                            $updatedata=$db->CustomQuery(" UPDATE `university` SET `u_id`='$row[0]',`university_name`='$row[1]',`university_address`='$row[2]',`university_email`='$row[3]',`university_phone`='$row[4]',`location_id`='$row[5]',`slug`='$row[6]',`status`='$row[7]',`meta_title`='$row[8]',`meta_description`='$row[9]',`video`='$row[10]',`description`='$row[11]',`total_nepali_student`='$row[12]' WHERE u_id ='$row[0]'");    
                        }
                        else{
                            $result=$db->CustomQuery("INSERT INTO `university` (`u_id`,`university_name`, `university_address`,`university_email`,`university_phone`,`location_id`, `slug`, `status`, `meta_title`, `meta_description`,`video`, `description`, `total_nepali_student`) 
                            VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]')");
                          
                        }
                         
                   
                    }
                    unlink($target_file);
                    
                     $_SESSION["message"] = "Uploads Successfully";
                       echo '<script type="text/javascript">';
                        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showuniversities";';
                        echo "</script>";
                        die();
        
            
                    fclose($csv_file);
                      } else {
                          $errors['uploaderror']='Sorry, there was an error uploading your file';
                        
                      }
                   
                   
                      
                }
     }
     else{
         $errors['emptyerror']='Image Can not be Empty';
         
     }

}
 
?>
 
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("../../../infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="link"href="<?=$base_url?>dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showuniversities">Display University</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Drop Csv File Here</h4><span style="color:red" font-size:30px;><?=$errors['exterror']?><?=$errors['emptyerror']?><?=$errors['uploaderror']?></span>
                        <form action="" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="mt-3 col-lg-12 grid-margin stretch-card">
                                        <div class="card"><div class="card-body">
                                            <h4 class="card-title d-flex">Image <small class="align-self-end ml-auto"></small></h4>
                                                <input class="dropify" name="fileToUpload" type="file">
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                        <input class="btn btn-primary" type="submit"value="Submit">
                                 
                    </div>
                </div>
             </div>
                                       <?php
                                              include "../pathforedit/footer.php"; ?>