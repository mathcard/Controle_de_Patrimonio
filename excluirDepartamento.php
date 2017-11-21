<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir departamento";
	header ("refresh:3; url=index.php");
}else{
	$id = $_GET['id'];
	$sala = $con->query("select numero from sala inner join departamento on sala.sigladpto = departamento.sigla where departamento.sigla = '$id'");
	$row = $sala->fetch(PDO::FETCH_OBJ);
        $aux = $row->numero;
	if(!empty($aux)){
		echo "Existem <b>salas</b> cadastradas nesse departamento.<br>";
		header ("refresh:5; url=T04.php");
	}
 	$user = $con->query("select id from usuario inner join departamento on usuario.sigla = departamento.sigla where departamento.sigla = '$id'");
        $row = $user->fetch(PDO::FETCH_OBJ);
        $aux2 = $row->id;
        if(!empty($aux2)){
                echo "Existem <b>usuários</b> cadastrados no departamento.<br>";
                header ("refresh:5; url=T04.php");
	}else{	
	$sql = $con->prepare("delete from departamento where sigla = ?");
			$sql->bindParam(1,$id);
			$sql->execute();
		echo "Excluido com Sucesso!!!";
		header ("location: T04.php");
		}
	}
