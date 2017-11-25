<?php
require "modelo.php";
require "connect.php";
if(($tipo != 'P')&&($tipo !='D')){
	echo "Você não tem permissão para excluir usuarios";
	header ("refresh:3; url=T03.php");
}
	$id = $_GET['id'];
	$valid = true;
	$sqlB ="select b.numero from baixabempatrimonial b inner join usuario u on b.idusuario = u.id where u.id = $id";
	$resultado = $con->prepare($sqlB);
	$resultado->execute();
	if($resultado->rowCount()>0){
		$valid = false;
		echo "Existem <b>Baixas</b> efetuadas por este usuario.<br>";
		header("refresh:5; url=T03.php");
	}
	$sqlm1 ="select m.numero from mbp m inner join usuario u on m.idsolicitante = u.id where u.id = $id";
        $resultado = $con->prepare($sqlm1);
        $resultado->execute();
        if($resultado->rowCount()>0){
                $valid = false;
                echo "Existem <b>Solicitações</b> efetuadas por este usuario.<br>";
                header("refresh:5; url=T03.php");
        }

	$sqlm2 ="select m.numero as num from mbp m inner join usuario u on m.autorizador = u.id where u.id = $id";
        $resultado = $con->prepare($sqlm2);
        $resultado->execute();
        if($resultado->rowCount()>0){
                $valid = false;
                echo "Existem <b>Autorizações de MBP</b> efetuadas por este usuario.<br>";
                header("refresh:5; url=T03.php");
        }

	if($valid!=true){
		echo "Não foi possivel <b>excluir</b>  esse usuario.";
		header("refresh:4; url=T03.php");
	}else{
		if($tipo == 'P'){
			$sql = $con->prepare("delete from usuario where id = ?");
			$sql->bindParam(1,$id);
			$sql->execute();
			echo "<b>Usuario</b>  excluido com sucesso.<br>";
		        header("refresh:5; url=T03.php");
		}
		if($tipo == 'D'){
			$sql2 = $con->query("select sigla from usuario where id = '$id'");
			$row = $sql2->fetch(PDO::FETCH_OBJ);
			$dep = $row->sigla;
			$sql = $con->prepare("delete from usuario where id = ? and sigla = ?");
			$sql->bindParam(1,$id);
			$sql->bindParam(2,$dep);
			$sql->execute();
			echo "<b>Usuario</b>  excluido com sucesso.<br>";
		        header("refresh:5; url=T03.php");
		}
	}
