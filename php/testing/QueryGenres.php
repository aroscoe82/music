<?php 
session_start();

include 'header.php';

echo "<!-- Page Content -->";

if (isset($_SESSION['QueryGenre'])) {
    session_unset();
    session_start();
    $_SESSION['QueryGenre'] = $_POST['Genre'];
	//echo "Session Variable Already Exists<br>Value is " . $_SESSION['QueryGenre'];
} else {
    //echo "Session Variable DOES NOT Exists";
	if (isset($_POST)) {
		$_SESSION['QueryGenre'] = $_POST['Genre'];
	}
	else{
		$_SESSION['QueryGenre'] = "";
	}
}

$GENRESELECTED = $_SESSION['QueryGenre'];

$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT Genre FROM Genres Where (Include=1)");

?>

<form action="QueryGenres.php" method="post" name="genreSelection" id="genreSelection">
<table cellpadding="5px">
	<tr>
    <td>
    <select name="Genre" size="1" id="Genre">
    	<option value=""></option>

<?php

while($row = mysqli_fetch_array($result))
{
		echo "<option value=\"" . $row['Genre'] . "\"";
		if ($GENRESELECTED == $row['Genre']) echo " selected=\"selected\"";
		echo ">" . $row['Genre'] . "</option>\n";
}

?>
    </select>
    </td>
    <td><input type="Submit" name="Submit" value="Query" /></td>
    </tr>
    </table>
</form>

<?php

if($GENRESELECTED != ""){
	include 'QuerySpecificGenre.php'; 	
}


mysqli_close($con);
echo "<!-- End of Page Content -->\n";

include 'footer.php'; 

?>