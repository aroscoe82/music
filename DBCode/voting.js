// JavaScript Document

function vote(id, ip, genre)
{
	//alert("ID=" + id + " IP=" + ip + " Genre=" + genre);
document.getElementById("votingStatus").style.visibility = "hidden";

if (id==""){
  document.getElementById("votingStatus").innerHTML="";
  return;
}
 
if (window.XMLHttpRequest){
// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}else{
// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	location.reload();
	//document.getElementById("votingStatus").style.visibility = "hidden";
    document.getElementById("votingStatus").innerHTML=xmlhttp.responseText; 
    }
}
var tmpLocation = "http://phlmusicfest.com/DBCode/votingHandler.php?id=" + id +"&ip=" + ip + "&genre=" + genre;

xmlhttp.open("GET",tmpLocation,true);
xmlhttp.send();

}