<?php
// session_start();
// if(!isset($_SESSION["username"])){
//     header("location:{$base_url}");
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// }
// else{
//   if($_SESSION["usertype"]!="admin"){
//     header("location:database\actions\login\logout.php");
//   }
// }
// echo $_SESSION['username'];
$base_url="https://www.consultancynepal.com/cnbackend/";
include "../../../database/database.php";
include "../../../database/tables.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/font-awesome/css/all.min.css ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css ">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.addons.css ">
 
  <link rel="stylesheet" href="../../../assets/css/style.css ">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

  <style>
   *{
      font-family:Nunito;
      font-size:15px;
       }
    
    .link{
  color:black;
  text-decoration:none;
}
.link:hover{
    color:pink;
    text-decoration:none;
}
 


 
    </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 sticky-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard"><img src="../../../public/uploads/logo/logo.png" alt="logo" style="height:70px; "/></a>
         
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
         
        <ul class="navbar-nav navbar-nav-right">
           
           
          
          <li class="nav-item nav-profile dropdown">
            
          <a href="database\actions\login\logout.php" style="text-decoration:none;">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
</div>
    <div class="container-fluid page-body-wrapper">
       
    
       