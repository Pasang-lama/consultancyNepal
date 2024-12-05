<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["prev_extra"]) && !isset($_POST["extras"])) { 
    // print_r($_POST);
    // die; 
        // $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
        // $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
        $table_n = "$_POST[prev_extra]";
        
        $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
        $slug = preg_replace('/-+/', '-', $pre);
        $id = $_POST["id"];
        $del_id = $_POST["id"];

        // Start
        //1. updating the table data of the original table



        $d = $db->CustomQuery("SELECT slug FROM `$table_n` WHERE id={$id}");
        $sl = $d[0]->slug;
        $slug4 = $db->CustomQuery("SELECT slug FROM {$slugs_table} WHERE slug='$sl'");
        if (empty($slug4)) {
            $params = ['page_name ' => "$table_n", 'slug' => $sl];
            $db->Insert($slugs_table, $params);
        }
        $img_url = $_POST["img_url"];
        $image_name = $_FILES["pageimage"]["name"];
        if (empty($image_name)) {
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
        } else {
            $image = $_FILES["pageimage"]["tmp_name"];
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
            $webp_path = "../../../public/uploads/page/{$new_img_name}";
            $imgpath = "../../../public/";
            imagewebp($resizedImage, $webp_path, 80);
            imagedestroy($resizedImage);
            imagedestroy($originalImage);
            unlink("{$image_name}");
            unlink($imgpath . $img_url);
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
        }
        if ($db->Update($table_n, $insert_params, "id", [$id])) {


            // 2.Slug Updating
            $params = ['page_name ' => `$table_n`, 'slug' => $slug];
            $db->Update($slugs_table, $params, "slug", [$sl]);

            //3. copying the data from the one table to the another table

            $db->CreateTable("INSERT INTO `pages`
                    (`title`, `slug`, `status`, `meta_title`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`)
                    SELECT 
                    `title`, `slug`, `status`, `meta_title`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`
                    FROM `$table_n` 
                    WHERE `$table_n`.id=$id");


            //4. Updating the slug  after the copy  of the data form the orignal table 
            $d = $db->CustomQuery("SELECT slug FROM `$table_n` WHERE id={$id}");
            $sl = $d[0]->slug;
            $upp = ["page_name" => "langin"];
            $db->Update($slugs_table, $upp, "slug", [$sl]);



            //5. Deleting the ond data from the old table
            // delete code 
            $where ="id";
            $db->delete($table_n, $where, [$del_id]);

            $_SESSION['message'] = 'Pages Edited Successfully';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
        } else {
            $_SESSION['messages'] = 'Pages Edited failed';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
            header("location:https://www.consultancynepal.com/cnbackend/showbanner");
        }








        // end









    }




    if (!isset($_POST["prev_extra"]) && isset($_POST["extras"])) {
        // $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
        // $table_n = $table[0]->slug;
        // $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
        // $slug = preg_replace('/-+/', '-', $pre);
        // $id = $_POST["id"];

        // Start
        //1. updating the table data of the original table


        $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
        $slug = preg_replace('/-+/', '-', $pre);
        $id = $_POST["id"];
        $del_id=$id;
        $d = $db->CustomQuery("SELECT slug FROM {$pages_table} WHERE id={$id}");
        $sl = $d[0]->slug;
        $slug4 = $db->CustomQuery("SELECT slug FROM {$slugs_table} WHERE slug='$sl'");
        if (empty($slug4)) {
            $params = ['page_name ' => 'langin', 'slug' => $sl];
            $db->Insert($slugs_table, $params);
        }
        $img_url = $_POST["img_url"];
        $image_name = $_FILES["pageimage"]["name"];
        if (empty($image_name)) {
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
        } else {
            $image = $_FILES["pageimage"]["tmp_name"];
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
            $webp_path = "../../../public/uploads/page/{$new_img_name}";
            $imgpath = "../../../public/";
            imagewebp($resizedImage, $webp_path, 80);
            imagedestroy($resizedImage);
            imagedestroy($originalImage);
            unlink("{$image_name}");
            unlink($imgpath . $img_url);
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
        }
        if ($db->Update($pages_table, $insert_params, "id", [$id])) {

            // 2.Slug Updating
            $params = ['page_name ' => 'langin', 'slug' => $slug];
            $db->Update($slugs_table, $params, "slug", [$sl]);


            //3. copying the data from the one table to the another table

            //--finding out the table
            $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
            $table_n = $table[0]->slug;

            $db->CreateTable("INSERT INTO `$table_n`
                    (`title`, `slug`, `status`, `meta_title`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`)
                    SELECT 
                    `title`, `slug`, `status`, `meta_title`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`
                    FROM `pages` 
                    WHERE `pages`.id=$id");

            //add the extra column value 

            $db->Update($table_n, ["extras" => $_POST["extras"]], "slug", [$slug]);



            //4. Updating the slug  after the copy  of the data form the orignal table 
            $d = $db->CustomQuery("SELECT slug FROM `pages` WHERE id={$id}");
            $sl = $d[0]->slug;
            $upp = ["page_name" => "$table_n"];
            $db->Update($slugs_table, $upp, "slug", [$sl]);

            //5. Deleting the ond data from the old table
            // delete code 
            $where ="id";
            $db->delete($pages_table, $where, [$del_id]);




            // end

            $_SESSION['message'] = 'Pages Edited Successfully';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
        } else {
            $_SESSION['messages'] = 'Pages Edited failed';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
            header("location:https://www.consultancynepal.com/cnbackend/showbanner");
        }
    }




    if (isset($_POST["prev_extra"]) && isset($_POST["extras"])) {
        $table_old = $_POST["prev_extra"];
        $table_pres = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
        // print_r($table_pres);
        // die;
        $table_n_pres = $table_pres[0]->slug;


        //condition  id the table with  the old tble nams is the same as the old tabel name
        if ("$table_old" ==  "$table_n_pres") {




            $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
            $slug = preg_replace('/-+/', '-', $pre);
            $id = $_POST["id"];
            $d = $db->CustomQuery("SELECT slug FROM `$table_old` WHERE id={$id}");
            $sl = $d[0]->slug;
            $slug4 = $db->CustomQuery("SELECT slug FROM {$slugs_table} WHERE slug='$sl'");
            if (empty($slug4)) {
                $params = ['page_name ' => "$table_old", 'slug' => $sl];
                $db->Insert($slugs_table, $params);
            }
            $img_url = $_POST["img_url"];
            $image_name = $_FILES["pageimage"]["name"];
            if (empty($image_name)) {
                $insert_params = ['phone' => $_POST['phone'], "extras" => $_POST["extras"], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
            } else {
                $image = $_FILES["pageimage"]["tmp_name"];
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
                $webp_path = "../../../public/uploads/page/{$new_img_name}";
                $imgpath = "../../../public/";
                imagewebp($resizedImage, $webp_path, 80);
                imagedestroy($resizedImage);
                imagedestroy($originalImage);
                unlink("{$image_name}");
                unlink($imgpath . $img_url);
                $insert_params = ['phone' => $_POST['phone'], "extras" => $_POST["extras"], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
            }
            if ($db->Update($table_old, $insert_params, "id", [$id])) {
                $params = ['page_name ' => "$table_old", 'slug' => $slug];
                $db->Update($slugs_table, $params, "slug", [$sl]);
                $_SESSION['message'] = 'Pages Edited Successfully';
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
                echo '</script>';
                die();
            } else {
                $_SESSION['messages'] = 'Pages Edited failed';
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
                echo '</script>';
                die();
                header("location:https://www.consultancynepal.com/cnbackend/showbanner");
            }
        }
        //condition  if the table with  the old tble nams is the not same as the old tabel name
        else {






            // Start
            //1. updating the table data of the original table


            $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
            $slug = preg_replace('/-+/', '-', $pre);
            $id = $_POST["id"];
            $del_id = $id;
            $d = $db->CustomQuery("SELECT slug FROM `$table_old` WHERE id={$id}");
            $sl = $d[0]->slug;
            $slug4 = $db->CustomQuery("SELECT slug FROM {$slugs_table} WHERE slug='$sl'");
            if (empty($slug4)) {
                $params = ['page_name ' => "$table_old", 'slug' => $sl];
                $db->Insert($slugs_table, $params);
            }
            $img_url = $_POST["img_url"];
            $image_name = $_FILES["pageimage"]["name"];
            if (empty($image_name)) {
                $insert_params = ['phone' => $_POST['phone'], "extras" => $_POST["extras"], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
            } else {
                $image = $_FILES["pageimage"]["tmp_name"];
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
                $webp_path = "../../../public/uploads/page/{$new_img_name}";
                $imgpath = "../../../public/";
                imagewebp($resizedImage, $webp_path, 80);
                imagedestroy($resizedImage);
                imagedestroy($originalImage);
                unlink("{$image_name}");
                unlink($imgpath . $img_url);
                $insert_params = ['phone' => $_POST['phone'],"extras" => $_POST["extras"], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
            }
            if ($db->Update($table_old, $insert_params, "id", [$id])) {

                // 2.Slug Updating
                $params = ['page_name ' => "$table_old", 'slug' => $slug];
                $db->Update($slugs_table, $params, "slug", [$sl]);


                //3. copying the data from the one table to the another table

                //--finding out the table
                // $table = $db->CustomQuery("select slug from tables join page_types on page_types.tables = tables.id where page_types.id = $_POST[page_type]");
                // $table_n = $table[0]->slug;

                $db->CreateTable("INSERT INTO `$table_n_pres`
                    (`title`, `slug`, `status`, `meta_title`,`extras`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`)
                    SELECT 
                    `title`, `slug`, `status`, `meta_title`,`extras`, `meta_description`, `intro_text`, `description`, `image`, `page_type_id`, `phone`
                    FROM `$table_old` 
                    WHERE `$table_old`.id=$id");

                //add the extra column value 

                // $db->Update("$table_n",["extras"=>$_POST["extras"]],"slug",[$slug]);



                //4. Updating the slug  after the copy  of the data form the orignal table 
                $d = $db->CustomQuery("SELECT slug FROM `$table_old` WHERE id={$id}");
                $sl = $d[0]->slug;
                $upp = ["page_name" => "$table_n_pres"];
                $db->Update($slugs_table, $upp, "slug", [$sl]);

                //5. Deleting the ond data from the old table
                // delete code 
                $where ="id";
                $db->delete($table_old, $where, [$del_id]);




                // end

                $_SESSION['message'] = 'Pages Edited Successfully';
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
                echo '</script>';
                die();
            } else {
                $_SESSION['messages'] = 'Pages Edited failed';
                echo '<script type="text/javascript">';
                echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
                echo '</script>';
                die();
                header("location:https://www.consultancynepal.com/cnbackend/showbanner");
            }
        }
    }




    if (!isset($_POST["prev_extra"]) && !isset($_POST["extras"])) {
        $pre = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
        $slug = preg_replace('/-+/', '-', $pre);
        $id = $_POST["id"];
        $d = $db->CustomQuery("SELECT slug FROM {$pages_table} WHERE id={$id}");
        $sl = $d[0]->slug;
        $slug4 = $db->CustomQuery("SELECT slug FROM {$slugs_table} WHERE slug='$sl'");
        if (empty($slug4)) {
            $params = ['page_name ' => 'langin', 'slug' => $sl];
            $db->Insert($slugs_table, $params);
        }
        $img_url = $_POST["img_url"];
        $image_name = $_FILES["pageimage"]["name"];
        if (empty($image_name)) {
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'status' => $_POST['status']];
        } else {
            $image = $_FILES["pageimage"]["tmp_name"];
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
            $webp_path = "../../../public/uploads/page/{$new_img_name}";
            $imgpath = "../../../public/";
            imagewebp($resizedImage, $webp_path, 80);
            imagedestroy($resizedImage);
            imagedestroy($originalImage);
            unlink("{$image_name}");
            unlink($imgpath . $img_url);
            $insert_params = ['phone' => $_POST['phone'], 'title' => $_POST['title'], 'slug' => $slug, 'meta_title' => $_POST['meta_title'], 'meta_description' => $_POST['meta_description'], 'intro_text' => $_POST['introtextckediter'], 'description' => $_POST['detailckediter'], 'page_type_id' => $_POST['page_type'], 'image' => "uploads/page/$new_img_name", 'status' => $_POST['status']];
        }
        if ($db->Update($pages_table, $insert_params, "id", [$id])) {
            $params = ['page_name ' => 'langin', 'slug' => $slug];
            $db->Update($slugs_table, $params, "slug", [$sl]);
            $_SESSION['message'] = 'Pages Edited Successfully';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
        } else {
            $_SESSION['messages'] = 'Pages Edited failed';
            echo '<script type="text/javascript">';
            echo 'window.location.href="https://www.consultancynepal.com/cnbackend/showpages";';
            echo '</script>';
            die();
            header("location:https://www.consultancynepal.com/cnbackend/showbanner");
        }
    }
}
