<?php

 $con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

 // Check connection

 if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{

$sqlTbl = "CREATE TABLE Entries (UserID Int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY, Name Char(50), Genre Char(30), Members Text, MusicallyTrained TinyInt(1), ContactPerson Char(30), Email Char(30), YearFormed Char(4), Location Char(30), YouTubeLink Char(100), WebSiteLink Char(30), ImgSrc Char(30), Bio Text, Approval Char(10))";

	// Execute table query
	if (mysqli_query($con,$sqlTbl)){
		echo "Table Created\n";
	}
	else{
		echo "Error Table Was Not Created";
	}

mysqli_close($con);
}
		
?>