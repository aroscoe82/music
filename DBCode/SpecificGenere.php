<script type="text/javascript" src="http://phlmusicfest.com/wp-content/scripts/voting.js"></script>
<script type="text/javascript">
<!--
voting.js();
//--></script>

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
      // voting section
      $sql = "Select * from VoteTracking Where IPAddress=\"" . ip2long($_SESSION['IPAddress']) . "\" And Genre=\"" . $Genre . "\"";

      $result = mysqli_query($con,$sql);
      $row_cnt = $result->num_rows;

      if ((!$result) OR ($row_cnt==0)) {
           $able2VoteNow = true;
      }else{
           while($row = mysqli_fetch_array($result)) {
                $lastVote = strtotime($row[TimeOfVote]);
                $today = strtotime(date("Y-m-d H:i:s"));
                $oneDay = 60*60*24;

                if($today > ($lastVote+$oneDay)){
                     $able2VoteNow = true;
                }else{
                     $able2VoteNow = false;
                }
           }
      }
      //****************
 
      $sql = "Select * From Entries Where (Genre=\"" . $Genre . "\" And Approval=\"Approved\")";

      $result = mysqli_query($con,$sql);

      $row_cnt = $result->num_rows;

      if ((!$result) OR ($row_cnt==0)) {
           echo "No Entries for " . $Genre;
      }else{
           while($row = mysqli_fetch_array($result))
           {
                echo "<div id=\"entry\">\n";
                echo "<a id=\"band-bio-link\" href=\"http://phlmusicfest.com/bio-page/?EntryID=" . $row['UserID'] . "&Genre=" . $Genre . "\"><img src=\"/wp-content/uploads/Participants/" . $row['ImgSrc'] . "\" id=\"band-image\" height=\"140px\" width=\"140px\"/></a>";
echo "<a id=\"band-bio-link\" href=\"http://phlmusicfest.com/bio-page/?EntryID=" . $row['UserID'] . "&Genre=" . $Genre . "\"><h3 id=\"band-title\">" . $row['Name'] . "</h3></a>";
echo "<p id=\"band-bio\">" . substr(nl2br($row['Bio']), 0, 200) . "... <a id=\"band-bio-link\" href=\"http://phlmusicfest.com/bio-page/?EntryID=" . $row['UserID'] . "&Genre=" . $Genre . "\">Watch Video</a></p>";
                echo "<div id=\"votingStatus\">";
                if($able2VoteNow == true){
                     echo "<button id=\"Submit\" onclick=\"vote('" . $row['UserID'] . "', '" . $_SESSION['IPAddress'] . "', '" . $Genre . "')\" class=\"test\">Vote</button>";
                }else{
                     echo "<p>Total Votes: " . $row['Votes'] . "</p>";
                }
                echo "</div>";
                echo "</div>";
           }
      }

      $sql = "Select TimeOfVote from VoteTracking Where IPAddress='" . $_SESSION['IPAddress'] . "' AND Genre='" . $Genre . "'";
      //echo $sql;
      $result = mysqli_query($con,$sql);
      $row_cnt = $result->num_rows;

      if (($result) OR ($row_cnt>0)) {
      /* it found an IPAdress Entry for this Genre, need to check what time they voted last */
          while($row = mysqli_fetch_array($result))
           {
               
           }
      }else{
      // did not vote, display voting feature
      }

}

[/insert_php]