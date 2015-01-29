[insert_php]
 $loadedFromEdit = 0; // default to false 

if(isset($_POST['Submit'])){
  $loadedFromEdit = 1; // if loaded from edit page set to true
  echo $_SESSION['ImgSrc'];
}

[/insert_php]

<form id="registrationForm" action="http://phlmusicfest.com/entry-submission/" name="registration" method="post" enctype="multipart/form-data">

<hr />

<table>
<tr>
<td><span>*</span> Indicates required field</td>
</tr>
</table>
<table>
<tbody>
<tr>
<td>Genre:<span>*</span></td>
<td>
[insert_php]
$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Input Box Needed Here";
}else{

	$result = mysqli_query($con,"SELECT * FROM Genres Where (Include=1) ORDER BY Genre ASC");	
	
	echo "<select id=\"Genre\" name=\"Genre\">\n";
	
	# Add atleast one blank
	echo "<option value=\"\"></option>";
	
	# loop through the genres and add them as options
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value=\"" . $row['Genre'] . "\" ";
               
                if($loadedFromEdit == 1){
                     if($row['Genre'] == $_SESSION['Genre']){
                          echo "selected=\"selected\"";
                     }
                }

                echo ">" . $row['Genre'] . "</option>";
	}
	echo "</select>\n";
	
	mysqli_close($con);
}
[/insert_php]

</td>
</tr>
<tr>
<td>Artist/Band Name:<span>*</span></td>
<td><input id="EntryName" name="EntryName" title="Band or Artist Name" type="text" maxlength="50" required="required"[insert_php]
 if($loadedFromEdit == 1){
    echo " value=\"" . $_SESSION['EntryName'] . "\" "; 
 }
[/insert_php]/>
</td>
</tr>
<tr>
<td>Members:</td>
<td><textarea id="Members" name="Members" cols="25" rows="5">[insert_php]
 if($loadedFromEdit == 1){
  echo $_SESSION['Members'];
}
[/insert_php]</textarea>
</td>
<td></td>
<td></td>
</tr>
<tr>
<td>Are any members musically trained?</td>
<td><input id="Trained" name="Trained" type="radio" value="1"[insert_php] 
if($loadedFromEdit == 1){
  if($_SESSION['Trained'] == "1"){
    echo " checked=\"checked\"";
  }     
}
[/insert_php] /> Yes <input id="Trained" name="Trained" type="radio" value="0"[insert_php]
if($loadedFromEdit == 1){
  if($_SESSION['Trained'] == "0"){
    echo " checked=\"checked\" ";
  }     
}
[/insert_php]/> No
</td>
</tr>
<tr>
<td>Year Formed:</td>
<td><input id="YearFormed" name="YearFormed" type="text" maxlength="4"[insert_php]
 if($loadedFromEdit == 1){
    echo " value=\"" . $_SESSION['YearFormed'] . "\" "; 
 }
[/insert_php] />
</td>
</tr>
<tr>
<td>Contact Person:<span>*</span></td>
<td> <input id="ContactName" name="ContactName" type="text" maxlength="30" required="required"[insert_php]
 if($loadedFromEdit == 1){
    echo " value=\"" . $_SESSION['ContactName'] . "\" "; 
 }
[/insert_php]/>
</td>
</tr>
<tr>
<td>Contact Email:<span>*</span></td>
<td><input id="Email" name="Email" type="text" maxlength="30" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['Email'] . "\" ";
}
[/insert_php]/></td>
</tr>
<tr>
<td>Address Line 1:<span>*</span></td>
<td><input id="Address1" name="Address1" type="text" maxlength="50" required="required" size="30"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['Address1'] . "\" ";
}
[/insert_php]/>
</td>
</tr>
<tr>
<td>Address Line 2:</td>
<td><input id="Address2" name="Address2" type="text" maxlength="50" size="30"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['Address2'] . "\" ";
}
[/insert_php]/></td>
</tr>
<tr>
<td>City:<span>*</span></td>
<td><input id="City" name="City" type="text" maxlength="30" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['City'] . "\" ";
}
[/insert_php]/></td>
<td></td>
<td></td>
</tr>
<tr>
<td>State:<span>*</span></td>
<td><input id="State" name="State" type="text" maxlength="2" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['State'] . "\" ";
}
[/insert_php]/></td>
<td>Zip:<span>*</span></td>
<td><input id="ZipCode" name="ZipCode" type="text" maxlength="5" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['ZipCode'] . "\" ";
}
[/insert_php]/></td>
</tr>
<tr>
<td>Location:<span>*</span></td>
<td>
[insert_php]
$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{
	echo "Input Box Needed Here";
}else{

	$result = mysqli_query($con,"SELECT * FROM LocationRegion Where (Include=1) ORDER BY State DESC, Name");	
	
	echo "<select id=\"Location\" name=\"Location\">\n";
	
	# Add atleast one blank
	echo "<option value=\"\"></option>";
	
	# loop through the genres and add them as options
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value=\"" . $row['Name'] . "-" . $row['State'] . "\"";
                
                if ($loadedFromEdit == 1){
                   $tmp = $row['Name'] . "-" . $row['State'];
                   if($tmp == $_SESSION['Location']){
                        echo " selected=\"selected\"";
                   }
                }

                echo " >" . $row['Name'] . "-" . $row['State'] . "</option>";
	}
	echo "</select>\n";
	
	mysqli_close($con);
}
[/insert_php] 
</td>
</tr>
<tr>
<td>Phone:<span>*</span></td>
<td><input id="Phone" name="Phone" type="text" maxlength="10" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['Phone'] . "\" ";
}
[/insert_php]/></td>
</tr>
<tr>
<td colspan="4">
YouTube URL:<span>*</span> <input id="YouTubeLink" name="YouTubeLink" type="text" maxlength="100" required="required"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['YouTubeLink'] . "\" ";
}
[/insert_php]/>
</td>
</tr>
<tr>
<td colspan="4">
Artist/Band Website URL: <input id="WebSite" name="WebSite" type="text" maxlength="30"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['WebSite'] . "\" ";
}
[/insert_php]/>
</td>
</tr>
<tr>
<td colspan="4">
Artist/Band Image: <input id="file" name="file" type="file" maxlength="30"[insert_php] 
if($loadedFromEdit == 1){
     echo " value=\"" . $_SESSION['ImgSrc'] . "\" ";
}
[/insert_php]/>
</td>
</tr>
<tr>
<td colspan="4">
Brief Biography:<span>*</span> <textarea id="Bio" name="Bio" cols="75" rows="15" required="required">[insert_php]
if($loadedFromEdit == 1){
  echo nl2br($_SESSION['Bio']);
}
[/insert_php]</textarea>
</td>
</tr>
<tr>
<td colspan="4">
Have you read the <a href="http://phlmusicfest.com/contest/rules-guidelines/" target"_blank">rules and guidelines?</a>  Check the box to state that you have read and understand the rules and guidelines. <span>*</span> <input type="checkbox" id="disclaimer" name="disclaimer" value="checkbox" required="required" >
</td>
</tr>
<tr>
<td colspan="4" align="right">
<input id="Submit" name="Submit" type="Submit" value="Enter Now" />
</td>
</tr>
</tbody>
</table>
</form>