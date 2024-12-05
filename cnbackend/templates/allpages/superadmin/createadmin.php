<?php include "layouts/header.php";include "layouts/aside.php";
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?php
        include("infos/message.php");
         
        
        
        ?>
        <div id="errormessage">

        </div>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
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
                        <h4 class="card-title">Add New User</h4>
                        <form action="database/actions/superadmin/insert.php" class="cmxform"
                            enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Name <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["name"];
                                     }
                                    ?></span></label> <input
                                            class="form-control" name="name" id="name"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["name"];
                                     }
                                            
                                            ?>" required></div>
                                    <div class="form-group col-6"><label for="lastname">Username <span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["username"];
                                     }
                                    ?></span></label> <input
                                            class="form-control" name="username" id="username" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["username"];
                                     }
                                            
                                            ?>" required></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="email">Email<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["email"];
                                     }
                                    ?></span></label> <input
                                            class="form-control" name="email" type="email" id="email" value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["email"];
                                     }
                                            
                                            ?>" required></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Status<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["status"];
                                     }
                                    ?></span></label>
                                        <select class="form-control" id="exampleSelectGender" id="status" name="status"
                                            required>
                                             
                                            <option value="1" selected>active</option>
                                            <option value="2">Inactive</option>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">password</label> <input
                                            class="form-control" name="password" type="password" id="password" required>
                                    </div>
                                    <div class="form-group col-6"><label for="lastname">Conform password</label> <input
                                            class="form-control" name="conformpassword" type="password" id="conformpassword"
                                            required></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4"><label for="exampleSelectGender">Gender<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["gender"];
                                     }
                                    ?></span></label>
                                        <select class="form-control" id="gender" name="gender" required>
                                              
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">other</option>
                                        </select></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">User Type<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["usertype"];
                                     }
                                    ?></span></label>
                                        <select class="form-control" id="usertype" name="usertype" required>
                                             
                                            
                                            <option value="admin" selected>SuperAdmin</option>
                                            <option value="user">User</option>
                                        </select></div>
                                    <div class="form-group col-4"><label
                                            for="exampleSelectGender">ConsultancyList<span class="text-danger"> </span></label> <select
                                            class="form-control" id="consultancylist" name="consulatncyid">
                                            <option value="not" selected>Select</option>
                                            <?php require_once "database/database.php";$db=Database::Instance();$consultancy_list=$db->CustomQuery("SELECT id,consultancy_name FROM consultancies");foreach($consultancy_list as $list){ ?>
                                            <option value="<?=$list->id?>"><?=$list->consultancy_name?></option>
                                            <?php } ?>
                                        </select></div>
                                </div>
                                <div class="col-lg-4 grid-margin mt-3 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title d-flex">Image <small
                                                    class="align-self-end ml-auto"></small></h4><input class="dropify"
                                                name="adminimage" type="file">
                                        </div>
                                    </div>
                                </div><input class="btn btn-primary" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "layouts/jsvalidation.php"; ?>
    <?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["old"]);
    
    
    include "layouts/footer.php"; ?>