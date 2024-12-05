<?php require_once "../../database.php";require_once "../../tables.php";$db=Database::Instance();if(isset($_POST['did'])){$did=$_POST['did'];$where="id";
$value=[$did];
//$info=$db->SelectByCriteria("memb",'image','id',$value);
// $file=$info[0]->image;
// $imgpath="../../../public/uploads/ads/";
if($db->delete("cn_members_info",$where,$value)){;echo "1";}}