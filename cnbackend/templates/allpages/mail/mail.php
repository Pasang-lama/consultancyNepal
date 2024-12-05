<?php include "layouts/header.php";
include "layouts/aside.php";
require_once "database/database.php";
require_once "database/tables.php";
$db=Database::Instance(); ?>
<?php $maildata=$db->CustomQuery("SELECT * FROM `contacts` ORDER BY `id` DESC"); ?>
<div class="main-panel"><div class="content-wrapper"><?php include("infos/message.php") ?><div class="page-header"><h3 class="page-title">Show Mail</h3><nav aria-label="breadcrumb">
    <ol class="breadcrumb"><li class="breadcrumb-item"><a class="link"href="<?=$base_url?>">Dashboard</a></li></ol></nav></div>
    <div class="card"><div class="card-body">
        <h4 class="card-title">show mail</h4><div class="row">
            <div class="col-12"><div class="table-responsive">
                <table class="table"id="order-listing"><thead><tr><th>SN</th><th>Name</th><th>Email</th><th>Subject</th><th>Actions</th></tr></thead><tbody><?php foreach($maildata as $key=>$data): ?><tr><td><?=++$key?></td><td><?=$data->name?></td><td><?=$data->email?></td><td><?=$data->subject?></td> 
                <td> <a class="link btn btn-outline-primary delete-mail"href="#"data-did="<?=$data->id?>"><i class="fa-solid fa-trash"></i></a>
                <a class="link btn btn-outline-primary" href="<?=$base_url?>templates/allpages/mail/reply_mail.php?id=<?=$data->id?>"><i class="fa-sharp fa-solid fa-reply"></i></a>
                </td></tr><?php endforeach; ?></tbody></table></div></div></div></div></div></div><?php include "layouts/footer.php"; ?>