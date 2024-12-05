
<?php
if(isset($_GET["id"])){
     include "../pathforedit/header.php";
     include "../pathforedit/aside.php";
     require_once "../../../database/database.php";
     require_once "../../../database/tables.php";
    $id =$_GET["id"];
    $db = Database::Instance();
    $datas = $db->CustomQuery("select * from ads where id = $id");
    
    $data=$datas[0];
    $consultancies=$db->CustomQuery("select * from consultancies");
    $sides = $db->CustomQuery("select * from sides");
    
    
}else{

include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
$consultancies=$db->CustomQuery("select * from consultancies");
$sides = $db->CustomQuery("select * from sides");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["id"])){
        // print_r($_POST);
        //  unset($_POST["img_url"]);
          unset($_POST["addads"]);
          $ids=$_POST["id"];
          unset($_POST["id"]);
              // print_r($_POST);
          unset($_POST["addads"]);
              $img_url = $_POST["img_url"];
         unset($_POST["img_url"]);
    $img = $_FILES["image"];
    $image_name = $_FILES["image"]["name"];
          
 if (empty($image_name)) {

    } else {
        
        
        $image = $_FILES["image"]["tmp_name"]; // Temporary file name
$uploadDir = "../../../public/"; // Directory where the image will be stored
$newImageName = "uploads/ads/".uniqid("IMG-", true) . ".webp"; // New unique image name

// Move the uploaded file to the new location with the new name
if (move_uploaded_file($image, $uploadDir . $newImageName)) {
    $_POST["image"] =$newImageName; // Update the POST variable with the new image path
} else {
    // Handle error
    echo "File could not be uploaded.";
}

        
        
        
        // $image = $_FILES["image"]["tmp_name"];
        // move_uploaded_file($image, "$image_name");
        // $originalImage = null;
        // $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        // if ($ext === "jpg" || $ext === "jpeg") {
        //     $originalImage = imagecreatefromjpeg("$image_name");
        // } elseif ($ext === "png") {
        //     $originalImage = imagecreatefrompng("$image_name");
        // } elseif ($ext === "gif") {
        //     $originalImage = imagecreatefromgif("$image_name");
        // }
        // if ($originalImage === false) {
        //     exit();
        // }
        // $originalWidth = imagesx($originalImage);
        // $originalHeight = imagesy($originalImage);
        // $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        // imagecopyresampled(
        //     $resizedImage,
        //     $originalImage,
        //     0,
        //     0,
        //     0,
        //     0,
        //     $originalWidth,
        //     $originalHeight,
        //     $originalWidth,
        //     $originalHeight
        // );
        // $new_img = uniqid("IMG-", true);
        // $new_img_name = "{$new_img}.webp";
        // $webp_path = "../../../public/uploads/ads/{$new_img_name}";
        $imgpath = "../../../public/";
        // imagewebp($resizedImage, $webp_path, 80);
        // imagedestroy($resizedImage);
        // imagedestroy($originalImage);
        // unlink("{$image_name}");
        unlink($imgpath . $img_url);
        //  $_POST["image"] = "uploads/ads/{$new_img_name}";
    }
          $db->Update("ads",$_POST,"id",[$ids]);
                $_SESSION["message"] = "Ads Edited Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showads";';
        echo "</script>";
        die();
      
        
    }else{  
        unset($_POST["img_url"]);
      unset($_POST["addads"]);
        
            $img = $_FILES["image"];
    $image_name = $_FILES["image"]["name"];
    if (empty($image_name)) {
        
    } else {       
        $image = $_FILES["image"]["tmp_name"]; // Temporary file name
$uploadDir = "../../../public/"; // Directory where the image will be stored
$newImageName = "uploads/ads/".uniqid("IMG-", true) . ".webp"; // New unique image name
if (move_uploaded_file($image, $uploadDir . $newImageName)) {
    $_POST["image"] =$newImageName; // Update the POST variable with the new image path
} else {
    // Handle error
    echo "File could not be uploaded.";
}
              
        // $image = $_FILES["image"]["tmp_name"];
        // move_uploaded_file($image, "$image_name");
        // $originalImage = null;
        // $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        // if ($ext === "jpg" || $ext === "jpeg") {
        //     $originalImage = imagecreatefromjpeg("$image_name");
        // } elseif ($ext === "png") {
        //     $originalImage = imagecreatefrompng("$image_name");
        // } elseif ($ext === "gif") {
        //     $originalImage = imagecreatefromgif("$image_name");
        // }
        // if ($originalImage === false) {
        //     exit();
        // }
        // $originalWidth = imagesx($originalImage);
        // $originalHeight = imagesy($originalImage);
        // $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        // imagecopyresampled(
        //     $resizedImage,
        //     $originalImage,
        //     0,
        //     0,
        //     0,
        //     0,
        //     $originalWidth,
        //     $originalHeight,
        //     $originalWidth,
        //     $originalHeight
        // );
        // $new_img = uniqid("IMG-", true);
        // $new_img_name = "{$new_img}.webp";
        // $webp_path = "../../../public/uploads/ads/{$new_img_name}";
        // $imgpath = "../../../public/";
        // imagewebp($resizedImage, $webp_path, 80);
        // imagedestroy($resizedImage);
        // imagedestroy($originalImage);
        // unlink("{$image_name}");
        // unlink($imgpath . $img_url);
        //  $_POST["image"] = "uploads/ads/{$new_img_name}";
    }   
     
        $id=$db->Insert("ads",$_POST);
        $db->Insert("ads_order",['ads'=>$id,"rank"=>1000]);
        
    }
    
}



?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?= $base_url ?>showads">Display Ads</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Ads</h4>
                        <form  class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post">
                            <fieldset>
                                <div class="row">
                                    <?php
                                    if(isset($_GET["id"])){
                                        ?>
                                        <input type="hidden" hidden name="id" value="<?=$_GET['id']?>">
                                        <?php
                                    }
                                    ?>
                                    <div class="form-group col-6"><label for="firstname">Ads Start Date</label> <input
                                            class="form-control" name="start_date" type="date" value="<?=$data->start_date?>"> <span
                                            class="border-left input-group-addon input-group-append"></span></div>
                                    <div class="form-group col-6 mt-2"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <option value="1" <?=(isset($_GET["id"]))?($data->status==1)?"selected":"":""?>>Public</option>
                                            <option value="0" <?=(isset($_GET["id"]))?($data->status==0)?"selected":"":""?>>Draft</option>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3"><label for="firstname">Title</label> <input
                                            class="form-control" name="name" id="firstname tit" required value="<?=(isset($_GET["id"]))?"$data->name":""?>">
                                         </div>
                                                <div class="form-group col-3"><label for="firstname">Duration(Advertisement duration in months:)</label> <input
                                            class="form-control" name="duration" value="<?=(isset($_GET["id"]))?"$data->duration":""?>" id="firstname" required>
                                         </div>
                                    <div class="form-group col-6"><label for="firstname">Consultancy</label> 
                                    <select name="consultancy" style="width:100%" class="cons" multiple="multiple" >
                                       <?php
                                       foreach($consultancies as $consultancy){
                                           ?>
                                              <option value="<?=$consultancy->id?>" <?=(isset($_GET["id"]))?($data->consultancy==$consultancy->id)?"selected":"":""?>><?=$consultancy->consultancy_name?></option>
                                           <?php
                                           
                                       }
                                       
                                       ?>
                                        
                                    </select>
                                    <!--<select class="js-example-basic-multiple" name="states" multiple="multiple">-->
                                    <!--  <option value="AL">Alabama</option>-->
                                    <!--    ...-->
                                    <!--  <option value="WY">Wyoming</option>-->
                                    <!--</select>-->
                                    </div>
                                </div>
                                <div class="row">
                                                                        <div class="form-group col-6"><label for="firstname">Position</label> 
                                    <select name="side" style="width:100%" class="pos" multiple="multiple">
                                                  <?php
                                       foreach($sides as $side){
                                           ?>
                                              <option value="<?=$side->id?>" <?=(isset($_GET["id"]))?($data->side==$side->id)?"selected":"":""?>><?=$side->title?></option>
                                           <?php
                                           
                                       }
                                       
                                       ?>
                                        
                                        
                                    </select>
                                    </div>
                                    <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="image" type="file">
                                                    <input
                                                    name="img_url" value="<?=$data->image?>" hidden>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="col-lg-3 mt-4">
    <?php
                                        if($data->image){
                                        ?>
    <img src="<?=$base_url?>public/<?=$data->image?>" alt="error" height="200px" width="200px">
    <?php
                                        }
                                        else{
                                        ?>
    <img src="<?=$base_url?>public/uploads/noimage/noimage.jpg" alt="error" height="200px" width="200px">
    <?php
                                        }
                                        ?>
</div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-6"><label for="firstname">Alt text</label> <input
                                            class="form-control" value="<?=(isset($_GET["id"]))?"$data->alt":""?>" name="alt" id="firstname"></div>
                                            
                                    <div class="form-group col-6"><label for="firstname">Link</label> <input
                                            class="form-control" name="link" value="<?=(isset($_GET["id"]))?"$data->link":""?>" id="firstname"></div>
                                </div>
                                <div>
                                  <input
                                        class="btn btn-primary" name="addads" type="submit" value="+Submit">
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_GET["id"])){
         include "../pathforedit/footer.php";
    }else{
    include "layouts/footer.php";
    }?> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
    $('.cons').select2({
        placeholder: "Select a Consultancy",
    allowClear: true

    });
    $('.pos').select2({
        placeholder: "Select a Position",
    allowClear: true

    });
});
    </script>
    