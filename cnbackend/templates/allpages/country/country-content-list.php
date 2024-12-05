<?php 
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?>
<?php $id=$_GET["id"];$countrycontent=$db->CustomQuery("SELECT * FROM country_contents where country_id='$id' ORDER BY country_contents.rank ASC;"); ?>
<div class="main-panel"><div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Show Content</h3><div><a href="<?=$base_url?>templates/allpages/country/rank_country_content.php?id=<?=$id?>"><button class="btn btn-primary">Order</button></a></div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
            <a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"aria-current="page">
                <a class="link"href="<?=$base_url?>showcountry">Show Country</a></li></ol></nav></div>
                <div class="card"><div class="card-body"><h4 class="card-title">show content</h4><div class="row"><div class="col-12"><div class="table-responsive">
                    <table class="table"id="order-listing">
                        <thead><tr><th>SN</th><th>Title</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead><tbody><?php foreach($countrycontent as $key=>$data){ ?><tr><td><?=++$key?></td><td><?=$data->title?></td><td><?=$data->date?></td>
                        <td>
                            <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="country_contents" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger checkstatus"data-id="<?=$data->id?>"
                            data-tablename="country_contents" data-status="1"></i>
                            
                            <?php
                        }
                        ?>
                      
                            </td>
                        <td><a class="link"href="<?=$base_url?>templates/allpages/country/edit_country_content.php?id=<?=$data->id?>"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a class="link btn btn-outline-primary delete-ccc"href="<?=$base_url?>database/actions/country/delete_cc.php?id=<?=$data->id?>"data-did="<?=$data->id?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div><?php include "../pathforedit/footer.php"; ?>