<?php 
$consultancy_id=$_SESSION["consultancy_id"];
 $cons=$db->CustomQuery("Select consultancy_name from consultancies where id={$consultancy_id}");
 $class=$db->SelectAll($test_prep_table); ?>
<div class="main-panel"><?php include("message.php");
 
?><div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=base_url("consultancy/showclasses")?>">Display Class</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Class</h4>
                        <form action="<?=base_url("actions/consultancy/insertc.php")?>" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-3"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option  value="0"  selected>Upcoming</option>
                                        </select></div><br>
                                    <div class="form-group col-8 mx-5" style="font-size:20px">
                                        
                                    <input hidden type="number" name="consultancy_id" value="<?=$consultancy_id?>">
                                        <?php
                                         foreach($cons as $data){ 
                                         echo $data->consultancy_name;
                                         }
                                        ?>
                                    </div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Class Of<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["test"];
                                     }
                                    ?></span></label>
                                        <select class="form-control" id="exampleSelectGender" name="test"  required>
                                            <option value="">-----------------------SELECT CLASS ----------------------
                                            </option><?php foreach($class as $data){ ?><option value="<?=$data->id?>">
                                                <?=$data->title?></option><?php } ?>
                                        </select></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Date<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["date"];
                                     }
                                    ?></span></label> <input
                                            class="form-control" name="date" type="date"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["date"];
                                     }
                                            
                                            ?>" required></div>
                                    <div class="col-12"><input class="btn btn-primary" name="addmember" type="submit"
                                            value="Submit"></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
      unset($_SESSION["errors"]);
    unset($_SESSION["old"]);
    
    ?>
