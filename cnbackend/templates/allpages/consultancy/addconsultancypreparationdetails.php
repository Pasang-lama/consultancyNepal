<?php
 include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
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
                        <h4 class="card-title">Add Consultancy Test Preparation Details</h4>
                        <form action="<?=$base_url?>database/actions/consultancy/insertconsultancypreparation.php" class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post" name="addmember">
                            <fieldset>
                                <input type="hidden" name="ctpid" value="<?=$_GET['id']?>">
                                <input type="hidden" name="cid" value="<?=$_GET['cid']?>">
                                <div class="form-group col-12"><label for="firstname">Details</label>
                                    <textarea class="form-control" data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="detailckediter" rows="6" wt-ignore-input="true" style="resize:none"></textarea>
                                </div>
                                <div class="row">    
                                    <div class="mt-3 col-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="image" type="file">
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                         
                                
                              
                                <input class="btn btn-primary" name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include "../pathforedit/footer.php"; ?>
