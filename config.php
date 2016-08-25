<?php
session_start();

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

date_default_timezone_set('Asia/Manila');

define('SYSTEM_NAME','MT Typing System');

////////////////////////////////
define('SERVERNAME','localhost');
define('USERNAME'  ,'root');
define('PASSWORD'  ,'sudo');
define('DATABASE'  ,'db_mt_typing');

////////////////////////////////////

define('DATE_TIME', date("Y-m-d h:i:s"));
define('DATE_ONLY', date("F d, Y"));
define('DATE_STRING', date("F d, Y h:i:s A"));

define('USER_MAIN','../trainee/index.php');
define('ADMIN_MAIN','../admin/index.php');
define('SYSTEM_MAIN','../index.php');


////////////////////////////////
define('DIR','../');
include('class/Autoloading.php');
?>