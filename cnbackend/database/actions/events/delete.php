<?php require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (isset($_POST["did"])) {
    $did = $_POST["did"];
    $where = "id";
    $value = [$did];
    $info = $db->SelectByCriteria($event_table, "image,slug", "id", $value);
    $file = $info[0]->image;
    $slug = [$info[0]->slug];
    $imgpath = "../../../public/";
    if ($db->delete($event_table, $where, $value)) {
        $db->delete("consultancy_events","events_id",$value);
        unlink($imgpath . $file);
        $db->delete($slugs_table, "slug", $slug);
        echo "1";
    }
}
