<?php $ogimg = $base_url . "assets/images/logo.png";
include_once "header.php";
$Eventslist = $db->CustomQuery('SELECT * from events where status=1 ORDER BY id DESC'); ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
    </div>
</nav>
<section class="my-5 page-content">
    <div class="container">
        <div class="date-title">
            <div class="heading-filter-wrapper">
                <h1 class="title">Our <span>Events</span></h1>
                <div class="filter-wrapper">
                    <div class="filter-item">
                        <select class="form-select testPreparation" name="forCountryWiseFilter">
                            <option value="none">Select Country</option>
                            <option value="">USA</option>
                            <option value="">China</option>
                            <option value="">India</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mt-2">
            <?php $count = 0;
            foreach ($Eventslist as $data) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="blog-news-card">
                        <div class="blog-news-cover">
                            <figure>
                                <a href="<?= $base_url ?><?= $data->slug ?>">
                                    <?php if ($data->image != "") { ?>
                                        <img class="lazy" alt="<?= $data->title ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>">
                                    <?php } else { ?>
                                        <img class="lazy" alt="<?= $data->title ?>" data-src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg">
                                    <?php } ?>
                                </a>
                            </figure>
                        </div>
                        <div class="blog-news-details">
                            <h3 class="blog-news-tittle">
                                <a href="<?= $base_url ?><?= $data->slug ?>"><?= $data->title ?></a>
                            </h3>
                            <span class="date"><?= dateConvert($data->date) ?></span>
                            <a class="readmore" href="<?= $base_url ?><?= $data->slug ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

        </div>
    </div>
</section>

<?php include "footer.php"; ?>