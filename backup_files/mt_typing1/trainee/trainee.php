<?php
include("../config.php");
$form = new Forms();

if(isset($_POST['timeset'])) {

	$Sqlrecords = $form->Query("INSERT INTO tbl_exam_records (trainee_name, duration_set) values ('Jasper Carpizo','".$_POST['dtime']."')");
	
		if($Sqlrecords) {
		
			$LastID = $form->InsertID();
		
			$SelectExam = $form->Query("SELECT exam_id FROM  tbl_exam_records WHERE exam_id = '".$LastID."' ");
			
			$ExamValue = $form->getArray($SelectExam);
			
			$Disable = "disabled = disabled";

		}
		
	
} else if (isset($_POST['newspeedtest'])) {


unset($_POST);


} else {


$Disable2 = "disabled = disabled";
$Disable = "disabled = disabled";

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
<script type="text/javascript">
var timerID = 0;
var tStart  = null;
var sec=0;
var min=0;
var hour=0;
var f_today=new Date()
var l_today=new Date()

function UpdateTimer() {
if(timerID) {
      clearTimeout(timerID);
      clockID  = 0;
   }

    sec=sec-1;
	
    if(sec==0 && min > 0 && hour >0){
    	min = min-1;
    	sec = 59;
	
    }

    if(min==0 && hour>0  ){
    	hour = hour-1;
    	min=59;	
    }
	
	if(hour==0 && sec==0 ){
    	min=00;	
    }
		
 	if (hour<10){
 		HOURS="0" + hour ;
 	}
 	else{
		HOURS =hour;
	}

 	if (min<10){
 		MINUTES="0" + min ;
 	}
 	else{
		MINUTES =min;
	}

 	if (sec<10){
 		SECONDS="0" + sec ;
 	}
 	else{
		SECONDS = sec;
	}
		
	var  times =  HOURS+":"+MINUTES+":"+SECONDS;
	
   document.form1.Your_Time.value = times;
   
   if(times > "00:00:00") {
  	timerID = setTimeout("UpdateTimer()", 1000);
   } else {
   Stop();
  
   }


}

function Start() {
	
	<?php
	 @$expTime = explode(':',$_POST['dtime']);
	?>
	
   sec=<?=(!empty($expTime[2]) ? $expTime[2]:'0')?>;
   min=<?=(!empty($expTime[1]) ? $expTime[1]:'0')?>;
   hour=<?=(!empty($expTime[0]) ? $expTime[0]:'0')?>;
   tStart   = new Date();
   document.form1.Your_Time.value = "<?=(!empty($_POST['dtime']) ? $_POST['dtime']:'00:00:00')?>";
   timerID  = setTimeout("UpdateTimer()", 1000);
   document.form1.start.disabled = true;
   document.form1.stop1.disabled = false;
   document.form1.newspeedtest.disabled = true;
}


function Stop() {
   if(timerID) {
      clearTimeout(timerID);
      timerID  = 0;
   }
   tStart = null;
  
   //form1.Start1.disabled=false;
   //form1.Stop1.disabled=true;
     document.form1.start.disabled = true;
	 document.form1.stop1.disabled = true;
	 document.form1.newspeedtest.disabled = false;
	 
	 document.form1.submit();
	 

}




</script>

<?php 
include(DIR."include/tabs1.php");
?>

<div class="tabbody">

<br/>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post"  name="form1">
Set Exam Duration :&nbsp;<?php echo $form->SelectValue("SELECT DISTINCT(Duration_Time) FROM tbl_duration_time","dtime",@$_POST['dtime'],@$Disable);?>
&nbsp;<input name="timeset" type="submit" value = "   SET    " <?=@$Disable?>/>
</div>
<br/>
<div class="divExam">
<table width="100%" border="0" >
  <tr>
    <td >&nbsp;When you are ready to begin the typing test, click the Start button, copy/type the sample text below, and then click the Stop button.
		</td>
    <td width="100">Exam ID <input name="examid" type="text"  size="23" value="<?=@$ExamValue['exam_id']?>" />&nbsp;&nbsp;</td>
  </tr>
</table>
<br/>

<div class="exam">

testing

</div>
<br/>
<table width="100%" border="0" >
    <td >&nbsp;<input type="button" value="    Start    "  onClick="Start()"  name="start" <?=@$Disable2?> class="buttons" />&nbsp;&nbsp;
			  <input type="button" value="    Stop   "  onClick="Stop()"      name="stop1" <?=@$Disable2?> class="buttons" />
	</td>
    <td width="100"><input type="text" name="Your_Time" size=5 readonly value="<?=(!empty($_POST['dtime']) ? $_POST['dtime']:'00:00:00')?>" 
            	style="width:150px; font-family: Tahoma; font-size: 30px; color:#800000;font-weight:bold;"/>&nbsp;&nbsp;
				</td>
  </tr>
</table>
<textarea name="" cols="149" rows="10" ></textarea>

<table width="100%" border="0" >
  <tr>
    <td >&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
   <tr>
    <td >&nbsp;</td>
    <td width="80"><input type="submit" value="   New Speed Test    "  name="newspeedtest"  class="buttons"  />&nbsp;&nbsp;</td>
  </tr>
</table>

</div>

</div>

</form>
</body>
</html>