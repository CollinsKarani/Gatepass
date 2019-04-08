<?php

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

//include the connection file
require_once('connection.php');
require_once('top.htm');
require_once('auth.php');


//save the data on the DB and send the email
if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
    //recieve Spicified variables
	$mt = $_POST['mt'];
	$st = $_POST['st'];
	$my_gp_type = $_POST['my_gp_type'];
	
	//recieve the variables
	$ms = $_POST['ms'];
	$main_id = $_POST['main_id'];
	$vehicle = $_POST['vehicle'];
	$time= $_POST['time'];
	$date= $_POST['date'];
	$return_date= @$_POST['return_date'];

	$depart = @$_POST['depart'];
	$gp_no = $_POST['gp_no'];
	$sender = $_POST['sender'];
	$approved = $_POST['approved'];

	$address = $_POST['address'];
	$po_no = $_POST['po_no'];
	




		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("UPDATE `".$tbl."".$mt."` SET ms =%s, vehicle=%s, date=%s, time=%s, depart=%s, gpno=%s, sender=%s, approved=%s,user_name=%s, address=%s,po_no=%s, return_date=%s WHERE `id` LIKE \"".$main_id."\"",
							sanitize($_SESSION['GPMA_location'], "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							sanitize($_SESSION['GPMA_LOGIN'], "text"),
							sanitize($address, "text"),
							sanitize($po_no, "text"),
							sanitize($return_date, "text")

							) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{
$n=0;
while( $n < 10){

$n=$n+1;
$sn[$n] = @$_POST['sn_'.$n];
	$item[$n] = @$_POST['item_'.$n];
	$sub_id_[$n] = @$_POST['sub_id_'.$n];
	$qty[$n] = @$_POST['qty_'.$n];
	$unit[$n] = @$_POST['unit_'.$n];
	$dept_gp[$n] = @$_POST['dept_gp_'.$n];
	$remarks[$n] = @$_POST['remarks_'.$n];
	$due_date[$n] = @$_POST['due_date_'.$n];
	

if($item[$n] != NULL )
{

		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("UPDATE `".$tbl."".$st."` SET gpno = %s,  item = %s, qty = %s, unit = %s, price = %s, remarks = %s, ret_date = %s WHERE `id` LIKE \"".$sub_id_[$n]."\"",
							sanitize($gp_no, "text"),
							sanitize($item[$n], "text"),
							sanitize($qty[$n], "text"),
							sanitize($unit[$n], "text"),
							sanitize($dept_gp[$n], "text"),
							sanitize($remarks[$n], "text"),
							sanitize($due_date[$n], "text")) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{}
}
}
	echo "
<br><i>GP Successfully Updated</i>
<br><br><br>
" ;


echo'<a href="new_gp.php?pid='.$my_gp_type.'">New Entry Form</a> <br><br>
<a target="blank" href="pdf_'.$my_gp_type.'.php?lp='.$gp_no.'&pid='.$my_gp_type.'">Create PDF</a>';
		
}
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



