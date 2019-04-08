<?php 
$version="2";
require_once('connection.php');
mysql_select_db($database_connection, $connection);
$sid=@$_GET['sid'];

if ( $sid == '' ){
echo'
<p align="left">
<b><u>
  <font face="verdana,Arial Unicode MS,Bookman Old Style,Arial" color="#031487" size="2">
Database Backup / Restore</fonts></u></b>
<ul>
  <p align="left">
  <font face="verdana,Arial Unicode MS,Bookman Old Style,Arial" color="#031487" size="2">
<li>
  <a href="?pid=bak&sid=bakup" style="text-decoration: none">
  <font color="#111111"><b>Download</b></font></a></font></b></li><br><br>
<li>
  <a href="?pid=bak&sid=res" style="text-decoration: none">
  <font color="#111111"><b>Upload</b></font></a></font></b></li>
<br>
</ul> 
';

}


if ( $sid == 'res' ){


echo'
<form enctype="multipart/form-data" action="?pid=bak&sid=confi" method="POST">

<font face="Verdana" size="2" color="red"><i><b>Warning! </b> Restoration will overwrite your current database. 
</i> </font><br>
<font face="Verdana" size="2">Select Database backup File : </font>

<input type="file" name="arch" size="20">

<br>
<input type="submit" value=" Restore " >

</form>
';
//  $file = fopen("backup20070303.sql","w");
//  $line_count = load_backup_sql($file,$database_connection);
//  fclose($file);
//  echo "lines read: ".$line_count;
}

if ( $sid == 'confi' ){

$start_time = time();

// Getting Temp Backup before restoration
$backupFile = 'doc/cms.sql'; 

 
 $ccyymmdd = date("Ymd");
  $file = fopen($backupFile, 'w'); 
  $line_count = create_backup_sql($file,$database_connection);
  fclose($file);






// increase script timeout value
ini_set("max_execution_time", 300);
// create object
$zip = new ZipArchive();
// open archive
$zip_file = "restore_".$version."_".date('Y-m-d',time())."_.zip";
if ($zip->open($zip_file, ZIPARCHIVE::CREATE) !== TRUE) {
die ("Could not open archive");
}
// initialize an iterator
// pass it the directory to be processed
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("doc/"));
// iterate over the directory
// add each file found to the archive
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
// close and save archive
$zip->close();




// Uploading  and Unzip File
//--------------------------------

$path = "gpms_db/";

$file_path = $path . 'restore_db.zip'; 
if(move_uploaded_file($_FILES['arch']['tmp_name'], $file_path)) {
   } else{ echo "Error uploading";
}

unzip($file_path);


// Reading Text File
//----------------------
set_time_limit(0);

$myFile = 'gpms_db\cms.sql';
$n = 1;
$fh = fopen($myFile, 'r');
$data = fread($fh, filesize($myFile));
$lines = COUNT(FILE($myFile));
fclose($fh);

$data=explode('#$',$data);
while($n<$lines)
{


 $result = mysql_query($data[$n]) or die(mysql_error());


$n=$n + 1;
usleep(20000);
}

SureRemoveDir('gpms_db', false);

$end_time = time();

$total_time = $end_time - $start_time;
Echo' <br><br> <font color="Green"><i><b>Info !</b> </i> Database Successfully Restored in <b>'.$total_time.'</b> Seconds';

}



if ( $sid == 'bakup' ){


SureRemoveDir('gpms_db_zip', false);

$backupFile = 'gpms_db/cms.sql'; 

 
 $ccyymmdd = date("Ymd");
  $file = fopen($backupFile, 'w'); 
  $line_count = create_backup_sql($file,$database_connection);
  fclose($file);






// increase script timeout value
ini_set("max_execution_time", 300);
// create object
$zip = new ZipArchive();
// open archive
$zip_file = "gpms_db_zip/gpms_".$version."_".date('Y-m-d',time())."_.zip";
if ($zip->open($zip_file, ZIPARCHIVE::CREATE) !== TRUE) {
die ("Could not open archive");
}
// initialize an iterator
// pass it the directory to be processed
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("gpms_db/"));
// iterate over the directory
// add each file found to the archive
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
// close and save archive
$zip->close();
echo '
<head>
<meta http-equiv="refresh" content="5; URL= '.$zip_file.'">
<script type="text/javascript">
	 function loaded(){	
document.getElementById(\'wait\').style.display =\'none\';
document.getElementById(\'load\').style.display =\'\';
	 }
</script>


</head>
<body onload="Javascript: setTimeout(\'loaded()\',6000);">
<br>
<p id="wait">
<u>PLEASE WAIT...</u>
<br><i>Creating Backup file </i> </p>
<p id="load" style="display:none">
<br><br>
<a href="'.$zip_file.'" ><font color="black">Click Here if your download does not start automatically. </a>

</p>
';


SureRemoveDir('gpms_db', false);

}















// FUnctions
//---------------------------------------------------------------------------------------------------------------------

  function load_backup_sql($file,$database_connection) {
    $line_count = 0;
    $db_connection = db_connect();
    mysql_select_db (db_name($database_connection)) or exit();
    $line_count = 0;
    while (!feof($file)) {
      $query = NULL;
      while (!feof($file)) {
        $query .= fgets($file);
      }
      if (NULL != $query) {
        $line_count++;
        mysql_query($query) or die("sql not successful: ".mysql_error()." query: ".$query);
      }
    }  
    return $line_count;
  }


function SureRemoveDir($dir, $DeleteMe) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj=='.' || $obj=='..') continue;
        if (!@@unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
    }

    closedir($dh);
    if ($DeleteMe){
        @rmdir($dir);
    }
}


  function create_backup_sql($file,$database_connection) {
    $line_count = 0;
    $db_connection = db_connect();
    mysql_select_db (db_name($database_connection)) or exit();
    
$sql = "SHOW TABLES FROM $database_connection";
	$tables = mysql_query($sql);

    $sql_string = NULL;
    while ($table = mysql_fetch_array($tables)) {   
      $table_name = $table[0];
if ($table_name != "admin"){ 
     $sql_string = "#$
DELETE FROM `$table_name` ;";
      $table_query = mysql_query("SELECT * FROM `$table_name`");
      $num_fields = mysql_num_fields($table_query);
      while ($fetch_row = mysql_fetch_array($table_query)) {
        $sql_string .= "#$
INSERT INTO `$table_name` VALUES(";
        $first = TRUE;
        for ($field_count=1;$field_count<=$num_fields;$field_count++){
          if (TRUE == $first) {
            $sql_string .= "'".mysql_real_escape_string($fetch_row[($field_count - 1)])."'";
            $first = FALSE;            
          } else {
            $sql_string .= ", '".mysql_real_escape_string($fetch_row[($field_count - 1)])."'";
          }
        }
        $sql_string .= ");";
        if ($sql_string != ""){
          $line_count = write_backup_sql($file,$sql_string,$line_count);        
        }
        $sql_string = NULL;
      }  
}  
    }
    return $line_count;
  }


  function write_backup_sql($file, $string_in, $line_count) { 
    fwrite($file, $string_in);
    return ++$line_count;
  }
  
  function db_name($database_connection) {
      return ($database_connection);
  }
  
  function db_connect() {
    $db_connection = mysql_connect(DB_HOST,DB_USER, DB_PASSWORD);
    return $db_connection;
  }  




function unzip($file){

    $zip=zip_open(realpath(".")."/".$file);
    if(!$zip) {return("Unable to proccess file '{$file}'");}

    $e='';

    while($zip_entry=zip_read($zip)) {
       $zdir=dirname(zip_entry_name($zip_entry));
       $zname=zip_entry_name($zip_entry);

       if(!zip_entry_open($zip,$zip_entry,"r")) {$e.="Unable to proccess file '{$zname}'";continue;}
       if(!is_dir($zdir)) mkdirr($zdir,0777);

       #print "{$zdir} | {$zname} \n";

       $zip_fs=zip_entry_filesize($zip_entry);
       if(empty($zip_fs)) continue;

       $zz=zip_entry_read($zip_entry,$zip_fs);

       $z=fopen($zname,"w");
       fwrite($z,$zz);
       fclose($z);
       zip_entry_close($zip_entry);

    } 
    zip_close($zip);

    return($e);
} 

function mkdirr($pn,$mode=null) {

  if(is_dir($pn)||empty($pn)) return true;
  $pn=str_replace(array('/', ''),DIRECTORY_SEPARATOR,$pn);

  if(is_file($pn)) {trigger_error('mkdirr() File exists', E_USER_WARNING);return false;}

  $next_pathname=substr($pn,0,strrpos($pn,DIRECTORY_SEPARATOR));
  if(mkdirr($next_pathname,$mode)) {if(!file_exists($pn)) {return mkdir($pn,$mode);} }
  return false;
}

?>