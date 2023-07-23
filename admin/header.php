<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include 'links.php'; 
    
    ?>
    <title></title>
    <style>
        .logo{
            color: white;
            margin:10px 10px;
        }
    </style>
</head>

<body>
<?php
            if (isset($_SESSION['admin'])){
                $user = $_SESSION['admin'];
              
                echo '
                <nav class="navbar  navbar-expand-lg navbar-info bg-info">
                ';
            }else {
                echo '
                <nav class="navbar  navbar-expand-lg navbar-info bg-info">
                ';
            }
            
            ?>
    <!--<nav class="navbar  navbar-expand-lg navbar-info bg-info">-->
        <i class="fas fa-hospital fa-2x logo "></i>
        <h2 class="text-white "> Hospital Management System </h2>
        <div class="mr-auto"> </div>
        <ul class="navbar-nav ">
            <?php
            if (isset($_SESSION['admin'])){
                $user = $_SESSION['admin'];
              
                echo '
                <li class="nav-item"><a href="admins.php?id= $id " class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a class="nav-link text-white fa fa-sign-out-alt my-2 " href="logout.php"></a></li>  
                ';
            }else {
                echo '
                <li class="nav-item"><a class="nav-link text-white " href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white " href="login.php">Admin</a></li>
               
                ';
            }
            
            ?>
        </ul>
    </nav>
</body>

</html>