<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir departamento";
	header ("refresh:3; url=index.php");
}else{
$id = $_GET['id'];
$sql = $con->prepare("delete from departamento where sigla = ?");
$sql->bindParam(1,$id);
$sql->execute();
header ("location: T04.php");

}
