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


     $title = "Document".DATE_TIME;
  	 $file_type = "msexcel";
  	 $file_ending = "xls";
  	 header("Content-Type: application/$file_type");
  	 header("Content-Disposition: attachment; filename=".SYSTEM_NAME."-".DATE_TIME.".".$file_ending."");
  	 header("Pragma: no-cache");
  	 header("Expires: 0");
	 
$frm = new Forms(); // Call the Form Class Function
$and = "";
if(!empty($_GET['datefrom']) or !empty($_GET['dateto'])) {

		if(!empty($_GET['datefrom']) and !empty($_GET['dateto']) ) {
		$and .= "AND DATE(e.date_started)  BETWEEN '".trim(addslashes($_GET['datefrom']))."' AND '".trim(addslashes($_GET['dateto']))."'";
		} else {
		$and .= "AND DATE(e.date_started)  = '".addslashes(trim($_GET['datefrom']))."'";	
		}
}


$sqlView = $frm->Query("SELECT e.exam_id, DATE(e.date_started) as examdate, CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.wpm, e.duration_time, e.no_words, e.no_words_space, e.no_mistakes FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id ".$and." ");

echo "<table border=1  >
	  <th  width='200' >Exam ID</th>
	  <th  width='200' >Exam Date</th>
	  <th  width='200' >Trainee</th>
	  <th  width='200' >WPM</th>
	  <th  width='200' >Duration</th>
	  <th  width='200' >Total No. Of Words</th>
	  <th  width='200' >Total No. Of Errors</th>";

while ($getValues = $frm->getArray($sqlView)) {
		echo "<tr>
		 		<td class='td'>".$getValues['exam_id']."</td>
				<td class='td'>".$getValues['examdate']."</td>
				<td class='td'>".$getValues['Trainee']."</td>
				<td class='td'>".$getValues['wpm']."</td>
				<td class='td'>".$getValues['duration_time']."</td>
				<td class='td'>".($getValues['no_words_space']/5)."</td>
				<td class='td'>".$getValues['no_mistakes']."</td>
			</tr>";
}

echo "</table>";

?>