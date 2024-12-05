<?php
$id=$_GET['id'];
require_once("../../../helper/crudoperation.php");
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
?>
 <?php
                         $universitydata=$db->CustomQuery("SELECT * FROM `university` WHERE u_id='$id'");
                       
                         foreach($universitydata as $key=>$data){
                         ?> 
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="link"href="<?=$base_url;?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showuniversities">Display University</a></li>
                     <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>templates/allpages/universities/import_csv.php"><button class="btn btn-success">Import Csv</button></a></li>
                    
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New University</h4>
                        <form action="<?=$base_url;?>database/actions/universities/edit.php" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <div class="row">
                                      <input type="number" name="university_id" value="<?=$id?>" hidden>
                                       <input type="text" name='old_slug' value='<?=$data->slug?>' hidden>
                                    <div class="form-group col-4"><label for="firstname">Name</label><input class="form-control"name="university_name"id="firstname" value="<?=$data->university_name?>"></div>
                                    <div class="form-group col-4 mt-3"><label for="firstname">Address</label><input class="form-control" name="address" value="<?=$data->university_address?>" type="text">
                                    <span class="border-left input-group-addon input-group-append"></span></div>
                                    <div class="form-group col-4 mt-3"><label for="firstname">Email</label><input class="form-control" name="email" value="<?=$data->university_email?>"type="email"></div>
                                    </div><div class="row"><div class="form-group col-4"><label for="firstname">Slug</label>
                                    <input class="form-control" name="slug" id="firstname" value="<?=$data->slug?>"></div>
                                    <div class="form-group col-4">
                                        <label for="exampleSelectGender">Status</label> <select class="form-control"id="exampleSelectGender"name="status">
                                              <?php if($data->status=="1")
                                             { ?><option value="1"selected>Active</option>
                                             <option value="0">Inactive</option><?php }else{ ?><option value="0"selected>Inctive</option><option value="1">Active</option><?php }?>
                                             </select></div>
                                            <div class="form-group col-4"><label for="firstname">No Of Student</label>
                                    <input type="number" class="form-control"name="total_nepali_student" id="firstname" value="<?=$data->total_nepali_student?>"></div>
                                            </div><div class="row">
                                                <div class="form-group col-4">
                                        <label for="exampleSelectGender">Location</label> <select class="form-control"id="exampleSelectGender"name="location">
                                           <option>--select</option>
                                           <?php
                                           $location=$db->CustomQuery("SELECT * FROM location");
                                           foreach($location as $data1){
                                               ?>
                                               <option value="<?=$data1->location_id?>" <?php if($data1->location_id==$data->location_id){echo "selected";}?>><?=$data1->location_name?></option>
                                               <?php
                                           }
                                           ?>
                                          
                                           </select></div>
                                           <div class="form-group col-4"><label for="firstname">PhoneNmber</label> 
                                                <input type="number" class="form-control"name="phonenumber"id="firstname" value="<?=$data->university_phone?>"></div>
                                                <div class="form-group col-4"><label for="firstname">Meta Title</label> 
                                                <input class="form-control"name="meta_title"id="firstname" value="<?=$data->meta_title?>"></div>
                                                </div>
                                                <div class="row">
                                                <div class="form-group col-4"><label for="firstname">Website</label> <input class="form-control"name="website"id="firstname" value="<?=$data->website?>"></div>   
                                                <div class="form-group col-4"><label for="firstname">Vedio</label> <input class="form-control"name="video"id="firstname" value="<?=$data->video?>"></div>
                                                
                                                <div class="form-group col-4"><label for="firstname">Meta Discription</label>
                                                <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="meta_description"name="meta_description"rows="6"wt-ignore-input="true"><?=$data->meta_description?></textarea>
                                                </div>
                                                 </div>
                                                <div class="mt-3 col-lg-4 grid-margin stretch-card"><div class="card"><div class="card-body"><h4 class="card-title d-flex">Image <small class="align-self-end ml-auto"></small>
                                                </h4>
                                                 <input type="text" name="old_image_url" value="<?=$data->image?>" hidden>
                                                <input class="dropify"name="image"type="file"></div></div></div><div class="col-lg-3 mt-4">
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
                                                <div class="form-group col-12"><label for="firstname">Details</label> 
                                                <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="summary"name="detailckediter"rows="6"wt-ignore-input="true"style="resize:none"><?=$data->description?></textarea></div>
                                                </div></div><input class="btn btn-primary" type="submit"value="Submit"></div></div>
                                                </div></div></div>
                <?php
                         }
                                              include "../pathforedit/footer.php"; ?>