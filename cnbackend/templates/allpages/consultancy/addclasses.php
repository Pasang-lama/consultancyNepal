<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance(); ?><?php $cons = $db->SelectAll($consultancy_table);
                                $class = $db->SelectAll($test_prep_table); ?><div class="main-panel"><?php include("infos/message.php") ?><div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url; ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link" href="<?= $base_url ?>showclasses">Display Class</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Class</h4>
                        <form action="database/actions/consultancy/insertc.php" class="cmxform" enctype="multipart/form-data" id="signupForm" method="post" name="addmember" onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-3"><label for="exampleSelectGender">Status</label> <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option value="1" selected>Upcoming</option>
                                        </select></div><br>
                                    <div class="form-group col-8"><label for="exampleSelectGender">Consultancy</label> <select class="form-control" id="exampleSelectGender" name="consultancy" required>
                                            <option value="">--------------------SELECT CONSULTANCY-------------------------</option><?php foreach ($cons as $data) { ?><option value="<?= $data->id ?>"><?= $data->consultancy_name ?></option><?php } ?>
                                        </select></div><br>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Class Of</label> <select class="form-control" id="exampleSelectGender" name="test" required>
                                            <option value="">-----------------------SELECT CLASS ----------------------</option><?php foreach ($class as $data) { ?><option value="<?= $data->id ?>"><?= $data->title ?></option><?php } ?>
                                        </select></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Date</label> <input class="form-control" name="date" type="date"></div>
                                     <div class="form-group col-4"><label for="exampleSelectGender">Time</label> <input class="form-control" name="time" type="time"></div>
                                    <div class="col-12"><input class="btn btn-primary" name="addmember" type="submit" value="Submit"></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><?php include "layouts/footer.php"; ?>