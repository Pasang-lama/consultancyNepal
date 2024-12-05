<?php require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (isset($_POST['did'])) {
    $did = $_POST['did'];
    $table = $_POST['table'];
    $where = "id";
    $value = [$did];
    $info = $db->SelectByCriteria($table, 'image,slug', 'id', $value);
    $file = $info[0]->image;
    $slug = [$info[0]->slug];
    $imgpath = "../../../public/";
    if ($db->delete($table, $where, $value)) {
        unlink($imgpath . $file);
        $db->delete($slugs_table, 'slug', $slug);
        echo "1";
    }
}
