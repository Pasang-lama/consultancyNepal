<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
$admindata = $db->CustomQuery("SELECT * FROM `city` ORDER BY `city`.`city_id` DESC");
?>
<div class="main-panel">
<div class="content-wrapper">
<?php include "infos/message.php"; ?>
<div class="page-header">
<h3 class="page-title">Show Cities</h3>
<nav aria-label="breadcrumb">
<ol class="breadcrumb"><li class="breadcrumb-item">
<a href="<?= $base_url ?>dashboard"class="link">Dashboard</a>
</li>
<li class="breadcrumb-item active"aria-current="page">
<a href="<?= $base_url ?>addcity"class="link">Add city</a>
</li></ol></nav></div>
<div class="card"><div class="card-body">
<h4 class="card-title">Cities</h4><div class="row"><div class="col-12">
<div class="table-responsive">
<table class="table"id="order-listing"><thead><tr><th>SN</th><th>City Name</th><th>Action</th></tr></thead><tbody><?php foreach (
    $admindata
    as $data
): ?><tr><td><?= $data->city_id ?></td><td><?= $data->city ?></td><td><a href="<?= $base_url ?>templates/allpages/places/editct.php?id=<?= $data->city_id?>"class="link edit-admin"data-eid="<?= $data->city_id ?>"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#"class="link btn btn-outline-primary delete-city" data-did="<?=$data->city_id ?>"><i class="fa-solid fa-trash"></i></a> 
<a href="<?=$base_url ?>templates/allpages/places/city_area.php?id=<?= $data->city_id?>"class="link">
    <button class="btn btn-outline-primary">+link Area</button></a></td></tr><?php endforeach; ?></tbody></table></div></div></div></div></div></div><footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/"target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div></footer></div><?php include "layouts/footer.php"; ?>
