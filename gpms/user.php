<?php
if(@$myvar == ''){
			header("location: index.php");
exit();
}
$user_id=@$_POST['user_id'];
$act=@$_GET['act'];
$user_name=@$_POST['name'];
$depart_action=@$_POST['action'];

if ($sub=="reg"){
require_once('register-user.php');
}

if ($sub=="edit"){
require_once('edit_user.php');
}

if ($sub=="edt_save"){
require_once('update-user.php');
}

if ($sub=="del"){
echo'<p><font face="verdana" size="2" color="#FF0000">Are You Sure to delete <b>'.$user_name.' ?

<form name="no_form" method="POST" action="?pid=user"></form>

<form method="POST" action="?pid=user&sub=delconf_loc">
  <p>
  <input type="hidden" name="user_id" value="'.$user_id.'" size="20">
  <input type="hidden" name="name" value="'.$user_name.'" size="20">
<input type="hidden" name="action" value="del_user" size="20">
<input type="submit" value=" Yes " name="B1">
<input type="button" value=" No " name="B2" 
onClick= "javascript:document.no_form.submit();return false;"></p>

</form>';

}

if ($sub=="delconf_loc"){
if ( $depart_action == 'del_user'){

mysql_select_db($database_connection, $connection);
$insert_query = "DELETE FROM `".$tbl."members` WHERE `member_id` = ".$user_id." LIMIT 1";
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br>
<a href="?pid=user">Click here to Continue</a>');

	if($result)
	{
	$status= '<p><font face="verdana" size="2" color="Green"><b>Successfully Deleted. </br></font>
' ;
$sub = "";
	}	
}
}
if ($act=="suc"){
$status= '<p><font face="verdana" size="2" color="Green"><b>User Added. </br></font>
' ;}




if ($sub=="" || $sub=="save"){
mysql_select_db($database_connection, $connection);
$depart_query="SELECT * FROM `".$tbl."members` ORDER BY `login` ASC"; 
$depart_result=mysql_query($depart_query) or die(mysql_error());
$s_no=0;
$data=mysql_num_rows($depart_result);
if ($data > 0){
echo'
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0099FF" width="100%" id="AutoNumber1" bgcolor="#0099FF">
  <tr>
    <td width="5%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;S No.</font></b></td>
    <td width="20%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Full Name</font></b></td>
    <td width="10%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Login</font></b></td>
    <td width="10%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Type</font></b></td>
    <td width="20%" bordercolor="#000080" bgcolor="#0099FF"><b>
    <font face="Verdana" size="2" color="#FFFFFF">&nbsp;Action</font></b></td>
  </tr>';
}

while ($depart_row=mysql_fetch_array($depart_result)){ 
	$user_id=$depart_row['member_id']; 
	$user_name=$depart_row['firstname']; 
	$user_last=$depart_row['lastname']; 
	$user_login=$depart_row['login']; 
	$user_location=$depart_row['location']; 
	$user_type=$depart_row['type']; 
$show_type = '';
$s_no = $s_no + 1;
if ( $user_type == '1'){$show_type = 'Administrator';}
if ( $user_type == '3'){$show_type = 'Moderator';}
if ( $user_type == '2'){$show_type = 'User';}
echo'
<form name="edit_form_'.$s_no.'" id="edit_form_'.$s_no.'" action="?pid=user&sub=edit" method="POST">
  <input type="hidden" name="user_id" value="'.$user_id.'" size="20">
  <input type="hidden" name="name" value="'.$user_login.'" size="20">
<input type="hidden" name="action" value="edit_user" size="20"></form>
<form name="del_form_'.$s_no.'"  id="del_form"  action="?pid=user&sub=del" method="POST">
  <input type="hidden" name="user_id" value="'.$user_id.'" size="20">
  <input type="hidden" name="name" value="'.$user_login.'" size="20">
<input type="hidden" name="action" value="del_user" size="20"></form>
  <tr>
    <td  bordercolor="#000080" bgcolor="#FFFFFF"> <font face="Verdana" size="2" >
'.$s_no.'</td>
    <td  bordercolor="#000080" bgcolor="#FFFFFF"> <font face="Verdana" size="2">
'.$user_name.' '.$user_last.' </td>
    <td bordercolor="#000080" bgcolor="#FFFFFF">  <font face="Verdana" size="2">
'.@$user_login.' 
</td>
    <td bordercolor="#000080" bgcolor="#FFFFFF">  <font face="Verdana" size="2">
'.@$show_type.' 
</td>
    <td bordercolor="#000080" bgcolor="#FFFFFF">  <font face="Verdana" size="2">
<input type="button" value=" Edit " onclick= "javascript:document.edit_form_'.$s_no.'.submit();return false;">
<input type="button"  value=" Delete " onclick= "javascript:document.del_form_'.$s_no.'.submit();return false;">
</td>
  </tr>
</form>';
}
echo'</table>';
require_once('new_user.php');
echo @$status;
}


?>