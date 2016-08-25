<?php
include("../config.php");
$frm = new Forms();

$and = "";

if(!empty($_GET['trainee'])) {
	$and .= "AND CONCAT(u.FirstName,' ',u.LastName) LIKE '%".trim(addslashes($_GET['trainee']))."%'";
}

if(!empty($_GET['examid'])) {
	$and .= "AND e.exam_id LIKE '%".addslashes(trim($_GET['examid']))."%'";
}

if(!empty($_GET['datefrom']) or !empty($_GET['dateto'])) {

		if(!empty($_GET['datefrom']) and !empty($_GET['dateto']) ) {
		$and .= "AND DATE(e.date_started)  BETWEEN '".trim(addslashes($_GET['datefrom']))."' AND '".trim(addslashes($_GET['dateto']))."'";
		} else {
		$and .= "AND DATE(e.date_started)  = '".addslashes(trim($_GET['datefrom']))."'";	
		}
}


$sqlView = $frm->Query("SELECT CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.exam_id, e.duration_time,e.wpm,e.no_mistakes,e.no_words, 
						DATE(e.date_started) as examdate
						FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id ".$and." ");

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
				<td width='40' class='td'><a href='index.php' OnClick=\"window.open('view.php?testID=".$getValues['exam_id']."','','width=800,height=900')\"><img src='".DIR."image/view.gif' title='View'/></a></td>
				<td width='40' class='td' ><a href='index.php?Deleted=".$getValues['exam_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";
}

echo "</table>";