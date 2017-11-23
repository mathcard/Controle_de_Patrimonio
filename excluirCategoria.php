<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir categoria";
	header ("refresh:3; url=index.php");
}else{
	$valid = true;
	$id = $_GET['id'];
	$sqlBem = "select b.numero as num from bempatrimonial b inner join categoria c on b.codcategoria = c.codigo where c.codigo = $id";
	  $resultado = $con->prepare($sqlBem);
        $resultado->execute();
        if($resultado->rowCount()> 0 ){
                $valid = false;
                echo "Existem <b>Bens</b> cadastrados nessa categoria.<br>";
                header ("refresh:5; url=T01.php");
        }
	if($valid!=true){
		echo "Não foi possivel excluir essa <b>Categoria</b>";
	}else{
	$sql = $con->prepare("delete from categoria where codigo = ?");
	$sql->bindParam(1,$id);
	$sql->execute();
	echo "<b>Categoria</b> excluida com sucesso.<br>";
	header ("refresh:1; url=T01.php");
	}
}
