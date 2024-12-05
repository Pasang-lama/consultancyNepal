<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
$flag = false;
// print_r($_POST);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $pre);
    $id = $_POST["id"];
    $d = $db->CustomQuery("SELECT slug,is_specific FROM {$page_type_table} WHERE id={$id}");
     $sl = $d[0]->slug;
      $sp = $d[0]->is_specific;
// die;
         $insert_params["is_specific"] = $_POST["specific"];
         $insert_params["tables"]=$_POST['table'];
    
    if($_POST["specific"]=="1"  && $sp=="1"){
      
        
        if($slug == $sl){
            $flag=true; 
        
        }else{

            
                  $db->CreateTable("RENAME TABLE `consulta_consultancynepal`.`$sl` TO `consulta_consultancynepal`.`$slug`");
                  $db->Update("tables",["table_name"=>$slug],"table_name",[$sl]);
   

                // Assuming $slug is already defined and sanitized
                $oldName = "/home3/consultancynepal/public_html/$sl.php";
                $newName = "/home3/consultancynepal/public_html/$slug.php";
                
                // rename($del_file, $fileName);
                if (file_exists($oldName)) {

    if (rename($oldName, $newName)) {
        echo "The file has been renamed to $newName";
    } else {
        echo "There was an error renaming the file.";
    }
} else {
    echo "The file $oldName does not exist.";
}
      
        }
        
        
        
    }else{
        if($_POST["specific"]=="0"  && $sp=="1"){
         
            
            
            
            $del_file = "/home3/consultancynepal/public_html/$sl.php";

            // Check if file exists
                if (file_exists($del_file)) {
                // Attempt to delete the file 
                    if (unlink($del_file)) {
                        echo "The file has been deleted."; 
                        $db->CreateTable("DROP TABLE `consulta_consultancynepal`.`$sl`");
                        
                        //  $insert_params["tables"]=$_POST['table'];
                    } else {
                        echo "There was an error trying to delete the file.";
                        die;
                    }
                } else {
                    echo "The file does not exist.";
                    die;
                    }
                    
                  
                
                
                

        }elseif($_POST["specific"]=="1"  && $sp=="0"){
            // print_r($_POST);
            // die;
                // $insert_params["is_specific"] = $_POST["specific"];
                //  $insert_params["tables"]=$_POST['table'];
                    $db->CreateTable("CREATE TABLE `$slug` LIKE pages");
                    $db->CreateTable("ALTER TABLE `$slug` ADD `extras` INT NOT NULL AFTER `phone`");
                    $db->Insert("tables",["table_name"=>$slug]);
                    // Assuming $slug is already defined and sanitized
                    $fileName = "/home3/consultancynepal/public_html/" . $slug . ".php";
                    $fileContent = "<?php 
                    require_once 'database/Database.php';\n
                    require_once 'header.php';\n
                    \$db =Database::Instance();\n
                    \$datas = \$db->CustomQuery(\"select * from $slug where slug='\$url[1]'\");\n
                    require_once 'footer.php';
                    
                    ?>";

    // Check if file already exists
    if (!file_exists($fileName)) {
        // Try to create the file
        if (file_put_contents($fileName, $fileContent) !== false) {
            // echo "File created (" . realpath($fileName) . ")";
            
            // $insert_params["tables"]=$_POST['table'];
            // print_r($insert_params);
          
        } else {
            echo "Cannot create file (" . $fileName . ")";
              die;
        }
    } else {
        echo "File already exists (" . $fileName . ") Try with the another filename";
        die;
    }
            
            
            
            
            
            
        }
    
        
    }
    echo "helo";
    
    
    
    
    $img_url = $_POST["img_url"];
    $image_name = $_FILES["pagetypeimage"]["name"];
    if (empty($image_name)) {
        //$insert_params = ['title' => $_POST['title'], 'slug' => $slug, 'description' => $_POST['detailckediter'], 'status' => $_POST['status']];
        $insert_params["title"] = $_POST["title"];
$insert_params["slug"] = $slug; // Make sure $slug is sanitized
$insert_params["description"] = $_POST["detailckediter"];
$insert_params["status"] = $_POST["status"];
    } else {
        $image = $_FILES["pagetypeimage"]["tmp_name"];
        move_uploaded_file($image, "$image_name");
        $originalImage = null;
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        if ($ext === 'jpg' || $ext === 'jpeg') {
            $originalImage = imagecreatefromjpeg("$image_name");
        } else if ($ext === 'png') {
            $originalImage = imagecreatefrompng("$image_name");
        } else if ($ext === 'gif') {
            $originalImage = imagecreatefromgif("$image_name");
        }
        if ($originalImage === false) {
            exit;
        }
        $originalWidth = imagesx($originalImage);
        $originalHeight = imagesy($originalImage);
        $resizedImage = imagecreatetruecolor($originalWidth, $originalHeight);
        imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $originalWidth, $originalHeight, $originalWidth, $originalHeight);
        $new_img = uniqid("IMG-", TRUE);
        $new_img_name = "{$new_img}.webp";
        $webp_path = "../../../public/uploads/pagetype/{$new_img_name}";
        $imgpath = "../../../public/";
        imagewebp($resizedImage, $webp_path, 80);
        imagedestroy($resizedImage);
        imagedestroy($originalImage);
        unlink("{$image_name}");
        unlink($imgpath . $img_url);
        // $insert_params = ['title' => $_POST['title'], 'slug' => $slug, 'description' => $_POST['detailckediter'],
        
        // 'image' => "uploads/pagetype/$new_img_name", 'status' => $_POST['status']];
        $insert_params["title"] = $_POST["title"];
        $insert_params["slug"] = $slug; // Make sure $slug is sanitized
        $insert_params["description"] = $_POST["detailckediter"];
        $insert_params["status"] = $_POST["status"];
        $insert_params["image"] = "uploads/pagetype/" . $new_img_name;
    }
    if ($db->Update($page_type_table, $insert_params, "id", [$id])) {
        
        if($flag==false){
        $params = ['slug' => $slug];
        $db->Update($slugs_table, $params, "slug", [$sl]);
        }
        $_SESSION['message'] = 'PageType Edited Successfully';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpagetype";';
        echo '</script>';
        die();
    } else {
        $_SESSION['messages'] = 'PageType Edited failed';
        echo '<script type="text/javascript">';
        echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpagetype";';
        echo '</script>';
        die();
        header("location:https://www.consultancynepal.com/cnbackend/showbanner");
    }
}