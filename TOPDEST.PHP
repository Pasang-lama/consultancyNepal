        <!-- Top-Edu-Destination start -->
    <section class="top-edu py-lg-5 py-3">
        <div class="container">
            <h3 class="title mb-4">Top Destination For <span>Students</span></h3>
            <p>Here is the list of universities by country where most students from Nepal gets enrolled.</p>
            <div class="top-edu__slider d-none d-lg-block row">
                 <?php
                $count=0;
                $topEducationDestination=$db->CustomQuery("SELECT * FROM rank_country JOIN countries ON rank_country.country_id=countries.id ORDER BY rank_country.rank  ASC LIMIT 0,8");
                foreach($topEducationDestination as $data){
                ?>
                <div class="item">
                    <div class="top-edu-list section-bg p-4">
                        <span class="h5 title">Top Destination of <?=$data->country_name?></span>
                        <ol>
                            <?php
                            $country_id=$data->id;
                            $popularUniversity=$db->CustomQuery("SELECT * FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$country_id' Limit 6");
                            
                            foreach($popularUniversity as $data){
                            
                            ?>
                        <li><a href="#"><?=$data->university_name;?></a></li>
                        <?php
                            }
                             
                             ?>
                        </ol>
                    </div>
                </div>
                 <?php
                     
                }
                ?>
               
                
                 
            </div>
            
            <div class="d-lg-none d-block">
                <div class="accordion" id="accordionExample">
            <?php
             $topEducationDestinationmobile=$db->CustomQuery("SELECT * FROM rank_country JOIN countries ON rank_country.country_id=countries.id ORDER BY rank_country.rank  ASC LIMIT 0,8");
             $count=1;
             foreach($topEducationDestinationmobile as $data){
           if($count==1){
             
            ?>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$data->country_name;?>" aria-expanded="true" aria-controls="collapseOne">
                     Popular University of <?=$data->country_name?>
                  </button>
                </h2>
                <div id="<?=$data->country_name;?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                      <ul>
                           <?php
                            $country_id=$data->id;
                            $popularUniversity=$db->CustomQuery("SELECT * FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$country_id' Limit 3");
                            
                            foreach($popularUniversity as $data){
                            
                            ?>
                        <li><a href="#" class="text-dark"><?=$data->university_name;?></a></li>
                        <?php
                            }
                             
                             ?>
                      </ul>
                    
                  </div>
                </div>
              </div>
              <?php
                 }else{
                     ?>
                    <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$data->country_name;?>" aria-expanded="false" aria-controls="collapseTwo">
                   Popular University of <?=$data->country_name?>
                  </button>
                </h2>
                <div id="<?=$data->country_name;?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     <ul>
                           <?php
                            $country_id=$data->id;
                            $popularUniversity=$db->CustomQuery("SELECT * FROM location JOIN university ON location.location_id=university.location_id WHERE country_id='$country_id' Limit 3");
                            
                            foreach($popularUniversity as $data){
                            
                            ?>
                        <li><a href="#" class="text-dark"><?=$data->university_name;?></a></li>
                        <?php
                            }
                             
                             ?>
                      </ul>
                    
                  </div>
                </div>
              </div>
                     <?php
                     
                 }
              $count++;
             }
              ?>
            </div>
            </div>
        </div>
    </section>
    <!-- Top-Edu-Destination end -->