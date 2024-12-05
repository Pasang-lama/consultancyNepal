<?php 
 $consultancy_id=$_SESSION["consultancy_id"];
 $maildata=$db->CustomQuery("SELECT * FROM `consultancy_enquery` WHERE consultancy_id='$consultancy_id' ORDER BY `consultancy_enquery`.`mid` DESC");?>
 <div class="main-panel"><div class="content-wrapper">
     <?php include("infos/message.php")?>
<!--     if(isset( $_SESSION["sucess"])){-->
<!--    echo  $_SESSION["sucess"];-->
<!--}-->
     <div class="page-header"><h3 class="page-title">Show Mail</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a class="link"href="#"></a></a></li></ol></nav></div><div class="card"><div class="card-body"><h4 class="card-title">show mail</h4><div class="row"><div class="col-12">
         <div class="table-responsive">
             <table class="table"id="order-listing">
                 <thead>
                     <tr>
                         <th>SN</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Subject</th>
                         <th>Message</th>
                         <th>Actions</th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach($maildata as $key=>$data): ?>
                <tr><td><?=++$key?></td>
                <td><?=$data->name?></td>
                <td><?=$data->email?></td>
                <td><?=$data->subject?></td>
                <td><?=$data->message?></td>
                <td><a class="link btn btn-outline-primary" href="<?=base_url("mail/viewmail?id=$data->mid")?>"><i class="fa-regular fa-eye"></i></a> 
                <a class="link btn btn-outline-primary" href="<?=base_url("mail/replaymail?id=$data->mid")?>"><i class="fa-sharp fa-solid fa-reply"></i></a>
                <a href="#" class="link btn btn-outline-primary delete-mail" data-did="<?=$data->mid?>"><i class="fa-solid fa-trash"></i></a>
                </td></tr><?php endforeach; ?>
                 </tbody>
                 </table>
                 </div></div></div></div></div></div> 