<?php
require_once "database/Database.php";
$db = Database::Instance();
$data = $db->CustomQuery(
    "SELECT * FROM countries WHERE country_slug='$getSlug'"
);
$getData = $data[0];
$country_id=$getData->id;
$rightSiteData = $db->CustomQuery("SELECT * FROM countries");
$title = $getData->meta_title;
$content = $getData->meta_description;
$contryconsultancy = $db->CustomQuery(
    "SELECT * FROM consultancy_pages JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id AND country_id='$getData->id'"
);
$img = $getData->image;
include "header.php";
?>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<section class="banner position-relative">
    <div class="black"></div>
    <?php if (
    $getData->image
) { ?><img alt="<?= $getData->country_name ?>" src="<?= $base_url ?>cnbackend/public/<?= $getData->image ?>"
        width="100%">
    <?php } else { ?><img alt="<?= $getData->country_name ?>"
        src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" width="100%">
    <?php } ?>

    <div class="breadcrum position-absolute d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-1">Study In <span>
                <?= $getData->country_name ?>
            </span></h1>
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $getData->country_name ?>
            </li>
        </ol>
    </div>
</section>


<section class="content py-lg-5 py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">
                            <?= $getData->country_name ?>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">Top University</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <h2 class="pt-3">
                            <?= $getData->country_name ?>
                        </h2>
                        <p>
                            <?= $getData->description ?>
                        </p>
                    </div>
                    <div class="tab-pane fade country" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">

                        <div class="row">
                            <div class="col-md-6">

                                <?php
                                
                                 $countrylocation=$db->CustomQuery("SELECT * FROM `location` WHERE country_id='$country_id'");
                                 
                                 foreach($countrylocation as $data){
                                     $location_id=$data->location_id;
                                
                                
                                ?>
                                <h3 class="mt-3"><?=$data->location_name?></h3>
                                <ul>
                                    <?php 
                                                
                                                $countryUniversity=$db->CustomQuery("SELECT * FROM location JOIN university ON university.location_id=location.location_id  WHERE location.location_id='$location_id' LIMIT 10
                    ");
                                                foreach($countryUniversity as $data){
                                                
                                                ?>
                                    <li class="mx-3" style="list-style-type: circle;"><?=$data->university_name?></li>

                                    <?php
                                                }
                                                ?>
                                </ul>
                                <?php
                                 }
                                ?>


                            </div>
                            <div class="col-md-6">
                                <h3 class="mt-3">Number of Nepali Student</h3>
                                <table>
                                    <tr>
                                        <th>University</th>
                                        <th>Student</th>
                                    </tr>
                                    <?php
                                    $universityStudent=$db->CustomQuery("SELECT * FROM location JOIN university ON university.location_id=location.location_id WHERE country_id='$country_id'");
                                    foreach($universityStudent as $data){
                                    ?>
                                    <tr>
                                        <td><?=$data->university_name?></td>
                                        <td><?=$data->total_nepali_student?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>


                            </div>

                        </div>

                    </div>
                </div>
                <?php
            $count = 1;
            $cb = 1;
            $countryContent = $db->CustomQuery(
                "SELECT * FROM country_contents WHERE country_id='$getData->id'"
            );
            foreach ($countryContent as $cData){
                $r = fmod($count, 2);
                if ($r == 1) {
                    if (
                        $cb == 5
                    ) { ?>
                <div id="faq-redirect"></div>
                <?php } ?>
                <div class="con-box p-4 my-4 rounded-3 section-bg">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="title">
                                <?= strip_tags($cData->title
) ?>
                            </h3>
                            <p>
                                <?= strip_tags(
    $cData->intro_text
) ?>
                            </p>
                            <a href="<?=$base_url?><?=$getData->country_slug?>/<?=$cData->slug?>"
                                class="btn main-btn">Read more</a>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <img class="lazy" alt="" data-src="<?= $cData->image !=
0
    ? " {$base_url}cnbackend/public/{$cData->image}"
                            : "{$base_url}cnbackend/public/uploads/noimage/noimage.jpg" ?>" width="100%">
                        </div>
                    </div>
                </div>
                <?php $cb =
    $cb + 1;
    } else {
         ?>


                <div class="con-box p-4 my-4 rounded-3 section-bg-orange">
                    <div class="row">
                        <div class="col-lg-4 d-none d-lg-block">
                            <img class="lazy" alt="" data-src="<?= $cData->image !=
0
    ? " {$base_url}cnbackend/public/{$cData->image}"
                            : "{$base_url}cnbackend/public/uploads/noimage/noimage.jpg" ?>" width="100%">
                        </div>
                        <div class="col-lg-8">
                            <h3 class="title">
                                <?= strip_tags($cData->title
) ?>
                            </h3>
                            <p>
                                <?= strip_tags(
    $cData->intro_text
) ?>
                            </p>
                            <a href="<?=$base_url?><?=$getData->country_slug?>/<?=$cData->slug?>"
                                class="btn main-btn">Read more</a>
                        </div>
                    </div>
                </div>
                <?php
    }
    $count = $count + 1;
            }
    ?>




            </div>

            <div class="col-lg-3 side-bar d-none d-lg-block">
                <div class="position-sticky">
                    <div class="table-content mb-4 p-4">
                        <span>About <?=$getData->country_name ?></span>
                        <ul>
                            <?php foreach (
    $countryContent
    as $cData1
): ?>

                            <li><a href="<?=$base_url?><?=$getData->country_slug?>/<?=$cData1->slug?>"><i
                                        class="fa-solid fa-angles-right"></i>&nbsp;&nbsp;
                                    <?= $cData1->title ?>
                                </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-3 pt-3 mb-3 consultancy-carousel">
    <div class="container">
        <div class="row">
            <h2>List of Consultancy for
                <?=$getData->country_name?>
            </h2>
            <div class="con-slider">
                <?php foreach (
    $contryconsultancy
    as $clist
): ?>
                <div class="con-slider-list" style="height:280px;">
                    <div class="con-slider-image">
                        <a href="<?php
echo $base_url.$clist->consultancy_slug; ?>"><img class="lazy" alt="error"
                                data-src="<?=$base_url?>cnbackend/public/<?= $clist->consultancy_logo ?>"
                                width="100%"></a>
                    </div>
                    <div class="con-slider-title"><a href="<?php
echo $base_url.$clist->consultancy_slug;?>" style="text-decoration:none;color:#000">
                            <?php echo $clist->consultancy_name; ?>
                        </a></div>
                </div>
                <?php endforeach; ?>
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
<style>
.side-content .fa-sharp {
    font-size: 10px
}
</style>

<script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "BlogPosting",
    "author": [{
        "@type": "Organization",
        "name": "consultancy nepal"
    }],
    "headline": "<?=$title?>",
    "image": "<?=$base_url?>cnbackend/public/<?= $getData->image?>",
    "publisher": {
        "@type": "Organization"
    },
    "description": "<?=$content?>"
}
</script>
<?php include "footer.php"; ?>