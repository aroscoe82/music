<?php

  $id=$_GET["id"];
  $IPAddress=$_GET["ip"];
  $genre=$_GET["genre"];
  
  $todayTime = time();
  $todayDate = date("Y-m-d H:i:s");
  
  $con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to Database: ";
	}else{
		
		$sql = "UPDATE Entries SET Votes = Votes + 1 WHERE UserID=" . $id;
		
		$result = mysqli_query($con,$sql);
		
		if($result == true){
 		     $sql = "INSERT into VoteTracking(IPAddress, Genre, TimeOfVote) VALUES('" . ip2long($IPAddress) . "', '" . $genre . "', '" . $todayDate . "')";
		
		     $result = mysqli_query($con,$sql);
			 
			 if($result== true){
				 //echo "ID=" . $id . " IP= " . $IPAddress . " Genre=" . $genre . " Time= " . $today;
			 }
		}
		
		
	mysql_close($con); 	
	}
?>