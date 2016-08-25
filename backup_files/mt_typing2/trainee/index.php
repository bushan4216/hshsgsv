<?php
include("../config.php");
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

<body onload="BodyLoad()">
<?php 
include(DIR."include/tabs1.php");
?>
<div class="tabbody">
<br/>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  name="form1">

Set Exam Duration :&nbsp;<?php echo $form->SelectValue('SELECT DISTINCT(Duration_Time) FROM tbl_duration_time','dtime','','onchange="SelectValue(this.value)"');?>

&nbsp; 
<input name="timeset" type="button" value = "   SET    "  onclick="Set()"  />
</div>
<br/>

<div id="Results"></div>

<br/>
<div class="divExam">
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;When you are ready to begin the typing test, click the Start button, copy/type the sample text below, and then click the Stop button.
		</td>
  </tr>
</table>
<br/>

<div class="exam" id="textString">
</div>

<br/>
<table width="100%" border="0" >
    <td >&nbsp;<input type="button" value="    Start    "  onClick="Start()"  name="start"  class="buttons" />&nbsp;&nbsp;
			  <input type="button" value="    Stop   "  onClick="Stop()"      name="stop1" class="buttons" />
	</td>
    <td width="100"><input type="text" name="Your_Time" size="5" value="00:00:00" readonly="true" style="width:150px; font-family: Tahoma; font-size: 30px; color:#800000;font-weight:bold;"/>&nbsp;&nbsp;
				</td>
  </tr>
</table>
<textarea name="editortext" cols="149" rows="10" ></textarea>

<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
   <tr>
    <td >&nbsp;</td>
    <td width="80"><input type="button" value="   New Speed Test    "  name="newspeedtest"  class="buttons" onclick="BodyLoad(),window.location.reload()" />&nbsp;&nbsp;</td>
  </tr>
</table>
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