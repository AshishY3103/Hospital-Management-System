<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'links.php';
    include 'function.php';
    checklogin('doctor');
    include 'db/config.php'; ?>
    <title> Total Appointment </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3 class="text-center my-2" >Total Appointment</h3>
                    



                    <?php
                            
                            
                            $query = "SELECT * FROM appointment WHERE status='Pendding'";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-success'>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Gender</th>
                                        <th>Phone No</th>
                                        <th>Appointment Date</th>
                                        <th>Symptoms</th>
                                        <th>Date Booked</th>
                                        <th>Action</th>
                                       
                                    </tr>";

                            if (mysqli_num_rows($result) < 1) {
                                $output .=   "<tr>
                                                <td colspan='9'>No Pedding Appointment</td>
                                            </tr>";
                            }
                            while($row= mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $gender = $row['gender'];
                                $phone_no = $row['phone_no'];
                                $appointment_date = $row['appointment_date'];
                                $symptoms = $row['symptoms'];
                                $date_booked = $row['date_booked'];
                                $output .="
                                <tr>
                                    <td>$id</td>
                                    <td>$fname</td>
                                    <td>$lname</td>
                                    <td>$gender</td>
                                    <td>$phone_no</td>
                                    <td>$appointment_date</td>
                                    <td>$symptoms</td>
                                    <td>$date_booked</td>
                                    <td> 
                                        
                                        <a href='discharge.php?id=".$id."'>
                                            <button class='btn btn-success'> Check </button>

                                        </a>
                                    </td>
                                ";
                            }
                            $output .=" </tr>

                            </table>";

                            echo $output;
                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $query= "DELETE FROM report WHERE  id = '$id'";
                                mysqli_query($con,$query);
                            }
                            ?>  




                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>