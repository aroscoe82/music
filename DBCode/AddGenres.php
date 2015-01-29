<h1>Add to Genre List</h1>
<form action="#" method="post" id="addGenre" enctype="multipart/form-data">
<table cellpadding="10px">
<tr>
	<td>Genre Name</td>
    <td><input type="text" id="genreName" name="genreName" required="required" maxlength="30"></td>
</tr>
<tr>
	<td>Default Image</td>
    <td><input type="file" id="file1" name="file1" required="required"></td>
</tr>
<tr>
	<td>RollOver Image</td>
    <td><input type="file" id="file2" name="file2" required="required"></td>
</tr>
<tr>
	<td>Include in List</td>
    <td><input type="radio" name="include" value="1"> Yes 
<input type="radio" name="incldue" value="2"> No</td>
</tr>
<tr>
	<td></td>
    <td align="right"><input type="submit" name="submit" id="sumbit" value="Add To List"></td>
</tr>
</table>
</form>
<br>

[insert_php]

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno()){
     echo "Failed to connect to Database: ";
}else{

     if(isset($_FILES["file1"]) && isset($_FILES["file2"]) ){

	$NAME = $_POST["genreName"];
	$img_src = $_FILES["file1"]["name"];
        $img_src_rollover = $_FILES["file2"]["name"];
	$Include = $_POST["include"];

        $allowedExts = array("jpg", "gif", "png");
	    $extension1 = end(explode(".", $_FILES["file1"]["name"]));
        $extension2 = end(explode(".", $_FILES["file2"]["name"]));
        $directory = "wp-content/uploads/GenreImages/";

        if (($_FILES["file1"]["size"] < 200000) && in_array($extension1, $allowedExts)){
             // File 1 for default image is valid
             if (($_FILES["file2"]["size"] < 200000) && in_array($extension2, $allowedExts)){
                  if (($_FILES["file1"]["error"] > 0) OR (($_FILES["file2"]["error"] > 0))){
			echo "Error in image uploads" . "<br>";
	          }else{
                       if (file_exists($directory . $_FILES["file1"]["name"])){
		            echo $_FILES["file1"]["name"] . " already exists. ";
                       }else{
                            if (file_exists($directory . $_FILES["file2"]["name"])){
		                 echo $_FILES["file2"]["name"] . " already exists. ";
                            }else{
                                 move_uploaded_file($_FILES["file1"]["tmp_name"], $directory . $_FILES["file1"]["name"]);
                                 move_uploaded_file($_FILES["file2"]["tmp_name"], $directory . $_FILES["file2"]["name"]);

                                 $sql = "INSERT INTO Genres (Genre, ImgSrc, RollOverSrc, Include) VALUES (\"" . $NAME ."\",\"" . $_FILES["file1"]["name"] ."\",\"" . $_FILES["file2"]["name"] . "\",\"" . $Include . "\")";

                                 if (mysqli_query($con,$sql)){
			              echo "<h2>" . $NAME . " has been added to the table.</h2>\n";
			         }else{
                                      @unlink($directory . $_FILES["file1"]["name"]);
                                      @unlink($directory . $_FILES["file2"]["name"]);
			              echo "<h2>" . $NAME . " has not been added to the table.</h2>\n";
			         }
                            }
                       }
                  }
             }else{
                  echo "Invalid File for Rollover Image<br>";
             }        
     }else{
          echo "Invalid File for Default Image<br>";
     } // end of image upload handling
}

 // Check connection   
    $sql = "SELECT * FROM Genres";
    $result = mysqli_query($con,$sql);
    
	echo "<h1>Table Data</h1>\n";
	echo "<table>";
	echo "<tr><th>Genre Name</th><th>Default Source</th><th>Rollover Source</th><th>Include</th></tr>";
	
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>\n";
        echo "<td>" . $row['Genre'] . "</td><td>" . $row['ImgSrc'] . "</td><td>" . $row['RollOverSrc'] . "</td>";
		echo "<td>";
		
		if($row['Include'] == 1){
			echo "Yes";	
		}else{
			echo "No";
		}
		
		echo "</td>\n</tr>";
    }
    echo "</table>";
 mysqli_close($con);  
}
[/insert_php]