<?php

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if(isset($_POST['Remove']))
{
  $pos = stripos($_POST['Remove'],"_");
  $len = strlen($_POST['Remove']);
  $item_id = substr($_POST['Remove'],0, $pos);
  $item_name = substr($_POST['Remove'],$pos+1, $len-$pos-1);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to Database";
  }else{

    $sql = "DELETE FROM LocationRegion WHERE ID=\"" . $item_id . "\"" ;

    // Execute query
	
       if (mysqli_query($con,$sql))
	{
		echo "<h2>Removed " . $item_name . " from the table</h2>\n";
	}else{
		echo "<h2>" . $item_name . " has not been removed from the table.</h2>\n";
	}
   }

}

if(isset($_POST['Update']))
{
  $pos = stripos($_POST['Update'],"_");
  $len = strlen($_POST['Update']);
  $item_id = substr($_POST['Update'],0, $pos);
  $item_name = substr($_POST['Update'],$pos+1, $len-$pos-1);
  $update_to = $_POST[$item_id];

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to Database";
  }else{

    $sql = "UPDATE LocationRegion SET Include=" . $update_to . " WHERE ID=" . $item_id ;

    // Execute query
	
       if (mysqli_query($con,$sql))
	{
		echo "<h1>Updated " . $item_name . " </h1>\n";
	}else{
		echo "<h2>" . $item_name . " has not been updated.</h2>\n";
	}
   }
}

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{
	$sql = "SELECT * FROM LocationRegion Order By State, Name ASC";
        $result = mysqli_query($con,$sql);
    
	echo "<form name=\"updateLocation\" action=\"#\" method=\"post\">";
	echo "<table>";
	echo "<tr><th>Location Name</th><th>State</th><th>Include</th><th></th><th></th></tr>";
	
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>\n";
        echo "<td>" . $row['Name'] . "</td><td>" . $row['State'] . "</td>";
        echo "<td>";
		
		if($row['Include'] == 1){
			echo "<input type=\"radio\" name=\"" . $row['ID'] . "\" value=\"1\" checked=\"checked\" /> Yes ";
			echo "<input type=\"radio\" name=\"" . $row['ID'] . "\" value=\"0\" /> No";	
		}else{
			echo "<input type=\"radio\" name=\"" . $row['ID'] . "\" value=\"1\" /> Yes ";
			echo "<input type=\"radio\" name=\"" . $row['ID'] . "\" value=\"0\" checked=\"checked\" /> No";
		}
		
		echo "</td>\n";
        echo "<td>";
        echo "<button type=\"Submit\" value=\"" . $row['ID'] ."_" . $row['Name'] . "\" name=\"Update\" />Update</button>";
        echo "</td>";
        echo "<td>";
        echo "<button type=\"Submit\" value=\"" . $row['ID'] ."_" . $row['Name'] . "\" name=\"Remove\" />Remove</button>";
        echo "</td>\n</tr>\n";
	}
	
	echo "</table>\n";
	echo "</form>";
	

   mysqli_close($con);	
}
?>