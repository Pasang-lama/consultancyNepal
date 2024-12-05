<?php 
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?>
<?php $id=$_GET["id"];
$location=$db->CustomQuery("SELECT * FROM location WHERE country_id='$id'");
?>
<div class="main-panel"><div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Show  university</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
            <a class="link"href="<?=$base_url?>">Dashboard</a></li>
            <li class="breadcrumb-item active"aria-current="page">
                <a class="link"href="<?=$base_url?>addcountry">Add Country</a></li></ol></nav></div>
                <div class="card"><div class="card-body"><h4 class="card-title">Show University</h4><div class="row"><div class="col-12"><div class="table-responsive">
                    <table class="table"id="order-listing">
                        <thead><tr><th>SN</th><th>Name</th><th>Actions</th></tr></thead>
                        <tbody><?php foreach($location as $key=>$data){ ?><tr>
                            <td><?=++$key?>
                            </td><td><?=$data->location_name?></td>
                             <td><a class="link"href="<?=$base_url?>templates/allpages/country/edit_location.php?id=<?=$data->location_id?>">
                                 <button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> 
                                 <a class="link btn btn-outline-primary delete-clocation"href="#" data-did="<?=$data->location_id?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div><?php include "../pathforedit/footer.php"; ?>