 <?php
 require_once "database/database.php";
 $db = Database::Instance();
 $events = $db->CustomQuery(
      " SELECT * FROM `consultancy_events` JOIN events ON consultancy_events.events_id=events.id WHERE consultancy_events.consultancy_id='1' ORDER BY ce_id DESC;"
 );
 ?><div class="main-panel">
     <div class="content-wrapper">
         <?php include "infos/message.php"; ?>
         <div class="page-header"><h3 class="page-title">Show Events</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
             <a href="<?=base_url("dashboard/dashboard")?>"class="link">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a href="<?=base_url("events/addevents")?>"class="link">Add Events</a></li></ol></nav></div><div class="card"><div class="card-body"><h4 class="card-title">show Events</h4><div class="row"><div class="col-12"><div class="table-responsive"><table class="table"id="order-listing"><thead><tr><th>SN</th><th>Title</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead><tbody>
 <?php foreach (
     $events
     as $key => $data
 ) { ?><tr><td><?= ++$key ?></td><td><?= $data->title ?></td><td><?= $data->date ?></td><td><?= $data->status ?></td>
  <td><a href="<?=base_url("events/editevents.php?id=")?><?=$data->id?>"class="link">
    <button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> 
    <a href="#"class="link btn btn-outline-primary delete-events"data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody>
    </table></div></div></div></div></div></div><footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/"target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div></footer></div>
