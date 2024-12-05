<?php include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db = Database::Instance(); ?>
<?php $id = $_GET["id"];
$pagetypedata = $db->CustomQuery("SELECT * FROM page_types WHERE id='$id'");
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php
foreach ($pagetypedata as $data): ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a class="link"
                                href="<?= $base_url ?>showpagetype">Display Pagetype</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit pagetype</h4>
                            <form action="<?= $base_url ?>database/actions/pagetype/edit.php" class="cmxform"
                                enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                                onsubmit="return validateForm()">
                                <fieldset><input name="id" value="<?= $id ?>" hidden type="number">
                                    <div class="row">
                                        <div class="form-group col-6"><label for="firstname">Title</label> <input
                                                name="title" value="<?= $data->title ?>" class="form-control" id="firstname">
                                        </div>
                                        <div class="form-group col-6"><label for="firstname">Slug</label> <input name="slug"
                                                value="<?= $data->slug ?>" class="form-control" id="firstname"></div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                            <select class="form-control" id="exampleSelectGender" name="status">
                                                <?php if ($data->status == "1") { ?>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                <?php } else { ?>
                                                    <option value="0" selected>Inctive</option>
                                                    <option value="1">Active</option>
                                                <?php } ?>
                                            </select></div>
                                                       <div class="form-group col-6"><label for="exampleSelectGender">Is Own Page</label>
                                        <select class="form-control" id="exampleSelectGender" name="specific">
                                            <option <?=($data->is_specific==0)?"selected":""?> value="0">No</option>
                                            <option <?=($data->is_specific==1)?"selected":""?> value="1">Yes</option>
                                        </select></div>
                                        <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title d-flex">Image <small
                                                            class="align-self-end ml-auto"></small></h4><input
                                                        name="img_url" value="<?= $data->image ?>" hidden> <input
                                                        name="pagetypeimage" class="dropify" type="file">
                                                </div>
                                            </div>
                                        </div>
                                                              <div class="form-group col-12">
                                    <label for="nnn">Link Table</label>
                                    <select class="js-example-basic-multiple js-states form-control" name="table" multiple="multiple">
                                        <option <?=($data->tables==0)?"selected":""?> value="0">No  Table</option>
                                        <?php 
                                        $datasa = $db->CustomQuery("select * from  tables");
                                        foreach($datasa as $datad){
                                        ?>
                                        <option <?=($data->tables==$datad->id)?"selected":""?> value="<?=$datad->id?>"><?=$datad->table_name?></option>
                                        <?php } ?>
                                        
                                    </select>
                                    
                                </div>
                                    </div>
                                    <div class="form-group col-12"><label for="firstname">content Details</label> <textarea
                                            class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                            rows="6" style="resize:none"
                                            wt-ignore-input="true"><?= $data->description ?></textarea></div>
                        </div>
                    </div><input name="addmember" value="+Update pagetype" class="btn btn-primary" type="submit">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php include "../pathforedit/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select a Table To link"
    });
});
</script>