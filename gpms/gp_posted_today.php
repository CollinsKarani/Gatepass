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

require_once('auth.php');

// Welcome User<center>
  print "<font face=\"Verdana\"><font style=\"font-size: 10pt\" color=\"#336699\" style=\"text-decoration: none\">
 Hi, ".$_SESSION['GPMA_FIRST_NAME'] ." ".$_SESSION['GPMA_LAST_NAME'] ."</p> ";

?>

<html>
<head>
</head>

<body>


<?php
require_once('calendar/classes/tc_calendar.php');

// global setting
  $b = time (); 
  $dt=@$_GET['dt'];
  if($dt==''){$var = date("Y-m-d",$b);}else{$var = $dt;}
  
  $trimmed = trim($var) ;

  $dt_fr=explode('-',$var);
  echo'
  <form name="form" action="" method="get"> 
<table><tr><td width=150><font face=verdana size=2>
<b>Date: </b>';

  $myCalendar=new tc_calendar("dt", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate($dt_fr[2],$dt_fr[1], $dt_fr[0]);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2010, 2030);
	  $myCalendar->dateAllow('2010-05-13', '2030-03-01');
	  $myCalendar->setDateFormat('d/m/Y');
	  $myCalendar->writeScript();
echo ' </td><td><font face=verdana size=2>
  <input type="submit" value="Proceed" />
</table>
 ';

  
  $limit="10000"; 

require_once('connection.php');
mysql_select_db($database_connection, $connection);

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

//___________________________________________________________________
// Build SQL Query For Total Outgoing gatepass Non returnableGate pass 
//-------------------------------------------------------------------
$query1 = "select * from `".$tbl."ow_non_main` where date like \"%$trimmed%\"  
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults1=mysql_query($query1);
 $numrows1=mysql_num_rows($numresults1);

// get results
  $query1 .= " limit $s,$limit";
  $result1 = mysql_query($query1) or die(mysql_error());


//___________________________________________________________________
// Build SQL Query For Total Outgoing Returnable Gate pass 
//-------------------------------------------------------------------
$query2 = "select * from `".$tbl."ow_gp_ret` where date like \"%$trimmed%\"  
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults2=mysql_query($query2);
 $numrows2=mysql_num_rows($numresults2);

// get results
  $query2 .= " limit $s,$limit";
  $result2 = mysql_query($query2) or die(mysql_error());

//___________________________________________________________________
// Build SQL Query For Total Incoming  Non returnableGate pass 
//-------------------------------------------------------------------


$query3 = "select * from `".$tbl."in_non_main` where `date` like \"%$trimmed%\"  
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults3=mysql_query($query3);
 $numrows3=mysql_num_rows($numresults3);

// get results
  $query3 .= " limit $s,$limit";
  $result3 = mysql_query($query3) or die(mysql_error());


//___________________________________________________________________
// Build SQL Query For Total incoming  returnable Gate pass 
//-------------------------------------------------------------------
$query4 = "select * from `".$tbl."in_ret_main` where date like \"%$trimmed%\"  
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults4=mysql_query($query4);
 $numrows4=mysql_num_rows($numresults4);

// get results
  $query4 .= " limit $s,$limit";
  $result4 = mysql_query($query4) or die(mysql_error());


$total = ($numrows1 + $numrows2 + $numrows3 + $numrows4 );




//-----------------------------------------------------------------
// begin to show OutGoing
//-----------------------------------------------------------------
echo "

<body lang=EN-US style='tab-interval:.5in'>

<table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 100%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"17\">
    <colgroup>
    <col style=\"WIDTH: 120px\"><col style=\"WIDTH: 120px\" >
	<col style=\"WIDTH: 120px\"><col style=\"WIDTH: 120px\" >
	<col style=\"WIDTH: 120px\">    </colgroup>
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b> Outward Non Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Outward Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Inward Non Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Inward Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Total Gatepass Posted Today	 </font></td>
                </span>

      </tr>
 

   <tbody vAlign=\"top\"></table>";

//##################################
//#      Result Detail Drawing     #
//#################################

echo "<table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 100%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"17\">
   <colgroup>
	<col style=\"WIDTH: 40px\"><col style=\"WIDTH: 80px\" >
	<col style=\"WIDTH: 40px\"><col style=\"WIDTH: 80px\" >
	<col style=\"WIDTH: 40px\"><col style=\"WIDTH: 80px\" >
	<col style=\"WIDTH: 40px\"><col style=\"WIDTH: 80px\" >
	<col style=\"WIDTH: 40px\"><col style=\"WIDTH: 80px\" >

    </colgroup>

      <tr>
	
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $numrows1 . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\">
		<a href=\"full_report.php?pid=onr&dt=".$var."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $numrows2 . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><a href=\"full_report.php?pid=or&dt=".$var."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $numrows3 . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><a href=\"full_report.php?pid=inr&dt=".$var."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\">". $numrows4 . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\"><a href=\"full_report.php?pid=ir&dt=".$var."\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $total . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><a href=\"?cmd=report\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
       </tr>

    <tbody vAlign=\"top\">
  </table>
";
$count = 1 + $s ;

echo '<h4>Pending Returnable items</h4>';


//___________________________________________________________________
// Build SQL Query For Pending Outgoing gatepass returnableGate pass 
//-------------------------------------------------------------------
$query5 = "select * from `".$tbl."ow_ret_sub` where ret_date like \"p\"
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults5=mysql_query($query5);
 $numrows5=mysql_num_rows($numresults5);


//___________________________________________________________________
// Build SQL Query For Pending incoming gatepass returnableGate pass 
//-------------------------------------------------------------------
$query6 = "select * from `".$tbl."in_ret_sub` where ret_date like \" \"
  order by id"; // EDIT HERE and specify your table and field names for the SQL query

 $numresults6=mysql_query($query6);
 $numrows6=mysql_num_rows($numresults6);

$totalpending =  $numrows5 +  $numrows6;
//-----------------------------------------------------------------
// begin to show Pending
//-----------------------------------------------------------------
echo "

<body lang=EN-US style='tab-interval:.5in'>

<table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 100%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"17\">
    
      <tr>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Outward Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Inward Returnable	 </font></td>
                </span>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ebf0f9; TEXT-ALIGN: left\" width=\"210\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><b>Total Pending Items	 </font></td>
                </span>

      </tr>
 

   <tbody vAlign=\"top\"></table>";

//##################################
//#      Result Detail Drawing     #
//#################################

echo "<table title=\"\" style=\"table-layout: fixed; font-size: 10pt; width: 100%; font-family: Verdana; border-collapse: collapse; word-wrap: break-word; border: medium none\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" height=\"17\">
      <tr>
	
     
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $numrows5 . "</font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"><a href=\"ret_report.php?report_type=in_non_main\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\">". $numrows6 . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\"><a href=\"ret_report.php?type=ir\"> <font size=\"1\" color=\"darkBlue\" style=\"text-decoration: none\"><b>View Report</a></font></td>
        <span id=\"L07589E80118BD70B\" title=\"Click More Detail for report\" style=\"background-color: transparent\">
        <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"20\" height=\"18\">
        <p style=\"text-align: right\"><font size=\"1\">". $totalpending . "</font></td>
          <td style=\"BORDER-RIGHT: #517dbf 1pt solid; BORDER-TOP: #517dbf 1pt solid; VERTICAL-ALIGN: top; BORDER-LEFT: #517dbf 1pt solid; BORDER-BOTTOM: #517dbf 1pt solid; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: RIGHT\" width=\"110	\" height=\"18\">
        <p style=\"text-align: left\"><font size=\"1\"></td>
       </tr>

    <tbody vAlign=\"top\">
  </table>
";





 

  
?>



</body>
</html>
