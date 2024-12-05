<?php include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?><?php $cid=$_GET['id'];
$consultancy_list=$db->CustomQuery("SELECT * FROM consultancies");
$selected=$db->CustomQuery("SELECT * FROM consultancy_pages where country_id={$cid}"); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("../../../infos/message.php") ?>
<div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="link"href="<?=$base_url?>addcountry">AddCountry</a></li>
    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showcountry">Display Country</a></li></ol>
    </nav></div>
    <div class="row">
        <div class="col-lg-12"><div class="card"><div class="card-body"><form action="<?=$base_url?>database/actions/country/addconsultancy.php"method="post">
            <div class="row d-flex flex-row-reverse"><div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit">
                <input type="submit"value="Submit"class="btn btn-primary mt-5 submitbtn">
                <a href="https://www.consultancynepal.com/cnbackend/templates/allpages/country/rank_country_consultancy.php?country_id=<?=$cid?>" class="btn btn-primary mt-5">Rank</a>
                </div>
                 
                     <div class="table-responsive">
                    <table border="1px solid black" width="100%">
                        <thead><tr><th style="font-size:25px; text-align:center;">ConsultancyList</th><th style="font-size:25px; text-align:center;">Checked</th></tr></thead>
                        <tbody>
                               <?php if($selected==null){$cons[]="";}else{foreach($selected as $sel){$cons[]=$sel->consultancy_id;}}
                                foreach($consultancy_list as $list){ ?> 
                        <tr>
                            <td>
                              
                                <label class="container"><?=$list->consultancy_name?>
                                
                            </td>
                            <td>
                                <input type="checkbox"value="<?=$list->id?>"name="consultancy_list[]" <?=(in_array($list->id,$cons))?"checked":" "?>> 
                                <span class="checkmark"></span></label><input type="number"value="<?=$cid?>"name="country"hidden>
                            </td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                        </table> 
                    </div></div></div></div><?php include "../pathforedit/footer.php"; ?>