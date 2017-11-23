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

if (!empty($_POST['sl_comp'])) {
	if($_POST['sl_comp'] >= 0){
		$comp="comprimento=" . $_POST['sl_comp'];
		$sql = "UPDATE sala SET " .$comp . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Comprimento</b> alterado com sucesso.<br>";
	}else{
	    echo "<b>Comprimento</b> inválido.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['sl_larg'])) {
    if($_POST['sl_larg'] >= 0){
		$larg="largura=" . $_POST['sl_larg'];
		$sql = "UPDATE usuario SET " .$larg . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Largura</b> alterada com sucesso.<br>";
	}else{
	    echo "<b>Largura</b> inválida.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['sl_desc'])) {
	if(strlen($_POST['sl_desc']) <= 80){
		$desc="descricao='" . $_POST['sl_desc'] . "' ";
		$sql = "UPDATE sala SET " .$desc . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Descrição</b> alterada com sucesso.<br>";
	}else{
	    echo "A <b>Descrição</b> não deve exceder 80 caracteres.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['selpredio'])) {
	if($_POST['sl_predio'] >= 0){
		$pred="codpredio=" . $_POST['selpredio'];
		$sql = "UPDATE sala SET " .$pred . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Predio</b> alterado com sucesso.<br>";
	}else{
	    echo "<b>Predio</b> inválido.<br>";
	    $aux = false;
	}
}
if (!empty($_POST['seldep'])) {
	if(strlen($_POST['seldep']) <= 5){
		$dep="sigladpto='" . $_POST['seldep'] . "' ";
		$sql = "UPDATE sala SET " . $dep . " WHERE numero = " . $numero; 
		$resultado = $con->prepare($sql);
		$resultado->execute();
		echo "<b>Sigla</b> alterada com sucesso.<br>";
	}else{
	    echo "<b>Sigla</b> inválida.<br>";
	    $aux = false;
	}
}
	if($aux==true){
                header("refresh:5; url=T05.php");
        }else{
                header("refresh:5; url=alterasala.php?id=$numero");
        }


?>
