<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Profile</title>
    <?php include "links.php";
    include 'function.php';
    checklogin('admin')
          ?>
</head>
<body>
    <?php 
        include "header.php";
        include 'db/config.php';
            $ad = $_SESSION['admin'];
            $query = "SELECT * FROM admin WHERE username = '$ad'";
            $result = mysqli_query($con, $query);
            while($rows=mysqli_fetch_array($result)){
                $id=$rows['Id'];
                $username=$rows['username'];
                $profile=$rows['profile'];
                $password=$rows['password'];
            }
    ?>
    <div class="col-md-12">
        <div class="row">
            <?php include "sidenav.php";?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                            <h4> <?php echo $username;?> Profile</h4>
                            <?php 
                                if (isset($_POST['update'])){
                                        $file = $_FILES['profile'];
                                        $filename =$file['name'];
                                        $filepath =$file['tmp_name'];
                                    if(empty($filename)){
                                       $error['profile']="Choose a photo for profile";
                                    }else{
                                        $destfile = 'upload/Admin Images/'.$filename;
                                        $query="UPDATE admin SET profile = '$destfile' WHERE username='$ad'";
                                        $result=mysqli_query($con,$query);

                                        if($result){
                                            move_uploaded_file($filepath,$destfile);
                                            $success['profile']="Profile updated Successfully";
                                        }
                                    }
                                    
                                }
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <img src="<?php echo $profile ?>" class="col-md-12 " style="height: 200px;">
                                    <br><br>
                                    <div class="form-group">
                                        <label>  Upload New Profile </label>
                                        <div>
                                            <?php
                                            if (isset($error['profile'])) {
                                                 $s = $error['profile'];
                                                 $show = "<h6 class='alert alert-danger'> $s </h6>";
                                             } else {
                                                 $show = "";
                                             }
                                                echo $show;
                                            if (isset($success['profile'])) {
                                                $s = $success['profile'];
                                                $show = "<h6 class='alert alert-success'> $s </h6>";
                                            } else {
                                                $show = "";
                                            }
                                                echo $show;
                                            ?>
                                        </div>
                                        <input type="file" name="profile" class="form-control" autocomplete="off">
                                    </div>
                                    <input class="btn btn-success" value="Change Profile" type="submit" name="update">
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="border my-2" >
                        <div class="form-group my-3 mx-2">
                                <label><strong>Change Username</strong></label>
                              
                                 <?php  

                                        if (isset($_POST['updateuname'])){
                                            $username=$_POST['username'];
                                            if(empty($username)){
                                                $error['username']="Enter username";
                                            }else{
                                                $query="UPDATE admin SET username = '$username' WHERE id=$id";
                                                $result=mysqli_query($con,$query);
                                                if($result){
                                                    echo "<script>";
                                                    echo 'window.location.href="logout.php";';
                                                    echo "</script>";
                                                }

                                            }
                                        }
                                        ?>
                                        <div>
                                          <?php
                                            if (isset($error['username'])) {
                                                 $s = $error['username'];
                                                 $show = "<h6 class='alert alert-danger'> $s </h6>";
                                             } else {
                                                 $show = "";
                                             }
                                                echo $show;

                                           
                                            ?>
                                        </div>
                                <input class="form-control " type="text" placeholder="Enter Your New username" name="username" autocomplete="off">
                                <label><small class="text-danger"> If you change username then you logout automatically then you re-login with new username</small></label>
                               <br>
                                <input class="btn btn-success my-1" value="Change Username" type="submit" name="updateuname">
                            
                            </div>
                            </div>
                            <div class="border" >
                            <div class="form-group my-3 mx-2 " >
                                <label> <strong>Change password</strong></label>
                                <?php 
                                if(isset($_POST['chpassward'])){
                                    $opassward=$_POST['opassward'];
                                    $npassward =$_POST['npassward'];
                                    $cpassward =$_POST['cpassward'];
                                    
                                    if(empty($opassward) || empty($npassward) || empty($cpassward)){
                                        $error['password']="Fill all fields";
                                    }else{
                                        if($opassward == $password){
                                            $query="UPDATE admin SET password= '$npassward' WHERE Id='$id'";
                                            $result=mysqli_query($con,$query);
                                            if($result){
                                                $success['password']="password change Successfully";
                                            }
                                        }else{
                                            $error['password']="Old password is wrong";

                                        }
                                    }
                                   
                                }
                                    
                                
                                    ?>
                                      <?php
                                            if (isset($error['password'])) {
                                                 $s = $error['password'];
                                                 $show = "<h6 class='alert alert-danger'> $s </h6>";
                                             } else {
                                                 $show = "";
                                             }
                                                echo $show;

                                                if (isset($success['password'])) {
                                                    $s = $success['password'];
                                                    $show = "<h6 class='alert alert-success'> $s </h6>";
                                                } else {
                                                    $show = "";
                                                }
                                                    echo $show;
                                            ?>
                                <input class="form-control " type="password" placeholder="Enter Your old password" name="opassward" autocomplete="off"><br>
                                <input class="form-control " type="password" placeholder="Enter Your new password" name="npassward" autocomplete="off"><br>
                                <input class="form-control " type="password" placeholder="conform new password" name="cpassward" autocomplete="off"><br>
                                <input class="btn btn-success my-1" value="Change password" type="submit" name="chpassward">
                            </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>