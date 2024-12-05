<?php
ob_start();
session_start();
include "header.php";
   $errors=[
         "name"=>"",
         "username"=>"",
         "email"=>"",
         "gender"=>"",
         "password"=>"",
         "conformpassword"=>"",
                                                            
        ];
  $old=[
         "name"=>"",
         "username"=>"",
         "email"=>"",
         "gender"=>"",
         "password"=>"",
         "conformpassword"=>"",
    ];
                        
                    
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($_POST)){
                        
         foreach ($_POST as $key => $value){
            if(empty($_POST[$key])){  
                $errors[$key] = "* The  field is require";
            }else{
              $old[$key] = $value;
            }
        }
                            
                              // check email Validation
                              if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                                $errors['email'] = "Invalid email format";
                              }
                              
                              $password=$_POST["password"];
                              $conformpassword=$_POST["conformpassword"];
                              $reciver_email=$_POST['email'];
                              if($password != $conformpassword){
                                  $errors['password'] = "Password Conformation Doesn't Match";
                              }
                              
                             
                              if(!array_filter($errors)){
                                  
                                  
                                    $token=rand(10000,99999);
                                      $subject="Verification ";
                                      $sender_mail="consultancynepal79@gmail.com";
                                      $header="From:$sender_mail";
                                      $body="
                                        Hello, <h1>$name</h1>
                                        
                                        We have received a Code  to  verification for your account.Your Code is <b><h2>$token</h2></b>, please ignore this message.
                                         
                                       
                                         
                                        If you have any questions or concerns, please don't hesitate to contact our customer support team.
                                        
                                        Thank you,<br>
                                        
                                        [Consultancy Nepal]
                 
                                      ";
                                      $mailHead = implode("\r\n", [
                                          "MIME-Version: 1.0",
                                          "Content-type: text/html; charset=utf-8"
                                        ]);
                                         if(mail($reciver_email,$subject,$body,$mailHead)){
                         
                                                  
                                        if($db->Insert("recover_password",["email"=>$_POST["email"],"token"=>$token])){
                                                      
                                                      
                                        $_SESSION["verify_email"] =$reciver_email;
                                        $_SESSION["verify_name"]=$_POST["name"];
                                        $_SESSION["verify_username"]=$_POST["username"];
                                        $_SESSION["verify_gender"]=$_POST["gender"];
                                        $_SESSION["verify_password"]=$_POST["password"];
                                    
                                        
                                                   
                                    echo '<script type="text/javascript">';
                                    echo 'window.location.href="https://www.consultancynepal.com/recover/consultancy_email_verification.php";';
                                    echo "</script>";
                                                      
                                                  }
                         
                        
                                        }
        
                                    
                                    
                                    
                               
                                        
                                           
                                    
                              }
                        
    
                    }
                    
                }
                
?>
<main>
    <div class="container">
        <?php
        if(isset($_SESSION["isvirify"])){
        ?>
        <div class="alert alert-success" role="alert">
           <?=$_SESSION["isvirify"]?>
        </div>
        <?php
        }
        ?>
        
    </div>
  <div class="container mt-5 mb-5">
       <?=$_SESSION["isvirify"]?>
        <form action="" method="Post" class="row g-3 needs-validation" novalidate>
        <div class="row">
          <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Name <span class="text-danger"><?php
                           if(isset($errors["name"])){
                               echo $errors["name"];
                           }
                           ?></span></label>
            <input type="text" name="name" value="<?=$old['name']?>" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Username<span class="text-danger"><?php
                           if(isset($errors["username"])){
                               echo $errors["username"];
                           }
                           ?></span></label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text"  name="username"   value="<?=$old['username']?>" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
           <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Email<span class="text-danger"><?php
                           if(isset($errors["email"])){
                               echo $errors["email"];
                           }
                           ?></span></label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="email"  name="email"   value="<?=$old['email']?>" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please choose a Email.
              </div>
            </div>
          </div>
            
        </div>
         <div class="row">
             
          <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Gender<span class="text-danger"><?php
                           if(isset($errors["gender"])){
                               echo $errors["gender"];
                           }
                           ?></span></label>
            <select class="form-select"  name="gender"  id="validationCustom04" required>
              <option selected value="0">Select...</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
             
          </div>
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Password<span class="text-danger"><?php
                           if(isset($errors["password"])){
                               echo $errors["password"];
                           }
                           ?></span></label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"></span>
              <input type="password"  name="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              
            </div>
          </div>
          <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Conform Password<span class="text-danger"><?php
                           if(isset($errors["conformpassword"])){
                               echo $errors["conformpassword"];
                           }
                           ?></span></label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend"></span>
              <input type="password" name="conformpassword" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
               
            </div>
          </div>
          
          
             
         </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
  </div> 
</main>

<?php
include "footer.php";
?>
