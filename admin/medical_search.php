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

if(!empty($_GET['term'])) {

		if($_GET['orderby'] == 'Sort Z to A') {
		
		$orderby = "ORDER BY Terminologies DESC";
		
		} else if ($_GET['orderby'] == 'Sort A to Z') {
		
		$orderby = "ORDER BY Terminologies ASC";
		
		}
		
// Execute Query Statements
$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies WHERE Terminologies LIKE '%".trim(addslashes($_GET['term']))."%' ".$orderby." ".$_GET['query']." ");

} else {

$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies ORDER BY Terminologies ASC ".$_GET['query']." ");

}


// Create table attributes.
echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1; // increment by one


// Get Values 
while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['Terminologies']."</td>
				<td width='40' class='td'><a href='medicall_term.php?Edit=".$getValues['term_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td' ><a href='medicall_term.php?Deleted=".$getValues['term_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

// end

echo "</table>";
?>