<?php
 include "../pathforedit/header.php";
 include "../pathforedit/aside.php";
 require_once "../../../database/database.php";
 require_once "../../../database/tables.php";
 $db=Database::Instance();
 $id=$_GET["id"];
 $class_data=$db->CustomQuery("SELECT * FROM `class_table` WHERE id ='$id' ORDER BY `class_table`.`id` DESC");
 $cons=$db->SelectAll("consultancies");
 $class=$db->SelectAll("test_preparation");
 
 foreach($class_data as $data1){
 
 ?>

<div class="main-panel">
    <?php include("message.php") ?>
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url;?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showclasses">Display Class</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Class</h4>
                        <form action="<?=$base_url?>database/actions/consultancy/editclass.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <input type="number" name="id" value="<?=$id?>" hidden>
                                <div class="row">
                                    <div class="form-group col-3"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option value="1" selected>Upcoming</option>
                                        </select></div><br>
                                    <div class="form-group col-8"><label for="exampleSelectGender">Consultancy</label>
                                        <select class="form-control" id="exampleSelectGender" name="consultancy"
                                            required>
                                            <option value="">--------------------SELECT
                                                CONSULTANCY-------------------------</option>
                                            <?php foreach($cons as $data){ ?>
         <option value="<?=$data->id?>" <?php if($data->id==$data1->cid){echo "selected";}?>><?=$data->consultancy_name?></option>
                                            <?php } ?>
                                        </select></div><br>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Class Of</label>
                                        <select class="form-control" id="exampleSelectGender" name="test" required>
                                            <option value="">-----------------------SELECT CLASS ----------------------
                                            </option>
                                            <?php foreach($class as $data3){ ?>
                                            <option value="<?=$data3->id?>" <?php if($data3->id==$data1->tid){echo "selected";}?>><?=$data3->title?></option>
                                            <?php } ?>
                                        </select></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Date</label> <input
                                            class="form-control" name="date" type="date" value="<?=$data1->date?>"></div>
                                            <div class="form-group col-4"><label for="exampleSelectGender">Time</label> <input
                                            class="form-control" name="time" type="time" value="<?=$data1->time?>"></div>
                                    <div class="col-12"><input class="btn btn-primary" name="addmember" type="submit"
                                            value="submit"></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }include "../pathforedit/footer.php"; ?>