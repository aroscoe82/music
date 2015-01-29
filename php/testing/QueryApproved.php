<?php 

include 'header.php';

echo "<!-- Page Content -->";

 $con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

 // Check connection

 if (mysqli_connect_errno())

   {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();

   }

 

$result = mysqli_query($con,"SELECT * FROM Entries Where (Approval='Approved')");


echo "<table border=\"0px\" id=\"results_table\">

 <tr>

 <th width:50px;>ID</th>

 <th width:100px;>Name</th>

 <th width:100px;>Gene</th>

 <th width:100px;>Location</th>
 
 <th width:100px;>Approval Status</th>

 </tr>";


while($row = mysqli_fetch_array($result))
{
   echo "<tr>";
   echo "<td>" . $row['ID'] . "</td>";
   echo "<td>" . $row['Name'] . "</td>";
   echo "<td>" . $row['Genre'] . "</td>";
   echo "<td>" . $row['Location'] . "</td>";
   echo "<td>" . $row['Approval'] . "</td>";
   echo "</tr>";
}
echo "</table>";

mysqli_close($con);

echo "<!-- End of Page Content -->\n";

include 'footer.php'; 

?>