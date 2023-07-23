<?php 
session_start();
session_destroy();

if (isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
    header("Location:index.php");
}
if (isset($_SESSION['doctor'])){
    unset($_SESSION['doctor']);
    header("Location:index.php");
}
if (isset($_SESSION['patient'])){
    unset($_SESSION['patient']);
    header("Location:index.php");
}
?>