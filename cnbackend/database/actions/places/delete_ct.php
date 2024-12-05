<?php require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (isset($_POST["did"])) {
    $did = $_POST["did"];
    $where = "city_id";
    $value = [$did];
    if ($db->delete($city_table, $where, $value)) {
        echo "1";
    }
}
