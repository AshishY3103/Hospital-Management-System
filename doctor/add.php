<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Doctor</title>
    <?php include("links.php") ;
   
    ?>
</head>
<body style="background-image: url(img/slider-image2.jpg); background-repeat: no-repeat; background-size:cover;">
    <?php include("header.php");?>
    <div class="container-fluid">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">
            <div class="row">
            <h2 class="text-center my-2">Apply Now !!!</h2>
                        <?php 
                        include("db/config.php");
                            if(isset($_POST['apply'])){
                                if(($_POST['fname']=="") ||( $_POST['lname']=="" )||($_POST['username'] == "") ||($_POST['email']=="" )||($_POST['phone_no']=="" )||($_POST['gender'] == "") || ($_POST['password'] == "") || ($_POST['cpassword'] == "")||($_POST['country'] == "")){
                                    $error['d']= "Fill all Fields";
                                }elseif(($_POST['password'])!=($_POST['cpassword'])){
                                    $error['d']= "Enter Correct Conform Password ";
                                }else{
                                    $fname=$_POST['fname'];
                                    $lname=$_POST['lname'];
                                    $username=$_POST['username'];
                                    $email=$_POST['email'];
                                    $phone_no=$_POST['phone_no'];
                                    $gender=$_POST['gender'];
                                    $password=$_POST['password'];
                                    $country=$_POST['country'];
                                    $file = $_FILES['profile'];
                                    $filename =$file['name'];
                                    $filepath =$file['tmp_name'];
                                    if(empty($filename)){
                                       $error['d']="Choose a photo for profile";
                                    }else{
                                        $destfile = '../upload/Doctor Images/'.$filename;
                                        $query = " INSERT into doctors(fname,lname,username,email,phone_no,gender,password,country,salary,date_reg,status,profile) values('$fname','$lname','$username','$email','$phone_no','$gender','$password','$country','0',NOW(),'Pendding','$destfile')";                                    
                                        $result=mysqli_query($con,$query);

                                        if($result){
                                            move_uploaded_file($filepath,$destfile);
                                            echo "<script>";
                                            echo 'window.location.href="login.php";';
                                            echo "</script>";
                                        }
                                    }
                                }
                            }
                           
                            if (isset($error['d'])) {
                                $s = $error['d'];
                                $show = "<center><h6 class='alert alert-danger text-center' style='width:500px'> $s </h6></center>";
                            } else {
                                $show = "";
                            }
                            echo $show;
                            
                        ?>
            <div class="col-md-2"></div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label> First Name</label>
                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder ="Enter first name" value= "<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input value= "<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" type="text" name="username" class="form-control" autocomplete="off" placeholder ="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Phone No.</label>
                        <input value= "<?php if (isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>" type="number" name="phone_no" class="form-control" autocomplete="off" placeholder ="Enter Phone No">
                    </div>
                    <div class="form-group">
                        <label>Passwaord</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder ="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" name="profile" class="form-control" autocomplete="off" >
                    </div>
                   
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        
                            <div class="form-group">
                                <label>last Name</label>
                                <input value= "<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>" type="text" name="lname" class="form-control" autocomplete="off" placeholder ="Enter last name">
                            </div>
                           
                            <div class="form-group">
                                <label>Email</label>
                                <input value= "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" type="email" name="email" class="form-control" autocomplete="off" placeholder ="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Select Gender</label>
                                <div class="form-control">
                                    <input  type ="radio" name="gender" value="Male"> &nbsp;Male &nbsp;&nbsp;&nbsp;
				                    <input  type ="radio" name="gender" value="Female">&nbsp;Female
                                </div> 
                            </div>
                            <div class="form-group">
                                <label>Conform Passwaord</label>
                                <input type="password" name="cpassword" class="form-control" autocomplete="off" placeholder ="Enter Password">
                             </div>
                            <div class="form-control">
                                <label>Select country</label>
                                <select name="country">
                                    <option >Select Country</option>
                                    <option value="Rassia">Russia</option>
                                    <option value="India">India</option>
                                    <option value="England">England</option>
                                </select>
                            </div>
                        
                    </div>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-3">
                        
                    <input  type="Submit" name="apply" class="btn btn-info " value="Apply Now">  
                    <p> I  have an account <a href="login.php"> click here</a>
                    </p>        
                </div>
                <div class="col-md-4"></div>
                </div>  
                <form> 
            </div>      
    </div>
</body>
</html>