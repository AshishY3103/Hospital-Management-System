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
    checklogin('patient');?>
    <title> Invoice </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3 class="text-center my-2" >Invoice</h3>

                    <?php
                   $username=$_SESSION['patient'];
                   $query= "SELECT * FROM patients WHERE username='$username'";
                   $result=mysqli_query($con, $query);
                   $patient=mysqli_fetch_array($result);
                   $pati = $patient['fname']." ".$patient['lname'] ;

                                       
                                        $query= "SELECT * FROM income WHERE patient='$pati'";
                                        $result=mysqli_query($con, $query);
                                        $row= mysqli_fetch_array($result);

                                        if($row>1){
                            
                    ?>
                    <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                            
                                <tr>
                                    <th>Id</th>
                                    <td><?php echo $row['id'];?></td>
                                </tr>
                                <tr>
                                    <th>Doctor</th>
                                    <td><?php echo $row['doctor'];?></td>
                                </tr>
                                <tr>
                                    <th>Patient</th>
                                    <td><?php echo $row['patient'];?></td>
                                </tr>
                                <tr>
                                    <th>Date Discharge</th>
                                    <td><?php echo $row['dates_dicharge'];?></td>
                                </tr>
                                <tr>
                                    <th>Fee</th>
                                    <td><?php echo $row['amount_paid'];?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo $row['description'];?></td>
                                </tr>
                                
                            </table>
                           
                        </div>
                  
                    </div>
                <?php  } else { ?>
                
                <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                        
                            <tr>
                                <td class="text-center" colspan="2"> No Invoice Yet </td>
                            </tr>
                        
                            
                        </table>
                       
                    </div>
              
                </div>
                
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>