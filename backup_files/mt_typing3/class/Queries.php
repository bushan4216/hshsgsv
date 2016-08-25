<?php
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