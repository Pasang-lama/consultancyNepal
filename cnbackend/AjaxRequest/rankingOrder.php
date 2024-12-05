<?php
    require_once "../database/database.php";
    $db = Database::Instance();
 
if(isset($_POST['rankId']) and isset($_POST['tablename']) and isset($_POST['rankcriteria']) and isset($_POST['idcriteria'])){
    $tablename=$_POST['tablename'];
    $rankcriteria=$_POST['rankcriteria'];
    $idcriteria=$_POST['idcriteria'];

    $i=1;
    foreach ($_POST['rankId'] as $value) {
        $db->CustomQuery("UPDATE `$tablename` SET `$rankcriteria`='$i' WHERE `$idcriteria`='$value'");
        $i++;
    }    
    }
else{
    echo "Not valid criteria plz set criteria look tbody tag";
}

 

 ?>