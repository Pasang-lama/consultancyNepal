<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
$banners = $db->CustomQuery(
    "SELECT * FROM cn_members_info");
?><div class="main-panel"><div class="content-wrapper"><?php include "infos/message.php"; ?><div class="page-header"><h3 class="page-title">Show Members</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= $base_url ?>dashboard"class="link">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a href="<?= $base_url ?>addmembers"class="link">Add Members</a></li></ol></nav></div><div class="card"><div class="card-body"><h4 class="card-title">Show Members</h4><div class="row"><div class="col-12"><div class="table-responsive"><table class="table"id="order-listing">
<thead><tr><th>SN</th>
<th>Name</th>
<th>Consultancy</th>
<th>Post Date</th>

<th>Duration</th>
<th>Status</th>
<th>Actions</th></tr></thead><tbody id="sortable"><?php foreach (
    $banners
    as $key => $data
) { ?><tr data-id="<?=$data->aid?>"><td><?= ++$key ?></td>

<td><?= $data->username ?></td>
<td><?php
$cons= $db->CustomQuery("select  consultancy_name as nams from consultancies where id=$data->cid");
echo $cons[0]->nams;
?></td>

<td>
   <?= $data->duration ?> 
</td>



<td> <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="cn_members_info" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                            <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?=$data->id?>"
                            data-tablename="cn_members_info" data-status="1"></i>
                            
                            <?php
                        }
                        ?></td><td><a href="<?= $base_url ?>templates/allpages/members/addmembers.php?id=<?= $data->id ?>"class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#"class="link btn btn-outline-primary delete-memb" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div>
                     
                            </div><?php include "layouts/footer.php"; ?>
                        

