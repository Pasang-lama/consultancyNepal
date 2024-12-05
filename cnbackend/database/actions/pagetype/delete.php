<?php require_once "../../database.php";
require_once "../../tables.php";
$db = Database::Instance();
if (isset($_POST['did'])) {
    $did = $_POST['did'];
    $where = "id";
    $value = [$did];
    $info = $db->SelectByCriteria($page_type_table, 'image,is_specific,slug', 'id', $value);
    $file = $info[0]->image;
    $file_n =$info[0]->is_specific;
    $slug=$info[0]->slug;
    // if($file_n=="1"){
    //              $newName = "/home3/consultancynepal/public_html/$slug.php";
    //           if (file_exists($newName)) {
    //             unlink($newName);
    //             $db->CreateTable("DROP TABLE `consulta_consultancynepal`.`$slug`");
    //             // echo "The file $file was successfully deleted.";
    //         }
        
    // }
    
    $imgpath = "../../../public/";
   

    
    
    
    if ($db->delete($page_type_table, $where, $value)) {
        unlink($imgpath . $file);
            if (file_exists($imgpath . $file)) {
                unlink($imgpath . $file);
                // echo "The file $file was successfully deleted.";
              }
 
            
        echo "1";
    }
}
