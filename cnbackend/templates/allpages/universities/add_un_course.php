<?php include "../pathforedit/header.php";
include "../pathforedit/aside.php";
require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); ?>
<?php $uid=$_GET['id'];
$course_list=$db->CustomQuery("SELECT * FROM  course");
$selected=$db->CustomQuery("SELECT * FROM `course_university` WHERE university_id='$uid';");

 ?>
<div class="main-panel"><div class="content-wrapper"><?php include("../../../infos/message.php") ?>
<div class="page-header"><nav aria-label="breadcrumb"><ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="link"href="<?=$base_url?>adduniversity">Add Course</a></li>
    <li class="breadcrumb-item active"aria-current="page"><a class="link"href="<?=$base_url?>showuniversity">Display  University</a></li></ol>
    </nav></div>
    <div class="row">
        <div class="col-lg-12"><div class="card"><div class="card-body"><form action="<?=$base_url?>database/actions/universities/insert_un_course.php"method="post">
            <div class="row d-flex flex-row-reverse"><div class="col-2 fixed-top"style="position:fixed;top:0px;right:0;z-index:1030;left:inherit">
                <input type="submit" value="Submit"class="btn btn-primary mt-5 submitbtn"></div>
                 
                     <div class="table-responsive">
                    <table border="1px solid black" width="100%">
                        <thead><tr><th style="font-size:25px; text-align:center;">Course List</th><th style="font-size:25px; text-align:center;">Checked</th></tr></thead>
                        <tbody>
                             <?php if($selected==null){
                                 $course[]="";
                                 
                             }
                             else{
                                 foreach($selected as $sel){
                                     $course[]=$sel->course_id;
                                     
                                 }
                                 
                             }
                             
                        foreach($course_list as $data){
                            
                      
                        ?>
                        <tr>
                            <td>
                              
                                <b class="d-flex justify-content-center"><?=$data->name?></b>
                                
                            </td>
                            <td>
                               
                                <input  class="mx-3" type="checkbox" value="<?=$data->id?>" name="university_list[]" <?=(in_array($data->id,$course))?"checked":" "?>> 
                                <span class="checkmark"></span> <input type="number"value="<?=$uid?>"name="university" hidden>
                            </td>
                                    </tr>
                                    <?php
                        }
                                    ?>
                                    
                        </tbody>
                        </table> 
                    </div></div></div></div><?php include "../pathforedit/footer.php"; ?>