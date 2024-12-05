<?php
 require_once("../database/Database.php");
 $db = Database::Instance();
 $errors=[
     "email"=>""
     ];
 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST)){
        
        if(empty($_POST["email"])){
            
            $errors["email"]="* Email field is Required ";
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
              $errors["email"]=" * Invalid Email ";
            }
            
            if(!array_filter($errors)){
                 
                   
                  $toemail=$_POST["email"];
                  $result =$db->CustomQuery("SELECT COUNT(*) as pre,name FROM admins WHERE email='$toemail'");
                  
                  $count=$result[0]->pre;
                  $count=$result[0]->pre;
                  $name=$result[0]->name;
                 
                  
                   
                  if($count>0){
                      
                 
                      
                      $token=rand(10000,99999);
                      $subject="Password Reset Request";
                      $sender_mail="consultancynepal79@gmail.com";
                      $header="From:$sender_mail";
                      $body="
                        Hello, <h1>$name</h1>
                        
                        We have received a request to reset the password for your account.Your Code is <b><h2>$token</h2></b>, please ignore this message.
                        
                        To reset your password, please follow the instructions below:
                        
                        Go to our website  <a href='https://www.consultancynepal.com/recover/recover.php'><h2>Click HERE</h2></a>
                       
                         
                        If you have any questions or concerns, please don't hesitate to contact our customer support team.
                        
                        Thank you,<br>
                        
                        [Consultancy Nepal]
 
                      ";
                      $mailHead = implode("\r\n", [
                          "MIME-Version: 1.0",
                          "Content-type: text/html; charset=utf-8"
                        ]);
 
                      
                     if(mail($toemail,$subject,$body,$mailHead)){
                         
                          
                          if($db->Insert("recover_password",["email"=>$_POST["email"],"token"=>$token])){
                              
                                $_SESSION["message"]="Code Has Been Send Please Check Your Email";
                                header("location:https://www.consultancynepal.com/recover/forgetpassword.php");
                          }
                         
                        
                     }
                      
                      
                      
                      
                      
                      
                  }
                  else{
                      $_SESSION["messages"]="Email Does't NoT Exits";
                      header("location:https://www.consultancynepal.com/recover/forgetpassword.php");
                       
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
        <title>Forget Password</title>
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
                                <h3 class="font-weight-light d-flex justify-content-center">Forget Password</h3>
                                <form action="" class="pt-3" method="post">
                                    <div class="form-group">
                                        <p class="text-danger"><?=$errors["email"]?></p>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleInputEmail1" name="email" placeholder="Type your Email"></div>
                                   
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