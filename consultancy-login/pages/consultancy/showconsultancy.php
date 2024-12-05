<?php 
$consultancy_id=$_SESSION["consultancy_id"];
$consultancy_data=$db->CustomQuery("SELECT * FROM `consultancies` WHERE id='$consultancy_id'");

 

 ?>
<div class="main-panel">
    <div class="content-wrapper"><?php include("infos/message.php")?><div class="page-header">
            <h3 class="page-title">Show Consultancy</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url("dashboard/dashboard")?>" class="link">Dashboard</a></li>
                     
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Show Consultancy</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>nickname</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach($consultancy_data as $key=>$data){?><tr>
                                        <td><?=++$key?></td>
                                        <td><?=$data->consultancy_name?></td>
                                        <td><?php if($data->nickname){ ?><?=$data->nickname?><?php }else{echo "Not Entry";} ?>
                                        </td>
                                        <td><?=$data->consultancy_phone?></td>
                                        <td>
                                            <?php
                                            if($data->consultancy_logo){
                                            ?>
                                            <img alt="ImageCan't Load"
                                                src="https://www.consultancynepal.com/cnbackend/public/<?=$data->consultancy_logo?>"
                                                width="100%"> 
                                            <?php
                                            }
                                            else{
                                                ?>
                                                 <img alt="ImageCan't Load"
                                                src="https://www.consultancynepal.com/cnbackend/public/ uploads/noimage/noimage.jpg"
                                                width="100%">
                                                <?php
                                            }
                                            ?>
                                            </td>
                                        <td><a href="<?=base_url("consultancy/editconsultancy?id=$data->id")?>"
                                                class="link"><button class="btn btn-outline-primary"><i
                                                        class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a
                                                href="<?=base_url("consultancy/countrylist.php?id=$data->id")?>"
                                                class="link"><button
                                                    class="btn btn-outline-primary">+country</button></a> <a
                                                href="<?=base_url("consultancy/addtestprep.php?id=$data->id")?>"
                                                class="link"><button
                                                    class="btn btn-outline-primary">+testpreparation</button></a></td>
                                    </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between"><span
                class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a
                    href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span> <span
                class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i
                    class="fa-heart far text-danger"></i></span></div>
    </footer>
</div> 
