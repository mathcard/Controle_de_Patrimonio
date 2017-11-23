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

if (!empty($_POST['dp_nome'])) {
	if(strlen($_POST['dp_nome']) <= 30){
	    $nome="nome='" . $_POST['dp_nome']. "' ";
	    $sql = "UPDATE departamento SET " .$nome ." WHERE sigla = '" . $numero . "'"; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Nome</b> alterado com sucesso.<br>";
	}else{
	    echo "O <b>Nome</b> não pode exceder 30 caracteres.<br>";
	    $aux = false;
	}
}

if (!empty($_POST['dp_sigla'])) {
	if(strlen($_POST['dp_sigla']) <= 5){
	    $sig="sigla='" . $_POST['dp_sigla'] . "' ";
	    $sql = "UPDATE departamento SET " .$sig . " WHERE sigla = '" . $numero . "'"; 
	    $resultado = $con->prepare($sql);
	    $resultado->execute();
	    echo "<b>Sigla</b> alterada com sucesso.<br>";
	}else{
                echo "A  <b>sigla</b> não pode exceder 5 caracteres.<br>";
		$aux = false;
	}
}

     if($aux==true){
                header("refresh:5; url=T04.php");
        }else{
                header("refresh:5; url=alteradepartamento.php?id=$numero");
        }
?>
