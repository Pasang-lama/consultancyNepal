<?php session_start();
if (!isset($_SESSION["useri"])) {
    $_SESSION['messages']="Please Login To Go Further";
                echo "<script>";
            echo "window.location.href='https://www.consultancynepal.com/consultancys-end/authentication'";
            echo "</script>";
            die;
}
include_once "../connections/database.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.css">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link rel="stylesheet" href="N/css/style.css"> -->

    <link rel="stylesheet" href="assets/css/own.css">
    <link rel="stylesheet" href="assets/css/datatable.css">
    <!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
    <title>CN Members Portal</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">CN Members Portal</a>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
 
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-fw fa-user-circle"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> <i class="fas fa-user mr-2"></i><?=$_SESSION['usernames']?></h5>
                                </div>
                                <a class="dropdown-item" href="change_pass.php?uid=<?=$_SESSION['useri']+22335?>"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <?php

?>