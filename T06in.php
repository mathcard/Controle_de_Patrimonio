<?php
require "connect.php";
require "onlyP.php";

/*
if (!$_POST['in_desc']){
echo "É necessario informar a DESCRIÇÃO";
}elseif (strlen($_POST['in_desc']) > 80){
echo "A DESCRIÇÃO TEM LIMITE de 80 caracteres";
}

if (!$_POST['in_prazo']){
echo "É necessario informar o PRAZO";
}elseif (strlen($_POST['in_prazo']) <=0 ){
echo "PRAZO invalido";
}

if (!$_POST['in_nfe']){
echo "É necessario informar o número da NOTA FISCAL";
}elseif (strlen($_POST['in_nfe']) <= 0){
echo "Número NFE invalido";
}

if (!$_POST['in_forn']){
echo "É necessario informar o FORNECEDOR";
}elseif (strlen($_POST['in_forn']) > 60){
echo "O FORNECEDOR TEM LIMITE de 60 caracteres";
}

if (!$_POST['in_valor']){
echo "É necessario informar o VALOR";
}elseif (!is_float($_POST['in_valor']) || ($_POST['in_valor'] <= 0)){
echo "VALOR invalido";
}

if (!$_POST['selcat']){
echo "É necessario informar a CATEGORIA";
}elseif (!is_int($_POST['selcat']) || ($_POST['selcat']<=0)){
echo "CATEGORIA invalida";
}

if (!$_POST['selsala']){
echo "É necessario informar a SALA";
}elseif (!is_int($_POST['selsala']) || ($_POST['selsala']<=0)){
echo "CATEGORIA invalida";
}

if(!$_POST['in_dataa']){
echo "É necessario informar a DATA DE AQUISIÇÃO";
}else {

### DATA ATUAL
$sqlD = $con->query("select date from current_date");
$row = $sqlD->fetch(PDO::FETCH_OBJ);
$hoje = $row->date;

$data = $_POST['in_dataa'];
	if($data > $hoje){
	echo "DATA INVALIDA";
	}
}
*/


$sql = "insert into bempatrimonial values (DEFAULT,?,?,?,?,?,?,'I',?,?)"; 
$resultado = $con->prepare($sql);
$resultado->bindParam(1, $_POST['in_desc']);
$resultado->bindParam(2, $_POST['in_dataa']);
$resultado->bindParam(3, $_POST['in_prazo']);
$resultado->bindParam(4, $_POST['in_nfe']);
$resultado->bindParam(5, $_POST['in_forn']);
$resultado->bindParam(6, $_POST['in_valor']);
$resultado->bindParam(7, $_POST['selcat']);
$resultado->bindParam(8, $_POST['selsala']);
$resultado->execute();
header ("location: index.php");
?>
