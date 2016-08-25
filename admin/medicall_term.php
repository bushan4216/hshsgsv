<?php
include("../config.php");

/*
Name of the System : MT Typing Software
Name of Routine	   : Add, Edit and Delete Medical Terminologies
Author			   : Jasper Carpizo
Date Created	   : Sept. 12, 2011
Revised by		   : ----------------
Date Revised       : ----------------
Table/s Called     :  tbl_terminologies
Routine/s Called   :  config.php
Image			   :  NONE
Brief Explanation of the Purpose of routine: To Add, edit, and delete edical Terminologies
*/


$frm = new Forms(); // Call the Form Class Function

if(isset($_POST['addterm'])) {

	if(!empty($_POST['newterm'])) {
		
			// Execute Query Statements
			
			$SqlSelect = $frm->Query("SELECT Terminologies FROM tbl_terminologies WHERE Terminologies LIKE '".trim(addslashes($_POST['newterm']))."' ");
			
			// end
			
			if($numrows = $frm->numRows($SqlSelect) ==  0) {
				
			// Execute Query Statements	
	
				$SqlInsert = $frm->Query("INSERT INTO tbl_terminologies (Terminologies) values ('".trim(addslashes($_POST['newterm']))."')");
				
				if($SqlInsert) {
					
					header("location:medicall_term.php");
				
				}
				
			// end
				
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
		
	
				$SqlInsert = $frm->Query("UPDATE tbl_terminologies SET Terminologies = '".trim(addslashes($_POST['editterm']))."' WHERE term_id = '".$_POST['timeid']."'");
				
				if($SqlInsert) {
					
					header("location:medicall_term.php");
				
				}
				
	
		
	} else {
	
		echo "<script>alert('Invalid Terminologies!');
					 </script>";

	}

}else if (!empty($_GET['Deleted'])) {


$sqlDel = $frm->Query("DELETE FROM tbl_terminologies WHERE term_id = '".$_GET['Deleted']."'");
	
	if($sqlDel) {
	
	header("location:medicall_term.php");
	
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
New Terminologies : <input name="newterm" type="text"  size="50"/>&nbsp;<input name="addterm" type="submit" value="   ADD    "   class="btncolor3"/>
&nbsp;|&nbsp;Search: &nbsp;
<input name="keyString" type="text"  size="40"   onkeyup="showValue(this.value,'Sort A to Z','LIMIT 0,100')" />&nbsp;&nbsp;
<input name="search" type="button" value="   Search   " onclick="SearchButton()" class="btncolor3"/>
&nbsp;|&nbsp;
<input name="asc" type="button" value="Sort A to Z" onclick="Orderby(this.value) " class="btncolor3"/>

<br/></div>
<div>
<?php

	// count the records in  table terminoloies
	function countpage()
	{
	global $frm;
		$sql = $frm->Query("Select Count(*) as NoRecs  From  tbl_terminologies");
		$No = $frm->getArray($sql);
		return ($No['NoRecs']+0);
	}
	
	$recs = countpage();   // count row per page	

		if (is_null($_GET['page_beg'])){$_GET['page_beg']=1; }
		if (is_null($_GET['page_no'])){$_GET['page_no']=1; }

		$total_record = $recs;
		$rowsperpage  = 22;
		$limitpage  = 20;
	
		//$page_count = no. of all pages
        $page_count = ceil($total_record / $rowsperpage);

		//last group of pages ,for >|
        $page_last = (ceil($page_count / $limitpage)) - 1;

        //$pageperrow = $_GET['page_beg'] * $limitpage;

        //get last page example : page 1 - 5 (5 is the last page)
        //limitpage minus 1 to be multiple by limitpage (ex. 5)

        $page_end = $_GET['page_beg'] +  ($limitpage - 1);

        //echo $page_end . "-".  $page_count;

        if ( $page_end > $page_count )
        {
        	$page_end = $page_count;
        }

        // for td design
        $td_style = '<td style="width: 30px; background-image:url(../image/gradient_green.gif); color:#FFFFFF;font-weight:bold;"';

        echo '<center><table
        		style="font:11px tahoma; background-color:#FFFFFF;
        			   border-collapse: separate; border: 1px solid;
        			   color: #A4A4A4; border-color: #FFFFFF; cursor:hand; text-align:center;"
        		>
        			<tr style="height: 30px;">';  //add border="1" bordercolor="#D8D8D8" to have border

		// FOR |< and <
        if ( $_GET['page_beg'] > 1)
        {
        	//$page_end - $limitpage = new page no
        	echo $td_style. ' onClick="window.location=\''.$_SERVER['PHP_SELF'] .'?page_no=1&page_beg=1\'">|< </td>';

        	echo $td_style. ' onClick="window.location=\''.$_SERVER['PHP_SELF'] . '?page_no=' .($_GET['page_beg']-1).'&page_beg='. ($_GET['page_beg'] - $limitpage).'\'"><
  </td>';
        }

        //populate page nos.

        for ($i = $_GET['page_beg']; $i <= $page_end; $i++)
        {
        	if ($i ==  $_GET['page_no'])
            {
           		echo '<td style="width: 30px; background-color:#F2F2F2; color: #6E6E6E;" ><b>' . $i . '</b></td>&nbsp;&nbsp;';
           	}
           	else
           	{
           		echo $td_style .' onClick="window.location=\'' . $_SERVER['PHP_SELF'] . '?page_no=' .$i . '&page_beg=' . $_GET['page_beg']. '\'">'.$i.'
           			 </td>';
           	}
        }

        // FOR >
        if ( ($_GET['page_beg'] + $limitpage) <=  $page_count )
        {
        	//$page_end + $limitpage = new page no
        	echo $td_style .' onClick="window.location=\''.$_SERVER['PHP_SELF'] . '?page_no=' .($_GET['page_beg'] + $limitpage). '\'"> >
        		  </td>';
        }

        // FOR >|
        if ( $page_last > 1 )
        {
        	//$page_end + $limitpage = new page no
        	echo $td_style .' onClick="window.location=\''.$_SERVER['PHP_SELF'] . '?page_no=' .$page_count. '&page_beg=' . (($page_last * $limitpage) +1 )  .'\'"> >|
        		  </td>';
        }

		// FOR Refresh
        echo $td_style .' onClick="location.reload()">&nbsp;Refresh&nbsp;
        		  </td>';


        echo'</tr></table>';

        //echo "&nbsp;&nbsp;<b>Note: </b>Click to view each record <br />"
		echo "&nbsp;&nbsp;Total no. of records: <b>". $total_record . "</b><br /><br /></center>";

        //begin_rec = beginning record
        $begin_rec = ($_GET['page_no']-1) * $rowsperpage;

        if($_GET['list_pos']!=''){$list_pos = $_GET['list_pos'];}
		
		$sql_query = $list_pos. "LIMIT ".$begin_rec.",".$rowsperpage." ";



if(!empty($_GET['Edit'])) { //  Edit the Terminologies

$sqlEdit = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies WHERE term_id = '".$_GET['Edit']."'");

echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Edit Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>&nbsp;</th>";

$rowCount = 1;

	while ($getValues = $frm->getArray($sqlEdit)) {
	
		echo "<input type='hidden' name='timeid' value='".$_GET['Edit']."'/>";

		echo '<tr>
				<td width="50" class="td">'.$rowCount++.'</td>
		 		<td class="td"><input type="text" name="editterm" value="'.stripcslashes($getValues['Terminologies']).'" size="80"/></td>
				<td width="40" class="td"><input type="submit" name="updated" value = "  Save  " class="btncolor3"/></td>
			</tr>';

}

echo "</table>";

} 

echo '<br/>';

echo '<div id="txtHint">';
$sqlView = $frm->Query("Select term_id , Terminologies  From  tbl_terminologies ORDER BY Terminologies DESC ".$sql_query."");


echo "<table border=1 class='tableadmin' align='center' >
	  <th class='thadmin' width='50'>No.</th>
	  <th class='thadmin' width='500' >Terminologies</th>
	  <th class='thadmin' colspan='2' width='80'>Action</th>";

$rowCount = 1; // Increment by one(1)

while ($getValues = $frm->getArray($sqlView)) {

		echo "<tr>
				<td width='50' class='td'>".$rowCount++."</td>
		 		<td class='td'>".stripcslashes($getValues['Terminologies'])."</td>
				<td width='40' class='td'><a href='".$_SERVER['PHP_SELF']."?Edit=".$getValues['term_id']."'><img src='".DIR."image/edit.jpg' title='Edit'/></a></td>
				<td width='40' class='td' ><a href='".$_SERVER['PHP_SELF']."?Deleted=".$getValues['term_id']."' onClick='return deleteone()'><img src='".DIR."image/delete.jpg' title='Delete'/></a></td>
			</tr>";

}

echo "</table>";

echo '</div>';




?>
</div>
<input type="hidden" name="ordered" value="<?=$sql_query?>" />
</form>
</body>
</html>
