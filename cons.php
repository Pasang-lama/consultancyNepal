<?php
// Get the protocol
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the domain
$domain = $_SERVER['HTTP_HOST'];

// Get the path
$path = dirname($_SERVER['SCRIPT_NAME']);

// Build the base URL
$base_url = $protocol . '://' . $domain . $path.'/';
require_once "database/Database.php";
$db = Database::Instance();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["value"])) {
        $value = $_POST["value"];
        $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC limit $value,8");
        if (empty($consultancyData)) {
            echo 1;
            die;
        }
    }
    if (isset($_POST["province"])) {
        if($_POST["province"]!=0){
        $consultancyData = $db->CustomQuery(
            "SELECT * FROM consultancies where Province={$_POST["province"]}"
        );
        if (empty($consultancyData)) {
            echo '<h2>No Consultancy Found </h2>';
            die;
        }
    }else{
        $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC limit 8");
    }
    }
    if (isset($_POST["pid"])) {
        if ($_POST["pid"] === "rev") {
            $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC");
        } else {
            $consultancyData = $db->CustomQuery(
                "SELECT * FROM consultancies where Province={$_POST["pid"]}"
            );
            if ($consultancyData == null) {
                $consultancyData = $db->CustomQuery(
                    "SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC"
                );
            }
        }
    } elseif (isset($_POST["did"])) {
        if ($_POST["did"] === "rev") {
            $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC");
        } else {
            $consultancyData = $db->CustomQuery(
                "SELECT * FROM consultancies where District={$_POST["did"]}"
            );
            if ($consultancyData == null) {
                $consultancyData = $db->CustomQuery(
                    "SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC"
                );
            }
        }
    } elseif (isset($_POST["cid"])) {
        if ($_POST["cid"] === "rev") {
            $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC");
        } else {
            $consultancyData = $db->CustomQuery(
                "SELECT * FROM consultancies where City={$_POST["cid"]}"
            );
            if ($consultancyData == null) {
                $consultancyData = $db->CustomQuery(
                    "SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC"
                );
            }
        }
    } elseif (isset($_POST['aid'])) {
        if ($_POST["aid"] === "rev") {
            $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC");
        } else {
            $consultancyData = $db->CustomQuery(
                "SELECT * FROM consultancies where area={$_POST["aid"]}"
            );
            if ($consultancyData == null) {
                $consultancyData = $db->CustomQuery(
                    "SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC"
                );
            }
        }
    } elseif (isset($_POST["key"])) {
        $search_data = trim($_POST["key"]);

        if ($search_data == "") {
            $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC limit 8");
        } else {
            $consultancyData = $db->CustomQuery(
                "SELECT * from consultancies where consultancy_name like '%{$search_data}%'"
            );
            if (empty($consultancyData)) {
                echo "<h4>No Result Found On Key : {$search_data}</h4>";
                die();
            }
        }
    }
} else {
    $consultancyData = $db->CustomQuery("SELECT * FROM rank_consultancy JOIN consultancies ON rank_consultancy.consultancy_id=consultancies.id ORDER BY `rank_consultancy`.`rank` ASC limit 8");
}
?>

<div class="row gy-4">
    <?php foreach ($consultancyData as $consultancy) { ?>
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

<form name="myForm" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="consultancy_id" id="setconsultancyid" hidden>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">First Name <span class="text-danger" id="fnameerrorforconsultancy">
                                    </span></label>
                                <input type="text" id="fnameforconsultancy" name="fname" class="form-control" placeholder="" aria-describedby="helpId" required="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Last Name <span class="text-danger" id="lnameerror">
                                    </span></label>
                                <input type="text" id="lnameforconsultancy" name="lname" class="form-control" placeholder="" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email<span class="text-danger" id="emailerror">

                                </span></label>
                            <input type="email" id="emailforconsultancy" name="email" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Number <span class="text-danger" id="numbererror">

                                </span></label>
                            <input type="number" id="numberforconsultancy" name="number" class="form-control" aria-describedby="helpId" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Subject <span class="text-danger" id="subjecterror">

                                </span></label>
                            <input type="text" id="subjectforconsultancy" name="subject" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message <span class="text-danger" id="messageerror">
                                </span> </label>
                            <textarea class="form-control" id="messageforconsultancy" name="message" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="sendMessageToConsultancy" type="submit">Send message</button>
                </div>
            </div>
        </div>
    </div>
</form>