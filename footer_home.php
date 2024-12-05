<?php
$pageTypeData = $db->SelectAll("page_types");
$findData = $db->SelectAll("settings", []);
if ($findData) {
    $settingData = $findData[0];
}
$countryData = $db->CustomQuery("SELECT * FROM countries LIMIT 5");
$testprepartion1 = $db->CustomQuery("SELECT * FROM test_preparation LIMIT 0,5");
$testprepartion2 = $db->CustomQuery("SELECT * FROM test_preparation LIMIT 5,10"); ?>


<!-- footer start -->
<footer class="py-lg-5 py-3">
    <div class="container">
        <div class="footer-main">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <span class="title">Study Destination</span>
                    <ul>
                        <?php foreach ($countryData as $country) :  ?>
                            <li><a href="<?php echo $base_url; ?><?= $country->country_slug; ?>" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Study in
                                    <?= $country->country_name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-3 mb-3">
                    <span class="title">Test Preparation</span>
                    <ul>

                        <?php foreach ($testprepartion1 as $test1) :  ?>

                            <li><a href="<?php echo $base_url ?><?php echo $test1->slug; ?>" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;
                                    <?php echo $test1->title ?>
                                </a></li>

                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-3 mb-3">
                    <span class="title">Tags</span>
                    <ul>
                        <li><a href="<?= $base_url ?>consultancy" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Explore Consultancy</a></li>

                        <li><a href="<?= $base_url ?>events" class="pad-left"><i class="fa-solid fa-angles-right"></i>
                                &nbsp;Events</a></li>

                        <li><a href="<?= $base_url ?>faq" class="pad-left"><i class="fa-solid fa-angles-right"></i>
                                &nbsp;Study Abroad FAQ</a></li>

                        <li><a href="#" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;International
                                Study Guide</a></li>

                        <li><a href="<?= $base_url ?>language-center" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Language Center</a></li>
                        <li><a href="#" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Terms of Use</a>
                        </li>
                        <li><a href="#" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Privacy
                                Policy</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 mb-3 contact-us-footer">
                    <span class="title">Contact Info</span>
                    <ul>
                        <li><a href="#" class="pad-left"><i class="fa-solid fa-location-dot"></i>
                                &nbsp;<?= $settingData->company_address; ?></a></li>


                        <li><a href="#" class="pad-left"><i class="fa-solid fa-phone-volume"></i>
                                &nbsp;<?= $settingData->company_phone; ?></a></li>

                        <li><a href="#" class="pad-left"><i class="fa-solid fa-envelope-circle-check"></i>
                                &nbsp;<?= $settingData->company_email; ?></a></li>
                    </ul>
                    <ul class="social-media d-flex mt-3">
                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy"></div>
    </div>
</footer>


<a href="#" class="to-top"><i class="fa fa-chevron-up"></i></a>

<!-- popup modal for class register  -->
<div class="modal upcommingClass-Modal fade" id="classRegisterForm" tabindex="-1" aria-labelledby="classRegisterFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">Fill this for <span>Registration</span></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-element ">
                    <form action="cnbackend/database/actions/classRegister/insert.php" method="post">
                        <div class="row gy-2">
                            <div class="col-12">
                                <label for="" class="form-label">Full Name:</label>
                                <input type="text" name="name" class="form-control" aria-describedby="helpId" required>
                                <span class="error-message"> </span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Number:</label>
                                <input type="text" name="number" id="" class="form-control" aria-describedby="helpId" required>
                                <span class="error-message"> </span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" aria-describedby="helpId" required>
                                <span class="error-message"> </span>
                            </div>
                        </div>
                        <div class="custom-btn  mt-4">
                            <button class="btn btn-md " type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal upcommingClass-Modal fade" id="classDetailsModal" aria-hidden="true" aria-labelledby="classDetailsModalLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" id="testDetails">
    </div>
</div>

<!-- footer close -->
<script>
   function getTest(str) {
 
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("testprep").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "getTest.php?id=" + str, true);
    xmlhttp.send();
  
}
</script>




<script src="<?= $base_url ?>/assets/js/jquery-3.6.1.min.js"></script>
<script src="<?= $base_url ?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.plugins.min.js"></script>
<script src="<?= $base_url ?>/assets/js/slick.min.js"></script>
<script src="<?= $base_url ?>/assets/js/main.js"></script>
<script defer src="<?= $base_url ?>/assets/js/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= $base_url ?>/assets/js/fancybox.umd.js"></script>

</body>

</html>