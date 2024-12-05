<?php include "layouts/header.php";
include "layouts/aside.php"; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showcourse">Display  Course</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Course</h4>
                        <form action="<?=$base_url?>database/actions/course/insert.php" class="cmxform" enctype="multipart/form-data"  method="post"  
                               onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="firstname">Name<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["course_name"];
                                     }
                                    ?></span> </label> <input class="form-control titl"
                                            name="course_name" id="username" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["course_name"];
                                     }
                                            
                                            ?>" required  data-tb="course" >
                                            <div id="content-title-check" style="display:none;height:100px;overflow:scroll;background-color:pink;">
                                                
                                            </div>
                                    </div>
                                     <div class="form-group col-6"><label for="firstname">Slug <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["slug"];
                                     }
                                    ?></span></label> <input
                                            class="form-control" name="slug" id="slug" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["slug"];
                                     }
                                            
                                            ?>" required></div>
                                </div>
                                    
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="firstname">Vedio</label>
                                        <input class="form-control" name="video"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["video"];
                                     }
                                            
                                            ?>" id="firstname">
                                    </div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="status" name="status"  required>
                                            <option value="1" selected>Public</option>
                                            <option value="0">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="firstname">Meta Title<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["meta_title"];
                                     }
                                    ?>
                                        </label> <input class="form-control"
                                            name="meta_title"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_title"];
                                     }
                                            
                                            ?>"id="firstname" required>
                                    </div>
                                    <div class="form-group col-6"><label for="firstname">Meta Discription <span class="bg-danger" id="errormessage">
            
        </span></label>
                                        <textarea class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description"
                                            name="meta_description" rows="6" wt-ignore-input="true" required><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_description"];
                                     }
                                            
                                            ?></textarea></div>
                                     
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4>
                                                <input class="dropify" name="image" type="file">
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                            class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                            name="introtextckediter" rows="6" wt-ignore-input="true"
                                            style="resize:none"><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["introtextckediter"];
                                     }
                                            
                                            ?></textarea></div>
                                </div>
                                <div class="form-group col-12"><label for="firstname">Details</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" wt-ignore-input="true" style="resize:none"><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["detailckediter"];
                                     }
                                            
                                            ?></textarea></div>
                    </div>
                </div><input class="btn btn-primary" name="" type="submit" value="Submit">
            </div>
        </div>
    </div>
</div>
</div>
<?php 
 unset($_SESSION["errors"]);
unset($_SESSION["old"]);
include "layouts/jsvalidation.php"; ?>
<?php include "layouts/footer.php"; ?>