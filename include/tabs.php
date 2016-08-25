<!--/*
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
*/-->

<img src="../image/logo.png" />
<div class="usersession"><span class="systitle"><?php echo  SYSTEM_NAME; ?></span><br/>Welcome : <?php echo $_SESSION[SYSTEM_NAME]['FirstName'].' '.$_SESSION[SYSTEM_NAME]['LastName']; ?> &nbsp;|&nbsp;Access Level :&nbsp;<?php echo $_SESSION[SYSTEM_NAME]['UserType']?>&nbsp;|&nbsp;Date :&nbsp;<?php echo DATE_STRING; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../include/logout.php" class="logout"  name="logouts" >Logout</a> </div>
<div class="tabtitle">
<input type="button" value = "Home" class="btncolor4" onclick="window.location = '../admin/index.php'"/> 
<input type="button" value = "Exam Settings " class="btncolor4" onclick="window.location = '../admin/exam_settings.php'"/></a>
<input type="button" value = "Medical Terminologies" class="btncolor4" onclick="window.location = '../admin/medicall_term.php'"/>
 <input type="button" value = "Report" class="btncolor4" onclick="window.location = '../admin/admin_reports.php'"/>
<input type="button" value = "User" class="btncolor4" onclick="window.location = '../admin/medicall_users.php'"/>
</div>

