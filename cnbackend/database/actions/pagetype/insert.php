<?php 
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert_params=[];
    session_start();
     $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    $slug = preg_replace("/-+/", "-", $pre);

    
    
    if($_POST["specific"]=="1"){
        $insert_params["is_specific"] = $_POST["specific"];
    $db->CreateTable("CREATE TABLE `$slug` LIKE pages");
    $db->CreateTable("ALTER TABLE `$slug` ADD `extras` INT NOT NULL AFTER `phone`");
    // Assuming $slug is already defined and sanitized
    $fileName = "/home3/consultancynepal/public_html/" . $slug . ".php";
    $fileContent = "<?php 
    require_once 'database/Database.php';\n
    require_once 'header.php';\n
    \$db =Database::Instance();\n
    \$datas = \$db->CustomQuery(\"select * from \$slug where slug='\$url[1]'\");\n
    \$data=\$datas[0];
    <nav class='breadcrumb breadcrumb-bg'>
        <div class='container'>
            <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='<?= \$base_url ?>'><i class='fa-solid fa-house'></i></a></li>
                <li class='breadcrumb-item active' aria-current='page'><?=\$data->title?></li>
            </ol>
        </div>
    </nav>

    <section class='about-us-section page-content my-5'>
        <div class='container'>
            <div class='date-title'>
                <h1 class='title'><?=\$data->title?></h1>
            </div>
            <div class='text-document-content mt-3'>
            <?=\$data->description?>
            </div>
        </div>
    </section>
    require_once 'footer.php';
    
    ?>";

    // Check if file already exists
    if (!file_exists($fileName)) {
        // Try to create the file
        if (file_put_contents($fileName, $fileContent) !== false) {
            // echo "File created (" . realpath($fileName) . ")";
            
            $insert_params["tables"]=$_POST['table'];
            print_r($insert_params);
          
        } else {
            echo "Cannot create file (" . $fileName . ")";
              die;
        }
    } else {
        echo "File already exists (" . $fileName . ") Try with the another filename";
        die;
    }
    
    
}
// Output the file content for debugging purposes
// echo htmlspecialchars($fileContent);
// die;
    $raw_image = $_FILES["pagetypeimage"];
    $img_name = $_FILES["pagetypeimage"]["name"];
    $img_size = $_FILES["pagetypeimage"]["size"];
    $tmp_name = $_FILES["pagetypeimage"]["tmp_name"];
    
    
    $imageerror = $_FILES["pagetypeimage"]["error"];
    // $pre = preg_replace("/[^A-Za-z0-9\-]/", "-", $_POST["slug"]);
    // $slug = preg_replace("/-+/", "-", $pre);
    $img = $_FILES["pagetypeimage"];
    $image_name = $_FILES["pagetypeimage"]["name"];
    if (empty($image_name)) {
$insert_params["title"] = $_POST["title"];
$insert_params["slug"] = $slug; // Make sure $slug is sanitized
$insert_params["description"] = $_POST["detailckediter"];
$insert_params["status"] = $_POST["status"];
// $insert_params["image"] = "uploads/pagetype/" . $new_img_name;

// Now $insert_params contains all the keys and values
// print_r($insert_params);
    } else {
        $image = $_FILES["pagetypeimage"]["tmp_name"];
        move_uploaded_file($image, "$image_name");
        $originalImage = null;
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        if ($ext === "jpg" || $ext === "jpeg") {
            $originalImage = imagecreatefromjpeg("$image_name");
        } elseif ($ext === "png") {
            $originalImage = imagecreatefrompng("$image_name");
        } elseif ($ext === "gif") {
            $originalImage = imagecreatefromgif("$image_name");
        }
        if ($originalImage === false) {
            exit();
        }
        $originalWidth = imagesx($originalImage);
        $originalHeight = imagesy($originalImage);
        $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        imagecopyresampled(
            $resizedImage,
            $originalImage,
            0,
            0,
            0,
            0,
            $originalWidth,
            $originalHeight,
            $originalWidth,
            $originalHeight
        );
        $new_img = uniqid("IMG-", true);
        $new_img_name = "{$new_img}.webp";
        $webp_path = "../../../public/uploads/pagetype/{$new_img_name}";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        $insert_params["title"] = $_POST["title"];
        $insert_params["slug"] = $slug; // Make sure $slug is sanitized
        $insert_params["description"] = $_POST["detailckediter"];
        $insert_params["status"] = $_POST["status"];
        $insert_params["image"] = "uploads/pagetype/" . $new_img_name;
    }
    
    // print_r($insert_params);
    // die;
    if ($db->Insert($page_type_table, $insert_params)) {
        move_uploaded_file($tmp_name, $img_upload_path);
        $_SESSION["message"] = "Page Type Added Successfully";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpagetype";';
        echo "</script>";
        die();
    } else {
        $_SESSION["messages"] = "Pager Type Addition failed";
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/addpagetype";';
        echo "</script>";
        die();
        header(
            "location:https://www.consultancynepal.com/cnbackend/addpagetype"
        );
    }
}
