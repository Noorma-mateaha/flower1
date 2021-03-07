<?php                                     
include("../../fpdf181/fpdf.php");

class PDF extends FPDF{
    function header(){
        $this->AddFont('angsa','','angsa.php');
        $this->SetFont('Arial','B',12);
        $this->SetLeftMargin(10); //นะยะห่างขอบกระดาษ
        $this->Cell(0,5,iconv("UTF-8","TIS-620","ใบสสั่งซื้อวัตถุดิบ"),0,1);
        $this->Cell(0,5,iconv("UTF-8","TIS-620","ใบสสั่งซื้อวัตถุดิบ"),0,1);
        $this->line(5,28,200,28);
        $this->SetLeftMargin(5);
    }
    function Footer(){
        $this->SetLineWidth(0,5);
        $this->AddFont('angsa','','angsa.php');
        $this->SetFont('Arial','',10);
        $this->SetY(-12);
        $this->Cell(0,5,iconv("UTF-8","TIS-620",'ทดสอบระบบ'),0,0,"L");
        $this->Cell(0,5,iconv("UTF-8","TIS-620",'เวลาปริ้น : '.date('d').'/'.date('m').'/'.(date('Y') +543).' '.date('H:i:s')),0,0,"R");
    }
}
function thaidatel($str){
    if($str == "0000-00-00"){return ""}
}

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->Ln(5); //เว้นบรรทัด
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',14);
$pdf->Cell(175,4,iconv("UTF-8","TIS-620","ใบสสั่งซื้อวัตถุดิบ"),0,1,'c');
$pdf->Ln(2); //เว้นบรรทัด
$pdf->Cell(10,7,iconv("UTF-8","TIS-620","ลำดับ"),0,1,'c');
$pdf->Cell(15,7,iconv("UTF-8","TIS-620","ชื่อวัตถุดิบ"),0,1,'c');
$pdf->Cell(45,7,iconv("UTF-8","TIS-620","สี"),0,1,'c');
$pdf->Cell(45,7,iconv("UTF-8","TIS-620","ขนาด"),0,1,'c');
$pdf->Cell(18,7,iconv("UTF-8","TIS-620","จำนวน"),0,1,'c');
$pdf->Cell(50,7,iconv("UTF-8","TIS-620","ราคาต่อหน่วย"),0,1,'c');
$pdf->Ln(); //เว้นบรรทัด