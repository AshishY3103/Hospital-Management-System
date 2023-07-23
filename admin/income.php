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
    checklogin('admin');?>
    <title> Total Income </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <?php include "sidenav.php";?> 
                <div class="col-md-10">
                    <h3><center>Total Income</center></h3>
                    

            <?php        $query = "SELECT * FROM income";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-primary'>
                                        <th>ID</th>
                                        <th>Doctor</th>
                                        <th>Patient</th>
                                        <th>Date Discharge</th>
                                        <th>Amount</th>
                                    </tr>";

                            if (mysqli_num_rows($result) < 1) {
                                $output .=   "<tr>
                                                <td class='text-center' colspan='5'>No Patient Discharge Yet.</td>
                                            </tr>";
                            }
                            while($row= mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $doctor = $row['doctor'] ;
                                $patient = $row['patient'] ;
                                $date_discharge = $row['dates_dicharge'] ;
                                $amount = $row['amount_paid'] ;

                                $output .="
                                <tr>
                                    <td>$id</td>
                                    <td>$doctor</td>
                                    <td>$patient</td>
                                    <td>$date_discharge</td>
                                    <td>$amount</td>
                                    
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
</body>

</html>