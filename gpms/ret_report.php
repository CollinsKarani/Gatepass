<?php
require_once('auth.php');
require_once('connection.php');
require_once('top.htm');
$gp_type = @$_POST['pid'] ;
$step=@$_POST['step'];

$type=@$_GET['type'];
if($type=='ir'){$sel='selected';}
if($type!='ir'){$sel='';}
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


// Set Gatepass Type
if ($gp_type == "ow_gp_non_ret"){
$gp_title = 'Outward Non Returnable Gatepass';
}
if ($gp_type == "ow_gp_ret"){
$gp_title = 'Outward Returnable Gatepass';
}
if ($gp_type == "in_gp_non_ret"){
$gp_title = 'Inward Non Returnable Gatepass';
}
if ($gp_type == "in_gp_ret"){
$gp_title = 'Inward Returnable Gatepass';
}
if ($gp_type != NULL){
echo   ' <p style="font-weight: 600; color: #517dbf; margin-top: 0px; margin-bottom: 0px" align="center">
  <font size="4">
  <u>'.$gp_title.'</u></font></p>
';}
 


// Get Time Zone

mysql_select_db($database_connection, $connection);
$clock_query = 'SELECT * FROM `'.$tbl.'reg` WHERE `key` like "clock" ';
$clock_result=mysql_query($clock_query) or die(mysql_error());
while($clock_row=mysql_fetch_array($clock_result)){
$adjust_clock=$clock_row['value'];
}

require_once('calendar/classes/tc_calendar.php');
echo'
<html>
<head>

<script language="javascript" src="calendar/calendar.js"></script>
</head>

<body>


<form name="form" action="" method="POST"> 
 <font color="#000000" face="Verdana" size="2">Type:</font>
<select size="1"  id="inv_cust"  name="pid">
<option value="or">Out-ward</option> 
<option value="ir" '.$sel.'>In-ward</option> 

</select>';




echo '
  <select size="1" name="q3"
onchange="Javascript:document.getElementById(\'q4\').style.display =\'\';" >
  <option value="ms" selected> More options </option>
  <option value="address">Address</option>
  <option value="gpno">Gate Pass #</option>
  <option value="sender">User Responsible</option>
  <option value="remarks">Remarks</option>
  <option value="ms">Location</option>
  </select> :
 <input type="text" name="q4" id="q4" style="display:none"/>
 
 <input type="hidden" name="step" value="search"/>
  <input type="submit" value="Proceed" />
</form>
';

// Start 2nd Step

if ( $step != ''){

$from=@$_POST['date1'];
$to=@$_POST['date2'];
$q3=@$_POST['q3'];
$q4=@$_POST['q4'];
$header='show';

$search='SELECT * FROM `'.$tbl.''.$gp_mt.'`
ORDER BY `date` DESC'; 
$search_result=mysql_query($search) or die(mysql_error());


// WHERE `'.$q3.'` like "%'.$q4.'%" 
//and `date` BETWEEN "'.$from.'" AND "'.$to.'" 

while ($search_row=mysql_fetch_array($search_result)){
$id = $search_row['id'];
$gpno = $search_row['gpno'];
$ms = $search_row['ms'];
$vehicle = $search_row['vehicle'];
$date = $search_row['date'];
$date=explode('-',$date);
$date=$date['2'].'/'.$date['1'].'/'.$date['0'];
$time = $search_row['time'];
$depart = $search_row['depart'];
$sender = $search_row['sender'];
$approved = $search_row['approved'];
$address = $search_row['address'];
$po_no = $search_row['po_no'];
$return_date = $search_row['return_date'];
$return_date=explode('-',$return_date);
$return_date=$return_date['2'].'/'.$return_date['1'].'/'.$return_date['0'];
if ($header == 'show'){
echo'
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="1200" id="AutoNumber1">
  <tr>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Date</td>
   <td bgcolor="#3399FF" width="80"><font face=verdana size=2 color="FFFFFF"> <b>Location</td>
   <td bgcolor="#3399FF" width="80"><font face=verdana size=2 color="FFFFFF"> <b>Vehicle #</td>
   <td bgcolor="#3399FF" width="120"><font face=verdana size=2 color="FFFFFF"> <b>GP No</td>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Vendor</td>
   <td bgcolor="#3399FF" width="400"><font face=verdana size=2 color="FFFFFF"> <b>Item Description</td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>Qty</td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>Unit</td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>Price</td>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Remarks</td>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Due Date</td>
  </tr>
';
}
$header='hide';

$sub='SELECT * FROM `'.$tbl.''.$gp_st.'` WHERE `gpno` like "'.$gpno.'" and (`status` not like "Returned" or `status` is NULL )
ORDER BY `id` ASC'; 
$sub_result=mysql_query($sub) or die(mysql_error());

$pdf='PDF';
while ($sub_row=mysql_fetch_array($sub_result)){
$item=$sub_row['item'];
$unit=$sub_row['unit'];
$qty=$sub_row['qty'];
$price=$sub_row['price'];
$remarks=$sub_row['remarks'];
$ret_date=$sub_row['ret_date'];

echo'
  <tr>
    <td><font size=1 face=Verdana>'.$date.'</td>
    <td><font size=1 face=Verdana>'.$ms.'</td>
    <td><font size=1 face=Verdana>'.$vehicle.'</td>
    <td><font size=1 face=Verdana>'.$gpno.'</td>
    <td><font size=1 face=Verdana>'.$sender.'</td>
    <td><font size=1 face=Verdana>'.$item.'</td>
    <td><font size=1 face=Verdana>'.$qty.'</td>
    <td><font size=1 face=Verdana>'.$unit.'</td>
    <td><font size=1 face=Verdana>'.$price.'</td>
    <td><font size=1 face=Verdana>'.$remarks.'</td>
    <td><font size=1 face=Verdana>'.$return_date.'</td>
  </tr>
';
$gpno = ' --- ';
$ms = ' --- ';
$vehicle =' --- ';
$date = ' --- ';
$time = ' --- ';
$depart = ' --- ';
$sender = ' --- ';
$approved = ' --- ';
$address = ' --- ';
$po_no = ' --- ';
$return_date =' --- ';
$pdf='';
}
}
echo'</table>
';









}






?>


