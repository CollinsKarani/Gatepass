<?php
require_once('connection.php');
$db=@$_POST['tbl'];
$id=@$_POST['id'];
$chk=@$_POST['chk'];

if($chk=='true'){$val=1;}
if($chk=='false'){$val=0;}


mysql_select_db($database_connection, $connection);
$insert_query = sprintf("UPDATE `".$tbl."".$db."` SET `check` = %s WHERE `id` = ".$id." LIMIT 1",
							sanitize($val, "text")
						) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().' ');

	if($result)
	{
	$status= '' ;
	}	

echo $status;

// Function
//---------------------------------
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