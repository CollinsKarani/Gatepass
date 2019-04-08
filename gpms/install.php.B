<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
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


 
		
$step = @$_POST['step'];
if ($step == NULL){	
echo "<center><h3> Installation Wizard Step : 1</h3><h1> Gatepass Management System</h1>by Ayaz Haider <br> 
<form id=\"step1\" name=\"step1\" method=\"post\" action=\"\">
  <table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\">
    
<tr>
      

	<tr>
      <th>Database Host:</th>
      <td><input name=\"db_host\" size = \"30\" type=\"text\" class=\"textfield\" id=\"db_host\" /></td>
    </tr>
    <tr>
      <th>Database Name:</th>
      <td><input name=\"db_name\" size = \"30\" type=\"text\" class=\"textfield\" id=\"db_host\" /></td>
    </tr>
    <tr>
      <th width=\"200\">User:</th>
      <td width=\"200\"><input name=\"db_user\" size = \"30\" type=\"text\" class=\"textfield\" id=\"db_user\" /></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><input name=\"db_password\" size = \"30\" type=\"password\" class=\"textfield\" id=\"db_password\" /></td>
    </tr>
     <tr>
    <th>Company Name:</th>
      <td><input name=\"company\" size = \"30\" type=\"text\" class=\"textfield\" id=\"db_host\" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name=\"step\" type=\"hidden\" class=\"textfield\" id=\"db_password\" value =\"2\"/></td>

      <td><input type=\"submit\" name=\"Submit\" value=\"Continue\" /></td>
    </tr>
  </table>
</form>"; 
exit(); }

	 	$company = $_POST['company'] ;
	 	$db_host = $_POST['db_host'] ;
  		$db_name = $_POST['db_name'] ;
	    $db_user = $_POST['db_user'] ;
    	$db_password = $_POST['db_password'] ;
// Step 2

if ($step == 2){	
$link = mysql_connect("$db_host","$db_user", "$db_password") or die("<br><center>Please Check Host Name, User Name and Password<br><a href=\"install.php\">Click Here to try again</a> ");
    print "--> Connected to<b> ".$db_host." </b><br>";
    mysql_select_db("$db_name") or die("<br><center> Connect to ".$db_host."  but The Database <b> ".$db_name."</b> not Found <br><a href=\"install.php\">Click Here to try again</a>");
    print "--> And database<b> ".$db_name." </b>selected successfully<br><br><br>
    --> Updating Database <br><Center><b> Please Wait..</b><center>";

// close connection


$sql = "CREATE TABLE IF NOT EXISTS `in_gp_non_ret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `sno1` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `unit1` varchar(255) DEFAULT NULL,
  `qty1` varchar(255) DEFAULT NULL,
  `price1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `sno2` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `unit2` varchar(255) DEFAULT NULL,
  `qty2` varchar(255) DEFAULT NULL,
  `price2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `sno3` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `unit3` varchar(255) DEFAULT NULL,
  `qty3` varchar(255) DEFAULT NULL,
  `price3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `sno4` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `unit4` varchar(255) DEFAULT NULL,
  `qty4` varchar(255) DEFAULT NULL,
  `price4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `sno5` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `unit5` varchar(255) DEFAULT NULL,
  `qty5` varchar(255) DEFAULT NULL,
  `price5` varchar(255) DEFAULT NULL,
  `remarks5` varchar(255) DEFAULT NULL,
  `sno6` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `unit6` varchar(255) DEFAULT NULL,
  `qty6` varchar(255) DEFAULT NULL,
  `price6` varchar(255) DEFAULT NULL,
  `remarks6` varchar(255) DEFAULT NULL,
  `sno7` varchar(255) DEFAULT NULL,
  `item7` varchar(255) DEFAULT NULL,
  `unit7` varchar(255) DEFAULT NULL,
  `qty7` varchar(255) DEFAULT NULL,
  `price7` varchar(255) DEFAULT NULL,
  `remarks7` varchar(255) DEFAULT NULL,
  `sno8` varchar(255) DEFAULT NULL,
  `item8` varchar(255) DEFAULT NULL,
  `unit8` varchar(255) DEFAULT NULL,
  `qty8` varchar(255) DEFAULT NULL,
  `price8` varchar(255) DEFAULT NULL,
  `remarks8` varchar(255) DEFAULT NULL,
  `sno9` varchar(255) DEFAULT NULL,
  `item9` varchar(255) DEFAULT NULL,
  `unit9` varchar(255) DEFAULT NULL,
  `qty9` varchar(255) DEFAULT NULL,
  `price9` varchar(255) DEFAULT NULL,
  `remarks9` varchar(255) DEFAULT NULL,
  `sno0` varchar(255) DEFAULT NULL,
  `item0` varchar(255) DEFAULT NULL,
  `unit0` varchar(255) DEFAULT NULL,
  `qty0` varchar(255) DEFAULT NULL,
  `price0` varchar(255) DEFAULT NULL,
  `remarks0` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ";

$result = mysql_query($sql, $link)or die(mysql_error());

// 2nd table

$sql = "CREATE TABLE IF NOT EXISTS `in_gp_ret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `sno1` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `unit1` varchar(255) DEFAULT NULL,
  `qty1` varchar(255) DEFAULT NULL,
  `price1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `sno2` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `unit2` varchar(255) DEFAULT NULL,
  `qty2` varchar(255) DEFAULT NULL,
  `price2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `sno3` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `unit3` varchar(255) DEFAULT NULL,
  `qty3` varchar(255) DEFAULT NULL,
  `price3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `sno4` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `unit4` varchar(255) DEFAULT NULL,
  `qty4` varchar(255) DEFAULT NULL,
  `price4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `sno5` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `unit5` varchar(255) DEFAULT NULL,
  `qty5` varchar(255) DEFAULT NULL,
  `price5` varchar(255) DEFAULT NULL,
  `remarks5` varchar(255) DEFAULT NULL,
  `sno6` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `unit6` varchar(255) DEFAULT NULL,
  `qty6` varchar(255) DEFAULT NULL,
  `price6` varchar(255) DEFAULT NULL,
  `remarks6` varchar(255) DEFAULT NULL,
  `sno7` varchar(255) DEFAULT NULL,
  `item7` varchar(255) DEFAULT NULL,
  `unit7` varchar(255) DEFAULT NULL,
  `qty7` varchar(255) DEFAULT NULL,
  `price7` varchar(255) DEFAULT NULL,
  `remarks7` varchar(255) DEFAULT NULL,
  `sno8` varchar(255) DEFAULT NULL,
  `item8` varchar(255) DEFAULT NULL,
  `unit8` varchar(255) DEFAULT NULL,
  `qty8` varchar(255) DEFAULT NULL,
  `price8` varchar(255) DEFAULT NULL,
  `remarks8` varchar(255) DEFAULT NULL,
  `sno9` varchar(255) DEFAULT NULL,
  `item9` varchar(255) DEFAULT NULL,
  `unit9` varchar(255) DEFAULT NULL,
  `qty9` varchar(255) DEFAULT NULL,
  `price9` varchar(255) DEFAULT NULL,
  `remarks9` varchar(255) DEFAULT NULL,
  `sno0` varchar(255) DEFAULT NULL,
  `item0` varchar(255) DEFAULT NULL,
  `unit0` varchar(255) DEFAULT NULL,
  `qty0` varchar(255) DEFAULT NULL,
  `price0` varchar(255) DEFAULT NULL,
  `remarks0` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ";

$result = mysql_query($sql, $link)or die(mysql_error());

// 3rd table

$sql = "CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ";


$result = mysql_query($sql, $link)or die(mysql_error());

// 4th table

$sql = "CREATE TABLE IF NOT EXISTS `ow_gp_non_ret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `sno1` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `unit1` varchar(255) DEFAULT NULL,
  `qty1` varchar(255) DEFAULT NULL,
  `price1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `sno2` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `unit2` varchar(255) DEFAULT NULL,
  `qty2` varchar(255) DEFAULT NULL,
  `price2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `sno3` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `unit3` varchar(255) DEFAULT NULL,
  `qty3` varchar(255) DEFAULT NULL,
  `price3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `sno4` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `unit4` varchar(255) DEFAULT NULL,
  `qty4` varchar(255) DEFAULT NULL,
  `price4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `sno5` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `unit5` varchar(255) DEFAULT NULL,
  `qty5` varchar(255) DEFAULT NULL,
  `price5` varchar(255) DEFAULT NULL,
  `remarks5` varchar(255) DEFAULT NULL,
  `sno6` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `unit6` varchar(255) DEFAULT NULL,
  `qty6` varchar(255) DEFAULT NULL,
  `price6` varchar(255) DEFAULT NULL,
  `remarks6` varchar(255) DEFAULT NULL,
  `sno7` varchar(255) DEFAULT NULL,
  `item7` varchar(255) DEFAULT NULL,
  `unit7` varchar(255) DEFAULT NULL,
  `qty7` varchar(255) DEFAULT NULL,
  `price7` varchar(255) DEFAULT NULL,
  `remarks7` varchar(255) DEFAULT NULL,
  `sno8` varchar(255) DEFAULT NULL,
  `item8` varchar(255) DEFAULT NULL,
  `unit8` varchar(255) DEFAULT NULL,
  `qty8` varchar(255) DEFAULT NULL,
  `price8` varchar(255) DEFAULT NULL,
  `remarks8` varchar(255) DEFAULT NULL,
  `sno9` varchar(255) DEFAULT NULL,
  `item9` varchar(255) DEFAULT NULL,
  `unit9` varchar(255) DEFAULT NULL,
  `qty9` varchar(255) DEFAULT NULL,
  `price9` varchar(255) DEFAULT NULL,
  `remarks9` varchar(255) DEFAULT NULL,
  `sno0` varchar(255) DEFAULT NULL,
  `item0` varchar(255) DEFAULT NULL,
  `unit0` varchar(255) DEFAULT NULL,
  `qty0` varchar(255) DEFAULT NULL,
  `price0` varchar(255) DEFAULT NULL,
  `remarks0` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT= 0";


$result = mysql_query($sql, $link)or die(mysql_error());

// 5th table

$sql = "CREATE TABLE IF NOT EXISTS `ow_gp_ret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `sno1` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `unit1` varchar(255) DEFAULT NULL,
  `qty1` varchar(255) DEFAULT NULL,
  `price1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `sno2` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `unit2` varchar(255) DEFAULT NULL,
  `qty2` varchar(255) DEFAULT NULL,
  `price2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `sno3` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `unit3` varchar(255) DEFAULT NULL,
  `qty3` varchar(255) DEFAULT NULL,
  `price3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `sno4` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `unit4` varchar(255) DEFAULT NULL,
  `qty4` varchar(255) DEFAULT NULL,
  `price4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `sno5` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `unit5` varchar(255) DEFAULT NULL,
  `qty5` varchar(255) DEFAULT NULL,
  `price5` varchar(255) DEFAULT NULL,
  `remarks5` varchar(255) DEFAULT NULL,
  `sno6` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `unit6` varchar(255) DEFAULT NULL,
  `qty6` varchar(255) DEFAULT NULL,
  `price6` varchar(255) DEFAULT NULL,
  `remarks6` varchar(255) DEFAULT NULL,
  `sno7` varchar(255) DEFAULT NULL,
  `item7` varchar(255) DEFAULT NULL,
  `unit7` varchar(255) DEFAULT NULL,
  `qty7` varchar(255) DEFAULT NULL,
  `price7` varchar(255) DEFAULT NULL,
  `remarks7` varchar(255) DEFAULT NULL,
  `sno8` varchar(255) DEFAULT NULL,
  `item8` varchar(255) DEFAULT NULL,
  `unit8` varchar(255) DEFAULT NULL,
  `qty8` varchar(255) DEFAULT NULL,
  `price8` varchar(255) DEFAULT NULL,
  `remarks8` varchar(255) DEFAULT NULL,
  `sno9` varchar(255) DEFAULT NULL,
  `item9` varchar(255) DEFAULT NULL,
  `unit9` varchar(255) DEFAULT NULL,
  `qty9` varchar(255) DEFAULT NULL,
  `price9` varchar(255) DEFAULT NULL,
  `remarks9` varchar(255) DEFAULT NULL,
  `sno0` varchar(255) DEFAULT NULL,
  `item0` varchar(255) DEFAULT NULL,
  `unit0` varchar(255) DEFAULT NULL,
  `qty0` varchar(255) DEFAULT NULL,
  `price0` varchar(255) DEFAULT NULL,
  `remarks0` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ";

$result = mysql_query($sql, $link)or die(mysql_error());


echo "<head>
<meta http-equiv=\"refresh\" content=\"5; URL=add_user.php\">
</head>";

$f_name = "connection.php";
$fp = fopen( $f_name, "w" ) or die ( "<br><br><center><font color=\"red\"><b>Unable to create Config File <br> FTP _root Directory Access Denied</br> " );

$text = "<?php
	define('DB_HOST', '".$db_host."');
    define('DB_USER', '".$db_user."');
    define('DB_PASSWORD', '".$db_password."');
    define('DB_DATABASE', '".$db_name."');

\$install = 'install.php';

if (file_exists(\$install)) {
    echo \"<Center>The file <font color=\'red\'>\$install </font>exists. <br> In order to continue you must Rename or Delete this File From Server.</center>\";
exit();
} else {
}

\$hostname_connection = \"".$db_host."\";
\$database_connection = \"".$db_name."\";
\$username_connection = \"".$db_user."\";
\$password_connection = \"".$db_password."\";
\$connection = mysql_connect(\$hostname_connection, \$username_connection, \$password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
\$company_name = \"".$company."\";


    ?>";

fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );

// config file
//------------------------

$f2_name = "config.php";
$fp = fopen( $f2_name, "w" ) or die ( "<br><br><center><font color=\"red\"><b>Unable to create Config File <br> FTP _root Directory Access Denied</br> " );

$text = "<?php
	define('DB_HOST', '".$db_host."');
    define('DB_USER', '".$db_user."');
    define('DB_PASSWORD', '".$db_password."');
    define('DB_DATABASE', '".$db_name."');


    ?>";

fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );



 };





?>
</body>
</html>
