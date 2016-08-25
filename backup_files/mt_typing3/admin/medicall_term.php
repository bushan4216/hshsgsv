<?php
include("../config.php");
$frm = new Forms();

if(isset($_POST['addterm'])) {

	if(!empty($_POST['newterm'])) {

			$SqlSelect = $frm->Query("SELECT Terminologies FROM tbl_terminologies WHERE Terminologies LIKE '".$_POST['newterm']."' ");
			
			if($numrows = $frm->numRows($SqlSelect) ==  0) {
				
				
	
				$SqlInsert = $frm->Query("INSERT INTO tbl_terminologies (Terminologies) values ('".trim($_POST['newterm'])."')");
				
				if($SqlInsert) {
					
					header("location:medicall_term.php");
				
				}
				
			} else {
			
				echo "<script>alert('Existing Terminologies!');
					 </script>";
					
			
			}
		
	} else {
	
		echo "<script>alert('Invalid Terminologies!');
					 </script>";
					
	
	}
	

} else if (isset($_POST['updated'])) { 


	if(!empty($_POST['editterm'])) {

			$SqlSelect = $frm->Query("SELECT Terminologies FROM tbl_terminologies WHERE Terminologies LIKE '".$_POST['editterm']."' ");
			
			if($numrows = $frm->numRows($SqlSelect) ==  0) {
				
				
	
				$SqlInsert = $frm->Query("UPDATE tbl_terminologies SET Terminologies = '".trim($_POST['editterm'])."' WHERE term_id = '".$_POST['timeid']."'");
				
				if($SqlInsert) {
					
					header("location:medicall_term.php");
				
				}
				
			} else {
			
				echo "<script>alert('Existing Terminologies!');
					 </script>";
			}
		
	} else {
	
		echo "<script>alert('Invalid Terminologies!');
					 </script>";

	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<?php include(DIR."include/tabs.php");?>
<script type="text/javascript" src="<?php echo DIR;?>js/js_ajax.js"></script>
<script type="text/javascript" src="<?php echo DIR;?>js/js_function.js"></script>
<div class="tabbody">
<br/>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="form1">
New Terminologies : <input name="newterm" type="text"  size="50"/>&nbsp;<input name="addterm" type="submit" value="   ADD    "  />
&nbsp;|&nbsp;Search: &nbsp;
<input name="keyString" type="text"  size="40"   onkeyup="showValue(this.value,'Sort A to Z')"/>&nbsp;&nbsp;
<input name="search" type="button" value="   Search   " onclick="SearchButton()"/>
&nbsp;|&nbsp;
<input name="asc" type="button" value="Sort A to Z" onclick="Orderby(this.value) "/>

<br/></div>


<div>
<br/>
<?php
if(!empty($_GET['Edit'])) {

$sqlEdit = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies WHERE term_id = '".$_GET['Edit']."'");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Edit Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>&nbsp;</th>";

$rowCount = 1;

	while ($getValues = $frm->getArray($sqlEdit)) {
	
		echo "<input type='hidden' name='timeid' value='".$_GET['Edit']."'/>";

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'><input type='text' name='editterm' value='".$getValues['Terminologies']."' size='80'/></td>
				<td width='40' class='td'><input type='submit' name='updated' value = '  Save  ' /></td>
			</tr>";

}

echo "</table>";

} else if (!empty($_GET['Deleted'])) {


$sqlDel = $frm->Query("DELETE FROM tbl_terminologies WHERE term_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:medicall_term.php");
	
	}

}


echo "<br/>";



echo '<div id="txtHint">';
$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies ORDER BY Terminologies DESC");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['Terminologies']."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."?Edit=".$getValues['term_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td' ><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['term_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";

echo '</div>';




?>
</div>
</form>
</body>
</html>
