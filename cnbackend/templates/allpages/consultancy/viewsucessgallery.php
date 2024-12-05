 <?php 
 include "../pathforedit/header.php";
 include "../pathforedit/aside.php";
 require_once "../../../database/database.php";
 require_once "../../../database/tables.php";
 $db=Database::Instance();
 $id=$_GET["id"];
$gallery=$db->CustomQuery("SELECT * FROM `sucess_gallery` WHERE country_id='$id'");
 ?>

<div class="main-panel">
    <div class="content-wrapper"> <div class="page-header">
            <h3 class="page-title">Show SucessGallery</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$base_url?>dashboard" class="link">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=$base_url?>showconsultancy"
                            class="link">show Consultancy</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Show testimonial</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach($gallery as $key=>$data){ ?><tr>
                                        <td><?=++$key?></td>
                                        <td><?=$data->name?></td>
                                        <td>
                                            <?php
                                            $country=$db->CustomQuery("SELECT country_name FROM countries  WHERE id='$data->country_id'");
                                            
                                             
                                            if($country[0]->country_name==null){
                                                echo "No Country";
                                            }
                                            else{
                                                echo $country[0]->country_name;
                                            }
                                            ?>
                                        </td>
                                       
                                        
                                        
                                        
                                        <td>
                                            <a href="<?=$base_url?>templates/allpages/consultancy/editsucessg.php?id=<?=$data->g_id?>"
                                                class="link"><button class="btn btn-outline-primary"><i
                                                        class="fa-solid fa-pen-to-square fa-sharp"></i></button></a>
                                                         <a
                                                href="#" class="link btn btn-outline-primary delete_gallery"
                                                data-did="<?=$data->g_id?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                    </tr><?php } ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between"><span
                class="d-block text-center d-sm-inline-block text-muted text-sm-left">Copyright © 2018 <a
                    href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span> <span
                class="d-block text-center float-none float-sm-right mt-1 mt-sm-0">Hand-crafted & made with <i
                    class="fa-heart far text-danger"></i></span></div>
    </footer>
</div>
<?php include "../pathforedit/footer.php"; ?>