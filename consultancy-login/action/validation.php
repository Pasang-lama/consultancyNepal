<?php
$errors=[];
$old=[];
if(!empty($_POST)){
    $skiped_data=["status","introtextckediter","detailckediter","video","img_url","consultancy_mobile","consultancy_fax","consultancy_phone","consultancy_website"];
    
     foreach ($_POST as $key => $value){
        if(in_array($key,$skiped_data)){
             continue; 
        }
        else{
            if(empty($_POST[$key])){  
        if($_POST[$key]!="status"){
                
        $errors[$key] = "* The " .$key. " field is require";
            }
        } 
         
        }
    }
    
    foreach ($_POST as $key => $value){
         $old[$key] = $value;
    }
    
    
    
    
    
    
     if(array_key_exists("email",$_POST))
        {
              
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
               {
                  $errors["email"]= "Invalid email format";
                }
                
        }
    if (array_key_exists("url",$_POST))
        {
            if (!filter_var($_POST['url'], FILTER_VALIDATE_URL)) 
               {
                  $errors["url"]= "Invalid url format";
                }
        }
    if(array_key_exists("number",$_POST))
        {
            if (!filter_var($_POST['number'], FILTER_VALIDATE_INT)) 
               {
                  $errors["number"]= "Invalid number format";
                }
        }
    if(array_key_exists("slug",$_POST))
        {
             if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['slug'])){
                $errors['slug'] = 'Only letters and space is allowed in  Slug';
              }
             
        }
    if(array_key_exists("username",$_POST))
        {
             if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['username'])){
                $errors['username'] = 'Only letters and space is allowed in username';
              }
        }
        if(array_key_exists("name",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['name'])){
                $errors['name'] = 'Only letters and space is allowed in name';
              }
        }
        if(array_key_exists("country_name",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['country_name'])){
                $errors['country_name'] = 'Only letters and space is allowed in  Country Name';
              }
        }
         if(array_key_exists("meta_title",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['meta_title'])){
                $errors['meta_title'] = 'Only letters and space is allowed in   meta_title';
              }
        }
         if(array_key_exists("meta_description",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['meta_description'])){
                $errors['meta_description'] = 'Only letters and space is allowed in    Meta description';
              }
        }
         if(array_key_exists("title",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['title'])){
                $errors['title'] = 'Only letters and space is allowed in  title';
              }
        }
         if(array_key_exists("consultancy_name",$_POST))
        {
            if(!preg_match("/^[a-zA-Z\s]*$/", $_POST['consultancy_name'])){
                $errors['consultancy_name'] = 'Only letters and space is allowed in  consultancy_name';
              }
        }
          if(array_key_exists("nickname",$_POST))
        {
            if(!preg_match("/[^A-Za-z0-9\-\/]/", $_POST['nickname'])){
                $errors['nickname'] = 'Only letters and space is allowed in   nickname';
              }
        }
        // preg_replace('/[^A-Za-z0-9\-\/]/', '',$_SERVER['REQUEST_URI'])
         
        //   if(array_key_exists("consultancy_slug",$_POST))
        // {
        //     if(!preg_match("^[a-zA-Z\s-]*$", $_POST['consultancy_slug'])){
        //         $errors['consultancy_slug'] = 'Only letters and space is allowed in  Slug';
        //       }
        // }
         
        


  

    }
    
        
    
    
 

?>