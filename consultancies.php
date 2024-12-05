<?php
$data = $db->CustomQuery(
    "SELECT * FROM consultancies WHERE consultancy_slug='$getSlug'"

);
$consultancyData = $data[0];
$consultancy_id = $data[0]->id;
$consultancy_email = $data[0]->consultancy_email;
$consultancy_city = $data[0]->City;
$cousultancy_name = $data[0]->consultancy_name;
$title = $consultancyData->consultancy_meta_title;
$address = $consultancyData->consultancy_address;
$phone = $consultancyData->consultancy_phone;
$content = $consultancyData->consultancy_meta_description;
$img = $consultancyData->consultancy_logo;
require_once "header.php";
?>
<?php
$errors = [
    "fname" => "",
    "lname" => "",
    "email" => "",
    "number" => "",
    "subject" => "",
    "message" => "",
];
$old = [
    "fname" => "",
    "lname" => "",
    "email" => "",
    "number" => "",
    "subject" => "",
    "message" => "",

];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST)) {


        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                if ($key == "fname" || $key == "number" || $key == "lname") {
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
        if (!array_filter($errors)) {

            $fullname = $_POST["fname"] . " " . $_POST["lname"];
            if ($db->Insert("consultancy_enquery", ["name" => $fullname, "email" => $_POST["email"], "number" => $_POST["number"], "subject" => $_POST["subject"], "consultancy_id" => $consultancy_id, "message" => $_POST["message"]])) {
                $_SESSION["sucess"] = "Message send sucessfully";
                // die;
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

<!-- consultancy-content-->
<section data-bs-spy="scroll" data-bs-target="#consultancy-profile-page" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
    <div id="consultancy-profile-page" class="simple-list-example-scrollspy ">
        <div class="container">
            <ul>
                <li> <a class=" active" href="#simple-list-item-shortIntro">
                        <img alt="<?= $consultancyData->consultancy_name ?>" src="<?= $base_url ?>cnbackend/public/<?= $consultancyData->consultancy_logo ?>"> <?= $consultancyData->consultancy_name ?>
                    </a></li>
                <li> <a class=" " href="#simple-list-item-about">Introduction</a></li>
                <li> <a class="" href="#simple-list-item-testPreaparation">Test Preparation</a></li>
                <li> <a class="" href="#simple-list-item-testPreaparation">Country Focus</a></li>
                <li> <a class="" href="#simple-list-item-upcommingClass">Upcomming Classes</a></li>
                <li> <a class="" href="#simple-list-item-location">Location</a></li>
                <li> <a class="" href="#simple-list-item-gallery">Gallery</a></li>
            </ul>
        </div>
    </div>
    <div class="consultancy-content my-5  ">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8 order-lg-1 order-2">
                    <div class="page-content" id="simple-list-item-shortIntro">
                        <div class="text-document-content">
                            <div class="highlight-content">
                                <div class="heading">Our Strength</div>
                                    <?=$consultancyData->consultancy_intro_text?>
                            </div>
                        </div>
                    </div>
                    <div class="page-content mt-4" id="simple-list-item-about">
                        <div class="date-title">
                            <div id="simple-list-item-1" class="title"><?= $cousultancy_name ?></div>
                        </div>
                        <div class="text-document-content mt-3">
                            <?= htmlspecialchars_decode($consultancyData->consultancy_description) ?>
                        </div>
                    </div>
                    <div class="row gy-4 page-content" id="simple-list-item-testPreaparation">
                        <div class="col-lg-6 col-md-6">
                            <div class="page-content section-bg rounded-2 p-3 mt-4">
                                <div class="date-title">
                                    <div id="simple-list-item-1" class="title">Test Preparation Class</div>
                                </div>
                                <?php
                                $test_class = $db->CustomQuery("select distinct test_preparation.title  from consultancy_test_prep join test_preparation on consultancy_test_prep.tpid=test_preparation.id  where  cid =$consultancy_id ");
                                ?>
                                <div class="text-document-content mt-3">
                                    <ul>
                                        <?php foreach ($test_class as $class) : ?>
                                            <li><?= $class->title ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="page-content  mt-4 section-bg rounded-2 p-3">
                                <div class="date-title">
                                    <div class="title">Country We Focus</div>
                                </div>
                                <?php
                                $country_consultancy = $db->CustomQuery("select distinct countries.country_name as title  from consultancy_pages join countries  on consultancy_pages.country_id=countries.id  where  consultancy_pages.consultancy_id =$consultancy_id ");

                                ?>
                                <div class="text-document-content mt-3">
                                    <ul>
                                        <?php foreach ($country_consultancy as $country) : ?>
                                            <li><?= $country->title ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $upcoming_classes = $db->SelectByCriteria("consultancy_test_prep join class_table on consultancy_test_prep.cid= class_table.cid join consultancies on class_table.cid=consultancies.id join test_preparation on class_table.tid = test_preparation.id", "consultancies.consultancy_name,test_preparation.title,class_table.*", "test_preparation.status AND class_table.date <= CURDATE() AND  consultancy_test_prep.cid=$consultancy_id", [1], "GROUP BY id  order by consultancy_test_prep.rank asc");

                    if (!empty($upcoming_classes)) {
                    ?>

                        <div class="page-content mt-4" id="simple-list-item-upcommingClass">
                            <div class="date-title">
                                <div class="title">Our UpComming Class</div>
                            </div>
                            <div class="text-document-content mt-3">
                                <div class="table-wrapper mt-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Test Preparation</th>
                                                <th>Start Date</th>
                                                <th>Class Time</th>
                                                <th>Offers</th>
                                                <th>Register Now</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                    <td colspan="7" class="text-center"><strong>No Classes For Now</strong></td>
                                    </tr> -->
                                            <?php foreach ($upcoming_classes as $key => $class) { ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $class->title ?></td>
                                                    <td><?= dateConvert($class->date) ?></td>
                                                    <td><?= timeConvert($class->time) ?></td>
                                                    <td class="Offer"><span><?= $class->offer ?></span></td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <a href="" class="download-button">Register Now</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="page-content mt-4" id="simple-list-item-location">
                        <div class="date-title">
                            <div class="title">Get Our Direction</div>
                        </div>
                        <div class="text-document-content mt-3">
                            <?php
                            if ($consultancyData->map != "") {
                            ?>
                                <iframe src="https://www.google.com/maps/embed?pb=<?= trim($consultancyData->map) ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="consultancy-aside-content">
                        <div class="side-con section-bg p-3  rounded-2 mb-4">
                            <div class="Country-focus-top">
                                <div class="title">Country We Focus</div>
                                <ul>
                                    <?php foreach ($country_consultancy as $country) : ?>
                                        <li><?= $country->title ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="side-con section-bg p-3  rounded-2 mb-4">
                            <div class="consultancy-details">
                                <div class="contact-details">
                                    <div class="name"><?= $cousultancy_name ?></div>
                                    <ul>
                                        <li><i class="fa-sharp fa-solid fa-location-dot"></i> <?= $address ?></li>
                                        <li><a href="tel:+977-<?= $phone ?>"><i class="fa-solid fa-phone-volume"></i>+977-<?= $phone ?></a></li>
                                        <li><a href="mailto:<?= $consultancy_email ?>"><i class="fa-solid fa-envelope-circle-check"></i> <?= $consultancy_email ?></a></li>
                                    </ul>
                                </div>
                                <div class="social-media">
                                    <div class="heading">Social Meida Links</div>
                                    <ul class="social-media">
                                        <?php
                                        if ($data[0]->facebook != "") {
                                        ?>
                                            <li class=""><a href="<?= $data[0]->facebook ?>" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook"></i></a></li>
                                        <?php
                                        }
                                        if ($data[0]->instagram != "") {
                                        ?>
                                            <li><a href="<?= $data[0]->instagram ?>" target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a></li>
                                        <?php
                                        }
                                        if ($data[0]->twitter != "") {
                                        ?>
                                            <li><a href="<?= $data[0]->twitter ?>" target="_blank" rel="nofollow"><i class="fa-brands fa-twitter"></i></a></li>
                                        <?php
                                        }
                                        if ($data[0]->tiktok != "") {
                                        ?>
                                            <li><a href="<?= $data[0]->tiktok ?>" target="_blank" rel="nofollow"><i class="fa-brands fa-tiktok"></i></a></li>
                                        <?php
                                        }
                                        if ($data[0]->youtube != "") {
                                        ?>
                                            <li><a href="<?= $data[0]->youtube ?>" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i> </a></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                    <button type="button" class="ask-question-button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Send Inquiry</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--  message consultancy-->
<form action="" method="post" name="myForm" onsubmit="return validateForm()">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">First Name <span class="text-danger" id="fnameerror">
                                        <?= $errors['fname'] ?>
                                    </span></label>
                                <input type="text" name="fname" id="" class="form-control" placeholder="" value="<?= $old['fname'] ?>" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Last Name <span class="text-danger" id="lnameerror">
                                        <?= $errors['lname'] ?>
                                    </span></label>
                                <input type="text" name="lname" id="" class="form-control" placeholder="" value="<?= $old['lname'] ?>" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email<span class="text-danger" id="emailerror">
                                    <?= $errors['email'] ?>
                                </span></label>
                            <input type="email" name="email" id="" class="form-control" placeholder="" value="<?= $old['email'] ?>" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Number <span class="text-danger" id="numbererror">
                                    <?= $errors['number'] ?>
                                </span></label>
                            <input type="text" name="number" id="" class="form-control" value="<?= $old['number'] ?>" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Subject <span class="text-danger" id="subjecterror">
                                    <?= $errors['subject'] ?>
                                </span></label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="" value="<?= $old['subject'] ?>" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message <span class="text-danger" id="messageerror">
                                    <?= $errors['message'] ?>
                                </span> </label>
                            <textarea class="form-control" name="message" id="" rows="3"><?= $old['message'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
$sucessGallerycount = $db->CustomQuery("SELECT COUNT(*) as Count FROM `sucess_gallery` JOIN consultancies ON sucess_gallery.consultancy_id=consultancies.id WHERE consultancies.Isfeatured='featured' AND sucess_gallery.consultancy_id='$consultancy_id';");
$count = $sucessGallerycount[0]->Count;
if ($count > 0) {
?>
    <section class="gallery section-bg py-5" id="simple-list-item-gallery">
        <div class="container">
            <h4 class="mb-5 title">Success Gallery</h4>
            <div class="row gy-4 justify-content-center">

                <?php
                $sucessGallery = $db->CustomQuery("SELECT * FROM `sucess_gallery` JOIN consultancies ON sucess_gallery.consultancy_id=consultancies.id WHERE consultancies.Isfeatured='featured' AND sucess_gallery.consultancy_id='$consultancy_id';");
                foreach ($sucessGallery as $data) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="popup-gallery">
                            <?php
                            if ($data->image) {
                            ?>
                                <figure>
                                    <a data-fancybox="Success gallery" data-caption="<?= $data->name ?>" href="<?= $base_url ?>cnbackend/public/<?= $data->image ?>">
                                        <img class="lazy" data-src="<?= $base_url ?>cnbackend/public/<?= $data->image ?>" width="100%" alt="<?= $data->name ?>">
                                    </a>
                                </figure>
                            <?php
                            } else {
                            ?>
                                <figure>
                                    <a data-fancybox="Success gallery" data-caption="<?= $data->name ?>" href="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg">
                                        <img class="lazy" data-src="<?= $base_url ?>cnbackend/public/uploads/noimage/noimage.jpg" width="100%" alt="<?= $data->name ?>">
                                    </a>
                                </figure>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
?>


<script data-src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"></script>

<script>
    function validateForm() {
        let fname = document.forms["myForm"]["fname"].value;
        let lname = document.forms["myForm"]["lname"].value;
        let email = document.forms["myForm"]["email"].value;
        let number = document.forms["myForm"]["number"].value;
        let subject = document.forms["myForm"]["subject"].value;
        let message = document.forms["myForm"]["message"].value;

        if (fname == "") {
            document.querySelector("#fnameerror").innerHTML = " Required a FirstName";
            return false;
        }
        if (lname == "") {
            document.querySelector("#lnameerror").innerHTML = " Required a LastName";
            return false;
        }
        if (email == "") {
            document.querySelector("#emailerror").innerHTML = " Required a Email";
            return false;
        }
        if (number == "") {
            document.querySelector("#numbererror").innerHTML = " Required a Number";
            return false;
        }
        if (subject == "") {
            document.querySelector("#subjecterror").innerHTML = " Required a Subject";
            return false;
        }
        if (message == "") {
            document.querySelector("#messageerror").innerHTML = " Required a Message";
            return false;

        }
    }

    $(document).ready(function() {

        var n;

        $(".video-btn").click(function() {

            n = $(this).data("src")

        }), console.log(n), $("#myModal").on("shown.bs.modal", function(o) {

            $("#video").attr("src", n + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0")

        }), $("#myModal").on("hide.bs.modal", function(o) {

            $("#video").attr("src", n)

        })

    })
</script>

<style>
    .modal {
        width: 100%
    }

    .modal-body {
        width: 800px
    }

    .modal-content {
        width: 800px
    }
</style>

<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Organization",
        "url": "<?= $base_url ?><?= $getSlug ?>",
        "logo": "<?= $base_url ?>cnbackend/public/<?= $consultancyData->consultancy_logo ?>",
        "name": "<?= $cousultancy_name ?>",
        "image": "<?= $base_url ?>cnbackend/public/<?= $consultancyData->consultancy_logo ?>",
        "email": "<?= $consultancy_email ?>",
        "description": "<?= $content ?>",
        "address": "<?= $address ?>",
        "telephone": "+977-<?= $phone ?>"
    }
</script>
<?php include "footer.php"; ?>