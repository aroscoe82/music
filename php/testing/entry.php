<?php

$con=mysqli_connect("localhost","aroscoec_user1","D3p3w###","aroscoec_reginfo");

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}



$sql = "INSERT INTO Entries (Name, Genre, ContactPersonName, Email, Location, YouTubeLink, YearFormed, Site, Bio) VALUES ('Test Name', 'Country', 'Fred', 'SomeEmail@email.com', 'Philly', 'somelink@youtube.com', '01/01/1111', 'aroscoe.com', 'Some Band Bio Info')";



// Execute query

if (mysqli_query($con,$sql))

{

echo "Successful Input";

}

else

{

echo "Error Entries input: " . mysqli_error();

}

?>