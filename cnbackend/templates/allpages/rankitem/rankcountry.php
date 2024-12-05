<?php
include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['item_id'])){
    $ids = $_POST['item_id'];
    $ids = explode(",", $ids);
    $i = 1;
    foreach($ids as $id){
        
        if($db->CustomQuery("UPDATE `rank_country` SET `rank` = '$i' WHERE `country_id` = '$id'")){
            echo "sucess";
        }
        
        $i++;
    }
}

}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php include("infos/message.php") ?>
        <div class="page-header">
            <h3 class="page-title">Rank Consultancy</h3><nav aria-label="breadcrumb"><ol class="breadcrumb"> 
                <li class="breadcrumb-item active"aria-current="page">
                    <form action="" method="post" id="form">
    <input hidden type="text" name="item_id" id="item_id" class="form-control mt-3">
    <button id="savebtn" type="submit" class="btn btn-primary"  >update</buttton>
</form>
                    </li></ol></nav></div><div class="card">
                         
                   <?php $country_data=$db->CustomQuery("SELECT * FROM rank_country JOIN countries ON rank_country.country_id=countries.id ORDER BY `rank_country`.`rank` ASC"); ?>
                        <div class="card-body"><h4 class="card-title">Country Ranks</h4>
                        <div class="row">
                            <div class="col-12"><div class="table-responsive"><table class="table" id="order-listing" >
                                <thead>
                                    <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                     </tr></thead>
                                    <tbody id="sortable" >
                                        <?php foreach($country_data as $key=>$data){ ?>
                                        
                                       
                                        
                                        
                                       
                                        <tr data-id="<?=$data->id;?>">
                                            <td><?=$data->rank;?></td><td><?=$data->country_name?></td>
                                          <td> <?php
                        if($data->status==1){
                            ?>
                            <button class="btn btn-success">Active</button>
                            <?php
                        }
                        else{
                            ?>
                             <button class="btn btn-danger">In Active</button>
                            
                            <?php
                        }
                        ?></td>
                                        
                                        
                                        </tr><?php } ?>
                                            </tbody>
                                            </table></div></div></div></div></div></div>
                                            
                                            
 
 
  
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
 
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/formpickers.js"></script>
  <script src="assets/js/form-addons.js"></script>
  <script src="assets/js/x-editable.js"></script>
  <script src="assets/js/dropify.js"></script>
  <script src="assets/js/dropzone.js"></script>
  <script src="assets/js/jquery-file-upload.js"></script>
  <script src="assets/js/formpickers.js"></script>
  <script src="assets/js/form-repeater.js"></script>
                                           
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
   
  <!-- End custom js for this page-->
   <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
</body>


</html>
                                        