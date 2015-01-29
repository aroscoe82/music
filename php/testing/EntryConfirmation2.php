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

if ($_POST['Submit']){

	$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
	
	// Check connection
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "INSERT INTO Entries (Name, Genre, ContactPersonName, Email, Location, YouTubeLink, YearFormed, Site, Bio) VALUES (\"" . $NAME ."\",\"" . $GENRE ."\",\"" . $CONTACT . "\",\"" . $EMAIL . "\",\"" . $LOCATION ."\",\"" . $YOUTUBELINK . "\",\"" . $YEARFORMED . "\",\"" . $WEBSITELINK . "\",\"" . $BIO . "\")";

	// Execute query

	if (mysqli_query($con,$sql))
	{
		echo "<h2>Thanks for entering your entry will be reviewed and processed</h2>\n";
	}
	else{
		echo "Error Entry was NOT submitted<br><br>";
		echo $sql;
	}
}
else if($_POST['Review']){
	
	echo "\n<h2 class=\"band_name\">\n" . $NAME . "</h2>\n";

	echo "<table id=\"entry_review\">
		<tr>
			<td>Genre</td>
			<td>" . $NAME . "</td>
		</tr>
		<tr>
			<td>Members</td>
			<td>" . $MEMBERS . "</td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td>" . $CONTACT . "</td>
		</tr>
		<tr>
			<td>Email Address</td>
			<td>" . $EMAIL . "</td>
		</tr>
		<tr>
			<td>Year Formed</td>
			<td>" . $YEARFORMED . "</td>
		</tr>
		<tr>
			<td>Location</td>
			<td>" . $LOCATION . "</td>
		</tr>
			<tr>
			<td>Website</td>
			<td>" . $WEBSITELINK . "</td>
		</tr>
			<tr>
			<td>Bio</td>
			<td>" . $BIO . "</td>
		</tr>
	</table>\n";
	echo "<form action=\"\" method=\"post\"><input type=\"Submit\" name=\"Submit\" value=\"Submit\" /></form>";
}

echo "<!-- End of Page Content -->\n";


include 'footer.php'; 

?>