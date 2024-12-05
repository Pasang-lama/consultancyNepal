<?php 
 $consultancy_id=$_SESSION["consultancy_id"];
 $consultancy_data=$db->CustomQuery("SELECT * FROM `class_table` WHERE cid='$consultancy_id'"); ?>
<div class="main-panel">
    <div class="content-wrapper"><?php include("infos/message.php") ?><div class="page-header">
            <h3 class="page-title">Show Classes</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url("dashboard/dashboard")?>" class="link">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url("consultancy/addclasses")?>"
                            class="link">Add class</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Show Classes</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Class of</th>
                                        <th>Conducting Consultancy</th>
                                        <th>Starting date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach($consultancy_data as $key=>$data){ ?><tr>
                                        <td><?=++$key;?></td>
                                        <td><?php $class_of=$db->CustomQuery("SELECT * FROM test_preparation WHERE id=$data->tid");echo $class_of[0]->title; ?>
                                        </td>
                                        <td><?php $class_of=$db->CustomQuery("SELECT * FROM consultancies WHERE id=$data->cid");echo $class_of[0]->consultancy_name; ?>
                                        </td>
                                        <td><?=$data->date?></td>
                                        <td><a href="<?=base_url("consultancy/editclasses.php?id=$data->id")?>"
                                                class="link"><button class="btn btn-outline-primary"><i
                                                        class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a
                                                href="#" class="link btn btn-outline-primary delete-class"
                                                data-did="<?=$data->id?>"><i class="fa-solid fa-trash"></i></a></td>
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