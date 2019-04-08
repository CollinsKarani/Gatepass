<?php

//#######################################################################################
//##																					#
//##	Name 		: Gatepass Management System										#
//##	Version		: 1.0.2.0															#
//##    Releae Date	: April 20, 2010													#							
//##    --------------------------------------------------------------------------------#
//##	Developer	: Ayaz Haider														#
//##    --------------------------------------------------------------------------------#
//##	Email		: ayaz.haider@yahoo.com												#
//##	Blog		: http://ayazhaider.blogspot.com									#
//##    Forum		: http://ayaz.comuv.com												#
//##																					#
//#######################################################################################

	//Start session
	session_start();
	
	//Unset the variables stored in session
            unset($_SESSION['GPMA_MEMBER_ID']);
			unset($_SESSION['GPMA_FIRST_NAME']);
			unset($_SESSION['GPMA_LAST_NAME']);
			unset($_SESSION['GPMA_LOGIN']);
			unset($_SESSION['GPMA_type']);
            unset($_SESSION['GPMA_ID']);
		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged Out</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p align="center">
<p align="center">&nbsp;</p>
<h4 align="center" class="err">You have been logged out Successfully.</h4>
<p align="center">Click here to <a href="index.php">Login</a></p>
</body>
</html>
