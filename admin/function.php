<?php 
function checklogin($user){
    switch($user){
        case 'admin':
            if (!isset($_SESSION['admin'])){
                header("Location:login.php");
               }
            break;
    
    }
    }

?>