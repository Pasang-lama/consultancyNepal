<?php
include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db = Database::Instance();
$uid = $_GET["id"];
$university_list = $db->CustomQuery("SELECT * FROM university"); $selected =
$db->CustomQuery( "SELECT * FROM consultancy_university where consultancy_id={$uid}" ); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("../../../infos/message.php") ?>
<div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="link"href="<?=$base_url?>addconsultancy">Add Consultancy</a></li>
    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showconsultancy">Display consultancy</a></li></ol>
    </nav></div>
    <div class="row">
        <div class="col-lg-12"><div class="card"><div class="card-body"><form action="<?=$base_url ?>database/actions/consultancy/add_university.php"method="post">
            <div class="row d-flex flex-row-reverse"><div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit">
                <input type="submit"value="Submit"class="btn btn-primary mt-5 submitbtn"></div>
                 
                     <div class="table-responsive">
                    <table border="1px solid black" width="100%">
                        <thead><tr>
                            <th>SN</th>
                            <th style="font-size:25px; text-align:center;">University List</th><th style="font-size:25px; text-align:center;">Checked</th></tr></thead>
                        <tbody>
                                <?php
if ($selected == null) {
    $cons[] = "";
} else {
    foreach ($selected as $sel) {
        $cons[] = $sel->university_id; } } ?>
                  <?php
                  $i=1;
foreach (
    $university_list
    as $list
) { ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td>
                              
                                <label class="container"> <?=$list->university_name?>&nbsp;&nbsp;
                                
                            </td>
                            <td>
                             
                                <input type="checkbox"value="<?=$list->u_id;?>"name="university_list[]"<?=(in_array($list->u_id,$cons))?"checked":" "?>> 
                               
                                   <input type="number" value="<?=$uid?>" name="country" hidden />
                            </td>
                                    </tr>
                                    <?php $i++;} ?>
                        </tbody>
                        </table> 
                    </div></div></div></div><?php include "../pathforedit/footer.php"; ?>