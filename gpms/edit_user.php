<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if(@$myvar == ''){
exit();
}
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}



mysql_select_db($database_connection, $connection);
$depart_query="SELECT * FROM `".$tbl."members` WHERE member_id='$user_id'"; 
$depart_result=mysql_query($depart_query) or die(mysql_error());
$s_no=0;

while ($depart_row=mysql_fetch_array($depart_result)){ 
	$user_id=$depart_row['member_id']; 
	$user_name=$depart_row['firstname']; 
	$user_last=$depart_row['lastname']; 
	$user_login=$depart_row['login']; 
	$user_pass='nochange'; 
	$user_type=$depart_row['type']; 
	$user_location=$depart_row['location']; 
$show_type = '';
$s_no = $s_no + 1;
$option1 = '';
$option2 = '';
$option3 = '';
if ( $user_type == '1'){$option1 = 'selected';}
if ( $user_type == '3'){$option3 = 'selected';}
if ( $user_type == '2'){$option2 = 'selected';}
}

	echo'
<h3><center>Edit User <br></h3>
<form id="loginForm" name="loginForm" method="post" action="?pid=user&sub=edt_save">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    
<tr>
      

	<tr>
      <td><font face=Verdana size=2></b>First Name :</td>
      <td><input name="fname" type="text" class="textfield" id="fname" value="'.$user_name.'"/></td>
    </tr>
    <tr>
      <td><font face=Verdana size=2>Last Name :</td>
      <td><input name="lname" type="text" class="textfield" id="lname" value="'.$user_last.'"/></td>
    </tr>
    <tr>
      <td width="134"><font face=Verdana size=2>Login :</td>
      <td width="168"><input name="mlogin" type="text" class="textfield" id="mlogin" value="'.$user_login.'"/ disabled>
<input name="login" type="hidden" class="textfield" id="login" value="'.$user_login.'"/ ></td>
    </tr>
    <tr>
      <td> <font face=Verdana size=2>Password :</td>
      <td><input name="password" type="password" class="textfield" id="password" value="'.$user_pass.'"/></td>
    </tr>
    <tr>
      <td> <font face=Verdana size=2>Confirm Password :</td>
      <td><input name="cpassword" type="password" class="textfield" id="cpassword" value="'.$user_pass.'"/></td>
    </tr>
    <tr>
      <td> <font face=Verdana size=2>User Type :</td>
      <td>
<select name="user_type" class="textfield">
<option value="1" '.@$option1.'>Administrator</option>
<option value="3" '.@$option3.'>Moderator</option>
<option value="2" '.@$option2.'>User</option>
</td>
    </tr>   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Update" /></td>
    </tr>
  </table>
</form>
';