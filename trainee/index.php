<?php
include("../config.php");

/*
Name of the System : MT Typing Software
Name of Routine	   : View Examination Records
Author			   : Jasper Carpizo
Date Created	   : Sept. 12, 2011
Revised by		   : ----------------
Date Revised       : ----------------
Table/s Called     :  tbl_exam_records, tbl_users
Routine/s Called   :  config.php
Image			   :  NONE
Brief Explanation of the Purpose of routine: To view the examination records of the Trainee
*/


$form = new Forms();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<script type="text/javascript" src="<?php echo DIR;?>js/js_ajax_trainee.js"></script>
<script type="text/javascript" src="<?php echo DIR;?>js/js_saverecords.js"></script>
<script type="text/javascript" src="<?php echo DIR;?>js/js_actionload.js"></script>


<script language="javascript">
function DisableRightClick(event)
{
//For mouse right click 
	if (event.button==2)
	{
	alert("Right Clicking not allowed!");
	}
}
function DisableCtrlKey(e)
{
var code = (document.all) ? event.keyCode:e.which;
var message = "Ctrl key functionality is disabled!";
// look for CTRL key press
	if (parseInt(code)==17)
	{
	alert(message);
	window.event.returnValue = false;
	}
}
</script>


<body onload="BodyLoad()">
<?php 
include(DIR."include/tabs1.php");
?>
<div class="tabbody">
<br/>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  name="form1">

Set Exam Duration :&nbsp;<?php echo $form->SelectValue('SELECT DISTINCT(Duration_Time) FROM tbl_duration_time','dtime','','onchange="SelectValue(this.value)"');?>

&nbsp; 
<input name="timeset" type="button" value = "   SET    "  onclick="Set()" class="btncolor1" />
</div>
<br/>

<div id="Results"></div>

<br/>
<div class="divExam">
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;<b>When you are ready to begin the typing test, click the Start button, copy/type the sample text below, and then click the Stop button.</b>
		</td>
  </tr>
</table>
<br/>

<!--onMouseDown="DisableRightClick(event)" onKeyDown="return DisableCtrlKey(event)"-->

<div class="exam" id="textString" onMouseDown="DisableRightClick(event)" onKeyDown="return DisableCtrlKey(event)">
<div class="DoubleSpace"></div>
</div>
<br/>
<table width="100%" border="0" >
    <td width="1043" >&nbsp;
      <input type="button" value="    Start    "  onClick="Start()"  name="start"  class="btncolor1" />&nbsp;&nbsp;
			  <input type="button" value="    Stop   "  onClick="Stop()"   name="stop1" class="btncolor1" />
	</td>
    <td width="161"><input type="text" name="Your_Time"  value="00:00:00" readonly="true"  class="timer"/>&nbsp;<br/>Exam Duration</td>
  </tr>
</table>
<textarea name="editortext" rows="10" ></textarea>

<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
   <tr>
    <td >&nbsp;</td>
    <td width="80"><input type="button" value="   New Speed Test    "  name="newspeedtest"  class="btncolor" onclick="BodyLoad(),window.location.reload()" />&nbsp;&nbsp;</td>
  </tr>
</table>
<br/>
<br/>
</div>

</div>
<textarea name="copyeditor" cols="1" rows="1" id="textString1" class="copyeditor"></textarea>
<input type="hidden" name="temptime" />
<input type="hidden" name="timestop" />
<input type="hidden"   name="timestarted" />
<input type="hidden"   name="timestopped" />
</form>
</body>
</html>