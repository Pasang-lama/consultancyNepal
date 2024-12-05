<?php
include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance(); 

 ?>

<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <h3 class="page-title">Show Consultancy</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
                <a href="<?=$base_url?>"class="link">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"aria-current="page">
                    <a href="<?=$base_url?>addconsultancy"class="link">Add Consultancy</a></li></ol></nav></div><div class="card">
                   <?php $main_consultancy=$db->CustomQuery("SELECT * FROM `consultancies`");?>
                        <div class="card-body"><h4 class="card-title">Show Consultancy</h4>
                        <div class="row">
                            <div class="col-12"><div class="table-responsive"><table class="table" id="order-listing" >
                                <thead>
                                    <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Nick Name</th>
                                    <th>Phone</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php
                                        $keyid=1;
                                        foreach($main_consultancy as $key=>$data){ ?>
                                        <tr>
                                            <td><?=$keyid++;?></td>
                                            <td><?=$data->consultancy_name?></td>
                                            <td><?=$data->nickname?></td>
                                        <td><?=$data->consultancy_phone?></td>
                                        <td>
                                            <?php
                        if($data->Isfeatured=="featured"){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkfeatured"  data-did="<?=$data->id?>" data-table="consultancies" data-status="normal"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger  checkfeatured" data-did="<?=$data->id?>" data-table="consultancies" data-status="featured"></i>
                              
                            
                            <?php
                        }
                        ?>
                                        </td>
                                        <td> <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="consultancies" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger checkstatus"data-id="<?=$data->id?>"
                            data-tablename="consultancies" data-status="1"></i>
                            
                            <?php
                        }
                        ?></td>
                                        
                                        <td><a href="<?=$base_url?>templates/allpages/consultancy/editconsultancy.php?id=<?=$data->id?>"class="link"><button class="btn btn-outline-primary">
                                            <i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#"class="link btn btn-outline-primary delete-consulta" data-did="<?=$data->id?>"><i class="fa-solid fa-trash"></i></a> 
                                            <a href="<?=$base_url?>templates/allpages/consultancy/countrylist.php?id=<?=$data->id?>"class="link"><button class="btn btn-outline-primary">+country</button></a> <a href="<?=$base_url?>templates/allpages/consultancy/addtestprep.php?id=<?=$data->id?>"class="link">
                                                <button class="btn btn-outline-primary">+preparation</button></a>
                                 <a href="<?=$base_url?>templates/allpages/consultancy/adduniversity.php?id=<?=$data->id?>"><button class="btn btn-outline-primary">+University</button></a>
                                  
                                 </td></tr><?php } ?>
                                            </tbody>
                                            </table></div></div></div></div></div></div>
                                                <form action="" method="post" id="form">
    <input hidden type="text" name="item_id" id="item_id" class="form-control mt-3">
    <button id="savebtn" type="submit" class="btn btn-primary mt-3">update</buttton>
</form>
                                            <?php include "layouts/footer.php"; ?>
                                        