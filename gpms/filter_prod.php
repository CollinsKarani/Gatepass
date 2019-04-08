<?php
require_once('auth.php');

$cat=@$_POST['tbl'];

$str='';
require_once('connection.php');
mysql_select_db($database_connection, $connection);
$query="SELECT * FROM `".$tbl."product` WHERE `user_id`= '".$_SESSION['GPMA_key']."' and `cat` like '".$cat."'  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die(mysql_error());

while ($sup_row=mysql_fetch_array($customer_result)){
$str.='
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}

$s=0;
while($s<10){
$s++;
echo' <select size="1"    name=dept_gp_'.$s.'>
<option value="">Please Select</option> ';
echo $str;
echo "</select>";
echo '::';
}