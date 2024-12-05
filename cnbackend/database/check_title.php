 <?php require_once "database.php";
       require_once "tables.php";
         $db = Database::Instance();
         $table=$_POST["table"];
         $key = $_POST["key"];
         
if($table=="consultancies"){
  
    $datas = $db->CustomQuery("select consultancy_name from $table  where consultancy_name like '%$key%'");
    ?>
    <span>Consultancy with the similar names</span>
    <hr>
        <ul> 
    <?php
    if(empty($datas)){
        ?>
         <li>No Results Found</li>
        <?php
    }else{
    foreach($datas as $data){
        ?>
            <li> <?=$data->consultancy_name?></li>
            <hr>
            
        <?php
    }
    }
    ?>
        </ul>
    <?php
}
else if($table=="countries"){
   $datas = $db->CustomQuery("select country_name as title from $table where country_name like '%$key%'");
    ?>
    <span>COuntries with the similar names</span>
    <hr>
        <ul> 
    <?php
       if(empty($datas)){
        ?>
         <li>No Results Found</li>
        <?php
    }else{
    foreach($datas as $data){ 
        ?>
            <li> <?=$data->title?></li>
            <hr>
            
        <?php
    }}
    ?>
        </ul>
    <?php
}
else if($table=="course"){
    $datas = $db->CustomQuery("select name from $table where name like '%$key%'");
    ?>
    <span>Course with the similar names</span>
    <hr>
        <ul> 
    <?php
        if(empty($datas)){
        ?>
         <li>No Results Found</li>
        <?php
    }else{
    foreach($datas as $data){
        ?>
            <li> <?=$data->name?></li>
            <hr>
            
        <?php
    }}
    ?>
        </ul>
    <?php
}
else if($table=="test_preparation"){
     $datas = $db->CustomQuery("select title from $table where title like '%$key%'");
    ?>
    <span>Test Preparation with the similar names</span>
    <hr>
        <ul> 
    <?php
        if(empty($datas)){
        ?>
         <li>No Results Found</li>
        <?php
    }else{
    foreach($datas as $data){
        ?>
            <li> <?=$data->title?></li>
            <hr>
            
        <?php
    }}
    ?>
        </ul>
    <?php
}
else{
         $datas = $db->CustomQuery("select title from title_all where title like '%$key%'");
    ?>
    <span>Contents, events and the news with the similar title</span>
    <hr>
        <ul> 
    <?php
        if(empty($datas)){
        ?>
         <li>No Results Found</li>
        <?php
    }else{
    foreach($datas as $data){
        ?>
            <li> <?=$data->title?></li>
            <hr>
            
        <?php
    }}
    ?>
        </ul>
    <?php
}

 
 
 ?>