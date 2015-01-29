<h1>Input to Location List</h1>
<form action="#" method="post" id="addLocation">
<table cellpadding="10px">
<tr>
	<td>Location Name</td>
    <td><input type="text" id="locationName" name="locationName" required="required" maxlength="30"></td>
</tr>
<tr>
	<td>State</td>
    <td><input type="text" id="state" name="state" required="required" maxlength="2"></td>
</tr>
<tr>
	<td>Include in List</td>
    <td><input type="radio" name="include" value="1"> Yes 
<input type="radio" name="incldue" value="2"> No</td>
</tr>
<tr>
	<td></td>
    <td align="right"><input type="submit" name="submit" id="sumbit" value="Add To List"></td>
</tr>
</table>
</form>
<br>

<?php

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if( isset($_POST['locationName']) )
{
	$NAME = $_POST["locationName"];
	$State = $_POST["state"];
	$Include = $_POST["include"];
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to Database: ";
	}else{
	
		$sql = "INSERT INTO LocationRegion (Name, State, Include) VALUES (\"" . $NAME ."\",\"" . $State ."\",\"" . $Include . "\")";
		
		// Execute query
	
		if (mysqli_query($con,$sql))
		{
			echo "<h2>" . $NAME . " has been added to the table.</h2>\n";
		}
		else{
			echo "<h2>" . $NAME . " has not been added to the table.</h2>\n<h3>The entry may already exist.</h3>";
		}
echo "<hr>";
	}
}

 // Check connection

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to Database: ";
	}else{
    
    $sql = "SELECT * FROM LocationRegion";
    $result = mysqli_query($con,$sql);
    
	echo "<h1>Table Data</h1>\n";
	echo "<table>";
	echo "<tr><th>Location Name</th><th>State</th><th>Include</th></tr>";
	
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>\n";
        echo "<td>" . $row['Name'] . "</td><td>" . $row['State'] . "</td>";
		echo "<td>";
		
		if($row['Include'] == 1){
			echo "Yes";	
		}else{
			echo "No";
		}
		
		echo "</td>\n</tr>";
    }
    echo "</table>";
   
	}
 mysqli_close($con);
?>