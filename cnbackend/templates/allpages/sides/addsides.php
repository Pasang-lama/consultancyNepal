
<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
if(isset($_GET["id"])){
     include "../pathforedit/header.php";
     include "../pathforedit/aside.php";
     require_once "../../../database/database.php";
     require_once "../../../database/tables.php";
     
     $db= Database::Instance();
    $id =$_GET["id"];


    $sides = $db->CustomQuery("select * from sides where id=$id");
    $data = $sides[0];
   

    
}else{

include "layouts/header.php";
include "layouts/aside.php";


}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["id"])){
        // print_r($_POST);
        // die;

          unset($_POST["addads"]);
          $ids=$_POST["id"];
          unset($_POST["id"]);

           $db->Update("sides",$_POST,"id",[$ids]);
           echo "<script>
           window.location.href = 'https://www.consultancynepal.com/cnbackend/showsides';
           </script>";
        
    }else{ 
        print_r($_POST);
        // die;
          unset($_POST["addads"]);
        $id=$db->Insert("sides",$_POST);
        
    }
    
}




?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?= $base_url ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?= $base_url ?>showsides">Display Ads Position</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Position</h4>
                        <form  class="cmxform" 
                            id="signupForm" method="post">
                            <fieldset>
                                <div class="row">
                                    <?php
                                    if(isset($_GET["id"])){
                                        ?>
                                        <input type="hidden" hidden name="id" value="<?=$_GET['id']?>">
                                        <?php
                                    }
                                    ?>
                             
                                </div>
                                <div class="row">
                                    <div class="form-group col-12"><label for="firstname">Position Name</label> <input
                                            class="form-control" name="title" id="firstname tit" required value="<?=(isset($_GET["id"]))?"$data->title":""?>">
                                         </div>
                                          <div class="form-group col-12">
                                              <label for="firstname">Status</label> 
                                          <select class="cons" name="status" style="width:100%" multiple="multiple">
                                              <option value="1" <?=($data->status==0)?"":"selected"?> >public</option>
                                              
                                              <option value="0" <?=($data->status==0)?"selected":""?>>Draft</option>
                                          </select>
                                         </div>
                                         
                                             
                                  
                                </div>
                               
                              
                                <div>
                                  <input
                                        class="btn btn-primary" name="addads" type="submit" value="+Submit">
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_GET["id"])){
         include "../pathforedit/footer.php";
    }else{
    include "layouts/footer.php";
    }?> 
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
    $('.cons').select2({
        placeholder: "Select a Staus",
    allowClear: true

    });

});
    </script>

    