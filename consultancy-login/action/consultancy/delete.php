  <?php
 require_once "../../database.php";
 require_once "../../tables.php";
 $db = Database::Instance();
 if (isset($_GET["did"])) {
     $did = $_GET["did"];
     $where = "id";
     $value = [$did];
     $info = $db->SelectByCriteria(
         $consultancy_table,
         "consultancy_logo,consultancy_slug",
         "id",
         $value
     );
     $file = $info[0]->consultancy_logo;
     $slug = [$info[0]->consultancy_slug];
     $imgpath = "../../../public/";
     if ($db->delete($consultancy_table, "id", $value)) {
         unlink($imgpath . $file);
         $db->delete($slugs_table, "slug", $slug);
         $_SESSION["message"] = "Consultancy Deleted  Successfully";
         echo '<script type="text/javascript">';
         echo 'window.location.href="  https://www.consultancynepal.com/consultancy-login/consultancy/showconsultancy";';
         echo "</script>";
         die();
     }
 }