<?php 
require_once('connection.php');
require_once('auth.php');
require_once('top.htm');

mysql_select_db($database_connection, $connection);
$gp_type = @$_GET['pid'] ;

if ($gp_type == NULL){
echo "Please make selection from sub menu";
exit();
}

// Set Gatepass Type
if ($gp_type == "onr"){
$gp_title = "Outward Non Returnable Gatepass Form";
$gp_mt = "ow_non_main";
$gp_st = "ow_non_sub";
$report_prefix = 'OWN';
$gpset = "ow" ;
$gp_date = "off" ;
}
if ($gp_type == "or"){
$gp_title = "Outward Returnable Gatepass Form";
$gp_mt = "ow_ret_main";
$gp_st = "ow_ret_sub";
$report_prefix = 'OWR';
$gp_date = "on" ;
$gpset = "ow" ;

}
if ($gp_type == "inr"){
$gp_title = "Inward Non Returnable Gatepass Form";
$gp_mt = "in_non_main";
$gp_st = "in_non_sub";
$report_prefix = 'IWN';
$gp_date = "off" ;
$gpset = "iw" ;
}
if ($gp_type == "ir"){
$gp_title = "Inward Returnable Gatepass Form";
$gp_mt = "in_ret_main";
$gp_st = "in_ret_sub";
$report_prefix = 'IWR';
$gp_date = "on";
$gpset = "iw" ;

}




// Get GP No

$pre_invoice_query="SELECT * FROM `".$tbl."gp_no`  Where `user_id`= '".$_SESSION['GPMA_key']."' ORDER BY `gp_no` DESC LIMIT 1"; 
$pre_invoice_result=mysql_query($pre_invoice_query) or die(mysql_error());
while ($pre_invoice_row=mysql_fetch_array($pre_invoice_result)){ 
	$old_gpno=$pre_invoice_row['gp_no']; 
}
if (!isset($old_gpno)){$old_gpno = '00-00';}
$old_invoice=explode('-',$old_gpno);
$new_po=$old_invoice['1'] + 1;
if ($new_po <= 9 ){$new_po='000'.$new_po;}
if ($new_po <= 99 && $new_po >= 10 ){$new_po='00'.$new_po;}
if ($new_po <= 999 && $new_po >= 1000 ){$new_po='0'.$new_po;}

$po_prefix=$_SESSION['GPMA_MEMBER_ID'];


$invoice_date=date('Y/m',time() );
$gp_no='GP'.@$po_prefix.'/'.$invoice_date.'-'.$new_po;

// Get Time Zone
$adjust_clock='';
$clock_query = "SELECT * FROM `".$tbl."reg` WHERE `key` like \"clock\" AND `user_id`= '".$_SESSION['GPMA_key']."' ";
$clock_result=mysql_query($clock_query) or die(mysql_error());
while($clock_row=mysql_fetch_array($clock_result)){
$adjust_clock=$clock_row['value'];
}
if($adjust_clock==''){
$add_clock_query = "INSERT INTO `".$tbl."reg` (`key`,`value`,`user_id`) VALUES(\"clock\",0,\"".$_SESSION['GPMA_key']."\" )   ";
$add_clock_result=mysql_query($add_clock_query) or die(mysql_error());

}


// attech Calender
require_once('calendar/classes/tc_calendar.php');


//--------------------------
// Create Gatepass Form
//--------------------------
echo"
<html>
<head>
<meta http-equiv=\"Content-Language\" content=\"en-us\">
<meta name=\"GENERATOR\" content=\"Microsoft FrontPage 5.0\">
<meta name=\"ProgId\" content=\"FrontPage.Editor.Document\">

    <style type=\"text/css\" xml:space=\"preserve\">
BODY, P,TD{ font-family: Arial,Verdana,Helvetica, sans-serif; font-size: 10pt }
A{font-family: Arial,Verdana,Helvetica, sans-serif;}
 {	font-family : verdena, Arial, Helvetica, sans-serif;	font-size : 12px;	font-weight : bold;}
.error_strings{ font-family:Verdana; font-size:14px; color:#aa0000;}
</style>


<script type=\"text/javascript\" src=\"disableEnter.js\"></script>
<script type=\"text/javascript\" src=\"jquery-1.2.1.pack.js\"></script>

<script type=\"text/javascript\" src=\"new_gp.js\"></script>
<script language=\"javascript\" src=\"calendar/calendar.js\"></script>
<script language=\"JavaScript\" src=\"gen_validatorv4.js\" type=\"text/javascript\" xml:space=\"preserve\"></script>

<script type=\"text/javascript\">


   function formfocus() {
      document.getElementById('vehicle').focus();

   }
   window.onload = formfocus;


</script>


</head>
<body >

<form enctype=\"multipart/form-data\" id=\"new_gp\" name=\"new_gp\" action=\"save_gp.php\" method=\"post\">
  </span><span>
  <span id=\"L07589E80118BD70B\" title=\"\" style=\"BORDER-RIGHT: #ffffff 1pt solid; PADDING-RIGHT: 0px; BORDER-TOP: #ffffff 1pt solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; BORDER-LEFT: #ffffff 1pt solid; WIDTH: 90%; PADDING-TOP: 0px; BORDER-BOTTOM: #ffffff 1pt solid; BACKGROUND-COLOR: transparent\">
  <p style=\"font-weight: 600; color: #517dbf; margin-top: 0px; margin-bottom: 0px\" align=\"center\">
  <font size=\"4\">
  <u>".$gp_title."</u></font></p>
<br><center>
  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"90%\" id=\"AutoNumber1\" height=\"10\" bordercolorlight=\"#D6D6D6\" bordercolordark=\"#C0C0C0\">
      <td width=\"20%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B4\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B5\" title=\"\" style=\"background-color: transparent\">
      <font size=\"2\">&nbsp;<font color=\"#000000\" face=\"Verdana\">MS:</font></font>";


$query="SELECT * FROM `".$tbl."v` WHERE `user_id`= '".$_SESSION['GPMA_key']."'  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die(mysql_error());
echo'  <select size="1"  id="ms"  name="ms">
<option value="">Please Select</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo"</select>


</span></span></span></td>
      <td width=\"25%\">
           
      <p align=\"right\"><font face=\"Verdana\" size=\"2\">Vehicle</font><span><span id=\"L07589E80118BD70B6\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B7\" title=\"\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B8\" title=\"\" style=\"background-color: transparent\"><font face=\"Verdana\" size=\"2\"> 
      #</font>
      <input type=\"text\" name=\"vehicle\" id=\"vehicle\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B9\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B10\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B11\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Gatepass #</font>
      <input type=\"text\" name=\"gp_show\" value=".$gp_no." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\"   disabled>
      <input type=\"hidden\" name=\"gp_no\" value=".$gp_no." size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" ></span></span></span></span></td>
      
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B12\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B13\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B14\"  style=\"background-color: transparent\">
            <p align=\"right\"><font size=\"2\">Date</font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\"><b> : ";
$mydate=date('d-m-Y',time()+$adjust_clock);
$mydate=explode('-',$mydate);
  $myCalendar=new tc_calendar("date", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($mydate[0],$mydate[1], $mydate[2]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2020-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
echo"</span></span></span></span></td>
    </tr>
    <tr>
      <td width=\"25%\">
      <p align=\"right\">
	  ";



echo"
<font color=\"#000000\" face=\"Verdana\" size=\"2\">Department:</font>
 </span></span></span></span>

 ";
 
echo" &nbsp;     ";

$query="SELECT * FROM `".$tbl."depart` WHERE `user_id`= '".$_SESSION['GPMA_key']."' ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die(mysql_error());
echo'  <select size="1"  id="depart"  name="depart">
<option value="">Select Depart</option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo'</select>';


echo"</span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\">";


if ( $gpset == "iw" ){
echo"      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Recevied By:</font>";
}
if ( $gpset == "ow" ){
echo"      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Sender:</font>";
}
echo"<input type=\"text\" name=\"sender\" id=\"sender\" size=\"11\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></td>
      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B26\" title=\"HH:MM\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">Time:</font>
<input type=\"text\" value=\"".date('H:i',time()+$adjust_clock)."\" name=\"showtime\"  size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   >
<input type=\"hidden\" value=\"".date('H:i',time()+$adjust_clock)."\" name=\"time\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" style=\"text-transform: uppercase\" type='text'   >

</span></span></span></span></td>
    </tr>

<tr>     
    <td >
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B4\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B5\" title=\"\" style=\"background-color: transparent\">
      <font size=\"2\">
 &nbsp;  &nbsp; Approved By : <input type=\"text\"  id=\"approved\" name=\"approved\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" >
<font color=\"#000000\" face=\"Verdana\"></font></font>
      </span></span></span></td>

	  <td>       <p align=\"right\"> <font color=\"#000000\" face=\"Verdana\"> <input type=hidden name=p_cat value=\"\" >

</td>

      <td width=\"25%\">
      <p align=\"right\"><span>
      <span id=\"L07589E80118BD70B9\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B10\" title=\"\" style=\"background-color: transparent\">
      <span id=\"L07589E80118BD70B11\" title=\"\" style=\"background-color: transparent\">
      <font color=\"#000000\" face=\"Verdana\" size=\"2\">
PO # <input type=\"text\"  name=\"po_no\" size=\"15\" style=\"border: 1px solid #517DBF; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\" >
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
   
          </b> <font size=\"2\"> Return Date</font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\"><b> : ";
  $myCalendar=new tc_calendar("return_date", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($mydate[0],$mydate[1], $mydate[2]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2020);
	  $myCalendar->dateAllow('2008-05-13', '2020-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
}
echo"     </span></span></span></span></td>
    </tr>";




echo "   
    </table><center>
  <p style=\"MARGIN-TOP: 0px; FONT-WEIGHT: normal; MARGIN-BOTTOM: 0px; COLOR: #517dbf\" align=\"left\">&nbsp;</p>
  <table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 80%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"10\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"30\"><col style=\"WIDTH: 480px\" width=\"480\">
      <col style=\"WIDTH: 70px\" width=\"70\"><col style=\"WIDTH: 100px\" width=\"100\">
      <col style=\"WIDTH: 140px\" width=\"140\"><col style=\"WIDTH: 100px\" width=\"100\">
<col style=\"WIDTH: 100px\" width=\"100\">
    </colgroup>
    <tbody vAlign=\"top\">
      <tr>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
        <font size=\"1\">S. No</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
        <font size=\"1\">Item Description</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
        <font size=\"1\">QTY</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
        <font size=\"1\">Unit</font></td>
        </font>
        
		
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
        <span>
        <span id=\"L07589E80118BD70B32\" title=\"\" style=\"background-color: transparent\">
        <font size=\"1\">Remarks</font></span></span></td>";

if ($gp_date == "remove"){ echo "
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" >
  </font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">";
echo'        <font size="1">
Due Date
</td></span>
      ';
}
echo"
      </tr>
    <tbody vAlign=\"top\">";
$sno=0;
while ($sno < 10){
$sno=$sno+1;

echo"
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" >
        <p style=\"text-align: center\"><span>
        <span id=\"L07589E80118BD70B29\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B30\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B31\" title=\"\" style=\"background-color: transparent\">
        ".$sno."</span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" >
        <span>
        <span id=\"L07589E80118BD70B33\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B34\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B35\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B36\" title=\"\" style=\"background-color: transparent\">
        <input name=\"item_".$sno."\"   id=\"item_".$sno."\"   size=\"75\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" >
        <span>
        <span id=\"L07589E80118BD70B37\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B38\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B39\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B40\" title=\"\" style=\"background-color: transparent\">
        <input name=\"qty_".$sno."\" id=\"qty_".$sno."\" size=\"5\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" >
        <span>
        <span id=\"L07589E80118BD70B41\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B42\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B43\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B44\" title=\"\" style=\"background-color: transparent\">
        <span id=\"L07589E80118BD70B45\" title=\"\" style=\"background-color: transparent\">";

$query="SELECT * FROM `".$tbl."unit` WHERE `user_id`= '".$_SESSION['GPMA_key']."'  ORDER BY `name` ASC"; 
$customer_result=mysql_query($query) or die("Couldn't execute query");
echo'  <select size="1"  id="inv_cust"  name="unit_'.$sno.'">
<option value=""></option> ';

while ($sup_row=mysql_fetch_array($customer_result)){
echo'
<option value="'.$sup_row['name'].'">'.$sup_row['name'].'</option> ';
}
echo"</select>
		<input name=\"dept_gp_".$sno."\" id=\"dept_gp_".$sno."\" size=\"10\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='hidden'   >

</span></span></span></span></span></span></td>

        
		<td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF\" >
        <input name=\"remarks_".$sno."\" size=\"15\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></span></span></span></td>
        </span>
      ";


        

if ($gp_date == "ssson"){ echo "
   <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF\" >
        <p align=\"center\"><span>
        <span id=\"L07589E80118BD70B52\" title=\"\" style=\"background-color: transparent\">
  </font><span><span id=\"L07589E80118BD70B27\" style=\"background-color: transparent\"><span id=\"L07589E80118BD70B28\" title=\"DD/MM/YYYY\" style=\"background-color: transparent\"><font color=\"#000000\" face=\"Verdana\" size=\"2\">   
<input name=\"due_date_".$sno."\" id=\"due_date_".$sno."\" value='' size=\"10\" style=\"float: left; border: 0px solid #FFFFFF; padding: 0\" style=\"text-transform: uppercase\" type='text'   ></span></span></span></span></span></span></span></span></td>
        </span>
      </td></span>
      ";
}

echo'</tr>';

}
echo"
    <tbody vAlign=\"top\">
  </table>
  
  <input type=\"hidden\" id=\"my\" name=\"my_gp_type\" value=\"".$gp_type."\" />
  <input type=\"hidden\" id=\"mt\" name=\"mt\" value=\"".$gp_mt."\" />
  <input type=\"hidden\" id=\"st\" name=\"st\" value=\"".$gp_st."\" />
  <input type=\"hidden\" id=\"action\" name=\"action\" value=\"submitform\" />





</center>
            <div id=\"new_gp_errorloc\" class=\"error_strings\"> </div>

	
  <p align=\"center\">
  		<input type=\"file\" name=\"attach_1\" size=\"20\">  
<input type=\"button\" value=\"Attach More Files\" onclick=\"Javascript:show_more()\"/>
  |
  <input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Save\" onmous=\"Javascript:check()\"/>
  <input type=\"reset\" id=\"reset\" name=\"reset\" value=\"Reset\" />
  </p>
  <div style=display:none id=more_attach>
  		<input type=\"file\" name=\"attach_2\" size=\"20\">  <br>
		<input type=\"file\" name=\"attach_3\" size=\"20\">  <br>
		<input type=\"file\" name=\"attach_4\" size=\"20\">  <br>
		<input type=\"file\" name=\"attach_5\" size=\"20\">  <br>
		
  
  </div>
  </form>";




if ( $gpset == "ow" ){
echo'
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("new_gp");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("vehicle","req","Please enter Vehicle no");
    frmvalidator.addValidation("ms","req","Please select Party");
    frmvalidator.addValidation("depart","req","Please select Department");
    frmvalidator.addValidation("sender","req","Please write sender name");
    frmvalidator.addValidation("approved","req","Please write the name of Approving person");


    frmvalidator.addValidation("item_1","req","You Must type at least 1 item");';
$f=0;
while($f<10){
$f=$f+1;
echo'    
frmvalidator.addValidation("qty_'.$f.'","numeric","Write Qty in Numbers");
 ';
} echo'
//]]></script>
';
}
if ( $gpset == "iw" ){
echo'
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("new_gp");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("vehicle","req","Please enter Vehicle no");
    frmvalidator.addValidation("ms","req","Please select Party");
    frmvalidator.addValidation("depart","req","Please select department");
    frmvalidator.addValidation("approved","req","Please write sender name");

    frmvalidator.addValidation("item_1","req","You must type at least 1 item");
';
while($f<10){
$f=$f+1;
echo'    
frmvalidator.addValidation("qty_'.$f.'","numeric","Write Qty in Numbers");
frmvalidator.addValidation("dept_gp_'.$f.'","numeric","Write Price in Numbers"); ';
} echo'
//]]></script>
';
}

echo"
</span></span>

</body>

</html>
";
?>