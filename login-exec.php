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
	
	//Include database connection details
require_once('connection.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login-failed.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM `".$tbl."members` WHERE login='$login' AND passwd='".$_POST['password']."'";
	$result=mysql_query($qry);

	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			$member = mysql_fetch_assoc($result);

if ( $member['status'] != 'varified'){
			header("location: varify.php?em=".$login);
echo 'not varified';
exit();
} 


$m_ip = 'User:'.$login.' 
User ip is :'.$_SERVER['REMOTE_ADDR'];  
$m_to = "gpms@livebms.com";
$m_from = "gpms_demo@livebms.com";
 $m_subject = "User:".$login." ".$m_ip;

     $m_headers  = "From: $m_from\r\n"; 
    $m_headers .= "Content-type: text/html\r\n"; 
    
 if (mail($m_to, $m_subject, $m_ip, $m_headers)) { 
  }


			//Login Successful


			session_regenerate_id();
			$_SESSION['GPMA_MEMBER_ID'] = $member['member_id'];
			$_SESSION['GPMA_FIRST_NAME'] = $member['firstname'];
			$_SESSION['GPMA_LAST_NAME'] = $member['lastname'];
			$_SESSION['GPMA_LOGIN'] = $member['login'];
			$_SESSION['GPMA_type'] = $member['type'];
			$_SESSION['GPMA_location'] = $member['location'];
			$_SESSION['GPMA_key'] = $member['key'];
            $_SESSION['GPMA_ID'] = 'vrbyayaz123';
			header("location: gpms/index.php");
			session_write_close();
 
 
			exit();
		

}else {
			//Login failed
			header("location: login-failed.php");
			exit();
		}
	}else {
		die(mysql_error()."Query failed");
	}

$value = 'something from somewhere';




?>