<?php
include("../config.php");
$frm = new Forms();

$sqlView = $frm->Query("SELECT CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.exam_id, e.duration_time,e.wpm,e.no_mistakes,e.no_words, 
						DATE(e.date_started) as examdate, e.exam_taken, e.words_type 
						FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id AND exam_id = '".$_GET['testID']."'");
						
$getValues = $frm->getArray($sqlView);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<body>
<?php 
include(DIR."include/tabs1.php");
?>
<div class="tabbody">
<br/>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  name="form1">

WPM : <?=$getValues['wpm']?>&nbsp;&nbsp;|&nbsp;&nbsp;
NO. Of Words :<?=$getValues['no_words']?>&nbsp;&nbsp;|&nbsp;&nbsp;
No. Of Mistakes :<?=$getValues['no_mistakes']?>&nbsp;&nbsp;|&nbsp;&nbsp;
Exam Duration :&nbsp;<?=$getValues['duration_time']?>&nbsp;&nbsp;|&nbsp;&nbsp;
</div>
<br/>

<div class="divExam1">
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
  </tr>
</table>
<br/>

<div class="exam1">
<?php
echo $getValues['exam_taken'];
?>
</div>

<br/>
<table width="100%" border="0" >
   <tr>
    <td >&nbsp;ACTUAL WORDS TYPE</td>
  </tr>
</table>
<div class="exam1">
<?php
echo $getValues['words_type'];
?>
</div>
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
   <tr>
    <td >&nbsp;</td>
    <td width="80"></td>
  </tr>
</table>
</div>
</div>
</form>
</body>
</html>