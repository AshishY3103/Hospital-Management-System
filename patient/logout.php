<?php 
session_start();
session_destroy();

if (isset($_SESSION['patient'])){
    unset($_SESSION['patient']);
    header("Location:index.php");
}
?>