<?php
$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$SelectedID = $_POST['band'];

$result = mysqli_query($con,"SELECT * FROM Entries Where ID=" . $SelectedID );
echo "<!doctype html>
	  <html>
	  <head>
	  <meta charset=\"UTF-8\">
	  <title>Untitled Document</title>
	  </head>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Contact</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['ContactPersonName'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "</body>\n
	  </html>";

mysqli_close($con);
 ?> 