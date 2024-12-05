<?php include "../pathforedit/header.php";include "../pathforedit/aside.php";
require_once "../../../database/database.php";require_once "../../../database/tables.php";$db=Database::Instance(); ?>
<?php $id=$_GET["id"];$admindata=$db->CustomQuery("SELECT * FROM admins WHERE id='$id'");foreach($admindata as $data): ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>createadmin">Add Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showadmin">Display admin</a></li>
                </ol>
                <div></div>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Admin</h4>
                        <form action="https://www.consultancynepal.com/cnbackend/database/actions/superadmin/edit.php"
                            class="cmxform" enctype="multipart/form-data" method="post">
                            <fieldset>
                                <input name="id" type="number" value="<?=$id?>" hidden>
                                <div class="row">
                                    <div class="col-6 form-group"><label for="firstname">Name</label>
                                        <input name="name" class="form-control" id="firstname" value="<?=$data->name?>">
                                    </div>
                                    <div class="col-6 form-group"><label for="lastname">Username</label>
                                        <input name="username" class="form-control" id="lastname"
                                            value="<?=$data->username?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group"><label for="email">Email</label>
                                        <input name="email" class="form-control" type="email" value="<?=$data->email?>">
                                    </div>
                                    <div class="col-6 form-group"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status">
                                            <?php if($data->status=="1"){ ?>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                            <?php }else{ ?>
                                            <option value="0" selected>Inctive</option>
                                            <option value="1">Active</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="firstname">New password</label>
                                        <input name="password" class="form-control" type="password" id="firstname">
                                    </div>
                                    <div class="col-6 form-group"><label for="lastname">New Conform password</label>
                                        <input name="conformpassword" class="form-control" type="password"
                                            id="lastname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group"><label for="exampleSelectGender">Gender</label><select
                                            class="form-control" id="exampleSelectGender" name="gender">
                                            <?php if($data->gender=="male"){ ?>
                                            <option value="male" selected>male</option>
                                            <option value="female">female</option>
                                            <option value="other">other</option>
                                            <?php }elseif($data->gender=="female"){ ?>
                                            <option value="female" selected>female</option>
                                            <option value="male">male</option>
                                            <option value="other">other</option>
                                            <?php }else{ ?>
                                            <option value="female" selected>other</option>
                                            <option value="male">male</option>
                                            <option value="other">female</option>
                                            <?php } ?>
                                        </select></div>
                                    <div class="col-6 form-group"><label for="exampleSelectGender">User Type</label>
                                        <select class="form-control" id="exampleSelectGender" name="usertype">
                                            <?php if($data->user_type=="admin"){ ?>
                                            <option value="admin" selected>Admin</option>
                                            <option value="user">User</option>
                                            <?php }else{ ?>
                                            <option value="user" selected>user</option>
                                            <option value="admin">Admin</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-lg-6 grid-margin mt-3 stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image<small
                                                        class="align-self-end ml-auto"></small>
                                                </h4><input name="img_url" hidden value="<?=$data->image?>"> <input
                                                    name="adminimage" class="dropify" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php
                                        if($data->image){
                                        ?>
                                        <img src="<?=$base_url?>public/<?=$data->image?>" alt="error"  height="200px" width="200px">
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <img src="<?=$base_url?>public/uploads/noimage/noimage.jpg" alt="error"   height="200px" width="200px">
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                                <input name="edit_super_admin" class="btn btn-primary" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php include "../pathforedit/footer.php"; ?>