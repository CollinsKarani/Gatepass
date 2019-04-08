<?php
$edit_id=@$_GET['del'];
$act_id=@$_GET['act'];
if ($act_id== NULL){
mysql_select_db($database_connection, $connection);
$customer_query = "SELECT * FROM `vendors` WHERE `id` LIKE \"$edit_id\""; 
$customer_result = mysql_query($customer_query) or die("Couldn't execute query");
while ($customer_edit = mysql_fetch_array($customer_result)){
$customer_id =$customer_edit['id'];
$customer_name =$customer_edit['name'];
$customer_contact_person =$customer_edit['contact_person'];
$address_edit=$customer_edit['address'];
$city_edit=$customer_edit['city'];
$zipcode_edit=$customer_edit['zipcode'];
$phone_edit=$customer_edit['phone'];
$mobile_edit=$customer_edit['mobile'];
$fax_edit=$customer_edit['fax'];
$email_edit=$customer_edit['email'];
$state_edit=$customer_edit['state'];
$country_edit=$customer_edit['country'];
$info_edit=$customer_edit['info'];

  }




echo'</body></html>
<html><head>

<script type="text/javascript">
   function formfocus() {
      document.getElementById(\'no\').focus();
   }
   window.onload=formfocus;
</script></head><body><p><b>
<u>
<font face="Arial Unicode MS,Bookman Old Style,Arial" size="2" color="red">Are you sure to Delete following Supplier?&nbsp;&nbsp;&nbsp; </font></u></b></span></span>
<br><form method="POST" action="?pid=delcust&act=delcust">

  <input type="submit" value="Yes Delete" name="B1" tabindex="20">
</p>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="100%" id="AutoNumber1" height="288">
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Supplier Name</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      '.$customer_name.'</font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Phone No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      '.$phone_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Contact Person</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      '.$customer_contact_person.'</font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Mobile No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      '.$mobile_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Address</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" rowspan="2" height="66">
      <textarea rows="4" name="sup_address" cols="23"tabindex="10" >'.$address_edit.'</textarea></td>
      <td width="7%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Fax No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="32">
      <font face="Verdana" style="font-size: 8pt">
     '.$fax_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="32">
      &nbsp;</td>
      <td width="7%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Email</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="32">
      <font face="Verdana" style="font-size: 8pt">
      '.$email_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">City</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
     '.$city_edit.'</font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">State</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
     '.$state_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Zip Code</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      '.$zipcode_edit.'</font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Country</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
     '.$country_edit.'</font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="130" valign="top">
      &nbsp;<p><font face="Verdana" size="2">Additional Info</font></td>
      <td width="69%" style="border-style: none; border-width: medium" align="left" colspan="3" height="130">
      <textarea rows="5" name="sup_info" cols="59">'.$info_edit.'</textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><font face="Verdana"><span style="font-size: 8pt">
  <input type="hidden" name="sup_id" value="'.$customer_id .'">
  <input type="hidden" name="action" value="delcust"></span></font></p></form>
<form method="POST" action="?pid=c_list">
 <input type="submit" value="No Keep this record" name="no" id="no" tabindex="0"></span></font></p></form>

&nbsp;';


}


//section Two

if ($act_id== 'delcust'){

if(isset($_POST['action']) && $_POST['action'] == 'delcust')
{
    //recieve Spicified variables


$savecust_id = $_POST['sup_id'];


mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("delete from `vendors` where `vendors`.`id` = ".$savecust_id.";") ;
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br><br><a href="?pid=c_list">Click Here to continue</a>');
	
	if($result)	{
require_once('customer_list.htm');

		echo'<p>	<font face="Verdana" size="2" color="green">
Successfully Deleted <br>
' ;
	}	
}

}




?>