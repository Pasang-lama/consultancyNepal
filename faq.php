<?php 
$faqsdata = $db->CustomQuery("SELECT * FROM faqs");
$faqsof = $db->CustomQuery("SELECT countries.country_name,countries.country_slug FROM country_faqs INNER JOIN countries ON country_faqs.faq_of=countries.id join rank_country on countries.id = rank_country.country_id group by countries.id order by rank_country.rank asc ");
require_once "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Faq</li>
        </ol>
    </div>
</nav>
<section class="my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-9">
                <h1 class="mb-4 title">Faq of Consultancy Nepal</h1>
                <div class="accordion" id="faq-accordion">
                    <?php foreach ($faqsdata as $faqs) {
                        $id_num = $faqs->id; ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?= $id_num ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $id_num ?>" aria-expanded="true" aria-controls="collapse-<?= $id_num ?>">
                                    <?= $faqs->question ?>
                                </button>
                            </h2>
                            <div id="collapse-<?= $id_num ?>" class="accordion-collapse collapse <?= ($id_num == 1) ? 'show' : ' ' ?> " aria-labelledby="heading-<?= $id_num ?>" data-bs-parent="#faq-accordion">
                                <div class="accordion-body text-document-content">
                                    <?= $faqs->answer ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="aside-content-link realted-faq">
                    <div class="heading"><span>Related Faq</span></div>
                    <ul>
                        <?php $datas = array();
                        foreach ($faqsof as $data) {
                            if (!(in_array("$data->country_name", $datas))) {
                                $datas[] = $data->country_name; ?><?php } ?>
                        <li>
                            <a href="<?= $data->country_slug ?>#faq-redirect"><i class="fa-solid fa-angles-right"></i>
                                Faq of <?= $data->country_name ?>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>