<IfModule mod_rewrite.c>
 RewriteEngine On
 Options -Indexes
 Options +MultiViews
 RewriteCond %{REQUEST_FILENAME} !-f
 RewriteCond %{REQUEST_FILENAME} !-d
 RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]
</IfModule>



<?php
include "../database/query.php";
class api extends database_query{
    
    public function IsValidApi($key){
        
          
        
         $programList=$this->selectOnly("SELECT * FROM `tbl_api_user` WHERE token='$key' AND status='1'");
         if(!empty($programList)){
             return true;
         }else{
             return false;
         }
        
        
        
        
        
        
    }
    
    
    public function checkNull($item){
        if(empty($item)){
            
            return "";
            
        }else{
            return $item;
        }
        
         
    } 
    public function getadvertisment(){
 
 


 

 
       
 
 
          
          $multiDimensionArray= array(
              array(
                  "id"=>"1",
                  "destination_url"=>"https://shorturl.at/FPRZ1",
                  "image"=>"https://www.collegesnepal.com/ads/The-British-College-October.webp",
                  "name"=>"Divya Gyan College"
                  ),
            array(
                  "id"=>"2",
                  "destination_url"=>"https://shorturl.at/arO36",
                  "image"=>"https://www.collegesnepal.com/ads/The-British-College-October.webp",
                  "name"=>"Thames International College"
                  ),
                  
             array(
                  "id"=>"3",
                  "destination_url"=>"https://shorturl.at/aCHP8",
                  "image"=>"https://www.collegesnepal.com/ads/divya-gyan-college-banner-ad.webp",
                  "name"=>"Divya Gyan College"
                  ),
             array(
                  "id"=>"4",
                  "destination_url"=>"https://shorturl.at/sySTV",
                  "image"=>"https://www.collegesnepal.com/ads/Phoenix-college.webp",
                  "name"=>"Phoenix College"
                  ),
                  
                  
                  
            array(
                  "id"=>"5",
                  "destination_url"=>"https://shorturl.at/hjDG3",
                  "image"=>"https://www.collegesnepal.com/ads/Universal-College.webp",
                  "name"=>"Universal College"
                  ),
             array(
                  "id"=>"6",
                  "destination_url"=>"https://shorturl.at/xAZ14",
                  "image"=>"https://www.collegesnepal.com/ads/Orchid-International-College.webp",
                  "name"=>"Orchid International College"
                  ),
             array(
                  "id"=>"7",
                  "destination_url"=>"https://shorturl.at/crGXY",
                  "image"=>"https://www.collegesnepal.com/ads/Kathford-College.webp",
                  "name"=>"Kathford College"
                  ),
             array(
                  "id"=>"8",
                  "destination_url"=>"https://shorturl.at/jFPW0",
                  "image"=>"https://www.collegesnepal.com/ads/Kantipur-City-College.webp",
                  "name"=>"Kantipur City College"
                  ),
                  
             array(
                  "id"=>"9",
                  "destination_url"=>"https://shorturl.at/J4568",
                  "image"=>"https://www.collegesnepal.com/ads/Aadim-National-College.webp",
                  "name"=>"Aadim National College"
                  ),
                  
             array(
                  "id"=>"10",
                  "destination_url"=>"https://shorturl.at/pK016",
                  "image"=>"https://www.collegesnepal.com/ads/scholarship_bit.webp",
                  "name"=>"Scholarship link"
                  ),
                  
             array(
                  "id"=>"11",
                  "destination_url"=>"https://shorturl.at/dprvX",
                  "image"=>"https://www.collegesnepal.com/ads/internship_banner.webp",
                  "name"=>"IT Training Nepal"
                  ),
             array(
                  "id"=>"12",
                  "destination_url"=>"https://shorturl.at/yACL1",
                  "image"=>"https://www.collegesnepal.com/ads/entrance_preparation.webp",
                  "name"=>"BCA Entrance Preparation"
                  ),
                  
                    );
                
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
        
    }
    
    public function getprogrambyuniversity($university){
        $programList=$this->selectOnly("SELECT p.id AS pid,p.title as ptitle,tbl_course_code.title as code_title  FROM tbl_program as p JOIN tbl_university as u on p.university=u.id JOIN tbl_course_code ON p.code=tbl_course_code.id where u.id='$university' and p.status = 1 order by p.title ASC");
         $multiDimensionArray = array();
            foreach ($programList as $data) {
                
                $title=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->ptitle)
                                );
                $multiDimensionArray[] = array(
                    "id"=>$data->pid,
                    "title"=>$title,
                    "short_code"=>$data->code_title
                     
                );
                
            }
            
             $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
        
        
        
    }
    public function getcollegeuniversity($university){
      $College=$this->selectOnly("SELECT DISTINCT tbl_college.email,tbl_college.id, tbl_college.telephone ,tbl_college.title AS title, tbl_location_area.title AS area,tbl_location_city.title AS city,tbl_university.title AS university FROM `tbl_college_program` JOIN tbl_college ON tbl_college_program.college=tbl_college.id JOIN tbl_location_area ON tbl_college.area=tbl_location_area.id JOIN tbl_location_city ON tbl_location_city.id=tbl_college.city JOIN tbl_university ON tbl_college_program.university=tbl_university.id WHERE university='$university' AND tbl_college.status=1");
       
       if(!empty($College)){
           
       
         $multiDimensionArray = array();
            foreach ($College as $data) {
                
               
                $title=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->title)
                                );
                $telephone=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->telephone)
                                );
                $area=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->area)
                                );
                 $city=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->city)
                                );
                 
                 $university=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->university)
                                );
                                
               
                
                 
                                
                
                
               
                $multiDimensionArray[] = array(
                    
                    "id"=>$data->id,
                    "title"=>$title,
                    "email"=>$data->email,
                    "telephone"=>$telephone,
                    "area"=>$area,
                    "city"=>$city,
                    "university"=>$university
                    
                     
                );
                
            }
            
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
       }
        
        
    }
    
    
    
    
    public function gettagdetails($code){
        
         $tags=$this->selectOnly("SELECT * FROM `tbl_tags` WHERE tags='$code'");
         
         
         $multiDimensionArray = array();
            foreach ($tags as $data) {
                
                $slug=$data->slug;
                
                $description=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->description)
                                );
                 
                
                $collegelist=$this->selectOnly("SELECT 		

										DISTINCT c.title            AS          collegename,
										c.id                        AS         collegeid,
									    c.email                     AS          collegeemail,
										lc.title 		            AS          collegecity,
                						la.title 		            AS	        collegearea,
                						c.telephone                 AS          collegephone

        					FROM 		tbl_tags                    AS          t 
							INNER JOIN 	tbl_tags_program            AS          tp          ON  tp.tags=t.id 
							INNER JOIN 	tbl_college_program         AS          tcp         ON  tp.program=tcp.program 
                            INNER JOIN  tbl_college                 AS          c           ON  c.id=tcp.college
                            LEFT JOIN   tbl_tag_wise_rank_college   AS          twrc        ON  twrc.tid=t.id  AND twrc.tcpid=tcp.id
                            LEFT JOIN   tbl_location_city 		    AS          lc	        ON	c.city=lc.id
					        LEFT JOIN   tbl_location_area		    AS          la	        ON	c.area=la.id  
					        
					        WHERE       t.slug='$slug' 
					        ORDER BY    twrc.order_no ASC");
					        
					        
					  $collegelistarray = array();
					   foreach($collegelist as $item){
					       
                        $collegetitle = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->collegename)
                                );
                        
                                
                         $telephone=$this->checkNull($item->collegephone);
                            
                        
                        $collegelistarray[] = array(
                            "college_id"=>$item->collegeid,
                            "title"=>$collegetitle,
                            "email"=>$item->collegeemail,
                            "telephone"=>$telephone,
                            "city"=>$item->collegecity,
                            "area"=>$item->collegearea
                            
                          );
                        
                    }
                    
                     // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "university"=>$data->tags,
                    "code"=>"",
                    "program_id"=>$data->id,
                    "program_title"=>"",
                    "program_description"=>$description,
                    "program_objective"=>"",
                    "admission_req"=>"",
                    "college_list"=>$collegelistarray
                    
                   
                    
                );
            }
            
            // // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
                    
                    
                    
                    
                    
             
         
          
         
        
    } 
    public function search_course($key){
        
           $course_list=$this->selectOnly("SELECT tbl_university.title AS utitle, tbl_program.id AS pid,tbl_program.title AS ptitle,tbl_course_code.title AS pcode,tbl_program.intro_text AS pintro_text FROM `tbl_program` JOIN tbl_course_code ON tbl_program.code=tbl_course_code.id JOIN tbl_university ON tbl_university.id=tbl_program.university WHERE (tbl_program.title LIKE '%$key%' OR tbl_course_code.title LIKE '%$key%')");
           
            $multiDimensionArray = array();
            foreach ($course_list as $data) {
                
                  $intro_text = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->pintro_text)
                                );
                
              
                $multiDimensionArray[] = array(
                    "id" =>$data->pid,
                    "title"=>$data->ptitle,
                    "short_code"=>$data->pcode,
                    "intro_text"=>$intro_text,
                    "university"=>$data->utitle
                    
                   
                    
                    
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
        
           
        
    } 
    public function search_college($key){
        
        
    $collegelist=$this->selectOnly("SELECT tbl_location_city.title AS city_name,tbl_location_area.title AS atitle,tbl_college.id AS cid,tbl_college.title AS ctitle,tbl_college.email AS cemail,tbl_college.telephone FROM `tbl_college` LEFT JOIN tbl_location_city ON tbl_location_city.id=tbl_college.city LEFT JOIN tbl_location_area ON tbl_location_area.id=tbl_college.area WHERE tbl_college.title LIKE '%$key%'");
        
     $multiDimensionArray = array();
            foreach ($collegelist as $data) {
                
               $telephone=$this->checkNull($data->telephone);
               $area=$this->checkNull($data->atitle);
               $city=$this->checkNull($data->city_name);
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "id" =>$data->cid,
                    "title"=>$data->ctitle,
                    "email"=>$data->cemail,
                    "telephone"=>$telephone,
                    "city"=>$city,
                    "area"=>$area
                   
                    
                    
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
        
        
        
    } 
    public function getinfomation($code){
        
        
         
         
        
       
       
        
        $information=$this->selectOnly("SELECT tbl_university.id AS uid,tbl_program.id AS pid,tbl_program.title AS ptitle,tbl_program.description pdescription,tbl_program.objective AS pobjective,tbl_university.title AS utitle,tbl_course_code.title AS ctitle,tbl_program.admission_req AS padmission FROM `tbl_program` JOIN tbl_university ON tbl_university.id=tbl_program.university JOIN tbl_course_code ON tbl_course_code.id=tbl_program.code WHERE tbl_program.title='$code'");
        
       
        
        
            $multiDimensionArray = array();
            foreach ($information as $data) {
                   $programTitle = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->ptitle)
                                );
                    $programdescription= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->pdescription)
                                );
                    $programobjective= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->pobjective)
                                );
                      $university= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->utitle)
                                );
                    $admmisionreq= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->padmission)
                                );
                     $code= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->ctitle)
                                );
                                
                                
                                
                    $university_id=$data->uid;
                    $program_id=$data->pid;
                    
                    $collegelist=$this->selectOnly("SELECT tbl_location_city.title AS city_name,tbl_location_area.title AS atitle,tbl_college.id AS cid,tbl_college.title AS ctitle,tbl_college.email AS cemail,tbl_college.telephone AS ctelephone FROM `tbl_college_program` JOIN tbl_program ON tbl_program.id=tbl_college_program.program JOIN tbl_college ON tbl_college_program.college=tbl_college.id JOIN tbl_location_city ON tbl_location_city.id=tbl_college.city JOIN tbl_location_area ON tbl_location_area.id=tbl_college.area WHERE tbl_program.university='$university_id' AND tbl_program.id='$program_id'");
                    
                    
                    
                    $collegearray = array();
                    foreach($collegelist as $item){
                        $collegetitle = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->ctitle)
                                );
                        $college_overview = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->coverview)
                                );
                        $college_intro_text = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->cintro_text)
                                );
                                
                         $telephone=$this->checkNull($item->ctelephone);
                            
                        
                        $collegearray[] = array(
                            "college_id"=>$item->cid,
                            "title"=>$collegetitle,
                            "email"=>$item->cemail,
                            "telephone"=>$telephone,
                            "city"=>$item->city_name,
                            "area"=>$item->atitle
                            
                          );
                        
                    }
                    
                    
                    
                    
                        
                    
                                
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "university"=>$university,
                    "code"=>$code,
                    "program_id"=>$data->pid,
                    "program_title"=>$programTitle,
                    "program_description"=>$programdescription,
                    "program_objective"=>$programobjective,
                    "admission_req"=>$admmisionreq,
                    "college_list"=>$collegearray,
                   
                    
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
        
    }
    public function advertise(){

         $program=$this->selectOnly("SELECT * FROM tbl_content WHERE id='9'");
         $multiDimensionArray = array();
            foreach ($program as $data) {
                
                       
                        $title = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->title)
                                );
                                // $description ="safa";
                    $description = strip_tags(
                    str_replace('&bull;','',
                    str_replace('&#39;',"'",
                    str_replace("&rsquo;","'",
                    str_replace("&nbsp;"," ",
                    $data->description))))
                     );
              
                     $doc = new DOMDocument();
                        $doc->loadHTML($data->description);
                        
                        // get image src url
                        $imageSrc=$doc->getELementsByTagName('img');
                        $length= $doc->getElementsByTagName('img')->length;
                        if($imageSrc->length == 0){
                            $img="";
                        }else{
                            $img=$imageSrc[0]->getAttribute('src');
                            $imagearray=array();
                            $imagearray[]=$img;
                            for ($j=1;$j<$length;$j++)
                            {
                                $addative=$imageSrc[$j]->getAttribute('src');
                                // $addative=str_replace('https://www.collegesnepal.com','',$addative);
                                $addative=str_replace('http://collegesnepal.com',"",$addative);
                                $imagearray[]="https://collegesnepal.com".$addative;
                            }
                        }
                    
                                
                                
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                   
                    "title"=>$title,
                    "description"=>"

 
	Colleges Nepal Pvt. Ltd was established with a purpose to bridge the gap between students and Colleges, their academic programs and location, so that aspiring young students can make a informed decision for embarking on the College and academic program of their choice and convenience. Our website has all the information about the academic programs, Colleges and their facilities, education materials and updates so that it can become a pathfinder. More than that Colleges Nepal is also a great platform for academicians and researchers to seek the data of education institutes and display advertisements in Colleges Nepal website and our you tube channel to reach out to young and dynamic individuals. In this way, together we can come in close contact and meet our education purpose. By visiting our website, one can easily find out the latest buzz and can also apply after making a choice on Colleges and programs offered.

	We make sure that our website is always updated with relevant information and keeping up with the changes happening in education sector. We are not bound to education news of only Kathmandu but also channelize education updates happening outside Nepal in mid western and far western regions. People from every nook and corner, can go online and know the information by exploring the contents in our website. We also keep an update on our blogs, career advise, counselling, upcoming events, scholarships, hostels and consultancies. We believe that our network and Management can bring the change and make a difference on the lives of young people and also serve the academic purpose by collaborating with Colleges and build a bridge to fill up the gap in education sector of Nepal.

	So come and join us to make a mark in the joint effort of serving the nation by meeting the educational requirements with Colleges Nepal Pvt. Ltd.

	Why Advertise with Us?

	 Mass audience of students (Age group 13 -24) in which 85% are from Nepal.

	 Top ranking on google search keywords like Management college, +2 college, IT college etc.

	 Daily more than 500+ inquiries about the college and programs.

	 More reach through our YouTube channel Colleges Nepal  with more than 13 lakhs subscribers.

",
                    "image"=>$imagearray
                    
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
            
        
        
        
    }
    public function programbylevel($level){
        
         
        $program=$this->selectOnly("SELECT DISTINCT tbl_program.id,tbl_program.title,tbl_course_code.title AS short_code,tbl_university.title AS utitle,tbl_university.short_name AS ushort_name FROM `tbl_program` LEFT JOIN tbl_level ON tbl_level.id=tbl_program.level LEFT JOIN tbl_course_code ON tbl_course_code.id=tbl_program.code LEFT JOIN tbl_university ON tbl_university.id=tbl_program.university WHERE tbl_level.id='$level' AND tbl_program.status='1'");
        
        
        
         $multiDimensionArray = array();
            foreach ($program as $data) {
                
              
                
                        
                        // $programTitle = preg_replace(
                        //             "/[^a-z.A-Z0-9 ]/m",  
                        //             '',                 
                        //          strip_tags($data->title)
                        //         );
                        $short_code=$this->checkNull($data->short_code);
                                
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "id" =>$data->id,
                    "title"=>$data->title,
                    "short_code"=>$short_code,
                    "university"=>$data->utitle
                    
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            echo $jsonString;
            
        
        
        
        
    }
    public function getProgramDetailById($id) {
        
            $finaldata = array();
           $da=$this->select('tbl_program','id',$id,'status');
           $detail = $da->fetch(PDO::FETCH_OBJ);
           
          
           if(empty($detail)){
               $subarray[]= array("");
               $finaldata = array(
                     "overview"=>array(
                         "description"=>"",
                         "overview"=>"",
                         "objective"=>"",
                         "admission"=>"",
                         "scope"=>""
                         ),
                    "college"=>[array(
                         "cid"=>"",
                         "email"=>"",
                         "ctitle"=>"",
                         "cphone"=>"",
                        "carea"=>"",
                        "ccity"=>""
                         )],
                    "syllabus"=>[array(
                         "year/sem"=>"",
                         "subjects"=>$subarray,
                          
                         )],
                   
                    
                     );
                  
               
                
           }else{
           
            $program_id=$detail->id;
 $university_id=$detail->university;
          $description=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($detail->description)
                                );
                                
                $overview=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($detail->overview)
                                );
                                
                $objective=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($detail->objective)
                                );
                
                $admission=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($detail->admission_req)
                                );
                $scope=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($detail->scope)
                                );
                 $finaldata = array(
                     "overview"=>array(
                         "description"=>$description,
                         "overview"=>$overview,
                         "objective"=>$objective,
                         "admission"=>$admission,
                         "scope"=>$scope
                         )
                    
                     );
                     
            // college fetch 
            $Newnormalcol=[];
                                                  	  $Newfeaturecol=[];
                                                  	
                                                  	   $featuredcollegeorder=$this->selectOnly("SELECT  tbl_college.id AS cid,tbl_college.email AS cemail,tbl_college.slug AS cslug,tbl_college.title AS ctitle,tbl_college.telephone AS cphone,tbl_location_area.title AS carea,tbl_location_city.title AS ccity FROM `tbl_college_program` JOIN tbl_program_featured_college ON tbl_college_program.id=tbl_program_featured_college.cpid JOIN tbl_program ON tbl_program.id=tbl_college_program.program JOIN tbl_college ON tbl_college.id=tbl_college_program.college left JOIN tbl_location_area ON tbl_college.area=tbl_location_area.id JOIN tbl_location_city ON tbl_college.city=tbl_location_city.id WHERE tbl_program.id='$program_id' AND tbl_program.university='$university_id' ORDER BY tbl_program_featured_college.oid ASC");
                                                  	   $normalCollege=$this->selectOnly("SELECT tbl_college.id AS cid,tbl_college.email AS cemail,tbl_college.slug AS cslug,tbl_college.title AS ctitle,tbl_college.telephone AS cphone,tbl_location_area.title AS carea,tbl_location_city.title AS ccity FROM `tbl_college_program`
                                                  	   JOIN tbl_college ON tbl_college.id=tbl_college_program.college 
                                                  	   JOIN tbl_program ON tbl_program.id=tbl_college_program.program 
                                                  	   JOIN tbl_location_area ON tbl_college.area=tbl_location_area.id JOIN tbl_location_city ON tbl_college.city=tbl_location_city.id WHERE tbl_program.id='$program_id' AND tbl_program.university='$university_id'
"); 


 

 


                                                         for($i=0;$i<count($featuredcollegeorder);$i++){
                                                             
                                                                $Newfeaturecol[$i]=$featuredcollegeorder[$i];
                                                            
                                                        }
                                                        
                                                        for($i=0;$i<count($normalCollege);$i++){
                                                                if(in_array($normalCollege[$i],$Newfeaturecol)){
                                                                    continue;
                                                                }
                                                                else{
                                                                    
                                                                $Newnormalcol[$i]=$normalCollege[$i];
                                                                }
                                                            
                                                        }
                                                        
                                                         
                                                        $resultCollegeProgram=array_merge($Newfeaturecol,$Newnormalcol);    
                                                        
            // get colleges
            $colleges=array();
            foreach($resultCollegeProgram as $item){
                
                   $ctitle=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->ctitle)
                                );
                    $carea=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->carea)
                                );
                    $ccity=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($item->ccity)
                                );
                    
                
                $colleges[]=array(
                    "cid"=>$item->cid,
                    "email"=>$item->cemail,
                    "ctitle"=>$ctitle,
                    "cphone"=>$item->cphone,
                    "carea"=>$carea,
                    "ccity"=>$ccity
                    );
            }
            // get syllabus
            $finaldata["colleges"]= $colleges;
           $syllabus=array();
           if($detail->type==1){
               $curyear=array();
               $levels = $this->selectOnly('select MAX(level) as max_level from tbl_subjects where program='.$detail->id);
                                             $max_level =  $levels[0]->max_level;
                                          $year = array('1st','2nd','3rd','4th');
                                          for($i=1;$i<=$max_level;$i++) {
                                            $a = $i-1;
                                         $subjects = $this->select('tbl_subjects where program='.$detail->id." AND level=".$i);
                                     $subject = $subjects->fetch(PDO::FETCH_OBJ);
                                         
                                if($subject){
                                    $subjects = $this->select('tbl_subjects where program='.$detail->id." AND level=".$i);
                                    while($subject = $subjects->fetch(PDO::FETCH_OBJ)) {
                                        
                                $scode=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($subject->code)
                                );
                                 $stitle=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($subject->title)
                                );
                                
                                        
                                       
                                        $subarray[]= array(
                                             $scode,
                                             $stitle
                                            );
                        }
                                    $curyear[]=array(
                                        "year/sem"=>$year[$i-1],
                                        "subjects"=>$subarray);
                                }
                    }
           }else{
               $curyear=array();
               	$levels = $this->selectOnly('select MAX(level) as max_level from tbl_subjects where program='.$detail->id);
                                             $max_level =  $levels[0]->max_level;
                                          $year = array('First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth');
                                          for($i=1;$i<=$max_level;$i++) { 

                                            $a = $i-1;
                                              $subjects = $this->select('tbl_subjects where program='.$detail->id." AND level=".$i);
                                              //print_r($subjects);
                                              while($subject = $subjects->fetch(PDO::FETCH_OBJ)) { 
                                                  
                                                   $scode=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($subject->code)
                                );
                                 $stitle=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($subject->title)
                                );
                                                  
                                                  $subarray[]=array(
                                           $scode,
                                             $stitle
                                                      );
                                               }
                                               $curyear[]=array(
                                        "year/sem"=>$year[$i-1],
                                        "subjects"=>$subarray);
                
                                        }
                                        

               
           }
           $finaldata["syllabus"]=$curyear;
        
          
           }
           
            $jsonString = json_encode($finaldata);
                
                echo $jsonString;
    }
    public function getallprogram(){
         
           $finaldata = array();
           $university=$this->selectOnly("SELECT id,title FROM `tbl_university`");
           
           foreach($university as $udata){
                $universityName=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($udata->title)
                                );
                 $programList = array();
               
                  $programs =$this->selectOnly('SELECT * FROM tbl_program where university =' . $udata->id . " LIMIT 100" );
                  
                  
                  foreach($programs as $pdata){
                      
                      $programList[]=array(
                         "program_id"=>$pdata->id,
                        "title"=>$pdata->title,
                        ); 
                      
                      
                      
                      
                  }
                
                   $finaldata[]=array(
                        "university"=>$universityName,
                        "programs"=>$programList
                        ); 
                
                  
                 
                  
                  
                  
           }
           
          
           
            $jsonString = json_encode($finaldata);
                
                echo $jsonString;
       
        
        
    
       
         
     }
    public function collegeByProgramHome($program){
         
          
    
     
       
        
       
            $prodata =$this->getPopularMetaData($program);
            $popid=$prodata[0]->popid;
            
             $popular_program_details = array();
            
             $popular_search_details=$this->selectOnly("SELECT * FROM tbl_popular_details WHERE popular=" .$popid . " ORDER BY position");
             foreach($popular_search_details as $data){
                 
                  $programTitle = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->title)
                                );
                  $programDescription = preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->description)
                                );
                                
                 
                 $popular_program_details[]=array(
                        "title"=>$programTitle,
                        "description"=>$programDescription,
                        ); 
               
             }
             
              $popular_college_list = array();
              $resultCollegePopularSearch = $this->select_college_popular_search($program);
              while ( $dataCollegePopularSearch = $resultCollegePopularSearch[0]->fetch( PDO::FETCH_OBJ )){
                  
                  $collegename= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                               strip_tags( $dataCollegePopularSearch->college)
                                );
                $collegeid= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->collegeid)
                                );
                $collegetelephone= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->telephone)
                                );                
                $collegeuniversity= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                               strip_tags($dataCollegePopularSearch->university)
                                );
                $collegeintro_text= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->intro_text)
                                );
                 $collegegeneral_intro_text= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->general_intro_text)
                                );            
                 $collegeprogram= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->tit)
                                );                
                 $collegecity= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->city)
                                );                
                 $collegeaddress= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                               strip_tags( $dataCollegePopularSearch->address)
                                );                
                 $collegeshort_code= preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                strip_tags($dataCollegePopularSearch->short_code)
                                );
                             
                   $popular_college_list[]=array(
                        "college"=>$collegename,
                        "collegeid"=>$collegeid,
                        "collegeemail"=>$dataCollegePopularSearch->collegeemail,
                        "telephone"=> $collegetelephone,
                        "university"=>$collegeuniversity,
                        "intro_text"=> $collegeintro_text,
                        "general_intro_text"=> $collegegeneral_intro_text,
                        "program"=> $collegeprogram,
                        "city"=> $collegecity,
                        "address"=> $collegeaddress,
                        "short_code"=> $collegeshort_code,
                        ); 
                
                }
    
             
             
               $finaldata=[
                        "program"=>strip_tags($program),
                        "description"=>$popular_program_details,
                        "colleges"=>$popular_college_list
                       
                        ];
             
             
            
            
             
            
            
       
     
         
         
        
        
        $jsonString = json_encode($finaldata);
                
                echo $jsonString;
       
         
    
    
         
         
        
    }
    public function GetPopularCollege($tag){
        
         $CollegePopularSearch =$this->select_college_popular_search($tag);
         while ($dataCollegePopular = $CollegePopularSearch[0]->fetch(PDO::FETCH_OBJ)) {
             
            echo  $dataCollegePopular->short_code;
             
         }
        
    }
    public function getcollegebyuniversity($id){
        $collegeList=$this->selectOnly("SELECT tbl_college.title AS ctitle,tbl_college.intro_text AS cintro_text,tbl_college.description AS cdescription,tbl_college.overview AS coverview,tbl_college.facilities AS cfacilities,tbl_college.scholarships AS cscholarships,tbl_college.acaprograms AS cacaprogram,tbl_college.email AS cemail,tbl_college.principal_message AS cprincipalmessage,tbl_college.website AS cwebsite,tbl_college.telephone AS ctelephone,tbl_college.image AS cimage,tbl_college.intro_image AS cintro_image FROM `tbl_college_program` JOIN tbl_program ON tbl_college_program.program=tbl_program.id JOIN tbl_university ON tbl_program.university=tbl_university.id JOIN tbl_college ON tbl_college.id=tbl_college_program.college WHERE tbl_university.id='$id'");
        
        $multiDimensionArray = array();
                foreach ($collegeList as $data) {
                    
                  
                     
                     $collegetitle = preg_replace(
                                    "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                  $title
                                );
                                
                     $collegeintro_text=preg_replace(
                                    "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->cintro_text)          
                                );
                                
                    $collegedescription=preg_replace(
                                  "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->cdescription)          
                                ); 
                    
                    $collegeoverview=preg_replace(
                                    "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->coverview)         
                                ); 
                    
                    $collegescholarships=preg_replace(
                                  "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->cscholarships )         
                                ); 
                    
                    $collegeprincipalmessage=preg_replace(
                                    "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->cacaprogram )         
                                ); 
                                  $collegeacaprogram=preg_replace(
                                  "^[a-zA-Z0-9 .',;!?\n]+$",  
                                    '',                 
                                    strip_tags($data->cprincipalmessage)        
                                ); 
                    
                    
                    //             cprincipalmessage
                    // cwebsite
                    // ctelephone
                    // cimage
                    // cintro_image
                 
                        
                         
                                
                        
                        
               
                        
                              
                    
                    // Append each row as an array to $multiDimensionArray
                    $multiDimensionArray[] = array(
                        "college"=>$collegetitle,
                        "intro_text"=>$collegeintro_text,
                        "description"=>$collegedescription,
                        "overview"=>$collegeoverview,
                        "scholarships"=>$collegescholarships,
                        "principalmessage"=> $collegeprincipalmessage,
                        "website"=>$data->cwebsite,
                        "telephone"=>$data->telephone,
                        
                        
                        
                        
                        
                    );
                }
                
                
                $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
        
        
        
        
        
        
        
    }
    public function updatepassword($id,$newpassword,$oldpassword){
     
     
                    
                   $user_data=$this->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$id'");
                   $userdataget=$user_data[0];
                   
                  
                 
                    if(!empty($userdataget)){
                        
                        
                        
                             $dbpassword=$userdataget->password;
                            
                             
                            if(password_verify($oldpassword,$dbpassword)){
                                $hashnewpasword=password_hash($newpassword,PASSWORD_DEFAULT);
                                 $user_password_update=$this->selectOnly("UPDATE tbl_mobile_user SET password='$hashnewpasword' WHERE id='$id'");
                                 echo json_encode(['msg'=>"update sucess"]);
                                 
                                 
                                
                                
                             }
                             else{
                                 http_response_code(400);
                echo json_encode(['msg'=>"Incorrect Password"]);
                                 
                             }
                        
                        
                    }
                    else{
                        http_response_code(400);
                        echo json_encode(['msg'=>"User id doesn't match"]);
                        
                        
                    }
                        
                    
                        
                        
                        
  }  
    public function getCollegeDetailsById($id){
 
        $MultiProgramDetails = array();
       
        
        $programList=$this->get_college_programs1($id);
        if(empty($programList)){
             $MultiProgramDetails[] = array(
                        "tcp_title"=>"",
                        "general_intro_text"=>"",
                     
                    );
        }
        
       foreach($programList as $p) {
           
                   
                     $MultiProgramDetails[] = array(
                        "tcp_title"=>strip_tags($p->tcp_title),
                        "general_intro_text"=>strip_tags($p->general_intro_text),
                     
                    );
                }
        
         
         
        
        $collegeList=$this->selectOnly("SELECT h.id,h.title, h.intro_text,h.description, h.overview,h.facilities,h.acaprograms,h.scholarships,h.image,h.telephone,h.fax,h.email,
                h.website, h.principal_message, lc.title AS city, la.title AS area FROM tbl_college AS h JOIN tbl_location_city AS lc ON h.city = lc.id JOIN tbl_location_area AS la ON h.area = la.id WHERE h.id='$id'");
         if(empty($collegeList)){
             $datasend=[
                        "id" =>"",
                        "title"=>"",
                        "intro_text"=>"",
                        "description"=>"",
                        "overview"=>"",
                        "facilities"=>"",
                        "acaprograms"=>"",
                        "scholarships"=>"",
                        "email"=>"",
                        "website"=>"",
                        "principal_message"=>"",
                        "telephone"=>"",
                        "city"=>"",
                        "area"=>""
                        
                   ];
        }
            foreach ($collegeList as $data) {
                
                 
                
                        $new_intro_text = preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->intro_text)           
                        );
                         $new_title = preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->title)           
                        );
                        $new_overview=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->overview)           
                        );
                        $newFacility=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->facilities)    
                        );
                        $newacaprograms=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->acaprograms)    
                        );
                        
                         $newscholarships=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->scholarships)    
                        );
                         $newprincipal_message=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            strip_tags($data->principal_message)    
                        );
                          $newtelephone=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->telephone   
                        );
                        
                        
                        
                    // Append each row as an array to $multiDimensionArray
                   $datasend=[
                        "id" => $data->id,
                        "title"=>$new_title,
                        "intro_text"=>$new_intro_text,
                        "description"=>strip_tags($data->description),
                        "overview"=>$new_overview,
                        "facilities"=>strip_tags($newFacility),
                        "acaprograms"=>strip_tags($newacaprograms),
                        "scholarships"=>strip_tags($newscholarships),
                        "email"=>$data->email,
                        "website"=>$data->website,
                        "principal_message"=>strip_tags($newprincipal_message),
                        "telephone"=>$newtelephone,
                        "city"=>$data->city,
                        "area"=>$data->area
                        
                   ];
                }
                
                $datasend["programs"]=$MultiProgramDetails;
                
                $jsonString = json_encode($datasend);
                
                echo $jsonString;
        
    }
    public function addmissionopensection(){
        
        $course_popular = ['bca', 'bit', 'bhm-bachelor-hotel-management', 'bba', 'bim', 'bbm'];
        
        $fianldata = array();
        
        foreach($course_popular as $data){
            
           $admissionopencollegelist = array();
            
                $CollegePopularSearch =$this->select_college_popular_search($data);
                 while ($dataCollegePopular = $CollegePopularSearch[0]->fetch(PDO::FETCH_OBJ)) {
                     
                     $admissionopencollegelist[]=array(
                        "collegeid"=>$dataCollegePopular->collegeid,
                        "collegename"=>$dataCollegePopular->college,
                        "address"=>$dataCollegePopular->address,
                       
                        ); 
                   
                 }
                  $fianldata[]=array(
                        "program"=>$data,
                        "college"=>$admissionopencollegelist,
                       
                        ); 
                
        }
        
          $jsonString = json_encode($fianldata);
                
                echo $jsonString;
        
        
        
        
        
        
        
        
    }
    public function getCollegeByTag($slug){
          $multiDimensionArray = array();
         $resultCollege =$this->select_college_by_faculty($slug);
            while($dataCollege = $resultCollege[0]->fetch(PDO::FETCH_OBJ)){
                $collegename= $title = preg_replace(
                                    '/[^a-z.A-Z0-9 ]/m',  
                                    '',                 
                                   $dataCollege->collegename           
                                );
                
                $multiDimensionArray[] = array(
                        "collegeid"=>$dataCollege->collegeid,
                        "collegename"=>$collegename,
                        "city"=>$dataCollege->collegecity,
                        "area"=>$dataCollege->collegearea,
                        "phone"=>$dataCollege->collegephone,
                        "email"=>$dataCollege->collegeemail
                        
                   
                    );
                  
              
              
              }
               $jsonString = json_encode($multiDimensionArray);
                
          echo $jsonString;
        
                
                
       
        
        
        
    }
    public function getTagname(){
        
        
         $multiDimensionArray = array();
        $resultFacultywiseColleges =  $this->count_college_by_faculty(); while ( $facultwiseColleges = $resultFacultywiseColleges->fetch( PDO::FETCH_OBJ ) ) {
            // print_r($facultwiseColleges);
            
            $multiDimensionArray[] = array(
                        "tagName"=>$facultwiseColleges->tagName,
                        "slug"=>$facultwiseColleges->slug,
                        "totalcollege"=>$facultwiseColleges->totalNumber,
                        
                   
                    );
            
           
            
            
            
        }
       
        $jsonString = json_encode($multiDimensionArray);
                
        echo $jsonString;
        
        
        
        
        
    }
    public function university(){
        
         $university=$this->selectOnly("SELECT tbl_university.title AS utitle,tbl_university.youtube AS uyoutube,tbl_university.short_name AS ushort_name,tbl_university.intro_text AS uintro_text,tbl_university.description AS udescription,tbl_university.id as uid,tbl_university.image AS uimage,tbl_country.title AS ctitle FROM `tbl_university` JOIN tbl_country ON tbl_country.id=tbl_university.country ");
        
        
        
    
           $multiDimensionArray = array();
                foreach ($university as $data) {
                        
                         $title = preg_replace(
                                    '/[^a-z.A-Z0-9 ]/m',  
                                    '',                 
                                   strip_tags( $data->utitle)         
                                );
                          $short_name = preg_replace(
                                                '/[^a-z.A-Z0-9 ]/m',  
                                                '',                 
                                                strip_tags($data->ushort_name)           
                                            );
                          $intro_text = preg_replace(
                                                '/[^a-z.A-Z0-9 ]/m',  
                                                '',                 
                                                strip_tags($data->uintro_text)          
                                );
                         $description=preg_replace(
                                                '/[^a-z.A-Z0-9 ]/m',  
                                                '',                 
                                                strip_tags($data->udescription)           
                                );
                                
                                $universityid=$data->uid;
                                
                                
                                   $colbyuni=$this->countcollegebyuniversity($universityid);
                                    $probyuni=$this->countprogrambyuniversity($universityid);
                                    $noofprogram=$probyuni->rowCount(); 
                                    
                                      $noofColleges=$colbyuni->rowCount();
                                
                        
                        
                        
             
                        
                              
                    
                    // Append each row as an array to $multiDimensionArray
                    $multiDimensionArray[] = array(
                        "uid"=>$universityid,
                        "title"=> $title,
                        "intro_text"=>$intro_text,
                        "short_name"=>$short_name,
                        "description"=>$description,
                        "noofprogram"=>$noofprogram,
                        "noofcollege"=> $noofColleges,
                        "image"=>"https://www.collegesnepal.com/cn/img/".$data->uimage,
                        "country"=>$data->ctitle,
                        "youtubeurl"=>$data->uyoutube,
                    );
                }
                
                
                $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
        
        
    }
    public function hostel(){
        
                $hostel = $this->selectOnly("SELECT h.id, h.intro_text, h.phone, h.title, lc.title AS city, la.title AS area FROM tbl_hostel AS h
            JOIN tbl_location_city AS lc ON h.location = lc.id
            JOIN tbl_location_area AS la ON h.area = la.id");
    
             $multiDimensionArray = array();
            foreach ($hostel as $data) {
                         $new_intro_text=preg_replace(
                                    "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                 strip_tags($data->intro_text)
                                );
                        
            
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "id" => $data->id,
                    "intro_text"=>$new_intro_text,
                    "number"=>$data->phone,
                    "title"=>$data->title,
                    "city"=>$data->city,
                    "area"=>$data->area
                );
            }
            
            // Now $multiDimensionArray contains the desired data format
            $jsonString = json_encode($multiDimensionArray);
            
            echo $jsonString;
    }
    public function college(){
          $college =$this->selectOnly("SELECT h.id,h.title, h.intro_text,h.description, h.overview,h.facilities,h.acaprograms,h.scholarships,h.image,h.telephone,h.fax,h.email,
                h.website, h.principal_message, lc.title AS city, la.title AS area FROM tbl_college AS h JOIN tbl_location_city AS lc ON h.city = lc.id JOIN tbl_location_area AS la ON h.area = la.id");
                 
                 
                
                 $multiDimensionArray = array();
                foreach ($college as $data) {
                        
                        
                        $new_intro_text = preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->intro_text           
                        );
                         $new_title = preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->title           
                        );
                        $new_overview=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->overview           
                        );
                        $newFacility=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->facilities    
                        );
                        $newacaprograms=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->acaprograms    
                        );
                        
                         $newscholarships=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->scholarships    
                        );
                         $newprincipal_message=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->principal_message    
                        );
                          $newtelephone=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->telephone   
                        );
                        
                        
                
                        
                              
                    
                    // Append each row as an array to $multiDimensionArray
                    $multiDimensionArray[] = array(
                        "id" => $data->id,
                        "title"=>$new_title,
                        "intro_text"=>$new_intro_text,
                        "description"=>strip_tags($data->description),
                        "overview"=>$new_overview,
                        "facilities"=>strip_tags($newFacility),
                        "acaprograms"=>strip_tags($newacaprograms),
                        "scholarships"=>strip_tags($newscholarships),
                        "email"=>$data->email,
                        "website"=>$data->website,
                        "principal_message"=>strip_tags($newprincipal_message),
                        "telephone"=>$newtelephone,
                        "city"=>$data->city,
                        "area"=>$data->area
                        
                        
                        
                        
                        
                        
                    );
                }
                
                
                $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
    }
    public function consultancy(){
        
          $consultancy = $this->selectOnly("SELECT tbl_consultancy.id as consid,tbl_location_city.title AS city_title,tbl_location_area.title AS area_title,tbl_consultancy.title AS cons_title,tbl_consultancy.intro_text AS cons_intro_text,tbl_consultancy.description AS contdescription,tbl_consultancy.Address AS cons_address,tbl_consultancy.website AS conswebsite,tbl_consultancy.phone AS consphone,tbl_consultancy.image AS conslogo FROM `tbl_consultancy` JOIN tbl_location_area ON tbl_location_area.id=tbl_consultancy.area JOIN tbl_location_city ON tbl_location_city.id=tbl_consultancy.location
            
            
            ");
            
            $multiDimensionArray = array();
            foreach ($consultancy as $data) {
                    
                    $new_cons_intro_text=preg_replace(
                        '/[^a-z.A-Z0-9 ]/m',  
                        '',                 
                        $data->cons_intro_text           
                    );
                    //next 
                    $new_consultancy_title=
                    preg_replace(
                        '/[^a-z.A-Z0-9 ]/m',  
                        '',                 
                        $data->cons_title   
                    );
                   
                    $new_city_title =   
                        $data->city_title           ;
                     $new_area_title = preg_replace(
                        '/[^a-z.A-Z0-9 ]/m',  
                        '',                 
                        $data->area_title           
                    );
                    // $new_cons_intro_text=$data->cons_intro_text;
                    $newconsdescription=str_replace('&bull;','',
                    str_replace('&#39;',"'",
                    str_replace("&rsquo;","'",
                    str_replace("&nbsp;"," ",
                    $data->contdescription))));
                    
                    //something starts
                    $doc = new DOMDocument();
                    $doc->loadHTML($newconsdescription);
                    
                    // get image src url
                    $imageSrc=$doc->getELementsByTagName('img')[0];
                    if($imageSrc == NULL){
                        $img="";
                    }else{
                        $img=$imageSrc->getAttribute('src');
                        $img="https://www.collegesnepal.com".$img;
                    }
                
                
                
                    // remove image mentions
                    $needingTrim=$doc->getELementsByTagName('em');
                    if($needingTrim->length !=0){
                        for($i=0;$i<=$needingTrim->length;$i++){
                             $content=$needingTrim[$i]->textContent ;
                             if(strpos($content,'Image')){
                                 $newconsdescription=str_replace($content,"",$newconsdescription);
                               
                             }else{
                                 $newconsdescription=str_replace("Image :","",$newconsdescription);
                                 $newconsdescription=str_replace("Image:","",$newconsdescription);
                             }
                        }
                    }
                    
                    //something ends
                    $newcons_address= 
                        $data->cons_address    
                    ;
                    
                     $newsconswebsite=
                        $data->conswebsite    ;
                    
                   
                      $newconsphone=preg_replace(
                        '/[^a-z.A-Z0-9 ]/m',  
                        '',                 
                        $data->consphone   
                    );
                    
                    
                // Append each row as an array to $multiDimensionArray
                $multiDimensionArray[] = array(
                    "id" => $data->consid,
                    "consultancy_title"=>$new_consultancy_title,
                    "city_title"=>$new_city_title,
                    "image"=>$img,
                    
                    "area_title"=>$new_area_title,
                    "intro_text"=>strip_tags($new_cons_intro_text),
                    "description"=>strip_tags($newconsdescription),
                    "consultancy_address"=>$newcons_address,
                    "consultancy_website"=>$newsconswebsite,
                    "consultancy_phone"=>$newconsphone,
                    
                );
                
            }
            // print_r($multiDimensionArray);
            
            $jsonString = json_encode($multiDimensionArray);
            // var_dump(json_encode($multiDimensionArray));
            // $testString= json_decode($jsonString);
            echo $jsonString;
            // echo $testString;
                 
        }
    public function news(){
         $News =$this->selectOnly("SELECT tbl_news.intro_image AS intro_image,tbl_news.image AS image,tbl_news.title AS news_title,tbl_news.intro_text AS news_intro_text,tbl_news.description AS news_description,tbl_news.publish_date AS news_publishdata,tbl_news_type.title AS news_type FROM `tbl_news` JOIN tbl_news_type ON tbl_news_type.ntid=tbl_news.news_type_id ORDER BY tbl_news.id DESC LIMIT 0,50");
                
             $multiDimensionArray = array();
                foreach ($News as $data) {
                        $new_news_title = preg_replace(
                            '/[^a-zA-Z0-9  ]/m',  
                            '',                 
                            $data->news_title           
                        );
                         $new_news_introtext = preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->news_intro_text           
                        );
                        
                        $new_news_publishdata=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->news_publishdata           
                        );
                        $newnews_type=preg_replace(
                            '/[^a-z.A-Z0-9 ]/m',  
                            '',                 
                            $data->news_type    
                        );
                         
                    //something starts
                        $doc = new DOMDocument();
                        $doc->loadHTML($data->news_description);
                        
                        // get image src url
                        $imageSrc=$doc->getELementsByTagName('img');
                        $length= $doc->getElementsByTagName('img')->length;
                        if($imageSrc->length == 0){
                            $img="";
                        }else{
                            $img=$imageSrc[0]->getAttribute('src');
                            $img="https://www.collegesnepal.com".$img;
                            for ($j=1;$j<$length;$j++)
                            {
                                $addative=$imageSrc[$j]->getAttribute('src');
                                $img.=",https://www.collegesnepal.com$addative";
                            }
                        }
                    
                     
                    
                    // Append each row as an array to $multiDimensionArray
                    $multiDimensionArray[] = array(
                        "multiple_images_separator_,_used"=>$img,
                        "news_title"=>strip_tags($new_news_title),
                        "news_intro_text"=>strip_tags($new_news_introtext),
                        "news_description"=>strip_tags($data->news_description),
                        "news_publishdata"=>strip_tags($new_news_publishdata),
                         "news_type"=>strip_tags($newnews_type)
                    );
                   
                }
                
                
                $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
    }
    public function updateUser($request,$user_id_fetch){
             $errors=[];
             $level=$request["academicLevel"];
             $faculty=$request["academicFaculty"];
             $email=$request["email"];
             $phonenumber=$request["phonenumber"];
             $username=$request["username"];
             $user_data=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$user_id_fetch'");
             
            //  checking user data exits or not in database
             if(!empty($user_data)){
                    
                $user_data_update=$new_object->selectOnly("UPDATE tbl_mobile_user SET academicLevel='$level',academicFaculty='$faculty',email='$email',phonenumber='$phonenumber',username='$username' WHERE id=$user_id_fetch");
                
                   $new_update_data=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$user_id_fetch'");
                   
                    
                        foreach ($new_update_data as $data) {
                
                             
                            $newupdateuserdb= [
                                "username"=>$data->username,
                                "academicLevel"=>$data->academicLevel,
                                "academicFaculty"=>$data->academicFaculty,
                                "email"=>$data->email,
                                "phonenumber"=>$data->phonenumber,
                            ];
                        }
        
                        $jsonString = json_encode($newupdateuserdb);
                        
                        echo $jsonString;
                    
                   
                }
                else
                {
                    http_response_code(400);
                    echo json_encode(['msg'=>"Token Doesn't Match"]);
                }
         
        
        
        
    }
    public function getProgramsByLevel($level){
        
                $program = $this->selectOnly("SELECT DISTINCT  tbl_program.title  AS title FROM `tbl_program` JOIN tbl_level on tbl_program.level = tbl_level.id where tbl_level.level='$level'");
                     $multiDimensionArray = array();
                     foreach ($program as $data) {
                    // Append each row as an array to $multiDimensionArray
                    // echo $data->title."\n";
                    $multiDimensionArray[]=$data->title;
                        }
                     
                //   $multiDimensionArray = array(
                //         "multiple_images_separator_,_used","title", "title"
                //     );
                // Now $multiDimensionArray contains the desired data format
                $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
    }
    public function syllabus(){
        // echo 12;
        // die();
         $course_codes=$this->selectAlldata('tbl_course_code WHERE id IN (SELECT code FROM tbl_syllabus_meta_details) AND id IN (SELECT code FROM tbl_syllabus_program_details) ORDER BY title ASC');
                 $multiDimensionArray = array();
                 
         foreach($course_codes as $item){
                //  $syllabus_title = $this->selectOnlyQuery('title','tbl_program','code',$item->id,' AND status = 1 ');
                  $syllabus_title = $this->selectOnlyQuery('DISTINCT title','tbl_program','code',$item->id);
                  $syllabus_title=$this->checkNull($syllabus_title[0]->title);
                  
                    
                 $syllabus_meta_desc = $this->selectAlldata('tbl_syllabus_meta_details','code',$item->id);
                 
                 
                 //need fixing
                 
         //only error there fix later   
                 $orderCol = $this->selectOnlyQuery('tbl_program.title, tbl_program.university,spd.*','tbl_syllabus_program_details as spd JOIN tbl_program ON tbl_program.id=spd.program ','spd.code',$item->id,' AND tbl_program.status = 1 ORDER BY spd.order_no ASC'); 
                 
                 foreach($orderCol as $ua){
            $university[] = $ua->university;
        }
        $unvarr = array_unique($university);
        
        $unvlimit = sizeof($unvarr);
        $temp=array();
                
                foreach($orderCol as $value){
                

                
                
                    for($i=0;$i<$unvlimit;$i++){
                        
                        if($value->university == $unvarr[$i]){
                        $subjects = $this->selectOnlyQuery('credit_hr,file,title,code as scode,level,status,program','tbl_subjects','program',$value->program,'  AND status = 1');
                        //   take university information
                            $un = $this->selectOnlyQuery('title,short_name','tbl_university','id',$value->university); 
                            if(isset($un[0]->short_name) && $un[0]->short_name != '')
                            {
                                 $uni_name=$un[0]->short_name;
                                
                            }else{
                                $uni_name=$un[0]->title;
                            }
                            $subarray=array();
                            foreach($subjects as $sub){
                                $subtitle= preg_replace(
                                  "/[^a-z.A-Z0-9 ]/m",  
                                    '',                 
                                   $sub->title          
                                );
                                $subarray[]=array("title"=>$subtitle,"credit"=>$sub->credit_hr,"code"=>$sub->scode);
                            }
                       $syllabus_By_Uni[]=array(
                            "title"=>$uni_name,
                            "subject"=>$subarray,
                            "description"=>$value->description
                            );
                        }
                        
                    }
                }
                
                // array building 
                
                 $multiDimensionArray[]=array(
                     "syllabus_title"=>$syllabus_title,
                     "syllabus_code"=>$item->title,
                     "syllabus_description"=>strip_tags(
                    str_replace('&bull;','',
                    str_replace('&#39;',"'",
                    str_replace("&rsquo;","'",
                    str_replace("&nbsp;"," ",
                    $syllabus_meta_desc[0]->description))))
                     ),
                     
                     "syllabus_By_Uni"=>$syllabus_By_Uni
                     );
                $syllabus_By_Uni=array();
                // array building end
             
         }
         
  
             

    
  
         $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
    }
    public function jobs(){
        $job=$this->selectOnly("SELECT * FROM `tbl_job_category`");
        $multiDimensionArray=array();
        foreach($job as $data){
            $new_title=
                    preg_replace(
                        '/[^a-z.A-Z0-9 ]/m',  
                        '',                 
                        $data->title   
                    );
                   
            $newconsdescription=str_replace('&bull;','',
                    str_replace('&#39;',"'",
                    str_replace("&rsquo;","'",
                    str_replace("&nbsp;"," ",
                    $data->description))));
                    
              //something starts
                        $doc = new DOMDocument();
                        $doc->loadHTML($data->description);
                        
                        // get image src url
                        $imageSrc=$doc->getELementsByTagName('img');
                        $length= $doc->getElementsByTagName('img')->length;

                        if($imageSrc->length == 0){
                            $img="";
                        }else{
                            $img=$imageSrc[0]->getAttribute('src');
                            $img="https://www.collegesnepal.com".$img;
                            for ($j=1;$j<$length;$j++)
                            {
                                $addative=$imageSrc[$j]->getAttribute('src');
                                if($addative !=""){
                                $img.=",https://www.collegesnepal.com$addative";
                                }
                            }
                        }
                    
                     
                    
                    // Append each row as an array to $multiDimensionArray
                    $multiDimensionArray[] = array(
                        "multiple_images_separator_,_used"=>$img,
                        "title"=>strip_tags($new_title),
                        "description"=>strip_tags( $newconsdescription)
                    );
                   
        }
         
         $jsonString = json_encode($multiDimensionArray);
                
                echo $jsonString;
    }
                    
                    
      
                    
                    
                    
                    
                    
                    
                    
                    
    }

?>


<?php
include "api.php";
include "childapi.php";
include "jwt-token.php";
include "../main_mail.php";
$apiobj=new api();
$childapiobj=new childapi();
$token_obj=new jwttoken();
$apiuri=explode('/',$_SERVER["REQUEST_URI"]);
 
 

// api key validation 


 
// fetching api key from the users
$ApiKey =$_SERVER['HTTP_KEY'];

$apiresponse=$apiobj->IsValidApi($ApiKey);
if($apiresponse){
     
// header information
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin');
    header('Content-Type: application/json');


if($apiuri[1]=="api"){
    
      if($apiuri[2]=="collegeEnquiry.php" and !isset($apiuri[3])){
          
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
            
             
              $name=$request["userName"];
              $email=$request["userEmail"];
              $userid=$request["userId"];
              $phonenumber=$request["number"];
              $prgramName=$request["programName"];
              $message=$request["message"];
              $collegeId=$request["collegeId"];
              $collegeEmail=$request["collegeEmail"];
              
             $current_date=date("Y/m/d");
             $sql="INSERT INTO `tbl_mobile_message` (`username`, `email`, `program`, `college`, `message`, `number`, `user`, `created_at`) VALUES ('$name', '$email', '$prgramName', '$collegeId', '$message', '$phonenumber', '$userid', '$current_date')";
             $new_object->selectOnly($sql);
             $body = "
                    <html>
                    <head>
                    <title>Enquiry From Colleges Nepal</title>
                    </head>
                    <body>
                    <p>Dear Admin Namaste, </p>
                    <p>Congratulations! An enquirer has sent a query through our educational portal Colleges Nepal<p>
                    <table>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>".$name."</td>
                        </tr>
                        <tr>
                            <td><strong>Phone:</strong> </td>
                            <td>".$phonenumber."</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong> </td>
                            <td>".$email."</td>
                        </tr>
                        <tr>
                            <td><strong>Program Interested In:</strong> </td>
                            <td>".$prgramName."</td>
                        </tr>
                        <tr>
                            <td><strong>Message:</strong> </td>
                            <td>".$message."</td>
                        </tr>
                        <tr>
                            <td><strong>Date of Enquiry:</strong> </td>
                            <td>".$current_date."</td>
                        </tr>
                    </table>
                    
                    <p><strong>
                    <em> Login to your admin panel to view more  enquiries</em><br>
                    If you are still not a member in our web portal Colleges Nepal, we kindly request you to be a member and get many enquiries from your prospective students.</strong></p>
                    <table>
                        <tr>
                            <td><strong>Thank You</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Colleges Nepal Pvt. Ltd.</strong></td>
                        </tr>
                        <tr>
                            <td><strong><a href='https://www.collegesnepal.com'>https://www.collegesnepal.com</a></strong></td>
                        </tr>
                        <tr>
                            <td><strong>9801169142</strong></td>
                        </tr>
                    </table>
                    </body>
                    </html>
                ";
             
             try{
              
            // Set up email details
           $mail->setFrom('info@collegesnepal.com', 'Colleges Nepal');
             
           
            // $mail->addAddress("$collegeEmail","$data->title");
            // $mail->addCC("$collegeEmail");
            $mail->addAddress("kishorkatuwal96@gmail.com","$data->title");
            $mail->addCC("kishorkatuwal96@gmail.com");
            $mail->Subject = 'Colleges Nepal Enquiry';
            $mail->isHTML(true);
            $mail->Body = $body;
        
            $mail->send();
                
            $mes=true;
            } catch (Exception $e) {
                
                 http_response_code(400);
                 echo json_encode(['msg'=>"Your Email could not be send !"]);
                
                
            
            }
            if($mes==true){
                 http_response_code(200);
               echo json_encode(['sucess'=>'Your email has been send']);
            }
             
             
             
              
              
             
             
           
          
          
          
      }
    
      if($apiuri[2]=="getads.php" and !isset($apiuri[3])){
          
          
          
          $apiobj->getadvertisment();
          
          
          
          
      }
     
     if($apiuri[2]=="programbyuniversity.php" and !isset($apiuri[3])){
         
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             $university=$request["university"];
             
             $apiobj->getprogrambyuniversity($university);
             
             
         
         
         
     }
     if($apiuri[2]=="collegebyuniversity.php" and !isset($apiuri[3])){
           header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             $university=$request["university"];
             
          
             $apiobj->getcollegeuniversity($university);
         
     }
     if($apiuri[2]=="tagsdetail.php" and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
              $code=$request["code"];
              
         $apiobj->gettagdetails($code);
        
    }
     if($apiuri[2]=="search_course.php" and !isset($apiuri[3])){
        header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             $key=$request["key"];
 
        $apiobj->search_course($key);
    }
     if($apiuri[2]=="search_college.php" and !isset($apiuri[3])){
        
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             $key=$request["key"];
 
        $apiobj->search_college($key);
        
    }
     if($apiuri[2]=="advertise.php" and !isset($apiuri[3])){
 
        $apiobj->advertise();
        
    }
     if($apiuri[2]=="programdetailsbycode.php" and !isset($apiuri[3])){
        
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
              $code=$request["code"];
              $apiobj->getinfomation($code);
        
        
        
    }
     if($apiuri[2]=="programbylevel.php" and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             $levelid=$request["level"];
            
         
                $apiobj->programbylevel($levelid);
    }
     if($apiuri[2]=="college.php" and !isset($apiuri[3])){
                $apiobj->college();
    }
     if($apiuri[2]=="consultancy.php" and !isset($apiuri[3])){
            $apiobj->consultancy();
    }
     if($apiuri[2]=="updateuser.php" and !isset($apiuri[3])){
         
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:PUT');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             
           
             $errors=[];
             $level=$request["academicLevel"];
             $faculty=$request["academicFaculty"];
             $email=$request["email"];
             $phonenumber=$request["phonenumber"];
             $username=$request["username"];
             $faculty_id=$request["faculty_id"];
             
             
             
               
                $token_obj=new jwttoken();
                $headertoken =$_SERVER['HTTP_X_AUTH_TOKEN'];
                 
                if(!empty($headertoken)){
                    $user_id=$token_obj->verify_key($headertoken,"security_key");
                    $user_id_fetch=$user_id[0]->id;
                    
                    $user_data=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$user_id_fetch'");
                    if(!empty($user_data)){
                        
                    $user_data_update=$new_object->selectOnly("UPDATE tbl_mobile_user SET faculty_id='$faculty_id',academicLevel='$level',academicFaculty='$faculty',email='$email',phonenumber='$phonenumber',username='$username' WHERE id=$user_id_fetch");
                    
                       $new_update_data=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$user_id_fetch'");
                       
                        $multiDimensionArray = array();
                            foreach ($new_update_data as $data) {
                    
                                // Append each row as an array to $multiDimensionArray
                                $multiDimensionArray[] = array(
                                    "username"=>$data->username,
                                    "academicLevel"=>$data->academicLevel,
                                    "academicFaculty"=>$data->academicFaculty,
                                    "email"=>$data->email,
                                    "phonenumber"=>$data->phonenumber,
                                    "faculty_id"=>$data->faculty_id
                                );
                            }
            
                            $jsonString = json_encode($multiDimensionArray);
                            
                            echo $jsonString;
                        
                       
                    }
                    else
                    {
                        http_response_code(400);
                        echo json_encode(['msg'=>"Token doesn't match"]);
                    }
                     
                        
                        
                        
                     
                    
                }
                else{
                     http_response_code(400);
                 }
                         
             
         
      }
     if($apiuri[2]=="login.php" and !isset($apiuri[3])){
         
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
         
            //  geting data from client
             $json = file_get_contents('php://input');
             $data = json_decode($json);
             $request = get_object_vars($data);
             $errors=[];
             $email=$request["email"];
             $userpassword=$request["password"];
         
        // verifying email address
          $checkemail=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE email='$email'");
  
         if(empty($checkemail)){
                   http_response_code(400);
                   echo json_encode(['msg'=>"User with this email doesn't exists."]);
                   $errors["emailerr"]="emailexits";
              }
  
    
   
        if(empty($errors)){
            $dbpassword=$checkemail[0]->password;
            if(!password_verify($userpassword,$dbpassword)){
                http_response_code(400);
                echo json_encode(['msg'=>"Incorrect Password"]);
            }
            else{
             $user_id=$checkemail[0]->id;
             $KEY="security_key";
             $jwt_token=$token_obj->generate_key(['id'=>$user_id],$KEY);
          
                $data=[
                    "id"=>$user_id,
                    "token"=>$jwt_token,
                    "email"=>$checkemail[0]->email,
                    "phonenumber"=>$checkemail[0]->phonenumber,
                    "username"=>$checkemail[0]->username,
                    "academicLevel"=>$checkemail[0]->academicLevel,
                    "academicFaculty"=>$checkemail[0]->academicFaculty,
                    "faculty_id"=>$checkemail[0]->faculty_id
                    ];
            
            echo json_encode($data);
            
            }
            
             }
       }
     if($apiuri[2]=="forgetpassword.php" and !isset($apiuri[3])){
          
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
         
            //  geting data from client
             $json = file_get_contents('php://input');
             $data = json_decode($json,true);
             
             $errors=[];
             $email=$data["email"];
            
        // verifying email address
          $checkemail=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE email='$email'");
            
         if(empty($checkemail)){
                  http_response_code(400);
                  echo json_encode(['msg'=>"User with this email doesn't exits"]);
                  $errors["emailerr"]="email doesn't exists";
              }
         if(!isset($data["password"])) {

        if(empty($errors)){
         $username=$checkemail[0]->username;
            $token=sprintf("%06d", mt_rand(1, 999999));
            $insert=$new_object->selectOnly("UPDATE `tbl_mobile_user` SET `token`='$token' WHERE email='$email'");
            // send email
             $body = "
            <html>
            <head>
            <title>Password Reset</title>
            </head>
            <body>
            <p>Dear $username, </p>
            <p>Your Password Reset CODE: <strong>$token</strong><p>
            </body>
            </html>
        ";
       
        try{
              
            // Set up email details
            $mail->setFrom('info@collegesnepal.com', 'Colleges Nepal');
            
            $mail->addAddress("$email","Reset Password");
            $mail->addCC('collegesnepal@gmail.com');
            $mail->Subject = 'Token verification';
            $mail->isHTML(true);
            $mail->Body = $body;
            $mail->send();
                
            $mes=true;
        } catch (Exception $e) {
        
        }
        if($mes==true){
           echo json_encode(['token'=>$token]);
        }
             }
             
                 
            
       }else if(empty($errors)){
           $hashpassword=password_hash($data["password"],PASSWORD_DEFAULT);
           $user_data_update=$new_object->selectOnly("UPDATE tbl_mobile_user SET password='$hashpassword' WHERE email='$email'");
            echo json_encode(['msg'=>"PassWord Changed"]);
       }
     }
     if($apiuri[2]=="programdetailbyid.php" and !isset($apiuri[3])){
          
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
         
            //  geting data from client
             $json = file_get_contents('php://input');
             $data = json_decode($json,true);
             
             $errors=[];
            $id=$data["id"];
             
         $apiobj->getProgramDetailById($id);
       }
     if($apiuri[2]=="get-program" and !isset($apiuri[3])){
         $apiobj->getProgramsByLevel("Bachelor");

     }
     if($apiuri[2]=="syllabus.php" and !isset($apiuri[3])){
        $apiobj->syllabus();
     }
     if($apiuri[2]=="get-master" and !isset($apiuri[3])){
         $apiobj->getProgramsByLevel("Master");

     }
     if($apiuri[2]=="jobs" and !isset($apiuri[3])){
         $apiobj->jobs();

     }
     if($apiuri[2]=="register.php" and !isset($apiuri[3])){
                header('Content-Type: application/json');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Methods: POST');
                header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
         
                     $json = file_get_contents('php://input');
                     $data = json_decode($json);
                     $request = get_object_vars($data);
          $errors=[];
          
          
          $username=$request['username'];
          $email=$request['email'];
          $phone=$request['phonenumber'];
          $userpassword=$request['password'];
         
           
          
         
         
        //   password hashing..
           $hashpassword=password_hash($userpassword,PASSWORD_DEFAULT);
          
        	
        	
         
        //   check email already Exits or not
        
          $checkemail=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE email='$email'");
          if(!empty($checkemail)){
               http_response_code(400);
               echo json_encode(['msg'=>'Email  already exists']);
              
               $errors["emailerr"]="emailexits";
               
              
          }
          
        //   check  number already Exits or not
          $checknumber=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE phonenumber='$phone'");
          if(!empty($checknumber)){
                http_response_code(400);
               echo json_encode(['msg'=>'Number already exists']);
               $errors["numbererr"]="numberexits";
          }
          
        
        
        $data=[
            "username"=>$username,
            "email"=>$email,
            "password"=>$hashpassword,
            "phonenumber"=>$phone,
            
            ];
        
          
         
        if(empty($errors)){
            
            // if errors doesn,t exits
           $insert=$new_object->apiinsert("tbl_mobile_user",$data);
        
        if($insert){
            echo json_encode(['status'=>true,'data'=>'sucess']);
            
        }
        else{
             echo json_encode(['errors'=>true,'data'=>'fail to insert']);
        }
        
        } 
        
         
             }
     if($apiuri[2]=="get_user_data.php" and !isset($apiuri[3])){
              header('Content-Type: application/json');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Methods: POST');
                header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');


                $token_obj=new jwttoken();
                $headertoken =$_SERVER['HTTP_X_AUTH_TOKEN'];
                if(!empty($headertoken)){
                    $user_id=$token_obj->verify_key($headertoken,"security_key");
                    $user_id_fetch=$user_id[0]->id;
                    $user_data=$new_object->selectOnly("SELECT * FROM `tbl_mobile_user` WHERE id='$user_id_fetch'");
                    if(!empty($user_data)){
                    
                    $data=[
                            "id"=>$user_data[0]->id,
                            "email"=>$user_data[0]->email,
                            "phonenumber"=>$user_data[0]->phonenumber,
                            "username"=>$user_data[0]->username,
                            "academicLevel"=>$user_data[0]->academicLevel,
                            "academicFaculty"=>$user_data[0]->academicFaculty,
                            "token"=>$headertoken,
                            "faculty_id"=>$user_data[0]->faculty_id
                            ];
                            
                         
                       
                         
                             
                    
                       echo json_encode($data);
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
     if($apiuri[2]=="hostel.php" and !isset($apiuri[3])){
            
           $apiobj->hostel();
            
     }
     if($apiuri[2]=="news.php" and !isset($apiuri[3])){
            $apiobj->news();
     }
     if($apiuri[2]=="university.php" and !isset($apiuri[3])){
         $apiobj->university();
         
 
     }
     if($apiuri[2]=="populartags.php"  and !isset($apiuri[3])){
          
         
         $apiobj->getTagname();
         
     } 
     if($apiuri[2]=="collegebytag.php"  and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             
             $slug=$request["slug"];
          
        
         $apiobj->getCollegeByTag($slug);
         
     } 
     if($apiuri[2]=="collegedetail.php"  and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
             $json = file_get_contents('php://input');
             $data = json_decode($json);
 
             $request = get_object_vars($data);
             
             
             $collegeid=$request["collegeid"];
          
         
             $apiobj->getCollegeDetailsById($collegeid);
         
     } 
     if($apiuri[2]=="admissionopen.php"  and !isset($apiuri[3])){
             $apiobj->addmissionopensection();
            
            
           
            
        }
     if($apiuri[2]=="changepassword.php" and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:PUT');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             
             $data = json_decode($json);
             $request = get_object_vars($data);
             
             
            //  fetching password from json
             $newpassword=$request["newpassword"];
             $oldpassword=$request["oldpassword"];
             
               $headertoken =$_SERVER['HTTP_X_AUTH_TOKEN'];
            
             
             
               if(!empty($headertoken)){
                    $user_id=$token_obj->verify_key($headertoken,"security_key");
                   
                      $user_id_fetch=$user_id[0]->id;
                     
                     
                    
                         $apiobj->updatepassword($user_id_fetch,$newpassword,$oldpassword);
                  
                    
                    
                    
                    
                    
                    }
             
         
            }
     if($apiuri[2]=="exploreprogram.php"  and !isset($apiuri[3])){
             $apiobj->getallprogram();
        }
     if($apiuri[2]=="collegebyprogram.php"  and !isset($apiuri[3])){
            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:POST');
            header('Access-Control-Allow-Headers:Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Origin');
            
             $json = file_get_contents('php://input');
             
             $data = json_decode($json);
             $request = get_object_vars($data);
             
             
            //  fetching password from json
              $program=$request["program"];
         
             $apiobj->collegeByProgramHome($program);
       
        }
         
    
         
         
         
         
         
         
         
       
         
   
 
     
        
        
     if(isset($apiuri[3])){
        echo "404 not found";
     }    
             

     
   
}

}
else{
    http_response_code(400);
    echo json_encode(['msg'=>"Invalid Api Key"]);
}

?>
 


<?php

class jwttoken{
    
     function generate_key($payload,$key){
        $header=['algo'=>'HS256','type'=>'HWT'];
        $header_encoded=base64_encode(json_encode($header));
        // echo $header_encoded;
        $payload_encode=base64_encode(json_encode($payload));
        $signature= hash_hmac('SHA256',$header_encoded.$payload_encode,$key);
        $signature_encoded = base64_encode($signature);
        
        return $header_encoded.'.'.$payload_encode.'.'.$signature_encoded;
        
    }
    function verify_key($token,$key){
        
        
        $token_parts = explode('.',$token);
        
        $signature=base64_encode(hash_hmac('SHA256',$token_parts[0].$token_parts[1],$key));
        
         
        
        if($signature != $token_parts[2]){
            return false;
        }
       
       
        $gn=base64_decode($token_parts[1]);
        
        $payload []= json_decode($gn);
        
         
        return $payload;
        
        
        
    }
    
    
    
}


?>
 