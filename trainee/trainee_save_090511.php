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
								 '".trim(strlen($_POST['ExamType']))."'
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
		$countType   = count($ExamType);
		
		/*echo strlen($getWords['exam_taken']);
		echo '<br>';
		echo strlen($getWords['exam_type']);
		echo '<br>';
		*/
		
						$n = 0;
						for($i = 0; $i <= $countType; $i++) {
						
										if(!empty($ExamType[$i])) {
				
											for($z = $n; $z <= count($ExamScript); $z++) {
											
															if($ExamScript[$z] == $ExamType[$i]) {
																	$arr_type[] = $z;
																	$n = $z+1;
																	
																	//echo $ExamType[$i];
																	
																	break;
															}  
															
															

											}
							
											if($n!= ($z+1)) {
										
												//echo $n.'=>'.$z.'<br>';
												$spelling[] = '<b><i>'.$ExamType[$i].'</b></i>';
												$total_wrong[] =  count($ExamType[$i]);
												$total_wrong1[] = $ExamType[$i];
												//echo count($ExamType[$i]);
												
												//echo $i."=>".$z."=>".$n."<br>";
												
											}  else {
								
												$spelling[] = $ExamType[$i];
												$total_right[] = $ExamType[$i];
											}
										
										
										} else  if ($ExamType[$i] == ''){
										
										
											$spelling[] =  '&nbsp;';
											$total_space[] = strlen(' ');
											
										
										} 
													
						}
						
			
				//print_r($total_wrong1);
			
				 $TextStringExamp =  implode(' ',$spelling);
	
				if(!empty($TextStringExamp)) {
				
					//echo $countScript.'=>'.$countType;
						
						if (is_array($total_space) && array_sum($total_space) != 1) {
						 $space =  array_sum($total_space);
						} else {
						 $space =  0;
						}
						
						
						
						if (is_array($total_wrong)) {
						// echo $wrong =  ceil((count($total_wrong) / 2)) + ($countScript - count($total_right));
						 $wrong = round((array_sum($total_wrong)/ 2));
						} else if ($countType < $countScript) {
						 $wrong = $countScript - count($total_right);
						 $total_errors = ($wrong + $space) - ($countScript - count($total_right));
						} else {
						 $wrong =  0;
						}
						
						
						 if ($countType >  $countScript) {
						 $total_errors = ($wrong + $space);
		
						} else if ($countType ==  $countScript) {
						 $total_errors = ($wrong + $space);
						  
						} else if ($countType == 1)  {
						 $total_errors = $countScript;
						} else {
						$total_errors = ($wrong + $space) - ($countScript - count($total_right));
						}
					 	
						
				
						 $compute_errors = ($total_errors / $ExamMinutes);
						
				} else {
				
						$compute_errors = $NoWords;
		
				}
				
				
			
				 $compute_wpm = ((($NoWords / 5) - $compute_errors) / $ExamMinutes);
			
				
				$sqlIUpdate = $frm->Query("UPDATE tbl_exam_records SET 
				 							no_mistakes = '".str_replace('-','',$total_errors)."',
											wpm 		= '".str_replace('-','',round($compute_wpm))."',
											words_type  = '".addslashes($TextStringExamp)."'
											WHERE exam_id  = '".$LastID."'");
				 
					
				echo "<div class='results'>&nbsp;Your speed was: <span class='wpm'>".str_replace('-','',round($compute_wpm))."wpm</span>.
				<br/><br/>&nbsp;You made ".str_replace('-','',$total_errors)." mistakes, your mistakes are shown in <b>Bold</b> text:<br/><br/>
				&nbsp;".$TextStringExamp."<br/><br/></div>";
						
		}


?>