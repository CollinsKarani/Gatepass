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

require('pdf/fpdf.php');

  $name = @$_GET['file_name'] ;
  $file_name = $name;
 
  
class PDF extends FPDF
{
//Load data
function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}

//Colored table
function FancyTable($header,$data)
{
    //Colors, line width and bold font
    $this->SetFillColor(20,100,180);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,80,160);
    $this->SetLineWidth(.3);
    $this->SetFont('','B','7');
    //Header
	$w=array(10,120,20,15,30,30,10,17,28);
    for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
    $fill=false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,date($row[2]),'LR',0,'C',$fill);
        $this->Cell($w[3],6,date($row[3]),'LR',0,'C',$fill);
        $this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
        $this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
        $this->Cell($w[6],6,$row[6],'LR',0,'C',$fill);
        $this->Cell($w[7],6,$row[7],'LR',0,'C',$fill);
        $this->Cell($w[8],6,$row[8],'LR',0,'C',$fill);
        
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}

function ChapterTitle($num,$label)
{
    //Arial 12
    $this->SetFont('Arial','',10);
    //Background color
    $this->SetFillColor(225,235,255);
    $this->SetTextColor(55,15,15);
    //Title
    $this->Cell(280,8,"$label",1,1,'C',true);
    //Line break

}



function PrintChapter($num,$title)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);

}
}

$pdf=new PDF('l');

$pdf->SetFont('times','',14);
$pdf->PrintChapter(1,'LIST OF OUTWORD GATEPASS NON RETURNABLE ITEMS');
$header=array('ID','Item Description','Date','Price','Party','Department','QTY','Unit','Remarks');
$data=$pdf->LoadData($file_name);
$pdf->FancyTable($header,$data);

$pdf->Output();

?>



?>
