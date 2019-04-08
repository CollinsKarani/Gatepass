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
$report_type = @$_GET['report_type'] ;
if ($gpms_ver!='2.1'){
echo'<b>Fatal error: </b>Can\'t use function Set Value in write context. <b> Error code: AUx0821';
exit();
}
if ($report_type == NULL){
echo "Please make selection from sub menu";
exit();
}



  $type = @$_GET['type'] ;
 $b = time (); 
  $var = date("y-m-d",$b) ;
  $trimmed = trim($var) ;

// Set Gatepass Type
if ($report_type == "ow_gp_non_ret"){
$report_title = "Outward Non Returnable Gatepass";
}
if ($report_type == "ow_gp_ret"){
$report_title = "Outward Returnable Gatepass";
}
if ($report_type == "in_gp_non_ret"){
$report_title = "Inward Non Returnable Gatepass";
}
if ($report_type == "in_gp_ret"){
$report_title = "Inward Returnable Gatepass";
}
echo   " <p style=\"font-weight: 600; color: #517dbf; margin-top: 0px; margin-bottom: 0px\" align=\"center\">
  <font size=\"4\">
  <u>".$report_title."</u></font></p>
";
  
$limit="1000"; 

// check for an empty string and display a message.
if ($trimmed == "")
  {
echo " Enter Value and select Type ";
  exit;
  }

// check for a search parameter
if (!isset($var))
  {
  echo "<p>We dont seem to have a search parameter!</p>";
  exit;
  }


require_once('connection.php');

mysql_select_db($database_connection, $connection);


// Build SQL Query  
$query = "select * from $report_type where date like \"%$trimmed%\"  
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {

  echo "<p>Sorry, No record found for (".$trimmed.") </p>";


  }

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for

if ($numrows != 0)
// begin to show results set



$count = 1 + $s ;


  $var_fname = time (); 
  
  $f_name = "temp/".trim($var_fname).".txt";


$fp = fopen( $f_name, "w" ) or die ( "ERROR: file not found" );

// now you can display the results returned
  while ($row= mysql_fetch_array($result)) {
  							$id = $row['id'];
							$ms= $row['ms'];
							$vehicle= $row['vehicle'];
							$date= $row['date'];
							$time= $row['time'];
							$depart= $row['depart'];
							$gp_no= $row['gpno'];
							$sender= $row['sender'];
							$approved= $row['approved'];
							$sn_1= $row['sno1'];
							$item_1= $row['item1'];
							$qty_1= $row['qty1'];
							$unit_1= $row['unit1'];
							$price_1= $row['price1'];
							$remarks_1= $row['remarks1'];
							$sn_2= $row['sno2'];
							$item_2= $row['item2'];
							$qty_2= $row['qty2'];
							$unit_2= $row['unit2'];
							$price_2= $row['price2'];
							$remarks_2= $row['remarks2'];
							$sn_3= $row['sno3'];
							$item_3= $row['item3'];
							$qty_3= $row['qty3'];
							$unit_3= $row['unit3'];
							$price_3= $row['price3'];
							$remarks_3= $row['remarks3'];
							$sn_4= $row['sno4'];
							$item_4= $row['item4'];
							$qty_4= $row['qty4'];
							$unit_4= $row['unit4'];
							$price_4= $row['price4'];
							$remarks_4= $row['remarks4'];
							$sn_5= $row['sno5'];
							$item_5= $row['item5'];
							$qty_5= $row['qty5'];
							$unit_5= $row['unit5'];
							$price_5= $row['price5'];
							$remarks_5= $row['remarks5'];
							$sn_6= $row['sno6'];
							$item_6= $row['item6'];
							$qty_6= $row['qty6'];
							$unit_6= $row['unit6'];
							$price_6= $row['price6'];
							$remarks_6= $row['remarks6'];
							$sn_7= $row['sno7'];
							$item_7= $row['item7'];
							$qty_7= $row['qty7'];
							$unit_7= $row['unit7'];
							$price_7= $row['price7'];
							$remarks_7= $row['remarks7'];
							$sn_8= $row['sno8'];
							$item_8= $row['item8'];
							$qty_8= $row['qty8'];
							$unit_8= $row['unit8'];
							$price_8= $row['price8'];
							$remarks_8= $row['remarks8'];
							$sn_9= $row['sno9'];
							$item_9= $row['item9'];
							$qty_9= $row['qty9'];
							$unit_9= $row['unit9'];
							$price_9= $row['price9'];
							$remarks_9= $row['remarks9'];
							$sn_10= $row['sno0'];
							$item_10= $row['item0'];
							$qty_10= $row['qty0'];
							$unit_10= $row['unit0'];
							$price_10= $row['price0'];
							$remarks_10= $row['remarks0'];
							
  
  

//------------------------------------------------
// create TXT file
//------------------------------------------------





$text = "".$gp_no . ";".$item_1.";".$date.";".$price_1 .";".$ms .";".$depart .";".$qty_1 .";".$unit_1.";".$remarks_1 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );
//---------------------------------------------
// Draw Result Table
//---------------------------------------------
echo "
  <p style=\"text-align: Left\"><font size=\"1\"><a href=\"detail_gp.php?q=". $gp_no ."&gp_type=".$report_type."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\">More Detail </a></font> <a href=\"edit_form.php?q=". $gp_no ."&gp_type=". $report_type ."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"></a>
<body lang=EN-US style='tab-interval:.5in'>

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"17\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
<span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
                <p style=\"text-align: center\"><font size=\"1\"><b>".$gp_no."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; width=\"289\" height=\"18\">
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <font size=\"1\"><b>".$ms."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; width=\"71\" height=\"18\">
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <font size=\"1\"><b>".$vehicle."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; width=\"194\" height=\"18\">
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <font size=\"1\"><b>".$sender ."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; width=\"159\" height=\"18\">
		<span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <font size=\"1\"><b>".$depart ."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; width=\"298\" height=\"18\">
        <span id=\"L07589E80118BD70B\" title=\"\" style=\"background-color: transparent\" style=\"text-transform: uppercase\">
        <p align=\"left\"><font size=\"1\"><b>".$date ."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
 

";
  echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_1 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_1 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_1 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_1 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_1 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	    <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_1."  </font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a>
 " ;  
 
 // \\------------------------
 // // Display 2nd record 
 // \\------------------------
 
 if ( $item_2 != NULL ) {
 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );

 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_2 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_2 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_2 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_2 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_2."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	    <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_2."  </font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a>
  
 " ;
 }
 // \\------------------------
 // // Display 3nd record 
 // \\------------------------
 
 if ( $item_3 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_3 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_3 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_3 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_3 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_3."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_3."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 
 // \\------------------------
 // // Display 4nd record 
 // \\------------------------
 
 if ( $item_4 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_4 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_4 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_4 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_4 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_4."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_4."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 5nd record 
 // \\------------------------
 
 if ( $item_5 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_5 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_5 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_5 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_5 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_5."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_5."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 6th record 
 // \\------------------------
 
 if ( $item_6 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_6 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_6 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_6 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_6 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_6."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_6."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 7nd record 
 // \\------------------------
 
 if ( $item_7 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_7 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_7 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_7 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_7 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_7."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_7."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 8nd record 
 // \\------------------------
 
 if ( $item_8 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_8 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_8 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_8 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_8 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_8."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_8."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 9nd record 
 // \\------------------------
 
 if ( $item_9 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_9 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_9 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_9 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_9 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_9."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_9."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 // \\------------------------
 // // Display 10nd record 
 // \\------------------------
 
 if ( $item_10 != NULL ) {
	 
 $text = "".$gp_no . ";".$item_2.";".$date.";".$price_2 .";".$ms .";".$depart .";".$qty_2 .";".$unit_2.";".$remarks_2 ." 
";
fwrite( $fp, $text ) or die ( "ERROR: Cannot inset admin pass and username." );


 echo " 

<table title=\"Category Entry\" style=\"table-layout: fixed; font-size: 10pt; width: 899; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"30\">
    <colgroup>
      <col style=\"WIDTH: 30px\" width=\"50\"><col style=\"WIDTH: 150px\" width=\"150\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
      <col style=\"WIDTH: 40px\" width=\"40\"><col style=\"WIDTH: 40px\" width=\"40\">
    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"To View Complete Gatepass Click More Detail\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left\" width=\"46\" height=\"18\">
        <p style=\"text-align: center\"><font size=\"1\">". $sn_10 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"289\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$item_10 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"71\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$qty_10 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"194\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$unit_10 . "</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff\" width=\"159\" height=\"18\">
        <span style=\"text-transform: uppercase\"><font size=\"1\">".$price_10."</font></td>
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #f2f2f2\" width=\"298\" height=\"18\">
	     <span style=\"text-transform: uppercase\"><font size=\"1\"> ".$remarks_10."</font></td>
        </span>
      </tr>
    <tbody vAlign=\"top\">
  </table></a> 
 " ;
 }
 
  $count++ ;
  }

$currPage = (($s/$limit) + 1);

//break before paging
  echo "<br />";

  // next we need to do the links to other results
  if ($s>=1) { // bypass PREV link if s is 0
  $prevs=($s-$limit);
  print "&nbsp;<a href=\"$PHP_SELF?s=$prevs&q=$var\">&lt;&lt; 
  Prev 10</a>&nbsp&nbsp;";
  }

// calculate number of pages needing links
  $pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

  if ($numrows%$limit) {
  // has remainder so add one page
  $pages++;
  }


if($s!="0"){ 
// check to see if last page
  if (!((($s+$limit)/$limit)==$pages) && $pages!=1) {

  // not last page so give NEXT link
  $news=$s+$limit;

  echo "&nbsp;<a href=\"$PHP_SELF?s=$news&q=$var\">Next 10 &gt;&gt;</a>";
  }



 

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
 
}
print "<a href=\"pdf_report.php?file_name=".$f_name."\"> <font size=\"1\" color=\"black\">Export to PDF</a>";
?>




</body>
</html>
