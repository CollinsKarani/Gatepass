<?php 
require_once('connection.php');
require_once('top.htm');
require_once('auth.php');



if ($_SESSION['GPMA_type'] != 1 ){
exit();
}
echo'
<html>
<head>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>

<script type="text/javascript" src="disableEnter.js"></script>

<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="receipt.js"></script>
</head>
<body>
';
$gp_type = @$_GET['pid'] ;


$step = @$_POST['step'] ;
$main_id = @$_POST['main_id'] ;
$del_gp = @$_POST['del_gp'] ;

// Set Gatepass Type
if ($gp_type == "onr"){
$gp_title = 'Outward Non Returnable Gatepass Report';
$gp_mt = 'ow_non_main';
$gp_st = 'ow_non_sub';
$report_prefix = 'OWN';
$gpset = 'ow' ;
$gp_date = 'off' ;
}


if ($gp_type == "or"){
$gp_title = 'Outward Returnable Gatepass Report';
$gp_mt = 'ow_ret_main';
$gp_st = 'ow_ret_sub';
$report_prefix = 'OWR';
$gp_date = 'on';
$gpset = 'ow' ;

}
if ($gp_type == "inr"){
$gp_title = 'Inward Non Returnable Gatepass Report';
$gp_mt = 'in_non_main';
$gp_st = 'in_non_sub';
$report_prefix = 'IWN';
$gp_date = 'off';
$gpset = 'iw';
}
if ($gp_type == "ir"){
$gp_title = 'Inward Returnable Gatepass Report';
$gp_mt = 'in_ret_main';
$gp_st = 'in_ret_sub';
$report_prefix = 'IWR';
$gp_date = 'on';
$gpset = 'iw';

}



mysql_select_db($database_connection, $connection);
	$var = @$_GET['lp'];
  	$trimmed = trim($var) ;

if ( $trimmed == ''){exit();}
  $query = "Select * from `".$gp_mt."` where `gpno` like \"%".$trimmed."%\" Limit 2";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

if ($line == 0){
echo '<br>No record Found';
exit();
}


if ($line >= 2){
echo '<br><br>Too Many Record Found <br>Tip! Type Complete Gate Pass number';
exit();
}



 while ($row= mysql_fetch_array($result)) {

if ($step == ''){
echo'<p> &nbsp; </p>
<form id="new_gp" name="new_gp" action="" method="post">
Are you sure to delete following Gatepass entry ? <br>
Gatepass No :<b> '.$row['gpno'].' </b><br><br>
<input type="hidden" name="step" value="2">
<input type="hidden" name="del_gp" value="'.$row['gpno'].'">
<input type="hidden" name="main_id" value="'.$row['id'].'">
<input type="submit" value=" Yes "> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

<input type="button" value=" No " onclick="javascript:window.location=\'report.php?pid='.$gp_type.'\'">
';
}
}

if ($step == 2){

		//delet the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("DELETE from ".$gp_mt." WHERE `id` LIKE \"".$main_id."\" ") ;
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
{

		//delet the data on the DB
	$del_query = sprintf("DELETE from ".$gp_st." WHERE `gpno` LIKE \"".$del_gp."\" ") ;
							
								
	$del_result = mysql_query($del_query, $connection) or die(mysql_error());
	
	if($del_result)
{




echo'<p> &nbsp; </p>
<form id="new_gp" name="new_gp" action="" method="post">
Gatepass No :<b> '.$del_gp.' </b> is Successfully deleted from database.<br><br>
<input type="hidden" name="step" value="2">
 &nbsp; &nbsp; <input type="button" value=" continue " onclick="javascript:window.location=\'report.php?pid='.$gp_type.'\'">
';
}



}
}
?>