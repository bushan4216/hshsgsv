<?php
include("../config.php");
$frm = new Forms();

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

<body>
<div class="tabbody">
<br/>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Exam Duration: &nbsp;
<input name="newtime" type="text"  maxlength="8"/>&nbsp;[99:59:59]&nbsp;<input name="addtime" type="submit" value="   Add   "/>&nbsp;|&nbsp;
No. of Words: &nbsp;
<input name="nowords" type="text"  value="" />&nbsp;&nbsp;<input name="setwords" type="submit" value="   Set   "/>
<br/></div>

<div>
<br/>
</div>
</form>
</body>
</html>
