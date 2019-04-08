<?php
$edit_id=@$_GET['edt'];
$act_id=@$_GET['act'];
if ($act_id== NULL){
mysql_select_db($database_connection, $connection);
$customer_query = "SELECT * FROM `vendors` WHERE `id` LIKE \"$edit_id\""; 
$customer_result = mysql_query($customer_query) or die("Couldn't execute query");
while ($customer_edit = mysql_fetch_array($customer_result)){
 $customer_id = $customer_edit['id'];
 $customer_name = $customer_edit['name'];
 $customer_contact_person = $customer_edit['contact_person'];
$address_edit= $customer_edit['address'];
$city_edit= $customer_edit['city'];
$zipcode_edit= $customer_edit['zipcode'];
$phone_edit= $customer_edit['phone'];
$mobile_edit= $customer_edit['mobile'];
$fax_edit= $customer_edit['fax'];
$email_edit= $customer_edit['email'];
$state_edit= $customer_edit['state'];
$country_edit= $customer_edit['country'];
$info_edit= $customer_edit['info'];

  }





echo'</body></html>
<html><head>

<script type="text/javascript">
   function formfocus() {
      document.getElementById(\'customer_name\').focus();
   }
   window.onload=formfocus;
</script></head><body><p><b>
<u><p><b>
<u>
<font face="Arial Unicode MS,Bookman Old Style,Arial" size="2" color="#031487">Edit Customer Details&nbsp;&nbsp;&nbsp; </font></u></u></b></b></span></span>
<br>
</p>
<form method="POST" action="?pid=edtcust&act=savesup">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="100%" id="AutoNumber1" height="288">
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Supplier Name</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_name" size="20"  value="'.$customer_name.'"></font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Phone No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_phone" size="20" value="'.$phone_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Contact Person</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_contact_person" size="20" value="'.$customer_contact_person.'"></font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Mobile No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_mobile" size="20" value="'.$mobile_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Address</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" rowspan="2" height="66">
      <textarea rows="4" name="customer_address" cols="23">'.$address_edit.'</textarea></td>
      <td width="7%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Fax No.</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="32">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_fax" size="20" value="'.$fax_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="32">
      &nbsp;</td>
      <td width="7%" style="border-style: none; border-width: medium" height="32">
      <font face="Verdana" size="2">Email</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="32">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_email" size="20" value="'.$email_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">City</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_city" size="20" value="'.$city_edit.'"></font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">State</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_state" size="20" value="'.$state_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Zip Code</font></td>
      <td width="19%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_zip" size="20" value="'.$zipcode_edit.'"></font></td>
      <td width="7%" style="border-style: none; border-width: medium" height="20">
      <font face="Verdana" size="2">Country</font></td>
      <td width="43%" style="border-style: none; border-width: medium" align="left" height="20">
      <font face="Verdana" style="font-size: 8pt">
      <input type="text" name="customer_country" size="20" value="'.$country_edit.'"></font></td>
    </tr>
    <tr>
      <td width="11%" style="border-style: none; border-width: medium" height="130" valign="top">
      &nbsp;<p><font face="Verdana" size="2">Additional Info</font></td>
      <td width="69%" style="border-style: none; border-width: medium" align="left" colspan="3" height="130">
      <textarea rows="5" name="customer_info" cols="59">'.$info_edit.'</textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><font face="Verdana"><span style="font-size: 8pt">
  <input type="hidden" name="customer_id" value="'.$customer_id .'">
  <input type="hidden" name="action" value="updatecust">
  <input type="submit" value="Save" name="B1"></span></font></p>
&nbsp;';


}


//section Two

if ($act_id== 'savesup'){

if(isset($_POST['action']) && $_POST['action'] == 'updatecust')
{
    //recieve Spicified variables


$savecustomer_name = $_POST['customer_name'];
$savecustomer_id = $_POST['customer_id'];
$savecustomer_contact_person = $_POST['customer_contact_person'];
$savecustomer_phone = $_POST['customer_phone'];
$savecustomer_mobile = $_POST['customer_mobile'];
$savecustomer_address = $_POST['customer_address'];
$savecustomer_fax = $_POST['customer_fax'];
$savecustomer_email = $_POST['customer_email'];
$savecustomer_city = $_POST['customer_city'];
$savecustomer_state = $_POST['customer_state'];
$savecustomer_zip = $_POST['customer_zip'];
$savecustomer_country = $_POST['customer_country'];
$savecustomer_info = $_POST['customer_info'];

mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("UPDATE `vendors` set name = %s, contact_person = %s, address = %s, city = %s,
zipcode = %s, phone = %s,mobile = %s,fax = %s,email = %s,state = %s,country = %s,info = %s where `vendors`.`id` LIKE ".$savecustomer_id."",
							sanitize($savecustomer_name, "text"),
							sanitize($savecustomer_contact_person, "text"),
							sanitize($savecustomer_address, "text"),
							sanitize($savecustomer_city, "text"),
							sanitize($savecustomer_zip, "text"),
							sanitize($savecustomer_phone, "text"),
							sanitize($savecustomer_mobile, "text"),
							sanitize($savecustomer_fax, "text"),
							sanitize($savecustomer_email, "text"),
							sanitize($savecustomer_state, "text"),
							sanitize($savecustomer_country, "text"),
							sanitize($savecustomer_info, "text")
						) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br><br><a href="?pid=s_list">Click Here to continue</a>');
	
	if($result)	{
require_once('customer_list.htm');

		echo'<p>	<font face="Verdana" size="2" color="green">
Updated Successfully<br>
' ;
	}	
}

}




?>