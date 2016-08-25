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
<script type="text/javascript" src="<?php echo DIR;?>js/js_function.js"></script>
<script type="text/javascript" src="<?php echo DIR;?>js/js_search_admin.js"></script>

<!-- Loading Theme file(s) -->
    <link rel="stylesheet" href="../js/zpcal/themes/winter.css" />

<!-- Loading Calendar JavaScript files -->
    <script type="text/javascript" src="../js/zpcal/src/utils.js"></script>
    <script type="text/javascript" src="../js/zpcal/src/calendar.js"></script>
    <script type="text/javascript" src="../js/zpcal/src/calendar-setup.js"></script>

<!-- Loading language definition file -->
    <script type="text/javascript" src="../js/zpcal/lang/calendar-en.js"></script>


<script>

function SearchKey() {
var searchkey  = document.form1.traineekey.value;
var examids  = document.form1.examid.value;
var datefrom  = document.form1.dfrom.value;
var dateto  = document.form1.dto.value;

if(searchkey == '' && examids == '' && datefrom == '' && dateto=='') {

} else {

SearchAdmin(searchkey,examids,datefrom,dateto);

}

}


</script>

<?php include(DIR."include/tabs.php");?>
<body>
<form name="form1" />
<div class="tabbody">
<br/>
&nbsp;&nbsp;Search Trainee: <input name="traineekey" type="text"  size="30" onkeyup="SearchKey()"/>&nbsp;&nbsp;Exam ID : <input name="examid" type="text" onkeyup="SearchKey()"/>&nbsp;&nbsp;|&nbsp;
Exam Date From : <input name="dfrom" type="text"  onchange="SearchKey()" readonly="true" id="dfrom"/>&nbsp;&nbsp;To : <input name="dto" type="text" onchange="SearchKey()" readonly="true" id="dto"/>&nbsp;&nbsp;
<input name="" type="button" value="   Search   "  onclick="SearchKey()"/>
<br/></div>

<div>
<br/>
<?php
if (!empty($_GET['Deleted'])) {


$sqlDel = $frm->Query("DELETE FROM tbl_exam_records WHERE exam_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:index.php");
	
	}

}

$sqlView = $frm->Query("SELECT CONCAT(u.FirstName,' ',u.LastName) as Trainee, e.exam_id, e.duration_time,e.wpm,e.no_mistakes,e.no_words, 
						DATE(e.date_started) as examdate
						FROM tbl_exam_records e, tbl_users u WHERE trainee_id = user_id");

echo "<div id='ShowResults'>";
echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='200' >Trainee</th>
	  <th class='thadmin' width='200' >Exam ID</th>
	  <th class='thadmin' width='200' >Duration Of Exam</th>
	  <th class='thadmin' width='200' >WPM</th>
	  <th class='thadmin' width='200' >No.of Errors</th>
	  <th class='thadmin' width='200' >No. of Words</th>
	  <th class='thadmin' width='200' >Exam Date</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1;

while ($getValues = $frm->getArray($sqlView)) {
		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".$getValues['Trainee']."</td>
				<td class='td'>".$getValues['exam_id']."</td>
				<td class='td'>".$getValues['duration_time']."</td>
				<td class='td'>".$getValues['wpm']."</td>
				<td class='td'>".$getValues['no_mistakes']."</td>
				<td class='td'>".$getValues['no_words']."</td>
				<td class='td'>".$getValues['examdate']."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."' OnClick=\"window.open('view.php?testID=".$getValues['exam_id']."','','width=800,height=900')\"><img src='".DIR."image/view.gif' title='View'/></a></td>
				<td width='40' class='td' ><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['exam_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";
}

echo "</table>";
echo "</div>";
?>
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