[insert_php]

$url = $_SERVER['REQUEST_URI'];
$url = explode("=", $url);
$Genre = $url[1];

echo "<h1>" . $Genre . "</h1>";

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to Database: ";
}else{

      $sql = "Select * From Entries Where (Genre=\"" . $Genre . "\" And Approval=\"Approved\")";

      $result = mysqli_query($con,$sql);

      $row_cnt = $result->num_rows;

      if ((!$result) OR ($row_cnt==0)) {
           echo "No Entries for " . $Genre;
      }else{
           while($row = mysqli_fetch_array($result))
           {
                echo "<div id=\"entry\">\n";
                echo "<img src=\"/wp-content/uploads/Participants/" . $row['ImgSrc'] . "\" id=\"band-image\" height=\"140px\" width=\"140px\" />"; 
                echo "<h3 id=\"band-title\">" . $row['Name'] . "</h3>";
                echo "<p id=\"band-bio\">" . substr(nl2br($row['Bio']), 0, 100) . "... <a id=\"band-bio-link\" href=\"http://phlmusicfest.com/bio-page/?EntryID=" . $row['UserID'] . "\">More Info</a></p>";
                echo "</div>";
           }
      }

}

[/insert_php]