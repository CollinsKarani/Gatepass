<?php 
require_once('auth.php');
require_once('connection.php');
require_once('top.htm');
// attech Calender
require_once('calendar/classes/tc_calendar.php');

echo'
<html>
<head>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>

<script type="text/javascript" src="disableEnter.js"></script>

<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="receipt.js"></script>
</head>
<body>
';
$gp_type = @$_GET['pid'] ;

// Set Gatepass Type
if ($gp_type == "onr"){
$gp_title = 'Outward Non Returnable Gatepass Report';
$gp_mt = 'ow_non_main';
$gp_st = 'ow_non_sub';
$report_prefix = 'OWN';
$gpset = 'ow' ;
$gp_date = 'off' ;
}
if ($gp_type == "or"){
$gp_title = 'Outward Returnable Gatepass Report';
$gp_mt = 'ow_ret_main';
$gp_st = 'ow_ret_sub';
$report_prefix = 'OWR';
$gp_date = 'on';
$gpset = 'ow' ;

}
if ($gp_type == "inr"){
$gp_title = 'Inward Non Returnable Gatepass Report';
$gp_mt = 'in_non_main';
$gp_st = 'in_non_sub';
$report_prefix = 'IWN';
$gp_date = 'off';
$gpset = 'iw';
}
if ($gp_type == "ir"){
$gp_title = 'Inward Returnable Gatepass Report';
$gp_mt = 'in_ret_main';
$gp_st = 'in_ret_sub';
$report_prefix = 'IWR';
$gp_date = 'on';
$gpset = 'iw';

}


// Set Gatepass Type
if ($gp_type == "ow_gp_non_ret"){
$gp_title = 'Outward Non Returnable Gatepass';
}
if ($gp_type == "ow_gp_ret"){
$gp_title = 'Outward Returnable Gatepass';
}
if ($gp_type == "in_gp_non_ret"){
$gp_title = 'Inward Non Returnable Gatepass';
}
if ($gp_type == "in_gp_ret"){
$gp_title = 'Inward Returnable Gatepass';
}

mysql_select_db($database_connection, $connection);
	$var = @$_GET['lp'];
  	$trimmed = trim($var) ;

if ( $trimmed == ''){exit();}
  $query = "Select * from `".$tbl."".$gp_mt."` where `gpno` like \"%".$trimmed."%\" Limit 2";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

if ($line == 0){
echo '<br>No record Found';
exit();
}


if ($line >= 2){
echo '<br><br>Too Many Record Found <br>Tip! Type Complete Gate Pass number';
exit();
}



 while ($row= mysql_fetch_array($result)) {

echo"<p> &nbsp; </p>
<form id=\"new_gp\" name=\"new_gp\" action=\"update_gp.php\" method=\"post\">
  </span><span>
  <span id=\"L07589E80118BD70B\" title=\"\" style=\"BORDER-RIGHT: #ffffff 1pt solid; PADDING-RIGHT: 0px; BORDER-TOP: #ffffff 1pt solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; BORDER-LEFT: #ffffff 1pt solid; WIDTH: 900px; PADDING-TOP: 0px; BORDER-BOTTOM: #ffffff 1pt solid; BACKGROUND-COLOR: transparent\">
  <p style=\"font-weight: 600; color: #517dbf; margin-top: 0px; margin-bottom: 0px\" align=\"center\">
  <font size=\"4\">
  <u>".$gp_title."</u></font></p>
<br>
<center>
  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"80%\" id=\"AutoNumber1\" height=\"10\" bordercolorlight=\"#D6D6D6\" bordercolordark=\"#C0C0C0\">
      <td width=\"20%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B4\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B5\" title=\"\" style=\"background-color: transparent\">
      <font size=\"2\">&nbsp;<font color=\"#000000\" face=\"Verdana\">Location:</font></font>
      <input type=\"text\" name=\"loc_show\" value=".$row['ms']." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\"   disabled>
      <input type=\"hidden\" name=\"ms\" value=".$row['ms']." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" >
      <input type=\"hidden\" name=\"main_id\" value=".$row['id']." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" >


</span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><font face=\"Verdana\" size=\"2\">Vehicle</font><span><span id=\"L07589E80118BD70B6\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B7\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B8\" title=\"\" style=\"background-color: transparent\"><font face=\"Verdana\" size=\"2\"> 
      #</font>
      <input type=\"text\" name=\"vehicle\" value=\"".$row['vehicle']."\" id=\"vehicle\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B9\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B10\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B11\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Gatepass #</font>
      <input type=\"text\" name=\"gp_show\" value=".$row['gpno']." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\"   disabled>
      <input type=\"hidden\" name=\"gp_no\" value=".$row['gpno']." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" ></span></span></span></span></td>
      
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B12\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B13\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B14\"  style=\"background-color: transparent\">
            <p align=\"right\"><font size=\"2\">Date</font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\"><b> : ";

$mydate=$row['date'];
$mydate=explode('-',$mydate);

$retdate=$row['return_date'];
if ( $retdate != ''){
$retdate=explode('-',$retdate);
}
  $myCalendar=new tc_calendar("date", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($mydate[2],$mydate[1], $mydate[0]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2020-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
echo"</span></span></span></span></td>
    </tr>
    <tr>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B15\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B16\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B17\" title=\"\" style=\"background-color: transparent\">";

echo"      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Vendor:</font>";

$query="SELECT * FROM `".$tbl."v`  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die(mysql_error());
echo'  <select size="1"  id="vendor"  name="sender">
<option value="">Select Vendor</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
if ($sup_row['name'] == $row['sender'] ){$sv = "selected";}else{$sv = "";}
echo'
<option value="'.$sup_row['name'].'" '.$sv.'>'.$sup_row['name'].'</option> ';
}
echo'</select>';


echo" </span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B18\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B19\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B20\" title=\"\" style=\"background-color: transparent\">";
 
if ( $gpset == "iw" ){

echo"     <font color=\"#000000\" face=\"Verdana\" size=\"2\">Department:</font>";

$query="SELECT * FROM `depart`  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die("Couldn't execute query");
echo'  <select size="1"  id="depart"  name="depart">
<option value="">Select Depart</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){

if ($sup_row['name'] == $row['depart'] ){$sv = "selected";}else{$sv = "";}
echo'
<option value="'.$sup_row['name'].'" '.$sv.'>'.$sup_row['name'].'</option> ';
}
echo'</select>';
}
if ( $gpset == "ow" ){

echo"     <font color=\"#000000\" face=\"Verdana\" size=\"2\">Destination:</font>";
echo"  <input type=\"text\" name=\"depart\" value=\"".$row['depart']."\" id=\"depart\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   >";

}

echo"</span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\">";


if ( $gpset == "iw" ){
echo"      <font color=\"#000000\" face=\"Verdana\" size=\"2\">User:</font>";
}
if ( $gpset == "ow" ){
echo"      <font color=\"#000000\" face=\"Verdana\" size=\"2\">User Responsible:</font>";
}
echo"<input type=\"text\" name=\"approved\" id=\"approved\" value=\"".$row['approved']."\" size=\"11\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B26\" title=\"HH:MM\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Time:</font>
<input type=\"text\" value=\"".$row['time']."\" name=\"showtime\" disabled size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   >
<input type=\"hidden\" value=\"".$row['time']."\" name=\"time\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   >

</span></span></span></span></td>
    </tr>

<tr>     
    <td width=\"40%\" colspan=\"2\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B4\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B5\" title=\"\" style=\"background-color: transparent\">
      <font size=\"2\">
Address : <input type=\"text\" value=\"".$row['address']."\" name=\"address\" size=\"53\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" >
<font color=\"#000000\" face=\"Verdana\"></font></font>
      </span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B9\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B10\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B11\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">
PO # <input type=\"text\"  name=\"po_no\" value=\"".$row['po_no']."\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" >
</font>
      </span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B12\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B13\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B14\"  style=\"background-color: transparent\">
  <p align=\"right\"><font size=\"2\">
<p align=\"right\"><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\"><b> &nbsp; ";
if ($gp_date == "on"){ echo "
   
          </b> <font size=\"2\"> Due Date</font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\"><b> : ";
  $myCalendar=new tc_calendar("return_date", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($retdate[2],$retdate[1], $retdate[0]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2020-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
}
echo"     </span></span></span></span></td>
    </tr>";









$gp_no=$row['gpno'];

  $s_query = "Select * from `".$tbl."".$gp_st."` where `gpno` like \"".$gp_no."\" ";
  $s_result = mysql_query($s_query) or die(mysql_error());
$sno=0;

echo "   
    </table><center>
  <p style=\"MARGIN-TOP: 0px; FONT-WEIGHT: normal; MARGIN-BOTTOM: 0px; COLOR: #517dbf\" align=\"left\">&nbsp;</p>
  <table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 90%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"10\">
    <tbody vAlign=\"top\">
      <tr>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"52\">
        <font size=\"1\">S. No</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"383\">
        <font size=\"1\">Item Description</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"95\">
        <font size=\"1\">QTY</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"198\">
        <font size=\"1\">Unit</font></td>
        </font>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"159\">
        <font size=\"1\">Product</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"298\">
        <span>
        <span id=\"L07589E80118BD70B32\" title=\"\" style=\"background-color: transparent\">
        <font size=\"1\">Remarks</font></span></span></td>";

if ($gp_date == "remove"){ echo "
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"159\">
  </font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">";
echo'        <font size="1">
Due Date
</td></span>
      ';
}
echo"
      </tr>
    <tbody vAlign=\"top\">";

 while ($s_row= mysql_fetch_array($s_result)) {
$return = '';

if ($s_row['status'] == 'Returned'){$check_1 = 'selected'; $return = $s_row['ret_date'];}
if ($s_row['status'] != 'Returned'){$check_1 = '';}
$sno=$sno+1;


echo"
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input disabled name=\"sn_".$sno."\" size=\"1\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'    value=\"".$sno."\"></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_".$sno."\" value=\"".$s_row['item']."\"   size=\"75\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   >
        <input name=\"sub_id_".$sno."\" value=\"".$s_row['id']."\"   size=\"75\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='hidden'   >
</span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_".$sno."\" value=\"".$s_row['qty']."\" size=\"5\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">";

$query="SELECT * FROM `".$tbl."unit`  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die("Couldn't execute query");
echo'  <select size="1"  id="inv_cust"  name="unit_'.$sno.'">
<option value=""></option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
if ( $sup_row['name'] == $s_row['unit']){$sl = 'Selected';}else{$sl='';}
echo'
<option value="'.$sup_row['name'].'" '.$sl.' >'.$sup_row['name'].'</option> ';
}
echo"</select>
</span></span></span></span></span></span></td>

        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_".$sno."\" value=\"".$s_row['price']."\" size=\"10\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_".$sno."\" size=\"10\" value=\"".$s_row['remarks']."\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></span></span></span></td>
        </span>
      ";


        

if ($gp_date == "ssson"){ echo "
   <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
  </font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">   
<input name=\"due_date_".$sno."\" id=\"due_date_".$sno."\" value='' size=\"10\" style=\"border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></span></span></span></td>
        </span>
      </td></span>
      ";
}

echo'</tr>';

}
echo"
    <tbody vAlign=\"top\">
  </table>
  <div>
    <p align=\"center\">
  </div>
  
  <input type=\"hidden\" id=\"mt\" name=\"mt\" value=\"".$gp_mt."\" />
  <input type=\"hidden\" id=\"st\" name=\"st\" value=\"".$gp_st."\" />
  <input type=\"hidden\" id=\"action\" name=\"action\" value=\"submitform\" />
  <p align=\"left\"><input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Save\" onmouseover=\"Javascript:check()\"/>
</p>
  <center>
  <p></p>
  </center>
</form>
<form>
</form>
</span></span>

</body>

</html>
";

}
?>