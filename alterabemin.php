<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";
require "onlyP.php";
echo "<br><br>";
$aux = true;

if (isset($_POST['numero'])) {
    $numero=$_POST['numero'];
}else{
    echo "erro fatal!";
}

if (!empty($_POST['in_desc'])) {
	if(strlen($_POST['in_desc']) <= 80){
		$desc="descricao='" . $_POST['in_desc']. "' ";
		$sql = "UPDATE bempatrimonial SET " .$desc ." WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Descrição</b> alterada com sucesso.<br>";
	}else{
	    echo "A <b>Descrição</b> não deve exceder 80 caracteres.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['in_dataa'])) {
	$sqlD = $con->query("select date from current_date");
	$row = $sqlD->fetch(PDO::FETCH_OBJ);
	$hoje = $row->date;
	$data = $_POST['in_dataa'];
		if($data <= $hoje){
			$data="datacompra='" . $_POST['in_dataa'] . "' ";
			$sql = "UPDATE bempatrimonial SET " .$data . " WHERE numero = " . $numero; 
			$resultado = $con->prepare($sql);
			$resultado->execute();
			echo "<b>Data</b> alterada com sucesso.<br>";
		}else{
	    echo "<b>Data</b> inválida.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['in_prazo'])) {
	if($_POST['in_prazo'] >= 0){
		$prazo="prazogarantia=" . $_POST['in_prazo'];
		$sql = "UPDATE bempatrimonial SET " .$prazo . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Prazo</b> alterado com sucesso.<br>";
	}else{
	    echo "<b>Prazo</b> inválido.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['in_nfe'])) {
	if($_POST['in_nfe'] >= 0){
		$nfe="nrnotafiscal=" . $_POST['in_nfe'];
		$sql = "UPDATE bempatrimonial SET " .$nfe . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>NFE</b> alterado com sucesso.<br>";
	}else{
	    echo "Número da <b>NFE</b> inválido.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['in_forn'])) {
	if(strlen($_POST['in_forn']) <= 60){
		$forn="fornecedor='" . $_POST['in_forn'] . "'";
		$sql = "UPDATE bempatrimonial SET " .$forn . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Fornecedor</b> alterada com sucesso.<br>";
	}else{
	    echo "O nome do <b>Fornecedor</b> não deve exceder 60 caracteres.<br>";
	    $aux = false;
	}
}
if (!empty($_POST['in_valor'])) {
	if($_POST['in_valor'] >= 0){
		$valor="valor=" . $_POST['in_valor'];
		$sql = "UPDATE bempatrimonial SET " . $valor . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Valor</b> alterado com sucesso.<br>";
	}else{
	    echo "<b>Valor</b> inválido.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['selcat'])) {
	if($_POST['selcat'] >= 0){
		$cat="codcategoria='" . $_POST['selcat'] . "'";
		$sql = "UPDATE bempatrimonial SET " .$cat. " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Categoria</b> alterado com sucesso.<br>";
	}else{
	    echo "<b>Categoria</b> inválida.<br>";
	    $aux = false;
	}
}

if($aux==true){
                header("refresh:5; url=T11.php");
        }else{
                header("refresh:5; url=alterabem.php?id=$numero");
        }

?>
