<?php
ob_start();
session_start();
$requestUri = isset($_GET['uri']) ? $_GET['uri'] : '';
require_once("database/database.php");
$db = Database::Instance();
require_once "helper/tables.php";
require_once('helper/config.php');
 
if($requestUri==""){
    require_once('loginpage/login.php');
}
else
{
$requestUri = str_replace('.php', '', $requestUri);
$requestUri = $requestUri . '.php';
 
$page_path = __DIR__.'/pages/' . $requestUri;
 if($requestUri=="actions/consultancy/insertc.php"){
     require_once "action/consultancy/insertc.php";  
}
elseif($requestUri=="actions/consultancy/addtests.php"){
    require_once "action/consultancy/addtests.php";  
}
elseif($requestUri=="actions/consultancy/editclasses.php"){
    require_once "action/consultancy/editclasses.php";  
}
else{
     
require_once('layouts/header.php');
require_once('layouts/aside.php');
if (file_exists($page_path) && is_file($page_path)) {
    
     
    if($_SESSION["is_login"]=="true" and $_SESSION["usertype"]=="user" and isset($_SESSION["username"])){
        
         
          require($page_path);
    }
    else{
        header("Location:".base_url());
    }
} else { 
    echo $page_path;
    echo "page not found";
}
require_once('layouts/footer.php');

}
 
}

?>