<?php $ogimg = $base_url . "assets/images/logo.png";
include_once "header.php";
$blogData = $db->CustomQuery('SELECT * FROM test_preparation'); ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Preparation</li>
        </ol>
    </div>
</nav>
<section class="page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <?php foreach ($blogData as $blogs) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                    <div class="custom-card">
                        <figure>
                            <?php if ($blogs->image) { ?>
                                <a href="<?= $base_url ?><?= $blogs->slug ?>">
                                    <img class="lazy" alt="<?= $blogs->title ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $blogs->image ?>" width="100%">
                                </a>
                            <?php } else { ?>
                                <a href="<?= $base_url ?><?= $blogs->slug ?>">
                                    <img class="lazy" alt="<?= $blogs->title ?>" data-src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg">
                                <?php } ?>
                                </a>
                        </figure>
                        <h2 class="title"> <a href="<?= $base_url ?><?= $blogs->slug ?>">
                                <?= $blogs->title ?>
                            </a></h2>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>