<?php include "../pathforedit/header.php";include "../pathforedit/aside.php";require_once "../../../database/database.php";require_once "../../../database/tables.php";$db=Database::Instance(); ?>
<?php $id=$_GET["id"];$contentdata=$db->CustomQuery("SELECT * FROM banners WHERE id='$id'");foreach($contentdata as $data): ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showbanner">Display Banner</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Banner</h4>
                        <form action="<?=$base_url?>database/actions/banner/edit.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset><input name="id" value="<?=$id?>" hidden type="number">
                                <div class="row">
                                    <div class="col-6 form-group mt-3"><label for="firstname">Heading Text</label>
                                        <input name="ht" value="<?=$data->heading_text?>" class="form-control"
                                            id="firstname"></div>
                                    <div class="col-6 form-group mt-3"><label for="firstname">info Text</label> <input
                                            name="it" value="<?=$data->info_text?>" class="form-control" id="firstname">
                                    </div>
                                    <div class="col-6 form-group mt-3"><label for="firstname">Video(Optional)</label>
                                        <input name="video" value="<?=$data->video?>" class="form-control"
                                            placeholder="Enter url of the video"></div>
                                    <div class="col-4 form-group"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <?php if($data->status=="1"){ ?>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                            <?php }else{ ?>
                                            <option value="0" selected>Inctive</option>
                                            <option value="1">Active</option>
                                            <?php } ?>
                                        </select></div>
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Banner image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    name="img_url" value="<?=$data->image?>" hidden> <input
                                                    name="bannerimage" class="dropify" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-4">
    <?php
                                        if($data->image){
                                        ?>
    <img src="<?=$base_url?>public/<?=$data->image?>" alt="error" height="200px" width="200px">
    <?php
                                        }
                                        else{
                                        ?>
    <img src="<?=$base_url?>public/uploads/noimage/noimage.jpg" alt="error" height="200px" width="200px">
    <?php
                                        }
                                        ?>
</div>
                                </div>
                    </div>
                </div><input name="addmember" value="+Update banner" class="btn btn-primary" type="submit">
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php include "../pathforedit/footer.php"; ?>