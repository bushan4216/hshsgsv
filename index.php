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
*/
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN" "http://www.w3.org/TR/xhtml4/strict.dtd">
<html>
<link href="css/layout.css"  rel="stylesheet" type="text/css" media="all"/> 
<head>
<title>MT Typing System</title>
</head>

<body>

<form action="include/loginuser.php" method="post">

<div class="divlogo"></div>
<div class="cname">MEDICALL Philippines Inc.</div>
<table class="frmLogin">
    <th class="Login" >&nbsp;&nbsp;</th>
    <th class="Login" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <tr>
    <td align="center" style="font-size:12px;">&nbsp;&nbsp;&nbsp;Username : </td>
    <td align="center"><input name="username" type="text"  maxlength="50" title="Username Required!" class="textinput" size="26"/></td>
  </tr>
  <tr>
    <td align="right" style="font-size:12px;">&nbsp;&nbsp;&nbsp;Password :</td>
    <td align="center"><input name="password" type="password"  maxlength="50" title="Password Required!" class="textinput" size="26"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="login" type="submit" value="   Login   "  class="btncolor2"/>&nbsp;<input name="" type="button" value="    Close   " class="btncolor2" onclick="window.close()"/></td>
  </tr>
</table>
<div class="titles">MT TYPING SYSTEM</div>
<br/>
<div style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold;"> v. 1.0<br/><br/><br/><br/></div>

<div style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:13px;">All rights reserved<br/>Created on September 12, 2011</div>

</form>
</body>
</html>
