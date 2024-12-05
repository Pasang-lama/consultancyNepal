<?php 
 $cid=$_GET['id'];
 $consultancy_list=$db->CustomQuery("SELECT * FROM test_preparation");$selected=$db->CustomQuery("SELECT * FROM consultancy_test_prep where cid={$cid}"); ?>
<div class="main-panel">
    <div class="content-wrapper"><div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=base_url("consultancy/showconsultancy")?>">Show consultancy</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tests list</h4>
                        <form action="<?=base_url("action/consultancy/addtests.php")?>" method="post">
                            
                            <div class="row d-flex flex-row-reverse">
                                <div class="col-2 fixed-top"
                                    style="position:fixed;top:190px;right:0;z-index:1030;left:inherit"><input
                                        type="submit" value="+add tests" class="btn btn-primary mt-5 submitcheck"></div>
                                <div class="col-10">
                                    <?php if($selected==null){$cons[]="";}else{foreach($selected as $sel){$cons[]=$sel->tpid;}}foreach($consultancy_list as $list){ ?><label
                                        class="container"><?=$list->title?><input type="checkbox" value="<?=$list->id?>"
                                            name="consultancy_list[]" <?=(in_array($list->id,$cons))?"checked":" "?>>
                                        <span class="checkmark"></span></label><?php } ?></div>
                            </div><input type="number" value="<?=$cid?>" name="country" hidden>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 