<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'links.php';
    include 'db/config.php';
    include 'function.php';
    checklogin('patient');
    ?>
    <title> Book Appointment </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3 class="text-center my-2" >Book Appointment</h3>
                    <?php 
                            $patient= $_SESSION['patient'];
                            $result = mysqli_query($con,"SELECT * FROM patients WHERE username = '$patient'");
                            $row = mysqli_fetch_array($result);
                            $fname = $row['fname'] ;
                            $lname = $row['lname'] ;
                            $gender = $row['gender'] ;
                            $phone_no = $row['phone_no'];

                        if (isset($_POST['book'])){
                            $date=$_POST['date'];
                            $sym =$_POST['sym'];

                            if(empty($sym)){

                            }else{
                                $query = "INSERT INTO appointment(fname,lname,gender,phone_no,appointment_date,symptoms,status,date_booked) VALUES('$fname','$lname','$gender','$phone_no','$date','$sym','Pendding',NOW())";
                                $result = mysqli_query($con,$query);

                                if($result){
                                    echo "<script>alert('You have booked an Appointment')</script>";
                                }
                            }
                        }
           
                    ?> 
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron">
                                <form method="post">
                                    <label>Appointment Date</label>
                                    <input type="date" name="date" class="form-control" >

                                    <label>Symptoms</label>
                                    <input type="text" name="sym" class="form-control" autocomplete= "off" placeholder="Enter Symptoms" >

                                    <input type="submit" name="book" class="btn btn-success my-2" value="Book Appointment">
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