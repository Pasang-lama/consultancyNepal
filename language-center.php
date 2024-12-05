<?php include "header.php";
$langauage_center = $db->CustomQuery("SELECT * FROM pages where page_type_id=3 and status=1 order by id desc"); ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">language Center</li>
        </ol>
    </div>
</nav>
<section class="language-center-page my-5">
    <div class="container ">
        <div class="row gy-4">
            <?php foreach ($langauage_center as $data) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="language-center-card">
                        <div class="cover">
                            <figure>
                                <?php if ($data->image == 0) : ?>
                                    <a href="<?php echo $base_url; ?><?= $data->slug ?>">
                                        <img alt="<?= $data->slug ?>" class="lazy" data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg" width="100%;">
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo $base_url; ?><?= $data->slug ?>">
                                        <img alt="<?= $data->slug ?>" class="lazy" data-src="<?=$base_url?>cnbackend/public/<?= $data->image ?>" width="100%" height="100%">
                                    </a>
                                <?php endif; ?>
                            </figure>
                        </div>
                        <div class="details">
                            <div class=" rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-star fa-regular"></i>
                                <i class="fa-star fa-regular"></i>
                            </div>
                            <h2 class="langugae-center-title"><a href="<?php echo $base_url; ?><?= $data->slug ?>"><?= $data->title ?></a></h2>
                            <div class="contact-details">
                                <ul>    
                                    <?=($data->phone=="")?'':'<li><i class="fa-solid fa-phone"></i> <a href="tel:'. $data->phone .'">
                                    '.$data->phone .'</a></li>'?>
                                    <li><i class="fa-solid fa-location-dot"></i>Somewhere in Nepal.</li>
                                </ul>
                            </div>
                            <a href="<?php echo $base_url; ?><?= $data->slug ?>" class="view-details">View Details <i class="fa-solid ps-1 fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>