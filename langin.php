<?php 
$data = $db->CustomQuery("SELECT * FROM pages WHERE slug='$getSlug'");
$langauage_centers=$db->CustomQuery("SELECT * from pages where status=1 and slug!='$getSlug' and page_type_id=3 ORDER BY id DESC limit 7"); 
$row = $data[0];
$title = $row->meta_title;
$content = $row->meta_description;
require_once "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $base_url ?>language-center" style="text-decoration:none">Language Center</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $row->title ?></li>
        </ol>
    </div>
</nav>
<section class="about-us-section page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="date-title">
                    <h1 class="title"><?php echo $row->title ?></h1>
                </div>
                <figure class="cover-image">
                    <?php if ($row->image == null || $row->image == 0) { ?><img class="lazy" data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg"><?php } else { ?>
                        <img class="lazy" data-src="<?=$base_url?>cnbackend/public/<?= $row->image ?>">
                    <?php } ?>
                </figure>
                <div class="text-document-conten ">
                    <?php echo $row->description  ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="aside-content-link aside-language-center">
                    <div class="heading"><span>Our Language Center</span></div>
                    <ul>
                        <?php foreach($langauage_centers as $data):?>
                        <li>
                            <div class="language-center-card">
                                <div class="language-center-logo">
                                    <a href="">
                                           <?php if($data->image!=""){ ?>
                                            <img class="lazy" alt="<?=$data->title?>"
                                                data-src="<?=$base_url?>cnbackend/public/<?=$data->image?>">
                                            <?php }else{ ?>
                                            <img class="lazy" alt="<?=$data->title?>"
                                                data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg">
                                            <?php } ?>
                                    </a>
                                </div>
                                <div class="language-center-details">
                                    <div class="language-center-title">
                                        <a href="<?=$data->slug?>"><?=$data->title?></a>
                                    </div>
                                    <ul>
                                        <li><i class="fa-sharp pe-1 fa-solid fa-location-dot"></i>Some where in Nepal</li>
                                        <li>
                                        <?=($data->phone=="")?'':'<li><i class="fa-solid fa-phone"></i> <a href="tel:'. $data->phone .'">
                                    '.$data->phone .'</a></li>'?>
                                            <!-- <i class="fa-solid pe-1 fa-phone-volume"></i>
                                            <a href="tel:9845076883">9845076883</a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="aside-view-all-btn" href="<?=$base_url?>language-center"> View All Language Center <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </div>
</section>
<?php include('footer.php'); ?>