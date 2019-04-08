<?php

//#######################################################################################
//##																					#
//##	Name 		: Gatepass Management System										#
//##	Version		: 3.2																#
//##    Releae Date	: OCT 08, 2015														#							
//##    --------------------------------------------------------------------------------#
//##	Developer	: Ayaz Haider														#
//##    --------------------------------------------------------------------------------#
//##	Email		: ayaz.haider@yahoo.com												#
//##	Blog		: http://ayazhaider.blogspot.com									#
//## 												#
//##																					#
//#######################################################################################

//include the connection file
require_once('connection.php');
require_once('auth.php');
require_once('top.htm');


//save the data on the DB and send the email
if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
    //recieve Spicified variables
	$mt = $_POST['mt'];
	$st = $_POST['st'];
	$my_gp_type = $_POST['my_gp_type'];
	
	//recieve the variables
	$ms = strtoupper($_POST['ms']);
	$vehicle = strtoupper($_POST['vehicle']);
	$time= strtoupper($_POST['time']);
	$date= strtoupper($_POST['date']);
	$return_date= strtoupper(@$_POST['return_date']);

	$depart = strtoupper(@$_POST['depart']);
	$gp_no = strtoupper($_POST['gp_no']);
	$sender = strtoupper($_POST['sender']);
	$approved = strtoupper($_POST['approved']);

	$address = strtoupper(@$_POST['address']);
	$po_no = strtoupper($_POST['po_no']);
	
//File Upload

$fname=explode('/',$gp_no);

$path = "attach/";

//File 1
$file_name_1 = $_FILES['attach_1']['name'];
$ext_1 = pathinfo($file_name_1, PATHINFO_EXTENSION);
$file_path_1 = $path.''.$fname[2].'_1.'.$ext_1; 
if(move_uploaded_file($_FILES['attach_1']['tmp_name'], $file_path_1)) {
$upload_file_1=$fname[2].'_1.'.$ext_1;
echo "File 1 Uploaded.<br>";
}   else{ 
}
   //File 2
$file_name_2 = $_FILES['attach_2']['name'];
$ext_2 = pathinfo($file_name_2, PATHINFO_EXTENSION);
$file_path_2 = $path.''.$fname[2].'_2.'.$ext_2; 
if(move_uploaded_file($_FILES['attach_2']['tmp_name'], $file_path_2)) {
$upload_file_2=$fname[2].'_2.'.$ext_2;
echo "File 2 Uploaded.<br>";
}
   else{ 
   }
//File 3
$file_name_3 = $_FILES['attach_3']['name'];
$ext_3 = pathinfo($file_name_3, PATHINFO_EXTENSION);
$file_path_3 = $path.''.$fname[2].'_3.'.$ext_3; 
if(move_uploaded_file($_FILES['attach_3']['tmp_name'], $file_path_3)) {
$upload_file_3=$fname[2].'_3.'.$ext_3;
echo "File 3 Uploaded.<br>";
}
   else{ 
   }
//File 4
$file_name_4 = $_FILES['attach_4']['name'];
$ext_4 = pathinfo($file_name_4, PATHINFO_EXTENSION);
$file_path_4 = $path.''.$fname[2].'_4.'.$ext_4; 
if(move_uploaded_file($_FILES['attach_4']['tmp_name'], $file_path_4)) {
$upload_file_4=$fname[2].'_4.'.$ext_4;
echo "File 4 Uploaded.<br>";
}
   else{ }
//File 5
$file_name_5 = $_FILES['attach_5']['name'];
$ext_5 = pathinfo($file_name_5, PATHINFO_EXTENSION);
$file_path_5 = $path.''.$fname[2].'_5.'.$ext_5; 
if(move_uploaded_file($_FILES['attach_5']['tmp_name'], $file_path_5)) {
$upload_file_5=$fname[2].'_5.'.$ext_5;
echo "File 5 Uploaded.<br>";
}
   else{ }




		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("INSERT INTO `".$tbl."".$mt."` (ms, vehicle, date, time, depart, gpno, sender, approved,user_id,user_name, address,po_no, return_date,file_1,file_2,file_3,file_4,file_5 ) VALUES (%s,%s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							sanitize($ms, "text"),
							sanitize($vehicle, "text"),
							sanitize($date, "text"),
							sanitize($time, "text"),
							sanitize($depart, "text"),
							sanitize($gp_no, "text"),
							sanitize($sender, "text"),
							sanitize($approved, "text"),
							sanitize($_SESSION['GPMA_key'], "text"),
							sanitize($_SESSION['GPMA_FIRST_NAME'], "text"),
							sanitize($address, "text"),
							sanitize($po_no, "text"),
							sanitize($return_date, "text"),
							sanitize(@$upload_file_1, "text"),
							sanitize(@$upload_file_2, "text"),
							sanitize(@$upload_file_3, "text"),
							sanitize(@$upload_file_4, "text"),
							sanitize(@$upload_file_5, "text")
							) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{
$gp_query = sprintf("INSERT INTO `".$tbl."gp_no` (gp_no, user_id ) VALUES (  %s,%s)",
							sanitize($gp_no, "text"),
	sanitize($_SESSION['GPMA_key'], "text")) ;
							
								
	$result_gp = mysql_query($gp_query, $connection)or die(mysql_error()) ;
	
	if($result_gp)
	{}
$n=0;
while( $n < 10){

$n=$n+1;
$sn[$n] = strtoupper(@$_POST['sn_'.$n]);
	$item[$n] = strtoupper(@$_POST['item_'.$n]);
	$qty[$n] = strtoupper(@$_POST['qty_'.$n]);
	$unit[$n] = strtoupper(@$_POST['unit_'.$n]);
	$dept_gp[$n] = strtoupper(@$_POST['dept_gp_'.$n]);
	$remarks[$n] = strtoupper(@$_POST['remarks_'.$n]);
	$due_date[$n] = strtoupper(@$_POST['due_date_'.$n]);
	

if($item[$n] != NULL )
{

		//save the data on the DB
	mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("INSERT INTO `".$tbl."$st` (gpno,  item, qty, unit, price, remarks, ret_date  ) VALUES (  %s,%s, %s, %s, %s, %s, %s)",
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
<br><i>GP Successfully Posted</i>
<br><br><br>
" ;


echo'<a href="new_gp.php?pid='.$my_gp_type.'">New Entry Form</a> <br><br>
<a target="blank" href="pdf_'.$my_gp_type.'.php?lp='.$gp_no.'&pid='.$my_gp_type.'">Create PDF</a>';
		
}
}











// SANITIZE

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