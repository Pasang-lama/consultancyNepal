  <?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 
//  $cities = $db->SelectByCriteria("City", "*", "id", [$_POST["did"]]);
 ?><option value="">--------------Select Area-------------------------</option> 
 <?php
 $id=$_POST['id'];
    $area =$db->CustomQuery("SELECT * FROM city_area JOIN area ON area.id=city_area.area_id WHERE city_id='$id'");
    foreach (
        $area
        as $data
    ) { ?><option value="<?= $data->id ?>"><?= $data->area?></option>
    <?php }
?>