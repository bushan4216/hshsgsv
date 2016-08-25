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

$sqlNoWords= $frm->Query("SELECT  DISTINCT(NoWords) as NoWords1 FROM tbl_duration_time");

$getNoWords = $frm->getArray($sqlNoWords);

$sqlInsert = $frm->Query("INSERT INTO tbl_exam_records (trainee_id, exam_taken,exam_type,duration_time,stop_time,date_started,date_stop,no_words,no_words_space)
						 values ('".$_SESSION[SYSTEM_NAME]['user_id']."',
						 		 '".addslashes(trim($_POST['ExamType']))."',
						 		 '".addslashes(trim($_POST['TestTyping']))."',
								 '".$_POST['DurationTime']."',
								 '".$_POST['DurationStop']."',
								 '".$_POST['DateStared']."',
								 '".$_POST['DateStopped']."',
								 '".$getNoWords['NoWords1']."',
								 '".trim(strlen($_POST['TestTyping']))."'
								 )" );

		if($sqlInsert) {
		
		$LastID = $frm->InsertID();
		
		$sqlView = $frm->Query("SELECT TRIM(exam_taken) as exam_taken, TRIM(exam_type) as exam_type, no_words, no_words_space, (-TIME_TO_SEC(TIMEDIFF(TIME(date_started), TIME(date_stop))) / 60) as Minutes
								FROM tbl_exam_records WHERE exam_id  = '".$LastID."'");
		$getWords = $frm->getArray($sqlView);
		
		$ExamMinutes = $getWords['Minutes'];
		$NoWords     = $getWords['no_words_space']; 
		
		$ExamScript  = explode(' ',$getWords['exam_taken']);
	    $countScript = count($ExamScript);
	  
		
		$ExamType    = explode(' ',$getWords['exam_type']);
		$countType   = count($ExamType)-1;
		

		
						$n = 0;
						for($i = 0; $i <= $countType; $i++) {
						
										if(!empty($ExamType[$i])) {
				
											for($z = $n; $z <= count($ExamScript); $z++) {
											
															if($ExamScript[$z] == $ExamType[$i]) {
																	$arr_type[] = $z;
																	$n = $z+1;

																	break;
															}  

											}
							
												if($n!= ($z+1)) {
																								
													//echo $n.'=>'.$z.'<br>';
													$spelling[] = '<b><i>'.$ExamType[$i].'</b></i>';
													$ErrorsSpelling[] = $ExamType[$i];
													$spelling1[] = '<b><i>'.$ExamType[$i].'</b></i>';


												} else {
									
													$spelling[] = $ExamType[$i];
													$spelling1[] = $ExamType[$i];
													$right[] = count($ExamType[$i]);
												
												}
										
										
										} 	else  if ($ExamType[$i] == ''){
												
													
													if(!empty($getWords['exam_type'])) {
													$spelling1[] = '&nbsp;';
													$ErrorsSpace[] =  strlen(' ');
													}

										} 
													
						}
			
					
					if(isset($ErrorsSpelling)) {
					
					$wrongSpelling = count($ErrorsSpelling);
					
					
					} else {
					
					$wrongSpelling = 0;
					
					}
				
					
					if(isset($ErrorsSpace)) {
					
					$wrongSpace = count($ErrorsSpace);
					
					} else {
					
					$wrongSpace = 0;
					
					}
					
				//echo $wrongSpelling;
				//echo '<br>';
				//echo $wrongSpace;
					
			    $total_errors = ($wrongSpelling +  $wrongSpace);
					
				$Compute_Errors =  ($total_errors /  $ExamMinutes);
				$Compute_NetWPM = (($NoWords / 5) - $Compute_Errors) / $ExamMinutes;
				
		/*		echo "UPDATE tbl_exam_records SET 
				 							no_mistakes = '".str_replace('-','',$total_errors)."',
											wpm 		= '".str_replace('-','',round($Compute_NetWPM))."',
											words_type  = '".@addslashes(implode(' ',$spelling1))."',
											minutes_spend = '".$ExamMinutes."'
											WHERE exam_id  = '".$LastID."'";*/
				
				$sqlIUpdate = $frm->Query("UPDATE tbl_exam_records SET 
				 							no_mistakes = '".str_replace('-','',$total_errors)."',
											wpm 		= '".str_replace('-','',round($Compute_NetWPM))."',
											words_type  = '".@addslashes(implode(' ',$spelling1))."',
											minutes_spend = '".$ExamMinutes."'
											WHERE exam_id  = '".$LastID."'");
				$msg  = '';							
				if(str_replace('-','',$total_errors) == 0 && !empty( $getWords['exam_type']) ) {
				
				$msg .=  "Congratulations! You made no mistakes, practice does make perfect.";
				
				} else if(str_replace('-','',$total_errors) > 0 && !empty( $getWords['exam_type']) ) {
				
				$msg .= "You made ".str_replace('-','',$total_errors)." mistakes, your mistakes are shown in <b>Bold</b> text:";
				
				} else  if(str_replace('-','',$total_errors) == 0 && empty( $getWords['exam_type']) ) {
				
				$msg .=  "To succeed, you must first attempt. Try again.";
				
				}
				 
					
				echo "<div class='results'>&nbsp;Your speed was: <span class='wpm'>".str_replace('-','',round($Compute_NetWPM))."wpm</span>.
				<br/><br/>&nbsp;".$msg."<br/><br/>
				&nbsp;".@stripcslashes(implode(' ',$spelling1))."<br/></div>";
						
		}


?>