<?php
 
class api extends Database{
    
    
    //   this function to used to remove null from the empty filed and set empty
    public function checkNull($item){
        if(empty($item)){
            
            return "";
            
        }else{
            return $item;
        }
        
         
    } 
    
    // this function is used to skiped field that we don't need in the api
    public function skip_field($data,$skiped=array()){
         
        $result = [];
        
        // adding baseurl  http://localhost/Consultancy-Nepal/cnbackend/public/ in the follwing image url 
        
        $modify_image_url=["image","consultancy_logo"];
        
        //implementing  strip tag in follwing field to remove the html tags from the data
        $filter_text=["intro_text","description","website"];
    
        foreach ($data as $item) {
            $newItem = [];
            foreach ($item as $key => $value) {
                if (!in_array($key, $skiped)) {
                    
                     if (in_array($key, $modify_image_url)){
                            
                            if(!empty($value)){
                            $newItem[$key] = "http://localhost/Consultancy-Nepal/cnbackend/public/".$value;
                            }
                            else{
                                $newItem[$key] = strip_tags($value);
                                
                            }
                        } else {
                            if(in_array($key, $filter_text)){
                                $newItem[$key] = strip_tags($value);
                            }else{
                                
                               
                                
                                $newItem[$key] = preg_replace(
                                        "/[^a-z.A-Z0-9 ]/m",  
                                        '',                 
                                     strip_tags($value)
                                    );
                            }
                        }
                        
                }
                
            }
            $result[] = $newItem;
        }
    
        return $result;
    }
    public function testingtest(){
        
        $test=$this->CustomQuery("SELECT id,title FROM `test_preparation`");
        print_r($test);
        
    }
    public function sendPushNotification($playerIds,$message,$imageUrl){
        
         $appId = 'b25cdc3d-f71f-4724-8f1c-073e773523bc';
        $apiKey = 'NmViMTk4M2QtY2M0Zi00YTk0LTg4MjItZDk2YzgxYWYwODVm';

    // Create an array with the notification contents
    $fields = array(
        'app_id' => $appId,
        // 'included_segments' => array('All'),
         'include_player_ids' => $playerIds,
        // 'include_player_ids' => $playerIds, // An array of player IDs to send the notification to
        'data' => array("foo" => "bar"),    // Custom data payload (optional)
        'contents' => array(
            'en' => $message // The notification message
        ),
        'big_picture' => $imageUrl 
    );

    $fields = json_encode($fields);

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . $apiKey // Use your REST API Key here
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Use this option carefully in production

    // Execute cURL session and get the response
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
        
      
        
    }
    public function getTestPreparationById($request){
        
        $tid=$request["tid"];
        
        $testPreparationDetails=$this->CustomQuery("SELECT * FROM `test_preparation` WHERE id='$tid'");
        
          $finalData = array(); 
        
        foreach($testPreparationDetails as $data){
            
            $finalData = array(
                  "id"=>"$data->id",
                  "title"=>$data->title,
                  "intro_text"=>$data->intro_text,
                  "description"=>$data->description,
                  "image"=>"http://localhost/Consultancy-Nepal/cnbackend/public/".$data->image 
                  );
            
            
            
        }
        
         $jsonData = json_encode($finalData);
        echo $jsonData;
        //  $final_data=$this->skip_field($testPreparationDetails,["meta_title","slug","status","meta_title","meta_description","created_at","updated_at"]);
         
        //  $jsonData = json_encode($final_data);
        // echo $jsonData;
        
        
        
        
        
    }
      
    public function ContactUs($request=array()){
         
        $fullname=$request["fullname"];
        $email=$request["email"];
        $number=$request["number"];
        $subject=$request["subject"];
        $message=$request["message"];
        if($request["consultancy_id"]!=0){     
            $consultancy_id=$request["consultancy_id"];
            
            
            // fetching consultancy details of requested consultancy id
            $fetchConsultancyDetails=$this->CustomQuery("SELECT consultancy_email,consultancy_name FROM `consultancies` WHERE id='$consultancy_id'");
            
            if(!empty($fetchConsultancyDetails)){
                
                    $sender_mail=$email;
                    $reciver_mail=$fetchConsultancyDetails[0]->consultancy_email;
                    $reciver_name=$fetchConsultancyDetails[0]->consultancy_name;
                    $sender_name=$fullname;
                     
                    $header="From:$sender_mail";
                      $mailHead = implode("\r\n", [
                          "MIME-Version: 1.0",
                          "Content-type: text/html; charset=utf-8"
                        ]);
                     $body="
                     
                       <h1>Hello, $reciver_name</h1>
                       <p>My name is $sender_name,$message</p>
                       
                     ";
                    try {  
                         mail($reciver_mail,$subject,$body,$mailHead); 
                         
                         
                    } catch (Exception $e) {      
                         http_response_code(400);
                         echo json_encode(['msg'=>"Failed to send email"]); 
                    } 
                  
            }
             
             try { 
                $this->Insert("consultancy_enquery",["name"=>$fullname,"email"=>$email,"number"=>$number,"subject"=>$subject,"message"=>$message,"consultancy_id"=>$consultancy_id]);
                
                 echo json_encode(['msg'=>"success"]); 
            } catch (Exception $e) {      
                 http_response_code(400);
                 echo json_encode(['msg'=>"Failed to insert data"]); 
            } 
            
        }
        else{
            
            
            
             try {
            
                 $this->Insert("contacts",["name"=>$fullname,"email"=>$email,"phone"=>$number,"subject"=>$subject,"message"=>$message]);
                
                 echo json_encode(['msg'=>"success"]);
            
                    
                } catch (Exception $e) {
                    
                     http_response_code(400);
                     echo json_encode(['msg'=>"Failed to insert data"]);
                    
                    
                    
                } 
            
        }
      
           
    }
    public function AboutUs(){ 
        
          $aboutUs=$this->CustomQuery("SELECT * FROM `abouts` WHERE status='1'");
           $finalData = array(); 
           
           foreach($aboutUs as $data){
               
               $finalData = array(
                  "id"=>"$data->id",
                  "title"=>$data->title,
                  "intro_text"=>strip_tags($data->intro_text),
                  "description"=>strip_tags($data->description),
                  "image"=>"http://localhost/Consultancy-Nepal/cnbackend/public/".$data->image 
                  );
               
           }
           
              
        $jsonData = json_encode($finalData);
        echo $jsonData;
        
    } 
    public function StudyAboradDestination(){
        
        $country=$this->CustomQuery("SELECT countries.image AS image,countries.description AS country_description,countries.id AS id,countries.country_name AS name FROM `rank_country` LEFT JOIN countries ON countries.id=rank_country.country_id WHERE status='1' ORDER BY rank ASC LIMIT 0,10;");
         $finalData = array();
        foreach($country as $data){
            
             $country_content=$this->CustomQuery("SELECT * FROM country_contents where country_id='$data->id' ORDER BY country_contents.rank ASC Limit 0,3");
               
             
             $contentList=array();
             foreach($country_content as $content){
                  $contentList[] = array(
                        "id"=>$content->id,
                        "name"=>$content->title,
                        
                    );
                 
             }
             
            $finalData[] = array(
                  "id"=>$data->id,
                  "country"=>$data->name,
                  "image"=>"http://localhost/Consultancy-Nepal/cnbackend/public/".$data->image,
                  "description"=>strip_tags($data->country_description),
                  "content"=>$contentList
                  
                  );
             
              
            
        }
        
         $jsonData = json_encode($finalData);
        echo $jsonData;
        
        
        
    }
    public function PopularConsultancy(){
        $country=$this->CustomQuery("SELECT countries.id AS id,countries.country_name AS name FROM `rank_country` LEFT JOIN countries ON countries.id=rank_country.country_id WHERE status='1' ORDER BY rank ASC LIMIT 0,4;");
         $finalData = array();
        foreach($country as $data){
            
             $consultancy_list=$this->CustomQuery("SELECT consultancies.id,consultancies.consultancy_name,consultancies.consultancy_phone,consultancies.consultancy_logo,area.area FROM `consultancy_pages` JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id JOIN area ON consultancies.area=area.id WHERE consultancy_pages.country_id='$data->id' Limit 0,6;");
               
             
             $consultancyArray=array();
             foreach($consultancy_list as  $consultancy){
                  $consultancyArray[] = array(
                      "consultancy_id"=>"$consultancy->id",
                      "consultancy_name"=>$consultancy->consultancy_name,
                      "consultancy_phone"=>$consultancy->consultancy_phone,
                      "consultancy_logo"=>$consultancy->consultancy_logo,
                      "area"=>$consultancy->area
                         
                        
                    );
                 
             }
            $finalData[] = array(
                  "id"=>"$data->id",
                  "country"=>$data->name,
                  "consultancy"=>$consultancyArray
                  
                  );
             
              
            
        }
        
         $jsonData = json_encode($finalData);
        echo $jsonData;
        
        
        
    } 
    public function getUserData($Token){
        
        
         if(!empty($Token)){
                    
                     $Jwt_Token=new jwttoken(); 
                     $user_id=$Jwt_Token->verify_key($Token,"security_key");
                     
                     
                     
                    
                    $user_id_fetch=$user_id[0]->id;
                    
                    
                    $user_data=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE id='$user_id_fetch'");
                    
                    if(!empty($user_data)){
                        
                        
                        foreach($user_data as $user_data)
                        {
                        
                  
                          
                          $final_data=array(
                              "id"=>$user_data->id,
                              "username"=>$user_data->username,
                              "email"=>$user_data->email,
                              "phonenumber"=>$user_data->phonenumber,
                              "token"=>$Token
                              );
                        }
                            $jsonData = json_encode($final_data);
                                echo $jsonData;
                                
                    
               
                    }
                    else
                    {
                        http_response_code(400);
                        echo json_encode(['msg'=>"Token Doesn't Match"]);
                    }
                     
                    
                    
                }
                else{
                     http_response_code(400);
                    echo json_encode(['msg'=>"Send token first"]);
                     
                }
    }
    public function forgetPassword($data){
         
           $errors=[];
           $email=$data["email"];
             
        //   fetching user data with the requested email
           $checkemail=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE email='$email'"); 
            $username=$checkemail[0]->username;
            $user_id=$checkemail[0]->id;
            
        // verifying email address id exits in database or not 
           if(empty($checkemail)){
                      http_response_code(400);
                      echo json_encode(['msg'=>"User with this email doesn't exits"]);
                      $errors["emailerr"]="email doesn't exists";
                      die();
              }
            
        //   if token and new passoword set than update password
           if(isset($data["newpassword"]) and !empty($data["newpassword"])){ 
                
               
                 $hashpassword=password_hash($data["newpassword"],PASSWORD_DEFAULT);
                 
                 
                  try {  
                           $this->Update("mobile_users",["password"=>$hashpassword],"id",[$user_id]);
                           
                             $this->Update("mobile_users",["token"=>""],"id",[$user_id]);
                           
                           
                        
                         echo json_encode(['msg'=>"password change sucess.."]);
                         
                    } catch (Exception $e) {      
                         http_response_code(400);
                         echo json_encode(['msg'=>"Failed to Update new password"]); 
                    } 
               
                
                
                
                 
                 
           }
        //   id not newpassword and token not set
           else{ 
            //   generate a random token
                   $token=rand(100000,999999);
                   $toemail=$email;
                   $subject="Password Reset Request";
                   $sender_mail="consultancynepal79@gmail.com";
                
                   $header="From:$sender_mail";
                   $body="
                        <h1> Hello, $username</h1>
                        
                        We have received a request to reset the password for your account.Your Code is <b><h2>$token</h2></b>.
                         
                         
                        Thank you,<br>
                        
                        [Consultancy Nepal]
 
                      ";
                      $mailHead = implode("\r\n", [
                          "MIME-Version: 1.0",
                          "Content-type: text/html; charset=utf-8"
                        ]);
  
                   try {  
                       
                    //   sending mail using mail php function 
                         mail($toemail,$subject,$body,$mailHead);
                        //  if mail send then update token to the mobile users database..
                         $this->Update("mobile_users",["token"=>$token],"id",[$user_id]);
                        
                         echo json_encode(['msg'=>"Email has been send..","token"=>"$token"]);
                         
                    } catch (Exception $e) {      
                         http_response_code(400);
                         echo json_encode(['msg'=>"Failed to send email"]); 
                    } 
                  
               
           }
           
           
            
                  
                  
            
    } 
    public function university(){
        $university=$this->CustomQuery("SELECT * FROM `university` WHERE status='1'");
         $final_data=$this->skip_field($university,["create_at","update_at","slug","meta_title","meta_description","total_nepali_student","status","location_id"]);
         
          
        $jsonData = json_encode($final_data);
        echo $jsonData;
        
        
    } 
    public function registerUser($request=array()){
                $errors=[];
                $username=$request['username'];
                $email=$request['email'];
                $phone=$request['phonenumber'];
                $userpassword=$request['password'];
         
                 //   password hashing..
                $hashpassword=password_hash($userpassword,PASSWORD_DEFAULT);
                 //   check email already Exits or not
        
                $checkemail=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE email='$email'");
                
                // throw errors if email already exits
                  if(!empty($checkemail)){
                       http_response_code(400);
                       echo json_encode(['msg'=>'Email  already exists']);
                       $errors["emailerr"]="emailexits";
                  }
                  
                  
                
          
                // throw errors if  number already Exits 
                //   $checknumber=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE phonenumber='$phone'");
                //   if(!empty($checknumber)){
                //         http_response_code(400);
                //       echo json_encode(['msg'=>'Number already exists']);
                //       $errors["numbererr"]="numberexits";
                //   }
          
                 // today date
                $currentDate = date("Y-m-d");  
 
                $data=[
                    "username"=>$username,
                    "email"=>$email,
                    "password"=>$hashpassword,
                    "phonenumber"=>$phone,
                    "created_at"=>$currentDate
                    
                    ];
                    
                     
        
          
                // fiter errors
                if(empty($errors))
                {
                    
                    //insert data to the mobile users table 
                    $insert=$this->Insert("mobile_users",$data);
                
                    if($insert){
                        echo json_encode(['status'=>true,'data'=>'sucess']);
                        
                    }
                    else{
                         http_response_code(400);
                         echo json_encode(['errors'=>true,'data'=>'fail to insert']);
                    }
                
                 } 
                 
                //  end register user method
        
    }
    public function changePassword($request=array()){
             $newpassword=$request["newpassword"];
             $newhashPassword=password_hash($newpassword, PASSWORD_DEFAULT);
             $oldpassword=$request["oldpassword"]; 
             $headertoken =$_SERVER['HTTP_X_AUTH_TOKEN'];
             
             
            //  check header token if empty or not 
              if(!empty($headertoken)){
                   
                    $Jwt_Token=new jwttoken();
                  
                    $user_id=$Jwt_Token->verify_key($headertoken,"security_key"); 
                    
                    // fetch userid using jwt token
                    $user_id_fetch=$user_id[0]->id;
                    
                    // check user if exits or not
                    $getUserdata=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE id='$user_id_fetch'");
                    // if data not empty
                    if(!empty($getUserdata)){
                        
                        // old password database hash
                        $dbpasswword=$getUserdata[0]->password;
                         
                         
                        // verify user enter old password and dbpassword
                        if (password_verify($oldpassword, $dbpasswword)) {
                            
                             try {
                                 
                                $changePasswordQuery=$this->Update("mobile_users",["password"=>$newhashPassword],"id",[$user_id_fetch]);
                                     http_response_code(200);
                                      echo json_encode(['msg'=>'sucess']); 
                            
                            } catch (ExceptionType $exception) {
                                
                              http_response_code(400);
                              echo json_encode(['msg'=>'Failed to change password ']); 
                                
                                
                            }
                             
                             
                        } else {
                            
                            // throw erros if password not verify
                             http_response_code(400);
                              echo json_encode(['msg'=>'old password  not match ']); 
                        }
                         
                    }
                    
                    
                    
                    
                   
                   
                }
                else{
                    
                    // if token not exits throw errors
                     http_response_code(400);   
                     echo json_encode(['msg'=>"Send authenticate token"]);
                    
                }
        
    }
    public function loginUser($request=array()){
        
        $errors=[];
        $email=$request["email"];
        $userpassword=$request["password"];
        
        // verifying email address
          $checkemail=$this->CustomQuery("SELECT * FROM `mobile_users` WHERE email='$email'");
          
          
          if(empty($checkemail)){   
                 http_response_code(400);  
                  
                echo json_encode(['msg'=>"User with this email doesn't exists."]);
               
                $errors["emailerr"]="emailexits";
              }
              
              
             
              
        if(empty($errors))
        {
                $dbpassword=$checkemail[0]->password;
                
                if(!password_verify($userpassword,$dbpassword)){
                      http_response_code(400);
                      echo json_encode(['msg'=>"Incorrect Password"]);
                }
                else{
                    $user_id=$checkemail[0]->id;
                    $KEY="security_key";
                    $Jwt_Token=new jwttoken();
                    
                    $jwt_token=$Jwt_Token->generate_key(['id'=>$user_id],$KEY);
                  
                    $data=[
                            "id"=>$user_id,
                            "token"=>$jwt_token,
                            "email"=>$checkemail[0]->email,
                            "phonenumber"=>$checkemail[0]->phonenumber,
                            "username"=>$checkemail[0]->username,
                            ];
                    
                    echo json_encode($data);
                
                }
            
        }
        
         
        
    }
    public function country(){
        
        $country=$this->CustomQuery("SELECT * FROM `rank_country` LEFT JOIN countries ON countries.id=rank_country.country_id WHERE status='1' ORDER BY rank ASC;");
         
          $final_data=$this->skip_field($country,["meta_title","meta_description","description","country_slug","thumb_image","featured","is_home","created_at","updated_at","rank_id","rank","country_id"]);
         
          
        $jsonData = json_encode($final_data);
        echo $jsonData;
        
        
        
    }
    public function testPreparation(){
        
        $testPreparation=$this->CustomQuery("SELECT * FROM `test_preparation` WHERE status='1'");
         $final_data=$this->skip_field($testPreparation,["slug","video","status","meta_title","meta_description"]);
         
         $jsonData = json_encode($final_data);
        echo $jsonData;
         
    }
    public function events(){
        // SELECT * FROM `events` WHERE status ='1';
        $events=$this->CustomQuery("SELECT * FROM `events` WHERE status ='1'");
         $final_data=$this->skip_field($events,["create_at","update_at","slug","meta_title","meta_description","Address","status","video"]);
         
         $jsonData = json_encode($final_data);
        echo $jsonData;
        
    }
    public function topDestination(){
       
      
        
         $country=$this->CustomQuery("SELECT countries.id AS cid,countries.country_name AS cname FROM `rank_country` LEFT JOIN countries ON countries.id=rank_country.country_id WHERE status='1' ORDER BY rank ASC  ");
          $finalData = array();
          
          
         foreach($country as $data){
             
              $topdestination=$this->CustomQuery("SELECT university.u_id AS uid,university.university_name AS university FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$data->cid' Limit 10");
              
             
              
                $universityList=array();
                foreach($topdestination as $university){
                  $universityList[] = array(
                      "university_id"=>$university->uid,
                      "university_name"=>$university->university,
                        
                    );
                }
                
                 
                
                 $finalData[] = array(
                  "id"=>$data->cid,
                  "country"=>$data->cname,
                  "university"=>$universityList
                  
                  );
             
               
         }
        
        
        
         
         
         $jsonData = json_encode($finalData);
        echo $jsonData;
        
        
    }
    public function consultancyTestpreparation(){
        
        
         $testPreparation=$this->CustomQuery("SELECT * FROM test_preparation LIMIT 0,4;");
         $finalData = array();
        foreach($testPreparation as $data){
            
             $consultancy_test_wise=$this->CustomQuery("SELECT consultancies.consultancy_name AS consultancy,consultancies.consultancy_phone AS consultancy_phone,consultancies.consultancy_logo AS consultancy_logo,area.area AS area,test_preparation.title AS test_preparation,consultancies.consultancy_address AS consultancy_address,consultancies.id AS consultancy_id  FROM `consultancy_test_prep` JOIN consultancies ON consultancies.id=consultancy_test_prep.cid JOIN test_preparation ON test_preparation.id=consultancy_test_prep.tpid JOIN area ON consultancies.area=area.id WHERE tpid='$data->id'");
               
             
             $consultancyArraytest=array();
             foreach($consultancy_test_wise as  $test){
                  $consultancyArraytest[] = array(
                      "consultancy_id"=>$test->consultancy_id,
                      "consultancy_name"=>$test->consultancy,
                      "consultancy_phone"=>$test->consultancy_phone,
                      "consultancy_logo"=>$test->consultancy_logo,
                      "area"=>$test->area,
                      "consultancy_address"=>$test->consultancy_address,
                       
                    );
                 
             }
            $finalData[] = array(
                  "id"=>$data->id,
                  "testPreparation"=>$data->title,
                  "consultancy"=>$consultancyArraytest
                  
                  );
             
              
            
        }
        
         $jsonData = json_encode($finalData);
        echo $jsonData;
        
        
//          $testPreparation=$request["testPreparation"];
          
//          $consultancy_test_wise=$this->CustomQuery("SELECT consultancies.consultancy_name AS consultancy,consultancies.consultancy_phone AS consultancy_phone,consultancies.consultancy_logo AS consultancy_logo,area.area AS area,test_preparation.title AS test_preparation,consultancies.consultancy_address AS consultancy_address,consultancies.id AS consultancy_id,test_preparation.id AS test_preparation_id FROM `consultancy_test_prep` JOIN consultancies ON consultancies.id=consultancy_test_prep.cid JOIN test_preparation ON test_preparation.id=consultancy_test_prep.tpid JOIN area ON consultancies.area=area.id WHERE tpid='$testPreparation';
// ");
         
//         $final_data=$this->skip_field($consultancy_test_wise,[]);
         
//          $jsonData = json_encode($final_data);
//         echo $jsonData;
        
        
    }
    public function consultancy(){
       
        
        $consultancy=$this->CustomQuery("SELECT * FROM `rank_consultancy` LEFT JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id WHERE status ='1' ORDER BY rank ASC;");
         
          $final_data=$this->skip_field($consultancy,["meta_title","consultancy_slug","consultancy_meta_title","consultancy_meta_description","created_at","updated_at","Province","District","City","area","Isfeatured","consultancy_description","status","rank_id","rank","consultancy_id"]);
         
         
          
        $jsonData = json_encode($final_data);
        echo $jsonData;
        
        
        
    }
    public function blog(){ 
        $blog=$this->CustomQuery("SELECT * FROM `contents` WHERE status='1'");
        $final_data=$this->skip_field($blog,["meta_title","slug","status","meta_title","meta_description","created_at","updated_at"]);
         
         $jsonData = json_encode($final_data);
        echo $jsonData;
        
    }
    public function news(){
        
        $blog=$this->CustomQuery("SELECT * FROM `news` WHERE status='1'");
        $final_data=$this->skip_field($blog,["meta_title","slug","status","meta_title","meta_description","created_at","updated_at"]);
         
         $jsonData = json_encode($final_data);
        echo $jsonData;
        
    }
    public function getCountryById($request){
        
         $coutryId=$request["id"];
         
        //  fetching country 
        
         $country=$this->CustomQuery("SELECT * FROM `countries` WHERE id='$coutryId' AND status='1'");
         
        //  fetching country content 
          $countryContent =$this->CustomQuery(
                "SELECT * FROM country_contents where country_id='$coutryId' ORDER BY country_contents.rank ASC;"
            );
        // fetching consultancy list by country id
        
       
            $contryconsultancy = $this->CustomQuery(
                "SELECT consultancies.id AS id,consultancies.consultancy_name AS consultancy,consultancies.consultancy_logo AS image,consultancies.consultancy_email AS email,consultancies.consultancy_address AS address,consultancies.consultancy_phone AS phone, consultancies.consultancy_mobile AS mobile FROM consultancy_pages JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id AND country_id='$coutryId';"
            );
            
            $final_contry_consultancy=$this->skip_field($contryconsultancy,[]);
            
            
            
            // skiping the following field
              $final_country_content=$this->skip_field($countryContent,["meta_title","meta_description","rank","status","ordering","country_id","created_at","updated_at","slug","date","video"]);
                
         
               $final_data=$this->skip_field($country,["meta_title","meta_description","country_slug","thumb_image","featured","is_home","created_at","updated_at","date","status","video"]);
               $final_data[0]["country_content"]=$final_country_content;
               $final_data[0]["consultancy"]=$final_contry_consultancy;
         
          
                $jsonData = json_encode($final_data);
                echo $jsonData;
             
         
         
         
         
        
    }
    public function getCountryContentById($request){
         $coutryContentId=$request["id"];
         
        
        
         $countryContent =$this->CustomQuery(
                "SELECT * FROM country_contents where country_id='$coutryContentId' ORDER BY country_contents.rank ASC;"
            );
            
            // "meta_title","meta_description","description","rank","status","ordering","country_id","created_at","updated_at","slug","date","video"
          
         $final_data=$this->skip_field($countryContent,["meta_title","meta_description","rank","status","ordering","country_id","created_at","updated_at","slug","date"]);
          $jsonData = json_encode($final_data);
           echo $jsonData;
        
    }
    public function getConsultancyById($request){
        
           $consultancyId=$request["id"];
           $consultancy=$this->CustomQuery("SELECT * FROM `consultancies` WHERE id='$consultancyId' AND status ='1'");
         
          $final_data=$this->skip_field($consultancy,["meta_title","consultancy_slug","consultancy_meta_title","consultancy_meta_description","created_at","updated_at","Province","District","City","area","Isfeatured","status"]);
         
         
       
        $jsonData = json_encode($final_data);
        echo $jsonData;
          
        
    }
    
    
    
    
    
    
    
    
    
    // class end 
}


?>