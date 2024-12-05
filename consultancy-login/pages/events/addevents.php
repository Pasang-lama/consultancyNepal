<?=$consultancy_id=$_SESSION["consultancy_id"];?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include "infos/message.php";
        
        ?>
        <div class="page-header">
            <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
                <a class="link"href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=base_url("events/showevents")?>">Display Events</a></li></ol>
                </nav></div><div class="row"><div class="col-lg-12"><div class="card"><div class="card-body"><h4 class="card-title">Add New Events</h4>
                <form action="<?=base_url("action/events/insert.php")?>" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post" onsubmit="return validateForm()">
                    <fieldset>
                        <div class="row">
                            <div class="form-group col-6"><label for="firstname">Title  <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["title"];
                                     }
                                    ?></span></label> <input class="form-control"name="title"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["title"];
                                     }
                                            
                                            ?>"id="firstname" required></div>
                             <div class="form-group col-6 mt-3"><label for="firstname">Date <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["date"];
                                     }
                                    ?></span></label> <input class="form-control"name="date"type="date" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["date"];
                                     }
                                            
                                            ?>" required> <span class="border-left input-group-addon input-group-append"></span></div>
                              <input hidden type="number" name="eventstype" value="<?=$consultancy_id;?>">
 
                            </div>
                    <div class="row">
                        <div class="form-group col-4"><label for="firstname">Slug <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["slug"];
                                     }
                                    ?></span></label> <input class="form-control"name="slug"id="firstname" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["slug"];
                                     }
                                            
                                            ?>" required></div>
                        <div class="form-group col-4"><label for="firstname">Address <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["address"];
                                     }
                                    ?></span></label> <input class="form-control" name="address" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["address"];
                                     }
                                            
                                            ?>"id="firstname"></div>
                        <div class="form-group col-4"><label for="exampleSelectGender">Status<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["status"];
                                     }
                                    ?></span></label> <select class="form-control"id="exampleSelectGender"name="status"><option value="1" selected>Public</option><option value="0">Draft</option></select></div>
                        </div><div class="row"><div class="form-group col-6"><label for="firstname">Meta Title <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["meta_title"];
                                     }
                                    ?></span></label> <input class="form-control" name="meta_title" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_title"];
                                     }
                                            
                                            ?>"id="firstname" required></div><div class="form-group col-6"><label for="firstname">Meta Discription <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["meta_description"];
                                     }
                                    ?></span></label> <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="meta_description"name="meta_description"rows="6"wt-ignore-input="true"><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_description"];
                                     }
                                            
                                            ?></textarea></div><div class="form-group col-6"><label for="firstname">Vedio</label> <input  class="form-control"name="video"id="firstname" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["video"];
                                     }
                                            
                                            ?>"></div><div class="mt-3 col-lg-4 grid-margin stretch-card"><div class="card"><div class="card-body"><h4 class="card-title d-flex">Image <small class="align-self-end ml-auto"></small></h4><input class="dropify"name="eventimage"type="file"></div></div></div><div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="summary"name="introtextckediter"rows="6"wt-ignore-input="true"style="resize:none"></textarea></div></div><div class="form-group col-12"><label for="firstname">Details</label> <textarea class="form-control"data-gramm="false"data-quillbot-element="IMpuXxEePO7giRtfkYfZ2"id="summary"name="detailckediter"rows="6"wt-ignore-input="true"style="resize:none"></textarea></div><input class="btn btn-primary"type="submit"value="Submit"></fieldset></form></div></div></div></div></div>
                                    <?php
                                    unset($_SESSION["errors"]);
    unset($_SESSION["old"]);
    
                                    ?>