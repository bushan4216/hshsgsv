<?php
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
					$Select = '<select name = "'.$name.'" '.$other.'>';
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
			
			
			public function Text($attributes) {
			
				$attributes = func_get_args();
				$textbox = '<input type="text" ';
				
					foreach($attributes as $attributes) {
					$textbox .= $attributes;
					}
					
			   $textbox .= ' />';
			   return $textbox;
			
			}
				
}
			
?>