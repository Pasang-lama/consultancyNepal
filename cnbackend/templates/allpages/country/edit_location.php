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
                            href="<?=$base_url?>showcountry">Show Country</a></li>
                </ol>
            </nav>
        </div>
         <?php
        $id=$_GET['id'];
        $location=$db->CustomQuery("SELECT * FROM location WHERE location_id='$id'");
        foreach($location as $data){
    ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Country location</h4>
                        <form action="<?=$base_url;?>database/actions/country/edit_location.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <input type="number" name="location_id" value="<?=$id?>" hidden>
 
                                <section class="SucessGalleryData">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="firstname">Location Name</label>
                                            <input
                                            type="text"
                                                class="form-control" name="locationname"  value="<?=$data->location_name?>" id="firstname">
                                        </div>
                                           

                                         
                                    </div>
                                      
                                </section>
                                 
                                   
                                    
                                
                                
                                 
                                
                                     

                                <input class="btn btn-primary"
                                        name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                        <?php
        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../pathforedit/footer.php"; ?>