<?php
 require_once "../../database/database.php";
 require_once "../../helper/tables.php";
 $db = Database::Instance();
 $district = $db->SelectByCriteria($Province_District_table, "*", "pid", [
     $_POST["pid"],
 ]);
 ?><option value="">--------------Select District-------------------------</option><?php foreach (
    $district
    as $data
) {
    $districts = $db->SelectByCriteria("district", "*", "id", [$data->did]);
    foreach (
        $districts
        as $drs
    ) { ?><option value="<?= $drs->id ?>"><?= $drs->district_name ?></option><?php }
} ?>