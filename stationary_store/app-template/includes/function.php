<?php
    
    function empty_check($data){
        if (empty($data)) {
             return 1; 
        }else {
            return 0;
        }
    }
        function email_check($data){
            if (filter_var($data , FILTER_VALIDATE_EMAIL)) {
                return 0;
        }else {
            return 1;
        }
    }
     function pass_chek($pass,$rePass){
        if ($pass === $rePass) {
            return 0;
        }else{
            return 1;
        }
    }
    function mobile_check($data){
        if(is_numeric($data))
            {
                if (strlen($data) >= 11 and strlen($data) <= 12) {
                   return 0;
                }else {
                    return 1;
                }
            }else {
                return 1;
            }
    }    
?>