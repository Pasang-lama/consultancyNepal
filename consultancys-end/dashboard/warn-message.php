<?php

if (isset($_SESSION['messages'])) {
?>

    <div class="alert alert-danger alert-dismissible fade show col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" role="alert">
        <strong>UnSuccess!</strong> <?=$_SESSION['messages']?>
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </a>
    </div>
<?php
    unset($_SESSION['messages']);
} else {
}
?>