 <?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 $cities = $db->SelectByCriteria("City_District", "*", "did", [$_POST["did"]]);
 ?><option value="">--------------Select City-------------------------</option><?php foreach (
    $cities
    as $data
) {
    $city = $db->SelectByCriteria("city", "*", "city_id", [$data->cid]);
    foreach (
        $city
        as $drs
    ) { ?><option value="<?= $drs->city_id ?>"><?= $drs->city ?></option><?php }
} ?>
