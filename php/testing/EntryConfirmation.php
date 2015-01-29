<?php 
session_start();

include 'header.php';

echo "<!-- Page Content -->";

$NAME = $_SESSION["Name"];
$GENRE = $_SESSION["Genre"];
$MEMBERS = $_SESSION["Members"];
$CONTACT = $_SESSION["Contact"];
$MAILADD = $_SESSION["Address"];
$EMAIL = $_SESSION["EMail"];
$YEARFORMED = $_SESSION["FormationYear"];
$LOCATION = $_SESSION["Location"];
$YOUTUBELINK = $_SESSION["YouTubeLink"];
$WEBSITELINK = $_SESSION["websiteLink"];
$BIO = $_SESSION["Bio"];
$IMAGE = $_SESSION["ImageFile"];

$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
	
// Check connection
	
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO Entries (Name, Genre, ContactPersonName, Email, Location, YouTubeLink, YearFormed, Site, Bio, Approval) VALUES (\"" . $NAME ."\",\"" . $GENRE ."\",\"" . $CONTACT . "\",\"" . $EMAIL . "\",\"" . $LOCATION ."\",\"" . $YOUTUBELINK . "\",\"" . $YEARFORMED . "\",\"" . $WEBSITELINK . "\",\"" . $BIO . "\",\"Pending\")";

// Execute query

if (mysqli_query($con,$sql))
{
	echo "<h2>Thanks for entering<br>Your entry will be reviewed and processed</h2>\n";
	session_write_close();
}
else{
	echo "Error Entry was NOT submitted<br><br>";
	echo $sql;
}

echo "<!-- End of Page Content -->\n";


include 'footer.php'; 

?>