<?php
include "../database/database.php";
$db=Database::Instance();
// print_r($_POST);

$datas = $db->CustomQuery("select tables from page_types where id = $_POST[pagetype]");
$data=$datas[0]->tables;
// print_r($datas);

if($data == 0){
    // echo "table sis 0";
    echo 0;
    
}else{ 
    $datas = $db->CustomQuery("select table_name from tables where id=$data");
    $table = $datas[0]->table_name;
    if($table == "consultancies"){
         $datas = $db->CustomQuery("select id,consultancy_name as title from $table");
    }elseif($table=="countries"){
        $datas = $db->CustomQuery("select id,country_name  as title from $table");
    }else{
     $datas = $db->CustomQuery("select id,title from $table");
    }
     foreach($datas as $data){
     ?>
     
     <option value="<?=$data->id?>"><?=$data->title?></option>
     
     <?php
     
    }
}



?>