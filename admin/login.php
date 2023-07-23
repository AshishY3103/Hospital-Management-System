<?php
session_start();
include("db/config.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();
    if (empty($username) || empty($password)) {
        $error['admin'] = "Fill all fields";
    }
    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username ='$username'AND password='$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have login as an admin')</script>";

            $_SESSION['admin'] = $username;

            header("Location:index.php");
            exit();
        } else {
            
            $error['admin'] = "Invalid Username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Admin Login </title>
    <?php include("links.php") ?>
</head>

<body style="background-image: url(img/slider-image2.jpg); background-repeat: no-repeat; background-size:cover;">
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
                   <img src="img/admin.png" class="col-md-4">
                    <h5 class="col-md-6 mx-2" style="font-size:30px;margin-top: 90px;">Admin login</h5>
                    </div>
                    <form method="post" class="my-2" >
                        <div>
                            <?php
                            if (isset($error['admin'])) {
                                $s = $error['admin'];
                                $show = "<h6 class='alert alert-danger'> $s </h6>";
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
                            <label> <i class="fas fa-lock"></i> Passward </label>
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>
                        <input type="Submit" name="login" class="btn btn-success " value="Login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>