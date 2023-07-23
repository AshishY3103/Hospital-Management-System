<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    include 'function.php';
    checklogin('patient');
    ?> 
    <title>patient</title>
</head>
<body>
    <?php 
        include "header.php";
        include 'db/config.php';
            $d = $_SESSION['patient'];
            $query = "SELECT * FROM patients WHERE username = '$d'";
            $result = mysqli_query($con, $query);
            while($row= mysqli_fetch_array($result)){
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $username = $row['username'];
                $gender = $row['gender'];
                $phone_no = $row['phone_no'];
                $country =  $row['country'];
                $date_reg = $row['date_reg'];
                $profile= $row['profile'];
                $password= $row['password'];
            }
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <?php include 'sidenav.php';?>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
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
                                        $destfile = '../upload/Patient Images/'.$filename;
                                        $query="UPDATE patients SET profile = '$destfile' WHERE id='$id'";
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

                        <div class="col-md-12 my-4">
                            <h3> Details</h3>
                            <?php 
                                
                                
                            $output ="
                            <table class='table table-bordered  '>
                            <tr>
                                <td>ID </td>
                                <td>$id</td>
                            </tr>
                            <tr>
                                <td>First name </td>
                                <td>$fname</td>
                            </tr>
                            <tr>
                                <td>Last name </td>
                                <td>$lname</td>
                            </tr>
                            <tr>
                                <td>Username </td>
                                <td>$username</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>$gender</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                    
                                <td>$phone_no</td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                  
                                <td>$country</td>
                            </tr>
                            <tr>
                            
                                <td>Date Registered</td>
                                <td>$date_reg</td>
                            </tr>

                            </table>
                               
                            ";
                        
                        

                        echo $output;
                            ?>
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
                                                $query="UPDATE patients SET username = '$username' WHERE id=$id";
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
                                if(isset($_POST['chpassword'])){
                                    $opassword=$_POST['opassword'];
                                    $npassword =$_POST['npassword'];
                                    $cpassword =$_POST['cpassword'];
                                    
                                    if(empty($opassword) || empty($npassword) || empty($cpassword)){
                                        $error['password']="Fill all fields";
                                    }else{
                                        if($opassword == $password){
                                            $query="UPDATE patients SET password= '$npassword' WHERE id='$id'";
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
                                <input class="form-control " type="password" placeholder="Enter Your old password" name="opassword" autocomplete="off"><br>
                                <input class="form-control " type="password" placeholder="Enter Your new password" name="npassword" autocomplete="off"><br>
                                <input class="form-control " type="password" placeholder="conform new password" name="cpassword" autocomplete="off"><br>
                                <input class="btn btn-success my-1" value="Change password" type="submit" name="chpassword">
                            </div>
                            </div>
                        </form> 
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>