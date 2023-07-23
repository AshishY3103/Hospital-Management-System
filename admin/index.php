
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'links.php'; 
          include 'function.php';
          checklogin('admin')
    ?>
    
    <title> Admin </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3>Admin Dashbord</h3>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2 " style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                include 'db/config.php';
                                                $ad= mysqli_query($con,"SELECT * FROM admin");
                                                $num =mysqli_num_rows($ad);
                                            ?>
                                            <h5 class=" text-white my-3"><?php echo $num ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Admins</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="admins.php" class="fa fa-users-cog fa-2x my-4 " style="color:white;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                            $doctors = mysqli_query($con,"SELECT * FROM doctors WHERE status='Approved'");
                                            $num = mysqli_num_rows($doctors);
                                            ?>
                                            <h5 class=" text-white my-3"><?php echo $num; ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Doctors</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="doctors.php" class="fa fa-user-md fa-2x my-4 " style="color:white;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                            $patients = mysqli_query($con,"SELECT * FROM patients");
                                            $num = mysqli_num_rows($patients);
                                        ?>
                                            <h5 class=" text-white my-3"><?php echo $num; ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Patients</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="patients.php" class="fa fa-procedures fa-2x my-4 " style="color:white;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-3" style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8"> <?php
                                            $patients = mysqli_query($con,"SELECT * FROM report ");
                                            $num = mysqli_num_rows($patients);
                                        ?>
                                            <h5 class=" text-white my-3"><?php echo $num; ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Report</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="reports.php" class="fa fa-flag fa-2x my-4 " style="color:white;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-secondary mx-2 my-3" style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $job = mysqli_query($con,"SELECT * FROM doctors WHERE status='Pendding'");
                                            $num1 = mysqli_num_rows($job);
                                            ?>
                                            <h5 class=" text-white my-3"><?php echo $num1 ;?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Jobs</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="job_request.php" class="fa fa-book-open fa-2x my-4 " style="color:white;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-primary mx-2 my-3" style="height: 130px ;">
                                <div class="clo-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php
                                            $query = mysqli_query($con,"SELECT sum(amount_paid) as profit FROM income" );
                                            $row = mysqli_fetch_array($query);
                                            $income= $row['profit'];
                                            ?>
                                            <h5 class=" text-white my-3"><?php echo "$$income"; ?></h5>
                                            <h5 class=" text-white my-3">Total</h5>
                                            <h5 class=" text-white my-3">Income</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="income.php" class="fa fa-money-check-alt fa-2x my-4 " style="color:white;"></a>
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