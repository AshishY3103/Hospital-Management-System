<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    include 'function.php';
    checklogin('admin');
     ?> 
    <title>Job Request</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <?php include 'sidenav.php'; ?>
                <div class="col-md-10">
                    <h5 class="text-center"> Job Request</h5>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="smy-2"><strong>All Requests :</strong></h6>
                            <?php
                            
                            $ad = $_SESSION['admin'];
                            include 'db/config.php';
                            $query = "SELECT * FROM doctors WHERE status='Pendding'";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-secondary'>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Fname</th>
                                        <th>Lname</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Date Registered</th>
                                        <th>Action</th>
                                    </tr>";

                            if (mysqli_num_rows($result) < 1) {
                                $output .=   "<tr>
                                                <td colspan='9'>No New Requests</td>
                                            </tr>";
                            }
                            while($row= mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $id1 = $row['id'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $username = $row['username'];
                                $gender = $row['gender'];
                                $phone_no = $row['phone_no'];
                                $country =  $row['country'];
                                $date_reg = $row['date_reg'];
                                $profile = $row['profile'];
                                $output .="
                                <tr>
                                    <td>$id</td>
                                    <td><img src='$profile' style='height:60px; width:60px;'></td>
                                    <td>$fname</td>
                                    <td>$lname</td>
                                    <td>$username</td>
                                    <td>$gender</td>
                                    <td>$phone_no</td>
                                    <td>$country</td>
                                    <td>$date_reg</td>
                                    <td>
                                        <a href='job_request.php?id=$id'  name='approve' id='approve' class='fas fa-check fa-lg mx-2' style='color:green;'> </a>
                                        <a href='job_request.php?id1=$id1'  name='reject' id='reject' class='fas fa-times fa-lg mx-2' style='color:red;'> </a>
            
                                    </td>
                                ";
                            }
                            $output .=" </tr>

                            </table>";

                            echo $output;

                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $query= "UPDATE doctors SET status='Approved' WHERE  id = '$id'";
                                mysqli_query($con,$query);
                            
                            }else if(isset($_GET['id1'])){
                                $id=$_GET['id1'];
                                $query= "UPDATE doctors SET status='Rejected' WHERE  id = '$id'";
                                mysqli_query($con,$query);
                            }
                            ?>  
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>