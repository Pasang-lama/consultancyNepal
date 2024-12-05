<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?= $base_url ?>showpages">Display Pages</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Pages</h4>
                        <form action="database/actions/pages/insert.php" class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post" name="addmember" onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Title</label> <input
                                            class="form-control" name="title" id="firstname"></div>
                                    <div class="form-group col-6"><label for="firstname">Slug</label> <input
                                            class="form-control" name="slug" id="firstname"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="exampleSelectGender">Pages Type</label>
                                        <select class="form-control" id="exampleSelectGender" name="page_type" onchange="subs(this)" required>
                                            <option value="0">----------------------------------Select
                                                Option-----------------------------------</option>
                                            <?php 
                                            $page_type = $db->SelectAll("{$page_type_table}");
                                            foreach ($page_type as $data) { ?>
                                                <option value="<?= $data->id ?>" ><?= $data->title ?></option>
                                            <?php } ?>
                                        </select>
                                        <div id="ap">
                                            
                                            
                                        </div>
                                        </div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <option value="1">Public</option>
                                            <option value="0">Draft</option>
                                        </select></div>
                                        
                               
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Meta Title</label> <textarea
                                            class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description1"
                                            name="meta_title" rows="8" wt-ignore-input="true"></textarea></div>
                                    <div class="form-group col-6"><label for="firstname">Meta Discription</label>
                                        <textarea class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description1"
                                            name="meta_description" rows="8" wt-ignore-input="true"></textarea></div>
                                </div>
                                <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title d-flex">Image <small
                                                    class="align-self-end ml-auto"></small></h4><input class="dropify"
                                                name="pageimage" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6"><label for="firstname">Phone</label> <input
                                        class="form-control" name="phone" id="firstname"></div>
                                <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="introtextckediter" rows="6" wt-ignore-input="true"
                                        style="resize:none"></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Detail</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" wt-ignore-input="true" style="resize:none"></textarea></div>
                    </div>
                </div><input class="btn btn-primary" name="addmember" type="submit" value="Submit">
            </div>
        </div>
    </div>
</div>
</div>
<script>

    function subs(data){
        if(data.value==0){return false}
          $.ajax({
 
                url:'https://www.consultancynepal.com/cnbackend/AjaxRequest/pages.php',
 
                type: "POST",
                data:{pagetype:data.value},
 
                success: function (datas) {
                    if(datas!="0"){
           var newSelect = $('<select>', {
                           id: 'newSelectId', // Set the ID for the new select element
                    html: datas,
                    name:'extras',// Set the inner HTML to the received options
                    'class': 'js-example-basic-multiple col-12 mt-3', // Add your class name for select2
                    'multiple': 'multiple' // Add the multiple attribute
                });

                // Append the new select element after the element with a certain ID
                // $(data).after(newSelect);
                $("#ap").html(newSelect);

                // Initialize select2 on the new select element
                $('.js-example-basic-multiple').select2({
                   placeholder: "Select a function To link"
                });
                         
                    }else{
                        var newSelect="<span></span>";
                         $("#ap").html(newSelect);
                        
                        
                    }
                }
 
            });
    
        
        
    }
</script>
<?php include "layouts/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>


</script>
