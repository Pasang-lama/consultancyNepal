<?php
function dateConvert($original_date)
{
    $date_time = DateTime::createFromFormat('Y-m-d', $original_date);
    $new_date = $date_time->format('d M Y');
    return  $new_date;
}
function timeConvert($timeString)
{
    $time = DateTime::createFromFormat('H:i:s', $timeString);
    $formattedTime = $time->format('g:i A');
    return $formattedTime;
}
function adsFetch($side, $limit, $status)
{
    global $db;
    $ads_section = array();
    $sql = "SELECT * FROM `ads_order` JOIN `ads` ON `ads_order`.ads=`ads`.id where side='$side' and `ads`.status ='$status' ORDER BY `ads_order`.rank ASC limit $limit";
    $ads_section = $db->CustomQuery($sql);
    if (empty($ads_section)) {
        $ads_section = array();
    }
    return $ads_section;
}
// Navbar Essentials
$top_destinations = $db->SelectByCriteria("countries join rank_country on countries.id=rank_country.country_id", "countries.country_name as title,countries.country_slug as slug", "countries.status", [1], "order by rank_country.rank limit 5");
$test_preparation = $db->SelectByCriteria("test_preparation ", "title,slug", "test_preparation.status", [1], " limit 5");
$top_consultancy = $db->CustomQuery("SELECT * FROM `Best-Consultancy-Countrywise` WHERE status = 1 ");
$upcoming_class = $db->CustomQuery("SELECT COUNT(*) as upcoming FROM class_table WHERE class_table.date >= CURDATE()");
$event = $db->CustomQuery("SELECT COUNT(*) as up_event FROM events WHERE events.date >= CURDATE()");
?>
<header>
    <div class="container">
        <div class="main-navigation-bar">
            <div class="logo">
                <?php if ($settingData->company_logo) { ?>
                    <a href="<?= $base_url ?>"><img class="object-fit-contain" src="<?= $base_url ?>cnbackend/public/<?= $settingData->company_logo ?>" alt="Consultancy Nepal" height="55px" width="173px"></a>
                <?php } else { ?>
                    <a href="/"><img class="object-fit-contain" src="<?= $base_url ?>/images/noimage/noimage.jpg" alt=""></a>
                <?php } ?>
            </div>
            <div class="hamburger-menu">
                <button aria-label="sideMenuOpenBtn" data-side-nav-target="#mySideNav" class="sideNavOpen">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Top Destination</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($top_destinations as $values) : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?><?= $values->slug ?> "><i class="fa-solid pe-2 fa-angles-right"></i>Study in <?= $values->title ?> </a></li>
                            <?php endforeach; ?>
                            <li><a class="dropdown-item view-all-btn" href="<?= $base_url ?>country">View all </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Test Preparation</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($test_preparation as $values) : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?><?= $values->slug ?>"><i class="fa-solid pe-2 fa-angles-right"></i><?= $values->title ?> </a></li>
                            <?php endforeach; ?>
                            <li><a class="dropdown-item view-all-btn" href="<?= $base_url ?>test-preparation">View all </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Best Consultancy</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($top_consultancy as $values) : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?><?= $values->slug ?>"><i class="fa-solid pe-2 fa-angles-right"></i><?= $values->title ?> </a></li>
                            <?php endforeach; ?>
                            <li><a class="dropdown-item view-all-btn " href="<?= $base_url ?>best-consultancy-countrywise">View all </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Scholarships</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($top_destinations as $values) : ?>
                                <li><a class="dropdown-item redirect" href="<?= $base_url ?><?= $values->slug ?> "><i class="fa-solid pe-2 fa-angles-right"></i>Scholarship For <?= $values->title ?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" aria-current="page" href="<?= $base_url ?>upcoming-classes">Upcoming Classes
                            <?= ($upcoming_class[0]->upcoming == 0) ? "" : '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $upcoming_class[0]->upcoming . '  </span>' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="<?= $base_url ?>events">Events
                            <?= ($event[0]->up_event == 0) ? "" : '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $event[0]->up_event . '  </span>' ?>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= $base_url ?>contact">Contact Us </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.consultancynepal.com/consultancy-login"><i class="fa-solid  pe-1 fa-right-to-bracket"></i> Login</a></li>
                            <li><a class="dropdown-item" href="https://www.consultancynepal.com/consultancyregistraion"><i class="fa-solid pe-1  fa-pen-to-square"></i>
                                    Register</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<!-- side nav  -->
<div id="mySideNav" class="sidenav">
    <div class="side-nav-close-btn">
        <button class="sideNavClose" data-side-nav-target="#mySideNav"><i class="fas fa-times"></i></button>
    </div>
    <div class="side-nav-body">
        <div class="accordion navigation-menu " id="accordionExample">
            <li><a href="/">Home </a></li>
            <li><a href="<?= $base_url ?>about">About us </a></li>
            <li>
                <div class="accordion-item">
                    <div class="accordion-header" id="top-destination">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetop-destination" aria-expanded="false" aria-controls="collapsetop-destination">
                            Top Destination
                        </button>
                    </div>
                    <div id="collapsetop-destination" class="accordion-collapse collapse" aria-labelledby="top-destination" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-nav-menu">
                                <?php foreach ($top_destinations as $values) : ?>
                                    <li><a class="accordion-nav-item" href="<?= $base_url ?><?= $values->slug ?> "><i class="fa-solid pe-2 fa-angles-right"></i>Study in <?= $values->title ?> </a></li>
                                <?php endforeach; ?>
                                <li><a class="accordion-nav-item view-all-btn" href="<?= $base_url ?>country">View all </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="accordion-item">
                    <div class="accordion-header" id="testpreaparation">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetestpreaparation" aria-expanded="false" aria-controls="collapsetestpreaparation">
                            Test Preparation
                        </button>
                    </div>
                    <div id="collapsetestpreaparation" class="accordion-collapse collapse" aria-labelledby="testpreaparation" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-nav-menu">
                                <?php foreach ($test_preparation as $values) : ?>
                                    <li><a class="accordion-nav-item" href="<?= $base_url ?><?= $values->slug ?>"><i class="fa-solid pe-2 fa-angles-right"></i><?= $values->title ?> </a></li>
                                <?php endforeach; ?>
                                <li><a class="accordion-nav-item view-all-btn" href="<?= $base_url ?>test-preparation">View all</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="accordion-item">
                    <div class="accordion-header" id="top-copnsultancy">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetop-copnsultancy" aria-expanded="false" aria-controls="collapsetop-copnsultancy">
                            Top Consultancy
                        </button>
                    </div>
                    <div id="collapsetop-copnsultancy" class="accordion-collapse collapse" aria-labelledby="testpreaparation" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-nav-menu">
                                <?php foreach ($top_consultancy as $values) : ?>
                                    <li><a class="accordion-nav-item" href="<?= $base_url ?><?= $values->slug ?>"><i class="fa-solid pe-2 fa-angles-right"></i><?= $values->title ?> </a></li>
                                <?php endforeach; ?>
                                <li><a class="accordion-nav-item view-all-btn " href="<?= $base_url ?>best-consultancy-countrywise">View all </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="accordion-item">
                    <div class="accordion-header" id="Scholarships">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScholarships" aria-expanded="false" aria-controls="collapseScholarships">
                            Scholarships
                        </button>
                    </div>
                    <div id="collapseScholarships" class="accordion-collapse collapse" aria-labelledby="testpreaparation" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-nav-menu">
                                <?php foreach ($top_destinations as $values) : ?>
                                    <li><a class="accordion-nav-item redirect" href="<?= $base_url ?><?= $values->slug ?> "><i class="fa-solid pe-2 fa-angles-right"></i>Scholarship For <?= $values->title ?> </a></li>
                                <?php endforeach; ?>
                                <li><a class="accordion-nav-item view-all-btn " href="<?= $base_url ?>consultancy">View all </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a class=" position-relative" aria-current="page" href="<?= $base_url ?>upcoming-classes">Upcoming Classes
                    <?= ($upcoming_class[0]->upcoming == 0) ? "" : '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $upcoming_class[0]->upcoming . '  </span>' ?>
                </a>
            </li>
            <li>
                <a class=" position-relative" href="<?= $base_url ?>events">Events
                    <?= ($event[0]->up_event == 0) ? "" : '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $event[0]->up_event . '  </span>' ?>
                </a>
            </li>
            <li><a href="">Blogs</a></li>
            <li><a href="<?= $base_url ?>contact">Contact us </a></li>
            <li>
                <div class="accordion-item">
                    <div class="accordion-header" id="Accounts">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAccounts" aria-expanded="false" aria-controls="collapseAccounts">
                            Accounts
                        </button>
                    </div>
                    <div id="collapseAccounts" class="accordion-collapse collapse" aria-labelledby="testpreaparation" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-nav-menu">
                                <li><a class="accordion-nav-item" href="https://www.consultancynepal.com/consultancy-login"><i class="fa-solid  pe-1 fa-right-to-bracket"></i> Login</a></li>
                                <li><a class="accordion-nav-item" href="https://www.consultancynepal.com/consultancyregistraion"><i class="fa-solid pe-1  fa-pen-to-square"></i>
                                        Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </div>
    </div>
</div>

<section class="header-bellow-advertisement my-3">
    <div class="container-fluid">
        <div class="header-bottom-advertisement">
            <?php

            $data_ad = adsFetch(1, 3, 1);
            if (!empty($data_ad)) {
                $i = 0;
                foreach ($data_ad as $ads) {
                    if ($i == 0) {

            ?>
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <figure class="header-bellow-ads">
                                <a href="<?= $ads->link ?>" rel="nofollow" target="_blank">
                                    <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">
                                </a>
                            </figure>
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <div class="header-bellow-ads">
                                <a href="<?= $ads->link ?>" rel="nofollow" target="_blank">
                                    <video autoplay loop muted>
                                        <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                                    </video>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    } else {
                    ?>
                        <?php
                        if ($ads->image != "") {
                        ?>
                            <figure class="header-bellow-ads">
                                <a href="<?= $ads->link ?>" rel="nofollow">
                                    <img src="<?= $base_url ?>cnbackend/public/<?= $ads->image ?>" alt="<?= $ads->alt ?>">

                                </a>
                            </figure>
                        <?php
                        } elseif ($ads->video != "") {
                        ?>
                            <div class="header-bellow-ads">
                                <a href="<?= $ads->link ?>" rel="nofollow">
                                    <video autoplay preload="auto" loop muted>
                                        <source src="<?= $base_url ?>cnbackend/public/<?= $ads->video ?>" type="video/mp4">
                                    </video>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>