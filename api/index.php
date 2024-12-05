<?php
 ob_start();
// including important files 
include "../database/Database.php";
include "api.php";
include "jwtToken.php";
$api=new api();
 
 

// geting url
$apiuri=explode('/',$_SERVER["REQUEST_URI"]);

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET,POST,PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin');
    header('Content-Type: application/json');
    
 
if($apiuri[1]=="api"){
    if($apiuri[2]=="testingtest.php" and !isset($apiuri[3])){ 
           $api->testingtest();    
      }
     if($apiuri[2]=="aboutus.php" and !isset($apiuri[3])){ 
           $api->AboutUs();    
      }
      
       if($apiuri[2]=="pushNotification.php" and !isset($apiuri[3])){ 
          
           //  geting data from client side
            
            // $playerIds = array('7ea419ae-7f66-404e-add1-cd23368550a0','255c6b01-2025-4443-bc24-08915ef52f95','48c75d38-02a1-42a3-b85f-543ec6c9c637');
            $playerIds = array('48c75d38-02a1-42a3-b85f-543ec6c9c637');
            $message = 'Your notification message here';
            $imageUrl = 'http://localhost/Consultancy-Nepal/cnbackend/public/uploads/country/IMG-646c5f4d4a3203.97554411.webp';
            $api->sendPushNotification($playerIds, $message,$imageUrl);    
           
      }
      
      
      
      
      if($apiuri[2]=="gettestPreparationbyid.php" and !isset($apiuri[3])){ 
          
           //  geting data from client side
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);   
            
           $api->getTestPreparationById($request);    
      }
      if($apiuri[2]=="contactPage.php" and !isset($apiuri[3])){ 
             
            //  geting data from client side
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);   
            $api->ContactUs($request);
          
      } 
     if($apiuri[2]=="changepassword.php" and !isset($apiuri[3])){
             
            // geting data from the client side
             $json = file_get_contents('php://input');
             $data = json_decode($json);
             $request = get_object_vars($data);
             
             $api->changePassword($request);
              
         
            }
    
     if($apiuri[2]=="login.php" and !isset($apiuri[3])){
        
         
            //  geting data from client
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);
             
        
            $api->loginUser($request);
               
             }
     if($apiuri[2]=="PopularConsultancy.php" and !isset($apiuri[3])){
          
           $api->PopularConsultancy();
          
          
      }
      if($apiuri[2]=="StudyAboradDestination.php" and !isset($apiuri[3])){
          
           $api->StudyAboradDestination();
          
          
      }
      
      if($apiuri[2]=="get_user_data.php" and !isset($apiuri[3])){
                 
                // $token_obj=new jwttoken();
                $headertoken =$_SERVER['HTTP_X_AUTH_TOKEN'];
                
                $api->getUserData($headertoken);
                
                
 
     }
      if($apiuri[2]=="forgetpassword.php" and !isset($apiuri[3])){
             
         
            //  geting data from client
             $json = file_get_contents('php://input');
             $data = json_decode($json,true);
             
               
          
            $api->forgetPassword($data);
          
          
      }
       if($apiuri[2]=="events.php" and !isset($apiuri[3])){
          
           $api->events();
          
          
      }
      if($apiuri[2]=="topDestination.php" and !isset($apiuri[3])){
                
           $api->topDestination();
          
          
      }
       if($apiuri[2]=="getconsultancybytest.php" and !isset($apiuri[3])){
                 
               
           $api->consultancyTestpreparation();
          
          
      }
   
      if($apiuri[2]=="testPreparation.php" and !isset($apiuri[3])){
          
           $api->testPreparation();
          
          
      }
      if($apiuri[2]=="register.php" and !isset($apiuri[3])){
               
            //  geting data from client side
                $json = file_get_contents('php://input');
                $data = json_decode($json);
                $request = get_object_vars($data);
                
               
              $api->registerUser($request);
            
         
             }
      
         if($apiuri[2]=="university.php" and !isset($apiuri[3])){
            $api->university();
         }
             
      if($apiuri[2]=="country.php" and !isset($apiuri[3])){
            $api->country();
        }
      if($apiuri[2]=="consultancy.php" and !isset($apiuri[3])){
                $api->consultancy();
        }
      if($apiuri[2]=="blog.php" and !isset($apiuri[3])){
            $api->blog();
       }
      if($apiuri[2]=="news.php" and !isset($apiuri[3])){
            $api->news();
      }
      if($apiuri[2]=="getCountryById.php" and !isset($apiuri[3])){
           
           
         
            //  geting data from client
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);
        
            $api->getCountryById($request);
           
      }
      if($apiuri[2]=="getConsultancyById.php" and !isset($apiuri[3])){
           
            
         
            //  geting data from client
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);
        
            $api->getConsultancyById($request);
           
      }
      if($apiuri[2]=="getCountryContentById.php" and !isset($apiuri[3])){
           
            
         
            //  geting data from client
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $request = get_object_vars($data);
        
            $api->getCountryContentById($request);
           
      }
    
  
    
             
             
             
      
      
      if(isset($apiuri[3])){
        echo "404 not found";
     }   
      
}
 
 

?>