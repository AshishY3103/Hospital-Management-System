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
    checklogin('doctor');
    ?>
    <title> Check Patient Appointment </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3 class="text-center my-2" >Total Appointment</h3>
                    
                        <div class="col-md-12">
                            <div class="row">
                            
                                <div class="col-md-6">


                                <?php if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $query= "SELECT * FROM appointment WHERE id='$id'";
                                        $result=mysqli_query($con, $query);
                                        $row= mysqli_fetch_array($result);
                                        
                                    }
                                ?>

                                <table class="table table-bordered">
                                <tr>
                                    <th class="text-center " colspan="2">Appointment Details</th>
                                </tr>
                                <tr>
                                    <th>Id</th>
                                    <td><?php echo $row['id'];?></td>
                                </tr>
                                <tr>
                                    <th>Firstname</th>
                                    <td><?php echo $row['fname'];?></td>
                                </tr>
                                <tr>
                                    <th>Lastname</th>
                                    <td><?php echo $row['lname'];?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo $row['gender'];?></td>
                                </tr>
                                <tr>
                                    <th>Appointment Date</th>
                                    <td><?php echo $row['appointment_date'];?></td>
                                </tr>
                                <tr>
                                    <th>Phone No.</th>
                                    <td><?php echo $row['phone_no'];?></td>
                                </tr>
                                <tr>
                                    <th>Symptoms</th>
                                    <td><?php echo $row['symptoms'];?></td>
                                </tr> 
                            </table>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="text-center">Invoice</h5>
                                    <?php 
                                        if (isset($_POST['send'])){
                                            $fee=$_POST['fee'];
                                            $description=$_POST['description'];

                                            if(empty($fee)){

                                            }else if(empty($description)){

                                            }else{
                                                $doctor=$_SESSION['doctor'];
                                                $patient=$row['fname']." ".$row['lname'];
                                                $query="INSERT INTO income(doctor,patient,dates_dicharge,amount_paid,description) VALUES ('$doctor','$patient',NOW(),'$fee','$description')";
                                                $result=mysqli_query($con,$query);
                                                if($result){
                                                    echo "<script>alert('You have send Invoice')</script>";
                                                    
                                                mysqli_query($con,"UPDATE appointment SET status='Discharge' where id= '$id'");
                                                }
                                            }

                                        }                                    
                                    ?>
                                        <form method ="post">
                                            <label> Fee </label>
                                            <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee ">

                                            <label>Description </labe>
                                            <input type="text" name="description" class="form-control" autocomplete="off" placeholder="Enter Description ">

                                            <input type="submit" name="send" class="btn btn-primary my-2" value="Send">
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