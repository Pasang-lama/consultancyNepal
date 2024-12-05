<?php include "../pathforedit/header.php";include "../pathforedit/aside.php";require_once "../../../database/database.php";require_once "../../../database/tables.php";$db=Database::Instance(); ?>
<?php $id=$_GET["id"];$eventsdata=$db->CustomQuery("SELECT * FROM events WHERE id='$id'");foreach($eventsdata as $data): ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showevents">Display Events</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Events</h4>
                        <form action="<?=$base_url?>database/actions/events/edit.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset><input name="id" value="<?=$id?>" type="number" hidden>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Title</label> <input
                                            name="title" value="<?=$data->title?>" class="form-control" id="firstname">
                                    </div>
                                    <div class="form-group col-6 mt-3"><input name="date" value="<?=$data->date?>"
                                            class="form-control" type="date"> <span
                                            class="border-left input-group-addon input-group-append"></span></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Slug</label> <input name="slug"
                                            value="<?=$data->slug?>" class="form-control" id="firstname"></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <?php if($data->status=="1"){ ?>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                            <?php }else{ ?>
                                            <option value="0" selected>Inctive</option>
                                            <option value="1">Active</option>
                                            <?php } ?>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Meta Title</label> <input
                                            name="meta_title" value="<?=$data->meta_title?>" class="form-control"
                                            id="firstname"></div>
                                    <div class="form-group col-6"><label for="firstname">Meta Discription</label>
                                        <textarea class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description"
                                            name="meta_description" rows="6"
                                            wt-ignore-input="true"><?=$data->meta_description?></textarea></div>
                                    <div class="form-group col-4"><label for="firstname">Video</label> <input
                                            name="video" value="<?=$data->video?>" class="form-control" id="firstname">
                                    </div>
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    name="img_url" value="<?=$data->image?>" hidden> <input
                                                    name="eventimage" class="dropify" type="file">
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
                                    <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                            class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                            name="introtextckediter" rows="6" wt-ignore-input="true"
                                            style="resize:none"> <?=$data->intro_text?></textarea></div>
                                </div>
                                <div class="form-group col-12"><label for="firstname">Details</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" wt-ignore-input="true"
                                        style="resize:none"><?=$data->description?></textarea></div><input
                                    name="addmember" value="Submit" class="btn btn-primary" type="submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php include "../pathforedit/footer.php"; ?>