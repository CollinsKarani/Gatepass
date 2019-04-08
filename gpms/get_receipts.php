<?php 
require_once('connection.php');
require_once('auth.php');

mysql_select_db($database_connection, $connection);
	$var = @$_POST['q'] ;
  	$trimmed = trim($var) ;

  $query = "Select * from `in_ret_main` where `gpno` like \"%".$trimmed."%\" Limit 1";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

$gp_type = 'ir' ;
if ($line == 0){
  $query = "Select * from `ow_ret_main` where `gpno` like \"%".$trimmed."%\" Limit 1";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

$gp_type = 'or' ;
if ($line == 0){

}
}


if ($gp_type == "or"){
$gp_title = "Outward Returnable Gatepass Form";
$gp_mt = "ow_ret_main";
$gp_st = "ow_ret_sub";
$report_prefix = 'OWR';
$gpset = "ow" ;

}

if ($gp_type == "ir"){
$gp_title = "Inward Returnable Gatepass Form";
$gp_mt = "in_ret_main";
$gp_st = "in_ret_sub";
$report_prefix = 'IWR';

$gpset = "iw" ;

}


 while ($row= mysql_fetch_array($result)) {

$date=$row['date'];
$date=explode('-',$date);
$date=$date['2'].'/'.$date['1'].'/'.$date['0'];

$return_date=$row['return_date'];
$return_date=explode('-',$return_date);
$return_date=$return_date['2'].'/'.$return_date['1'].'/'.$return_date['0'];
echo'
'.$row['ms'].';
'.$row['vehicle'].';
'.$row['gpno'].';
'.$date.';
'.$row['sender'].';
'.$row['depart'].';
'.$row['approved'].';
'.$row['time'].';
'.$row['address'].';
'.$row['po_no'].';

'.$return_date.';
'.$gp_title.';'.$gp_type.';


'.$row['log'].';
'.$row['user_id'].';';


$gp_no=$row['gpno'];

  $s_query = "Select * from `".$gp_st."` where `gpno` like \"".$gp_no."\" ";
  $s_result = mysql_query($s_query) or die(mysql_error());

 while ($s_row= mysql_fetch_array($s_result)) {
$return = $s_row['ret_date'];
if ($s_row['ret_date'] == 'No'){$return = '';}
echo'
'.$s_row['id'].';
'.$s_row['item'].';
'.$s_row['unit'].';
'.$s_row['qty'].';
'.$s_row['price'].';
'.$s_row['remarks'].';
'.$s_row['return_date'].';
'.$s_row['return_date'].';
';

}






}
echo'; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ';
echo'; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ';

?>