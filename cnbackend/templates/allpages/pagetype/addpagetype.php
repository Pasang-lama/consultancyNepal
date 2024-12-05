<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";

?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-panel">
    <div class="content-wrapper">
        <?php include "infos/message.php"; ?>
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
                        <h4 class="card-title">Add New pagetype</h4>
                        <form action="database/actions/pagetype/insert.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Title</label> <input
                                            class="form-control" name="title" id="firstname"></div>
                                    <div class="form-group col-6"><label for="firstname">Slug</label> <input
                                            class="form-control" name="slug" id="firstname"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <option value="1">Public</option>
                                            <option value="0">Draft</option>
                                        </select></div>
                                            <div class="form-group col-6"><label for="exampleSelectGender">Is Own Page</label>
                                        <select class="form-control" id="exampleSelectGender" name="specific">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select></div>
                                    <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="pagetypeimage" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="nnn">Link Table</label>
                                    <select class="js-example-basic-multiple js-states form-control" name="table" multiple="multiple">
                                        <option value="0">No  Table</option>
                                        <?php 
                                        $datas = $db->CustomQuery("select * from  tables");
                                        foreach($datas as $data){
                                        ?>
                                        <option value="<?=$data->id?>"><?=$data->table_name?></option>
                                        <?php } ?>
                                        
                                    </select>
                                    
                                </div>
                                <div class="form-group col-12"><label for="firstname">content Details</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" style="resize:none" wt-ignore-input="true"></textarea></div>
                    </div>
                </div><input class="btn btn-primary" name="addmember" type="submit" value="+add banner">
            </div>
        </div>
    </div>
</div>
<?php include "layouts/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select a Table To link"
    });
});
</script>