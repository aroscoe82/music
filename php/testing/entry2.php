<?php 

include 'header.php';

echo "<!-- Page Content -->";

$NAME = $_POST["Name"];
$GENRE = $_POST["Genre"];
$MEMBERS = $_POST["Members"];
$CONTACT = $_POST["Contact"];
$MAILADD = $_POST["Address"];
$EMAIL = $_POST["EMail"];
$YEARFORMED = $_POST["FormationYear"];
$LOCATION = $_POST["Location"];
$YOUTUBELINK = $_POST["YouTubeLink"];
$WEBSITELINK = $_POST["websiteLink"];
$BIO = $_POST["Bio"];
$IMAGE = $_POST["ImageFile"];

$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}



$sql = "INSERT INTO Entries (Name, Genre, ContactPersonName, Email, Location, YouTubeLink, YearFormed, Site, Bio) VALUES (" . $NAME ."," . $GENRE ."," . $CONTACT . "," . $EMAIL . "," . $LOCATION ."," . $YOUTUBELINK . "," . $YEARFORMED . "," . $WEBSITELINK . "," . $BIO . "')";



// Execute query

if (mysqli_query($con,$sql))

{


echo "<h2>Thanks for entering your entry will be reviewed and processed</h2>\n";

}

else

{

echo "Error Entry was NOT submitted";

}

echo "<!-- End of Page Content -->\n";

include 'footer.php'; 

?>