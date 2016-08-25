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

$frm = new Forms();
	

	$sqlView = $frm->Query("SELECT  DISTINCT(Duration_Time), NoWords FROM tbl_duration_time WHERE Duration_Time = '".$_GET['getTime']."'");

	if($numrows = $frm->numRows($sqlView) > 0 ) {
	
	$getValues = $frm->getArray($sqlView);
	
	$sqlRandom = $frm->Query("SELECT DISTINCT(TRIM(Terminologies)) as Terms FROM tbl_terminologies ORDER BY RAND()");
	
		while($getTerm = $frm->getArray($sqlRandom)) {
		
		
		 $Terms1[] =  trim(stripcslashes($getTerm['Terms']));
		
		
		
		}
	
		$expTerm = explode(" ",implode(", ",$Terms1));
		
		
		for($i = 0; $i < $getValues['NoWords']; $i++) {
		
		echo trim($expTerm[$i])." ";
		
		} 

	}
	
	
	
	
	
	


?>