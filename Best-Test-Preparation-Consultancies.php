<?php
require_once 'database/Database.php';
$datas = $db->CustomQuery("select * from `Best-Test-Preparation-Consultancies` where slug='$url[1]'");
require_once 'header.php';
$content = $datas[0]->meta_description;
$title = $datas[0]->meta_title;
$data = $datas[0];
$parent_table = $db->CustomQuery("select tables.table_name,page_types.slug from page_types join tables on page_types.tables=tables.id where page_types.id=$data->page_type_id");
$table = $parent_table[0]->table_name;
$from = $parent_table[0]->slug;
$child_data = $db->CustomQuery("SELECT consultancies.* FROM consultancy_test_prep JOIN consultancies on consultancy_test_prep.cid = consultancies.id    WHERE consultancy_test_prep.tpid =$data->extras  ORDER BY consultancy_test_prep.rank ASC;");
?>
<nav class='breadcrumb breadcrumb-bg'>
    <div class='container'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href='<?= $base_url ?>'><i class='fa-solid fa-house'></i></a></li>
            <li class='breadcrumb-item active' aria-current='page'><?= $data->title ?></li>
        </ol>
    </div>
</nav>

<section class='about-us-section page-content my-5'>
    <div class='container'>
        <img src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>">
        <div class='date-title'>
            <h1 class='title'><?= $data->title ?></h1>
        </div>
        <div class='text-document-content mt-3'>
            <?= $data->description ?>
        </div>
        <div>
            <?php foreach ($child_data as $consultancy) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="consultancy-card">
                        <figure>
                            <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>">
                                <?php if ($consultancy->consultancy_logo) { ?>
                                    <img alt="<?= $consultancy->consultancy_name ?>" src="<?= $base_url ?>cnbackend/public/<?= $consultancy->consultancy_logo ?>">
                                <?php } else { ?>
                                    <img alt="<?= $consultancy->consultancy_name ?>" src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg">
                                <?php } ?>
                            </a>
                        </figure>
                        <div class="consultancy-details ">
                            <div class="rating d-none">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-star fa-regular"></i>
                                <i class="fa-star fa-regular"></i>
                            </div>
                            <h2 class="consultancy-title">
                                <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>"><?= $consultancy->consultancy_name ?></a>
                            </h2>
                            <div class="contact-info">
                                <ul>
                                    <li><i class="fa-solid fa-phone"></i>
                                        <?php
                                        if ($consultancy->consultancy_phone != "") {
                                            $phoneNumberArray = explode(', ', $consultancy->consultancy_phone);
                                            foreach ($phoneNumberArray as $phoneNumber) {
                                                if ($phoneNumber[0] == '0' && $phoneNumber[1] == "1") {

                                        ?>

                                                    <a href="tel:<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
                                                <?php
                                                } else {

                                                ?>
                                                    <a href="tel:01-<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
                                                <?php

                                                }
                                                ?>

                                                <?php }
                                        } elseif ($consultancy->consultancy_mobile != "") {
                                            $phoneNumberArray = explode(', ', $consultancy->consultancy_mobile);
                                            foreach ($phoneNumberArray as $phoneNumber) {
                                                if ($phoneNumber[0] == '0' && $phoneNumber[1] == "1") {

                                                ?>

                                                    <a href="tel:<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
                                                <?php
                                                } else {

                                                ?>
                                                    <a href="tel:<?= $phoneNumber ?>"><?= $phoneNumber ?></a>
                                            <?php

                                                }
                                            }
                                        } else {

                                            ?>
                                            <span>No Number Available</span>
                                        <?php

                                        } ?>
                                    </li>
                                    <li><i class="fa-solid fa-location-dot"></i><?= $consultancy->consultancy_address ?></li>
                                </ul>
                            </div>
                            <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>" class="view-details">View Details</a>
                            <button type="button" class="ask-question-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="askQuestionclick(<?= $consultancy->id; ?>)">Enquire Now</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
require_once 'footer.php';

?>