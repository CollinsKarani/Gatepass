<?php 

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
//##    Forum		: http://ayaz.comuv.com												#
//##																					#
//#######################################################################################

require_once('connection.php');
require_once('top.htm');
require_once('auth.php');

mysql_select_db($database_connection, $connection);

// get posted data
//----------------------------------------
	$var = @$_GET['q'] ;
  	$trimmed = trim($var) ;
  	$gp_type = @$_GET['gp_type'] ;
  	$id_sh = @$_GET['id_sh'] ;
  	
  
if ($trimmed == NULL) { Print "Please select from sub menu"; }
if ($trimmed != NULL) { 
  
$limit="1";

// Select Type of Gatepass
if ( $gp_type == "in_gp_non_ret" ){
$tital= "Inward Non Returnable Gatepass";
$query = "select * from in_gp_non_ret  where gpno like \"%$trimmed%\"  
  order by id"; }

if ( $gp_type == "in_gp_ret" ){
$tital= "Inward Returnable Gatepass";
$query = "select * from in_gp_ret  where gpno like \"%$trimmed%\"  
  order by id"; }
 
if ( $gp_type == "ow_gp_non_ret" ){
$tital= "Outward Non Returnable Gatepass";
$query = "select * from ow_gp_non_ret  where gpno like \"%$trimmed%\"  
  order by id"; }

if ( $gp_type == "ow_gp_ret" ){
$tital= "Outward Returnable Gatepass";
$query = "select * from ow_gp_ret  where gpno like \"%$trimmed%\"  
  order by id"; }

  
  $s=0;
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die("error is here");

 while ($row= mysql_fetch_array($result)) {

$confirm1= rand(1, 2);
$confirm2= rand(0, 2);
$confirm3= rand(0, 2);
$con_code= $confirm1 + $confirm2 + $confirm3;

Print "<html>
<head>
<meta http-equiv=\"Content-Language\" content=\"en-us\">
<meta name=\"GENERATOR\" content=\"Microsoft FrontPage 5.0\">
<meta name=\"ProgId\" content=\"FrontPage.Editor.Document\">
</head>

<body>
<form id=\"contact\" name=\"contact\" action=\"save_edit.php\" method=\"post\">
  </span><span>
  <span id=\"L07589E80118BD70B\" title=\"\" style=\"BORDER-RIGHT: #ffffff 1pt solid; PADDING-RIGHT: 0px; BORDER-TOP: #ffffff 1pt solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; BORDER-LEFT: #ffffff 1pt solid; WIDTH: 900px; PADDING-TOP: 0px; BORDER-BOTTOM: #ffffff 1pt solid; BACKGROUND-COLOR: transparent\">
  <p style=\"font-weight: 700; color: #517dbf; margin-top: 0px; margin-bottom: 0px\" align=\"center\">
  <font size=\"4\">
  <u>".$tital."</u></font></p>
<br><br>
  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"900\" id=\"AutoNumber1\" height=\"10\" bordercolorlight=\"#D6D6D6\" bordercolordark=\"#C0C0C0\">
    <tr>
      <td width=\"25%\"><span>
      <span id=\"L07589E80118BD70B65\" title=\"\" style=\"background-color: transparent\">
      <p align=\"right\">
      <span id=\"L07589E80118BD70B62\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B63\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B64\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\"></font></span></span></span><span id=\"L07589E80118BD70B59\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B60\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B61\" title=\"\" style=\"background-color: transparent\">
     </span></span></span></span></span></td>
      <td width=\"25%\">
		</span></span></span></td>
    </tr>
    <tr>
      <td width=\"20%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B4\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B5\" title=\"\" style=\"background-color: transparent\">
      <font size=\"2\">&nbsp;<font color=\"#000000\" face=\"Verdana\"> M/S :</font></font>
      <input type=\"text\" name=\"ms\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"2\" value=\"".$row['ms']."\"  ></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><font face=\"Verdana\" size=\"2\">Vehicle</font><span><span id=\"L07589E80118BD70B6\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B7\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B8\" title=\"\" style=\"background-color: transparent\"><font face=\"Verdana\" size=\"2\"> 
      #</font>
      <input type=\"text\" name=\"vehicle\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"3\"value=\"".$row['vehicle']."\"  ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B9\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B10\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B11\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Gatepass #</font>
      <input type=\"text\" name=\"gp_no\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"4\"value=\"".$row['gpno']."\" ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B12\" title=\"YYMMDD\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B13\" title=\"YYMMDD\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B14\"  style=\"background-color: transparent\">
            <p align=\"right\"><font size=\"2\">Date: </font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"YYMMDD\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">:</font>
      <!--webbot bot=\"Validation\" s-data-type=\"Number\" s-number-separators=\",.\" b-value-required=\"TRUE\" i-minimum-length=\"6\" i-maximum-length=\"6\" --><input type=\"text\" name=\"date\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"4\" maxlength=\"6\"value=\"".$row['date']."\" ></span></span></span></span></td>
    </tr>
    <tr>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B15\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B16\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B17\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Sender:</font>
      <input type=\"text\" name=\"sender\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"6\"value=\"".$row['sender']."\" ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B18\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B19\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B20\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Department:</font>
      <input type=\"text\" name=\"depart\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"7\"value=\"".$row['depart']."\" ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><font face=\"Verdana\" size=\"2\">Approved By</font><span><span id=\"L07589E80118BD70B21\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B22\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B23\" title=\"\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">:</font>
      <input type=\"text\" name=\"approved\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"8\"value=\"".$row['approved']."\" ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B24\" title=\"HHMMSS\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B25\" title=\"HHMMSS\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B26\" title=\"HHMMSS\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Time:</font>
      <!--webbot bot=\"Validation\" s-data-type=\"Number\" s-number-separators=\",.\" b-value-required=\"TRUE\" i-minimum-length=\"6\" i-maximum-length=\"6\" s-validation-constraint=\"Greater than\" s-validation-value=\"000000\" s-validation-constraint=\"Less than\" s-validation-value=\"235959\" --><input type=\"text\" name=\"time\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" tabindex=\"8\" value=\"".$row['time']."\" ></span></span></span></span></td>
    </tr>
  </table>
  <p style=\"MARGIN-TOP: 0px; FONT-WEIGHT: normal; MARGIN-BOTTOM: 0px; COLOR: #517dbf\" align=\"left\">&nbsp;</p>
  <table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"10\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
    <tbody vAlign=\"top\"> 
      <tr>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"52\">
        <font size=\"1\">S. No</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"383\">
        <font size=\"1\">Item Description</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"45\">
        <font size=\"1\">QTY</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"198\">
        <font size=\"1\">Unit</font></td>
        </font>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"159\">
        <font size=\"1\">Price</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"298\">
        <span>
        <span id=\"L07589E80118BD70B32\" title=\"\" style=\"background-color: transparent\">
        <font size=\"1\">Remarks</font></span></span></td>
      </tr>
    <tbody vAlign=\"top\">
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_1\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"10\"value=\"".$row['sno1']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_1\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"11\"value=\"".$row['item1']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_1\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"12\"value=\"".$row['qty1']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_1\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"13\"value=\"".$row['unit1']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_1\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"14\"value=\"".$row['price1']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_1\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"15\"value=\"".$row['remarks1']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr> ";
      

echo  "  
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_2\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno2']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_2\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item2']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_2\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty2']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_2\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit2']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_2\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price2']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_2\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks2']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr> ";
echo   "          <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_3\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno3']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_3\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item3']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_3\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty3']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_3\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit3']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_3\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price3']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_3\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks3']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>
";
echo   "    
    <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_4\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno4']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_4\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item4']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_4\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty4']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_4\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit4']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_4\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price4']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_4\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks4']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>
      
";
echo   "    
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_5\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno5']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_5\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item5']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_5\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty5']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_5\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit5']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_5\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price5']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_5\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks5']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>
      
";
echo   "    
          <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_6\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno6']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_6\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item6']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_6\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty6']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_6\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit6']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_6\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price6']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_6\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks6']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>
      
";
echo   "    
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_7\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno7']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_7\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item7']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_7\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty7']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_7\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit7']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_7\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price7']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_7\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks7']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>   
      
";
echo   "    
         <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_8\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno8']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_8\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item8']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_8\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty8']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_8\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit8']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_8\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price8']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_8\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks8']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>    
      
";
echo   "    
        <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_9\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno9']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_9\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item9']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_9\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty9']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_9\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit9']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_9\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price9']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_9\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks9']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>  
      
";
echo   "    
          <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"2\">
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        <input name=\"sn_10\" size=\"3\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['sno0']."\" ></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"333\">
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_10\" size=\"55\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['item0']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\">
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_10\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['qty0']."\" ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\">
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">
        <input name=\"unit_10\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['unit0']."\" ></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\">
        <span>
        <span id=\"L07589E80118BD70B46\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B47\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B48\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B49\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B50\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B51\" title=\"\" style=\"background-color: transparent\">
        <input name=\"dept_gp_10\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['price0']."\" ></span></span></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\">
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B53\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B54\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B55\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B56\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B57\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B58\" title=\"\" style=\"background-color: transparent\">
        <input name=\"remarks_10\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" tabindex=\"16\"value=\"".$row['remarks0']."\" ></span></span></span></span></span></span></span></span></td>
        </span>
      </tr>
    
";
echo   "      
    <tbody vAlign=\"top\">
  </table>
  <div>
    <p align=\"center\">
  </div>
  
Code : ".$confirm3."".$confirm2."".$confirm1."  
<input name=\"confirm_code\" size=\"15\" style=\"float: left; border: 1px solid blue; padding: 0\" tabindex=\"16\" ></span> 
<input type=\"hidden\" id=\"action\" name=\"con_code\" value=\"".$con_code."\" />
 <input type=\"hidden\" id=\"action\" name=\"gp_type\" value=\"".$gp_type."\" />
  <input type=\"hidden\" id=\"action\" name=\"id_sh\" value=\"".$id_sh."\" />
  <input type=\"hidden\" id=\"action\" name=\"action\" value=\"submitform\" />
  <p align=\"left\"><input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Save\" />
    
  <p align=\"left\">
</p>
  <center>
  <p></p>
  </center>
</form>
</span></span>

</body>

</html>

";

}
}
?>