<?php 
require_once('connection.php');
require_once('top.htm');
require_once('auth.php');
echo'
<html>
<head>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>

<script type="text/javascript" src="disableEnter.js"></script>

<script language="javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="receipt.js"></script>
</head>
<body>
<div id="get_plist" >
<form name="report_form" method="POST" action="">GP No : 
  <input type="text" name="gp_no" />
  <input type="submit" value="Proceed" />
</form>
';

mysql_select_db($database_connection, $connection);
	$var = @$_POST['gp_no'];
  	$trimmed = trim($var) ;

if ( $trimmed == ''){exit();}
  $query = "Select * from `".$tbl."in_ret_main` where `gpno` like \"%".$trimmed."%\" AND `user_id`= '".$_SESSION['GPMA_key']."' Limit 1";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

$gp_type = 'ir' ;
if ($line == 0){
  $query = "Select * from `".$tbl."ow_ret_main` where `gpno` like \"%".$trimmed."%\" AND `user_id`= '".$_SESSION['GPMA_key']."' Limit 1";
  $result = mysql_query($query) or die(mysql_error());
$line=mysql_num_rows($result);

$gp_type = 'or' ;
if ($line == 0){
echo '<br>No record Found';
exit();
}
}

if ($line >= 2){
echo '<br><br>Too Many Record Found <br>Tip! Type Complete Gate Pass number';
exit();
}

if ($gp_type == "or"){
$gp_title = "Outward Returnable Gatepass Form";
$gp_mt = "ow_ret_main";
$gp_st = "ow_ret_sub";
$report_prefix = 'OWR';
$gpset = "ow" ;

}

if ($gp_type == "ir"){
$gp_title = "Inward Returnable Gatepass Form";
$gp_mt = "in_ret_main";
$gp_st = "in_ret_sub";
$report_prefix = 'IWR';

$gpset = "iw" ;

}


 while ($row= mysql_fetch_array($result)) {

$date=$row['date'];
$date=explode('-',$date);
$date=$date['2'].'/'.$date['1'].'/'.$date['0'];

$return_date=$row['return_date'];
$return_date=explode('-',$return_date);
$return_date=$return_date['2'].'/'.$return_date['1'].'/'.$return_date['0'];
$current_date=date('d/m/Y', time());
echo'<p> &nbsp; </p>

<form name="report_form" method="POST" action="save_receipt.php">
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="900" id="AutoNumber1" height="10" bordercolorlight="#D6D6D6" bordercolordark="#C0C0C0">
      <td width="22%">
   <p align="right">
      <font size="2">&nbsp;<font color="#000000" face="Verdana">Location:</font></font>
      <input type="text" name="ms" value="'.$row['ms'].'" size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
 </span></span></span></td>
      <td width="25%">
      <p align="right"><font face="Verdana" size="2">Vehicle</font><span><span id="L07589E80118BD70B6" title="" style="background-color: transparent"><span id="L07589E80118BD70B7" title="" style="background-color: transparent"><span id="L07589E80118BD70B8" title="" style="background-color: transparent"><font face="Verdana" size="2"> 
      #</font>
<input type="text" id="vehicle"	 size="15" value="'.$row['vehicle'].'" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
  <input type="hidden" id="current_date" value="'.$current_date.'">
</td>
      <td width="25%">
   <p align="right">
      <font color="#000000" face="Verdana" size="2">Gatepass #</font>
      <input type="text" id="gpno" value="'.$row['gpno'].'" size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
   </td>
      
      <td width="25%">
   
            <p align="right"><font size="2">Date</font><span><span id="L07589E80118BD70B27" style="background-color: transparent"><span id="L07589E80118BD70B28" title="DD/MM/YYYY" style="background-color: transparent"><font color="#000000" face="Verdana" size="2"><b> : ';
echo'<input disabled type="text" id="date" value="'.$row['date'].'" style="border: 1px solid #517DBF; background-color: #FFFFFF"">
</td>
    </tr>







    
    <tr id="iw_t"  style="display:none;">
 <td width="25%" id="vendor_t" >
  <p align="right"><font size="2">
Vendor :
<input type="text" id="vendor" value="'.$row['sender'].'"  size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
 </td>
      <td width="25%" id="depart_t" >
   <p align="right"><font size="2">
Depart: <input type="text" id="depart"	 value="'.$row['depart'].'"  size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
</td>
      <td width="25%">
     <p align="right"><font size="2">
User Resposible:
<input type="text" id="resposiable" size="11" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase" type="text"   tabindex="8" disabled></td>
      <td width="25%">
   <p align="right">
      <font color="#000000" face="Verdana" size="2">Time:</font>
<input type="text" id="time" disabled size="15" value="'.$row['time'].'" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase" type="text"   tabindex="8" maxlength="6">
</td>
    </tr>





    <tr id="ow_t"  style="display:none;">
      <td width="25%"  >
  <p align="right"><font size="2">
Sender : 
<input type="text" id="sender" value="'.$row['sender'].'" size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
      <td width="25%" >
   <p align="right"><font size="2">
Destination: <input type="text" id="dist"	value="'.$row['depart'].'"  size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase"   disabled>
</td>
      <td width="25%">
      <p align="right"> <font size="2">
User Resposible:
<input type="text" id="resposiable_2" value="'.$row['approved'].'"  size="11" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase" type="text"   tabindex="8" disabled></td>
      <td width="25%">
   <p align="right">
      <font color="#000000" face="Verdana" size="2">Time:</font>
<input type="text" id="time_2" disabled size="15" value="'.$row['time'].'" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" style="text-transform: uppercase" type="text"   tabindex="8" maxlength="6">
</td>
    </tr>










<tr>     
    <td width="40%" colspan="2">
   <p align="right">
      <font size="2">
Address : 
<input type="text" disabled id="address" value="'.$row['address'].'"  size="53" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" >
<font color="#000000" face="Verdana"></font></font>
      </span></span></span></td>
      <td width="25%">
   <p align="right">
      <font color="#000000" face="Verdana" size="2">
PO # <input disabled type="text"  id="pono" value="'.$row['po_no'].'"  size="15" style="border: 1px solid #517DBF; background-color: #FFFFFF" padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1" >
</font>
      </td>
      <td width="25%" id="return_title" >

<p align="right"><span><span id="L07589E80118BD70B27" style="background-color: transparent"><span id="L07589E80118BD70B28" title="DD/MM/YYYY" style="background-color: transparent"><font color="#000000" face="Verdana" size="2"><b> &nbsp; ';
 echo '
   
          </b> <font size="2"> Due Date</font><span><span id="L07589E80118BD70B27" style="background-color: transparent"><span id="L07589E80118BD70B28" title="DD/MM/YYYY" style="background-color: transparent"><font color="#000000" face="Verdana" size="2"><b> : ';

echo'<input disabled size=15 type="text" value="'.$row['return_date'].'"  id="return_date" style="border: 1px solid #517DBF; background-color: #FFFFFF"">
     </td>
    </tr>';




echo '   
    </table>
  <p style="MARGIN-TOP: 0px; FONT-WEIGHT: normal; MARGIN-BOTTOM: 0px; COLOR: #517dbf" align="left">&nbsp;</p>
  <table title="" style="table-layout: fixed; font-size: 10pt; width: 900; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none" border="1" cellspacing="0" cellpadding="0" height="10">
    <colgroup>
      <col style="WIDTH: 30px" width="30"><col style="WIDTH: 400px" width="400">
      <col style="WIDTH: 50px" width="50"><col style="WIDTH: 60px" width="60">
      <col style="WIDTH: 60px" width="60"><col style="WIDTH: 140px" width="140">
<col style="WIDTH: 80px" width="80">
    <col style="WIDTH: 100px" width="100">
    </colgroup>
    <tbody vAlign="top">
      <tr>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="52">
        <font size="1">S. No</font></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="383">
        <font size="1">Item Description</font></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="45">
        <font size="1">QTY</font></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="198">
        <font size="1">Unit</font></td>
        </font>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="159">
        <font size="1">Price</font></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="298">
        <span>
        <span id="L07589E80118BD70B32" title="" style="background-color: transparent">
        <font size="1">Remarks</font></span></span></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="298">
        <span>
        <span id="L07589E80118BD70B32" title="" style="background-color: transparent">
        <font size="1">Return Date</font></span></span></td>
              <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; FONT-WEIGHT: bold; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; COLOR: black; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left" width="298">
        <span>
        <span id="L07589E80118BD70B32" title="" style="background-color: transparent">
        <font size="1">Status</font></span></span></td>
      </tr>
    <tbody vAlign="top">';




$gp_no=$row['gpno'];

  $s_query = "Select * from `".$tbl."".$gp_st."` where `gpno` like \"".$gp_no."\" ";
  $s_result = mysql_query($s_query) or die(mysql_error());
$sn=0;
 while ($s_row= mysql_fetch_array($s_result)) {
$return = '';

if ($s_row['status'] == 'Returned'){$check_1 = 'selected'; $return = $s_row['ret_date'];}
if ($s_row['status'] != 'Returned'){$check_1 = '';}
$sn=$sn+1;


echo'
  <input type="hidden" id="mt" name="id_'.$sn.'" value="'.$s_row['id'].'" />
      <tr>
        <span id="L07589E80118BD70B" title="" style="background-color: transparent">
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left" width="2">
        <p style="text-align: center"><span>
        <input disabled value="'.$sn.'" size="1" style=" background-color: #FFFFFF; float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"  tabindex="10"  value=""></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff" width="333">
        <span>
        <input value="id_" size="75" style="float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="hidden"   >        
        <input disabled id="item_" value="'.$s_row['item'].'" size="55" style="  background-color: #FFFFFF;float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   >
        </span></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff" width="71">
        <span>
        <input disabled id="qty_"  value="'.$s_row['qty'].'"size="5" style=" background-color: #FFFFFF; float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   ></span></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff" width="194">
        <span>
<input disabled id="unit_" size="10"  value="'.$s_row['unit'].'" style="background-color: #FFFFFF; float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   tabindex="14">
</span></span></td>

        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff" width="159">
        <span>
        <input disabled id="price_"  value="'.$s_row['price'].'" size="10" style=" background-color: #FFFFFF; float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   tabindex="14"></span></span></span></td>
        <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF" width="298">
        <p align="center"><span>
        <input disabled id="remarks_"  value="'.$s_row['remarks'].'" size="10" style=" background-color: #FFFFFF; float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   tabindex="15"></td>
        </span>
   <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF" width="298">
        <p align="center"><span>
        <input id="return_'.$sn.'" name="return_'.$sn.'" size="10"  value="'.$return.'" style="background-color: #FFFFFF;float: left; border: 0px solid #FFFFFF; padding: 0" style="text-transform: uppercase" type="text"   tabindex="15"></td>

   <td style="BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #FFFFFF" width="298">
        <p align="center"><span>
<select name="status_'.$sn.'" onchange="Javascript:change('.$sn.');">
<option value="Pending" '.@$check_2.'>Pending</option>
<option value="Returned" '.@$check_1.'>Returned</option>
</select>
</td>
        

</span>
      </tr>
';





}

}


$sno=0;
echo'
    <tbody vAlign="top">
  </table>
  <div>
    <p align="center">
  </div>
  <input type="hidden" id="my" name="my_gp_type" value="".$gp_type."" />
  <input type="hidden" id="mt" name="mt" value="'.$gp_mt.'" />
  <input type="hidden" id="st" name="st" value="'.$gp_st.'" />
  <input type="hidden" id="action" name="action" value="submitform" />
  <p align="left"><input type="submit" id="submit" name="submit" value=" Update " ACCESSKEY="u"/>
</p>
  <center>
  <p></p>
  </center>
</form>
</div>
';

?>