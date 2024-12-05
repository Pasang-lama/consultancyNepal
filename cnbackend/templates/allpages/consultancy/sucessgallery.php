  <?php include "../pathforedit/header.php";include "../pathforedit/aside.php";?>

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
                        <form action="<?=$base_url;?>database/actions/consultancy/insertsucessgallery.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <input hidden type="number" name="country_id" value="<?=$_GET["co_id"];?>">
                                <input hidden type="number" name="consultancy_id" value="<?=$_GET["c_id"];?>">
                                <section class="SucessGalleryData">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="firstname">Name</label>
                                            <input
                                            type="text"
                                                class="form-control" name="name[]" id="firstname">
                                        </div>
                                            <div class="form-group col-4">
                                            <label for="firstname">video</label>
                                            <input
                                            type="text"
                                                class="form-control" name="video[]" placeholder="video url" id="firstname">
                                        </div>
                                         <div class="form-group col-4">
                                            <label for="firstname">Image</label>
                                            <input
                                            type="file"
                                                class="form-control" name="image[]">
                                        </div>

                                         
                                    </div>
                                      
                                </section>
                                 <section class="mt-2 appendSucessGallery">

                                 </section>
                                     
                                   
                                    
                                
                                
                                
                                <div class="plusSign  my-3 d-flex justify-content-center">
                                         <i class="fa-sharp fa-solid fa-circle-plus fa-2xl appendcode"></i>
                                </div>
                             
                                
                                     

                                <input class="btn btn-primary"
                                        name="addmember" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../pathforedit/footer.php"; ?>