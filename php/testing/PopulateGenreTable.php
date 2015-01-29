<?php

 $con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

 // Check connection

 if (mysqli_connect_errno())
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqlTbl = "CREATE TABLE Genres (Genre CHAR(30),Include BOOLEAN DEFAULT 1 NOT NULL)";

// Execute table query
if (mysqli_query($con,$sqlTbl)){
	echo "Table Created\n";
   
	$sql = "Insert into Genres (Genre, Include) Values
					 (\"Alternative\", 1), (\"Blues\", 1), (\"Classical\", 1), (\"Country\", 1), (\"Dance Music\", 1), (\"Electronic\", 1), (\"Folk\", 1), (\"Gospal\", 1), (\"Hip-Hop/Rap\", 1), (\"Opera\", 1), (\"Pop\", 1), (\"R&B Soul\", 1), (\"Reggae\", 1), (\"Rock\", 1), (\"Singer/Songwritter\", 1), (\"World Music\", 1), (\"Other\", 1)";

// Execute query

	if (mysqli_query($con,$sql)){
		echo "Entries Success";
	}
	else{
		echo "Error Entry was NOT successful";
	}
}
else{
	echo "Error Table Was Not Created";
}

mysqli_close($con);
		
?>