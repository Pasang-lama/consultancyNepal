<?php
$findData = $db->SelectAll("settings", []);
if ($findData) {
    $settingData = $findData[0];
}

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
                $errors[$key] = "* The " . $key . " field is require";
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
            if ($db->Insert("contacts", ["name" => $fullname, "email" => $_POST["email"], "phone" => $_POST["number"], "subject" => $_POST["subject"], "message" => $_POST["message"]])) {
                $_SESSION["sucess"] = "Message send sucessfully";
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
<?php include "header.php"; ?>
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
        </ol>
    </div>
</nav>
<!-- banner & breadcrum close -->



<section class="page-content contact-us-page my-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12">
                <div class="date-title">
                    <div class="title">Contact us for more Information</div>
                </div>
                <div class="contact-information mt-4">
                    <ul>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"><i class="fa-solid fa-phone-volume"></i></div>
                                <div class="details">
                                    <div class="tittle">Phone Number </div>
                                    <span><a href="tel:+977-9801100988">+977-9801100988</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"><i class="fas fa-envelope"></i></div>
                                <div class="details">
                                    <div class="tittle">Mail Info</div>
                                    <span><a href="mailto:info@consultancynepal.com">info@consultancynepal.com</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="wrapper">
                                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="details">
                                    <div class="tittle">Location </div>
                                    <span>Putalisadak , kathmandu</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="social-media-wrapper mt-4">
                    <div class="date-title">
                        <div class="title">Follow Us On Social Media:</div>
                    </div>
                    <div class="socials-media mt-3">
                        <div class="icon-wrapper">
                            <a href="">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="icon-wrapper">
                            <a href="">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div class="icon-wrapper">
                            <a href="">
                                <i class="fa-brands fa-square-twitter"></i>
                            </a>
                        </div>
                        <div class="icon-wrapper">
                            <a href="">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="contact-us-form form-element ">
                    <div class="title">Send us a <span>Message</span></div>
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
                    <form action="" method="post">
                        <div class="row gy-2">
                            <div class="col-lg-6 col-md-6">
                                <label for="" class="form-label">First Name:</label>
                                <input type="text" name="fname" id="" class="form-control" placeholder="" value="<?= $old['fname'] ?>" aria-describedby="helpId">
                                <span class="error-message"> <?= $errors['fname'] ?> </span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="" class="form-label">Last Name:</label>
                                <input type="text" name="lname" id="" class="form-control" placeholder="" value="<?= $old['lname'] ?>" aria-describedby="helpId">
                                <span class="error-message"> <?= $errors['lname'] ?> </span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="" class="form-label">Email:</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="" value="<?= $old['email'] ?>" aria-describedby="helpId">
                                <span class="error-message"> <?= $errors['email'] ?> </span>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="" class="form-label">Number:</label>
                                <input type="text" name="number" id="" class="form-control" value="<?= $old['number'] ?>" aria-describedby="helpId">
                                <span class="error-message"> <?= $errors['number'] ?> </span>
                            </div>
                            <div class="col-lg-12">
                                <label for="" class="form-label">Subject:</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="" value="<?= $old['subject'] ?>" aria-describedby="helpId">
                                <span class="error-message"> <?= $errors['subject'] ?> </span>
                            </div>
                            <div class="col-lg-12">
                                <label for="" class="form-label">Message:</label>
                                <textarea class="form-control" name="message" id="" rows="3"><?= $old['message'] ?></textarea>
                                <span class="error-message"> <?= $errors['message'] ?> </span>
                            </div>
                        </div>
                        <div class="custom-btn  mt-4">
                            <button class="btn btn-md ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.4560520499954!2d85.32008437621374!3d27.703202125672895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a64b5f13e1%3A0x28b2d0eacda46b98!2sPutalisadak%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1682411261657!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php include "footer.php"; ?>