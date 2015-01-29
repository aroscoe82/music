<?php

 $con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

 // Check connection

 if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqlTbl = "CREATE TABLE LocationRegion (ID Int(11) Not Null AUTO_INCREMENT, Name Char(30) UNIQUE, State Char(2), Include TinyInt(1))";

// Execute table query
if (mysqli_query($con,$sqlTbl)){
	echo "Table Created,\n";
}
else{
	echo "Error Table Was Not Created";
}

mysqli_close($con);
		
?>