<?php
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db = Database::Instance();
?>
<div class="main-panel">
    <div class="content-wrapper"><div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showcountry">Display Country</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Country location</h4>
                        <form action="<?=$base_url;?>database/actions/country/insert_location.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <input hidden type="number" name="country_id" value="<?=$_GET["cid"];?>">
                                <section class="SucessGalleryData">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="firstname">Location Name</label>
                                            <input
                                            type="text"
                                                class="form-control" name="locationname[]" id="firstname">
                                        </div>
                                           

                                         
                                    </div>
                                      
                                </section>
                                 <section class="mt-2 appendlocation">

                                 </section>
                                     
                                   
                                    
                                
                                
                                
                                <div class="plusSign  my-3 d-flex justify-content-center">
                                         <i class="fa-sharp fa-solid fa-circle-plus fa-2xl appendcode"></i>
                                </div>
                             
                                
                                     

                                <input class="btn btn-primary"
                                        name="addmember" type="submit" value="submit ">
                            </fieldset>
                        </form>
                        <div class="mt-5">
                         
 
                <?php $id=$_GET["cid"];
                $location=$db->CustomQuery("SELECT * FROM location WHERE country_id='$id'");
                ?>
 
                <h4 class="card-title">Show Location</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                      <table class="table"id="order-listing">
                        <thead><tr><th>SN</th><th>Name</th><th>Actions</th></tr></thead>
                        <tbody><?php foreach($location as $key=>$data){ ?><tr>
                            <td><?=++$key?>
                            </td><td><?=$data->location_name?></td>
                             <td><a class="link"href="<?=$base_url?>templates/allpages/country/edit_location.php?id=<?=$data->location_id?>">
                                 <button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> 
                                 <a class="link btn btn-outline-primary delete-clocation"href="#" data-did="<?=$data->location_id?>"><i class="fa-solid fa-trash"></i></a>
                                  <a class="link"href="<?=$base_url?>templates/allpages/country/add_university.php?id=<?=$data->location_id?>">
                        <button class="btn btn-outline-primary">university</button></a>
                                 </td></tr><?php } ?></tbody></table>
                                 </div></div></div> 
                        
               
        </div>
    </div>
    <?php include "../pathforedit/footer.php"; ?>