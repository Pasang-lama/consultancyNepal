<?php
$findData = $db->SelectAll("settings", []);
if ($findData) {
    $settingData = $findData[0];
}
$testprepartion = $db->CustomQuery("SELECT * FROM test_preparation LIMIT 0,10"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($title)) { ?>
        <title>
            <?= $title ?>
        </title>
        <meta content="<?= $title ?>" property="og:title">
    <?php } else {
        echo ""; ?>
        <meta content="Consultancy Nepal" property="og:title">
    <?php } ?>
    <?php if (isset($content)) { ?>
        <meta content="<?= $content ?>" name="description">
        <meta content="<?= $content ?>" property="og:description">
    <?php } else { ?>
        <meta content="Top coonsultancy in nepal" name="description">
        <meta content="Top coonsultancy in nepal" property="og:description">
    <?php } ?>
    <?php if (isset($img)) { ?>
        <meta content="<?= $base_url ?>cnbackend/public/<?= $img ?>" property="og:image">
    <?php } ?>
    <link href="<?php echo $base_url; ?>assets/images/logo-2.png" rel="icon">
    
    <link rel="stylesheet" href="<?=$base_url?>assets/css/style.css">
    <link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?=$base_url?>assets/css/fancybox.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <link rel="preload" as="font" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" type="font/woff2" crossorigin="anonymous">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9DMDXYHYNV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9DMDXYHYNV');
    </script>
</head>

<body>
    <?php
    require_once "navbar.php";
    ?>