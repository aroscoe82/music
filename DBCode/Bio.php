<script type="text/javascript" src="http://phlmusicfest.com/wp-content/scripts/voting.js"></script>
<script type="text/javascript">
<!--
voting.js();
//--></script>

[insert_php]

//$url = $_SERVER['REQUEST_URI'];
//$url = explode("=", $url);
//$EntryID = $url[1];
$EntryID=$_GET["EntryID"];
$Genre = $_GET["Genre"];


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

     $sql = "Select * From Entries Where (UserID=" . $EntryID . ")";

     $result = mysqli_query($con,$sql);

     $row_cnt = $result->num_rows;

     if ((!result) OR ($row_cnt==0)) {
           echo "Error in EntryID " . $EntryID;
      }else{
           while($row = mysqli_fetch_array($result))
           {
                $sql = "Select ImgSrc From Genres Where (Genre='" . $row['Genre'] . "')";
                $result2 = mysqli_query($con,$sql);
                while($row2 = mysqli_fetch_array($result2))
                {
                    $genreSrc = $row2['ImgSrc'];
                } 

                
                echo "<div class=\"entry-content\">";

                $videoLink = explode("/", $row['YouTubeLink']);
                $link = "http://www.youtube.com/embed/" . $videoLink[count($videoLink) - 1];;

                echo "<iframe width=\"560\" height=\"315\" src=\"" . $link . "\" frameborder=\"0\" allowfullscreen></iframe>";
                echo "<div class=\"band-info\">
                      <img src=\"/wp-content/uploads/GenreImages/" . $genreSrc . "\" width=\"70px\" height=\"70px\" alt=\"genre-icon\" />\n";
                    if(!empty($row['ImgSrc'])){
                     echo "<img src=\"/wp-content/uploads/Participants/" . $row['ImgSrc'] . "\" width=\"70px\" height=\"70px\" alt=\"band-image\" />";
                }
                      echo "<h1 id=\"band-title\">" . stripslashes($row['Name']) . "</h1>
                      <p class=\"band-location\">From: " . $row['Location'] . "</p>\n";

                      //*****************************
                      echo "<div id=\"votingStatus\">";
                      if($able2VoteNow == true){
                           echo "<button id=\"Submit\" onclick=\"vote('" . $row['UserID'] . "', '" . $_SESSION['IPAddress'] . "', '" . $Genre . "')\" class=\"test\">Vote</button>";
                      }else{
                          echo "<p>Total Votes: " . $row['Votes'] . "</p>";
                      }
                echo "</div>";
                echo "</div>";
                      //*****************************

                echo "<div class=\"col1\">
                           <h4>Members:</h4>";
                if(!empty($row['Members'])){
                    echo "<ul>";
                    $members = explode("\n",$row['Members']);
                    foreach($members as $person){
                         echo "<li>" . stripslashes($person) . "</li>";
                    }
                    echo "</ul>";
                }

    	         echo "<h4>Year Formed:</h4>
    	                     <p>" . $row['YearFormed'] . "</p>\n</div>";
                echo "<div class=\"col2\">
    	                  <h4>Biogrpahy:</h4>
    	                  <p>" . stripslashes(strip_tags($row['Bio'])) . "</p>";
                echo "<h4>Website:</h4>\n<a href=\"" . $row['WebSiteLink'] . "\">" . $row['WebSiteLink'] . "</a>";
    	        echo "<h4>Email:</h4>\n<a href=\"mailto:" . $row['Email'] . "\">" . $row['Email'] . "</a>\n</div>";
                echo "</div>";
           }
      }

     mysqli_close($con);
}

[/insert_php]