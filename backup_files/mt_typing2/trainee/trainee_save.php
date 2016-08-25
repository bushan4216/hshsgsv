<?php
include("../config.php");
$frm = new Forms();

$sqlNoWords= $frm->Query("SELECT  DISTINCT(NoWords) as NoWords1 FROM tbl_duration_time");

$getNoWords = $frm->getArray($sqlNoWords);

$sqlInsert = $frm->Query("INSERT INTO tbl_exam_records (trainee_id, exam_taken,exam_type,duration_time,stop_time,date_started,date_stop,no_words)
						 values ('".$_SESSION[SYSTEM_NAME]['user_id']."',
						 		 '".$_POST['ExamType']."',
						 		 '".$_POST['TestTyping']."',
								 '".$_POST['DurationTime']."',
								 '".$_POST['DurationStop']."',
								 '".$_POST['DateStared']."',
								 '".$_POST['DateStopped']."',
								 '".$getNoWords['NoWords1']."'
								 )" );

		if($sqlInsert) {
		
		$LastID = $frm->InsertID();
		
		$sqlView = $frm->Query("SELECT exam_taken,exam_type, no_words, TIME_TO_SEC(duration_time) /  TIME_TO_SEC(TIMEDIFF(duration_time,stop_time)) as WPM  
								FROM tbl_exam_records WHERE exam_id  = '".$LastID."'");
		
		$getWords = $frm->getArray($sqlView);
		
		
		$ExamTaken= $getWords['exam_taken'];
		$ExamType = $getWords['exam_type'];
		$ExamWpm  = $getWords['WPM'];
		$NoWords  = $getWords['no_words']; 
		
		$expTaken = explode(', ',$ExamTaken);
		$expType = explode(', ',$ExamType);
		
		$coutType = sizeof($expType);
		$rowcount = 0;
		$rowVal  =0;
		
				
			for($i = 0; $i<$coutType ; $i++) {
			
					if(empty($expTaken[$i])) {
					
					$expTaken[$i] ="";
					
					}
					
					
					if($expTaken[$i] == $expType[$i]) {
					
					 $right[] = $expType[$i];
					
					
					} else {
					
					$countErrors[] =  count($expType[$i]);
					
					$right[] = "<span style='font-weight:bold;color:#DD0000;font-style:italic;'>".str_replace(' ','&nbsp;',$expType[$i])."</span>";
					
					}
			
			}
			
				 
				 if(isset($countErrors)) {
				 $numErrors = array_sum($countErrors);
				 } else {
				 $numErrors = 0;
				 }
			
				 $ComputeWpw = (($NoWords  -  $numErrors ) * $ExamWpm);
				 
				 $sqlIUpdate = $frm->Query("UPDATE tbl_exam_records SET 
				 							no_mistakes = '". $numErrors."',
											wpm 		= '".$ComputeWpw."',
											words_type  = '".addslashes(implode(', ',$right))."'
											WHERE exam_id  = '".$LastID."'");
				 
				 
				
					
				echo "<div class='results'>&nbsp;Your speed was: <span class='wpm'>".$ComputeWpw ."wpm</span>.
				<br/><br/>&nbsp;You made ".$numErrors." mistakes, your mistakes are shown in <span class='span'>RED</span> text:<br/><br/>
				&nbsp;".implode(', ',$right)."<br/><br/></div>";
				
				
				//. ($Fields == $value ? 'selected':'').
				
				
		
		}


?>