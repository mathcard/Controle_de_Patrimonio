<?php
require "connect.php";
require "verifica.php";
require "onlyP.php";
require "modelo2.php";

$sig = $_POST['dp_sigla'];
$nome = $_POST['dp_nome'];
echo "<br><br>";
$aux = true;

if(empty($sig)){
	echo "É necessario informar a <b>SIGLA.</b><br>";
	$aux = false;
}elseif (strlen($sig)>5){
	echo "A <b>SIGLA</b> não pode exceder 5 caracteres. <br>";
	$aux = false;
}

if(empty($nome)){
	echo "É necessario informar o <b>NOME.</b><br>";
	$aux = false;
}elseif (strlen($nome) > 30){
	echo "O <b>NOME</b> não pode exceder 30 caracteres. <br>";
	$aux = false;
}
	if($aux!=true){
		header ("refresh:5; url=T04f.php");
	}else{
		$sql = "insert into Departamento values (?,?)";
		$resultado = $con->prepare($sql);
		$resultado->bindParam(1, $sig);
		$resultado->bindParam(2, $nome);
		$resultado->execute();
		echo "Departamento incluído com sucesso!!!";
		header ("refresh:5; url=T04f.php");
	}

?>
