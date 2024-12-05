<?php
 include "../pathforedit/header.php";
 include "../pathforedit/aside.php";
 require_once "../../../database/database.php";
 require_once "../../../database/tables.php";
 $db = Database::Instance();
 $cid = $_GET["id"];
 
 $area_list=$db->CustomQuery("Select * from area");
 $selected=$db->CustomQuery("SELECT * FROM  city_area where city_id={$cid}");
 
if ($selected == null) {
    $cons[] = "";
} else {
    foreach ($selected as $sel) {
        $cons[] = $sel->area_id;
    }
}

 
 
 ?>
 <div class="main-panel"><div class="content-wrapper">
 <div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
     <a class="link"href="<?= $base_url ?>addarea">Add area</a></li>
     <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?= $base_url ?>showarea">Display area</a></li></ol></nav></div>
     <div class="row"><div class="col-lg-12"><div class="card"><div class="card-body"> 
 <form action="<?= $base_url ?>database/actions/places/link_area.php"method="post"><div class="row d-flex flex-row-reverse">
     <div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit"><input type="submit"value="+add Area"class="btn btn-primary mt-5 submitcheck"></div>
     
     <div class="table-responsive">
         <table border="1px solid black" width="100%">
                        <thead><tr><th style="font-size:25px; text-align:center;">Area list</th><th style="font-size:25px; text-align:center;">Checked</th></tr></thead>
                        <tbody>
  <?php
  
  foreach($area_list as $area){
  ?>
  <tr> 
  <td> <label class="container"><?=$area->area;?> &nbsp;&nbsp;</td>
  <td> <input type="checkbox" value="<?=$area->id;?>" name="area_list[]" 
     <?= in_array(
    $area->id,
    $cons
)
    ? "checked"
    : " " ?>><span class="checkmark"></span></label></td>
     
    </tr>
        <?php
  }
     ?>
     </tbody>
    </table>
    
     </div></div><input type="number"value="<?=$cid?>"name="city"hidden></form></div></div></div></div></div>
<?php include "../pathforedit/footer.php"; ?>
