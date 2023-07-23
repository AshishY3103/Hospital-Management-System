<?php
session_start();
include("db/config.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();
    $query = "SELECT * FROM patients WHERE username ='$username'AND password='$password'";
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_array($result);
    if (empty($username)) {
        $error['patients'] = "Enter Username";
    } else if (empty($password)) {
        $error['patients'] = "Enter Passward";
    }else if (count($error) == 0) {
        $query = "SELECT * FROM patients WHERE username ='$username'AND password='$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) { 
            echo "<script>alert('You have login as an Patient')</script>";
            $_SESSION['patient'] = $username;
            header("Location:index.php");
            exit();
        } 
        else {
            $error['patients'] = "Invalid Username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Patient Login </title>
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
                   <img src="img/Patient.png" class="col-md-4">
                    <h5 class="col-md-6 mx-2" style="font-size:30px;margin-top: 90px;">Patient login</h5>
                    </div>
                    <form method="post" class="my-2">
                        <div>
                            <?php
                            if (isset($error['patients'])) {
                                $s = $error['patients'];
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
                        <input type="Submit" name="login" class="btn btn-warning " value="Login">
                        <p> I don't have an account <a href="add.php"> Click here</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>