<?php
if(@$myvar == ''){
header("location: index.php");
exit();
}

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
require_once('../connection.php');
	
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
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['GPMA_MEMBER_ID'] = $member['member_id'];
			$_SESSION['GPMA_FIRST_NAME'] = $member['firstname'];
			$_SESSION['GPMA_LAST_NAME'] = $member['lastname'];
			$_SESSION['GPMA_LOGIN'] = $member['login'];
			$_SESSION['GPMA_type'] = $member['type'];
			$_SESSION['GPMA_location'] = $member['location'];
            $_SESSION['GPMA_ID'] = 'vrbyayaz123';
			header("location: index.php");
			session_write_close();
 
$check = $_POST['remember'];
if($check == "on"){
$value = "oka1";

setcookie("save", $value);
setcookie("save", $value, time()+172800);  /* expire in 1 hour */
setcookie("save", $value, time()+172800, "/~rasmus/", ".example.com", 1);


setcookie("fname", $member['firstname']);
setcookie("fname", $member['firstname'], time()+172800);  /* expire in 1 hour */
setcookie("fname", $member['firstname'], time()+172800, "/~rasmus/", "http://server:80", 1);


setcookie("lname", $value);
setcookie("lname", $member['lastname'], time()+172800);  /* expire in 1 hour */
setcookie("lname", $member['lastname'], time()+172800, "/~rasmus/", "http://server:80", 1);
}

if($check != "on"){
$value = "noway";
setcookie("save", $value);
setcookie("save", $value, time()+172800);  /* expire in 1 day */
setcookie("save", $value, time()+172800, "/~rasmus/", ".example.com", 1);
}
 
			exit();
		}else {
			//Login failed
			header("location: login-failed.php");
			exit();
		}
	}else {
		die(mysql_error());
	}

$value = 'something from somewhere';




?>