<?php include "layouts/header.php";include "layouts/aside.php";require_once "database/database.php";require_once "database/tables.php";$db=Database::Instance(); ?>
<?php $country_data=$db->CustomQuery("SELECT * FROM countries"); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("infos/message.php") ?><div class="page-header"><h3 class="page-title">Show Country</h3>
<nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>addcountry">Add Country</a></li></ol></nav></div>
<div class="card"><div class="card-body"><h4 class="card-title">Show Country</h4><div class="row"><div class="col-12">
    <div class="table-responsive">
        <table class="table"id="order-listing">
            <thead><tr><th>SN</th>
            <th>Country</th>
            <th>Status</th>
            <th>Featured</th>
            <th>Actions</th></tr></thead><tbody>
                <?php foreach($country_data as $key=>$data){ ?>
                <tr><td><?=++$key?></td><td><?=$data->country_name?><hr>
                <a href="<?=$base_url?>templates/allpages/country/viewuniversity.php?id=<?=$data->id?>" style="color:#00f;font-size:12px;"><?php $counts1=$db->CustomQuery("SELECT COUNT(*) as pre FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$data->id'");?>University:<?=$counts1[0]->pre?></a>&nbsp;&nbsp;
                <a class="link"href="<?=$base_url?>templates/allpages/country/country-content-list.php?id=<?=$data->id?>"style="color:#00f;font-size:12px;"<?php $counts=$db->CustomQuery("SELECT COUNT(*) as pre FROM country_contents WHERE country_id=$data->id"); ?>>Contents:<?=$counts[0]->pre?></a>
                
                </td>
                <td>
                      <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="countries" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger checkstatus"data-id="<?=$data->id?>"
                            data-tablename="countries" data-status="1"></i>
                            
                            <?php
                        }
                        ?>
                </td>
                <td>
                     <?php
                        if($data->featured==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkfeaturedall"  data-id="<?=$data->id?>"
                            data-tablename="countries" data-criteria="id" data-featured="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger  checkfeaturedall" data-id="<?=$data->id?>"
                            data-tablename="countries" data-criteria="id" data-featured="1"></i>
                            
                            <?php
                        }
                        ?>
                    
                </td>
                 
                <td><a class="link"href="<?=$base_url?>templates/allpages/country/editcountry.php?id=<?=$data->id?>">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a>
                <a class="link btn btn-outline-primary delete-country"href="#"data-did="<?=$data->id?>">
                    <i class="fa-solid fa-trash"></i></a> <a class="link"href="<?=$base_url?>templates/allpages/country/consultancylist.php?id=<?=$data->id?>">
                        <button class="btn btn-outline-primary">+Consultancy</button></a> 
                        <a class="link"href="<?=$base_url?>templates/allpages/country/add_content.php?id=<?=$data->id?>">
                        <button class="btn btn-outline-primary">+Contents</button></a>
                           <a class="link"href="<?=$base_url?>templates/allpages/country/add_location.php?cid=<?=$data->id?>">
                        <button class="btn btn-outline-primary">location</button></a>
                        
                        </td></tr><?php } ?></tbody></table></div></div></div></div></div></div></div><?php include "layouts/footer.php"; ?>