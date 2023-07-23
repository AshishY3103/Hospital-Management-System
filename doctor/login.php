<?php
session_start();
include("db/config.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();
    $query = "SELECT * FROM doctors WHERE username ='$username'AND password='$password'";
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_array($result);
    if (empty($username)) {
        $error['doctor'] = "Enter Username";
    } else if (empty($password)) {
        $error['doctor'] = "Enter Password";
    }else if($row['status']=="Pendding"){
        $error['doctor']="Please Wait for the admin to confirm";
    }else if($row['status']== "Rejected"){
        $error['doctor']="Try Again Later";
        $rid=$row['id'];
        $query = "DELETE FROM doctors WHERE id='$rid'";
        $result = mysqli_query($con, $query);
    }else if (count($error) == 0) {
        $query = "SELECT * FROM doctors WHERE username ='$username'AND password='$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) { 
            echo "<script>alert('You have login as an doctor')</script>";
            $_SESSION['doctor'] = $username;
            header("Location:index.php");
            exit();
        } 
        else {
            $error['doctor'] = "Invalid Username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Doctor Login </title>
    <?php include("links.php") ?>
</head>

<body style="background-image: url(img/slider-image1.jpg); background-repeat: no-repeat; background-size:cover;">
    <?php
    include("header.php");
    ?>
    <div style="margin-top: 60px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <div class="row">
                   <img src="img/Doctor.png" class="col-md-4">
                    <h5 class="col-md-6 mx-2" style="font-size:30px;margin-top: 90px;">Doctor login</h5>
                    </div>
                    <form method="post" class="my-2">
                        <div>
                            <?php
                            if (isset($error['doctor'])) {
                                $s = $error['doctor'];
                                $show = "<h6 class='alert alert-danger text-center'> $s </h6>";
                            } else {
                                $show = "";
                            }
                            echo $show;
                            ?>
                        </div>

                        <div class="form-group">
                            <label> <i class="fas fa-user" aria-hidden="true"></i> Username </label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label> <i class="fas fa-lock"></i> Password </label>
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>
                        <input type="Submit" name="login" class="btn btn-info " value="Login">
                        <p> I don't have an account <a href="add.php"> Apply Now</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>