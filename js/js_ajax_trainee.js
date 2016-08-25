// JavaScript Document
/*
Name of System :Licensing Requirements Guidelines
Author		   :Jasper Carpizo
Date Created   :May 26, 2011
Description    :Ajax

Revision 	: Jasper Carpizo  - June 06, 2011

*/

function Showtext(time)
{
if (time=="")
  {
  document.getElementById("textString").innerHTML="";
  document.getElementById("textString1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("textString").innerHTML=xmlhttp.responseText;
	 document.getElementById("textString1").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","../trainee/trainee_term.php?getTime="+time,true);
xmlhttp.send();
}

