<?php
//CONFIGURAÇÕES
$servidor = "localhost"; 
$usuario = "postgres"; 
$senha = "postgres"; 
$bd = "patrimonio"; 
//TÍTULO DO RELATÓRIO 
$titulo = "Relatório de Inventário"; 
//LOGO QUE SERÁ COLOCADO NO RELATÓRIO

$imagem = "logo.png"; 
//ENDEREÇO DA BIBLIOTECA FPDF 
$end_fpdf = "fpdf"; 
//NUMERO DE RESULTADOS POR PÁGINA 
$por_pagina = 15; 
//ENDEREÇO ONDE SERÁ GERADO O PDF

$end_final = "pdf\artigo_php.pdf";

//TIPO DO PDF GERADO 
//F-> SALVA NO ENDEREÇO ESPECIFICADO NA VAR END_FINAL 
$tipo_pdf = "F";

/**************
NÃO MEXER DAQUI PRA BAIXO ***************/

//CONECTA
$conn = pg_connect("host=localhost port=5432 dbname=patrimonio user=postgres password=postgres");
$db = pg_select($bd, $conn, $_POST); 
$sql = pg_query("SELECT * FROM bempatrimonial", $con);
$row = pg_num_rows($sql);


//CALCULA QUANTAS PÁGINAS VÃO SER NECESSÁRIAS
$paginas = ceil($total/$por_pagina);

//PREPARA PARA GERAR O PDF
define("FPDF_FONTPATH", "$end_fpdf/font/");
require_once("$end_fpdf/fpdf.php"); 
$pdf = new FPDF();

//INICIALIZA AS VARIÁVEIS
$linha_atual = 0;
$inicio = 0;

//PÁGINAS
for($x=1; $x<=$paginas; $x++) {

//VERIFICA
$inicio = $linha_atual;
$fim = $linha_atual + $por_pagina;
if($fim > $row) $fim = $row;

$pdf->Open(); 
$pdf->AddPage(); 
$pdf->SetFont("Arial", "B", 10);

$pdf->Image($imagem, 0, 8);
$pdf->Ln(2);
$pdf->Cell(185, 8, "Página $x de $paginas",
0, 0, ‘R’);

//QUEBRA DE LINHA
$pdf->Ln(20);

//MONTA O CABEÇALHO 
$pdf->Cell(15, 8, "", 1, 0, ‘C’); 
$pdf->Cell(85, 8, "Número", 1, 0, ‘L’);
$pdf->Cell(85, 8, "Descrição", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Data de Compra", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Prazo de Garantia", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Nota Fiscal", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Fornecedor", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Valor", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Situação", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Categoria", 1, 1, ‘L’);
$pdf->Cell(85, 8, "Sala", 1, 1, ‘L’);
//EXIBE OS REGISTROS 
for($i=$inicio; $i<$fim; $i++) {
$pdf->Cell(15, 8, pgsql_result($sql, $i, "numero"),
1, 0, ‘C’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "descricao"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "datacompra"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "prazogarantia"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "nrnotafiscal"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "fornecedor"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "valor"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "situacao"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "codcategoria"),
1, 0, ‘L’); 
$pdf->Cell(85, 8, pgsql_result($sql, $i, "numsala"),
1, 1, ‘L’); 
$linha_atual++;
}//FECHA FOR(REGISTROS – i)
}//FECHA FOR(PAGINAS – x)

//SAIDA DO PDF
$pdf->Output("$end_final", "$tipo_pdf");
?>