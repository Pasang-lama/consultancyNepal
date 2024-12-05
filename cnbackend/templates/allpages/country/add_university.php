<?php
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db = Database::Instance();
$id=$_GET["id"];
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a class="link"href="<?=$base_url?>dashboard">Dashboard</a>
                    </li>
                    
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New  University</h4>
                        <form action="<?=$base_url;?>database/actions/country/inserts_univer.php" class="cmxform"enctype="multipart/form-data"id="signupForm"method="post">
                            <fieldset>
                                <input type="number" name="location_id" value="<?=$id?>" hidden>
                                <div class="row">
                                    <div class="form-group col-4"><label for="firstname">Name</label> <input class="form-control"name="university_name[]"id="firstname"></div>
                                     
                                    <div class="form-group col-4 mt-3"><label for="firstname">Email</label><input class="form-control" name="email[]" type="email"></div>
                                     <div class="form-group col-4"><label for="firstname">Website</label> <input class="form-control"name="website[]"id="firstname"></div> 
                                    </div> 
                                      
                                             <section class="mt-2  appenduniversity">

                                          </section>
                                     
                                   
                                    
                                
                                
                                
                                <div class="plusSign  my-3 d-flex justify-content-center">
                                         <i class="fa-sharp fa-solid fa-circle-plus fa-2xl appendcode"></i>
                                </div>
                                            <input class="btn btn-primary" type="submit"value="Submit"></div></div>
                                                </div></div></div>
 
                                    <?php include "../pathforedit/footer.php"; ?>