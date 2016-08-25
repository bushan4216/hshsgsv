<?php
include("../config.php");
$frm = new Forms();

if(!empty($_GET['term'])) {

		if($_GET['orderby'] == 'Sort Z to A') {
		
		$orderby = "ORDER BY Terminologies DESC";
		
		} else if ($_GET['orderby'] == 'Sort A to Z') {
		
		$orderby = "ORDER BY Terminologies ASC";
		
		}
		

$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies WHERE Terminologies LIKE '%".trim(addslashes($_GET['term']))."%' ".$orderby."");

} else {

$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies ORDER BY Terminologies ASC");

}

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['Terminologies']."</td>
				<td width='40' class='td'><a href='medicall_term.php?Edit=".$getValues['term_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td' ><a href='medicall_term.php?Deleted=".$getValues['term_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";
?>