<?php

$errors = [
  "old_password"=>"",
  "new_password"=>"",
  "conformpassword"=>"",
  
];
 
$old= [
  "old_password"=>"",
  "new_password"=>"",
  "conform_password"=>"",
  
];
 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($_POST)){

   foreach ($_POST as $key => $value){
        if(empty($_POST[$key])){  
        $errors[$key] = "* The " .$key. " field is require";
        }else{
        $old[$key] = $value;
        }
    }
    $old_password=$_POST["old_password"];
    $new_password=$_POST["new_password"];
    $conform_password=$_POST["conform_password"];
    
    if($new_password != $conform_password){
         $errors['new_password'] = "Conformation Password does not match";  
    }

    $consultancy_id=$_SESSION["consultancy_id"];
    $consultancy=$db->CustomQuery("SELECT * FROM `admins` WHERE consultancy_id='$consultancy_id'");
   
   
    $result = password_verify($old_password,$consultancy[0]->password);
    if($result ==1){
        
       if(!array_filter($errors)){

        $hash_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update_data=[
            "password"=>$hash_password
        ];
        if($db->Update("admins",$update_data, "consultancy_id",[$consultancy_id])){
            $_SESSION["message"] = "Password Change Sucessfully..";
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/password/changepass";';
            echo "</script>";
            die();
        }
        else{
            $_SESSION["message"] = "Password Change failed..";
         echo '<script type="text/javascript">';
         echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/password/changepass";';
         echo "</script>";
         die();
        }

         
 


       }
    }
    else{
         $errors['old_password'] = " Old Password does not match"; 
    }

   
 

}



 }


?>

<div class="main-panel"> <div class="content-wrapper">
    <?php include("infos/message.php") ?>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="link" href="<?=base_url("dashboard/dashboard")?>">Dashboard</a></li>
                    
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New AboutUs</h4>
                        <form action="<?=base_url("password/changepass.php")?>" class="cmxform"
                            enctype="multipart/form-data" id="signupForm" method="post" name="addmember"
                            onsubmit="return validateForm()">
                            <fieldset>
                                <div class="row">
                                      <div class="form-group col-4"><label for="firstname">Old Password&nbsp;<p class="errorcolor text-danger"><?=$errors['old_password']?></p></label><input
                                     class="form-control" name="old_password" id="firstname" value="<?=$old["old_password"]?>"  required></div>   
                                </div>
                                 <div class="row">
                                      <div class="form-group col-4"><label for="firstname">New Password&nbsp;<p class="errorcolor text-danger"><?=$errors['new_password']?></p></label> <input type="password"
                                     class="form-control" name="new_password" id="firstname" value="<?=$old["new_password"]?>"  required></div>   
                                </div>
                                 <div class="row">
                                      <div class="form-group col-4"><label for="firstname">Conform Password</label> <input
                                    type="password" class="form-control" name="conform_password" id="firstname"
                                      value="<?=$old["conform_password"]?>"required></div>   
                                </div>
                                     
                                     
                                    <div class="col-12"><input class="btn btn-primary"   type="submit"
                                            value="+Change Password"></div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
