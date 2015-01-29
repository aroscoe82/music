<?php
$q=$_GET["q"];
$v=$_GET["v"];

$choices = array("Approve", "Denied", "Pending");

echo "<h2>" . $q . " - " . $v . "</h2>";

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{

        if($q == "All"){
             $sql = "SELECT * FROM Entries Where Approval=\"" . $v . "\"";
        }else{
             $sql = "SELECT * FROM Entries Where Approval=\"" . $v . "\" AND Genre=\"" . $q . "\"";
        }
	
        $result = mysqli_query($con,$sql);

	$num_results = mysqli_num_rows($result);
	

if ($num_results>0){
	echo "<form>";
	echo "<table border='1'>
	<tr>
	<th>UserID</th>
	<th>Name</th>
	<th>Genre</th>
	<th>Location</th>
	<th>YouTubeLink</th>
	<th>Approval</th>
	</tr>";
	
	
	while($row = mysqli_fetch_array($result))
	    {
	  echo "<tr>";
	  echo "<td>" . $row['UserID'] . "</td>";
	  echo "<td>" . $row['Name'] . "</td>";
	  echo "<td>" . $row['Genre'] . "</td>";
	  echo "<td>" . $row['Location'] . "</td>";
	  echo "<td>" . $row['YouTubeLink'] . "</td>";
	  echo "<td><select name=\"status\">";
	  
	  foreach ($choices as $choice){
	  	echo "<option name=\"" . $row['UserID'] . "\" id=\"" . $row['UserID'] . "\" value=\"" . $choice . "\"";
		
		if($choice == $row["Approval"]){
			echo " selected=\"selected\"";
		}
		
		echo ">" . $choice . "</option>";
	  }
	  
	  echo "</td></tr>";
	  }
	echo "</table>";
	echo "</form>";
}else{
   echo "<h2>No Entries Found for these parameters</h2>";
}
mysql_close($con);
}
?>