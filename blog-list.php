<?php $ogimg=$base_url."assets/images/logo.png";
include_once "header.php";
$blogData=$db->CustomQuery('SELECT * FROM contents order by id desc'); ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=$base_url?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
    </div>
</nav>
<section class="py-5 blog-list">
    <div class="container">
        <div class="row gy-4">
            <?php
                $count=0;
                foreach($blogData as $blogs){
                if($count>3){
                    ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="blog-news-card">
                    <div class="blog-news-cover">
                        <figure>
                            <a href="<?=$base_url?><?=$blogs->slug?>">
                                <?php if($blogs->image){ ?>
                                <img class="lazy" alt="<?=$blogs->title?>"
                                    data-src="<?=$base_url?>cnbackend/public/<?=$blogs->image?>">
                                <?php }else{ ?>
                                <img class="lazy" alt="<?=$consultancy->consultancy_name?>"
                                    data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg">
                                <?php } ?>
                            </a>
                        </figure>
                    </div>
                    <div class="blog-news-details">
                        <h3 class="blog-news-tittle">
                            <a href="<?=$base_url?><?=$blogs->slug?>"><?=$blogs->title?></a>
                        </h3>
                        <span class="date"> <?=dateConvert(substr($blogs->created_at,0,10))?></span>
                        <a class="readmore" href="<?=$base_url?><?=$blogs->slug?>">Read More</a>
                    </div>
                </div>
            </div>
            <?php
                }
                else{
                    ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="blog-news-card">
                    <div class="blog-news-cover">
                        <figure>
                            <a href="<?=$base_url?><?=$blogs->slug?>">
                                <?php if($blogs->image){ ?>
                                <img class="lazy" alt="<?=$blogs->title?>"
                                    src="<?=$base_url?>cnbackend/public/<?=$blogs->image?>">
                                <?php }else{ ?>
                                <img class="lazy" alt="<?=$consultancy->consultancy_name?>"
                                    src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg">
                                <?php } ?>
                            </a>
                        </figure>
                    </div>
                    <div class="blog-news-details">
                        <h3 class="blog-news-tittle">
                            <a href="<?=$base_url?><?=$blogs->slug?>"><?=$blogs->title?></a>
                        </h3>
                        <span class="date"> <?=substr($blogs->created_at,0,10)?></span>
                        <a class="readmore" href="<?=$base_url?><?=$blogs->slug?>">Read More</a>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
            <?php
                  $count++;
                  } ?>

        </div>
    </div>
</section>

<!-- vide modal -->
<div class="modal video-modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white border-none">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <!-- NOTE: video src will be added from js to enable autoplay on modal open & removed on modal close to reset player -->
            <div class="ratio ratio-16x9 bg-dark rounded overflow-hidden">
                <iframe src="https://www.youtube.com/embed/TjszbFXbTbo" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- eventform modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" name="" id="" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="" id="" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="" id="" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject</label>
                        <input type="text" name="" id="" class="form-control" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Message</label>
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>
                    <button class="btn main-btn">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>