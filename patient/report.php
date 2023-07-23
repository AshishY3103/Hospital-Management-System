<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    include("db/config.php");
    include 'function.php';
    checklogin('patient');
    ?> 
    <title>Doctor</title>
</head>
<body >
<?php 
include 'header.php';
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <?php include 'sidenav.php'?>
            <div class="col-md-10">
                <div class="container-fluid">
                

                <?php 
                    if(isset($_POST['send'])){
                        $title= $_POST['title'];
                        $message= $_POST['message'];
                        $send_by= $_SESSION['patient'];

                        if(empty($title)){
                        
                        }else if(empty($message)){

                        }else{
                            $insertquery = "INSERT into report ( title, message, date_send, send_by) values ( '$title', '$message',NOW(),' $send_by')";
                            $query= mysqli_query($con,$insertquery);
                            echo "<script> window.alert('Report Added Successfully')</script>";
                        }

                    }
                
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 jumbotron bg-warning my-2">
                            <h3 class="text-center">Send A Report</h3>
                            <form method="post">
                                <label>Title</label>
                                <input type="text" name="title" autocomplete="off" class="form-control " placeholder="Enter Title of the report">
                                <label>Message</label>
                                <input type="text" name="message" autocomplete="off" class="form-control " placeholder="Enter Message">
                                <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                </div>   
            </div>
        </div>
    </div>
</div>
</body>
</html>