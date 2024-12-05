<?php include "layouts/header.php";include "layouts/aside.php"; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
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
                        <h4 class="card-title">Add New Banner</h4>
                        <form action="database/actions/banner/insert.php" class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post" name="addmember" onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="col-6 form-group mt-3"><label for="firstname">Heading Text</label>
                                        <input class="form-control" name="ht" required id="firstname"></div>
                                    <div class="col-6 form-group mt-3"><label for="firstname">info Text</label> <input
                                            class="form-control" name="it" required id="firstname"></div>
                                    <div class="col-6 form-group mt-3"><label for="firstname">Video(Optional)</label>
                                        <input class="form-control" name="video"  
                                            placeholder="Enter url of the video"></div>
                                    <div class="col-6 form-group"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option value="1">Public</option>
                                            <option value="0">Draft</option>
                                        </select></div>
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Banner image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="bannerimage" required type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div><input class="btn btn-primary" name="addmember" type="submit" value="Submit">
            </div>
        </div>
    </div>
</div>
<?php include "layouts/footer.php"; ?>