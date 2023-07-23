<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    include 'function.php';
    checklogin('doctor');?> 
    <title>Doctor</title>
</head>
<body >
<?php 
include 'header.php';
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <?php include 'db/config.php';
            include 'sidenav.php';?>
            <div class="col-md-10">
                <div class="container-fluid">
                <h5> Doctor Dashbord</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 my-2 bg-info" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="profile.php" class="fa fa-user-circle fa-3x my-4" style="color:white;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 bg-warning mx-4" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8 ">
                                    <?php
                                            $patients = mysqli_query($con,"SELECT * FROM patients");
                                            $num = mysqli_num_rows($patients);
                                        ?>
                                            <h5 class=" text-white my-3"><?php echo $num; ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Patients</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="patients.php" class="fa fa-procedures fa-3x my-4" style="color:white;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 bg-success " style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8 ">
                                    <?php
                                            $appointments = mysqli_query($con,"SELECT * FROM appointment WHERE status='Pendding'");
                                            $num = mysqli_num_rows($appointments);
                                        ?>
                                        <h5 class="text-white my-3"><?php echo "$num";?></h5>
                                        <h5 class="text-white my-3">Total</h5>
                                        <h5 class="text-white my-3">Appointment</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="appointments.php" class="fa fa-calendar fa-3x my-4" style="color:white;"></a>
                                    </div>
                                </div>
                            </div>
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