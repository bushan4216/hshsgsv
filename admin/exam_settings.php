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


$frm = new Forms(); // Call the Form Class Function

	$sqlSelect = $frm->Query("SELECT DISTINCT(NoWords) FROM tbl_duration_time");
	$getNowords = $frm->getArray($sqlSelect);
	
if(isset($_POST['addtime'])) {
		
		$TimeExplode = explode(':',$_POST['newtime']);
	
		if(preg_match('/^\d{2}:\d{2}:\d{2}$/',$_POST['newtime']) && $_POST['newtime'] !='00:00:00') {
		
			if($TimeExplode[1] <= 59 and $TimeExplode[2] <= 59) {
		
						$sqlinsert = $frm->Query("INSERT INTO tbl_duration_time (Duration_Time,NoWords) values ('".$_POST['newtime']."','".$getNowords['NoWords']."')");
					
						if($sqlinsert) {
						header("location:exam_settings.php");
						}
					
			 } else {
			 echo "<script>alert('Invalid minutes and seconds')</script>";
			 }
		
		} else {
		echo "<script>alert('Invalid Duration Time Given!')</script>";
		}
	
	
} else if (isset($_POST['setwords'])) {

		$sqlupdate = $frm->Query("UPDATE tbl_duration_time SET NoWords = '".$_POST['nowords']."'");
		
					if($sqlupdate) {
						
						header("location:exam_settings.php");
						
					}


} else if (isset($_POST['updated'])) {


$TimeExplode = explode(':',$_POST['edittime']);
	
		if(preg_match('/^\d{2}:\d{2}:\d{2}$/',$_POST['edittime'])) {
		
			if($TimeExplode[1] <= 59 and $TimeExplode[2] <= 59) {
		
						$sqlinsert = $frm->Query("UPDATE tbl_duration_time SET Duration_Time = '".$_POST['edittime']."'  WHERE time_id = '".$_POST['timeid']."'");
					
						if($sqlinsert) {
						header("location:exam_settings.php");
						}
					
			 } else {
			 echo "<script>alert('Invalid minutes and seconds')</script>";
			 }
		
		} else {
		echo "<script>alert('Invalid Duration Time Given!')</script>";
		}


}else if (!empty($_GET['Deleted'])) {


$sqlDel = $frm->Query("DELETE FROM tbl_duration_time WHERE time_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:exam_settings.php");
	
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<?php include(DIR."include/tabs.php");?>

<script type="text/javascript" src="<?php echo DIR;?>js/js_function.js"></script>

<body>
<div class="tabbody">
<br/>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<input type="button" value= "   Exam Duration   " class="btncolor2"/>&nbsp;
<input name="newtime" type="text"  maxlength="8"/>&nbsp;[00:00:00]&nbsp;<input name="addtime" type="submit" value="      Add      " class="btncolor3"/>&nbsp;|&nbsp;
<input type="button" value= "   No. Of Words   " class="btncolor2"/>&nbsp;
<input name="nowords" type="text"  value="<?php echo $getNowords['NoWords'];?>" />&nbsp;&nbsp;<input name="setwords" type="submit" value="       Set      "  class="btncolor3"/>
<br/></div>

<div>
<br/>
<?php

if(!empty($_GET['Edit'])) {

$sqlEdit = $frm->Query("Select time_id, Duration_Time  From  tbl_duration_time WHERE time_id = '".$_GET['Edit']."'");


echo "<table border=1 class='tableadmin' align='center'>
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='300'>Edit Duration Time</th>
	  <th  class='thadmin' width='80'>&nbsp;</th>";

$rowCount = 1;

	while ($getValues = $frm->getArray($sqlEdit)) {
			
			echo "<input type='hidden' name='timeid' value='".$_GET['Edit']."'/>";
	
			echo "<tr>
					<td width='50' >".$rowCount++."</td>
					<td width='300'><input type='text' name = 'edittime' value= '".$getValues['Duration_Time']."' maxlength='8'/></td>
					<td width='80'><input type='submit' name='updated' value = '  Save  ' class='btncolor3' /></td>
				</tr>";
	}
echo "</table>";

} 


echo "<br/>";

$sqlView = $frm->Query("Select time_id , Duration_Time  From  tbl_duration_time");

echo "<table border=1 class='tableadmin' align='center'>
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='300'>Duration Time</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td' >".$rowCount++."</td>
		 		<td width='300' class='td'>".$getValues['Duration_Time']."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."?Edit=".$getValues['time_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['time_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";

?>
</div>
</form>
</body>
</html>
