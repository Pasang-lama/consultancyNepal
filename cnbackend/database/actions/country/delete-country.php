<?php require_once "../../database.php";
require_once "../../tables.php";
$db=Database::Instance();
if(isset($_POST['did']))
{
    $did=$_POST['did'];
    $where="id";
    $value=[$did];
    $info=$db->SelectByCriteria($country_table,'image,thumb_image,country_slug','id',$value);
    $file=$info[0]->image;
    $file1=$info[0]->thumb_image;
    $slug=[$info[0]->country_slug];
    $imgpath="../../../public/";
    if($db->delete($country_table,$where,$value)){
        unlink($imgpath.$file);
        unlink($imgpath.$file1);
        $db->delete($slugs_table,'slug',$slug);
        echo "1";}}