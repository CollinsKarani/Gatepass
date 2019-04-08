<?php
ob_start(); // Turn on output buffering
system("ipconfig /all"); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = "Physical";
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac+36),17); // Get Physical Address

if ($mac == '' ){

$mac= $_SERVER['HTTP_HOST']; // Get Physical Address

if ( $mac==''){
$mac = '00-17-9A-7F-A8-28';
}
if ( $mac=='localhost'){
$mac = '00-17-9A-7F-A8-28';
}
if ( $mac=='http://localhost'){
$mac = '00-17-9A-7F-A8-28';
}
}

$step = @$_POST['step'];
if ($step == 'save'){
$key = @$_POST['key'];
require_once('connection.php');
	//Create query

mysql_select_db($database_connection, $connection);	
$update_query = "UPDATE `admin` SET `data`='$key' WHERE `variable` like 'reg_key'";
							
								
	$update_result = mysql_query($update_query, $connection) or die(
	mysql_error());

	if($update_result)
	{
	echo '<br><font face="verdana" size="2" color="Green">Registration Updated.</br>
<a href="index.php?msg=pc">click here to continue</a>';
exit();
	} 


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
   function formfocus() {
      document.getElementById('login').focus();   }
   window.onload = formfocus;
</script>
</head>
<body>
<center>
<h1>Registeration Form </h1>

<form id="loginForm" name="loginForm" method="post" action="">
  <table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr><p>
      <td width="150"><font size="2"> User ID :</b></td>
      <td width="250"><?php echo $mac; ?></td>
    </tr>    <tr><p>
      <td width="150"><font size="2">Registration Key :</b></td>
      <td width="250"><input name="key" type="text" class="textfield" id="key" onkeypress="return tabE(this,event)"/></td>
    </tr>
    <tr>
      <td><font size="2">&nbsp;</b></td>
      <td></td>
    </tr> 
    <tr>
      <td>&nbsp;<input type="hidden" name="step" value="save" /></td>
      <td><input type="submit" name="Submit" value=" Save " /></td>
    </tr> <tr>
      <td><font size="2">&nbsp;</b></td>
      <td></td>
    </tr>  <tr>
      <td><font size="2">&nbsp;</b></td>
      <td></td>
    </tr>  <tr>
      <td><font size="2">&nbsp;</b></td>
      <td></td>
    </tr>  <tr>
      <td><font size="2">&nbsp;</b></td>
      <td></td>
    </tr> 

  </table>
</form>

<br><br><br>
<br></center>
<font size="2" face="Verdana" color="#333333"><br>
For Registration Please Contact<br>
&nbsp;--------------------------------------------------------------------------------<br>
&nbsp;<b>Developer : Ayaz Haider (+92-343-3091454) <br>
</b>&nbsp;--------------------------------------------------------------------------------<br>
&nbsp;<b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> ayaz.haider@yahoo.com <br>
&nbsp;<b>Blog&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b>
<a target="_blank" href="http://ayazhaider.blogspot.com"style="text-decoration: none">
<font color="#333333">http://ayazhaider.blogspot.com </font></a><br>
&nbsp;<b>Website</b> <b>:</b>
<a target="_blank" href="http://www.livebms.com" style="text-decoration: none"><font color="#333333">http://www.livebms.com</font></a> <br>
&nbsp;<br>

&nbsp;Application Name : GatePass Management System&nbsp; <br>
&nbsp;Release Date : Oct 10, 2011&nbsp; <br>
&nbsp;Version :2.1<br>
</body>
</html>

</body>
</html>
