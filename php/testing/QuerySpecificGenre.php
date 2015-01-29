<?php

$result = mysqli_query($con,"SELECT * FROM Entries Where (Genre='" . $_SESSION['QueryGenre'] . "')");

echo "<form action=\"QuerySpecificID.php\" method=\"post\" name=\"formBandID\">";
echo "<table border=\"0px\" id=\"results_table\">
 <tr>
 <th width:50px;>ID</th>
 <th width:100px;>Name</th>
 <th width:100px;>Gene</th>
 <th width:100px;>Location</th>
 <th width:100px;>Approval Status</th>
 <th width: 100px;></th>
 </tr>";

while($row = mysqli_fetch_array($result))
{
   echo "<tr>";
   echo "<td>" . $row['ID'] . "</td>\n";
   echo "<td>" . $row['Name'] . "</td>\n";
   echo "<td>" . $row['Genre'] . "</td>\n";
   echo "<td>" . $row['Location'] . "</td>\n";
   echo "<td>" . $row['Approval'] . "</td>\n";
   echo "<td>
   	<button name=\"BandID\" type=\"submit\" value=\"" . $row['ID']. "\">More Info</button>
   </td>\n";
   echo "</tr>\n";
}
echo "</table>";
echo "</form>";

?>