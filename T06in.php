<?php
require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";
echo "<br><br>";
$aux = true;

if (empty($_POST['in_desc'])){
	echo "É necessario informar a <b>DESCRIÇÃO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['in_desc']) > 80){
	echo "A <b>DESCRIÇÃO</b> não deve exceder 80 caracteres.<br>";
	$aux = false;
}

if (empty($_POST['in_prazo'])){
	echo "É necessario informar o <b>PRAZO</b><br>";
	$aux = false;
}elseif (strlen($_POST['in_prazo']) <=0 ){
	echo "<b>PRAZO</b> inválido. <br>";
	$aux = false;
}

if (empty($_POST['in_nfe'])){
	echo "É necessario informar o número da <b>NOTA FISCAL.</b><br>";
	$aux = false;
}elseif (strlen($_POST['in_nfe']) <= 0){
	echo "Número <b>NFE</b> invalido.<br>";
	$aux = false;
}

if (empty($_POST['in_forn'])){
	echo "É necessario informar o <b>FORNECEDOR.</b><br>";
	$aux = false;
}elseif (strlen($_POST['in_forn']) > 60){
	echo "O  nome do <b>FORNECEDOR</b> não deve exceder 60 caracteres.<br>";
	$aux = false;
}

if (empty($_POST['in_valor'])){
	echo "É necessario informar o <b>VALOR.</b><br>";
	$aux = false;
}elseif($_POST['in_valor'] <= 0){
	echo "<b>VALOR</b> inválido<br>";
	$aux = false;
}

if (empty($_POST['selcat'])){
	echo "É necessario informar a <b>CATEGORIA.</b><br>";
	$aux = false;
}elseif($_POST['selcat']<=0){
	echo "<b>CATEGORIA</b> inválida<br>";
	$aux = false;
}

if (empty($_POST['selsala'])){
	echo "É necessario informar a <b>SALA.</b><br>";
	$aux = false;
}elseif($_POST['selsala']<=0){
	echo "<b>SALA</b> inválida.<br>";
	$aux = false;
}

if(empty($_POST['in_dataa'])){
	echo "É necessario informar a <b>DATA DE AQUISIÇÃO.</b><br>";
	$aux = false;
}else{
	$sqlD = $con->query("select date from current_date");
	$row = $sqlD->fetch(PDO::FETCH_OBJ);
	$hoje = $row->date;
	$data = $_POST['in_dataa'];
		if($data > $hoje){
			echo "<b>DATA INVÁLIDA</b><br> A Data de aquisição não pode ser maior que a data atual.<br>";
		$aux = false;
		}
	}
	if($aux!=true){
		header ("refresh:5; url=T06.php");
	}else{
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
		echo "Bem Patrimonial incluido com sucesso!!!";
		header ("refresh:5; url=T06.php");
	}	
?>
