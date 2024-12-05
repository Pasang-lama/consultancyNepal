<?php
session_start();
 require_once("../database/Database.php");
 $db = Database::Instance();
 $errors=[
     "code"=>""
     ];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST)){
        
        if(empty($_POST["code"])){
            
            $errors["code"]="* Code field is Required ";
        }
        
        if(!is_numeric($_POST["code"])){
            
             $errors["code"]="String Are Not allowed ";
            
        }
        
          if(!array_filter($errors)){
              
              $code=$_POST["code"];
              $data =$db->CustomQuery("SELECT COUNT(*) as pre,email,token FROM  recover_password WHERE token='$code'");
              $count=$data[0]->pre;
              $email=$data[0]->email;
               
              if($count>0){
                $_SESSION["email"]=$email;
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/recover/newpassword.php";';
                echo '</script>';
                die();
                
                  
                  
              }
              else{
                  echo "error";
              }
              
             
              
              
          }
        
        
        
        
        
    }
 }
 
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
        <title>Recover Your  Password</title>
        <link href="../cnbackend/assets/vendors/iconfonts/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../cnbackend/assets/vendors/css/vendor.bundle.base.css " rel="stylesheet">
        <link href="../cnbackend/assets/vendors/css/vendor.bundle.addons.css " rel="stylesheet">
        <link href="../cnbackend/assets/css/style.css " rel="stylesheet">
        <link href="../cnbackend/assets/images/favicon.png " rel="shortcut icon">
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid full-page-wrapper page-body-wrapper">
                <div class="align-items-center d-flex auth content-wrapper">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light p-5 text-left">
                                  <?php include("../cnbackend/infos/message.php")?>
                            <div class="brand-logo"><img alt="logo" src="../cnbackend/images/logo/logo.png"></div>
                                <h3 class="font-weight-light d-flex justify-content-center">Type Your code here</h3>
                                <form action="" class="pt-3" method="post">
                                    <div class="form-group">
                                        <p class="text-danger"><?=$errors["code"]?></p>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleInputEmail1" name="code" placeholder="Type your Code Here"></div>
                                   
                                    <div class="mt-3"><button
                                            class="auth-form-btn btn btn-block btn-lg btn-primary font-weight-medium"
                                            name="login" type="submit">Send</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../cnbackend/assets/vendors/js/vendor.bundle.base.js"></script>
        <script src="../cnbackend/assets/vendors/js/vendor.bundle.addons.js "></script>
        <script src="../cnbackend/assets/js/off-canvas.js "></script>
        <script src="../cnbackend/assets/js/hoverable-collapse.js "></script>
        <script src="../cnbackend/assets/js/misc.js "></script>
        <script src="../cnbackend/assets/js/settings.js "></script>
        <script src="../cnbackend/assets/js/todolist.js "></script>
    </body>
    </html>