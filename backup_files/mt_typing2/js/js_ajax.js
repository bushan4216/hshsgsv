// JavaScript Document
/*
Name of System :Licensing Requirements Guidelines
Author		   :Jasper Carpizo
Date Created   :May 26, 2011
Description    :Ajax

Revision 	: Jasper Carpizo  - June 06, 2011

*/

function showValue(id,order)
{
if (id=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","../admin/medical_search.php?term="+id+"&orderby="+order,true);
xmlhttp.send();
}

