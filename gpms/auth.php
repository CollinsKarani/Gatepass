<?php

	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
		if(!isset($_SESSION['GPMA_MEMBER_ID']) || (trim($_SESSION['GPMA_ID']) != 'vrbyayaz123')) {
		header("location: ../index.php?pid=ad");
		exit();
	}

?>