<?php
$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM Entries");

echo "<!doctype html>
	  <html>
	  <head>
	  <meta charset=\"UTF-8\">
	  <title>Untitled Document</title>
	  </head>";

echo "<form action='bio.php' method='post' id='form1' name='form1'>\n";
echo "<table border='0' padding='10px'>\n";
echo "<tr>\n";
echo "<td>Band</td>\n";
echo "<td>\n<select name='band' size='1' id='band'>\n";

while($row = mysqli_fetch_array($result))
  {
  echo "<option value=\"" . $row['ID'] . "\">" . $row['Name'] . "</option>\n";
  }
echo "</select>
	  </td>";
echo "<td><input type=\"submit\" name=\"Submit\" id=\"Submit\" value=\"Submit\" /></td>";  
echo "</tr>
	  </table>";
echo "</form>\n";
echo "</body>\n
	  </html>";

mysqli_close($con);
 ?> 