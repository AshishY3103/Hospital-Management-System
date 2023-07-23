<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start();
    include 'links.php';
    include 'db/config.php';
    
    ?>
    <title> View Patient Details</title>
</head>
<body>
    <?php 
    include 'header.php';
    
    ?>
 <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <?php 
                if (isset($_SESSION['doctor'])){
                    include 'sidenav.php'; 
                }
                ?>
            <div class="col-md-10">
                <h5 class="text-center" > View Patient Details </h5>
                    <?php if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $query= "SELECT * FROM patients WHERE id='$id'";
                                        $result=mysqli_query($con, $query);
                                        $row= mysqli_fetch_array($result);
                                        
                    }
                    ?>
                    <div class="row">
                    <div class="col-md-3">
                           
                           </div>
                        <div class="col-md-6">
                            
                            <table class="table table-bordered">
                                <tr> <th colspan="2"><img src="<?php echo $row['profile'] ?>" class="col-md-4 my-2" height="100px;" width="100px;"></th></tr>
                                <tr>
                                    <th colspan="2"><?php $patient=$row['fname']." ".$row['lname'];  echo "$patient Details"; ?></th>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?php echo $row['id'];?></td>
                                </tr>
                                <tr>
                                    <td>Firstname</td>
                                    <td><?php echo $row['fname'];?></td>
                                </tr>
                                <tr>
                                    <td>Lastname</td>
                                    <td><?php echo $row['lname'];?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $row['username'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['email'];?></td>
                                </tr>
                                <tr>
                                    <td>Phone No.</td>
                                    <td><?php echo $row['phone_no'];?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['gender'];?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td><?php echo $row['country'];?></td>
                                </tr>
                                <tr>
                                    <td>Date Registered</td>
                                    <td><?php echo $row['date_reg'];?></td>
                                </tr>
                            </table>
                           
                        </div>
                        <div class="col-md-3">
                           
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>