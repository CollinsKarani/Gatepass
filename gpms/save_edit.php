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


//Get variables from Form
if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
	//recieve Spicified variables
	$gp_type = $_POST['gp_type'];
	$gp_type_sh = "".$gp_type."_sh";
	$con_code = $_POST['con_code'];
	$confirm_code = $_POST['confirm_code'];
	$id_sh = $_POST['id_sh'];
	
	// receive Global variable
	$ms = $_POST['ms'];
	$vehicle = $_POST['vehicle'];
	$time= $_POST['time'];
	$date= $_POST['date'];
	$depart = $_POST['depart'];
	$gp_no = $_POST['gp_no'];
	$sender = $_POST['sender'];
	$approved = $_POST['approved'];
	
	// Form Data
	$sn_1 = $_POST['sn_1'];
	$item_1 = $_POST['item_1'];
	$qty_1 = $_POST['qty_1'];
	$unit_1 = $_POST['unit_1'];
	$dept_gp_1 = $_POST['dept_gp_1'];
	$remarks_1 = $_POST['remarks_1'];
	
	$sn_2 = $_POST['sn_2'];
	$item_2 = $_POST['item_2'];
	$qty_2 = $_POST['qty_2'];
	$unit_2 = $_POST['unit_2'];
	$dept_gp_2 = $_POST['dept_gp_2'];
	$remarks_2 = $_POST['remarks_2'];
	
	$sn_3 = $_POST['sn_3'];
	$item_3 = $_POST['item_3'];
	$qty_3 = $_POST['qty_3'];
	$unit_3 = $_POST['unit_3'];
	$dept_gp_3 = $_POST['dept_gp_3'];
	$remarks_3 = $_POST['remarks_3'];
	
	$sn_4 = $_POST['sn_4'];
	$item_4 = $_POST['item_4'];
	$qty_4 = $_POST['qty_4'];
	$unit_4 = $_POST['unit_4'];
	$dept_gp_4 = $_POST['dept_gp_4'];
	$remarks_4 = $_POST['remarks_4'];
	
	$sn_5 = $_POST['sn_5'];
	$item_5 = $_POST['item_5'];
	$qty_5 = $_POST['qty_5'];
	$unit_5 = $_POST['unit_5'];
	$dept_gp_5 = $_POST['dept_gp_5'];
	$remarks_5 = $_POST['remarks_5'];
	
	$sn_6 = $_POST['sn_6'];
	$item_6 = $_POST['item_6'];
	$qty_6 = $_POST['qty_6'];
	$unit_6 = $_POST['unit_6'];
	$dept_gp_6 = $_POST['dept_gp_6'];
	$remarks_6 = $_POST['remarks_6'];
	
	$sn_7 = $_POST['sn_7'];
	$item_7 = $_POST['item_7'];
	$qty_7 = $_POST['qty_7'];
	$unit_7 = $_POST['unit_7'];
	$dept_gp_7 = $_POST['dept_gp_7'];
	$remarks_7 = $_POST['remarks_7'];
	
	$sn_8 = $_POST['sn_8'];
	$item_8 = $_POST['item_8'];
	$qty_8 = $_POST['qty_8'];
	$unit_8 = $_POST['unit_8'];
	$dept_gp_8 = $_POST['dept_gp_8'];
	$remarks_8 = $_POST['remarks_8'];
	
	$sn_9 = $_POST['sn_9'];
	$item_9 = $_POST['item_9'];
	$qty_9 = $_POST['qty_9'];
	$unit_9 = $_POST['unit_9'];
	$dept_gp_9 = $_POST['dept_gp_9'];
	$remarks_9 = $_POST['remarks_9'];
	
	$sn_10 = $_POST['sn_10'];
	$item_10 = $_POST['item_10'];
	$qty_10 = $_POST['qty_10'];
	$unit_10 = $_POST['unit_10'];
	$dept_gp_10 = $_POST['dept_gp_10'];
	$remarks_10 = $_POST['remarks_10'];
}

$confirm="ok";
  if (empty($sn_1)) {
$confirm="wrong";
Print "Please make selection from Submenu";

  }

if ($confirm == "ok"){

if($item_1 == NULL )
{
	print "<font color=\"red\"><b><br><br>You must put at least One Record";
	Print "</P><INPUT TYPE=\"button\" VALUE=\"Click Here to go Back\" onClick=\"history.go(-1);\"> ";
}




if ($confirm_code != $con_code){
Print "You are not authorized to change this record";
}

if ($confirm_code == $con_code){

if($item_1 != NULL )
{
		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("UPDATE $gp_type SET ms = %s, vehicle = %s , date = %s, time = %s, depart = %s, sender = %s, approved = %s , sno1 = %s , item1 =%s , qty1 = %s, unit1=  %s, price1= %s, remarks1= %s, sno2= %s, item2= %s, qty2= %s, unit2= %s, price2= %s, remarks2= %s, sno3= %s, item3= %s, qty3= %s, unit3= %s, price3= %s, remarks3= %s, sno4= %s, item4= %s, qty4= %s, unit4= %s, price4= %s, remarks4= %s, sno5= %s, item5=%s, qty5= %s, unit5= %s, price5=  %s, remarks5=  %s, sno6= %s, item6=  %s, qty6=  %s, unit6= %s, price6=  %s, remarks6=  %s, sno7= %s, item7= %s, qty7= %s, unit7=  %s, price7=  %s, remarks7=  %s, sno8= %s, item8= %s, qty8=%s, unit8=%s, price8= %s, remarks8= %s, sno9= %s, item9= %s, qty9= %s, unit9=%s, price9=%s, remarks9=%s, sno0= %s, item0= %s, qty0=%s, unit0= %s, price0= %s, remarks0= %s
	  where gpno like \"$gp_no\" order by id",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							sanitize($sn_1, "text"),
							sanitize($item_1, "text"),
							sanitize($qty_1, "text"),
							sanitize($unit_1, "text"),
							sanitize($dept_gp_1, "text"),
							sanitize($remarks_1, "text"),
							sanitize($sn_2, "text"),
							sanitize($item_2, "text"),
							sanitize($qty_2, "text"),
							sanitize($unit_2, "text"),
							sanitize($dept_gp_2, "text"),
							sanitize($remarks_2, "text"),
							sanitize($sn_3, "text"),
							sanitize($item_3, "text"),
							sanitize($qty_3, "text"),
							sanitize($unit_3, "text"),
							sanitize($dept_gp_3, "text"),
							sanitize($remarks_3, "text"),
							sanitize($sn_4, "text"),
							sanitize($item_4, "text"),
							sanitize($qty_4, "text"),
							sanitize($unit_4, "text"),
							sanitize($dept_gp_4, "text"),
							sanitize($remarks_4, "text"),
							sanitize($sn_5, "text"),
							sanitize($item_5, "text"),
							sanitize($qty_5, "text"),
							sanitize($unit_5, "text"),
							sanitize($dept_gp_5, "text"),
							sanitize($remarks_5, "text"),
							sanitize($sn_6, "text"),
							sanitize($item_6, "text"),
							sanitize($qty_6, "text"),
							sanitize($unit_6, "text"),
							sanitize($dept_gp_6, "text"),
							sanitize($remarks_6, "text"),
							sanitize($sn_7, "text"),
							sanitize($item_7, "text"),
							sanitize($qty_7, "text"),
							sanitize($unit_7, "text"),
							sanitize($dept_gp_7, "text"),
							sanitize($remarks_7, "text"),
							sanitize($sn_8, "text"),
							sanitize($item_8, "text"),
							sanitize($qty_8, "text"),
							sanitize($unit_8, "text"),
							sanitize($dept_gp_8, "text"),
							sanitize($remarks_8, "text"),
							sanitize($sn_9, "text"),
							sanitize($item_9, "text"),
							sanitize($qty_9, "text"),
							sanitize($unit_9, "text"),
							sanitize($dept_gp_9, "text"),
							sanitize($remarks_9, "text"),
							sanitize($sn_10, "text"),
							sanitize($item_10, "text"),
							sanitize($qty_10, "text"),
							sanitize($unit_10, "text"),
							sanitize($dept_gp_10, "text"),
							sanitize($remarks_10, "text"),
							sanitize($sn_10, "text"),
							sanitize($item_10, "text"),
							sanitize($qty_10, "text"),
							sanitize($unit_10, "text"),
							sanitize($dept_gp_10, "text"),
							sanitize($remarks_10, "text"));
							

							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{
		echo "<head>
<meta http-equiv=\"refresh\" content=\"3; URL=index.php\">
</head>
<u>PLEASE WAIT...</u>
<br><i>Updating Database</i>
" ;
	}	
}


if($item_1 != NULL )
{
	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("UPDATE $gp_type_sh SET ms = %s, vehicle = %s , date = %s, time = %s, depart = %s, sender = %s, approved = %s , item =%s , qty= %s, unit=  %s, price= %s, remarks= %s
	  where gpno like \"$gp_no\" order by id",	
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),						 
							sanitize($item_1, "text"),
							sanitize($qty_1, "text"),
							sanitize($unit_1, "text"),
							sanitize($dept_gp_1, "text"),
							sanitize($remarks_1, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	";
exit();
	}
}






  //2nd Record
 if($item_2 != NULL )
{

		//save the 2ND ROW data on the DB
	
	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved, item , qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_2, "text"),
							sanitize($qty_2, "text"),
							sanitize($unit_2, "text"),
							sanitize($dept_gp_2, "text"),
							sanitize($remarks_2, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}

   //3rd Record
 if($item_3 != NULL )
{

	
	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved,  item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_3, "text"),
							sanitize($qty_3, "text"),
							sanitize($unit_3, "text"),
							sanitize($dept_gp_3, "text"),
							sanitize($remarks_3, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}
 
 //4th Record
 if($item_4 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved,  item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							
						 
							sanitize($item_4, "text"),
							sanitize($qty_4, "text"),
							sanitize($unit_4, "text"),
							sanitize($dept_gp_4, "text"),
							sanitize($remarks_4, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}	




 //5th Record
 if($item_5 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved, item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_5, "text"),
							sanitize($qty_5, "text"),
							sanitize($unit_5, "text"),
							sanitize($dept_gp_5, "text"),
							sanitize($remarks_5, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}	


 //6th Record
 if($item_6 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved, item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_6, "text"),
							sanitize($qty_6, "text"),
							sanitize($unit_6, "text"),
							sanitize($dept_gp_6, "text"),
							sanitize($remarks_6, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}	



 //7th Record
 if($item_7 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved, item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_7, "text"),
							sanitize($qty_7, "text"),
							sanitize($unit_7, "text"),
							sanitize($dept_gp_7, "text"),
							sanitize($remarks_7, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
	
";
	}
}	


 //8th Record
 if($item_8 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved, item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_8, "text"),
							sanitize($qty_8, "text"),
							sanitize($unit_8, "text"),
							sanitize($dept_gp_8, "text"),
							sanitize($remarks_8, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo " ";

	}
}	


 //9th Record
 if($item_9 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved,  item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_9, "text"),
							sanitize($qty_9, "text"),
							sanitize($unit_9, "text"),
							sanitize($dept_gp_9, "text"),
							sanitize($remarks_9, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
";
	}
}	


 //10th Record
 if($item_10 != NULL )
{

	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO in_gp_ret_sh  (ms, vehicle, date, time, depart, gpno, sender, approved,item, qty, unit, price, remarks ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							 
						 
							sanitize($item_10, "text"),
							sanitize($qty_10, "text"),
							sanitize($unit_10, "text"),
							sanitize($dept_gp_10, "text"),
							sanitize($remarks_10, "text"));
							
							
							
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{

		echo "
		";
	}
}	
require_once('auth.php');
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



