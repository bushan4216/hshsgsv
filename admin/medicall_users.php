<?php
include("../config.php");

/*
Name of the System : MT Typing Software
Name of Routine	   : Add, Edit and Delete Medicall users
Author			   : Jasper Carpizo
Date Created	   : Sept. 12, 2011
Revised by		   : ----------------
Date Revised       : ----------------
Table/s Called     :  tbl_users
Routine/s Called   :  config.php
Image			   :  NONE
Brief Explanation of the Purpose of routine: To Add, edit, and delete the Medicall Users
*/

$frm = new Forms(); // Call the Form Class Function
if(isset($_POST['adduser'])) {

		// Get all values
		if(!empty($_POST['fname']) 	  and 
		   !empty($_POST['lname']) 	  and 
		   !empty($_POST['username']) and 
		   !empty($_POST['pass'])     and 
		   !empty($_POST['usertype']) and 
		   !empty($_POST['status'] )) {
		
		// Insert users into table
			$SqlInsert = $frm->Query("INSERT INTO  tbl_users (FirstName, LastName, Username, Password, user_txt, pass_txt, Status, UserType) values 
								('".trim(ucwords($_POST['fname']))."',
								 '".trim(ucwords($_POST['lname']))."',
								 '".trim(md5($_POST['username']))."',
								 '".trim(md5($_POST['pass']))."',
								 '".trim($_POST['username'])."',
								 '".trim($_POST['pass'])."',
								 '".trim($_POST['status'])."',
								 '".trim($_POST['usertype'])."'
								 )");
								 
			if($SqlInsert) {
			
			header("location:medicall_users.php"); // redirect function
			
			}
		
		
		} else {
		
		echo "<script>alert('Please complete necessary information!');</script>";// redirect function
		
		}
	
} else if (isset($_POST['updated'])) { 

		// Get updated values 
		if(!empty($_POST['fname1'])    and 
		   !empty($_POST['lname1'])    and 
		   !empty($_POST['username1']) and 
		   !empty($_POST['usertype1']) and 
		   !empty($_POST['status1'] )) {
		
			// update users into table
			$SqlInsert = $frm->Query("UPDATE tbl_users SET 
								 FirstName = '".trim(ucwords($_POST['fname1']))."', 
								 LastName = '".trim(ucwords($_POST['lname1']))."',  
								 Username = '".trim(md5($_POST['username1']))."', 
								 user_txt = '".trim($_POST['username1'])."', 
								 Password = '".trim(md5($_POST['password1']))."', 
								 pass_txt = '".trim($_POST['password1'])."', 
								 Status   = '".trim(ucwords($_POST['status1']))."', 
								 UserType = '".trim(ucwords($_POST['usertype1']))."'
								 WHERE user_id = '".$_POST['userid']."'
								");
								 
			if($SqlInsert) {
			
			header("location: medicall_users.php"); // redirect function
			
			}
		
		
		} else {
		
		echo "<script>alert('Please complete necessary information!');</script>"; // redirect function
		
		}
		
} else if (!empty($_GET['Deleted'])) {

// delete users function
$sqlDel = $frm->Query("DELETE FROM tbl_users WHERE user_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:medicall_users.php"); // redirect function
	
	}

}

// end

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<?php include(DIR."include/tabs.php");?>
<script type="text/javascript" src="<?php echo DIR;?>js/js_function.js"></script>
<br/>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="form1">
<table border=0 class='tableadmin1' align='center' >
  <tr>
    <td class='btncolor2'>&nbsp;New Username&nbsp;</td>
    <td class='thadmin1'>&nbsp;</td>
  </tr>
  <tr>
    <td class='thadmin1'>First Name :</td>
    <td class='td'><input name="fname" type="text"  size="30"/></td>
  </tr>
  <tr>
    <td class='thadmin1'>Last Name :</td>
    <td class='td'><input name="lname" type="text"  size="30"/></td>
  </tr>
  <tr>
    <td class='thadmin1'>Username :</td>
    <td class='td'><input name="username" type="text"  size="30"/></td>
  </tr>
  <tr>
    <td class='thadmin1'>Password :</td>
    <td class='td'><input name="pass" type="password"  size="30"/></td>
  </tr>
   <tr>
    <td class='thadmin1'>Access Type :</td>
    <td class='td'><select name="usertype" class="select" >
				   <option value=''></option>
				   <option value='Trainee'>Trainee</option>
				   <option value='Administrator'>Administrator</option>
				   </select>
										
	</td>
  </tr>
   <tr>
    <td class='thadmin1'>Status :</td>
    <td class='td'><select name="status" class="select">
				   <option value=''></option>
				   <option value='Activate'>Activate</option>
				   <option value='Deactivate'>Deactivate</option>
				   </select></td>
  </tr>
  <tr>
    <td class='thadmin1'>&nbsp;</td>
    <td class='thadmin1'><input type='submit' name='adduser' value = '             ADD             ' class='btncolor3' /></td>
  </tr>
</table>

<br/>



<div>
<br/>
<?php
if(!empty($_GET['Edit'])) {

$sqlEdit = $frm->Query("Select user_id, FirstName, LastName, user_txt,  pass_txt,  Status, UserType  From  tbl_users WHERE user_id = '".$_GET['Edit']."'");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='200' >Edit First Name</th>
	  <th class='thadmin' width='200' >Edit Last Name</th>
	  <th class='thadmin' width='200' >Edit Username</th>
	   <th class='thadmin' width='200'>Edit Password</th>
	  <th class='thadmin' width='200' >Edit Status</th>
	  <th class='thadmin' width='200' >Edit User Type</th>
	  <th class='thadmin' colspan='2' width='80'>&nbsp;</th>";

$rowCount = 1;

	while ($getValues = $frm->getArray($sqlEdit)) {
	
		echo "<input type='hidden' name='userid' value='".$_GET['Edit']."'/>";

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'><input type='text' name='fname1' value='".$getValues['FirstName']."' size='25'/></td>
				<td class='td'><input type='text' name='lname1' value='".$getValues['LastName']."'  size='25'/></td>
				<td class='td'><input type='text' name='username1' value='".$getValues['user_txt']."' size='25'/></td>
				<td class='td'><input type='password' name='password1' value='".$getValues['pass_txt']."' size='25'/></td>
				<td class='td'><select name='status1' class='select'>
				   <option value=''></option>
				   <option value='Activate' ".($getValues['Status'] == 'Activate' ? 'selected':'').">Activate</option>
				   <option value='Deactivate' ".($getValues['Status'] == 'Deactivate' ? 'selected':'').">Deactivate</option>
				   </select>
				</td>
				<td class='td'><select name='usertype1' class='select' >
							   <option value=''></option>
							   <option value='Trainee' ".($getValues['UserType'] == 'Trainee' ? 'selected':'')." >Trainee</option>
							   <option value='Administrator' ".($getValues['UserType'] == 'Administrator' ? 'selected':'').">Administrator</option>
							   </select>
				   </td>
				<td class='td'><input type='submit' name='updated' value = '  Save  '  class='btncolor3'/></td>
		
			</tr>";
}

echo "</table>";

} 

echo "<br/>";

$sqlView = $frm->Query("Select user_id, FirstName, LastName, user_txt,  Status, UserType  From  tbl_users ORDER BY FirstName DESC");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='200' >First Name</th>
	  <th class='thadmin' width='200' >Last Name</th>
	  <th class='thadmin' width='200' >Username</th>
	  <th class='thadmin' width='200' >Status</th>
	  <th class='thadmin' width='200' >User Type</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['FirstName']."</td>
				<td class='td'>".$getValues['LastName']."</td>
				<td class='td'>".$getValues['user_txt']."</td>
				<td class='td'>".$getValues['Status']."</td>
				<td class='td'>".$getValues['UserType']."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."?Edit=".$getValues['user_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td' ><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['user_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";
?>

</div>
</form>
</body>
</html>
