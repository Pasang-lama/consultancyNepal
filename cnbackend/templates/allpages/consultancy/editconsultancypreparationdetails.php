<?php
 include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include 'infos/message.php'; ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Consultancy Test Preparation Details</h4>
                        <form action="<?=$base_url?>database/actions/consultancy/editconsultancypreparation.php" class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post" name="addmember">
                            <fieldset>
                                <?php
                                $ctpid=$_GET['id'];
                                $sql=$db->CustomQuery("Select * from consultancyTestPreparationDeatils where ctpid=$ctpid");
                                foreach($sql as $data){?>
                                    
                               
                                <input type="hidden" name="cid" value="<?=$_GET['cid']?>">
                                <input type="hidden" name="id" value="<?=$data->id?>">
                                <div class="form-group col-12"><label for="firstname">Details</label>
                                    <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="detailckediter" rows="6" wt-ignore-input="true" style="resize:none"><?=$data->details?></textarea>
                                </div>
                                <div class="row">    
                                                                   <div class="mt-3 col-lg-8 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    name="img_url" value="<?=$data->image?>" hidden> <input
                                                    name="image" class="dropify" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-4">
    <?php
                                        if($data->image){
                                        ?>
    <img src="<?=$base_url?>public/<?=$data->image?>" alt="error" height="250px" width="300px">
    <?php
                                        }
                                        else{
                                        ?>
    <img src="<?=$base_url?>public/uploads/noimage/noimage.jpg" alt="error" height="250px" width="300px">
    <?php
                                        }
                                        ?>
</div>
                                  
                                </div>
                         
                                <?php
                                }
                                ?>
                              
                                <input class="btn btn-primary" name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include "../pathforedit/footer.php"; ?>
