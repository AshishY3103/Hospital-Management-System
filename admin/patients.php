<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php'; 
   
    ?> 
    <title>Job Request</title>
</head>
<body>
    <?php include 'header.php';?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <?php 
               if(isset($_SESSION['admin'])){
                    include 'sidenav.php'; 
                }
                ?>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Patients</h5>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="smy-2"><strong>All Patients :</strong></h6>
                            <?php
                            include 'db/config.php';
                            $query = "SELECT * FROM patients ";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-warning'>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>First name</th>
                                        <th>Last name</th>
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
                                $profile= $row['profile'];
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
                                        <a href='view.php?id=".$id."'>
                                            <button class ='btn btn-warning my-3'>View</button>
                                        </a>  
                                                                             
                                    </td>
                                ";
                            }
                            $output .=" </tr>

                            </table>";

                            echo $output;
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