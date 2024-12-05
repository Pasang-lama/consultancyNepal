 
 <?php 
 include "../pathforedit/header.php";
 include "../pathforedit/aside.php";
 require_once "../../../database/database.php";
 require_once "../../../database/tables.php";
 $db=Database::Instance();

 $id=$_GET["id"];
 $gallerydata=$db->CustomQuery("SELECT * FROM  sucess_gallery WHERE g_id='$id'");
 
 foreach($gallerydata as $data): 
   $country_id=$data->country_id;
     
 ?>
<div class="main-panel">
    <div class="content-wrapper"><div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showconsultancy">Display  Consultancy</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add sucess Gallery</h4>
                        <form action="<?=$base_url;?>database/actions/consultancy/editsg.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                 <input name="id" value="<?=$id?>" hidden type="number">
                                 
                                <section class="SucessGalleryData">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="firstname">Name</label>
                                            <input
                                            type="text"
                                                class="form-control" name="name" id="firstname" value="<?=$data->name?>">
                                        </div>
                                            <div class="form-group col-4">
                                            <label for="firstname">video</label>
                                            <input
                                            type="text"
                                                class="form-control" name="video" value="<?=$data->video?>" placeholder="video url" id="firstname">
                                        </div>
                                         <div class="form-group col-4">
                                            <label for="firstname">Image</label>
                                            <input hidden type="text" name="old_image" value="<?=$data->image;?>">
                                            <input
                                            type="file"
                                                class="form-control" name="img">
                                        </div>

                                         
                                    </div>
                                      
                                </section>
                                
                                     
                                   
                                    
                                
                                
                             
                                
                                     

                                <input class="btn btn-primary"
                                        name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <?php endforeach; ?>
    <?php include "../pathforedit/footer.php"; ?>