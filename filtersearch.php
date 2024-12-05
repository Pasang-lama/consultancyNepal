<?php
ob_start();
if(isset($_POST['id'])){
    
    $country_id=$_POST['id'];
    $countryconsultancy=$db->CustomQuery("SELECT * FROM consultancy_pages JOIN consultancies ON consultancy_pages.consultancy_id=consultancies.id WHERE consultancy_pages.country_id='$country_id'");
    ?>
    <select class="form-select form-select" name="consultancy">
        <?php
        foreach($countryconsultancy as $data){
        
        ?>
        <option value="<?=$data->id?>"><?=$data->consultancy_name?></option>
        <?php
}
        ?>
        
    </select>
    
    <?php
}

?>


<?php

// university
if(isset($_POST['county_id'])){
    $country_id=$_POST['county_id'];
    $CountryWiseUniversity=$db->CustomQuery("SELECT * FROM `location` JOIN university ON university.location_id=location.location_id WHERE country_id='$country_id';");
    ?>
    <select class="form-select form-select" name="university">
        <?php
        foreach($CountryWiseUniversity as $data){
        
        ?>
        <option value="<?=$data->u_id?>"><?=$data->university_name?></option>
        <?php
}
        ?>
        
    </select>
    
    
    <?php
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST["search"])){
        
        $country_id=$_POST['country'];
        $consultancy_id=$_POST['consultancy'];
        $country_Data=$db->CustomQuery("SELECT * FROM `consultancies` WHERE id='$consultancy_id'");
        $slug=$country_Data[0]->consultancy_slug;
       
         
        header("location:https://www.consultancynepal.com/$slug");
        
         
        
        
    
        
    }
    
     if(isset($_POST["searchuniversity"])){
        
         
       
         
        header("location:https://www.consultancynepal.com/university");
        
         
        
    }
    
    
}


?>



