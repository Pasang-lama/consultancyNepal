<?php include "layouts/header.php";include "layouts/aside.php";require_once "database/database.php";require_once "database/tables.php";$db=Database::Instance(); ?><?php $abouts=$db->CustomQuery("SELECT * FROM `{$about_table}` ORDER BY `{$about_table}`.`id` DESC"); ?><?php $aboutdata=$db->SelectAll("abouts"); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("infos/message.php") ?><div class="page-header"><h3 class="page-title">Show  Aboutus</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?=$base_url?>dashboard"class="link">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a href="<?=$base_url?>addaboutus"class="link">Add aboutus</a></li></ol></nav></div><div class="card"><div class="card-body"><h4 class="card-title">Show About</h4><div class="row"><div class="col-12"><div class="table-responsive"><table class="table"id="order-listing"><thead><tr><th>SN</th><th>Title</th><th>Status</th> <th>Actions</th></tr></thead><tbody><tr>
    <?php foreach($abouts as $key=>$data){ ?><td><?=++$key?></td><td><?=$data->title?></td>
     <td> <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="abouts" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger checkstatus"data-id="<?=$data->id?>"
                            data-tablename="abouts" data-status="1"></i>
                            
                            <?php
                        }
                        ?></td>
     <td><a href="<?=$base_url?>templates/allpages/aboutus/editaboutus.php?id=<?=$data->id?>"class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#"class="link btn btn-outline-primary delete_about"data-did="<?=$data->id?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div><footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/"target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div></footer></div><?php include "layouts/footer.php"; ?>