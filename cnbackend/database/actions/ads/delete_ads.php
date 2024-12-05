<?php require_once "../../database.php";require_once "../../tables.php";$db=Database::Instance();if(isset($_POST['did'])){$did=$_POST['did'];$where="id";
$value=[$did];$info=$db->SelectByCriteria("ads",'image','id',$value);
$file=$info[0]->image;
$imgpath="../../../public/uploads/ads/";
if($db->delete("ads",$where,$value)){unlink($imgpath.$file);echo "1";}}