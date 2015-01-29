<?php

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");


if (mysqli_connect_errno())
	{
		echo "Failed to connect to Database: ";
	}else{
		
		$sql = "Update Entries set Votes = 0";
		
		$result = mysqli_query($con,$sql);
		
		if($result == true){
			$sql = "TRUNCATE TABLE VoteTracking";
			$result = mysqli_query($con,$sql);
			
			if($result == true){
				echo "Voting totals are rest to 0";
			}
		}
		
		mysql_close($con); 
	}

?>