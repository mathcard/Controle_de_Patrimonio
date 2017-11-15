<?php
require('fpdf/fpdf.php');
require "connect.php"; 
$data10 = $_GET['data10'];
$mm = $_GET['mm'];

if(empty($_GET['ordem'])){
    $ordem = $_GET['ordem'];
}else{
    $ordem="";
}

class Documento1 extends FPDF
{
    function Header()
    {
        $this->Image('logor.png', 340, 0);
        $this->Ln(90);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(800, 20, 'Inventario', 1,1, 'C');
        $this->Cell(60, 20, 'Numero', 1,0, 'C');
        $this->Cell(130, 20, 'Descricao', 1,0, 'C');
        $this->Cell(80, 20, 'Data Compra', 1,0, 'C');
        $this->Cell(60, 20, 'Garantia', 1,0, 'C');
        $this->Cell(60, 20, 'Nota', 1,0, 'C');
        $this->Cell(150, 20, 'Fornecedor', 1,0, 'C');
        $this->Cell(80, 20, 'Valor', 1,0, 'C');
        $this->Cell(60, 20, 'Situacao', 1,0, 'C');
        $this->Cell(60, 20, 'Categoria', 1,0, 'C');
        $this->Cell(60, 20, 'Sala', 1,0, 'C');
    
        $this->Ln(20);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

    }
}

$pdf = new Documento1('P', 'pt', 'A4');
$pdf->AddPage('L');
$pdf->AliasNbPages();
$sqlX= "SELECT * FROM bempatrimonial where numero in
            ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}')
            union all
            (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}'))" . $ordem;


$resultado = $con->prepare($sqlX);
$resultado->execute();

while ($row = $resultado->fetchObject()) {

    $pdf->Cell(60, 20, $row->numero, 1, 0, 'L'); 
    $pdf->Cell(130, 20, $row->descricao, 1, 0, 'L'); 
    $pdf->Cell(80, 20, $row->datacompra, 1, 0, 'L'); 
    $pdf->Cell(60, 20, $row->prazogarantia, 1, 0, 'L'); 
    $pdf->Cell(60, 20, $row->nrnotafiscal, 1, 0, 'L'); 
    $pdf->Cell(150, 20, $row->fornecedor, 1, 0, 'L'); 
    $pdf->Cell(80, 20, $row->valor, 1, 0, 'L'); 
    $pdf->Cell(60, 20, $row->situacao, 1, 0, 'L'); 
    $pdf->Cell(60, 20, $row->codcategoria, 1, 0, 'L'); 
    $pdf->Cell(60, 20, $row->numsala, 1, 1, 'L'); 

}

$pdf->Output();
?>
