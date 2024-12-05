<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
$banners = $db->CustomQuery(
    "SELECT *  FROM sides"
);
?><div class="main-panel"><div class="content-wrapper"><?php include "infos/message.php"; ?><div class="page-header"><h3 class="page-title">Show Ads</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= $base_url ?>dashboard"class="link">Dashboard</a></li><li class="breadcrumb-item active"aria-current="page"><a href="<?= $base_url ?>addads"class="link">Add Ads</a></li></ol></nav></div><div class="card"><div class="card-body"><h4 class="card-title">Show Ads</h4><div class="row"><div class="col-12"><div class="table-responsive"><table class="table"id="order-listing">
<thead><tr><th>SN</th>
<th>Name</th>

<th>Status</th>
<th>Actions</th></tr></thead><tbody id="sortable"><?php foreach (
    $banners
    as $key => $data
) { ?><tr data-id="<?=$data->id?>"><td><?= ++$key ?></td>

<td><?= $data->title ?></td>






<td> <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="sides" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                            <i class="fa-sharp fa-solid fa-circle text-danger checkstatus" data-id="<?=$data->id?>"
                            data-tablename="sides" data-status="1"></i>
                            
                            <?php
                        }
                        ?></td><td><a href="<?= $base_url ?>templates/allpages/sides/addsides.php?id=<?= $data->id ?>"class="link"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a> <a href="#"class="link btn btn-outline-primary delete-sides" data-did="<?= $data->id ?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php } ?></tbody></table></div></div></div></div></div></div>
                     
                            </div><?php include "layouts/footer.php"; ?>
                        
                        <!--<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>-->
                        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>-->
                        <script>
//     $( "#sortable" ).sortable({
  
//   update: function(evt, ui) {
//     // Get the new order of the rows
//     var newOrder = [];
//     var ids=[];
//     var table;
//     var i=1;
//     var tbody = $('#sortable');
    
//     // var table = $(this).data('table');
//     tbody.find('tr').each(function() {
//       newOrder.push(i);
//       ids.push($(this).data('id'));
//       //table = $(this).data('table');
//       i++;
//     });
//     console.log(ids)
//     console.log(newOrder)
//     var table="ads_order";
//     $.ajax({
//       url: 'AjaxRequest/ads_order.php',
//       method: 'POST',
//       data: { newOrder: newOrder,table:table,ids:ids},
      
//       success: function(response) {
//         console.log(response);
//       }
//     });
//   }
// });

</script>
