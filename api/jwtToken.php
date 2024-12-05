<?php

// this class is created to generate a hash id token 
// and the decode the hash id 

class jwttoken{
    
     function generate_key($payload,$key){
        $header=['algo'=>'HS256','type'=>'HWT'];
        $header_encoded=base64_encode(json_encode($header));
        // echo $header_encoded;
        $payload_encode=base64_encode(json_encode($payload));
        $signature= hash_hmac('SHA256',$header_encoded.$payload_encode,$key);
        $signature_encoded = base64_encode($signature);
        
        return $header_encoded.'.'.$payload_encode.'.'.$signature_encoded;
        
    }
    
    function verify_key($token,$key){
        
        
        $token_parts = explode('.',$token);
        
        $signature=base64_encode(hash_hmac('SHA256',$token_parts[0].$token_parts[1],$key));
        
         
        
        if($signature != $token_parts[2]){
            return false;
        }
       
       
        $gn=base64_decode($token_parts[1]);
        
        $payload []= json_decode($gn);
        
         
        return $payload;
        
        
        
    }
    
    
    
}

?>