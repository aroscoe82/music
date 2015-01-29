<?php

$ID = $_GET["q"];
$NAME = $_GET["v"];

//echo "ID: " . $ID . " Status: " . $status;

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{
    $sql = "DELETE FROM Entries WHERE UserID=" . $ID;
	
	// Execute query
     //echo $sql;	
	
    if (mysqli_query($con,$sql))
	{
		echo "Entry " . $NAME . " - " . $ID . " has been deleted.";
	}else{
    	echo "Entry " . $NAME . " - " . $ID . " has NOT been deleted.\nError, please try again.";
	}
	
	mysql_close($con);
}


?>