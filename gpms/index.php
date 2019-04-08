<?php
$myvar='KJhn&*yoihiuahya*cfsghn';
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
//##    Forum		: http://www.livebms.com											#
//##																					#
//#######################################################################################

$run_once = 'connection.php';
if (file_exists($run_once)) {
    } else {
echo "<Center><b>Welcome To Gatepass Management System<br></center><font face=verdana size=2>
Connect with MySQL DB <br></b><font face=verdana size=2>
------------------------------------------------ <br>
 Please Open the folder db_backup  <br>
Copy the connection.php to gpms directory<br><br>

Open connection.php and change values as per your requirement.<br>

<br><br><br>
Thanks,<br>
Ayaz Haider<br>
---------------------<br>
ayaz.haider@yahoo.com
.



</center>";
exit();
}
$pid=@$_GET['pid'];
$sub=@$_GET['sub'];

require_once('connection.php');
require_once('auth.php');

if ($pid == 'ad'){
require_once('login-form.php');
exit();
}

if ($pid == 'le'){
require_once('login-exec.php');
exit();
}

if ($sub!="reg" && $sub!="edt_save" && $sub!="del"  ){
require_once('top.htm');
}
// Location // Vandor
//------------------------------
if ($pid == 'vandorFAKE'){
require_once('menu_vendor.php');
exit();
}
if ($pid == 'addcust'){
require_once('add_cust.htm');
exit();
}
if ($pid == 'savecust'){
require_once('menu_vendor.php');
require_once('save_customer.php');
exit();
}

if ($pid == 'c_list'){
require_once('customer_list.htm');
exit();
}

if ($pid == 'edtcust'){
require_once('edit_customer.php');
exit();
}
if ($pid == 'delcust'){
require_once('del_customer.php');
exit();
}

// Department
//------------------------------
if ($pid == 'depart'){
require_once('connection.php');
require_once('depart.php');
exit();
}
// Product Category
//------------------------------
if ($pid == 'cat'){
require_once('connection.php');
require_once('cat.php');
exit();
}
// Product
//------------------------------
if ($pid == 'product'){
require_once('connection.php');
require_once('prod.php');
exit();
}

// Unit
//------------------------------
if ($pid == 'unit'){
require_once('unit.php');
exit();
}

// Vendor
//------------------------------
if ($pid == 'v'){
require_once('v.php');
exit();
}

if ($pid == ''){
require_once('gp_posted_today.php'); 
require_once('status.php'); 
}
// Location
//------------------------------
if ($pid == 'loc'){
require_once('location.php');
exit();
}


// User Management
//------------------------------
if ($pid == 'user'){
require_once('user.php');
exit();
}

// Company Info
//------------------------------
if ($pid == 'cinfo'){
require_once('company.htm');
exit();
}

// Regional Settings
//------------------------------
if ($pid == 'reg'){
require_once('reg.php');
exit();
}

// Backup
//------------------------------
if ($pid == 'bak'){
require_once('backup.php');
exit();
}




if ($sub!="reg" && $sub!="edt_save" && $sub!="del"  ){
require_once('footer.php');
}





if ($gpms_ver!='2.1'){
echo'<b>Fatal error: </b>Can\'t use function Set Value in write context. <b> Error code: AUx0821';
exit();
}
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
