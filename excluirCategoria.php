<?php
require "modelo.php";
require "connect.php";
if($tipo != "P"){
	echo "Você não tem permissão para excluir categoria";
	header ("refresh:3; url=index.php");
}else{
$id = $_GET['id'];
$sql = $con->prepare("delete from categoria where codigo = ?");
$sql->bindParam(1,$id);
$sql->execute();
header ("location: T01.php");

}
