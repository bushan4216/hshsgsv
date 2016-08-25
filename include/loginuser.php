<?php
include('../config.php');

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

$db = new Queries();

$sql = $db->Select("SELECT user_id, FirstName, LastName, Username, user_txt, Status, UserType FROM tbl_users 
					WHERE Username = '".md5($_POST['username'])."' and Password = '".md5($_POST['password'])."' AND status != 'Deactivate' ");
					
				if($db->CountRows >  0){

					$z = count($db->FieldNames);
	
					for($i = 0; $i < $z; $i++) {
					
					 $_SESSION[SYSTEM_NAME][$db->FieldNames[$i]] = $db->FieldValues[0][$db->FieldNames[$i]];
					 
						 if ($db->FieldNames[$i] == 'UserType') {
						 
						 	 if ($db->FieldValues[0][$db->FieldNames[$i]] == 'Administrator') {
							 
							 header('location:'.ADMIN_MAIN);
							 
							 } else {
							 
							 header('location:'.USER_MAIN);
							 
							 }
						 
						 }
					
					}
							
			

} else {

 header('location:'.SYSTEM_MAIN);

}



?>