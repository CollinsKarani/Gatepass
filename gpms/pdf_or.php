<?php


$gp_type = @$_GET['pid'] ;
$step=@$_POST['step'];

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

require('../connection.php');
 $gpid=@$_GET['lp'];
  
mysql_select_db($database_connection, $connection );


//Extract Company Info From DB 
$query = "SELECT * FROM `".$tbl."company` LIMIT 1"; 
  $result = mysql_query($query) or die("Couldn't execute query");
$c_row= mysql_fetch_array($result);
$company_id=$c_row['member_id'];
$company_reg=$c_row['reg_no'];
$company_address=$c_row['address'];


$company_city=$c_row['city'];
$company_zipcode=$c_row['zipcode'];
$company_ntn=$c_row['ntn'];
$company_ph_no=$c_row['ph_no'];
$company_fax_no=$c_row['fax_no'];
$company_website=$c_row['website'];
$company_state=$c_row['state'];
$company_country=$c_row['country'];
$company_info=$c_row['add_info'];





$search='SELECT * FROM `'.$tbl.''.$gp_mt.'` WHERE `gpno` like "'.$gpid.'"'; 
$search_result=mysql_query($search) or die(mysql_error());

while ($main=mysql_fetch_array($search_result)){
$gpno = $main['gpno'];
$ms = $main['ms'];
$vehicle = $main['vehicle'];
$date = $main['date'];
$date=explode('-',$date);
$date=$date['2'].'/'.$date['1'].'/'.$date['0'];

$time = $main['time'];
$depart = $main['depart'];
$sender = $main['sender'];
$approved = $main['approved'];
$user_id = $main['user_id'];
$address = $main['address'];
$po_no = $main['po_no'];
$return_date = $main['return_date'];
$return_date=explode('-',$return_date);
$return_date=$return_date['2'].'/'.$return_date['1'].'/'.$return_date['0'];
$check = $main['check'];

$sub_qry='SELECT * FROM `'.$tbl.''.$gp_st.'` WHERE `gpno` like "'.$gpno.'"'; 
$sub_result=mysql_query($sub_qry) or die(mysql_error());
$sn=0;
while ($sub=mysql_fetch_array($sub_result)){
$sn=$sn+1;

$item[$sn] = $sub['item'];
$unit[$sn] = $sub['unit'];
$qty[$sn] = $sub['qty'];
$price[$sn] = $sub['price'];
$remarks[$sn] = $sub['remarks'];
$ret_date[$sn] = $sub['ret_date'];



}

}

 

require('../pdf/cellfit.php');

class PDF extends FPDF
{
var $B;
var $I;
var $U;
var $HREF;
// Sales Contract Logo
function logo($logo)
{    //Logo
    $this->Image($logo,76,10,46);
    }

function PDF($orientation='P',$unit='mm',$format='A4')
{
    //Call parent constructor
    $this->FPDF($orientation,$unit,$format);
    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';
}

}


$pdf = new FPDF_CellFit();

//Second page

$pdf->AddPage();
$pdf->SetAuthor('GatePass Management System');
$pdf->SetTitle('Gate Pass');



$pdf->SetXY(22,10);
$pdf->Image('img/orignal.jpg','10,10,300,320');
$pdf->SetXY(22,140);
$pdf->Image('img/copy.jpg','10,10,300,320');


$pdf->SetXY(22,10);
$pdf->SetFont('times','B',15);
$pdf->Write(3,$company_name);

$pdf->SetXY(15,15);
$pdf->SetFont('times','',12);
$pdf->Write(3,$company_address);


$pdf->SetXY(15,20);
$pdf->SetFont('times','',12);
$pdf->Write(3,'Phone Nos:'.$company_ph_no);

$pdf->SetXY(13,35);
$pdf->SetFont('times','B',13);
$pdf->Write(3,'OUTWARD RETURNABLE GATE PASS');

$pdf->SetXY(108,9);
$pdf->SetFont('times','',10);
$pdf->Write(3,'GatePass No :  '.$gpno.'');

$pdf->SetXY(108,13);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Date              :  '.$date.'');

$pdf->SetXY(108,17);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Return Date  :  '.$return_date.'');

$pdf->SetXY(108,22);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Vehicle No   :  '.$vehicle.'');

$pdf->SetXY(108,27);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Sender          :  '.$sender.'');

$pdf->SetXY(108,32);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Party             :  '.$ms.'');

$pdf->SetXY(108,37);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Approved By:  '.$approved.'');

$pdf->SetXY(10,7);
$pdf->Cell(95,35,'',1,1,'C');

$pdf->SetXY(10,7);
$pdf->Cell(95,22,'',1,1,'C');

$pdf->SetXY(105,7);
$pdf->Cell(95,35,'',1,1,'C');

$pdf->SetXY(10,43);

// Item List Header
//-------------------------------------------------------------------
$pdf->CellFitScale(15, 5, 'S.No', 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(25,$y);
$pdf->CellFitScale(80, 5, 'Description of Material', 1, 1);
$y=$pdf->GetY()-5;
        $pdf->SetXY(105,$y);
$pdf->CellFitScale(25, 5, 'Qty' , 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(130,$y);
$pdf->CellFitScale(15, 5,'Unit', 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(145,$y);
$pdf->CellFitScale(55, 5, 'Remarks', 1, 1);

// Item List Date
//-------------------------------------------------------------------
$a=0;
while($a<$sn){
$a = $a+1;
$pdf->CellFitScale(15, 5, $a, 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(25,$y);
$pdf->CellFitScale(80, 5, $item[$a], 1, 1);

$y=$pdf->GetY()-5;
        $pdf->SetXY(105,$y);
$pdf->CellFitScale(25, 5, $qty[$a], 1, 1,'C');

$y=$pdf->GetY()-5;
        $pdf->SetXY(130,$y);
$pdf->CellFitScale(15, 5, $unit[$a], 1, 1,'C');

$y=$pdf->GetY()-5;
        $pdf->SetXY(145,$y);
$pdf->CellFitScale(55, 5, $remarks[$a], 1, 1);

}
if($check == 1){
$pdf->SetXY(20,107);
$pdf->Image('img/sign.jpg','120,20,130,30');
}


$pdf->SetXY(20,120);
$pdf->SetFont('times','',10);
$pdf->Write(3,'__________________                       __________________             _____________________');

$y=$pdf->GetY()+5;

$pdf->SetXY(20,$y);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Name and Signature                             Name and Signature');

$y=$pdf->GetY()+5;

$pdf->SetXY(20,$y);
$pdf->SetFont('times','',10);
$pdf->Write(3,'  of Person Issuing                                of Person taking out                   Authorised Signatory');

   
$pdf->SetFont('times','',13);
$pdf->Write(3,'


---------------------------------------------------------------------------------------------------------------------------

');



$pdf->SetXY(22,150);
$pdf->SetFont('times','B',15);
$pdf->Write(3,$company_name);

$pdf->SetXY(15,155);
$pdf->SetFont('times','',12);
$pdf->Write(3,$company_address);


$pdf->SetXY(15,160);
$pdf->SetFont('times','',12);
$pdf->Write(3,'Phone Nos:'.$company_ph_no);


$pdf->SetXY(13,175);
$pdf->SetFont('times','B',13);
$pdf->Write(3,'OUTWARD RETURNABLE GATE PASS');


$pdf->SetXY(108,149);
$pdf->SetFont('times','',10);
$pdf->Write(3,'GatePass No :  '.$gpno.'');

$pdf->SetXY(108,153);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Date              :  '.$date.'');

$pdf->SetXY(108,157);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Return Date  :  '.$return_date.'');

$pdf->SetXY(108,162);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Vehicle No   :  '.$vehicle.'');

$pdf->SetXY(108,167);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Sender          :  '.$sender.'');

$pdf->SetXY(108,172);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Party             :  '.$ms.'');

$pdf->SetXY(108,177);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Approved By:  '.$approved.'');

$pdf->SetXY(10,147);
$pdf->Cell(95,35,'',1,1,'C');

$pdf->SetXY(10,147);
$pdf->Cell(95,22,'',1,1,'C');

$pdf->SetXY(105,147);
$pdf->Cell(95,35,'',1,1,'C');

$pdf->SetXY(10,183);

// Item List Header
//-------------------------------------------------------------------
$pdf->CellFitScale(15, 5, 'S.No', 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(25,$y);
$pdf->CellFitScale(80, 5, 'Description of Material', 1, 1);
$y=$pdf->GetY()-5;
        $pdf->SetXY(105,$y);
$pdf->CellFitScale(25, 5, 'Qty' , 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(130,$y);
$pdf->CellFitScale(15, 5,'Unit', 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(145,$y);
$pdf->CellFitScale(55, 5, 'Remarks', 1, 1);

// Item List Date
//-------------------------------------------------------------------
$a=0;
while($a<$sn){
$a = $a+1;
$pdf->CellFitScale(15, 5, $a, 1, 1,'C');
$y=$pdf->GetY()-5;
        $pdf->SetXY(25,$y);
$pdf->CellFitScale(80, 5, $item[$a], 1, 1);

$y=$pdf->GetY()-5;
        $pdf->SetXY(105,$y);
$pdf->CellFitScale(25, 5, $qty[$a], 1, 1,'C');

$y=$pdf->GetY()-5;
        $pdf->SetXY(130,$y);
$pdf->CellFitScale(15, 5, $unit[$a], 1, 1,'C');

$y=$pdf->GetY()-5;
        $pdf->SetXY(145,$y);
$pdf->CellFitScale(55, 5, $remarks[$a], 1, 1);

}
if($check == 1){
$pdf->SetXY(20,247);
$pdf->Image('img/sign.jpg','120,20,130,30');
}


$pdf->SetXY(20,260);
$pdf->SetFont('times','',10);
$pdf->Write(3,'__________________                        __________________             _____________________');

$y=$pdf->GetY()+5;

$pdf->SetXY(20,$y);
$pdf->SetFont('times','',10);
$pdf->Write(3,'Name and Signature                              Name and Signature');

$y=$pdf->GetY()+5;

$pdf->SetXY(20,$y);
$pdf->SetFont('times','',10);
$pdf->Write(3,'  of Person Issuing                                 of Person taking out                   Authorised Signatory');

                          $pdf->Output();

?>