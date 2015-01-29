<script type="text/javascript" src="http://phlmusicfest.com/wp-content/scripts/default.js"></script>
<script type="text/javascript">
<!--
default.js();
//--></script>

<form>
<select name="status" id="status" onchange="showUser(document.getElementById('users').value,this.value)">
<option value="Pending">Pending</option>
<option value="Approved">Approved</option>
<option value="Denied">Denied</option>
<option value="All" selected="selected">All</option>
</select>
<select name="users" id="users" onchange="showUser(this.value,document.getElementById('status').value)">
<option value="All">All Genres</option>
[insert_php]
$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

if (mysqli_connect_errno())
{

}else{

	$result = mysqli_query($con,"SELECT * FROM Genres Where (Include=1) ORDER BY Genre ASC");	

	# loop through the genres and add them as options
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value=\"" . $row['Genre'] . "\" >" . $row['Genre'] . "</option>";
	}
	
	mysqli_close($con);
}
[/insert_php]
</select>
</form>
<br>
<div id="txtHint"><b>Entry Results will be listed here.</b></div>