<?php
$install = 'install.php';


// Type Your Company Name Here

$company_name = "Industronics Engineering";


// Type Your Database Information

$hostname_connection = "";         // MySql Host For Example localhost
$database_connection = "oneapple_gpms";     // Database Name
$username_connection = "root";     // Database User Name
$password_connection = "";     // Database Password
$tbl = "gpms_"; 

//   Do Not change any thing after this Line
//--------------------------------------------------------------------------
	define('DB_HOST', $hostname_connection);           
    define('DB_DATABASE', $database_connection);    
    define('DB_USER', $username_connection);        
    define('DB_PASSWORD', $password_connection);    
$connection = mysql_connect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 

    ?>