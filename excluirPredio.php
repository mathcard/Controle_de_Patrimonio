<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir predio";
	header ("refresh:3; url=index.php");
}else{
	$valid = true;
	$id = $_GET['id'];
	$sqlSala = "select s.numero from sala s inner join predio on s.codpredio = predio.codigo where predio.codigo = $id";
	$resultado = $con->prepare($sqlSala);
	$resultado->execute();
	if($resultado->rowCount()> 0){
		$valid = false;
		echo "Existem <b>salas</b> cadastradas com esse prédio.<br>";
		header ("refresh:5; url=T02.php");
	}	
	if($valid!=true){
		echo "Não foi possivel excluir o <b>Prédio</b>";
	}else{
		$sql = $con->prepare("delete from predio where codigo = ?");
		$sql->bindParam(1,$id);
		$sql->execute();
		echo "<b>Prédio </b> excluido com sucesso!!!";
		header ("refresh:5; url=T02.php");
	}
}
