function resetVotes()
{
	$password = "@dmin0h"

var ans = confirm("Please verify you wish to reset the votes for ALL ENTRIES", "Reset Votes");

	if (ans==true){
		
		var x=prompt("Please enter reset password:", "Password");
		
		if($password == x){
			if (window.XMLHttpRequest){
			// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}else{
			// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				//document.getElementById("resetTxt").innerHTML=xmlhttp.responseText;
				alert("Votes have been reset");
				}
			}
			var tmpLocation = "http://phlmusicfest.com/DBCode/resetVoteHandler.php";
			
			xmlhttp.open("GET",tmpLocation,true);
			xmlhttp.send();
		}else{
			alert("Error in password");	
		}
	}

}