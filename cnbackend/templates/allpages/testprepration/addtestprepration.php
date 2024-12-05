<?php include "layouts/header.php";
include "layouts/aside.php"; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?= $base_url ?>showtestprepration">Display TestPrepration</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Testprepration</h4>
                        <form action="database/actions/test-preparation/insert.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Title</label> <input
                                            class="form-control titl" name="title" id="firstname" data-tb="test_preparation" >
                                            <div id="content-title-check" style="display:none;width:400px;height:200px;overflow:scroll;background-color:pink;">
                                                
                                            </div></div>
                                    <div class="form-group col-6 mt-3"><input class="form-control" name="date"
                                            type="date"> <span
                                            class="border-left input-group-addon input-group-append"></span></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Slug</label> <input
                                            class="form-control" name="slug" id="firstname"></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <option value="1">Public</option>
                                            <option value="0">Draft</option>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Meta Title</label> <input
                                            class="form-control" name="meta_title" id="firstname"></div>
                                    <div class="form-group col-6"><label for="firstname">Meta Discription</label>
                                        <textarea class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="meta_description1"
                                            name="meta_description" rows="6" wt-ignore-input="true"></textarea></div>
                                    <div class="form-group col-6"><label for="firstname">Video</label> <input
                                            class="form-control" name="video" id="firstname"></div>
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="testprep_image" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                            class="form-control" data-gramm="false"
                                            data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                            name="introtextckediter" rows="6" wt-ignore-input="true"
                                            style="resize:none"></textarea></div>
                                </div>
                                <div class="form-group col-12"><label for="firstname">Details</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" wt-ignore-input="true" style="resize:none"></textarea></div><input
                                    class="btn btn-primary" name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "layouts/footer.php"; ?>