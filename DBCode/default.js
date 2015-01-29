// JavaScript Document

function updateUser(str1, str2, str3)
{

if (str1==""){
  document.getElementById("txtHint").innerHTML="";
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
    //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    alert(str3 + " Entry Updated");
    }
}
var tmpLocation = "http://phlmusicfest.com/DBCode/updateHandler.php?q=" + str1 + "&v=" + str2;

xmlhttp.open("GET",tmpLocation,true);
xmlhttp.send();

}

function deleteUser(id, name)
{

var ans = confirm("Please verify you wish to remove\n" + name + "-" + id + " from the database");

if (ans==true){
     //alert("You clicked ok");
     if (window.XMLHttpRequest){
// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}else{
// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
    //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    var msg = xmlhttp.responseText;
    alert(msg);
    location.reload();
    }
}
var tmpLocation = "http://phlmusicfest.com/DBCode/deleteHandler.php?q=" + id + "&v=" + name;

xmlhttp.open("GET",tmpLocation,true);
xmlhttp.send();

}

return false;

}