<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'links.php'; ?>
    <title> Home Page </title>
</head>

<body >
<?php include 'header.php'; ?>
   <div class="container-fluid">
       <div class="col-md-12">
           <div class="row my-4 mx-5">
               <div class="col-md-4 mx-1 shadow">
                    <img style="width:100%;" src="img/Doctors.jpg" >
                    <h5 class="text-center">We are employing for doctors</h5>
                    <a href="doctor/add.php">
                        <button style="margin-left:90px" class="btn btn-success my-2 ">Apply Now !!!</button>
                    </a>
               </div>
               <div class="col-md-4 mx-1 shadow">
                    <img style="width:100%;" src="img/Patients.jpg">
                    <h5 class="text-center">Create Account so that we can take good care of you</h5>
                    <a href="patient/add.php">
                        <button style="margin-left:90px" class="btn btn-success my-2 ">Create Account</button>
                    </a>
               </div>  
              <div class="col-md-3 mx-1 shadow">
                    <img  src="img/more_info.png">
                    <h5 class="text-center">Click on button for more information</h5>
                    <a href="information.php">
                        <button style="margin-left:40px" class="btn btn-success my-2 ">More Information</button>
                    </a>
               </div>
           </div>
       </div>
   </div>
</body>

</html>