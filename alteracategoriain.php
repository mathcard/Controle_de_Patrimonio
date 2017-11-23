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

if (!empty($_POST['ct_nome'])) {
	if(strlen($_POST['ct_nome']) <= 50){
		$nome="nome='" . $_POST['ct_nome']. "' ";
		$sql = "UPDATE categoria SET " .$nome ." WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Nome</b> alterada com sucesso.<br>";
	}else{
	    echo "o <b>Nome</b> não deve exceder 50 caracteres.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['ct_desc'])) {
	if(strlen($_POST['ct_desc']) <= 400){
		$desc="descricao='" . $_POST['ct_desc'] . "' ";
		$sql = "UPDATE categoria SET " .$desc . " WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Descrição</b> alterada com sucesso.<br>";
	}else{
	    echo "A <b>Descrição</b> não deve exceder 400 caracteres.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['ct_vida'])) {
    if($_POST['ct_vida'] >= 0){
		$senha="vidautil=" . $_POST['ct_vida'];
		$sql = "UPDATE categoria SET " .$senha . " WHERE codigo = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Vida Útil</b> alterada com sucesso.<br>";
	}else{
	    echo "<b>Vida Útil</b> inválida.<br>";
	    $aux = false;
	}
}

if($aux==true){
	header("refresh:5; url=T01.php");
    }else{
        header("refresh:5; url=alteracategoria.php?id=$numero");
    }

?>
