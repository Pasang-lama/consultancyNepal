<?php 
 
$aboutus = $db->CustomQuery("SELECT * FROM abouts");
require_once "header.php";
foreach ($aboutus as $data) {
?>
    <nav class="breadcrumb breadcrumb-bg">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data->title ?></li>
            </ol>
        </div>
    </nav>

    <section class="about-us-section page-content my-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="date-title">
                        <h1 class="title"><?= $data->title; ?></h1>
                    </div>
                    <div class="text-document-content mt-3">
                        <?= $data->description; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <figure class="about-us-cover">
                        <?php if (isset($data->image)) { ?>
                            <img class="lazy" alt="<?= $data->title; ?>" data-src="<?=$base_url?>cnbackend/public/<?= $data->image; ?>">
                        <?php } ?>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Article",
            "headline": "About us",
            "image": "http://localhost/Consultancy-Nepal/cnbackend/public/uploads/about/IMG-642019ce4cd294.59222384.webp",
            "publisher": {
                "@type": "Organization"
            },
            "description": "Every year many students leave the Country to study abroad at foreign Colleges and Universities. This is a path-breaking moment of their life to leave their families behind and go to foreign countries for the first time. In Nepal, students seek help from various education Consultancies which provide them the required amount of support by giving them a platform to make wise and informed decisions about foreign education standard requirements and essentials. As a result, students are well prepared and fulfill every requirement methodically and with a lot of zeal right before they leave for their abroad studies. The Consultancy Nepal website is a platform to find the names and services of different education Consultancies operating inside Nepal for reaching different destinations."
        }
    </script>
<?php
}
include "footer.php"; ?>