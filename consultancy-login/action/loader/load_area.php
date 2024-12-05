  <?php
  require_once "../../database/database.php";
 require_once "../../helper/tables.php";
 $db = Database::Instance();
 
//  $cities = $db->SelectByCriteria("City", "*", "id", [$_POST["did"]]);
 ?><option value="">--------------Select City-------------------------</option> 
 <?php
 $id=$_POST["id"];
     $area = $db->CustomQuery("SELECT * FROM city_area JOIN area ON city_area.area_id=area.id WHERE city_id='$id'");
    foreach (
        $area
        as $data
    ) { ?><option value="<?=$data->area_id?>"><?=$data->area?></option>
    <?php }
?>