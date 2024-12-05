<?php
include "../pathforedit/header.php";
include "../pathforedit/aside.php";

$id=$_GET['id'];
require_once("../../../helper/crudoperation.php");

$universitydata=$db->CustomQuery("SELECT * FROM `university_location` WHERE location_id='$id'");
foreach($universitydata as $key=>$data){


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
                    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showuniversities">Display location</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit  Location</h4>
                        <form action="<?=$base_url?>database/actions/universities/edit_location.php" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <div class="row">
                                    <input type="number" name="location_id" value="<?=$id?>" hidden>
                                    <div class="form-group col-12"><label for="firstname">Location</label> <input class="form-control"name="location_name" id="firstname" value="<?=$data->location_name?>"></div>
                                    
                                    <span class="border-left input-group-addon input-group-append"></span>
                                    </div>
                                     
                                                <input class="btn btn-primary" type="submit"value="Submit"></div></div>
                                                </div></div></div>
 
                                                <?php 
}
                                                 include "../pathforedit/footer.php";
                                                ?>