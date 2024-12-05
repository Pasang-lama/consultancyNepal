<?php
include_once("header.php");
include_once("aside.php");

?>

<div class="row">

    <?php include "suc_message.php"; ?>
    <?php include "warn-message.php"; ?>

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="page-header">
            <h2 class="pageheader-title">Dashboard</h2>
            <div class="page-breadcrumb">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

<div class="container-fluid bg-white d-flex justify-content-center" id='main'>
    <div class="row pad-botm">
        <div class="col-md-12">


        </div>

    </div>

    <div class="row mt-3">


        <a href="enquiries.php">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
                <div class="alert alert-danger back-widget-set text-center">
                    <i class="fa fa-users fa-5x"></i>
                    <h3><?=123?></h3>
                    New Enquiries Of People 
                </div>
            </div>
        </a>


    </div>


</div>
<?php



include_once("footer.php");
?>