<?php
session_start();
date_default_timezone_set('Asia/Manila');

define('SYSTEM_NAME','MT Typing System');

////////////////////////////////
define('SERVERNAME','localhost');
define('USERNAME'  ,'user');
define('PASSWORD'  ,'user');
define('DATABASE'  ,'db_mt_typing');

////////////////////////////////////

define('DATE_TIME', date("Y-m-d h:i:s"));
define('DATE_ONLY', date("F d, Y"));

define('USER_MAIN','../trainee/index.php');
define('ADMIN_MAIN','../admin/index.php');
define('SYSTEM_MAIN','../index.php');


////////////////////////////////
define('DIR','../');
include('class/Autoloading.php');
?>