<?php
class  CrudOperation
{
    /**
      * @var null
      * private property

    */
    private $_connection;
    private static $_instance;

    public function __construct($data = array()){

        $errors = [];
        $old = [];

        foreach ($data as $key => $value){
                if(empty($data[$key])){   
                $errors[$key] = "* The field is require";
                }else{
                $old[$key] = $value;
                }
        }

        /**
            *Email Validation 
        **/

        if(array_key_exists("email",$data))
        {
              
            if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) 
               {
                  $errors["email"]= "Invalid email format";
                }
                
        }
        

        /**
            *Number Validation 
        */


        if(array_key_exists("number",$data))
        {
            if(!preg_match("/^[0-9]*$/",$_POST['number'])){
                    $errors['number'] = "Only numbers allowed";
            }
        }



        /**
            *Password Validation
        */

            
        if(array_key_exists("password",$data))
        {

            if(strlen($data["password"])<6)
            {
                    $errors["password"]="Password must be 6 character long";
            }
            if(ctype_alnum($data["password"])){
                        $errors["password"]="Password must be contain at least one special character";
            }

            if(array_key_exists("conformpassword",$data)){
                
                if($data["password"]!=$data["conformpassword"]){
                        $errors["password"]="Password does not match";
                }
            }
        
        }

             



            
        // Assigning value to property

        $this->data=$data;
        $this->errors=$errors;
        $this->old=$old;

        // databaseConnection
        $this->Connection();
       

    }
    

    /**
      *   this function help to get errors and old value
    */
    

    function GetErrorsOld(){


         return [$this->errors,$this->old];

    }


    /**
      * Database connection
    */
 
     private function Connection()
     {
 
         try {
             $this->_connection = new PDO("mysql:host=localhost;dbname=consulta_consultancynepal","consulta_consultancynepal","admin@002");
             $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
         } catch (PDOException $exception) {
             die($exception->getMessage());
         }
 
     }


     /**
      * @return Database|null
      * Instance
      * Database connection check
      */
 
     public static function Instance()
     {
         if (!isset(self::$_instance)) {
             return self::$_instance = new CrudOperation();
         }
 
         return self::$_instance;
     }

      

 
  

  
    /**
      *@param string Table Name
      *@param string Images Path
      
    */

 
    public function Insertdata($TableName = '',$ImagePath = ''){
        

        $DatabaseField=[];
        $InsertParam=[];

        //  fecthing field name from the database And Appending to  $DatabaseField=[];

         $query="SELECT COLUMN_NAME  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'{$TableName}';";
         if (empty($query)) throw new PDOException('Query field is required');
         $prepareStatement = $this->_connection->prepare($query);
         try {
             if ($prepareStatement->execute([])) {
                  $response=$prepareStatement->fetchAll(PDO::FETCH_CLASS);
                  foreach ($response as $key => $value){          
                        $data=$response[$key]->COLUMN_NAME;
                        array_push($DatabaseField,$data);
                    }
             }
 
         } catch (PDOException $exception) {
             die($exception->getMessage());
         }
       

       //  Assigning Field and value to array $insertParam 

        foreach ($DatabaseField as $key => $value){
           
            if(array_key_exists($value,$this->data)){
                 $InsertParam[$value]=$this->data[$value];
            }
             
        }
         if(array_key_exists("password",$InsertParam)){

           //    password hash

            $hash_password=password_hash($InsertParam["password"],PASSWORD_DEFAULT);

            //  modify
            $InsertParam["password"]=$hash_password;

        }

        
         
        if(!empty($_FILES['image']['name'])){

            $image_name = $_FILES["image"]["name"];
            $tmp_image_name = $_FILES["image"]["tmp_name"];
            $img_extension=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path=$ImagePath.$new_img_name; 
            move_uploaded_file($tmp_image_name,$img_upload_path);
            $dbimage="{$ImagePath}{$new_img_name}";

            // appending image field
            
            
            $InsertParam['image']=$dbimage;
             

        }

 
         
        if(!array_filter($this->errors)){
            
          

            
            if (empty ($TableName) || empty($InsertParam)) throw new PDOException("Table name & data field is mandatory");
            $columns = implode(',', array_keys($InsertParam));
            $dataValues = array_values($InsertParam);
            $setKey = '';
            $increment = 1;
            foreach ($InsertParam as $key => $val) {
                $setKey .= '?';
                if ($increment < count($InsertParam)) {
                    $setKey .= ',';
                }
                $increment++;
            }
    
            $query = "INSERT INTO `$TableName` ($columns)VALUES ($setKey)";
            /**
             * prepare query
            */
    
            $prepareStatement = $this->_connection->prepare($query);
            try {
                if ($prepareStatement->execute($dataValues)) {
                    return $this->_connection->lastInsertId();    
                    
                }
    
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
    
            return false;


         } 
          
    }



    /**
      *@param string Table Name
      *@param string Images Path
      * @param string $criteria
      * @param array $bindValue
     
    */
    
     public function Updatedata($TableName = '',$ImagePath = '',$criteria = '', $bindValue = array()){

        
        $DatabaseField=[];
        $UpdateParam=[];

        //  fecthing field name from the database And Appending to  $DatabaseField=[];

         $query="SELECT COLUMN_NAME  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'{$TableName}';";
         if (empty($query)) throw new PDOException('Query field is required');
         $prepareStatement = $this->_connection->prepare($query);
         try {
             if ($prepareStatement->execute([])) {
                  $response=$prepareStatement->fetchAll(PDO::FETCH_CLASS);
                  foreach ($response as $key => $value){          
                        $data=$response[$key]->COLUMN_NAME;
                        array_push($DatabaseField,$data);
                    }
             }
 
         } catch (PDOException $exception) {
             die($exception->getMessage());
         }


       //  Assigning Field and value to array $insertParam 

        foreach ($DatabaseField as $key => $value){
           
            if(array_key_exists($value,$this->data)){
                 $UpdateParam[$value]=$this->data[$value];
            }
             
        }

         if(array_key_exists("password",$UpdateParam)){

           //    password hash

            $hash_password=password_hash($UpdateParam["password"],PASSWORD_DEFAULT);

            //  modify
            $UpdateParam["password"]=$hash_password;

        }
         
        if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES["image"]["name"];
            $tmp_image_name = $_FILES["image"]["tmp_name"];
            $img_extension=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
            $new_img=uniqid("IMG-",TRUE);
            $new_img_name = "{$new_img}.webp";
            $img_upload_path=$ImagePath.$new_img_name; 
            $old_image=$this->data["old_image_url"];
            $old_image_full="../".$old_image;
             
            if(file_exists($old_image_full) && is_file($old_image_full)){
                unlink($old_image_full);
            }    
            move_uploaded_file($tmp_image_name,$img_upload_path);
            
            // appending image field
            $dbimage="{$ImagePath}{$new_img_name}";
            $UpdateParam['image']=$dbimage;
             

        }

         
        if(!array_filter($this->errors)){

             if (empty($TableName) || empty($UpdateParam) || empty($criteria) ||
             empty($bindValue)) throw new PDOException("Criteria not match");

         /**
          * merge array
          */
         $mergeValue = array_merge(array_values($UpdateParam), $bindValue);
         $setColumns = '';
         $increment = 1;
         foreach ($UpdateParam as $column => $val) {
             $setColumns .= "{$column}=?";
             if ($increment < count($UpdateParam)) {
                 $setColumns .= ", ";
             }
             $increment++;
         }
 
         $query = "UPDATE {$TableName} SET {$setColumns} WHERE $criteria=?";
 
         $prepareStatement = $this->_connection->prepare($query);
         try {
             return $prepareStatement->execute($mergeValue);
 
         } catch (PDOException $exception) {
             die($exception->getMessage());
         }


        }

         

         





     }


     /**
      * @param string $query
      * @return bool
      */
 
     public function CustomQuery($query = '')
     {
         if (empty($query)) throw new PDOException('Query field is required');
         $prepareStatement = $this->_connection->prepare($query);
 
         try {
             if ($prepareStatement->execute([])) {
                 return $prepareStatement->fetchAll(PDO::FETCH_CLASS);
             }
 
         } catch (PDOException $exception) {
             die($exception->getMessage());
         }
 
         return false;
 
 
     }


     



   
   



     
}

 $db=  CrudOperation::Instance();
 return $db;

?>