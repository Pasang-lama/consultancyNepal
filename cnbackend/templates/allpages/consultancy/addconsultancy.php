<?php include "layouts/header.php";include "layouts/aside.php"; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"
    rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<div class="main-panel">
    <div class="content-wrapper"><?php include("infos/message.php") ?><div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=$base_url?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="link"
                            href="<?=$base_url?>showconsultancy">Display Consultancy</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New consultancy</h4>
                        <form action="database/actions/consultancy/insert.php" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                    <div class="col-3"><label for="exampleFormControlSelect1">Select Province<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['province'];
                                            }
                                    ?></span></label>
                                        <select class="form-control" id="province" name="province">
                                            <option value="">--------------Select Province-------------------------
                                            </option>
                                            <?php require_once "database/database.php";require_once "database/tables.php";$db=Database::Instance();$pr_data=$db->SelectAll("{$province_table}");foreach($pr_data as $data){ ?>
                                            <option value="<?=$data->id?>"><?=$data->Province_name?></option><?php } ?>
                                        </select></div>
                                    <div class="col-3"><label for="exampleFormControlSelect1">Select District<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['district'];
                                            }
                                    ?></span></label>
                                        <select class="form-control" id="district" name="district"></select></div>
                                    <div class="col-3 mb-2"><label for="exampleFormControlSelect1">Select Cit<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['city'];
                                            }
                                    ?></span>y</label>
                                        <select class="form-control" id="city" name="city"></select></div>
                                        <div class="col-3 mb-2"><label for="exampleFormControlSelect1">Select Area<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['area'];
                                            }
                                    ?></span></label>
                                        <select class="form-control" id="area" name="area"></select></div>
                                         
                                    <div class="form-group col-4"><label for="firstname" class="mt-2 ml-1">Date<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['date'];
                                            }
                                    ?></span></label>
                                        <input class="form-control"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["date"];
                                     }
                                            
                                            ?>" name="date" type="date"></div>
                                    <div class="form-group col-4 mt-2"><label for="exampleSelectGender">Status</label>
                                        <select class="form-control" id="exampleSelectGender" name="status" required>
                                            <option value="1" selected>Public</option>
                                            <option value="0">Draft</option>
                                        </select></div>
                                         <div class="form-group col-4 mt-2"><label for="exampleSelectGender">IsFeatured</label>
                                        <select class="form-control" id="exampleSelectGender" name="featured" required>
                                            <option value="normal" selected>normal</option>
                                            <option value="featured">featured</option>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4"><label for="firstname">Consultancy Name<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_name'];
                                            }
                                    ?></span></label> <input
                                            class="form-control titl" name="consultancy_name"   value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_name"];
                                     }
                                            
                                            ?>"
                                            id="firstname tit"
                                            required
                                            data-tb="consultancies" >
                                            <div id="content-title-check" style="display:none;width:350px;height:200px;overflow:scroll;background-color:pink;">
                                                
                                            </div>
                                            </div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Consultancy
                                            Slug<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_slug'];
                                            }
                                    ?></span></label> <input class="form-control" name="consultancy_slug"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_slug"];
                                     }
                                            
                                            ?>"
                                            id="firstname" required></div>
                                    <div class="form-group col-4"><label for="exampleSelectGender">Nick Name<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['nickname'];
                                            }
                                    ?></span></label>
                                        <input class="form-control" name="nickname" id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["nickname"];
                                     }
                                            
                                            ?>" required></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Consultancy Email<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_email'];
                                            }
                                    ?></span></label>
                                        <input type="email" class="form-control" name="consultancy_email"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_email"];
                                     }
                                            
                                            ?>" id="firstname" required>
                                    </div>
                                    <div class="form-group col-6"><label for="firstname">Consultancy Phone<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_phone'];
                                            }
                                    ?></span></label>
                                        <input class="form-control" name="consultancy_phone"   value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_phone"];
                                     }
                                            
                                            ?>"id="firstname"></div>
                                   
                                </div>
                                <div class="row">
                                              
                                                    <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            Facebook url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['facebook'];
                                            }
                                    ?></span></label> <input class="form-control" name="facebook"
                                            id="firstname"  value="
                                            <?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["facebook"];
                                     }
                                            
                                            ?>"></div>
                                                                      <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            Twitter url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['twitter'];
                                            }
                                    ?></span></label> <input class="form-control" name="twitter"
                                            id="firstname"  value="
                                            <?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["twitter"];
                                     }
                                            
                                            ?>"></div>
    <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            tiktok url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['tiktok'];
                                            }
                                    ?></span></label> <input class="form-control" name="tiktok"
                                            id="firstname"  value="
                                            <?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["tiktok"];
                                     }
                                            
                                            ?>"></div>
                                                <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            Youtube url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['youtube'];
                                            }
                                    ?></span></label> <input class="form-control" name="youtube"
                                            id="firstname"  value="
                                            <?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["youtube"];
                                     }
                                            
                                            ?>"></div>
                                                          <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            instagram url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['instagram'];
                                            }
                                    ?></span></label> <input class="form-control" name="instagram"
                                            id="firstname"  value="
                                            <?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["instagram"];
                                     }
                                            
                                            ?>"></div>
                                </div>
                                <div class="row">
                                      <div class="form-group col-6"><label for="exampleSelectGender">Consultancy
                                            Address<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_address'];
                                            }
                                    ?></span></label> <input class="form-control" name="consultancy_address"
                                            id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_address"];
                                     }
                                            
                                            ?>" required></div>
                                   
                                    <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            Mobile<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_mobile'];
                                            }
                                    ?></span></label> <input class="form-control" name="consultancy_mobile"
                                            id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_mobile"];
                                     }
                                            
                                            ?>"></div>
                                                    <div class="form-group col-3"><label for="exampleSelectGender">Consultancy
                                            Map url<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['map'];
                                            }
                                    ?></span></label> <input class="form-control" name="map"
                                            id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["map"];
                                     }
                                            
                                            ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">Consultancy Fax</label> <input
                                            class="form-control" name="consultancy_fax" id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_fax"];
                                     }
                                            
                                            ?>"></div>
                                    <div class="form-group col-6"><label for="exampleSelectGender">Consultancy
                                            postbox</label> <input class="form-control" name="consultancy_post_box"
                                            id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_post_box"];
                                     }
                                            
                                            ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6"><label for="firstname">consultany Website<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['consultancy_website'];
                                            }
                                    ?></span></label>
                                        <input class="form-control" name="consultancy_website" id="firstname"  value="<?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["consultancy_website"];
                                     }
                                            
                                            ?>"></div>
                                    <div class="mt-3 col-lg-4 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title d-flex">Image <small
                                                        class="align-self-end ml-auto"></small></h4><input
                                                    class="dropify" name="consultancyimage"   type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12"><label for="firstname">Meta Title<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['meta_title'];
                                            }
                                    ?></span></label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="meta_title" rows="5" style="resize:none"
                                        wt-ignore-input="true"><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_title"];
                                     }
                                            
                                            ?></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Meta Description<span class="text-danger"><?php
                                            if(isset($_SESSION["errors"])){
                                                echo $_SESSION['errors']['meta_description'];
                                            }
                                    ?></span></label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="meta_description" rows="6" style="resize:none"
                                        wt-ignore-input="true"><?php
                                             if(isset($_SESSION["old"])){
                                         echo $_SESSION["old"]["meta_description"];
                                     }
                                            
                                            ?></textarea></div>
                                <div class="form-group col-12"><label for="firstname">Intro Text</label> <textarea
                                        class="form-control" data-gramm="false"
                                        data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                                        name="introtextckediter" rows="6" style="resize:none"
                                        wt-ignore-input="true"></textarea></div>
                    </div>
                    <div class="form-group col-12"><label for="firstname">Details</label> <textarea class="form-control"
                            data-gramm="false" data-quillbot-element="IMpuXxEePO7giRtfkYfZ2" id="summary"
                            name="detailckediter" rows="6" style="resize:none" wt-ignore-input="true"></textarea></div>
                </div><input class="mt-3 btn btn-primary"   type="submit" value="Submit">
            </div>
        </div>
    </div>
</div>
<?php include "layouts/footer.php"; ?>
