// JavaScript Document
/*
Name of System :Licensing Requirements Guidelines
Author		   :Jasper Carpizo
Date Created   :May 26, 2011
Description    :Ajax

Revision 	: Jasper Carpizo  - June 06, 2011

*/
function ShowResults(ExamType,TestTyping,DurationTime,DurationStop,DateStared,DateStopped)
{
var xmlhttp;
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
    document.getElementById("Results").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","../trainee/trainee_save.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("ExamType="+ExamType+"&TestTyping="+TestTyping+"&DurationTime="+DurationTime+"&DurationStop="+DurationStop+"&DateStared="+DateStared+"&DateStopped="+DateStopped);
}

