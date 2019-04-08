<head>
<title>Gatepass Management System </title>
<script src="chat/welive.php" language="javascript"></script>
<STYLE TYPE="text/css">
<!--

.menuh	{
		BORDER-COLOR : #FFFF99 ;
		cursor : hand ;
		Border-Left : #FFFF99 ;
		Border-Top : #FFFF99 ;
		Padding-Left : 1px ;
		Padding-Top : 1px ;
		Background-Color : #FFFF99 ;
	}
.menu	{
		Background-Color : white ;
	}
.home	{
		cursor : hand ;
	}

.menulinks{
text-decoration:none;
}
//-->
</STYLE>
</head><body>

<?php
$myvar='KJhn&*yoihiuahya*cfsghn';

require_once('connection.php');
?>
<?php
$myvar='KJhn&*yoihiuahya*cfsghn';

//#######################################################################################
//##																					#
//##	Name 		: Gatepass Management System										#
//##	Version		: 2.1															#
//##    Releae Date	: April 20, 2011													#							
//##    --------------------------------------------------------------------------------#
//##	Developer	: Ayaz Haider														#
//##    --------------------------------------------------------------------------------#
//##	Email		: ayaz.haider@yahoo.com												#
//##	Blog		: http://ayazhaider.blogspot.com									#
//##    Forum		: http://www.livebms.com											#
//##																					#
//#######################################################################################

$pid=@$_GET['pid'];
$sub=@$_GET['sub'];

if ($pid == 'ad'){
require_once('login-form.php');
exit();
}
if ($pid == 'le'){
require_once('login-exec.php');
exit();
}
if ($pid == ''){
require_once('login-form.php');
exit();
}
	
?>