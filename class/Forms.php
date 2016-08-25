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


class Forms extends Queries  {


			public function ViewRecords($args = NULL) 
			{
			 $count = 1;
					$this->Select($args);
					$Table = "<table border=1 class='tableadmin' align='center'>";
					
					foreach ($this->FieldNames as  $Fields) 
					{
						$Table .= "<th class='thadmin'>".$Fields."</th>";
					}
					
					
					
					foreach($this->FieldValues as $Values) 
					{
						$Table .= "<tr >";	
								foreach($Values as $Vals) 
									{
									$Table .=  "<td width='300'>".$Vals."</td>";
									}			
						$Table .= "</tr>";	
						
					}
						$Table .= "</table>";
						return $Table;
			}
			
			
		
			public function SelectValue($query = NULL, $name = NULL, $value = NULL, $other = NULL) 
			{
					$this->Select($query);
					$Select = '<select name = "'.$name.'" '.$other.'>
					<option value= "" selected></option>';
					foreach($this->FieldValues as $Values) 
						{
							foreach($Values as $Vals) 
							{
				    $Select .=  '<option value = "'.$Vals.'" '. ($Vals == $value ? 'selected':'').'>'.$Vals.'</option>';
							}			
						}
					$Select .= '</select>';
					return $Select;
			}
			
			
			public function SelectField($query = NULL, $name = NULL, $value = NULL) 
			{		
					$this->Select($query);
					$Select = '<select name = "'.$name.'" >';	
					foreach($this->FieldNames as $Fields) 
						{
				   $Select .=  '<option value = "'.$Fields.'" '. ($Fields == $value ? 'selected':'').'>'.$Fields.'</option>';		
						}
					$Select .= '</select>';
					return $Select;
			}
			
			
			public function Input($type = NULL, $name = NULL, $value = NULL, $others = NULL ) {
			
			return '<input type = "'.$type.'"  name ="'.$name.'"  value = "'.$value.'" '.$others .'/>';
			
			}

				
}
			
?>