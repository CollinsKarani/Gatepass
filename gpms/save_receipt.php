<?php 

//include the connection file
require_once('connection.php');
require_once('top.htm');
require_once('auth.php');









if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
    //recieve Spicified variables
	$mt = $_POST['mt'];
	$st = $_POST['st'];
	$my_gp_type = $_POST['my_gp_type'];
	


	//recieve the variables
	




		//save the data on the DB
$n=0;
while( $n < 10){

$n=$n+1;
$sn[$n] = @$_POST['sn_'.$n];
	$item[$n] = @$_POST['item_'.$n];
	$qty[$n] = @$_POST['qty_'.$n];
	$unit[$n] = @$_POST['unit_'.$n];
	$dept_gp[$n] = @$_POST['dept_gp_'.$n];
	$remarks[$n] = @$_POST['remarks_'.$n];
	$id[$n] = @$_POST['id_'.$n];
	$ret_date[$n] = @$_POST['return_'.$n];
	$status[$n] = @$_POST['status_'.$n];
if($id[$n] != NULL )
{

		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("UPDATE ".$tbl."$st SET ret_date=%s, status=%s WHERE `id` like '".$id[$n]."'  ",
							sanitize($ret_date[$n], "text"),
							sanitize($status[$n], "text")
);
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{}
		
}
}
	echo "
<br><i>GP Successfully Posted</i>
<br><br><br>
" ;



}




















function sanitize($value, $type) 
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  
  return $value;
	
	
	
  
}




?>