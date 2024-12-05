<?php 
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?>
<?php $id=$_GET["id"];
$university=$db->CustomQuery("SELECT * FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$id'");
// print_r($university);
// die();
?>
<div class="main-panel"><div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Show  university</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
            <a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"aria-current="page">
                <a class="link"href="<?=$base_url?>showcountry">Show Country</a></li></ol></nav></div>
                <div class="card"><div class="card-body"><h4 class="card-title">Show University</h4><div class="row"><div class="col-12"><div class="table-responsive">
                    <table class="table"id="order-listing">
                        <thead><tr><th>SN</th><th>Name</th><th>Actions</th></tr></thead>
                        <tbody><?php foreach($university as $key=>$data){ ?><tr>
                            <td><?=++$key?>
                            </td><td><?=$data->university_name?></td>
                            
                            <td><a class="link btn btn-outline-primary delete-university"href="#"data-did="<?=$data->u_id?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div><?php include "../pathforedit/footer.php"; ?>