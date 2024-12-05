<?php
include "header_home.php";
$logo = "https://www.consultancynepal.com/cnbackend/public/uploads/setting/IMG-65b39f1a554172.78619969.webp";
$bannerData = $db->SelectAll('banners');
$countryData = $db->CustomQuery("SELECT country_name,country_slug from countries where country_name like 'a%'");
$consultancyData = $db->CustomQuery("SELECT consultancy_name,consultancy_slug from consultancies where consultancy_name like 'a%'");
$all = array_merge($countryData, $consultancyData);
$countryListfilter = $db->CustomQuery("SELECT * FROM rank_country JOIN countries ON rank_country.country_id=countries.id ORDER BY rank_country.rank ASC");
$country = $db->CustomQuery("select id,country_name as title from countries");
$cities = $db->CustomQuery("select   id , area as title from area");
$test_data = $db->CustomQuery("SELECT DISTINCT test_preparation.title,test_preparation.id as id FROM class_table JOIN test_preparation ON class_table.tid = test_preparation.id;");
$consultancy = $db->CustomQuery("select consultancies.*,area.area as ar from rank_consultancy join consultancies on rank_consultancy.consultancy_id=consultancies.id  join area on consultancies.area=area.id order by rank_consultancy.rank asc limit 4");
?>
<section class="section-bg  custom-margin custom-padding">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="heading-filter-wrapper">
                    <h3 class="title">Popular <span>Consultancy</span></h3>
                    <div class="filter-wrapper">
                        <div class="filter-item">
                            <select class="form-select popularConsuyltancyFilter" name="forCountry" onchange="displayFilteredData()" id="countryFilter">
                                <option value="none">All Country</option>
                                <?php foreach ($country as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="filter-item">
                            <select class="form-select popularConsuyltancyFilter" name="forCity" onchange="displayFilteredData()" id="cityFilter">
                                <option value="none">All City</option>
                                <?php foreach ($cities as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="row g-3" id="resultContainer">
                        <?php foreach ($consultancy as $data) : ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-6">

                                <div class="top-consultancy-video-card">
                                    <figure>
                                        <img src="<?= $base_url ?>cnbackend/public/<?= $data->consultancy_logo ?>" alt="<?= $data->consultancy_name ?>">
                                    </figure>
                                    <div class="hover-content">
                                        <h4 class="title">
                                            <a href="<?= $base_url ?><?= $data->consultancy_slug ?>"> <?= $data->consultancy_name ?></a>
                                        </h4>
                                        <ul class="contact-details">
                                            <li>
                                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                <?= $data->ar ?>
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-phone-volume"></i><?= $data->consultancy_phone ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="custom-btn btn-center">
                        <a class="btn btn-md my-3" href="">View all Consultancy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- advertisement  -->
<?php
$populatConsultancy_bottom_ads = adsFetch(6, 1, 1);
if (!empty($populatConsultancy_bottom_ads)) {
?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($populatConsultancy_bottom_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- top consultnacy  -->

<section class="tabs section-bg custom-margin custom-padding">
    <div class="container">
        <h3 class="title mb-3 ">Top <span>Consultancy</span></h3>
        <div class="row g-3">
            <?php foreach ($consultancy as $data) { ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-6">
                    <div class="top-consultancy-video-card">
                        <figure>
                            <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->consultancy_logo ?>" alt="<?= $data->consultancy_name ?>">
                        </figure>
                        <div class="hover-content">
                            <h4 class="title">
                                <a href="<?= $base_url ?><?= $data->consultancy_slug ?>"> <?= $data->consultancy_name ?></a>
                            </h4>
                            <ul class="contact-details">
                                <li><i class="fa-sharp fa-solid fa-location-dot"></i>
                                    <?= $data->ar ?>
                                </li>
                                <?php $phone = $data->consultancy_phone;
                                if ($phone) {
                                    $str_phone = (string)$phone;
                                    $first_digit = $str_phone[0];
                                    if ($first_digit != '0') {
                                        $modified_phone = '01' . $str_phone;
                                    } else {
                                        $modified_phone = $str_phone;
                                    }
                                ?>
                                    <li>
                                        <i class="fa-solid fa-phone-volume"></i>
                                        <a href="tel:<?= $modified_phone ?>"><?= $modified_phone ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="custom-btn btn-center">
                <a class="btn btn-md my-3" href="">View all Consultancy</a>
            </div>
        </div>
    </div>
</section>

<!-- advetisement  -->
<?php
$top_Consultancy_bottom_ads = adsFetch(8, 1, 1);
if (!empty($top_Consultancy_bottom_ads)) {

?>
    <section class="advertisement-section custom-margin">
        <div class="container">
            <figure>
                <?php foreach ($top_Consultancy_bottom_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>

<!-- study abroad  -->
<section class="study-abroad  custom-margin">
    <div class="container">
        <h3 class="title mb-3">Study Abroad <span>Destination</span></h3>
        <div class="Study-abroad-wrapper">
            <?php $countryList = $db->CustomQuery("SELECT countries.id ,countries.image,countries.country_slug,countries.country_name FROM `rank_country` JOIN countries ON rank_country.country_id=countries.id ORDER BY rank_country.rank ASC LIMIT 0, 5; ");
            foreach ($countryList as $data) {
            ?>
                <div class="study-abroad-card ">
                    <figure>
                        <?php if ($data->image == "") { ?>
                            <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $data->country_name ?>">
                        <?php } else { ?>
                            <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>" alt="<?= $data->country_name ?>">
                        <?php } ?>
                    </figure>
                    <div class="study-abroad-destination-name">
                        <h3 class="title"> <a href="<?= $base_url ?><?= $data->country_slug ?>">
                                <?= $data->country_name ?>
                            </a></h3>
                    </div>
                    <div class="abroad-info-link">
                        <ul>
                            <?php
                            $country_slug = $data->country_slug;
                            $cid = $data->id;
                            $country_content = $db->CustomQuery("SELECT * FROM country_contents where country_id='$cid' ORDER BY country_contents.rank ASC Limit 0,3");
                            foreach ($country_content as $data) {
                            ?>
                                <li>
                                    <a href="<?= $base_url ?><?= $country_slug ?>/<?= $data->slug ?>">
                                        <i class="fa-solid pe-1 fa-angles-right"></i>
                                        <?php echo  $data->short_title; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="custom-btn  responsive-button d-lg-none d-md-none d-sm-block">
                <a class="btn btn-md " href="<?= $base_url ?>country">View all Destinations</a>
            </div>
        </div>
        <div class="custom-btn btn-center study-abroad-btn">
            <a class="btn btn-md my-3" href="<?= $base_url ?>country">View all Destinations</a>
        </div>
    </div>
</section>
<!-- advetisement  -->
<?php
$study_abroad_bottom_ads = adsFetch(9, 1, 1);
if (!empty($study_abroad_bottom_ads)) {

?>
    <section class="advertisement-section custom-margin">
        <div class="container">
            <figure>
                <?php foreach ($study_abroad_bottom_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- Testpreparation start -->
<section class="tabs section-bg custom-margin custom-padding">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-9">
                <h2 class="title mb-3 ">Test <span>Preparation</span></h2>
                <ul class="nav nav-tabs d-none d-lg-flex" id="testPreparationClassTabs" role="tablist">
                    <?php
                    $countryDetails = $db->CustomQuery("SELECT * FROM test_preparation LIMIT 0,4;");
                    $countryList = [];
                    $countCountry = 1;
                    foreach ($countryDetails as $data) {
                        $countryList[$data->slug] = $data->id;
                        $countr[$data->slug] = $data->title;
                        if ($countCountry == 1) {
                    ?>
                            <li class="nav-item me-3" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#<?= $data->slug ?>" type="button" role="tab" aria-controls="country-tab-pane" aria-selected="true"><?= $data->title ?></button>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item me-3" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#<?= $data->slug ?>" type="button" role="tab" aria-controls="country-tab-pane" aria-selected="true"><?= $data->title ?></button>
                            </li>
                    <?php
                        }
                        $countCountry++;
                    }
                    ?>
                </ul>
                <div class="tab-content mob-aco accordion" id="testPreparationAccorion">
                    <?php
                    $count = 1;
                    foreach ($countryList as $key => $value) {
                        if ($count == 1) {
                            $countryConsultancyList = $db->CustomQuery("SELECT * FROM consultancies JOIN rank_consultancy on consultancies.id = rank_consultancy.consultancy_id JOIN consultancy_test_prep on consultancies.id = consultancy_test_prep.cid join area on consultancies.area = area.id WHERE consultancy_test_prep.tpid=$value   ORDER BY consultancy_test_prep.rank ASC Limit 0,6");
                    ?>
                            <div class="tab-pane fade show active accordion-item" id="<?= $key ?>" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                                <h2 class="accordion-header d-lg-none" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key ?><?= $value ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?= $countr[$key] ?></button>
                                </h2>
                                <div id="<?= $key ?><?= $value ?>" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent="#testPreparationAccorion">
                                    <div class="accordion-body">
                                        <div class="row g-3">
                                            <?php foreach ($countryConsultancyList as $data) { ?>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="home-consultancy-card">
                                                        <div class="Consultancy-logo">
                                                            <a href="<?= $base_url; ?><?= $data->consultancy_slug ?>">
                                                                <?php if ($data->consultancy_logo == "") { ?>
                                                                    <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $data->consultancy_name ?>">
                                                                <?php } else { ?>
                                                                    <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->consultancy_logo ?>" alt="<?= $data->consultancy_name ?>">
                                                                <?php } ?>
                                                            </a>
                                                        </div>
                                                        <div class="Consultancy-details">
                                                            <a href="<?= $base_url; ?><?= $data->consultancy_slug ?>"><span class="title"><?= $data->consultancy_name ?></span></a>
                                                            <ul></a>
                                                                <li><i class="fa-sharp fa-solid fa-location-dot"></i>&nbsp;
                                                                    <?= $data->area ?>
                                                                </li>
                                                                <?php $phone = $data->consultancy_phone;
                                                                if ($phone) {
                                                                    $str_phone = (string)$phone;
                                                                    $first_digit = $str_phone[0];
                                                                    if ($first_digit != '0') {
                                                                        $modified_phone = '01' . $str_phone;
                                                                    } else {
                                                                        $modified_phone = $str_phone;
                                                                    }
                                                                ?>
                                                                    <li>
                                                                        <i class="fa-solid fa-phone-volume"></i>&nbsp;
                                                                        <a href="tel:<?= $modified_phone ?>"><?= $modified_phone ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                            $countryConsultancyList1 = $db->CustomQuery("SELECT * FROM consultancies JOIN rank_consultancy on consultancies.id = rank_consultancy.consultancy_id JOIN consultancy_test_prep on consultancies.id = consultancy_test_prep.cid join area on consultancies.area = area.id WHERE consultancy_test_prep.tpid=$value   ORDER BY consultancy_test_prep.rank ASC Limit 0,6");
                        ?>
                            <div class="tab-pane fade accordion-item" id="<?= $key ?>" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <h2 class="accordion-header d-lg-none" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $key ?><?= $value ?>" aria-expanded="false" aria-controls="collapseTwo">
                                        <?= $countr[$key] ?>
                                    </button>
                                </h2>
                                <div id="<?= $key ?><?= $value ?>" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingTwo" data-bs-parent="#testPreparationAccorion">
                                    <div class="accordion-body">
                                        <div class="row g-3">
                                            <?php
                                            foreach ($countryConsultancyList1 as $data) { ?>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="home-consultancy-card">
                                                        <div class="Consultancy-logo">
                                                            <a href="<?= $base_url; ?><?= $data->consultancy_slug ?>">
                                                                <?php if ($data->consultancy_logo == "") { ?>
                                                                    <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $data->consultancy_name ?>">
                                                                <?php } else { ?>
                                                                    <img src="<?= $logo ?>" data-src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->consultancy_logo ?>" alt="<?= $data->consultancy_name ?>">
                                                                <?php } ?>
                                                            </a>
                                                        </div>
                                                        <div class="Consultancy-details">
                                                            <a href="<?= $base_url; ?><?= $data->consultancy_slug ?>"><span class="title"><?= $data->consultancy_name ?></span></a>
                                                            <ul>
                                                                <li><i class="fa-sharp fa-solid fa-location-dot"></i>&nbsp;
                                                                    <?= $data->area ?>
                                                                </li>
                                                                <?php
                                                                $phone = $data->consultancy_phone;
                                                                if ($phone) {
                                                                    $str_phone = (string)$phone;
                                                                    $first_digit = $str_phone[0];

                                                                    if ($first_digit != '0') {
                                                                        $modified_phone = '01' . $str_phone;
                                                                    } else {
                                                                        $modified_phone = $str_phone;
                                                                    }
                                                                ?>
                                                                    <li>
                                                                        <i class="fa-solid fa-phone-volume"></i>&nbsp;
                                                                        <a href="tel:<?= $modified_phone ?>"><?= $modified_phone ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php

                        }
                        $count = $count + 1;
                    }
                    ?>
                    <div class="custom-btn btn-center">
                        <a class="btn btn-md my-3" href="<?= $base_url ?>test-preparation">View Test Preparations</a>
                    </div>
                </div>
                <!-- feature consultancy end -->
            </div>
            <?php
            $test_preparation_aside_ads = adsFetch(19, 1, 1);
            if (!empty($study_abroad_bottom_ads)) {
            ?>
                <div class="col-lg-3">
                    <div class="aside-advertisement">
                        <ul>
                            <?php foreach ($test_preparation_aside_ads as $ads) : ?>
                                <li>
                                    <figure>
                                        <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                                            <?php
                                            if ($ads->image != "") {
                                            ?>
                                                <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                                            <?php
                                            } elseif ($ads->video != "") {
                                            ?>
                                                <video autoplay loop muted>
                                                    <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                                                </video>
                                            <?php
                                            }
                                            ?>
                                        </a>
                                    </figure>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- advetisement  -->
<?php
$all_ads = adsFetch(9, 1, 1);
if (!empty($all_ads)) {
?>
    <section class="advertisement-section custom-margin">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- additonal text needed in upcomclass -->
<?php $upcoming_classes = $db->SelectByCriteria("consultancy_test_prep join class_table on consultancy_test_prep.cid= class_table.cid join consultancies on class_table.cid=consultancies.id join test_preparation on class_table.tid = test_preparation.id", "consultancies.consultancy_name,test_preparation.title, consultancies.nickname, class_table.*", "test_preparation.status AND class_table.date >= CURDATE()", [1], "GROUP BY class_table.id  limit 5 ");
// print_r( $upcoming_classes);
if (count($upcoming_classes) > 0) { ?>
    <section class="comming-classes  custom-margin  ">
        <div class="container">
            <div class="row g-3">
                <div class="heading-filter-wrapper">
                    <h2 class="title ">Upcoming <span>Classes</span></h2>
                    <div class="filter-wrapper">
                        <div class="filter-item">
                            <select class="form-select testPreparation" name="forPreparationType" onchange=getTest(this.value)>
                                <option value="none" selected disabled>Select Test</option>
                                <option value="0"  >Select All</option>
                                
                                <?php foreach ($test_data as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php
                ?>
                <div class="table-wrapper d-lg-block d-none" id="testprep">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Test Preparation</th>
                                <th>Consultancy Name</th>
                                <th>Start Date</th>
                                <th>Class Time</th>
                                <th>Offers</th>
                                <th>Register Now</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($upcoming_classes as $key => $class) : ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $class->title ?></td>
                                    <td><?= $class->consultancy_name ?></td>
                                    <td><?= dateConvert($class->date) ?></td>
                                    <td><?= timeConvert($class->time) ?></td>
                                    <td class="Offer"> <?= $class->offer != "" ?  "<span>" . $class->offer . "</span>" : "No Offer" ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="view-details-btn" onclick="testDetails(<?= $class->id ?>)" data-bs-toggle="modal" data-bs-target="#classDetailsModal" data-id=<?= $class->id ?>>
                                                View Details
                                            </button>
                                            <button type="button" class=" register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
                                                Register Now
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-wrapper mobileTablet-design d-lg-none d-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class Details</th>
                                <th>Enquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($upcoming_classes as $key => $class) : ?>
                                <tr>
                                <td><?= $class->title ?> <?= $class->mode == '1' ? '(Online)' : '' ?> | <?= $class->nickname ? $class->nickname : $class->consultancy_name ?> </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="view-details-btn" data-bs-toggle="modal" data-bs-target="#classDetailsModal"  onclick="testDetails(<?=$class->id?>)">
                                                View Details
                                            </button>
                                            <button type="button" class="register-now-btn" data-bs-toggle="modal" data-bs-target="#classRegisterForm">
                                                Register Now
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="custom-btn btn-center mt-4">
                    <a class="btn btn-md " href="<?= $base_url ?>upcoming-classes">View all Classes</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<!-- advetisement  -->
<?php
$all_ads = adsFetch(9, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- events start -->
<section class="events section-bg  custom-margin custom-padding ">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-9">
                <h3 class="title mb-3">Popular <span>Events</span></h3>
                <div class="row g-3">
                    <?php
                    $events = $db->CustomQuery("SELECT * FROM `events` ORDER BY `events`.`id` DESC LIMIT 4");
                    $date1 = date("Y-m-d");
                    $i = 0;
                    foreach ($events as $data) {
                        if ($i === 0) {
                    ?>
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="popular-events-card">
                                    <figure>
                                        <?php if ($data->image == "") { ?>
                                            <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $data->title ?>">
                                        <?php } else { ?>
                                            <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>" alt="<?= $data->title ?>">
                                        <?php } ?>
                                    </figure>
                                    <div class="apply">
                                        <span type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply
                                            Now</span>
                                    </div>
                                    <div class="event-details">
                                        <span class="date"><i class="fas pe-2 fa-calendar-week"></i> <?= dateConvert($data->date) ?></span>
                                        <h3 class="event-tittle">
                                            <a href="<?= $data->slug ?>"><?= $data->title ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <ul class="aside-event">

                                <?php
                            } else {
                                ?>
                                    <li>
                                        <div class="event-wrapper">
                                            <div class="event-cover">
                                                <figure>
                                                    <?php if ($data->image == "") { ?>
                                                        <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $data->title ?>">
                                                    <?php } else { ?>
                                                        <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>" alt="<?= $data->title ?>">
                                                    <?php } ?>
                                                </figure>
                                            </div>
                                            <div class="event-details">
                                                <h3 class="event-tittle">
                                                    <a href="<?= $data->slug ?>"><?= $data->title ?></a>
                                                </h3>
                                                <span class="date"><i class="fas pe-2 fa-calendar-week"></i> <?= dateConvert($data->date) ?></span>
                                                <span class="apply-now-link" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply Now</span>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                            }
                                ?>
                            <?php $i++;
                        } ?>

                                </ul>
                            </div>

                </div>
            </div>
            <?php
            $top_Consultancy_aside_ads = adsFetch(12, 2, 1);
            if (!empty($top_Consultancy_aside_ads)) {

            ?>
                <div class="col-lg-3">
                    <div class="aside-advertisement">
                        <ul>
                            <?php foreach ($top_Consultancy_aside_ads as $ads) : ?>
                                <li>
                                    <figure>
                                        <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                                            <?php
                                            if ($ads->image != "") {
                                            ?>
                                                <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                                            <?php
                                            } elseif ($ads->video != "") {
                                            ?>
                                                <video autoplay loop muted>
                                                    <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                                                </video>
                                            <?php
                                            }
                                            ?>
                                        </a>
                                    </figure>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="custom-btn btn-center">
        <a class="btn btn-md mt-4" href="<?= $base_url ?>events">View all Events</a>
    </div>
</section>
<!-- advetisement  -->
<?php
$all_ads = adsFetch(13, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- News section  -->
<section class="news-section  custom-margin ">
    <div class="container">
        <h2 class="title mb-3">Recent <span>News</span></h2>
        <div class="row g-3">
            <?php $newsData = $db->CustomQuery("SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT 4");
            foreach ($newsData as $news) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="blog-news-card">
                        <div class="blog-news-cover">
                            <figure>
                                <?php if ($news->image == "") { ?>
                                    <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $news->title ?>">
                                <?php } else { ?>
                                    <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $news->image ?>" alt="<?= $news->title ?>">
                                <?php } ?>
                            </figure>
                        </div>
                        <div class="blog-news-details">
                            <h3 class="blog-news-tittle">
                                <a href="<?php echo $base_url ?>news/<?php echo $news->slug ?>" title="<?= $news->title; ?>"><?= $news->title; ?></a>
                            </h3>
                            <span class="date"><?= dateConvert($news->date) ?></span>
                            <a class="readmore" href="<?php echo $base_url ?>news/<?php echo $news->slug ?>" title="<?= $news->title; ?>">Read Full News</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="custom-btn btn-center mt-4">
            <a class="btn btn-md" href="<?= $base_url ?>news">View all News</a>
        </div>
    </div>
</section>
<!-- advetisement  -->
<?php
$all_ads = adsFetch(14, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>
<!-- Blog section  -->
<section class="blog-section section-bg  custom-margin custom-padding">
    <div class="container">
        <h2 class="title mb-3">Popular <span>Blog</span></h2>
        <div class="row g-3">
            <?php $popularblog = $db->CustomQuery("SELECT * FROM `contents` ORDER BY `contents`.`id` DESC LIMIT 4");
            foreach ($popularblog as $blog) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="blog-news-card">
                        <div class="blog-news-cover">
                            <figure>
                                <?php if ($blog->image == "") { ?>
                                    <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $blog->title ?>">
                                <?php } else { ?>
                                    <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $blog->image ?>" alt="<?= $blog->title ?>">
                                <?php } ?>
                            </figure>
                        </div>
                        <div class="blog-news-details">
                            <h3 class="blog-news-tittle">
                                <a href="<?php echo $base_url ?><?php echo $blog->slug; ?>"><?php echo $blog->title; ?></a>
                            </h3>
                            <span class="date"><?= dateConvert($blog->date) ?></span>
                            <a class="readmore" href="<?php echo $base_url ?><?php echo $blog->slug; ?>">Read Full Blog</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="custom-btn btn-center mt-4">
            <a class="btn btn-md " href="<?= $base_url ?>blog">View all Blogs</a>
        </div>
    </div>
</section>

<!-- advetisement  -->
<?php
$all_ads = adsFetch(15, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>

<?php
$testimonials = $db->SelectByCriteria("testimonials", "*", "status", [1]);
?>

<div class="testimonals-section custom-margin ">
    <div class="container">
        <h2 class="title mb-3">Our <span>Testimonals</span></h2>
        <div class="testimonals-slider">
            <?php foreach ($testimonials as $values) : ?>
                <div class="testimonlas-card">
                    <blockquote>
                        <p><?= $values->message ?></p>
                    </blockquote>
                    <div class="reviewr-details">
                        <figure class="cover-img">
                            <?php if ($news->image == "") { ?>
                                <img src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="Message From <?= $values->name ?>">
                            <?php } else { ?>
                                <img src="<?= $logo ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $values->image ?>" alt="Message From <?= $values->name ?>">
                            <?php } ?>
                        </figure>
                        <div class="details">
                            <h3 class="reviewer"><?= $values->name ?></h3>
                            <div class="designation"><?= $values->title ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- advetisement  -->
<?php
$all_ads = adsFetch(16, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section custom-margin ">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>

<!-- business partners  -->
<section class="business-partners section-bg d-none  custom-margin custom-padding  ">
    <div class="container">
        <h2 class="title mb-3">Our Business <span>Partners</span></h2>
        <div class="business-partners-slider">
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/top.jpg" alt="">
                </figure>
            </div>
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/aecc.jpg" alt="">
                </figure>
            </div>
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/edwise.jpg" alt="">
                </figure>
            </div>
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/rightpath.jpg" alt="">
                </figure>
            </div>
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/sevilla.jpg" alt="">
                </figure>
            </div>
            <div class="businer-partner-card">
                <figure>
                    <img src="assets/images/KIEC-logo.png" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- advetisement  -->
<?php
$all_ads = adsFetch(17, 1, 1);
if (!empty($all_ads)) {

?>
    <section class="advertisement-section mb-5">
        <div class="container">
            <figure>
                <?php foreach ($all_ads as $ads) : ?>
                    <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <video autoplay loop muted>
                                <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </a>
                <?php endforeach; ?>
            </figure>
        </div>
    </section>
<?php } ?>

<?php
$ad_pop = adsFetch(3, 1, 1);

if (!empty($ad_pop)) {
?>
    <div class="modal fade initial-popup" id="popupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($ad_pop as $ads) : ?>
                        <a aria-label="<?= $ads->alt ?>" href="<?= $ads->link ?>">
                            <?php
                            if ($ads->image != "") {
                            ?>
                                <figure>
                                    <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                                </figure>
                            <?php
                            } elseif ($ads->video != "") {
                            ?>
                                <video autoplay loop muted>
                                    <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                                </video>
                            <?php
                            }
                            ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<script>
    const images = document.querySelectorAll("img");
    const imgOptions = {};
    const imgObserver = new IntersectionObserver((entries, imgObserver) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const img = entry.target;
            if (img.dataset.src != null) {
                img.src = img.dataset.src;
            }
            imgObserver.unobserve(entry.target);
        });
    }, imgOptions);

    images.forEach((img) => {
        imgObserver.observe(img);
    });
</script>

<script>
    function testDetails(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("testDetails").innerHTML = this.responseText;
                console.log(this.responseText)
            }
        };
        xmlhttp.open("GET", "getTestDetails.php?id=" + str, true);
        xmlhttp.send();
    }
</script>
<?php include "footer_home.php"; ?>