 <?php include "../pathforedit/header.php";include "../pathforedit/aside.php";require_once "../../../database/database.php";require_once "../../../database/tables.php";$db=Database::Instance();$id=$_GET['id'];
$admindata=$db->CustomQuery("SELECT * FROM area WHERE id={$id}"); 
$city=$db->CustomQuery("Select * from city");
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showarea">Display  Area</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit  Area</h4>
                         
                       
                        <form action="<?=$base_url;?>database/actions/places/edit_area.php"
                            class="cmxform" enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <input name="id" value="<?=$id?>" type="hidden">
                                    <div class="col-4 form-group"><label for="firstname">Area Name</label> <input
                                            name="area" value="<?=$admindata[0]->area?>" class="form-control"
                                            id="firstname" required></div>
                                  
                                   
                                 </div>
                                
                                <input name="addmember" value="Submit" class="btn btn-primary" type="submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><?php include "../pathforedit/footer.php"; ?>