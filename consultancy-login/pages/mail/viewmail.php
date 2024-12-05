<?php
$consultancy_id=$_SESSION["consultancy_id"];
$id=$_GET["id"];

$response=$db->CustomQuery("SELECT * FROM consultancy_enquery WHERE mid='$id' and consultancy_id='$consultancy_id'");
foreach($response as $data){

?>
 
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
                        <h4 class="card-title"> consultancy</h4>
                        <form action="<?=base_url("action/consultancy/edit.php")?>" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                             
                               
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                    <label class="display-2">Name:</label>
                                       <span class="btn btn-primary"><?=$data->name?></span>
                                    </div>
                                     <div class="col-md-6">
                                    <label class="display-2">Email</label>
                                         <span class="btn btn-primary"><?=$data->email?></span>
                                    </div>
                                </div>
                                 <div class="row mb-5">
                                    <div class="col-md-6">
                                    <label class="display-2">Number</label>
                                        <span class="btn btn-primary"><?=$data->number?></span>
                                    </div>
                                     <div class="col-md-6">
                                    <label class="display-2">Destination</label>
                                         <span class="btn btn-primary"><?=$data->destination?></span>
                                    </div>
                                </div>
                                    <div class="row mb-5">
                                    <div class="col-md-6">
                                    <label class="display-2">Course</label>
                                        <span class="btn btn-primary"><?=$data->course?></span>
                                    </div>
                                     <div class="col-md-6">
                                    <label class="display-2">Subject</label>
                                         <span class="btn btn-primary"><?=$data->subject?></span>
                                    </div>
                                </div>
                                 <div class="row mb-5">
                                    <div class="col-md-12">
                                    <label class="display-2">Message</label>
                                        <div style="height:500px;width:100%;border:1px solid black; padding:20px;"><?=$data->message?></div>
                                    </div>
                                    
                                </div>
                                
                                
                               
        <input name="addmember" value="Submit" class="mt-3 btn btn-primary" type="submit">
        </div>
    </div>
</div>

<?php
}
?>