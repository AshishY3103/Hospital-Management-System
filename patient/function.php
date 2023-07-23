<?php 
function checklogin($user){
    switch($user){ 
        case 'patient':
            if (!isset($_SESSION['patient'])){
                header("Location:login.php");
               }
            break; 
    
    }
    }

?>