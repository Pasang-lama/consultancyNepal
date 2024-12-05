<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance(); ?>



<?php ?>







<div class="main-panel">
    <div class="content-wrapper"><?php include "infos/message.php"; ?><div class="page-header">

            <h3 class="page-title">Show Pages</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $base_url ?>dashboard" class="link">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="<?= $base_url ?>addpages" class="link">Add Pages</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                
                
                <?php
                $page_t = $db->CustomQuery("select * from page_types");
               $i=0;
                
                ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php foreach($page_t  as $page){ if($i==0){ ?> 
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-<?=$page->id?>" data-toggle="tab" href="#home-<?=$page->id?>" role="tab" aria-controls="home" aria-selected="true"><?=$page->title?></a>
  </li>
  <?php }else{ ?> 
  
  <li class="nav-item">
    <a class="nav-link" id="home-tab-<?=$page->id?>" data-toggle="tab" href="#home-<?=$page->id?>" role="tab" aria-controls="profile" aria-selected="false"><?=$page->title?></a>
  </li>
  <?php } $i++;  } ?> 

</ul>
<div class="tab-content" id="myTabContent">
     <?php $i=0; foreach($page_t  as $page){ if($i==0){ ?> 
  <div class="tab-pane fade show active" id="home-<?=$page->id?>" role="tabpanel" aria-labelledby="home-tab-<?=$page->id?>">
      <?=$page->title?>
      
      
      <?php if($page->is_specific!=1){ 
       $pages = $db->CustomQuery("SELECT * FROM `{$pages_table}` where page_type_id=$page->id ORDER BY `{$pages_table}`.`id` DESC");
      ?>
       <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Contant type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($pages as $key => $data) { ?><tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $data->title ?></td>
                                            <td> <?php
                                                    if ($data->status == 1) {
                                                    ?>
                                                    <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="0" style="color: #1ec821;"></i>
                                                <?php
                                                    } else {
                                                ?>
                                                    <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="1"></i>

                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php $name = $db->SelectByCriteria($page_type_table, 'title', 'id', [$data->page_type_id]);
                                                echo $name[0]->title; ?></td>

                                            <td><a href="<?= $base_url ?>templates/allpages/pages/editpage.php?table=pages&id=<?= $data->id ?>" class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#" class="link btn btn-outline-primary delete-page" data-table="pages" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
      
      
      <?php
      
      }else{  $pages = $db->CustomQuery("SELECT * FROM `{$page->slug}` where page_type_id=$page->id ORDER BY `{$page->slug}`.`id` DESC");
      ?>
       <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Contant type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($pages as $key => $data) { ?><tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $data->title ?></td>
                                            <td> <?php
                                                    if ($data->status == 1) {
                                                    ?>
                                                    <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="0" style="color: #1ec821;"></i>
                                                <?php
                                                    } else {
                                                ?>
                                                    <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="1"></i>

                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php $name = $db->SelectByCriteria($page_type_table, 'title', 'id', [$data->page_type_id]);
                                                echo $name[0]->title; ?></td>

                                            <td><a href="<?= $base_url ?>templates/allpages/pages/editpage.php?table=<?=$page->slug?>&id=<?= $data->id ?>" class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#" class="link btn btn-outline-primary delete-page" data-table="<?=$page->slug?>" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
          
          <?php
      
      
      
      }?>
      </div>
   <?php }else{ ?> 
  <div class="tab-pane fade" id="home-<?=$page->id?>" role="tabpanel" aria-labelledby="home-tab-<?=$page->id?>">
      
      
      <?=$page->title?>
            <?php if($page->is_specific!=1){
              $pages = $db->CustomQuery("SELECT * FROM `{$pages_table}` where page_type_id=$page->id ORDER BY `{$pages_table}`.`id` DESC");
            ?>
       <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Contant type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($pages as $key => $data) { ?><tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $data->title ?></td>
                                            <td> <?php
                                                    if ($data->status == 1) {
                                                    ?>
                                                    <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="0" style="color: #1ec821;"></i>
                                                <?php
                                                    } else {
                                                ?>
                                                    <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="1"></i>

                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php $name = $db->SelectByCriteria($page_type_table, 'title', 'id', [$data->page_type_id]);
                                                echo $name[0]->title; ?></td>

                                            <td><a href="<?= $base_url ?>templates/allpages/pages/editpage.php?table=pages&id=<?= $data->id ?>" class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#" class="link btn btn-outline-primary delete-page" data-table="pages" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
      
      
      <?php
      
      }else{  
          
          $pages = $db->CustomQuery("SELECT * FROM `{$page->slug}` where page_type_id=$page->id ORDER BY `{$page->slug}`.`id` DESC");
      ?>
       <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Contant type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($pages as $key => $data) { ?><tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $data->title ?></td>
                                            <td> <?php
                                                    if ($data->status == 1) {
                                                    ?>
                                                    <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="0" style="color: #1ec821;"></i>
                                                <?php
                                                    } else {
                                                ?>
                                                    <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?= $data->id ?>" data-tablename="pages" data-status="1"></i>

                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php $name = $db->SelectByCriteria($page_type_table, 'title', 'id', [$data->page_type_id]);
                                                echo $name[0]->title; ?></td>

                                            <td><a href="<?= $base_url ?>templates/allpages/pages/editpage.php?table=<?=$page->slug?>&id=<?= $data->id ?>" class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#" class="link btn btn-outline-primary delete-page" data-table="<?=$page->slug?>" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
          
          <?php
      
      
      
      }?>
      
      
      
      </div>
   <?php } $i++;  } ?> 
  <!--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div>-->
</div>
                
                <!--<h4 class="card-title">show Pages</h4>-->
                
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div>
    </footer>
</div><?php include "layouts/footer.php"; ?>