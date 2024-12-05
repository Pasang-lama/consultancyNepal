<?php 
$data=$db->CustomQuery("SELECT * FROM events WHERE slug='$getSlug'");
$side_events=$db->CustomQuery("SELECT * FROM events WHERE slug!='$getSlug' and status=1 order by id desc limit 7");
$row=$data[0];
$title=$row->meta_title;
$content=$row->meta_description;
require_once "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=$base_url?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item"><a href="<?=$base_url?>events" style="text-decoration:none">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$row->title?></li>
        </ol>
    </div>
</nav>
<section class="page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="date-title">
                    <span class="date"><i class="fas pe-2 fa-calendar-week"></i> <?= dateConvert($row->date) ?></span>
                    <div class="title"><?php echo $row->title ?></div>
                </div>
                <figure class="cover-image">
                    <?php if($row->image==null){ ?>
                    <img class="lazy"
                        data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg"><?php }else{ ?>
                    <img class="lazy" data-src="<?=$base_url?>cnbackend/public/<?=$row->image?>">
                    <?php } ?>
                </figure>
                <div class="text-document-content">
                   <?php echo $row->description  ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="aside-content-link aside-news-blog">
                    <div class="heading"><span>Other Events</span></div>
                    <ul class="blog-news-wrapper">
                        <?php foreach($side_events as $data): ?>
                        <li>
                            <div class="aside-blog-news-card">
                                <div class="blog-news-cover">
                                    <figure>

                                    <?php if($data->image!=""){ ?>
                                <img class="lazy" alt="<?=$data->title?>"
                                    data-src="<?=$base_url?>cnbackend/public/<?=$data->image?>">
                                <?php }else{ ?>
                                <img class="lazy" alt="<?=$data->title?>"
                                    data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg">
                                <?php } ?>

                                    </figure>
                                </div>
                                <div class="blog-news-details">
                                    <h3 class="blog-news-tittle">
                                        <a href="<?=$base_url?><?=$data->slug?>"><?=$data->title?></a>
                                    </h3>
                                    <span class="date"><i class="fas pe-2 fa-calendar-week"></i><?= dateConvert($data->date) ?></span>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="aside-view-all-btn" href="<?=$base_url?>events"> View All Events <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  include('footer.php'); ?>