<?php
session_start();
 require_once("../database/Database.php");
 $db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST)){
        
        if(!empty($_POST["password"])){
             
            if(isset($_SESSION["email"])){
                $hash_password=password_hash($_POST["password"],PASSWORD_DEFAULT);
                $email=$_SESSION["email"];
                // $db->delete("recover_password","email",$email);
                if($db->Update("admins",["password"=>$hash_password],"email",[$email])){
                    $_SESSION["message"]="Password has Been Change";
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="https://www.consultancynepal.com/cnbackend";';
                    echo '</script>';
                    die();
                    
                }
                
            }
            
            
        }
        else{
            $errors["password"]="Password field is required.";
        }
        
        
    }
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
        <title>NEW   Password</title>
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
  
                            <div class="brand-logo"><img alt="logo" src="../cnbackend/images/logo/logo.png"></div>
                                <h3 class="font-weight-light d-flex justify-content-center">Type Your password here</h3>
                                <form action="" class="pt-3" method="post">
                                    <div class="form-group">
                                        <p class="text-danger"><?=$errors["password"]?></p>
                                        <input type="password" class="form-control form-control-lg"
                                            id="exampleInputEmail1" name="password" placeholder="Type New Password"></div>
                                   
                                    <div class="mt-3"><button
                                            class="auth-form-btn btn btn-block btn-lg btn-primary font-weight-medium"
                                              type="submit">Send</button></div>
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