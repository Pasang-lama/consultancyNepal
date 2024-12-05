<?php include "../pathforedit/header.php";include "../pathforedit/aside.php";require_once "../../../database/database.php";
require_once "../../../database/tables.php";
$db=Database::Instance(); 
$id=$_GET["id"];
$response=$db->CustomQuery("SELECT * FROM `contacts` WHERE id='$id'");
?>
 
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href=" ">Show Mail</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="">Dashboard</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reply Message</h4>
                        <form action="<?=$base_url?>database/actions/mail/sendmail.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post"  
                            name="myform" onsubmit="return  submitform()">
                             
                               
                                <div class="row mb-5">
                                    <div class="form-group col-12"><label for="firstname"><b>To</b></label>
                                    <?php foreach($response as $data){
                                    ?>
                                     <div class="btn btn-primary"><?=$data->email;?></div>
                                     <input hidden type="email"
                                            name="toemail" 
                                            class="form-control" value="<?=$data->email;?>" id="firstname">
                                     
                                     <?php
                                    }
                                     ?>
                                    </div>
                                    <div class="form-group col-12"><label for="firstname">Subject</label><input
                                            name="subject" 
                                            class="form-control" id="firstname">
                                    </div>
                                   
                                </div>
                                
                                  <div class="row">
                                      <div class="form-group col-12"><label for="firstname">Message</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="introtextckediter" rows="6" style="resize:none"
                                        wt-ignore-input="true"></textarea></div>
                                      
                                  </div>
                           </div>
                           </div>
                           </div>
                           <input   value="Reply" class="mt-3 btn btn-primary" type="submit">
                           </form>
        </div>
    </div>
</div>
<?php include "../pathforedit/footer.php"; ?>

 