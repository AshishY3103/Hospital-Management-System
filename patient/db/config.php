<?php
  $db_host="127.0.0.1";  
  $db_user="root";
  $db_passward="";
  $db_name="hms";
  //creating connection
  $con = new mysqli($db_host,$db_user,$db_passward,$db_name);
  //check connection
  /*if($con->connect_error){
    die("Connection Failed");
  }
  echo"Connected Successfully <hr>";*/
  ?>
