<?php
$sidebar_data=$db->CustomQuery('SELECT * FROM contents LIMIT 7');
$data=$db->CustomQuery("SELECT * FROM contents WHERE slug='$getSlug'");
$contentData=$data[0];$title=$contentData->meta_title;
$content=$contentData->meta_description;
$img=$contentData->image;
require_once "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=$base_url?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$contentData->title?></li>
        </ol>
    </div>
</nav>

<section class=" page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="date-title">
                <span class="date"><i class="fas pe-2 fa-calendar-week"></i><?=dateConvert(substr($contentData->created_at,0,10))?></span>
                    <h1 class="title"><?=$contentData->title?></h1>
                </div>
                <figure class="cover-image">
                    <?php if($contentData->image==null){ ?>
                    <img class="lazy" alt="<?=$contentData->title?>"
                        data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg"><?php }else{ ?>
                    <img class="lazy" alt="<?=$contentData->title?>"
                        data-src="<?=$base_url?>cnbackend/public/<?=$contentData->image?>">
                    <?php } ?>
                </figure>
                <div class="text-document-content">
                    <?=$contentData->description?>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="aside-content-link aside-news-blog">
                    <div class="heading"><span>Blogs</span></div>
                    <ul class="blog-news-wrapper">
                        <?php foreach($sidebar_data as$sidebar_content): ?>
                        <li>
                            <div class="aside-blog-news-card">
                                <div class="blog-news-cover">
                                    <figure>
                                        <?php if($sidebar_content->image==null){ ?>
                                        <img class="lazy" alt="<?=$sidebar_content->title?>"
                                            data-src="<?=$base_url?>cnbackend/public/uploads/noimage/noimage.jpg"><?php }else{ ?>
                                        <img class="lazy" alt="<?=$sidebar_content->title?>"
                                            data-src="<?=$base_url?>cnbackend/public/<?=$sidebar_content->image?>">
                                        <?php } ?>
                                    </figure>
                                </div>
                                <div class="blog-news-details">
                                    <h3 class="blog-news-tittle">
                                        <a
                                            href="<?=$base_url?><?=$sidebar_content->slug?>"><?=$sidebar_content->title?></a>
                                    </h3>
                                    <span class="date"><i class="fas pe-2 fa-calendar-week"></i><?=dateConvert(substr($sidebar_content->created_at,0,10))?></span>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                      <a class="aside-view-all-btn" href="<?=$base_url?>blog"> View All Blogs <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
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
                <!--<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>-->
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

<script defer>
var h1 = [],
    id = 0,
    func = document.getElementById("sap");
h1 = document.querySelectorAll("h2"), console.log(h1), h1.forEach(e => {
    e.setAttribute("id", "hh-" + id), func.innerHTML +=
        `<li><a href='#hh-${id+1}'>${h1[id].innerText}</a></li>`, console.log(h1[id].innerText), id++
}), console.log(h1);
</script>
<style>
.blog-inner .hero-image img {
    height: 400px;
    object-fit: cover
}

.side-content .fa-sharp {
    font-size: 10px
}
</style>

<?php include "footer.php"; ?>