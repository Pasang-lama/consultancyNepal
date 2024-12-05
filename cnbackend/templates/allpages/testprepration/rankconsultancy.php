<?php
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['item_id'])){
    $ids = $_POST['item_id'];
    $ids = explode(",", $ids);
    $i = 1;
    foreach($ids as $id){
        
        
        if($db->CustomQuery("UPDATE `consultancy_test_prep` SET `rank` = '$i' WHERE `id` = '$id'")){
            echo "sucess";
        }
        
        $i++;
    }
}

}


?>
<?php

$test_preparation_id=$_GET["test_preparation_id"];
$CountryConsultancyList=$db->CustomQuery("SELECT consultancies.consultancy_name,consultancy_test_prep.id,consultancy_test_prep.tpid,consultancy_test_prep.rank FROM `consultancy_test_prep` JOIN consultancies ON consultancies.id=consultancy_test_prep.cid WHERE consultancy_test_prep.tpid='$test_preparation_id' ORDER BY consultancy_test_prep.rank ASC;"); ?>
<div class="main-panel"><div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Rank test preparation Consultancy</h3>
        <div>
            <form action="" method="post" id="form">
    <input hidden  type="text" name="item_id" id="item_id" class="form-control mt-3">
    <button id="savebtn" type="submit" class="btn btn-primary">update</buttton>
</form>
        </div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
            <a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"aria-current="page">
                 </li></ol></nav></div>
                <div class="card"><div class="card-body"><h4 class="card-title">List of Consultancy</h4><div class="row"><div class="col-12"><div class="table-responsive">
                    <table class="table" >
                        <thead><tr><th>SN</th><th>Title</th></tr></thead>
                        <tbody id="sortable">
                            
                        <?php 
                        foreach($CountryConsultancyList as $key=>$data){ ?>
                    
                        <tr data-id="<?=$data->id?>">
                            
                            <td><?=++$key?></td>
                            <td><?=$data->consultancy_name?></td>
                           
                         </tr><?php } ?></tbody></table></div></div></div></div></div></div>
                         
                         <?php include "../pathforedit/footer.php"; ?>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
  } );

  $("#savebtn").click(function(){
      var array = [];
      $.each($("#sortable").find('tr'),function(){
          array.push($(this).data("id"));
      });
        $("#item_id").val(array.toString());
        $("#form").submit();
  });
  </script>  