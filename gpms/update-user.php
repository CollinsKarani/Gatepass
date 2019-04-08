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

	require_once('connection.php');

$status = "ok" ;

if ($status == "ok"){
	//Start session
	
//Include database connection details

	
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
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	$save_type = clean($_POST['user_type']);
$save_location = "user";	
if($save_type == 1){$save_location = "admin"; }
if($save_type == 2){$save_location = "user"; }
	
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	

	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ?pid=user");
		exit();
	}

	//Create INSERT query
if ($_POST['password'] == 'nochange'){
	$qry = "UPDATE `".$tbl."members` SET firstname='$fname', lastname='$lname', type='$save_type' , location='$save_location' WHERE login LIKE '$login'";
}
if ($_POST['password'] != 'nochange'){
$pass=md5($_POST['password']);
	$qry = "UPDATE `".$tbl."members`  SET firstname='$fname', lastname='$lname', passwd='$pass', type='$save_type' WHERE login LIKE '$login'";
}
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: ?pid=user&act=esuc");
		exit();
	}else {
		die(mysql_error());
	}
}
if ($status != "ok"){
print" <table width=\"300\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\"> Invalid Admin Detail System Helted ";
}


?>