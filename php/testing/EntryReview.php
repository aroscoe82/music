<?php 
session_start();

include 'header.php';

echo "<!-- Page Content -->";

$_SESSION["Name"] = $NAME = $_POST["Name"];
$_SESSION["Genre"] = $GENRE = $_POST["Genre"];
$_SESSION["Members"] = $MEMBERS = $_POST["Members"];
$_SESSION["Contact"] = $CONTACT = $_POST["Contact"];
$_SESSION["Address"] = $MAILADD = $_POST["Address"];
$_SESSION["EMail"] = $EMAIL = $_POST["EMail"];
$_SESSION["FormationYear"] = $YEARFORMED = $_POST["FormationYear"];
$_SESSION["Location"] = $LOCATION = $_POST["Location"];
$_SESSION["YouTubeLink"] = $YOUTUBELINK = $_POST["YouTubeLink"];
$_SESSION["websiteLink"] = $WEBSITELINK = $_POST["websiteLink"];
$_SESSION["Bio"] = $BIO = $_POST["Bio"];
$_SESSION["ImageFile"] = $IMAGE = $_POST["ImageFile"];

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
	echo "<form action=\"EditEntry.php\" method=\"post\"><input type=\"Submit\" name=\"Submit\" value=\"Edit\" /></form>";
	echo "<form action=\"EntryConfirmation.php\" method=\"post\"><input type=\"Submit\" name=\"Submit\" value=\"Submit\" /></form>";

echo "<!-- End of Page Content -->\n";


include 'footer.php'; 

?>