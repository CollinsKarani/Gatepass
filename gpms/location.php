<?php

$v_id=@$_POST['depart_id'];
$v_name=@$_POST['name'];
$depart_action=@$_POST['action'];

if ($sub=="del"){

mysql_select_db($database_connection, $connection);
$depart_query="SELECT * FROM `members` WHERE `location` LIKE \"".$v_name."\""; 
$depart_result=mysql_query($depart_query) or die(mysql_error());
$data=mysql_num_rows($depart_result);
if ($data == 0){

echo'<p><font face="verdana" size="2" color="#FF0000">Are You Sure to delete <b>'.$v_name.' ?
<form method="POST" name="c_del" action="?pid=loc"></form>

<form method="POST" action="?pid=loc&sub=delconf_loc">
  <p>
  <input type="hidden" name="depart_id" value="'.$v_id.'" size="20">
  <input type="hidden" name="name" value="'.$v_name.'" size="20">
<input type="hidden" name="action" value="del_v" size="20">
<input type="submit" value=" Yes " name="B1">
<input type="button" value=" No " name="B2" onClick= "javascript:document.c_del.submit();return false;""></p>

</form>';
}else{
echo'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>Unable to delete '.$v_name.'<br></font>
<font face="verdana" size="2" color="#000000"><b>Reason :</b> '.$v_name.' is used for one or more user\'s default location<br>
<a href="?pid=loc">Click here to Continue</a>';
}
}

if ($sub=="delconf_loc"){
if ( $depart_action == 'del_v'){

mysql_select_db($database_connection, $connection);
$insert_query = "DELETE FROM `location` WHERE `id` = ".$v_id." LIMIT 1";
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br>
<a href="?pid=loc">Click here to Continue</a>');

	if($result)
	{
	$status= '<p><font face="verdana" size="2" color="Green"><b>Successfully Deleted. </br></font>
' ;
$sub = "";
	}	
}
}


if ($sub=="save"){
if ( $depart_action == 'v'){

mysql_select_db($database_connection, $connection);
$insert_query = sprintf("INSERT INTO `location` (name) VALUES ( %s)",
							sanitize($v_name, "text")
						) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br>
<a href="?pid=loc">Click here to Continue</a>');

	if($result)
	{
	$status= '<p><font face="verdana" size="2" color="Green"><b>Saved. </br></font>
' ;
	}	
}


}

if ($sub=="" || $sub=="save"){
mysql_select_db($database_connection, $connection);
$depart_query="SELECT * FROM `location` ORDER BY `name` ASC"; 
$depart_result=mysql_query($depart_query) or die(mysql_error());
$s_no=0;
$data=mysql_num_rows($depart_result);
if ($data > 0){
echo'
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0099FF" width="100%" id="AutoNumber1" bgcolor="#0099FF">
  <tr>
    <td width="10%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;S No.</font></b></td>
    <td width="20%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Location</font></b></td>
    <td width="30%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Action</font></b></td>
  </tr>';
}

while ($depart_row=mysql_fetch_array($depart_result)){ 
	$v_name=$depart_row['name']; 
	$v_id=$depart_row['id']; 
$s_no = $s_no + 1;
echo'
<form method="POST" action="?pid=loc&sub=del">
  <input type="hidden" name="depart_id" value="'.$v_id.'" size="20">
  <input type="hidden" name="name" value="'.$v_name.'" size="20">
<input type="hidden" name="action" value="del_v" size="20">

  <tr>
    <td  bordercolor="#000080" bgcolor="#FFFFFF"> <font face="Verdana" size="2" >
'.$s_no.'</td>
    <td  bordercolor="#000080" bgcolor="#FFFFFF"> <font face="Verdana" size="2">
'.$v_name.'</td>
     <td   bordercolor="#000080" bgcolor="#FFFFFF"> ';

echo'
<input type="submit" value=" Delete " name="B1">';

echo'
</td>
  </tr>
</form>';
}
echo'</table>';
require_once('new_location.htm');
echo @$status;
}


?>