<?php
// Create connection
 $con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

// Check connection
 if (mysqli_connect_errno($con))
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
  else{
	echo "Connected";
  }
  
 ?> 