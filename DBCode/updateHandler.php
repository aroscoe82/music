<?php

$status = $_GET["v"];
$ID = $_GET["q"];

//echo "ID: " . $ID . " Status: " . $status;

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{
    $sql = "UPDATE Entries SET Approval=\"" . $status . "\" WHERE UserID=" . $ID;
	
	// Execute query
     //echo $sql;	
	
    if (mysqli_query($con,$sql))
	{
		echo "<script>Entry Updated</script>";
	}else{
		echo "<script>Entry NOT Updated please try again</script>";
	}
	
	mysql_close($con);
}
?>