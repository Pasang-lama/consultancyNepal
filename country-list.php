<?php 
$countryData = $db->CustomQuery('select * from countries join rank_country on countries.id = rank_country.country_id order by rank_country.rank asc ');
include "header.php"; ?>

<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Country</li>
        </ol>
    </div>
</nav>

<section class="page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <?php foreach ($countryData as $country) : ?>
                <div class="col-lg-3 col-md-4 col-sm-12 ">
                    <div class="custom-card ">
                        <figure>
                            <?php if ($country->image) : ?>
                                <a href="<?= $country->country_slug ?>">
                                    <img class="lazy" alt="<?= $country->country_name ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $country->image ?>" width="100%">
                                </a>
                            <?php else : ?>
                                <a href="<?= $country->country_slug ?>">
                                    <img class="lazy" alt="<?= $country->country_name ?>" data-src="<?= $base_url ?>cnbackend/public/noimage/noimage.jpg" width="100%">
                                </a>
                            <?php endif; ?>
                        </figure>
                        <h3 class="title"> <a href="<?= $base_url ?><?= $country->country_slug ?>">
                                <?= $country->country_name ?>
                            </a></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>