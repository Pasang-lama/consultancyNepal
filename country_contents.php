<?php
$datacountry = $db->CustomQuery("SELECT * FROM countries WHERE country_slug='$country'");
$cids = 0;
foreach ($datacountry as $tub) {
    $cids = $tub->id;
}
$data = $db->CustomQuery("SELECT * FROM country_contents WHERE slug='$getSlug' and country_id=$cids");
$country_contentData = $data[0];
$countrylist = $db->CustomQuery("SELECT * FROM countries");
require_once "header.php";
?>
<?php
$countryn = "";
foreach ($datacountry as $pub) {
    $countryn = $pub->country_name;
    $countryslug = $pub->country_slug;
}
$countryn = strtolower($countryn);
?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $base_url ?><?= $countryn ?>"><?= $datacountry[0]->country_name; ?></a></li>
            <?php foreach ($data as $countryContent) { ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $countryContent->title; ?>
                </li>
            <?php } ?>
        </ol>
    </div>
</nav>

<section class="page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-9">
            <div class="date-title">
                    <div class="title"><?= $countryContent->title ?></div>
                </div>
                <div class="text-document-content mt-5">
                     <?php echo $countryContent->description; ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="aside-content-link realted-faq">
                    <div class="heading"><span>People Also See</span></div>
                    <ul>
                            <?php
                            $countryContent1 = $db->CustomQuery("SELECT * FROM country_contents WHERE country_id='$cids'");

                            foreach ($countryContent1 as $cData1) : ?>
                                <?php $contry_name = $countryn; ?>
                                <li><a href="<?= $base_url ?><?= $countryslug . '/' . $cData1->slug ?>"><i class="fa-solid fa-angles-right"></i>
                                        <?= strip_tags($cData1->title) ?>
                                    </a></li>
                            <?php endforeach; ?>

                        </ul>
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
                <iframe src="https://www.youtube.com/embed/TjszbFXbTbo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BlogPosting",
        "headline": "<?= $country_contentData->meta_title ?>",
        "image": "<?= $base_url ?>cnbackend/public/<?= $country_contentData->image ?>",
        "publisher": {
            "@type": "Organization"
        },
        "mainEntityOfPage": "",
        "description": "<?= $country_contentData->meta_description ?>"
    }
</script>

<?php include "footer.php"; ?>