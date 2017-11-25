<?php
require('fpdf/fpdf.php');
require "connect.php"; 
$data10 = $_GET['data10'];
$mm = $_GET['mm'];

if(!empty($_GET['ordem'])){
    $ordem = $_GET['ordem'];
}else{
    $ordem="";
}

if(!empty($_GET['predio'])){
    $predioS = $_GET['predio'];
    $predio=" and sala.codpredio=" . $_GET['predio'];
}else{
    $predio="";
    $predioS="";
}

if(!empty($_GET['departamento'])){
    $departamentoS = $_GET['departamento'];
    $departamento=" and sala.sigladpto='" . $_GET['departamento'] . "'";
}else{
    $departamento="";
    $departamentoS="";
}

if(!empty($_GET['sala'])){
    $salaS = $_GET['sala'];
    $sala=" and sala.numero=" . $_GET['sala'];
}else{
    $sala="";
    $salaS="";
}

if(!empty($_GET['nome'])){
    $nome = $_GET['nome'];
}else{
    $nome="";
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


if(!empty($_GET['nome'])){

    $nome = "%" . $_GET['nome'] . "%";
   $sqlX= "SELECT bp.numero, bp.descricao, bp.datacompra, bp.prazogarantia, bp.nrnotafiscal, bp.fornecedor, bp.valor, bp.situacao, bp.codcategoria, bp.numsala from sala, bempatrimonial bp where bp.numsala=sala.numero and bp.numero in
   ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}}')
   union all
   (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}')) and upper(bp.descricao) like upper('{$nome}')". $predio . $departamento . $sala . $ordem;
 
    $resultado = $con->prepare($sqlX);
    $resultado->execute();

}else{
            $sqlX="SELECT bp.numero, bp.descricao, bp.datacompra, bp.prazogarantia, bp.nrnotafiscal, bp.fornecedor, bp.valor, bp.situacao, bp.codcategoria, bp.numsala from sala, bempatrimonial bp where bp.numsala=sala.numero and bp.numero in
            ((select b.numero from bempatrimonial b where b.situacao = 'I' and b.datacompra <= '{$data10}}')
            union all
            (select ba.numero from baixabempatrimonial ba where ba.data {$mm} '{$data10}'))". $predio . $departamento . $sala . $ordem;

            $resultado = $con->prepare($sqlX);
            $resultado->execute();
            }

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
$rodape="REFERENTE A DATA: {$data10}       PREDIO:{$predioS}       DEPARTAMENTO:{$departamentoS}       SALA:{$salaS}      NOME:{$nome}";
$pdf->Cell(800, 20, $rodape, 1,1, 'C');
$pdf->Output();
?>
