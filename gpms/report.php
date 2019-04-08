<?php

require_once('connection.php');
require_once('auth.php');
require_once('top.htm');
$gp_type = @$_GET['pid'] ;
$step=@$_POST['step'];

$dt_fr=date('Y-m-d',time());
$dt_to=date('Y-m-d',time());

if ( $step != ''){

$dt_fr=$_POST['date1'];
$dt_to=$_POST['date2'];

}

$dt_fr=explode('-',$dt_fr);
$dt_to=explode('-',$dt_to);

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
$clock_query = 'SELECT * FROM `'.$tbl.'reg` WHERE `key` like "clock" AND `user_id`= "'.$_SESSION['GPMA_key'].'" ';
$clock_result=mysql_query($clock_query) or die(mysql_error());
while($clock_row=mysql_fetch_array($clock_result)){
$adjust_clock=$clock_row['value'];
}


require_once('calendar/classes/tc_calendar.php');
echo'
<html>
<head>

<script language="javascript" src="jquery-1.2.1.pack.js"></script>
<script language="javascript" src="report.js"></script>
</head>

<body>


<form name="form" action="" method="POST"> 
<table><tr><td width=150><font face=verdana size=2>
<b>From: </b>';

  $myCalendar=new tc_calendar("date1", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(1,$dt_fr[1], $dt_fr[0]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2010, 2030);
	  $myCalendar->dateAllow('2010-05-13', '2030-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
echo ' </td><td><font face=verdana size=2><b>&nbsp; To: </b>';

  $myCalendar=new tc_calendar("date2", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($dt_to[2],$dt_to[1], $dt_to[0]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2020-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();

echo ' 
</td></tr></table>
<input type="hidden" name="pid" value="'.$gp_type.'" />

<br>';
echo '      <font color="#000000" face="Verdana" size="2"><b> Party:</font>';

$query='SELECT * FROM `'.$tbl.'v` WHERE `user_id`= "'.$_SESSION['GPMA_key'].'" ORDER BY `name` ASC'; 
$customer_result=mysql_query($query) or die("Couldn't execute query");
echo'  <select size="1"  id="inv_cust"  name="q1">
<option value="">any Vender</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo'</select>';


if ( @$gpset == "ow" ){
echo"     <font color=\"#000000\" face=\"Verdana\" size=\"2\">Department:</font>";




$query="SELECT * FROM `".$tbl."depart` WHERE `user_id`= '".$_SESSION['GPMA_key']."'  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die("Couldn't execute query");
echo'  <select size="1"  id="q2"  name="q2">
<option value="any">Any Depart</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo'</select>';
}



echo '
  <select size="1" name="q3"
onchange="Javascript:document.getElementById(\'q4\').style.display =\'\';" >
  <option value="ms" selected> More options </option>
  <option value="gpno">Gate Pass #</option>
  <option value="sender">Person Responsible</option>
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

$from=$_POST['date1'];
$to=$_POST['date2'];
$q1=$_POST['q1']; if ($q1 == 'any'){$q1 = '';}
@$q2=$_POST['q2']; if (@$q2 == 'any'){@$q2 = '';}
$q3=$_POST['q3'];
$q4=$_POST['q4'];
$header='show';




$add_qu='';
if($q1==''){
$add_qu=' (`sender` like "%'.$q1.'%" and `depart` like "%'.$q2.'%" 
and `'.$q3.'` like "%'.$q4.'%" )
and ';
}
$search='SELECT * FROM `'.$tbl.''.$gp_mt.'` WHERE '.$add_qu.'(`date` BETWEEN "'.$from.'" AND "'.$to.'" )AND( `user_id`= "'.$_SESSION['GPMA_key'].'")
ORDER BY `date` DESC'; 

$search_result=mysql_query($search) or die(mysql_error());



while ($search_row=mysql_fetch_array($search_result)){
$id = $search_row['id'];
$gpno = $search_row['gpno'];
$ms = $search_row['ms'];
$vehicle = $search_row['vehicle'];
$date = $search_row['date'];
$time = $search_row['time'];
$depart = $search_row['depart'];
$sender = $search_row['sender'];
$approved = $search_row['approved'];
$address = $search_row['address'];
$po_no = $search_row['po_no'];
$return_date = $search_row['return_date'];
$file_1=$search_row['file_1'];
$file_2=$search_row['file_2'];
$file_3=$search_row['file_3'];
$file_4=$search_row['file_4'];
$file_5=$search_row['file_5'];

$check=$search_row['check'];
$user_id=$search_row['user_name'];
if ($header == 'show'){
echo'
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Date</td>
   <td bgcolor="#3399FF" width="80"><font face=verdana size=2 color="FFFFFF"> <b>Location</td>
   <td bgcolor="#3399FF" width="80"><font face=verdana size=2 color="FFFFFF"> <b>Vehicle #</td>
   <td bgcolor="#3399FF" width="120"><font face=verdana size=2 color="FFFFFF"> <b>GP No</td>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Vendor</td>
   <td bgcolor="#3399FF" width="400"><font face=verdana size=2 color="FFFFFF"> <b>Item Description</td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>User </td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>Qty</td>
   <td bgcolor="#3399FF" width="50"><font face=verdana size=2 color="FFFFFF"> <b>Unit</td>
   <td bgcolor="#3399FF" width="100"><font face=verdana size=2 color="FFFFFF"> <b>Remarks</td>
   <td bgcolor="#3399FF" width="120"><font face=verdana size=2 color="FFFFFF"> <b>Action</td>
   <td bgcolor="#3399FF" width="120"><font face=verdana size=2 color="FFFFFF"> <b>Attached</td>
   <td bgcolor="#3399FF" width="120"><font face=verdana size=2 color="FFFFFF"> <b>Admin Sign</td>
  </tr>
';
}
$header='hide';

$sub='SELECT * FROM `'.$tbl.''.$gp_st.'` WHERE `gpno` like "'.$gpno.'"
ORDER BY `id` ASC'; 
$sub_result=mysql_query($sub) or die(mysql_error());

$pdf='PDF';
$edit='Edit';
$delete='Delete';
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
    <td><font size=1 face=Verdana>'.$user_id.'</td>
    <td><font size=1 face=Verdana>'.$qty.'</td>
    <td><font size=1 face=Verdana>'.$unit.'</td>
    <td><font size=1 face=Verdana>'.$remarks.'</td>
    <td style="text-align:center"><font size=1 face=Verdana> &nbsp;
';
if ( $pdf!=''){


echo'	<a target="blank" href="pdf_'.$gp_type.'.php?lp='.$gpno.'&pid='.$gp_type.'">'.$pdf.'</a> '; 


if ($_SESSION['GPMA_type'] == 1){
 echo' | <a target=blank href="edit_gp.php?lp='.$gpno.'&pid='.$gp_type.'"> '.$edit.'</a>';
}

}


// echo' | <a href="del_gp.php?lp='.$gpno.'&pid='.$gp_type.'"> '.$delete.'</a>';

echo'</td> <td style="text-align:center"><font size=1 face=Verdana> ';

if ( $pdf!=''){
if ( $file_1!=''){echo'  <a target="blank" href="attach/'.$file_1.'">File 1</a>'; }
if ( $file_2!=''){echo' | <a target="blank" href="attach/'.$file_2.'">File 2</a>'; }
if ( $file_3!=''){echo' | <a target="blank" href="attach/'.$file_3.'">File 3</a>'; }
if ( $file_4!=''){echo' | <a target="blank" href="attach/'.$file_4.'">File 4</a>'; }
if ( $file_5!=''){echo' | <a target="blank" href="attach/'.$file_5.'">File 5</a>'; }
}
echo'</td> <td>';

if ($_SESSION['GPMA_type'] == 1){

if ( $pdf!=''){
echo'
 <input type=checkbox id=admin_s name=sign value=1 onclick="admin_sign(this.id,'.$id.',\''.$gp_mt.'\')"';
if ( $check == 1 ){echo' checked '; }
echo'
>';
}
}
echo'  </td>
  </tr>
';
$sfile='';
$pdf='';
$edit='';
$delete='';
}
}
echo'</table>
';









}






?>


