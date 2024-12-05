<?php
ob_start();
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
                     
                                    $toemail=$_POST["toemail"];
                                    $subject=$_POST["subject"];
                                    $message=$_POST['introtextckediter'];
                                    $senderemail=$_POST['senderemail'];
                                    $headers = "From:$senderemail\r\n";
                                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
 
               
                                                              if(mail($toemail,$subject,$message,$headers)){
                                                                  
                                                                  $_SESSION["message"]="Email Send Sucessfully";
                                                      
                                                        header("location:https://www.consultancynepal.com/consultancy-login/mail/mail.php");
                                                      
        }
        else{
             $_SESSION["messages"]="Some Erors in System.";
            
        }
}
                                                      
                                                     
                                                    
                                             
                                             
                                                  
?>