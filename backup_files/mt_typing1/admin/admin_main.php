<?php
include("../config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="<?php echo DIR;?>css/layout.css"  rel="stylesheet" type="text/css" media="all"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SYSTEM_NAME; ?></title>
</head>
<?php include(DIR."include/tabs.php");?>
<div class="tabbody">
<br/>
&nbsp;&nbsp;Search : <input name="" type="text"  size="30"/>&nbsp;&nbsp;Exam ID : <input name="" type="text" />&nbsp;&nbsp;|&nbsp;
Exam Date From : <input name="" type="text" />&nbsp;&nbsp;To : <input name="" type="text" />&nbsp;&nbsp;
<input name="" type="button" value="   Search   "/>
<br/></div>
<body>
<div>
<br/>
<?php
$obj = new Forms();
//echo $obj->ViewRecords("Select * From cds");
?>
</div>
</body>
</html>