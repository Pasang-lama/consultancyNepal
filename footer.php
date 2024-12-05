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
                        <li><a href="<?= $base_url ?>about" class="pad-left"><i class="fa-solid fa-angles-right"></i>&nbsp; About Us</a></li>
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
                        <li><a href="<?= $base_url ?>privacy-policy" class="pad-left"><i class="fa-solid fa-angles-right"></i> &nbsp;Privacy
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
<!-- footer advertisement  -->
<?php
$ads_alls = adsFetch(18, 1, 1);
if (!empty($ads_alls)) {
    foreach ($ads_alls as $ads) {
?>
        <section class="footer-advertisement">
            <div class="container">
                <div class="wrapper">
                    <button class="close-btn" onclick="closefooterad()"><i class="fas fa-times"></i></button>
                    <figure>
                        <a href="<?= $ads->link ?>">
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
                </div>
            </div>
        </section>
<?php }
} ?>
<a href="#" class="to-top"><i class="fa fa-chevron-up"></i></a>
<!-- footer close -->


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

<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Organization",
        "url": "https://www.consultancynepal.com/",
        "logo": "http://localhost/Consultancy-Nepal/cnbackend/public/uploads/setting/IMG-64268354aae0f0.98861700.webp",
        "email": "  info@consultancynepal.com",
        "address": "   Putalisadak, Kathmandu",
        "telephone": "  +977-9801169142",
        "location": {
            "@type": "Place",
            "name": "   Putalisadak, Kathmandu"
        }
    }
</script>
<script src="<?= $base_url ?>/assets/js/jquery-3.6.1.min.js"></script><!-- jquery js -->
<script src="<?= $base_url ?>/assets/js/bootstrap.min.js"></script><!-- bootstrap js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.plugins.min.js"></script>
<script src="<?= $base_url ?>/assets/js/slick.min.js"></script>
<script src="<?= $base_url ?>/assets/js/main.js"></script>
<script src="<?= $base_url ?>/assets/js/fancybox.umd.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $(".lazy").Lazy();
    });
    $(".redirect").on("click", function() {
        // var type = $(this).data("type")
        $.ajax({
            type: "POST",
            url: "set_session.php",
            //  data:{type:type},
        });
    });
    $(window).on("load", function() {
        $("#popupModal").modal("show");
    });

    $(document).on("keydown", function(event) {
        if (event.key == "Escape") {
            $("#popupModal").modal("hide");
        }
    });

    $("#popupModalCloseBtn").on("click", function() {
        $("#popupModal").modal("hide");
    });

    $("#popupModal").on("show.bs.modal", function() {
        $("body").addClass("popupModal-padding-overlap");
    });

    $("#popupModal").on("shown.bs.modal", function() {
        $("body").removeAttr("style");
        var modalObj = $(this).find(".modal-content");
        $(modalObj).height("auto");
        if ($(modalObj).height() > $(window).height() * 0.9) {
            $(modalObj).height($(window).height() * 0.9);
        }
    });

    var callback = function() {
        jQuery("#popupModal").each(function(idx, item) {
            var modalObj = $(item).find(".modal-content");
            $(modalObj).height("auto");
            if ($(modalObj).height() > $(window).height() * 0.9) {
                $(modalObj).height($(window).height() * 0.9);
            }
        });
    };

    $(window).resize(callback);
</script>
<script async defer src="https://www.googletagmanager.com/gtag/js?id=G-9DMDXYHYNV"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-9DMDXYHYNV');
</script>
<script>
    function isDesktop() {
        console.log(window.matchMedia("(min-width: 768px)").matches);
    }
</script>
<script>
    var $select1 = $("#select1"),
        $select2 = $("#select2"),
        $options = $select2.find("option");
    $select1
        .on("change", function() {
            $select2.html($options.filter('[value="' + this.value + '"]'));
        })
        .trigger("change");
</script>
<?php if ($url[1] == 'consultancy') {
?>
    <script>
        $(document).ready(function() {

            $(".livesearchc").on("keyup", function() {
                    // $("#consultancys").hide();
                    var n = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "cons.php",
                        data: {
                            key: n
                        },
                        cache: !1,
                        beforeSend: function() {
                            // $("#loader").show();
                        },
                        success: function(n) {
                            // $("#consultancys").show(),
                            $("#consultancys").html(n),
                                $("#consultancys").fadeIn("slow");
                        },
                        complete: function() {
                            // $("#loader").hide();
                        },
                    });
                }),
                $('[type="checkbox"]').is(":checked") ||
                $.ajax({
                    url: "cons.php",
                    cache: !1,
                    beforeSend: function() {
                        // $("#loader").show();
                    },
                    success: function(n) {
                        // $("#consultancys").fadeOut("fast"),
                        $("#consultancys").html(n),
                            $("#consultancys").fadeIn("slow");
                    },
                    complete: function() {
                        // $("#loader").hide();
                    },
                }),
                $(".checkbox").change(function() {
                    $('[type="checkbox"]').is(":checked") ?
                        $("#consultancys").hide() :
                        $.ajax({
                            url: "cons.php",
                            cache: !1,
                            beforeSend: function() {
                                // $("#loader").show();
                            },
                            success: function(n) {
                                $("#consultancys").html(n), $("#consultancys").fadeIn("slow");
                            },
                            complete: function() {
                                // $("#loader").hide();
                            },
                        });
                });
            $("#filterbyprovience").change(function() {
                var selectedValue = $(this).val();
                console.log(selectedValue);
                $.ajax({
                    type: "POST",
                    url: "cons.php",
                    data: {
                        province: selectedValue
                    },
                    cache: !1,
                    beforeSend: function() {
                        // $("#loader").show();
                    },
                    success: function(n) {
                        // console.log(n);
                        $("#consultancys").html(n), $("#consultancys").fadeIn("slow");
                    },
                    complete: function() {
                        // $("#loader").hide();
                    },
                });
            });
        });
    </script>
    <script>
        function askQuestionclick(id) {
            document.getElementById("setconsultancyid").value = id;
        }
    </script>
    <script>
        var val = 10;
        var flag = true;
        $(window).scroll(function() {
            var elem = $(".livesearchc");
            var prov = $("#filterbyprovience").val();
            console.log(prov);
            var vals = $(elem).val();
            if (vals.trim() == "" && prov <= 0) {
                if ($(window).scrollTop() >= $(document).height() - $(window).height() - 200) {
                    val += 8;
                    if (flag == true) {
                        $.ajax({
                            type: "POST",
                            url: "cons.php",
                            data: {
                                value: val
                            },
                            cache: false,
                            beforeSend: function() {
                                // $("#loader").show();
                            },
                            success: function(response) {
                                // console.log(response);
                                if (response == 1) {
                                    flag = false;
                                } else {
                                    $("#consultancys").append(response);
                                    $("#consultancys").fadeIn("slow");
                                }
                            },
                            complete: function() {
                                // $("#loader").hide();
                            }
                        });
                    }
                }
            } else {
                val = 10;
            }
        });
    </script>
<?php
} ?>
</body>

</html>