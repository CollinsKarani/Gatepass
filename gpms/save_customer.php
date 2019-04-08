<?php


//save the data on the DB and send the email
if(isset($_POST['action']) && $_POST['action'] == 'savecust')
{
    //recieve Spicified variables

$savecust_name = $_POST['cust_name'];
$savecust_contact_person = $_POST['cust_contact_person'];
$savecust_phone = $_POST['cust_phone'];
$savecust_mobile = $_POST['cust_mobile'];
$savecust_address = $_POST['cust_address'];
$savecust_fax = $_POST['cust_fax'];
$savecust_email = $_POST['cust_email'];
$savecust_city = $_POST['cust_city'];
$savecust_state = $_POST['cust_state'];
$savecust_zip = $_POST['cust_zip'];
$savecust_country = $_POST['cust_country'];
$savecust_info = $_POST['cust_info'];

mysql_select_db($database_connection, $connection);
	$insert_query = sprintf("INSERT INTO `vendors` (name, contact_person, address, city, zipcode, phone,
mobile,fax,email,state,country,info) VALUES ( %s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s, %s)",
							sanitize($savecust_name, "text"),
							sanitize($savecust_contact_person, "text"),
							sanitize($savecust_address, "text"),
							sanitize($savecust_city, "text"),
							sanitize($savecust_zip, "text"),
							sanitize($savecust_phone, "text"),
							sanitize($savecust_mobile, "text"),
							sanitize($savecust_fax, "text"),
							sanitize($savecust_email, "text"),
							sanitize($savecust_state, "text"),
							sanitize($savecust_country, "text"),
							sanitize($savecust_info, "text")
						) ;
							
								
	$result = mysql_query($insert_query, $connection) or die(
'<p><font face="verdana" size="2" color="#FF0000"><b>Error!</b><br>'.mysql_error().'<br>');
	
	if($result)
	{
	echo '<p><font face="verdana" size="2" color="Green"><b>Saved. </br>
' ;
	}	
}


?>