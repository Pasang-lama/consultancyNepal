<?php
$data = $db->CustomQuery(
    "SELECT * FROM countries WHERE country_slug='$getSlug'"
);
$getData = $data[0];
$country_id = $getData->id;
$rightSiteData = $db->CustomQuery("SELECT * FROM countries");
$title = $getData->meta_title;
$content = $getData->meta_description;
$contryconsultancy = $db->CustomQuery(
    "SELECT * FROM consultancy_pages JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id AND country_id='$getData->id'"
);
$img = $getData->image;
include "header.php";

$errors = [
    "name" => "",
    "email" => "",
    "number" => "",
    "course" => "",
    "message" => "",
];
$old = [
    "name" => "",
    "email" => "",
    "number" => "",
    "course" => "",
    "message" => "",

];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    // die;
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            // echo $key;
            if (empty($_POST[$key])) {
                if ($key == "name" || $key == "number") {
                    $errors[$key] = "* The " . $key . " field is required";
                }
            } else {
                $old[$key] = $value;
            }
        }
        if (mb_strlen($_POST['number']) != 10) {

            $errors['number'] = "Only Valid numbers allowed";
        }
        if (!preg_match("/^[0-9]*$/", $_POST['number'])) {

            $errors['number'] = "Only numbers allowed";
        }
        $_SESSION['scholarship'] = true;
        if (!array_filter($errors)) {
            $fullname = $_POST["name"];
            if ($db->Insert("scholarships", ["name" => $fullname, "email" => $_POST["email"], "phone" => $_POST["number"], "course" => $_POST["course"], "message" => $_POST["message"], "country" => $_POST['country']])) {
                $_SESSION["sucess"] = "Message Sent sucessfully";
                // $_SESSION["success"] = true;
                $_SESSION['scholarship'] = false;
?>
                <script>
                    // Use JavaScript to redirect to the desired page
                    window.location.href = "<?php echo $base_url . $url[1]; ?>";
                </script>
<?php
                exit();
            }
        }
    }
}

?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $getData->country_name ?></li>
        </ol>
    </div>
</nav>
<?php
if (isset($_SESSION["sucess"])) {
?>
    <div class="alert alert-button alert-success alert-dismissible" role="alert">
        <div><?= $_SESSION["sucess"]; ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION["sucess"]);
}
?>
<section class="content page-content my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="Single-country-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            <?= $getData->country_name ?>
                        </button>
                    </li>
                    <?php $universityStudent = $db->CustomQuery("SELECT * FROM location JOIN university ON university.location_id=location.location_id WHERE country_id='$country_id'");
                    if (!empty($universityStudent)) {
                    ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Top University</button>
                        </li>
                    <?php }
                    ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tabs" data-bs-toggle="tab" data-bs-target="#profile-tab-panes" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Scholarship</button>
                        </li>


                </ul>
                <div class="tab-content single-country-tabs" id="Country-tab">
                    <div class="tab-pane fade show active " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="text-document-content ">
                            <?= $getData->description ?>
                        </div>
                    </div>
                    <?php if (!empty($universityStudent)) { ?>
                        <div class="tab-pane fade country" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="text-document-content ">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>University</th>
                                            <th>Student</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($universityStudent as $data) {
                                        ?>
                                            <tr>
                                                <td><?= $data->location_name; ?></td>
                                                <td><?= $data->university_name ?></td>
                                                <td><?= $data->total_nepali_student ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    <?php }
                    ?>
                        <div class="tab-pane fade country" id="profile-tab-panes" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="contact-us-form form-element ">
                                <div class="title">Apply For <span>Scholarship</span></div>
                                <form action="" method="post">
                                    <div class="row gy-2">
                                        <div class="col-lg-12 col-md-12">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="" value="<?= $old['name'] ?>" aria-describedby="helpId">
                                            <span class="error-message"> <?= $errors['name'] ?> </span>

                                            <input type="hidden" name="country" hidden value="<?= $country_id ?>">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $old['email'] ?>" aria-describedby="helpId">
                                            <span class="error-message"> <?= $errors['email'] ?> </span>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="number" class="form-label">Number:</label>
                                            <input type="text" name="number" id="number" class="form-control" value="<?= $old['number'] ?>" aria-describedby="helpId" maxlength="12" minlength="10">
                                            <span class="error-message"> <?= $errors['number'] ?> </span>
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="course" class="form-label">Course:</label>
                                            <input type="text" name="course" id="course" class="form-control" placeholder="" value="<?= $old['course'] ?>" aria-describedby="helpId">
                                            <span class="error-message"> <?= $errors['course'] ?> </span>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="message" class="form-label">Message:</label>
                                            <textarea class="form-control" name="message" id="message" rows="3"><?= $old['message'] ?></textarea>
                                            <span class="error-message"> <?= $errors['message'] ?> </span>
                                        </div>
                                    </div>
                                    <div class="custom-btn  mt-4">
                                        <button type="submit" class="btn btn-md ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                <?php
                $count = 1;
                $cb = 1;
                $countryContent = $db->CustomQuery(
                    "SELECT * FROM country_contents WHERE country_id='$getData->id'"
                );
                foreach ($countryContent as $cData) {
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
                                        <?= strip_tags(
                                            $cData->title
                                        ) ?>
                                    </h3>
                                    <div class="text-document-content mt-3">
                                        <p> <?= strip_tags($cData->intro_text) ?></p>
                                    </div>
                                    <div class="custom-btn">
                                        <a href="<?= $base_url ?><?= $getData->country_slug ?>/<?= $cData->slug ?>" class="btn btn-md mt-3">Read more</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <img class="lazy" alt="" data-src="<?= $cData->image != 0 ? " {$base_url}cnbackend/public/{$cData->image}" : "{$base_url}cnbackend/public/uploads/noimage/noimage.jpg" ?>" width="100%">
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
                                    <img class="lazy" alt="" data-src="<?= $cData->image != 0 ? " {$base_url}cnbackend/public/{$cData->image}" : "{$base_url}cnbackend/public/uploads/noimage/noimage.jpg" ?>" width="100%">
                                </div>
                                <div class="col-lg-8">
                                    <h3 class="title">
                                        <?= strip_tags($cData->title) ?>
                                    </h3>
                                    <div class="text-document-content mt-3">
                                        <p> <?= strip_tags($cData->intro_text) ?></p>
                                    </div>
                                    <div class="custom-btn">
                                        <a href="<?= $base_url ?><?= $getData->country_slug ?>/<?= $cData->slug ?>" class="btn btn-md mt-3">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    $count = $count + 1;
                }
                ?>
            </div>
            <div class="col-lg-3">
                <div class="aside-content-link realted-faq">
                    <div class="heading"> <span>About <?= $getData->country_name ?></span></div>
                    <ul>
                        <?php foreach ($countryContent as $cData1) : ?>
                            <li>
                                <a href="<?= $base_url ?><?= $getData->country_slug ?>/<?= $cData1->slug ?>"><i class="fa-solid fa-angles-right"></i>
                                    <?= $cData1->title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($contryconsultancy)) { ?>
    <section class="section-bg py-5">
        <div class="container">
            <h2 class="title mb-4">List of Consultancy for <span><?= $getData->country_name ?></span></h2>
            <div class="consultancy-slider">
                <?php foreach ($contryconsultancy as $clist) : ?>
                    <div class="consultancy-slider-item">
                        <figure>
                            <?php if ($clist->consultancy_logo == null) { ?>
                                <a href="<?= $base_url . $clist->consultancy_slug ?>">
                                    <img class="lazy" alt="<?= $clist->consultancy_name; ?>" src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" alt="<?= $clist->consultancy_slug; ?>">
                                </a>
                            <?php } else { ?>
                                <a href="<?= $base_url . $clist->consultancy_slug ?>">
                                    <img class="lazy" alt="<?= $clist->consultancy_name; ?>" data-src="<?= $base_url ?>cnbackend/public/<?= $clist->consultancy_logo ?>" alt="<?= $clist->consultancy_slug; ?>">
                                </a>
                            <?php } ?>
                        </figure>
                        <h3 class="consultancy-name">
                            <a href="<?= $base_url . $clist->consultancy_slug ?>">
                                <?= $clist->consultancy_name; ?>
                            </a>
                        </h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php } ?>


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
        "author": [{
            "@type": "Organization",
            "name": "consultancy nepal"
        }],
        "headline": "<?= $title ?>",
        "image": "<?= $base_url ?>cnbackend/public/<?= $getData->image ?>",
        "publisher": {
            "@type": "Organization"
        },
        "description": "<?= $content ?>"
    }
</script>
<?php include "footer.php"; ?>