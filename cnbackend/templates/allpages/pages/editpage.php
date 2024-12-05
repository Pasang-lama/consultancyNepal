<?php include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db = Database::Instance(); ?><?php $id = $_GET["id"];
$table =  $_GET["table"];
$pagesdata = $db->CustomQuery("SELECT * FROM `$table`  WHERE id='$id'");
foreach ($pagesdata as $pages) : 


?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link" href="<?= $base_url ?>showpages">Display Pages</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Pages</h4>
                        <form action="<?= $base_url ?>database/actions/pages/edit.php" class="cmxform" enctype="multipart/form-data" id="signupForm" method="post" name="addmember" onsubmit="return validateForm()">
                            <fieldset><input name="id" value="<?= $id ?>" hidden type="number">
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Title</label> <input name="title" value="<?= $pages->title ?>" class="form-control" id="firstname"></div>
                                    <div class="form-group col-6"><label for="firstname">Slug</label> <input name="slug" value="<?= $pages->slug ?>" class="form-control" id="firstname"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="exampleSelectGender">Pages Type</label> <select class="form-control" id="exampleSelectGender" onchange="subs(this)"  name="page_type" required>
                                            <option value="0">----------------------------------Select Option-----------------------------------</option>
                                            <?php $page_type = $db->SelectAll("{$page_type_table}");
                                            foreach ($page_type as $data) { ?><option value="<?= $data->id ?>" <?= ($data->id == $pages->page_type_id) ? "selected" : "" ?>><?= $data->title ?></option><?php } ?>
                                        </select></div>
                                         <div class="form-group col-12" id="ap"><label for="exampleSelectGender">Extras</label> 
                                        <?php
                                        if(isset($pages->extras)){
                                            ?>
                                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                                            <?php
                                            $data = $db->CustomQuery("select `tables`.table_name as tabled from `page_types` join `tables` on `page_types`.tables=`tables`.id   where `page_types`.id=$pages->page_type_id");
                                            // print_r($data);
                                            $tab = $data[0]->tabled;
                                            if($tab=="consultancies"){
                                                 $sql = "select id,consultancy_name as title from $tab";
                                            }elseif($tab=="countries"){
                                                 $sql = "select id,country_name as title from $tab";
                                            }else{
                                            $sql = "select id,title from $tab";
                                            }
                                            $cols = $db->CustomQuery($sql);
                                            ?>
                                            
                                             <select class="js-example-basic-multiple col-12 mt-3" id="exampleSelectGender" name="extras" multiple="multiple">
                                                 <option value="0" <?=($pages->extras==0)?"selected":""?>>------No Option------</option>
                                                 <?php foreach($cols as $col){ ?>
                                                 <option value="<?=$col->id?>" <?=($pages->extras==$col->id)?"selected":""?> ><?=$col->title?></option>
                                                 
                                                 <?php } ?>
                                                 
                                                 
                                  
                                        </select>
                                            <?php
                                        }
                                        
    
    

    
    

                                        
                                        ?>
                                        </div>
                                         <?php
                                        if(isset($pages->extras)){
                                            ?>
                                            <input hidden  type="text" value="<?=$table?>" name="prev_extra">
                                            <?php
                                            
                                        }else{
                                        ?>
                                        <!--<input hidden  type="text" value="0" name="prev_extra">-->
                                        <?php
                                        
                                        
                                        }?>
                                        
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label> <select class="form-control" id="exampleSelectGender" name="status"><?php if ($pages->status == "1") { ?><option value="1" selected>Active</option>
                                                <option value="0">Inactive</option><?php } else { ?><option value="0" selected>Inctive</option>
                                                <option value="1">Active</option><?php } ?>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Meta Title</label> <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description1" name="meta_title" rows="8" wt-ignore-input="true"><?= $pages->meta_title ?></textarea></div>
                                    <div class="form-group col-6"><label for="firstname">Meta Discription</label> <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description1" name="meta_description" rows="8" wt-ignore-input="true"><?= $pages->meta_description ?></textarea></div>
                                </div>
                                <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title d-flex">Image <small class="align-self-end ml-auto"></small></h4><input name="img_url" value="<?= $pages->image ?>" hidden> <input name="pageimage" class="dropify" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6"><label for="firstname">Phone</label> <input name="phone" value="<?= $pages->phone ?>" class="form-control" id="firstname"></div>
                                <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="introtextckediter" rows="6" wt-ignore-input="true" style="resize:none"><?= $pages->intro_text ?></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Detail</label> <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter" rows="6" wt-ignore-input="true" style="resize:none"><?= $pages->description ?></textarea></div>
                    </div>
                </div><input name="addmember" value="Submit" class="btn btn-primary" type="submit">
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
</div><?php endforeach; ?><?php include "../pathforedit/footer.php"; ?>
<?php if(isset($pages->extras)){ ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 $('.js-example-basic-multiple').select2({
                   placeholder: "Select a function To link"
                });
                </script>

<?php } ?>
