<?php
 $id=$_GET["id"];
 $consultancydata=$db->CustomQuery("SELECT * FROM consultancies WHERE id='$id'");

 foreach($consultancydata as $data): ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=base_url("consultancy/showconsultancy")?>">Show Consultancy</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                 
                <div class="card">
                     
                    <div class="card-body">
                        <h4 class="card-title">Edit consultancy</h4>
                        <form action="<?=base_url("action/consultancy/edit.php")?>" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset><input name="consultancy_id" value="<?=$id?>" type="number" hidden>
                                <div class="row">
                                    <div class="col-3"><label for="exampleFormControlSelect1">Select Province</label>
                                        <select class="form-control" id="province" name="province" required>
                                            <option value="">--------------Select Province-------------------------
                                            </option>
                                            <?php  
                                            $pr_data=$db->SelectAll("{$province_table}");
                                            foreach($pr_data as $datas){ ?>
                                            <option value="<?=$datas->id?>"
                                                <?=($datas->id==$data->Province)?"selected":""?>>
                                                <?=$datas->Province_name?></option>
                                                <?php } ?>
                                        </select></div>
                                    <div class="col-3"><label for="exampleFormControlSelect1">Select District</label>
                                        <select class="form-control" id="district"
                                            name="district" required>
                                            <?php $pr_data=$db->SelectAll("{$district_table}");
                                            foreach($pr_data as $datas){ ?>
                                            <option value="<?=$datas->id?>"
                                                <?=($datas->id==$data->District)?"selected":""?>>
                                                <?=$datas->district_name?></option>
                                                <?php } ?></select></div>
                                                
                                    <div class="col-3 mb-2">
                                        <label for="exampleFormControlSelect1">Select City</label>
                                        <select class="form-control" id="city" name="city" required>
                                            <?php
                                            $city_data=$db->CustomQuery("SELECT * FROM `$city_table`");
                                            foreach($city_data as $datas){
                                                ?>
                                                  <option value="<?=$datas->city_id?>"
                                                <?=($datas->city_id==$data->City)?"selected":""?>><?=$datas->city?></option>
                                        

                                                <?php
                                            }
                                            ?>
                                        </select>
                                        </div>
                                            <div class="col-3 mb-2"><label for="exampleFormControlSelect1">Select areas</label>
                                        <select class="form-control" id="area"
                                            name="area" required><?php $area_data=$db->SelectAll("{$area_table}");foreach($area_data as $datas){ ?>
                                            <option value="<?=$datas->id?>"
                                                <?=($datas->id==$data->area)?"selected":""?>><?=$datas->area?></option>
                                            <?php } ?></select></div>
                                    <div class="form-group col-4"><label for="firstname">Date<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["date"];
                                     }
                                    ?></span></label> <input name="date"
                                            value="<?=$data->date?>" class="form-control" type="date"> <span
                                            class="border-left input-group-addon input-group-append"></span></div>
                                    <div class="form-group col-4 mt-2"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender"
                                            name="status"><?php if($data->status=="1"){ ?><option value="1" selected>
                                                Active</option>
                                            <option value="0">Inactive</option><?php }else{ ?><option value="0"
                                                selected>Inctive</option>
                                            <option value="1">Active</option><?php } ?>
                                        </select></div>
                                        <div class="form-group col-4"><label for="firstname">consultany Website</label>
                                        <input name="consultancy_website" value="<?=$data->consultancy_website?>"
                                            class="form-control" id="firstname" required></div>
                                        
                                     
                                </div>
                                <div class="row">
                                    <div class="form-group col-4"><label for="firstname" >Consultancy Name<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["consultancy_name"];
                                     }
                                    ?></span></label> <input
                                            name="consultancy_name" value="<?=$data->consultancy_name?>"
                                            class="form-control" id="firstname" required></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Consultancy
                                            Slug<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["consultancy_slug"];
                                     }
                                    ?></span></label> <input name="consultancy_slug"
                                            value="<?=$data->consultancy_slug?>" class="form-control" id="firstname" required>
                                    </div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Nick Name<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["nickname"];
                                     }
                                    ?></span></label>
                                        <input name="nickname" value="<?=$data->nickname?>" class="form-control"
                                            id="firstname" required></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Consultancy Email<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["consultancy_email"];
                                     }
                                    ?></span></label>
                                        <input name="consultancy_email" value="<?=$data->consultancy_email?>"
                                            class="form-control" id="firstname" type="email" required></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Consultancy
                                            Address</label> <input name="consultancy_address"
                                            value="<?=$data->consultancy_address?>" class="form-control" id="firstname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Consultancy Phone<span class="text-danger"><?php 
                                     if(isset($_SESSION["errors"])){
                                         echo $_SESSION["errors"]["consultancy_phone"];
                                     }
                                    ?></span></label>
                                        <input name="consultancy_phone" value="<?=$data->consultancy_phone?>"
                                            class="form-control" id="firstname"></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Consultancy
                                            Mobail</label> <input name="consultancy_mobile"
                                            value="<?=$data->consultancy_mobile?>" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Consultancy Fax</label> <input
                                            name="consultancy_fax" value="<?=$data->consultancy_fax?>"
                                            class="form-control" id="firstname"></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Consultancy
                                            postbox</label> <input name="consultancy_post_box"
                                            value="<?=$data->consultancy_post_box?>" class="form-control"
                                            id="firstname"></div>
                                </div>
                                <div class="row">
                                     
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    name="img_url" value="<?=$data->consultancy_logo?>" hidden> <input
                                                    name="consultancyimage" class="dropify" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12"><label for="firstname">Meta Title</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="consultancy_meta_title" rows="5" style="resize:none"
                                        wt-ignore-input="true" required><?=$data->consultancy_meta_title?></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Meta Description</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="consultancy_meta_description" rows="6" style="resize:none"
                                        wt-ignore-input="true" required><?=$data->consultancy_meta_description?></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="introtextckediter" rows="6" style="resize:none"
                                        wt-ignore-input="true" required><?=$data->consultancy_intro_text?></textarea></div>
                    </div>
                </div>
                <div class="form-group col-12"><label for="firstname">Details</label> <textarea class="form-control"
                        data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                        name="detailckediter" rows="6" style="resize:none"
                        wt-ignore-input="true" required><?=$data->consultancy_description?></textarea></div>
            </div><input name="addmember" value="Submit" class="mt-3 btn btn-primary" type="submit">
        </div>
    </div>
</div>
<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
endforeach; ?> 