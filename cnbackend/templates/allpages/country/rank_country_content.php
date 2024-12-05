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
        
        
        if($db->CustomQuery("UPDATE `country_contents` SET `rank` = '$i' WHERE `id` = '$id'")){
            echo "sucess";
        }
        
        $i++;
    }
}

}


?>
<?php
$id=$_GET["id"];
$countrycontent=$db->CustomQuery("SELECT * FROM country_contents where country_id='$id' ORDER BY country_contents.rank ASC;"); ?>
<div class="main-panel"><div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Rank Country Content</h3>
        <div>
            <form action="" method="post" id="form">
    <input hidden  type="text" name="item_id" id="item_id" class="form-control mt-3">
    <button id="savebtn" type="submit" class="btn btn-primary"  >update</buttton>
</form>
        </div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">
            <a class="link"href="<?=$base_url?>dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"aria-current="page">
                <a class="link"href="<?=$base_url?>showcountry">Show Country</a></li></ol></nav></div>
                <div class="card"><div class="card-body"><h4 class="card-title">show content</h4><div class="row"><div class="col-12"><div class="table-responsive">
                    <table class="table" >
                        <thead><tr><th>SN</th><th>Title</th><th>Date</th><th>Status</th></tr></thead>
                        <tbody id="sortable">
                            
                        <?php 
                        foreach($countrycontent as $key=>$data){ ?>
                    
                        <tr data-id="<?=$data->id?>">
                            <td><?=++$key?></td><td><?=$data->title?></td><td><?=$data->date?></td>
                        <td>
                            <?php
                        if($data->status==1){
                            ?>
                            <i class="fa-sharp fa-solid fa-circle checkstatus" data-id="<?=$data->id?>"
                            data-tablename="country_contents" data-status="0"
                            style="color: #1ec821;"></i>
                            <?php
                        }
                        else{
                            ?>
                             <i class="fa-sharp fa-solid fa-circle text-danger checkstatus"data-id="<?=$data->id?>"
                            data-tablename="country_contents" data-status="1"></i>
                            
                            <?php
                        }
                        ?>
                      
                            </td>
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