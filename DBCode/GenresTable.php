<?php 

echo "<!-- Page Content -->";

 $con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

 $numAcross = 4;
 $i = 0;
 $tmp;

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{

$result = mysqli_query($con,"SELECT * FROM Genres Where (Include=1)");

echo "<table id=\"GenreList\">\n";

while($row = mysqli_fetch_array($result))
{
    $i++;
    $tmp = $i%$numAcross;

    if($tmp == 1){
        echo "<tr>\n";
    }
    
    echo "<td><img src=\"/wp-content/uploads/2013/04/" . $row['ImgSrc'] . "\" alt=\"" . $row['Genre'] . "\" title=\"" . $row['Genre'] . "\" /></td>";

    if($tmp == 0){
        echo "</tr>\n";
    }     
}

echo "</table>";

mysqli_close($con);
}
echo "<!-- End of Page Content -->\n";

?>