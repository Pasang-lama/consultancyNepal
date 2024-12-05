<?php
include "layouts/header.php";
include "layouts/aside.php"; 
require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance();
 
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="link"href="<?=$base_url;?>dashboard">Dashboard</a>
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
                        <h4 class="card-title">Add New  University</h4>
                        <form action="database/actions/universities/insert.php" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-4"><label for="firstname">Name</label> <input class="form-control"name="university_name"id="firstname"></div>
                                    <div class="form-group col-4 mt-3"><label for="firstname">Address</label><input class="form-control" name="university_Address" type="text">
                                    <span class="border-left input-group-addon input-group-append"></span></div>
                                    <div class="form-group col-4 mt-3"><label for="firstname">Email</label><input class="form-control" name="email" type="email"></div>
                                    </div><div class="row"><div class="form-group col-4"><label for="firstname">Slug</label>
                                    <input class="form-control" name="slug" id="firstname"></div>
                                    <div class="form-group col-4">
                                        <label for="exampleSelectGender">Status</label> <select class="form-control"id="exampleSelectGender"name="status">
                                            <option value="1" Selected>Public</option><option value="0">Draft</option></select></div>
                                            <div class="form-group col-4"><label for="firstname">No Of Student</label>
                                    <input type="number" class="form-control"name="total_nepali_student" id="firstname"></div>
                                            </div><div class="row">
                                                <div class="form-group col-4">
                                        <label for="exampleSelectGender">Location</label> <select class="form-control"id="exampleSelectGender"name="location">
                                           <option>--select</option>
                                           <?php
                                           $location=$db->CustomQuery("SELECT * FROM location");
                                           foreach($location as $data){
                                               ?>
                                               <option value="<?=$data->location_id?>"><?=$data->location_name?></option>
                                               <?php
                                           }
                                           ?>
                                          
                                           </select></div>
                                           <div class="form-group col-4"><label for="firstname">PhoneNmber</label> 
                                                <input type="number" class="form-control"name="phonenumber"id="firstname"></div>
                                                <div class="form-group col-4"><label for="firstname">Meta Title</label> 
                                                <input class="form-control"name="meta_title"id="firstname"></div>
                                                </div>
                                                <div class="row">
                                                <div class="form-group col-4"><label for="firstname">Website</label> <input class="form-control"name="website"id="firstname"></div>   
                                                <div class="form-group col-4"><label for="firstname">Vedio</label> <input class="form-control"name="video"id="firstname"></div>
                                                
                                                <div class="form-group col-4"><label for="firstname">Meta Discription</label>
                                                <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="meta_description"name="meta_description"rows="6"wt-ignore-input="true"></textarea>
                                                </div>
                                                 </div>
                                                <div class="mt-3 col-lg-4 grid-margin stretch-card"><div class="card"><div class="card-body"><h4 class="card-title d-flex">Image <small class="align-self-end ml-auto"></small>
                                                </h4><input class="dropify"name="image"type="file"></div></div></div>
                                                <div class="form-group col-12"><label for="firstname">Details</label> 
                                                <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="summary"name="detailckediter"rows="6"wt-ignore-input="true"style="resize:none"></textarea></div>
                                                </div></div><input class="btn btn-primary" type="submit"value="Submit"></div></div>
                                                </div></div></div>
 
                                                <?php include "layouts/footer.php"; ?>