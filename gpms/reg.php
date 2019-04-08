<?php

if ($sub == 'sc'){
$clock=@$_POST['clock'];
mysql_select_db($database_connection, $connection);
$insert_query = "UPDATE `".$tbl."reg` SET value=".$clock." WHERE `key` = \"clock\" AND `user_id`= \"".$_SESSION['GPMA_key']."\" LIMIT 1";
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br>
<a href="?pid=depart">Click here to Continue</a>');

	if($result)
	{
$sub = "";
	}	

}

echo ' Current Server Date Time : <b>'.date('d/m/Y H:i',time());

echo '</b><form name="reg_form" action="index.php?pid=reg&sub=sc" method="post">
<br> Adjust Clock :
<select name="clock" onChange= "javascript:document.reg_form.submit();return false;">
<option value="-45000">- 12:30</option> 
<option value="-43200">- 12:00</option> 
<option value="-41400">- 11:30</option> 
<option value="-39600">- 11:00</option> 
<option value="-37800">- 10:30</option>
<option value="-36000">- 10:00</option> 
<option value="-34200">- 09:30</option> 
<option value="-32400">- 09:00</option> 
<option value="-30600">- 08:30</option>
<option value="-28800">- 08:00</option> 
<option value="-27000">- 07:30</option> 
<option value="-25200">- 07:00</option> 
<option value="-23400">- 06:30</option>
<option value="-21600">- 06:00</option> 
<option value="-19800">- 05:30</option> 
<option value="-18000">- 05:00</option> 
<option value="-16200">- 04:30</option>
<option value="-14400">- 04:00</option> 
<option value="-12600">- 03:30</option> 
<option value="-10800">- 03:00</option> 
<option value="-9000">- 02:30</option>
<option value="-7200">- 02:00</option> 
<option value="-5400">- 01:30</option> 
<option value="-3600">- 01:00</option>
<option value="-1800">- 00:30</option>
<option value="0" selected> Adjust Local Time</option>
<option value="0" >  00:00</option>
<option value="+1800">+ 00:30</option>
<option value="+3600">+ 01:00</option>
<option value="+5400">+ 01:30</option>
<option value="+7200">+ 02:00</option>
<option value="+9000">+ 02:30</option>
<option value="+10800">+ 03:00</option>
<option value="+12600">+ 03:30</option>
<option value="+14400">+ 04:00</option>
<option value="+16200">+ 04:30</option>
<option value="+18000">+ 05:00</option>
<option value="+19800">+ 05:30</option>
<option value="+21600">+ 06:00</option>
<option value="+23400">+ 06:30</option>
<option value="+25200">+ 07:00</option>
<option value="+27000">+ 07:30</option>
<option value="+28800">+ 08:00</option>
<option value="+30600">+ 08:30</option>
<option value="+32400">+ 09:00</option>
<option value="+34200">+ 09:30</option>
<option value="+36000">+ 10:00</option>
<option value="+37800">+ 10:30</option>
<option value="+39600">+ 11:00</option>
<option value="+41400">+ 11:30</option>
<option value="+43200">+ 12:00</option>
<option value="+45000">+ 12:30</option>
</select><br>';


mysql_select_db($database_connection, $connection);

$clock_query = "SELECT * FROM `".$tbl."reg` WHERE `key` like \"clock\" AND `user_id`= \"".$_SESSION['GPMA_key']."\" ";
$clock_result=mysql_query($clock_query) or die(mysql_error());
$adjust_clock='';
while($clock_row=mysql_fetch_array($clock_result)){
$adjust_clock=$clock_row['value'];
}
if($adjust_clock==''){
$add_clock_query = "INSERT INTO `".$tbl."reg` (`key`,`value`,`user_id`) VALUES(\"clock\",0,\"".$_SESSION['GPMA_key']."\" )   ";
$add_clock_result=mysql_query($add_clock_query) or die(mysql_error());

}
echo '<br> Current Local Date Time : <b>'.date('d/m/Y H:i',time()+$adjust_clock).'</b>';

?>