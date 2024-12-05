<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
        <title><?php echo $title; ?></title>
        <link href="assets/vendors/iconfonts/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
        <link href="assets/vendors/css/vendor.bundle.base.css" rel="stylesheet">
        <link href="assets/vendors/css/vendor.bundle.addons.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <!--<link href="http://www.urbanui.com/" rel="shortcut icon">-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: Nunito;
                font-size: 15px
            }

            .link {
                color: #000;
                text-decoration: none
            }

            .link:hover {
                color: pink;
                text-decoration: none
            }
            #content-title-check{
                width:300px;
            }
            
            #ImportBtn {
              font-family: calibri;
              width: 100px;
              /*padding:10px;*/
              -webkit-border-radius: 5px;
              -moz-border-radius: 5px;
              text-align: center;
              cursor: pointer;
            }
            .active-btn{
                border-radius:100px;
                height:10px;
                width:2px;
            }
             
        </style>
    </head>
    <body>
        <div class="container-scroller">
            <nav class="d-flex col-12 col-lg-12 default-layout-navbar flex-row navbar p-0 sticky-top">
                <div class="d-flex align-items-center justify-content-center navbar-brand-wrapper text-center"><a href="dashboard" class="brand-logo navbar-brand">
                     <?php
                        require_once "database/database.php";require_once "database/tables.php";$db=Database::Instance(); 
                         $setting=$db->CustomQuery("SELECT * FROM `settings`");
                        ?>
                        <?php foreach($setting as $key=>$data){ ?>
                         <?php if($data->company_logo){ ?><img alt="Image Can't Load"src="<?=$base_url?>public/<?=$data->company_logo?>" style="height:70px" class="rounded" style="border-radius:100px;"><?php }else{ ?><img alt="Image Can't Load"src="<?=$base_url?>/images/noimage/noimage.jpg" height="100px" width="100px" style="border-radius:100px;"><?php } ?>
                        <?php
                        }
                        ?>
                   
                    </a>
                    </div>
                <div class="d-flex align-items-stretch navbar-menu-wrapper"><button class="navbar-toggler navbar-toggler align-self-center" data-toggle="minimize" type="button"><span class="fas fa-bars"></span></button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li>
                        <?php
                        require_once "database/database.php";require_once "database/tables.php";$db=Database::Instance(); 
                         $adminprofile=$db->CustomQuery("SELECT * FROM `settings`");
                        ?>
                        <?php foreach($adminprofile as $key=>$data){ ?>
                         <?php if($data->admin_profile){ ?><img alt="Image Can't Load"src="<?=$base_url?>public/<?=$data->admin_profile?>" height="80px" width="80px" style="border-radius:100px; margin-top:10px;"><?php }else{ ?><img alt="Image Can't Load"src="<?=$base_url?>/images/noimage/noimage.jpg" height="80px" width="80px" style="border-radius:100px;"><?php } ?>
                        <?php
                        }
                        ?>
                        </li>
                        <li class="dropdown nav-item nav-profile"><a href="database\actions\login\logout.php" style="text-decoration:none"><i class="fas fa-power-off text-primary"></i> Logout</a></li>
                    </ul><button class="navbar-toggler align-self-center d-lg-none navbar-toggler-right" data-toggle="offcanvas" type="button"><span class="fas fa-bars"></span></button>
                </div>
            </nav>
        </div><div class="container-fluid page-body-wrapper">