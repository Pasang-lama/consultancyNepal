<?php 
        require_once 'database/Database.php';

        require_once 'header.php';

        $db =Database::Instance();

        $datas = $db->CustomQuery("select * from dsad where slug='$url[1]'");

        require_once 'footer.php';
        
        ?>