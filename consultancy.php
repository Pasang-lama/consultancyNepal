<?php
include "header.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['sendMessageToConsultancy'])) {
    unset($_POST["sendMessageToConsultancy"]);
    $name =  $_POST["fname"] . " " . $_POST["lname"];
    $email =  $_POST["email"];
    $number =  $_POST["number"];
    $subject =  $_POST["subject"];
    $message =  $_POST["message"];
    $consultancy_id =  $_POST["consultancy_id"];
    // SQL query to insert data
    $query = "INSERT INTO  consultancy_enquery (name, email, number, subject, message, consultancy_id) 
              VALUES ('$name', '$email', '$number', '$subject', '$message', '$consultancy_id')";
    $insert = $db->CustomQuery($query);
    if ($insert) {
        $_SESSION["sucess"] = "Message send sucessfully";
        ?>
                <script>
                    // Use JavaScript to redirect to the desired page
                    window.location.href = "<?php echo $base_url . $url[1]; ?>";
                </script>
<?php
                exit();
    } else {
        $_SESSION["erros"] = "Faild To Send message";
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
<nav class="breadcrumb breadcrumb-bg">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $base_url ?>"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Consultancy</li>
        </ol>
    </div>
</nav>

<section class="Consultancy-list page-content my-5">
    <div class="container">
        <div class="date-title">
            <div class="title">Consultancy</div>
            <div class="filter">
                <div class="filter-by-provience">
                    <label for="filterbyprovience">Province: </label>
                    <select class="form-select"  name="filterbyprovience" id="filterbyprovience">
                        <option value="0">------All Province------</option>
                    <?php 
                    $province = $db->CustomQuery("select * from province");
                    foreach($province as $data):
                        ?>
                        <option value="<?=$data->id?>" data-province="<?=$data->id?>"><?=$data->Province_name?></option>
                        <?php
                    endforeach;
                    
                    ?>
                    </select>
                </div>
                <div class="consultancy-search-input">
                    <label for="my-searchs">Search: </label>
                    <input class="livesearchc form-control" id="my-searchs" name="search" type="search" autocomplete="off" placeholder="Search consultancy">
                </div>
            </div>
        </div>
        <img id="loader" class="d-none" src="loading.gif" style="margin-left:40%;">
        <div class="consultancy-list-wrapper mt-3" id="consultancys"></div>
    </div>
</section>
<?php include "footer.php"; ?>