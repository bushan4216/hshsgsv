<?php
include("../config.php");

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
<!-- Loading Theme file(s) -->
    <link rel="stylesheet" href="<?php echo DIR;?>js/zpcal/themes/green.css" />

<!-- Loading Calendar JavaScript files -->
    <script type="text/javascript" src="<?php echo DIR;?>js/zpcal/src/utils.js"></script>
    <script type="text/javascript" src="<?php echo DIR;?>js/zpcal/src/calendar.js"></script>
    <script type="text/javascript" src="<?php echo DIR;?>js/zpcal/src/calendar-setup.js"></script>

<!-- Loading language definition file -->
    <script type="text/javascript" src="<?php echo DIR;?>js/zpcal/lang/calendar-en.js"></script>
	
	<script>
	
	function generate() {
	
	var datefrom1  = document.form1.dfrom.value;
	var dateto1  = document.form1.dto.value;
	
	window.location = "generate_reports.php?datefrom="+datefrom1+"&dateto="+dateto1;
	
	
	}
	
	</script>

<body>
<div class="tabbody">
<br/>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="form1">
<input type="button" value="    REPORT    " class="btncolor2"/>&nbsp; Exam Date From : <input name="dfrom" type="text" readonly="true" id="dfrom"/>&nbsp;&nbsp;To : <input name="dto" type="text" readonly="true" id="dto"/>&nbsp;&nbsp;
<input name="" type="button" value="    GENERATE    "  onclick="generate()"  class="btncolor3"/>
<br/></div>

<div>
<br/>
</div>

 <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        weekNumbers       : true,
        showOthers        : false,
        showsTime         : false,
        timeFormat        : "24",
        step              : 2,
        range             : [1900.01, 2999.12],
        electric          : false,
        singleClick       : true,
        inputField        : "dfrom",
        ifFormat          : "%Y/%m/%d",
        daFormat          : "%Y/%m/%d",
        align             : "Br"
      });
	  
	  
	    Zapatec.Calendar.setup({
        firstDay          : 1,
        weekNumbers       : true,
        showOthers        : false,
        showsTime         : false,
        timeFormat        : "24",
        step              : 2,
        range             : [1900.01, 2999.12],
        electric          : false,
        singleClick       : true,
        inputField        : "dto",
        ifFormat          : "%Y/%m/%d",
        daFormat          : "%Y/%m/%d",
        align             : "Br"
      });
	   
 //]]></script>

</form>
</body>
</html>
