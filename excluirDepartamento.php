<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir departamento";
	header ("refresh:3; url=index.php");
}else{
	$valid = true;
	$id = $_GET['id'];
	$sqlSala = "select numero from sala inner join departamento on sala.sigladpto = departamento.sigla where departamento.sigla = '$id'";
	$resultado = $con->prepare($sqlSala);
        $resultado->execute();
	if($resultado->rowCount()> 0 ){
		$valid = false;
		echo "Existem <b>salas</b> cadastradas nesse departamento.<br>";
		header ("refresh:5; url=T04.php");
	}
 	$sqlUser = "select id from usuario inner join departamento on usuario.sigla = departamento.sigla where departamento.sigla = '$id'";
        $resultado2 = $con->prepare($sqlUser);
	$resultado2->execute();
        if($resultado2->rowCount()> 0 ){
		$valid = false;
		echo "Existem <b>usuários</b> cadastrados no departamento.<br>";
                header ("refresh:5; url=T04.php");
	}
	if($valid!=true){
		echo "Não foi possivel excluir este <b>Departamento.</b>";
	}else{
		$sql = $con->prepare("delete from departamento where sigla = ?");
			$sql->bindParam(1,$id);
			$sql->execute();
		echo "<b>Departamento</b> Excluido com Sucesso!!!";
		header ("refresh:5; url=T04.php");
		}
	}
