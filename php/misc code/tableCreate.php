<?php
$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table
$sql="CREATE TABLE Entries(ID INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(ID),Name CHAR(30), Genre CHAR(30), ContactPersonName CHAR(30), Email CHAR(30), YearFormed CHAR(10), Location CHAR(30), YouTubeLink CHAR(50), Site CHAR(30), Bio TEXT, Approval BIT)";

// Execute query
if (mysqli_query($con,$sql))
{
echo "Table Entries created successfully";
}
else
{
echo "Error Entries table: " . mysqli_error();
}
?> 