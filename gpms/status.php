<?php
exit();
$info = @$_GET['info'];  
require_once('info.php'); 

if ($ver_info == "enable"){
echo "<br><br><a href=\"?info=disable\">Hide Version Info</a>";
};
if ($ver_info == "disable"){
echo "<br><br><a href=\"?info=enable\">Show Version Info<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></a>";
};

if ( $info == "disable"){
$f2_name = "info.php";
$fp = fopen( $f2_name, "w" ) or die ( "<br><br><center><font color=\"red\"><b>Unable to change info.php File <br> Please Change File Permission of info.php to (777)</br> " );
$text="
<?php 
\$ver_info= \"disable\";
?>
";
fwrite( $fp, $text ) or die ( "ERROR: br><br><center><font color=\"red\"><b>Unable to change Info File <br> Please Change File Permission of info.php to (777)</br> " );
echo "<head>
<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">
</head>

";

}


if ( $info == "enable"){
$f2_name = "info.php";
$fp = fopen( $f2_name, "w" ) or die ( "<br><br><center><font color=\"red\"><b>Unable to change info.php File <br> Please Change File Permission of info.php to (777)</br> " );

$text="
<?php
require_once('version_info.htm'); 
\$ver_info= \"enable\";
?>
";
fwrite( $fp, $text ) or die ( "ERROR: br><br><center><font color=\"red\"><b>Unable to change Info File <br> Please Change File Permission of info.php to (777)</br> " );
echo "<head>
<meta http-equiv=\"refresh\" content=\"1; URL=index.php\">
</head>

";
}



?>