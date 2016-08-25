<?php
include("../config.php");
$frm = new Forms();
	

	$sqlView = $frm->Query("SELECT  DISTINCT(Duration_Time), NoWords FROM tbl_duration_time WHERE Duration_Time = '".$_GET['getTime']."'");

	if($numrows = $frm->numRows($sqlView) > 0 ) {
	
	$getValues = $frm->getArray($sqlView);
	
	$sqlRandom = $frm->Query("SELECT DISTINCT(Terminologies)  as Terms FROM tbl_terminologies ORDER BY RAND() LIMIT 0,".$getValues['NoWords']."");
	
		while($getTerm = $frm->getArray($sqlRandom)) {
		
		$Terms[] = $getTerm['Terms'];
		
		
		}
		echo implode(", ",$Terms)."";
		

	}
	
	
	
	
	
	


?>