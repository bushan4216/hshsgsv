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

$frm = new Forms(); // Call the class Object Forms Class

// Call the $frm->Query function and write SQL Statements
$sqlView = $frm->Query("SELECT CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.exam_id, e.duration_time,e.wpm,e.no_mistakes,e.no_words, e.no_words_space,
						DATE(e.date_started) as examdate, e.exam_taken, e.words_type 
						FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id AND exam_id = '".$_GET['testID']."'");


// get Values						
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
include(DIR."include/tabs2.php"); // include tab seetings
?>
<div class="tabtitle">
SPEED TEST RECORDS - Exam ID :&nbsp;<?=$getValues['exam_id']?>&nbsp;&nbsp;|&nbsp;&nbsp;Trainee Name :&nbsp;<?=$getValues['Trainee']?>
</div>
<div class="tabbody">
<br/>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  name="form1">

WPM : <?=$getValues['wpm']?>&nbsp;&nbsp;|&nbsp;&nbsp;
NO. Of Words : <?=($getValues['no_words_space']/5)?>&nbsp;&nbsp;|&nbsp;&nbsp;
No. Of Mistakes : <?=$getValues['no_mistakes']?>&nbsp;&nbsp;|&nbsp;&nbsp;
Exam Duration : <?=$getValues['duration_time']?>&nbsp;&nbsp;|&nbsp;&nbsp;
Exam Date: <?=$getValues['examdate']?>
</div>
<br/>

<div class="divExam1">
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
  </tr>
</table>
<br/>

<div class="exam2">
<?php
// Get the values of exam taken
echo stripcslashes($getValues['exam_taken']); // Get values Exam Taken
?>
</div>

<br/>
<table width="100%" border="0" >
   <tr>
    <td >&nbsp;ACTUAL WORDS TYPE</td>
  </tr>
</table>
<div class="exam2">
<?php
if(!empty($getValues['words_type'])) {

echo str_replace(' ','&nbsp;',wordwrap(stripcslashes($getValues['words_type']),20,"<br />\n")); // Get Words Type
} else {
// 
echo '<div class="DoubleSpace"></div>';
}
?>
</div>
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
    <td width="100"></td>
  </tr>
</table>
</div>
</div>
</form>
</body>
</html>