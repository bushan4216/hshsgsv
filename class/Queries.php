<?php

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

class Queries extends Mysql 
{

private  static $TableName;
private  static $SQLStatement;
private  static $Results;
public   $FieldNames = array();
public   $FieldValues = array();
public   $CountRows = 0;

		public function Select($queries = NULL) {
		
				if(!is_null($queries)) {
				
					self::$Results = $this->Query($queries); 
				
					$this->CountRows = $this->numRows(self::$Results);
				
						while($getValues  = $this->getArray(self::$Results)) {
							$getUnique =  array_keys($getValues);
							$this->FieldNames = array_unique($getUnique);
							$this->FieldValues[] = $getValues;	
						}
					
				} else {
				return false;
				}
		}

}	
?>