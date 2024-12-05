<?php $sidebar_data = $db->CustomQuery("SELECT * FROM test_preparation where slug!='$getSlug'  LIMIT 20");
$data = $db->CustomQuery("SELECT * FROM test_preparation WHERE slug='$getSlug'");
$contentData = $data[0];
$title = $contentData->meta_title;
$content = $contentData->meta_description;
$img = $contentData->image;
require_once "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $base_url ?>test-preparation" style="text-decoration:none">Test
                    Preparation</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $contentData->title ?></li>
        </ol>
    </div>
</nav>
<section class=" page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-9">
                <div class="date-title">
                    <h1 class="title"><?= $contentData->title ?></h1>
                </div>
                <figure class="cover-image">
                    <?php if ($contentData->image == null) { ?>
                        <img class="lazy" alt="<?= $contentData->title ?>" data-src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg"><?php } else { ?>
                        <img class="lazy" alt="<?= $contentData->title ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $contentData->image ?>">
                    <?php } ?>
                </figure>
                <div class="text-document-content">
                    <?= $contentData->description ?>
                </div>
            </div>
            <div class="col-lg-3 side-content">
                <div class="aside-content-link realted-faq">
                    <div class="heading"><span>Test Preparations</span></div>
                    <ul><?php foreach ($sidebar_data as $sidebar_content) : ?><li><a href="<?= $base_url ?><?= $sidebar_content->slug ?>"><i class="fa-solid fa-arrow-right fa-sharp"></i><?= $sidebar_content->title ?></a></li>
                        <?php endforeach; ?></ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>