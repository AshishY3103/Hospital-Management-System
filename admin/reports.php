<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    
     ?> 
    <title>Reports</title>
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
                    <h5 class="text-center my-2"> Reports</h5>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="smy-2"><strong>All Reports :</strong></h6>
                            <?php
                            
                            include 'db/config.php';
                            $query = "SELECT * FROM report ";
                            $result = mysqli_query($con, $query);
                           
                            $output = "
                                    <table class='table table-bordered text-center'>
                                    <tr class='bg-danger'>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Send On</th>
                                        <th>Send By</th>
                                        <th>Action</th>
                                       
                                    </tr>";

                            if (mysqli_num_rows($result) < 1) {
                                $output .=   "<tr>
                                                <td colspan='9'>No New Report</td>
                                            </tr>";
                            }
                            while($row= mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $message = $row['message'];
                                $send_on = $row['date_send'];
                                $send_by = $row['send_by'];
                                $output .="
                                <tr>
                                    <td>$id</td>
                                    <td>$title</td>
                                    <td>$message</td>
                                    <td>$send_on</td>
                                    <td>$send_by</td>
                                    <td>
                                   <a href='reports.php?id=$id'  name='remove' id='remove' class='fa fa-trash-alt fa-lg mx-2' style='color:red;'> </a>                                      
                                                                   
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
        </div>
    </div>

</body>
</html>