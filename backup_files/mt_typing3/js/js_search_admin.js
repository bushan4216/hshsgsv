// JavaScript Document
/*
Name of System :Licensing Requirements Guidelines
Author		   :Jasper Carpizo
Date Created   :May 26, 2011
Description    :Ajax

Revision 	: Jasper Carpizo  - June 06, 2011

*/

function SearchAdmin(name,examid,datefrom,dateto)
{
if (name=="" && examid =="" && datefrom =="" && dateto=="")
  {
  document.getElementById("ShowResults").innerHTML="";
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
    document.getElementById("ShowResults").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","../admin/admin_search.php?trainee="+name+"&examid="+examid+"&datefrom="+datefrom+"&dateto="+dateto,true);
xmlhttp.send();
}

