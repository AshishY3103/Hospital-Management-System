<?php 
function checklogin($user){
    switch($user){
        case 'admin':
            if (!isset($_SESSION['admin'])){
                header("Location:adminlogin.php");
               }
            break;
        case 'doctor':
            if (!isset($_SESSION['doctor'])){
                header("Location:doctorlogin.php");
               }
            break; 
        case 'patient':
            if (!isset($_SESSION['patient'])){
                header("Location:patientlogin.php");
               }
            break; 
    
    }
    }

?>