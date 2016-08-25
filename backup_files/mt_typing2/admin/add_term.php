<?php
include("../config.php");
$Db = new Mysql();

if(isset($_POST['addterm'])) {


		$SqlSelect = $Db->Query("SELECT Terminologies FROM tbl_terminologies WHERE Terminologies LIKE '".$_POST['newterm']."' ");
		
		if($numrows = $Db->numRows($SqlSelect) ==  0) {
		

			$SqlInsert = $Db->Query("INSERT INTO tbl_terminologies (Terminologies) values ('".$_POST['newterm']."')");
			
			if($SqlInsert) {
			
			echo "<script>alert('Successfully Saved!');
				 window.close();
				 </script>";
				
			
			}
			
		} else {
		
			echo "<script>alert('Existing Terminologies!');
				 window.close();
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
<body>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<div class="tabtitle">New Terminologies</div>
<div class="newterm">
<textarea name="newterm" cols="95" rows="20"></textarea>
<br/>
<br/>
<input name="addterm" type="submit" value="   Save    "/>
</div>
</form>
</body>
</html>
