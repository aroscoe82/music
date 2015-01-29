[insert_php]
$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

$tmp;

if (mysqli_connect_errno())
{
echo "Failed to connect to Database: ";
}else{

$result = mysqli_query($con,"SELECT * FROM Genres Where (Include=1)");

echo "<div id=\"GenreList\">\n";

while($row = mysqli_fetch_array($result))
{
     echo "<a class=\"GenreItem\" href=\"http://phlmusicfest.com/specific-genre?Genre=" . $row['Genre'] . "\" >";
     echo "<img alt=\"" . $row['Name'] . "\" src=\"/wp-content/uploads/GenreImages/" . $row['ImgSrc'] . "\"";
     if(!empty($row['RollOverSrc'])){
          echo " onmouseover=\"this.src='/wp-content/uploads/GenreImages/" . $row['RollOverSrc'] . "'\" onmouseout=\"this.src='/wp-content/uploads/GenreImages/" . $row['ImgSrc'] . "'\"";
     }
echo " /></a>";
}

echo "\n";
mysqli_close($con);
}
[/insert_php]