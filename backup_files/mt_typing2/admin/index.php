<?php
include("../config.php");
$frm = new Forms();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<script type="text/javascript" src="<?php echo DIR;?>js/js_function.js"></script>
<?php include(DIR."include/tabs.php");?>
<div class="tabbody">
<br/>
&nbsp;&nbsp;Search Trainee: <input name="" type="text"  size="30"/>&nbsp;&nbsp;Exam ID : <input name="" type="text" />&nbsp;&nbsp;|&nbsp;
Exam Date From : <input name="" type="text" />&nbsp;&nbsp;To : <input name="" type="text" />&nbsp;&nbsp;
<input name="" type="button" value="   Search   "/>
<br/></div>
<body>
<div>
<br/>
<?php
if (!empty($_GET['Deleted'])) {


$sqlDel = $frm->Query("DELETE FROM tbl_exam_records WHERE exam_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:index.php");
	
	}

}

$sqlView = $frm->Query("SELECT CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.exam_id, e.duration_time,e.wpm,e.no_mistakes,e.no_words, 
						DATE(e.date_started) as examdate
						FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='200' >Trainee</th>
	  <th class='thadmin' width='200' >Exam ID</th>
	  <th class='thadmin' width='200' >Duration Of Exam</th>
	  <th class='thadmin' width='200' >WPM</th>
	  <th class='thadmin' width='200' >No.of Errors</th>
	  <th class='thadmin' width='200' >No. of Words</th>
	  <th class='thadmin' width='200' >Exam Date</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['Trainee']."</td>
				<td class='td'>".$getValues['exam_id']."</td>
				<td class='td'>".$getValues['duration_time']."</td>
				<td class='td'>".$getValues['wpm']."</td>
				<td class='td'>".$getValues['no_mistakes']."</td>
				<td class='td'>".$getValues['no_words']."</td>
				<td class='td'>".$getValues['examdate']."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."' OnClick=\"window.open('view.php?testID=".$getValues['exam_id']."','','width=800,height=900')\"><img src='".DIR."image/view.gif' title='View'/></a></td>
				<td width='40' class='td' ><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['exam_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";
?>
</div>
</body>
</html>