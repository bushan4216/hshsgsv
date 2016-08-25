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

$sqlInsert = $frm->Query("INSERT INTO tbl_exam_records (trainee_id, exam_taken,exam_type,duration_time,stop_time,date_started,date_stop,no_words)
						 values ('".$_SESSION[SYSTEM_NAME]['user_id']."',
						 		 '".addslashes(trim($_POST['ExamType']))."',
						 		 '".addslashes(trim($_POST['TestTyping']))."',
								 '".$_POST['DurationTime']."',
								 '".$_POST['DurationStop']."',
								 '".$_POST['DateStared']."',
								 '".$_POST['DateStopped']."',
								 '".$getNoWords['NoWords1']."'
								 )" );

		if($sqlInsert) {
		
		$LastID = $frm->InsertID();
		
		$sqlView = $frm->Query("SELECT TRIM(exam_taken) as exam_taken, TRIM(exam_type) as exam_type, no_words, (-TIME_TO_SEC(TIMEDIFF(TIME(date_started), TIME(date_stop))) / 60) as Minutes
								FROM tbl_exam_records WHERE exam_id  = '".$LastID."'");
		$getWords = $frm->getArray($sqlView);
		
		$ExamMinutes = $getWords['Minutes'];
		$NoWords  = $getWords['no_words']; 
		
		$ExpTaken =  explode(' ',$getWords['exam_taken']);
		$ExpType =  explode(' ',$getWords['exam_type']);
		
		
		$ExpCommaType =  explode(',',$getWords['exam_type']);
		$CountCommaType =  count($ExpCommaType);
		
		$countExpTaken = count($ExpTaken);
		$cType = count($ExpType);
		
	/*	if ($cType != 1) {
		$countExpType = count($ExpType);
		} else {
		//$countExpType = 0;
		
		}*/
		$countExpType1 = count($ExpType);
		
		if($countExpType1 != 1){
		$countExpType = $countExpType1;
		} else {
		$countExpType =0;
		}
		
		
		$countTotalStrings[] =  $countExpType - $countExpTaken;
		
		//$arrayExamString = str_word_count($getWords['exam_taken'],1);
		//$arrayTypeString = str_word_count($getWords['exam_type'],1);
		$arrayExamString = explode(' ',$getWords['exam_taken']);
		$arrayTypeString =explode(' ',$getWords['exam_type']);
		
		$countExamType = count($arrayTypeString);
		
		$n = 0;
		for($i = 0; $i < $countExamType; $i++) {
		
		
					for($z = $n; $z < count($arrayExamString); $z++) {
					
							if($arrayExamString[$z] == $arrayTypeString[$i]) {
									
									$arr_type[] = $z;
									$n = $z+1;
									break;
									
							} 
					
		
					}
					
					
					if($n != ($z+1)) {
					
					$countTotalStrings1 =  count($arrayTypeString[$i]);
					
					if($countTotalStrings1!=1) {
					$countTotalStrings[] = $countTotalStrings1 ;
					} else {
					$countTotalStrings[] = 0;
					}
					
					
					//echo count($arrayTypeString[$i]);
									
					$StrinText[] = 	"<b><i>".$arrayTypeString[$i]."</b></i>";
					$StrinText1[] = $arrayTypeString[$i];
					} else {
					
					$StrinText[] = 	$arrayTypeString[$i];
					}
			
		
				/*if($arrayExamString[$n] != $arrayTypeString[$i]) {
				
				$countTotalStrings[] = count($arrayTypeString[$i]);
				
				$StrinText[] = 	'<b>'.$arrayTypeString[$i].'</b>';
				$StrinText1[] = $arrayTypeString[$i];
				
				} else {
	
				$countTotalStrings[] = 0;
				$n++;
				}*/
		}	
		
		
		
		
		
		/* if($cType != 1){
	   	 $TotalErros = str_replace('-','',(array_sum($countTotalStrings)));
		 } else {
		 //$TotalErros = 30;*/
		 $TotalErros = str_replace('-','',(array_sum($countTotalStrings)));
		
	   	 @$ComputeWpw = (($NoWords / $ExamMinutes) - $TotalErros);
		 
		 
		 		/*for($a = 0; $a <$CountCommaType; $a++) {
				
					echo $ExpCommaType[$a];*/
					
			// $origType =   str_replace($ExpCommaType[$a],$StrinText,$ExpCommaType[$a]);
			
				//$origType =   implode(' ',$StrinText);
				
					//print_r($arr_type);
					//$arrayv1 = array("1","2");
				
					for($t = 0; $t < count($arrayExamString); $t++) {
					
						//for ($i = 0; $i < count($arrayvl); $i++){
						
							//if($t == $arrayv1[$t]) {
						
							
						
						//	if(isset($arr_type)){
								
							if(@in_array($t,$arr_type)) {
									
								$origType .= $arrayExamString[$t] ." ";
								
								//}

									
							}else {
							
							
							//if($t != $arrayv1[$i]){
								
								if(!isset($arrayTypeString[$t])){
									$exam_val = $arrayExamString[$t];
								}else{
									$exam_val = $arrayTypeString[$t];
								}
								
								$origType .= '<b><i>'.$exam_val.'</b></i> '; 
							}
						
					
		
					}
				
				
				$sqlIUpdate = $frm->Query("UPDATE tbl_exam_records SET 
				 							no_mistakes = '".$TotalErros."',
											wpm 		= '".round($ComputeWpw)."',
											words_type  = '".addslashes($origType)."'
											WHERE exam_id  = '".$LastID."'");
				 
					
				echo "<div class='results'>&nbsp;Your speed was: <span class='wpm'>".round($ComputeWpw)."wpm</span>.
				<br/><br/>&nbsp;You made ".$TotalErros." mistakes, your mistakes are shown in <b>Bold</b> text:<br/><br/>
				&nbsp;".str_replace(' ','&nbsp;',wordwrap($origType,195,"<br />\n"))."<br/><br/></div>";
				
			
		
		}


?>