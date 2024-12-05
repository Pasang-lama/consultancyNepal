 <?php
 include "../pathforedit/header.php";
 include "../pathforedit/aside.php";
 require_once "../../../database/database.php";
 require_once "../../../database/tables.php";
 $db = Database::Instance();
 $cid = $_GET["id"];
 $consultancy_list = $db->CustomQuery("SELECT * FROM {$city_table}");
 $selected = $db->CustomQuery(
     "SELECT * FROM {$ct_district_table} where did={$cid}"
 );
 ?><div class="main-panel"><div class="content-wrapper"><?php include "infos/message.php"; ?><div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a class="link"href="<?= $base_url ?>addcity">Add city</a></li><li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?= $base_url ?>showcity">Display Cities</a></li></ol></nav></div><div class="row"><div class="col-lg-12"><div class="card"><div class="card-body"> <form action="<?= $base_url ?>database/actions/places/dsct.php"method="post"><div class="row d-flex flex-row-reverse"><div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit"><input type="submit"value="+add cities"class="btn btn-primary mt-5 submitcheck"></div><div class="table-responsive">
  
                    <table border="1px solid black" width="100%">
                        <thead><tr><th style="font-size:25px; text-align:center;">City List</th><th style="font-size:25px; text-align:center;">Checked</th></tr></thead>
                        <tbody>
                            <?php
if ($selected == null) {
    $cons[] = "";
} else {
    foreach ($selected as $sel) {
        $cons[] = $sel->cid;
    }
}
foreach (
    $consultancy_list
    as $list
) { ?>
                            <tr>
                            <td> <label class="container"><?= $list->city?></td>
                            <td><input type="checkbox"value="<?= $list->city_id ?>"name="consultancy_list[]"<?= in_array(
    $list->city_id,
    $cons
)
    ? "checked"
    : " " ?>> <span class="checkmark"></span></label></td>
                            </tr>
                                                    
  <?php }
?>
                        </tbody>
                        </table>
                       
 </div></div><input type="number"value="<?= $cid?>"name="district"hidden></form></div></div></div></div></div><?php include "../pathforedit/footer.php"; ?>
