<?php
if(@$myvar == ''){
			header("location: index.php");
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> <?php print $company_name ; ?></title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>

<body>

<p align="center">   <font color="navy" face="verdana" size=4> <b>  <?php print $company_name ; ?> </font></b></p>
<form id="loginForm" name="loginForm" method="post" action="index.php?pid=le">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Login</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember">
<font size="2">Remember me next time</td></tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td>
    </tr>
  </table>
</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br></center>
<font size="2" face="Verdana" color="#333333"><br>
&nbsp;------------------------------------------------------------------------------------------------------------------------------------------<br>
&nbsp;Application Name : Gatepass Management System&nbsp; <br>
&nbsp;Release Date : Oct 10, 2011&nbsp; <br>
&nbsp;Version :2.1<br>
</body>
</html>

</body>
</html>
