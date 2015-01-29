<?php
$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM Entries Where ID=2 ");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
 ?> 