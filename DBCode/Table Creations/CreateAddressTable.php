<?php

 $con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

 // Check connection

 if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqlTbl = "CREATE TABLE MailingList (UserID Int(11), Name Char(30), Address1 Char(50), Address2 Char(50), City Char(30), State Char(2), ZipCode Char(5), Phone Char(10))";

// Execute table query
if (mysqli_query($con,$sqlTbl)){
	echo "Table Created,\n";
}
else{
	echo "Error Table Was Not Created";
}

mysqli_close($con);
		
?>