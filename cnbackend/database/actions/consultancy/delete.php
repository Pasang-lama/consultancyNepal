<?php require_once "../../database.php";
// require_once "../../tables.php";
$db=Database::Instance();
if(isset($_POST['did']))
{
    $did=$_POST['did'];
    $where="id";
    $value=[$did];
    $info=$db->SelectByCriteria("consultancies",'consultancy_logo,consultancy_slug','id',$value);
    $file=$info[0]->consultancy_logo;
    $slug=[$info[0]->consultancy_slug];
    $imgpath="../../../public/";
    if($db->delete("consultancies",'id',$value)){
        unlink($imgpath.$file);
        $db->delete($slugs_table,'slug',$slug);
        }
    
}