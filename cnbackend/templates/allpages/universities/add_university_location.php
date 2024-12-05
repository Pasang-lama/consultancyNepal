<?php
include "layouts/header.php";
include "layouts/aside.php"; 
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="link"href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showuniversities">Display location</a></li>
                    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>templates/allpages/universities/import_location.php"><button class='btn btn-success'>Import Csv</button></a></li>
                    
                    
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Location</h4>
                        <form action="database/actions/universities/insert_location.php" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-12"><label for="firstname">Location</label> <input class="form-control"name="location_name"id="firstname"></div>
                                    
                                    <span class="border-left input-group-addon input-group-append"></span>
                                    </div>
                                     
                                                <input class="btn btn-primary" type="submit"value="Submit"></div></div>
                                                </div></div></div>
 
                                                <?php include "layouts/footer.php"; ?>