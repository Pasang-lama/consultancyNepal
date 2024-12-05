<?php
session_start();

if(!isset($_SESSION["is_valid"])){
    header("Location:https://www.consultancynepal.com/cnbackend");
}


if (isset($_GET["id"])) {
        
 
    require_once "../../../database/database.php";
    require_once "../../../database/tables.php";
    $db = Database::Instance();


}else{
    require_once "database/database.php";
    require_once "database/tables.php";
    $db = Database::Instance();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_post = [];
    $new_post = array_merge($new_post, $_POST);
    unset($_POST["country"]);
    $_POST["remarks"] = $_POST["detailckediter"];
    unset($_POST["detailckediter"]);

    if (!isset($_GET["id"])) {
        $id = $db->Insert("consultancynepal_general_enquiry", $_POST);
        if(!empty($new_post["country"])){
                   foreach ($new_post["country"] as $key => $country) {
            $country_entry = [
                "consultancy_enquiry" => $id,
                "country" => $country,
            ];
            $db->Insert(
                "consultancynepal_general_enquiry_country",
                $country_entry
            );
        } 
        }
        header(
            "Location:$base_url/cnepal_enq_new_enquiry_student_add_only"
        );
    } else {
     
        $id = $_POST["id"];
    
        unset($_POST["id"]);

        $db->Update("consultancynepal_general_enquiry",$_POST,"id", [$id]);
          
        $db->delete(
            "consultancynepal_general_enquiry_country",
            "consultancy_enquiry",
            [$id]
        );
        if(!empty($new_post["country"])){
                   foreach ($new_post["country"] as $key => $country) {
            $country_entry = [
                "consultancy_enquiry" => $id,
                "country" => $country,
            ];
            $db->Insert(
                "consultancynepal_general_enquiry_country",
                $country_entry
            );
        } 
        }

        header(
            "Location:$base_url/cnbackend/cnepal_enq_new_enquiry_student_show_only"
        );
    }
}

if (isset($_GET["id"])) { 


    include "../pathforedit/eheader.php";

    include "../pathforedit/easide.php";
    } else {
        include "layouts/eheader.php";
        include "layouts/easide.php";
        
    }

?>





    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="main-panel">
    <div class="content-wrapper">
        <?php include "infos/message.php"; ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>cnepal_enq_new_enquiry_student_add_only">Add Enquiry</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?= $base_url ?>cnepal_enq_new_enquiry_student_show_only">Display Enquiries</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Enquiry</h4>
                        <form action="" class="cmxform" enctype="multipart/form-data"
                            id="signupForm" method="post" name="addmember" onsubmit="return validateForm()">
                            
                            <?php if (isset($_GET["id"])) {

                                $countrya = [];
                                $edit = $db->CustomQuery(
                                    "SELECT *  FROM consultancynepal_general_enquiry where id = $_GET[id]"
                                );
                                $country = $db->CustomQuery(
                                    "SELECT *  FROM consultancynepal_general_enquiry_country where consultancy_enquiry = $_GET[id]"
                                );

                                foreach ($country as $con) {
                                    $countrya[] = $con->country;
                                }
                                ?>
                                <input type="hidden" hidden name="id" value="<?= $_GET[
                                    "id"
                                ] ?>">
                                <?php
                            } ?>
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Name</label> <input
                                            class="form-control" name="name" class="ckt" id="tit" value="<?= isset(
                                                $_GET["id"]
                                            )
                                                ? $edit[0]->name
                                                : "" ?>" >
                                     
                                            </div>
                                    <div class="form-group col-6"><label for="firstname">Phone</label> <input
                                            class="form-control" name="phone" type="text" value="<?= isset(
                                                $_GET["id"]
                                            )
                                                ? $edit[0]->phone
                                                : "" ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Address</label> <input
                                            class="form-control" name="address" id="firstname" value="<?= isset(
                                                $_GET["id"]
                                            )
                                                ? $edit[0]->address
                                                : "" ?>"></div>
                                                <?php $date = date('Y-m-d');
 ?>
<input type="date" hidden name="date" id="date" value="<?= $date ?>" />
                                              <div class="form-group col-6"><label for="firstname">Education</label> <input
                                            class="form-control" name="education" id="firstname" value="<?= isset(
                                                $_GET["id"]
                                            )
                                                ? $edit[0]->education
                                                : "" ?>"></div>
                                </div>
                                
                                
                                              <div class="row">
                            <div class="form-group col-12">
                                <label for="firstname">Country Interested In:</label>
                
                                    <select class="js-example-basic-multiple col-12" name="country[]" multiple="multiple">
                                        <?php $contents = $db->CustomQuery(
                                            "SELECT id , country_name as name FROM countries"
                                        ); ?>
                                        <?php if (isset($_GET["id"])) {
                                            foreach ($contents as $data) { ?>
                                            <option value="<?= $data->id ?>" <?= in_array(
    $data->id,
    $countrya
)
    ? "selected"
    : "" ?> ><?= $data->name ?></option>
                                            <?php }
                                        } else {
                                            foreach ($contents as $data) { ?>
                                            <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                            </div>
                                </div>
                                

                                <div class="form-group col-12"><label for="firstname">Remarks</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary" name="detailckediter"
                                        rows="6" wt-ignore-input="true" style="resize:none"><?= isset(
                                            $_GET["id"]
                                        )
                                            ? $edit[0]->remarks
                                            : "" ?></textarea></div><input
                                    class="btn btn-primary" type="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if (isset($_GET["id"])) { ?>
          <?php include "../pathforedit/footer.php"; ?>
        <?php } else {include "layouts/footer.php";} ?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
            placeholder: "Select a Country",
            allowClear: true
    });
});
</script>