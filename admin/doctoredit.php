<?php session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';
    include 'function.php';
    checklogin('admin');
    ?> 
    <title>Edit Doctor</title>
</head>
<body>
<?php 
include 'header.php';
include 'db/config.php';
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <?php include 'sidenav.php'; ?>
            <div class="col-md-10">
                <h5 class="text-center" > Edit Doctor</h5>
                    <?php if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                        $query= "SELECT * FROM doctors WHERE id='$id'";
                                        $result=mysqli_query($con, $query);
                                        $row= mysqli_fetch_array($result);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                           <h5 class="text-center"> Doctor's Details</h5> 
                           <h6 class="my-3">ID          : <?php echo $row['id'];?></h6>
                           <h6 class="my-3">First Name  : <?php echo $row['fname'];?></h6>
                           <h6 class="my-3">Last name   : <?php echo $row['lname'];?></h6>
                           <h6 class="my-3">Username    : <?php echo $row['username'];?></h6>
                           <h6 class="my-3">Email       : <?php echo $row['email'];?></h6>
                           <h6 class="my-3">Phone       : +<?php echo $row['phone_no'];?></h6>
                           <h6 class="my-3">Gender      : <?php echo $row['gender'];?></h6>
                           <h6 class="my-3">Country     : <?php echo $row['country'];?><h6>
                           <h6 class="my-3">Date Registered : <?php echo $row['date_reg'];?></h6>
                           <h6 class="my-3">Salary      : <?php echo $row['salary'];?></h6>

                        </div>
                        <div class="col-md-4">
                            <h5> Update Salary</h5>
                            <form method="post">
                                <label> Enter Doctor's salary</label>
                                <?php 
                                 
                                if(isset($_POST['update'])){

                                    $salary=$_POST['salary'];
                                    $query="UPDATE doctors SET salary = '$salary' WHERE id = '$id'";
                                    $result=mysqli_query($con,$query);
                                    $success['salary']="Salary Updated";
                                }
                            
                                if (isset($success['salary'])) {
                                    $s = $success['salary'];
                                    $show = "<h6 class='alert alert-success'> $s </h6>";
                                } else {
                                    $show = "";
                                }
                                    echo $show;?>
                                <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's salary" >
                                <input type="submit" name="update" class="btn btn-outline-info my-2" value="Update">
                                
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>