  <?php 
 $id=$_GET["id"];
 $consultancy_id=$_SESSION["consultancy_id"];
 $cons1=$db->CustomQuery("Select consultancy_name from consultancies where id={$consultancy_id}");
 $classes=$db->CustomQuery("Select * from class_table where id={$id}");
 $class=$db->SelectAll($test_prep_table);
 foreach($classes as $datas){
     
 
 
 ?>
<div class="main-panel"><?php include("message.php")?><div class="content-wrapper">
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
                        <h4 class="card-title">Edit AboutUs</h4>
                        <form action="<?=base_url("actions/consultancy/editclasses.php")?>" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-3"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option value="1" selected>Upcoming</option>
                                            <option value="2">Active</option>
                                           
                                        </select></div><br>
                                    <div class="form-group col-8 mx-5" style="font-size:20px">
                                    <input hidden type="number" name="c_id" value="<?=$id?>">
                                        <?php
                                         foreach($cons1 as $data){ 
                                         echo $data->consultancy_name;
                                         }
                                        ?>
                                    </div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Class Of</label>
                                        <select class="form-control" id="exampleSelectGender" name="test" required>
                                            <option value="">-----------------------SELECT CLASS ----------------------
                                            </option><?php foreach($class as $data){
                                               
                                                ?>
                                                 
                                                <option value="<?=$data->id;?>" 
                                                <?php
                                               
                                                if($datas->tid==$data->id){
                                                    echo "selected";
                                                }
                                                 
                                                ?>
                                                >

                                                <?=$data->title?></option><?php } ?>
                                        </select></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Date</label> <input
                                            class="form-control" name="date" type="date" value="<?=$datas->date;?>"></div>
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
 }
    ?>
