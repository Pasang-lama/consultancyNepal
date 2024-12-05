<?php
require_once 'database/Database.php';
$datas = $db->CustomQuery("select * from `Best-Consultancy-Countrywise` where slug='$url[2]'");
$data = $datas[0];
$content = $datas[0]->meta_description;
$title = $datas[0]->meta_title;
require_once 'header.php';
$parent_table = $db->CustomQuery("select tables.table_name,page_types.slug from page_types join tables on page_types.tables=tables.id where page_types.id=$data->page_type_id");
$table = $parent_table[0]->table_name;
$from = $parent_table[0]->slug;
$child_data = $db->CustomQuery("SELECT consultancies.*,consultancy_pages.details as details FROM rank_consultancy JOIN consultancies on rank_consultancy.consultancy_id = consultancies.id JOIN consultancy_pages on consultancies.id=consultancy_pages.consultancy_id WHERE consultancy_pages.country_id =$data->extras  ORDER BY rank_consultancy.rank ASC");
?>
<nav class='breadcrumb breadcrumb-bg'>
    <div class='container'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href='<?= $base_url ?>'><i class='fa-solid fa-house'></i></a></li>
            <li class='breadcrumb-item active' aria-current='page'><?= $data->title ?></li>
        </ol>
    </div>
</nav>
<section class='best-consultancy-page page-content my-5'>
    <div class='container'>
        <div class="row g-3">
            <div class="col-lg-9 col-md-12">
                <div class='date-title'>
                    <h1 class='title'><?= $data->title ?></h1>
                </div>
                <div class='text-document-content best-consultancy-description mt-2'>
                    <div class="block-content" id="best-consultancy-description-content">
                        <?= $data->description ?>
                    </div>
                    <button class="content-toggle-btn" aria-label="readmoreMoreBtn" data-content-target="#best-consultancy-description-content">Read More</button>
                </div>
                <div class="Business-page-block-wrapper">
                    <div class="text-document-content">
                        <h2><?= $data->title ?></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione sequi explicabo delectus facilis voluptas quod veniam dolorem, repellat praesentium adipisci.</p>
                    </div>
                    <?php
                    $i = 0;
                    foreach ($child_data as $consultancy) { ?>
                        <div class="consultancy-content-box">
                            <figure>
                                <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>">
                                    <?php if ($consultancy->consultancy_logo) { ?>
                                        <img alt="<?= $consultancy->consultancy_name ?>" src="<?= $base_url ?>cnbackend/public/<?= $consultancy->consultancy_logo ?>">
                                    <?php } else { ?>
                                        <img alt="<?= $consultancy->consultancy_name ?>" src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg">
                                    <?php } ?>
                                </a>
                            </figure>
                            <div class="content-details">
                                <h2 class="consultancy-title">
                                    <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>"><?= $consultancy->consultancy_name ?> <i class="fa-solid verfied fa-circle-check"></i></a>
                                </h2>
                                <div class='text-document-content mt-1'>
                                    <div class="block-content" id="Business-block-content-<?= $i ?>">
                                        <?= $consultancy->details ?>
                                    </div>
                                    <div class="Button-wrapper">
                                        <div class="custom-btn">
                                            <a href="<?= $base_url; ?><?= $consultancy->consultancy_slug; ?>" class="btn btn-md ">View Profile</a>
                                        </div>
                                        <button class="content-toggle-btn" aria-label="readmoreMoreBtn" data-content-target="#Business-block-content-<?= $i ?>">Read More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $i = $i + 1;
                    } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="aside-content-link realted-faq">
                    <div class="heading"><span>Related Article</span></div>
                    <ul>
                        <li>
                            <a href="#"><i class="fa-solid fa-angles-right"></i>
                                Best consultancy for UK in Nepal
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-angles-right"></i>
                                Best consultancy for USA in Nepal
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-angles-right"></i>
                                Best consultancy for China in Nepal
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once 'footer.php';
?>