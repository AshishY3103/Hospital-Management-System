<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <?php include 'links.php'; 
    include 'function.php';
    checklogin('admin');
    ?>
</head>

<body>
    <?php include 'header.php';
    ?>
    <div class="col-md-12 container ">
        <div class="row">
        <?php include 'sidenav.php'; ?>
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron my-3">
            <div class="row ">
                   <img src="img/admin.png" class="col-md-4" style="height: 100px;">
                   <?php
                    include "db/config.php";
                    if(isset($_POST['submit'])){
                        if(($_POST['username'] == "") || ($_POST['password'] == "") || ($_POST['cpassword'] == "")||($_FILES['profile'] == "")){
                            $error['a'] = "Fill all fields";
                        }elseif(($_POST['password'])!=($_POST['cpassword'])){
                            $error['a'] = "Enter Correct Conform password ";
                        }else{
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $file = $_FILES['profile'];

                            $filename =$file['name'];
                            $filepath =$file['tmp_name'];
                            $fileerror =$file['error'];
                            if($fileerror==0){
                                $destfile = '../upload/Admin Images/ '.$filename;
                                move_uploaded_file($filepath,$destfile);
                            }
                            $insertquery = "INSERT INTO admin(username,password,profile) values('$username','$password','$destfile')";
                                $query= mysqli_query($con,$insertquery);
                                if($query){
                                    echo "Data inserted";
                                    echo "<script>";
                                    echo 'window.location.href="admins.php";';
                                    echo "</script>";
                                }else{
                                    echo "Not Inserted";
                                }
                            }
                        }
                        ?>
                    <h5 class="col-md-6 mx-2" style="font-size:30px;margin-top: 50px;"> Add New Admin</h5>
                    </div>
                    <form method="post" class="form" enctype="multipart/form-data">
                    <?php
                            if (isset($error['a'])) {
                                $s = $error['a'];
                                $show = "<h6 class='alert alert-danger'> $s </h6>";
                            } else {
                                $show = "";
                            }
                            echo $show;
                            ?>
                        
                    <div class="form-group">
                        <label> <i class="fas fa-user" aria-hidden="true"></i> Username </label>
                        <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label> <i class="fas fa-lock"></i> password </label>
                        <input type="password" name="password" class="form-control" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label> <i class="fas fa-lock"></i> Conform password </label>
                        <input type="password" name="cpassword" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label> <i ></i> Profile </label>
                        <input type="file" name="profile" class="form-control" autocomplete="off">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" >Sign Up</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>