<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <?php include 'links.php'; 
    include 'function.php';
    checklogin('admin');?>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="col-md-12">
        <div class="row">
            <?php include "sidenav.php";?> 
            <div class="col-md-10">
            <h5 class="text-center my-2"> Admins</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="smy-2"><strong>All Admin :</strong></h6>
                            <?php  
                            $ad = $_SESSION['admin'];
                            include 'db/config.php';
                            $query = "SELECT * FROM admin WHERE username != '$ad'";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-success'>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Profile</th>
                                        <th>Action</th>
                                    </tr>";

                            if (mysqli_num_rows($result) < 1) {
                                $output .=   "<tr>
                                                <td colspan='3'>No New Admin</td>
                                            </tr>";
                            }
                            while($row= mysqli_fetch_array($result)){
                                $id = $row['Id'];
                                $username =$row['username'];
                                $profile = $row['profile'];

                                $output .="
                                <tr>
                                    <td>$id</td>
                                    <td>$username</td>
                                    <td><img src='$profile' style='height:30px; width:30px;'></td>
                                    <td>
                                         <a href='admins.php?id=$id'  name='remove'id='remove' class='fa fa-trash-alt fa-lg mx-2' style='color:red;'> </a>
                                    </td>
                                ";
                            }
                            $output .=" </tr>

                            </table>";

                            echo $output;

                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $query= "DELETE FROM admin WHERE  Id = '$id'";
                                mysqli_query($con,$query);
                                
                            }
                            ?>  
                            <a href="add.php"><div class="btn btn-success" ><i class="fa fa-plus-square mx-2"></i>Add New Admin </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>