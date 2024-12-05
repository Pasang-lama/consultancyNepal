<?php
session_start();

include_once "../connections/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST["login"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $datas = $db->CustomQuery("select cid,username,id,password from cn_members_info where username='$username'");


      if (!empty($datas)) {
         $user = $datas[0];
         if ($user->password == $password) {
            $_SESSION["useri"] = $user->id;
            $_SESSION["usernames"] = $user->username;
            $_SESSION["consultancy"] = $user->cid;

            $_SESSION['message'] = "Welome $user->username";
            echo "<script>";
            echo "window.location.href='https://www.consultancynepal.com/consultancys-end/dashboard'";
            echo "</script>";
            // header("Location:../dashboard/");
            die();
         } else {
            $_SESSION['messages'] = "Invalid Credentials";
            // header("Refresh:0");
         }
      }else{
         $_SESSION['messages'] = "Invalid Credentials";
         // header("Refresh:0");
      }
   }
}
include_once "header.php";
?>
<style>
   .dashboard-content {
      padding: 0px 30px 60px 30px;
   }
</style>







<div class="container-fluid mt-4">

   <div class="row ">
      <div class="col-12 ">
         <?php
         include("warn-message.php");
         include("suc_message.php"); ?>
      </div>
   </div>


   <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
         <div class="page-header">
            <h2 class="pageheader-title text-center">Login</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="row justify-content-center">

      <!-- ============================================================== -->
      <!-- validation form -->
      <!-- ============================================================== -->
      <div class="col-xl-5 col-lg-5 ">
         <div class="card">
            <h5 class="card-header">LogIn</h5>

            <div class="card-body">
               <form action="" method="POST">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2 ">
                        <label for=""><strong>Username</strong></label>
                        <input type="text" class="form-control" name="username" placeholder="enter username" required>

                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="enter password">
                        <div class="row mt-2">
                           <div style="margin-left: 14px;">
                              Show password
                           </div>
                           <div style="margin-top: 3px;margin-left:2px;">
                              <input type='checkbox' id='check'>

                           </div>
                        </div>
                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mb-2">
                        <!--<a href="forgetpass.php" class="text-success">Forget Password ? Click Here</a>-->

                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <input class="btn btn-success btn-sm" name="login" type="submit" value="Login"></input>
                        <!-- <input class="btn btn-space btn-secondary btn-sm mt-1" type="reset" value="Reset"></input> -->
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!-- ============================================================== -->
      <!-- end validation form -->
      <!-- ============================================================== -->
   </div>

</div>

<script src="assets/js/jquery.js"></script>
<script src="N/js/popper.js"></script>
<script src="N/js/bootstrap.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function() {
      $('#check').click(function() {
         //  alert($(this).is(':checked'));
         $(this).is(':checked') ? $('#pass').attr('type', 'text') : $('#pass').attr('type', 'password');
      });
   });
</script>

<!-- <script src="assets/js/own.js"></script> -->