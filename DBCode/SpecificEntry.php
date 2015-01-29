<?php

$SelectedEntry = $_Get['ID'];

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");
 
if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{
    
    $sql = "SELECT * FROM Registration Where((Approval='Approved')and(ID='" . $SelectedEntry . "'))";
    $result = mysqli_query($con,sql);
    
    while($row = mysqli_fetch_array($result))
    {
        echo "<div id=\"Contestent\">";
        echo "<img src=\"\" alt=\"\" title=\"\" />";
        echo "<h2>" . "</h2>";
        echo "Breif Bio";
        echo "Vote For (Band Name)";
        echo "</div>";
    }
    
    mysqli_close($con);

}

?>