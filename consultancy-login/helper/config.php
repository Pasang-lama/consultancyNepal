<?php
function Redirect($url)
{
    header('Location: '.base_url(). $url);
    exit();
}
if(!function_exists('base_url')){
    function base_url($urlPath=''){
        $http_https=$_SERVER['REQUEST_SCHEME'];
        $serverName=$_SERVER['SERVER_NAME'];
        $urlPath =trim($urlPath,'/');
        $path= $http_https.'://'.$serverName.'/'.'consultancy-login/'.$urlPath;
        return $path;
    }
}
 
?>