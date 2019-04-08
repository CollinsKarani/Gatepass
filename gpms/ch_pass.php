<?php
$step = @$_POST['step'];
if ($step == 'save'){
$user = @$_POST['user'];
$current = @$_POST['current'];
$new = @$_POST['new'];
$confirm = @$_POST['confirm'];
if($user == '' || $new == '' || $current == '' || $confirm == '' ){
$user = '';
$current ='';
$new = '';
$confirm ='';
$msg = "<font color=red>Any of one field is missing. Try Again<br></font>
Tip! You must type at least 4 charector password and correct user name.";
}else{
if($new == $confirm ){
	require_once('connection.php');
	//Create query

	mysql_select_db($database_connection, $connection);	
	$qry="SELECT * FROM `gpms_members` WHERE `login` like '$user' AND `passwd` like '$current'";
	$result=mysql_query($qry) or die ('Error: '.mysql_error());
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 0) {
$msg = "<font color=red>Invalid User Name or Password. Try Again<br></font>
Tip! Make sure you type User Name and your current Password in same Case, and check if the Caps Lock is enable.";
}
		if(mysql_num_rows($result) == 1) {
	require_once('connection.php');
	mysql_select_db($database_connection, $connection);	

$update_query = "UPDATE `gpms_members` SET `passwd`='$new' WHERE `login` like '$user' AND `passwd` like '$current'";
							
								
	$update_result = mysql_query($update_query, $connection) or die(
	mysql_error());

	if($update_result)
	{
	echo '<br><font face="verdana" size="2" color="Green">You have successfully Changed your Password.</br>
<a href="index.php?msg=pc">click here to continue</a>' ;
exit();
	} 




}


}else {
		die(mysql_error());
	}
}else{
$msg = "<font color=red>New Password is not confirmed. Try Again<br></font>Tip! Make sure you type same words in new and confirm text fields.";
}
}

echo @$msg;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
   function formfocus() {
      document.getElementById('login').focus();   }
   window.onload = formfocus;
</script>
</head>
<body>
<p align="right"><a href="index.php"> Cencel </a></p><center>
<h1>Change Your Password</h1> 

<form id="loginForm" name="loginForm" method="post" action="">
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr><p>
      <td width="250"><font size="2"> User Name</b></td>
      <td width="150"><input name="user" type="text" class="textfield" id="login" ></td>
    </tr>    <tr><p>
      <td width="250"><font size="2">Current Password</b></td>
      <td width="150"><input name="current" type="password" class="textfield" id="login" ></td>
    </tr>
    <tr>
      <td><font size="2"> New Password</b></td>
      <td><input name="new" type="password" class="textfield" id="password" ></td>
    </tr>    <tr>
      <td><font size="2">Confirm New Password</b></td>
      <td><input name="confirm" type="password" class="textfield" id="password" ></td>
    </tr>
    <tr>
      <td>&nbsp;<input type="hidden" name="step" value="save" />
</td>
      <td><input type="submit" name="Submit" value=" Save " /></td>

    </tr>
  </table>
</form>
</body>
</html>
