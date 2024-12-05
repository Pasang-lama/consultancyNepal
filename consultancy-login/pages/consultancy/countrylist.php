  <?php 
$cid = $_GET["id"];
$consultancy_list = $db->CustomQuery("SELECT * FROM countries");
$selected = $db->CustomQuery(
    "SELECT * FROM consultancy_pages where consultancy_id={$cid}"
);

$consultancy_name=$db->CustomQuery("SELECT consultancies.consultancy_name FROM consultancy_pages INNER JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id WHERE consultancy_pages.consultancy_id='$cid'");

 

 
?><div class="main-panel">
      <div class="content-wrapper">
          <div class="page-header">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="link"
                              href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><a class="link"
                              href="<?=base_url("consultancy/showconsultancy")?>">Display Consultancy</a></li>
                  </ol>
              </nav>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">
                              <?php
 foreach ($consultancy_name as $data) {
     echo $data->consultancy_name;
     break;
       
    }
 ?>
                          </h4>
                          <form action="<?=base_url("action/consultancy/addcountry.php")?>" method="post"
                              enctype="multipart/form-data">
                              <div class="row d-flex flex-row-reverse">
                                  <div class="col-2 fixed-top"
                                      style="position:fixed;top:190px;right:0;z-index:1030;left:inherit"><input
                                          type="submit" value="+add country" class="btn btn-primary mt-5 submitcheck">
                                  </div>
                                  <div class="col-10"><?php
if ($selected == null) {
    $cons[] = "";
} else {
    foreach ($selected as $sel) {
        $cons[] = $sel->country_id;
    }
}?>
                                      <table border=2 width="70%">
                                          <?php
foreach (
    $consultancy_list
    as $list
) { ?>
                                          <tr>

                                              <td>

                                                  <input hidden name="country_id[]" type=" number"
                                                      value="<?=$list->id?>">
                                                  <input type="checkbox" value="<?= $list->id ?>"
                                                      name="consultancy_list[]" <?= in_array($list->id,$cons)
    ? "checked"
    : " " ?>>
                                              </td>
                                              <td>
                                                  <label class="container">
                                                      <?=$list->country_name?>
                                              </td>
                                              <td>
                                               
                                                  <?php
if(in_array($list->id,$cons)){
?>
                                                  <!-- <input name="sucessgalleryimage[]" multiple type="file"> -->
                                    <a class="btn btn-primary mx-2" href="<?=base_url("consultancy/sucessgallery.php?co_id=$list->id")?>&c_id=<?=$cid?>">addsucessgallery</a>
                                                  <?php
}
?>
                                              </td>
                                              <td>
                                               
                                                  <?php
if(in_array($list->id,$cons)){
?>
                                                  <!-- <input name="sucessgalleryimage[]" multiple type="file"> -->
                                    <a class="btn btn-primary mx-2" href="<?=base_url("consultancy/viewsucessgallery.php?id=$list->id")?>">Viewsucessgallery</a>
                                                  <?php
}
?>
                                              </td>
                                              
                                          </tr>
                                          <span class="checkmark"></span></label><?php } ?>
                                      </table>
                                  </div>
                              </div><input type="number" value="<?= $cid ?>" name="consultancy" hidden>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div> 
