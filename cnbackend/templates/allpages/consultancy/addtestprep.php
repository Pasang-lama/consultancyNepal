<?php include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?>
<?php $cid=$_GET['id'];
$consultancy_list=$db->CustomQuery("SELECT * FROM test_preparation");
$selected=$db->CustomQuery("SELECT * FROM consultancy_test_prep where cid={$cid}"); 

?>
<div class="main-panel"><div class="content-wrapper"><?php include_once 'infos/message.php'; ?>
<div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="link"href="<?=$base_url?>addconsultancy">Add  Consultancy</a></li>
    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showconsultancy">Display  Consultancy</a></li></ol>
    </nav></div>
    <div class="row">
        <div class="col-lg-12"><div class="card"><div class="card-body"><form action="<?=$base_url?>database/actions/consultancy/addtests.php" method="post">
            <div class="row d-flex flex-row-reverse"><div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit">
                <input type="submit"value="Submit"class="btn btn-primary mt-5 submitbtn"></div>
                 
                     <div class="table-responsive">
                    <table border="1px solid black" width="100%">
                        <thead><tr>
                            <th style="font-size:25px; text-align:center;">Test List</th>
                            <th style="font-size:25px; text-align:center;">Checked</th>
                            <th style="font-size:25px; text-align:center;">Details</th>
                            </tr></thead>
                        <tbody>
                                <?php if($selected==null){$cons[]="";}else{foreach($selected as $sel){$cons[]=$sel->tpid;$ids[$sel->tpid]=$sel->id;}}
                                $i=0;
                                foreach($consultancy_list
                  as $list){ ?>
                        <tr>
                            <td>
                              
                                <label class="container"><?=$list->title?>
                                
                            </td>
                            <td>
                                <input type="checkbox"value="<?=$list->id?>"name="consultancy_list[]"<?=(in_array($list->id,$cons))?"checked":" "?>> 
                               
                                 <input type="number" value="<?=$cid?>" name="country" hidden />
                            </td>
                         <td>
    <?php
    if (isset($ids[$list->id])) { 
        $sql = $db->CustomQuery("SELECT count(*) as count FROM consultancyTestPreparationDeatils WHERE ctpid=" . intval($ids[$list->id]));
        $count = 0;
        foreach ($sql as $data) {
            $count = $data->count; 
        }
        if ($count >=1) {
    ?>
            <a href="<?= $base_url ?>templates/allpages/consultancy/editconsultancypreparationdetails.php?id=<?= urlencode($ids[$list->id]); ?>&cid=<?= urlencode($cid) ?>" class="btn btn-outline-info ml-5 my-auto">Edit</a>
    <?php
        } else {
           
    ?>
            <a href="<?= $base_url ?>templates/allpages/consultancy/addconsultancypreparationdetails.php?id=<?= urlencode($ids[$list->id]); ?>&cid=<?= urlencode($cid) ?>" class="btn btn-outline-primary ml-5 my-auto">+ Add</a>
    <?php
        }
    }
    ?>
</td>

                                    </tr>
                                    <?php  } ?>
                        </tbody>
                        </table> 
                    </div></div></div></div><?php include "../pathforedit/footer.php"; ?>