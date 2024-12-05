<?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST)){
         $username =preg_replace('/[^A-Za-z0-9]/', '',$_POST['username']); 
         $password =  $_POST['password'];
         
           $consultancydata = $db->CustomQuery(
            "SELECT name,password,user_type,consultancy_id FROM admins WHERE username='$username'"
         );
       
         if(!empty($consultancydata)){
             foreach ($consultancydata as $data) {
                $username=$data->name;
                $dbpassword=$data->password;
                $usertype=$data->user_type;
                $consultancy_id=$data->consultancy_id;
                $result = password_verify($password,$dbpassword);
                if($result==1)
                {
                    if($usertype=="user"){
                     $_SESSION["username"] = $username;
                     $_SESSION["usertype"] = $usertype;
                     $_SESSION["is_login"] = true;
                     $_SESSION["consultancy_id"] = $consultancy_id;
                      
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/dashboard/dashboard.php";';
                        echo "</script>";
                        die();
                     
                    }
                    else{
                        $_SESSION["messages"] = "LogIn Fail ";
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/";';
                        echo "</script>";
                        die();
                         
                    }
                }
                else{
                     $_SESSION["messages"] = "LogIn Fail ";
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/";';
                        echo "</script>";
                        die();
                    
                }

             }
         }
         else{
             $_SESSION["messages"] = "LogIn Fail ";
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="https://www.consultancynepal.com/consultancy-login/";';
                        echo "</script>";
                        die();
         }

       

        }

    


}
 
  ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
        <title>Consultancy Nepal LogInPage</title>
        <link href="<?=base_url("assets/vendors/iconfonts/font-awesome/css/all.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/vendors/css/vendor.bundle.base.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/vendors/css/vendor.bundle.addons.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/css/style.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/images/favicon.png")?>" rel="shortcut icon">
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid full-page-wrapper page-body-wrapper">
                <div class="align-items-center d-flex auth content-wrapper">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light p-5 text-left">
                                  <?php include("infos/message.php")?>
                            <div class="brand-logo"><img alt="logo" src="../cnbackend/images/logo/logo.png"></div>
                                <h3 class="font-weight-light">Sign in to continue.</h3>
                                <form action="<?=base_url()?>" class="pt-3" method="post">
                                    <div class="form-group"><input type="text" class="form-control form-control-lg"
                                            id="exampleInputEmail1" name="username" placeholder="Username"></div>
                                    <div class="form-group"><input class="form-control form-control-lg"
                                            id="exampleInputPassword1" name="password" placeholder="Password"
                                            type="password"></div>
                                    <div class="mt-3"><button
                                            class="auth-form-btn btn btn-block btn-lg btn-primary font-weight-medium"
                                            name="login" type="submit">SIGN IN</button></div>
                                    <div class="align-items-center d-flex justify-content-between my-2"><a
                                            class="auth-link text-black" href="https://www.consultancynepal.com/recover/forgetpassword.php">Forgot password?</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url("assets/vendors/js/vendor.bundle.base.js")?>"></script>
        <script src="<?=base_url("assets/vendors/js/vendor.bundle.addons.js")?>"></script>
        <script src="<?=base_url("assets/js/off-canvas.js")?>"></script>
        <script src="<?=base_url("assets/js/hoverable-collapse.js")?>"></script>
        <script src="<?=base_url("assets/js/misc.js")?>"></script>
        <script src="<?=base_url("assets/js/settings.js")?>"></script>
        <script src="<?=base_url("assets/js/todolist.js")?>"></script>
    </body>

    </html>