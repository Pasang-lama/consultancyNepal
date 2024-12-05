<?php
include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db = Database::Instance();
$date = date('Y-m-d')
?>
<?php $contents = $db->CustomQuery(
    "SELECT * FROM `consultancynepal_general_enquiry`  ORDER BY `consultancynepal_general_enquiry`.`id` DESC " 
); ?><div class="main-panel"><div class="content-wrapper"><?php include "infos/message.php"; ?><div class="page-header"><h3 class="page-title">Show Enquiry</h3></div><div class="card"><div class="card-body"><h4 class="card-title">show Content</h4><div class="row">
    <div class="col-12"><div class="table-responsive"><table class="table"id="order-listing"><thead>
        <tr><th>SN</th><th>Name</th><th>Phone</th><th>Address</th><th>Country</th> 
        <!--<th>Actions</th>-->
        </tr>
        </thead><tbody><?php foreach (
            $contents
            as $key => $data
        ) { ?><tr><td><?= ++$key ?></td><td><?= $data->name ?></td><td><?= $data->phone ?></td><td><?= $data->address ?></td>
        
        <td>
            <?php
            $datu = $db->CustomQuery("select * from consultancynepal_general_enquiry_country  join countries on consultancynepal_general_enquiry_country.country = countries.id  where consultancy_enquiry = $data->id");
            $i=0;
            foreach($datu as $datas){
                 
                 if($i==0){
                     echo $datas->country_name;
                 }else{
                      echo ",".$datas->country_name;
                 }
                 $i++;
            }
            ?>
            
            
        </td>

        
        
        <!--<td>-->
            <!--<a href="<?= $base_url ?>templates/allpages/enquiry/addenquiry.php?id=<?= $data->id ?>"class="link"data-eid="<?= $data->id ?>"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square fa-sharp"></i></button></a>-->
            <!--</td>-->
            </tr><?php } ?></tbody></table></div></div></div></div></div></div><footer class="footer"><div class="d-sm-flex justify-content-center justify-content-sm-between"><span class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a href="https://www.urbanui.com/"target="_blank">Urbanui</a>. All rights reserved.</span> <span class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i class="fa-heart far text-danger"></i></span></div></footer></div><?php include "layouts/footer.php"; ?>
