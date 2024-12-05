<?php
include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance(); ?>
<?php $universitydata=$db->CustomQuery("SELECT * FROM `university_location`"); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("infos/message.php") ?>
<div class="page-header"><h3 class="page-title">Show Admin</h3><nav aria-label="breadcrumb">
    <ol class="breadcrumb"></ol></nav></div><div class="card">
        <div class="card-body"><h4 class="card-title">Data table</h4><div class="row">
            <div class="col-12"><div class="table-responsive"><table class="table"id="order-listing">
                <thead><tr><th>SN</th><th>LocationName</th> <th>Actions</th></tr></thead><tbody>
                    <?php foreach($universitydata as $key=>$data): ?><tr><td><?=++$key?></td>
                    <td><?=$data->location_name;?></td>
                    
                        <td><a href="<?=$base_url?>templates/allpages/universities/edit_university_location.php?id=<?=$data->location_id?>" class="link edit-admin"data-eid="<?=$data->id?>">
                            <button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> 
                            <a href="#"class="link btn btn-outline-primary delete-admin" data-did="<?=$data->u_id?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php endforeach; ?></tbody></table></div></div></div></div></div></div><footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/"target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div></footer></div><?php include "layouts/footer.php"; ?>