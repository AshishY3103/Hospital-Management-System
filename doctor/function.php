<?php 
function checklogin($user){
    switch($user){
     
        case 'doctor':
            if (!isset($_SESSION['doctor'])){
                header("Location:login.php");
               }
            break; 
       
    }
    }

?>