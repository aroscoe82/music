<?php 

include 'header.php';

echo "<!-- Page Content -->";

$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Entries Where (ID='" . $_POST['BandID'] . "')");


while($row = mysqli_fetch_array($result))
{
	echo "\n<h2 class=\"band_name\">\n" . $row['Name'] . "</h2>\n";
	
	echo $row['Genre'] . "<br>\n";
	echo $row['Members'] . "<br>\n";
	echo $row['ContactPersonName'] . "<br>\n";
	echo $row['Email'] . "<br>\n";
	echo $row['Location'] . "<br>\n";
	echo $row['Site'] . "<br>\n";
	echo $row['Bio'] . "<br>\n";
}

mysqli_close($con);

echo "<!-- End of Page Content -->\n";

include 'footer.php'; 

?>