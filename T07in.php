<?php
require "connect.php";
require "verifica.php";
require "modelo2.php";

$LOGIN = $_SESSION['login'];
echo "<br><br>";
$aux = true;
if(empty($_POST['motivo'])){
	echo "É necessario informar o <b>MOTIVO.</b><br>";
	$aux = false;
}elseif (strlen($_POST['motivo']) > 200){
	echo "O <b>MOTIVO</b> não deve exceder 200 caracteres.<br>";
	$aux = false;
}

if(empty($_POST['selbem'])){
	echo "É necessario informar o <b>BEM</b><br>";
		$aux = false;
}elseif($_POST['selbem']<=0){
	echo "<b>BEM</b> inválido.<br>";
	$aux = false;
}

if(empty($_POST['selsalao'])){
	echo "É necessario informar a <b>SALA DE ORIGEM.</b><br>";
	$aux = false;
}elseif($_POST['selsalao']<=0){
	echo "<b>SALA DE ORIGEM</b> invalida.<br>";
	$aux = false;
}

if(empty($_POST['selsalad'])){
	echo "É necessario informar a <b>SALA DE DESTINO.</b><br>";
	$aux = false;
}elseif ($_POST['selsalad']<=0){
	echo "<b>SALA DE DESTINO</b> inválida";
	$aux = false;
}

	if($aux!=true){
		header ("refresh:5; url=T07.php");
	}else{
		### Sql buscar o ID solicitante ##
		$sql2 = $con->query("select id from usuario where login = '$LOGIN'");
		$row = $sql2->fetch(PDO::FETCH_OBJ);   
		$id = $row->id;
		
		### Sql de inserção na tabela MBP ###
		$sql = "INSERT into MBP (numero,dataSolicitacao,motivo,idSolicitante,numeroBem,numSalaOrigem,numSalaDestino) values (DEFAULT, current_date,?,'$id',?,?,?)";
		$resultado = $con->prepare($sql);
		$resultado->bindParam(1, $_POST['motivo']);
		$resultado->bindParam(2, $_POST['selbem']);
		$resultado->bindParam(3, $_POST['selsalao']);
		$resultado->bindParam(4, $_POST['selsalad']);
		$resultado->execute();
		echo "Movimentação de Bem Patrimonial realizada com sucesso!";
		header ("refresh:5; url=T07.php");
	}
?>
