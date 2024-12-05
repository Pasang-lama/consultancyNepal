<?php require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (isset($_POST["did"])) {
    $did = $_POST["did"];
    $where = "u_id";
    $value = [$did];
    $info = $db->SelectByCriteria(
        'university',
        "image,slug",
        "u_id",
        $value
    );
    $file = $info[0]->image;
    $slug = [$info[0]->slug];
    $imgpath = "../../../public/";
    if ($db->delete('university', $where, $value)) {
        unlink($imgpath.$file);
        $db->delete($slugs_table, "slug", $slug);
        echo "1";
    }
}
